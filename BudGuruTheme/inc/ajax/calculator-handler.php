<?php
if (!defined('WPINC')) {
    die;
}

function calculator_form_handler() {
    // Санітизація даних
    $name = sanitize_text_field($_POST['user-name']);
    $phone = sanitize_text_field($_POST['user-phone']);
    $question = sanitize_textarea_field($_POST['user-question']);
    $room_type = sanitize_text_field($_POST['room_type']);
    $area = sanitize_text_field($_POST['area']);
    $design = sanitize_text_field($_POST['design_needed']);

    // Форматуємо тип приміщення
    $room_type_text = $room_type === 'living-quarters' ? 'Житлове' : 'Комерційне';
    $design_text = $design === 'need-desing' ? 'Потрібен' : 'Без дизайну';

    // Налаштування email
    $to = get_option('admin_email');
    $subject = sprintf('Новий розрахунок вартості ремонту від %s', $name);
    
    $body = sprintf('
        <html>
        <head>
            <style>
                body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
                .header { background: #f5f5f5; padding: 20px; margin-bottom: 20px; }
                .content { padding: 20px; }
                .field { margin-bottom: 15px; }
                .label { font-weight: bold; }
            </style>
        </head>
        <body>
            <div class="header">
                <h2>Новий розрахунок вартості ремонту</h2>
                <p>Отримано: %s</p>
            </div>
            <div class="content">
                <div class="field">
                    <p class="label">Тип приміщення:</p>
                    <p>%s</p>
                </div>
                <div class="field">
                    <p class="label">Площа:</p>
                    <p>%s м²</p>
                </div>
                <div class="field">
                    <p class="label">Дизайн проект:</p>
                    <p>%s</p>
                </div>
                <div class="field">
                    <p class="label">Імʼя:</p>
                    <p>%s</p>
                </div>
                <div class="field">
                    <p class="label">Телефон:</p>
                    <p>%s</p>
                </div>
                <div class="field">
                    <p class="label">Питання:</p>
                    <p>%s</p>
                </div>
            </div>
        </body>
        </html>
    ', 
        date_i18n('d.m.Y H:i'),
        esc_html($room_type_text),
        esc_html($area),
        esc_html($design_text),
        esc_html($name),
        esc_html($phone),
        nl2br(esc_html($question))
    );

    // Налаштування заголовків
    $headers = array(
        'Content-Type: text/html; charset=UTF-8',
        'From: ' . get_bloginfo('name') . ' <noreply@' . $_SERVER['HTTP_HOST'] . '>',
        'Reply-To: ' . $name . ' <noreply@' . $_SERVER['HTTP_HOST'] . '>'
    );

    // Додаємо CC якщо вказано
    if ($cc_email = get_field('cc_email', 'option')) {
        $headers[] = 'Cc: ' . $cc_email;
    }

    // Додаємо BCC якщо вказано
    if ($bcc_email = get_field('bcc_email', 'option')) {
        $headers[] = 'Bcc: ' . $bcc_email;
    }

    // Відправка email
    $sent = wp_mail($to, $subject, $body, $headers);

    if ($sent) {
        error_log(sprintf(
            'Calculator form sent successfully. Name: %s, Phone: %s',
            $name,
            $phone
        ));

        wp_send_json_success(array(
            'message' => 'Дякуємо! Ми зв\'яжемося з вами найближчим часом.'
        ));
    } else {
        error_log(sprintf(
            'Failed to send calculator form. Name: %s, Phone: %s',
            $name,
            $phone
        ));

        wp_send_json_error(array(
            'message' => 'На жаль, сталася помилка. Будь ласка, спробуйте пізніше.'
        ));
    }
}
