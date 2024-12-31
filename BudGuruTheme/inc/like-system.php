<?php
// Додаємо метабокс для лайків
function add_post_likes_meta() {
    add_post_meta_box(
        'post_likes', // ID
        __('Лайки', 'budguru'), // Заголовок
        'post_likes_meta_box', // Функція виводу
        'post' // Тип посту
    );
}
add_action('add_meta_boxes', 'add_post_likes_meta');

// Обробка AJAX запиту
function handle_post_like() {
    // Перевіряємо nonce для безпеки
    if (!wp_verify_nonce($_POST['nonce'], 'like_post_nonce')) {
        die('Invalid nonce');
    }

    $post_id = $_POST['post_id'];
    $likes = get_post_meta($post_id, 'post_likes', true);
    
    // Якщо лайків ще немає, встановлюємо 0
    if (empty($likes)) {
        $likes = 0;
    }

    // Перевіряємо чи користувач вже лайкнув
    $user_ip = $_SERVER['REMOTE_ADDR'];
    $liked_ips = get_post_meta($post_id, 'liked_ips', true);
    if (!is_array($liked_ips)) {
        $liked_ips = array();
    }

    if (!in_array($user_ip, $liked_ips)) {
        // Додаємо лайк
        $likes++;
        update_post_meta($post_id, 'post_likes', $likes);
        
        // Зберігаємо IP
        $liked_ips[] = $user_ip;
        update_post_meta($post_id, 'liked_ips', $liked_ips);
        
        wp_send_json_success(array(
            'likes' => $likes,
            'liked' => true
        ));
    } else {
        // Видаляємо лайк
        $likes--;
        update_post_meta($post_id, 'post_likes', $likes);
        
        // Видаляємо IP
        $liked_ips = array_diff($liked_ips, array($user_ip));
        update_post_meta($post_id, 'liked_ips', $liked_ips);
        
        wp_send_json_success(array(
            'likes' => $likes,
            'liked' => false
        ));
    }
}
add_action('wp_ajax_like_post', 'handle_post_like');
add_action('wp_ajax_nopriv_like_post', 'handle_post_like');

// Функція для перевірки чи користувач лайкнув пост
function has_user_liked_post($post_id) {
    $liked_ips = get_post_meta($post_id, 'liked_ips', true);
    if (!is_array($liked_ips)) {
        return false;
    }
    return in_array($_SERVER['REMOTE_ADDR'], $liked_ips);
} 