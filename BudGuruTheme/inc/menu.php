<?php
function register_main_menu() {
    register_nav_menu('main-menu', __('Головне меню'));
}
add_action('after_setup_theme', 'register_main_menu');


// Реєстрація меню для підвалу
function register_footer_menus() {
    register_nav_menus(array(
        'footer-services'   => __('Наші послуги', 'your-theme-textdomain'),
        'footer-about'      => __('Про компанію', 'your-theme-textdomain'),
        'footer-users'      => __('Користувачам', 'your-theme-textdomain'),
    ));
}
add_action('after_setup_theme', 'register_footer_menus');

