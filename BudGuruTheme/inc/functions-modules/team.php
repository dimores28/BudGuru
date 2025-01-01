<?php
if (function_exists('acf_add_options_page')) {
    // Додаємо сторінку "Команда" в адмінку
    acf_add_options_page(array(
        'page_title' => 'Команда',
        'menu_title' => 'Команда',
        'menu_slug'  => 'site-team',
        'capability' => 'edit_posts',
        'redirect'   => false,
        'icon_url'   => 'dashicons-groups',
        'position'   => 20
    ));
} 