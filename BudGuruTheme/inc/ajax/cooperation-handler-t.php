<?php
if (!defined('WPINC')) {
    die;
}

function cooperation_form_handler() {
    // Санітизація даних
    $name = sanitize_text_field($_POST['user-name']);
    $phone = sanitize_text_field($_POST['phone']);
    $company = sanitize_text_field($_POST['company']);
    $site_url = esc_url_raw($_POST['site-url']);
    $question = sanitize_textarea_field($_POST['question']);

    // Формуємо повідомлення для Telegram
    $message = sprintf(
        "🤝 *Нова заявка на співпрацю*\n\n".
        "👤 *Ім'я*: %s\n".
        "🏢 *Компанія*: %s\n".
        "📞 *Телефон*: %s\n".
        "🌐 *Сайт*: %s\n".
        "💬 *Повідомлення*: %s\n".
        "📅 *Отримано*: %s",
        esc_html($name),
        esc_html($company),
        esc_html($phone),
        $site_url ? esc_html($site_url) : 'Не вказано',
        esc_html($question),
        date_i18n('d.m.Y H:i')
    );

    // Отримуємо параметри Telegram з ACF
    $telegram_bot_token = get_field('token', 'option');
    $chat_id = get_field('chat_id', 'option');

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
                'Cooperation form sent to Telegram. Name: %s, Company: %s, Phone: %s',
                $name,
                $company,
                $phone
            ));

            wp_send_json_success(array(
                'message' => 'Дякуємо! Ми розглянемо вашу заявку і зв\'яжемося з вами найближчим часом.'
            ));
        } else {
            // Логуємо помилку Telegram API
            error_log('Telegram API error: ' . print_r($response_body, true));
            wp_send_json_error(array(
                'message' => 'На жаль, сталася помилка при відправці повідомлення в Telegram.'
            ));
        }
    }
} 