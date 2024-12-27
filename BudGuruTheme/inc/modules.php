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