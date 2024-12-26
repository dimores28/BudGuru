<?php
function register_main_menu() {
    register_nav_menu('main-menu', __('Головне меню'));
}
add_action('after_setup_theme', 'register_main_menu');
