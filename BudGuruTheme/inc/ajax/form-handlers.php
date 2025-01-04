<?php
if ( ! defined( 'WPINC' ) ) {
    die;
}

function consultation_form_handler()  {
    // Перевірка nonce для безпеки
    // check_ajax_referer('consultation_nonce', 'nonce');

    // Логуємо отримані дані
    error_log('POST data: ' . print_r($_POST, true));
    
    try {
        // check_ajax_referer('consultation_nonce', 'nonce', true);
        // error_log('Nonce check passed');
        
        // Санітизація даних
        $name = sanitize_text_field($_POST['user-name']);
        $phone = sanitize_text_field($_POST['phone']);
        $question = sanitize_textarea_field($_POST['question']);

        // Налаштування email
        $to = get_option('admin_email'); // Основний отримувач
        $subject = sprintf('Нова заявка на консультацію від %s', $name);

        // Форматуємо тіло листа в HTML
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
                    <h2>Нова заявка на консультацію</h2>
                    <p>Отримано: %s</p>
                </div>
                <div class="content">
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

        // Спроба відправки email
        $sent = wp_mail($to, $subject, $body, $headers);

        if ($sent) {
            // Логуємо успішну відправку
            error_log(sprintf(
                'Consultation form sent successfully. Name: %s, Phone: %s',
                $name,
                $phone
            ));

            wp_send_json_success(array(
                'message' => 'Дякуємо! Ми зв\'яжемося з вами найближчим часом.'
            ));
        } else {
            // Логуємо помилку
            error_log(sprintf(
                'Failed to send consultation form. Name: %s, Phone: %s, WP Error: %s',
                $name,
                $phone,
                print_r($GLOBALS['phpmailer']->ErrorInfo, true)
            ));

            wp_send_json_error(array(
                'message' => 'На жаль, сталася помилка. Будь ласка, спробуйте пізніше.'
            ));
        }

        
    } catch (Exception $e) {
        error_log('Nonce check failed: ' . $e->getMessage());
        wp_send_json_error(array(
            'message' => 'Security check failed'
        ), 403);
        return;
    }

}
