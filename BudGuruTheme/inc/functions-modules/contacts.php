<?php
if (function_exists('acf_add_options_page')) {
    // Додаємо сторінку "Контакти" в адмінку
    acf_add_options_page(array(
        'page_title' => 'Контакти',
        'menu_title' => 'Контакти',
        'menu_slug'  => 'site-contacts',
        'capability' => 'edit_posts',
        'redirect'   => false,
        'icon_url'   => 'dashicons-phone',
        'position'   => 25
    ));
}


