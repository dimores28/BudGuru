<?php

// Додаємо підтримку кастомного логотипу
function theme_custom_logo_setup() {
    add_theme_support('custom-logo', array(
        'height'      => 100,  // Рекомендована висота
        'width'       => 400,  // Рекомендована ширина
        'flex-height' => true, // Дозволяє змінювати висоту
        'flex-width'  => true, // Дозволяє змінювати ширину
        'header-text' => array('site-title', 'site-description'), // Текст, пов'язаний з логотипом
    ));
}
add_action('after_setup_theme', 'theme_custom_logo_setup');

add_filter( 'get_custom_logo', 'change_logo_class' );

function change_logo_class( $html ) {

    $html = str_replace( 'custom-logo', 'header__logo', $html );
    $html = str_replace( 'custom-logo-link', 'header__logo', $html );

    return $html;
}

// Додаємо налаштування для мобільного логотипу
function theme_customize_register($wp_customize) {
    // Секція для логотипу
    $wp_customize->add_section('theme_logo_section', array(
        'title'    => __('Логотипи', 'your-theme-textdomain'),
        'priority' => 30,
    ));

    // Поле для мобільного логотипу
    $wp_customize->add_setting('mobile_logo', array(
        'default'   => '',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'mobile_logo', array(
        'label'    => __('Мобільний логотип', 'your-theme-textdomain'),
        'section'  => 'theme_logo_section',
        'settings' => 'mobile_logo',
    )));

    // Поле для логотипу підвалу
    $wp_customize->add_setting('footer_logo', array(
        'default'   => '',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'footer_logo', array(
        'label'    => __('Логотип підвалу', 'your-theme-textdomain'),
        'section'  => 'theme_logo_section',
        'settings' => 'footer_logo',
    )));
}
add_action('customize_register', 'theme_customize_register');

// Додаємо нові налаштування в Customizer
function budguru_customize_promo($wp_customize) {
    // Додаємо секцію якщо її ще немає
    if (!$wp_customize->get_section('site_options')) {
        $wp_customize->add_section('site_options', array(
            'title'    => __('Налаштування сайту', 'budguru'),
            'priority' => 30,
        ));
    }

    // Налаштування для відображення акції
    $wp_customize->add_setting('show_hero_promo', array(
        'default'           => true,
        'sanitize_callback' => 'wp_validate_boolean',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('show_hero_promo', array(
        'label'       => __('Відображати акцію в шапці', 'budguru'),
        'description' => __('Увімкніть, щоб показати блок з акцією на головній сторінці', 'budguru'),
        'section'     => 'site_options',
        'type'        => 'checkbox',
        'priority'    => 10,
    ));

    // Налаштування для заголовку акції
    $wp_customize->add_setting('promo_title', array(
        'default'           => __('Замовте ремонт під ключ', 'budguru'),
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('promo_title', array(
        'label'    => __('Заголовок акції', 'budguru'),
        'section'  => 'site_options',
        'type'     => 'text',
        'priority' => 20,
    ));
}
add_action('customize_register', 'budguru_customize_promo');