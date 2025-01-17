<?php
if (!defined('WPINC')) {
    die;
}

function consultation_form_handler() {
    // Перевірка nonce для безпеки
    // check_ajax_referer('consultation_nonce', 'nonce');

    // Логуємо отримані дані
    error_log('POST data: ' . print_r($_POST, true));
    
    try {
        // Санітизація даних
        $name = sanitize_text_field($_POST['user-name']);
        $phone = sanitize_text_field($_POST['phone']);
        $question = sanitize_textarea_field($_POST['question']);

        // Формуємо повідомлення
        $message = sprintf(
            "📬 *Нова заявка на консультацію*\n\n".
            "📝 *Ім'я*: %s\n".
            "📞 *Телефон*: %s\n".
            "❓ *Питання*: %s\n".
            "📅 *Отримано*: %s",
            esc_html($name),
            esc_html($phone),
            esc_html($question),
            date_i18n('d.m.Y H:i')
        );

        // Отримуємо параметри Telegram з ACF
        $telegram_bot_token = get_field('token', 'option'); // Поле 'token' у сторінці опцій
        $chat_id = get_field('chat_id', 'option'); // Поле 'chat_id' у сторінці опцій

        if (!$telegram_bot_token || !$chat_id) {
            error_log('Telegram settings are missing in ACF options.');
            wp_send_json_error(array(
                'message' => 'Налаштування Telegram не заповнені. Зверніться до адміністратора сайту.'
            ));
            return;
        }

        // Телеграм API
        $telegram_url = "https://api.telegram.org/bot{$telegram_bot_token}/sendMessage";

        // Запит до Telegram API
        $response = wp_remote_post($telegram_url, array(
            'body' => array(
                'chat_id' => $chat_id,
                'text' => $message,
                'parse_mode' => 'Markdown',
            )
        ));

        if (is_wp_error($response)) {
            // Логуємо помилку
            error_log('Telegram API request failed: ' . $response->get_error_message());
            wp_send_json_error(array(
                'message' => 'На жаль, сталася помилка при відправці повідомлення. Спробуйте пізніше.'
            ));
        } else {
            $response_body = json_decode(wp_remote_retrieve_body($response), true);
            if ($response_body['ok']) {
                // Логуємо успішну відправку
                error_log(sprintf(
                    'Consultation form sent to Telegram. Name: %s, Phone: %s',
                    $name,
                    $phone
                ));

                wp_send_json_success(array(
                    'message' => 'Дякуємо! Ми зв\'яжемося з вами найближчим часом.'
                ));
            } else {
                // Логуємо помилку Telegram API
                error_log('Telegram API error: ' . print_r($response_body, true));
                wp_send_json_error(array(
                    'message' => 'На жаль, сталася помилка при відправці повідомлення в Telegram.'
                ));
            }
        }
    } catch (Exception $e) {
        error_log('Exception occurred: ' . $e->getMessage());
        wp_send_json_error(array(
            'message' => 'Security check failed'
        ), 403);
        return;
    }
}