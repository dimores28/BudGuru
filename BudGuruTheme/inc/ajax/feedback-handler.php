<?php
add_action('wp_ajax_feedback_form_handler', 'feedback_form_handler');
add_action('wp_ajax_nopriv_feedback_form_handler', 'feedback_form_handler');

function feedback_form_handler() {
    // Перевірка nonce з правильним ключем
    // if (!wp_verify_nonce($_POST['nonce'], 'budguruAjax-nonce')) {
    //     wp_send_json_error('Помилка безпеки');
    //     exit;
    // }

    // Отримання даних з форми
    $data = [
        'name'    => sanitize_text_field($_POST['name']),
        'phone'   => sanitize_text_field($_POST['phone']),
        'service' => sanitize_text_field($_POST['service']),
        'review'  => sanitize_textarea_field($_POST['review']),
        'rating'  => intval($_POST['rating']),
        'photo'   => $_FILES['photo'] ?? null
    ];

    // Обробка фото
    $attachment_id = null;
    if (!empty($data['photo']) && $data['photo']['size'] > 0) {
        if ($data['photo']['size'] > 5 * 1024 * 1024) {
            wp_send_json_error('Файл занадто великий. Максимальний розмір: 5MB');
        }

        $upload = wp_handle_upload($data['photo'], ['test_form' => false]);
        if ($upload && !isset($upload['error'])) {
            $attachment_id = wp_insert_attachment([
                'post_mime_type' => $upload['type'],
                'post_title'     => preg_replace('/\.[^.]+$/', '', basename($upload['file'])),
                'post_content'   => '',
                'post_status'    => 'inherit'
            ], $upload['file']);

            require_once(ABSPATH . 'wp-admin/includes/image.php');
            wp_update_attachment_metadata($attachment_id, wp_generate_attachment_metadata($attachment_id, $upload['file']));
        }
    }

    // Збереження відгуку
    $post_data = [
        'post_title'   => $data['name'],
        'post_content' => $data['review'],
        'post_type'    => 'review',
        'post_status'  => 'publish'
    ];

    if ($attachment_id) {
        $post_data['_thumbnail_id'] = $attachment_id;
    }

    $post_id = wp_insert_post($post_data);

    if ($post_id && !is_wp_error($post_id)) {
        update_field('phone_number', $data['phone'], $post_id);
        update_field('service', $data['service'], $post_id);
        update_field('rating', $data['rating'], $post_id);

        wp_send_json_success('Відгук успішно відправлено');
    } else {
        wp_send_json_error('Помилка при збереженні відгуку');
    }
} 