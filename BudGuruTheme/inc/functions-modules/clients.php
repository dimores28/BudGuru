<?php
if (function_exists('acf_add_options_page')) {
    // Додаємо сторінку "Клієнти" в адмінку
    acf_add_options_page(array(
        'page_title' => 'Клієнти',
        'menu_title' => 'Клієнти',
        'menu_slug'  => 'site-clients',
        'capability' => 'edit_posts',
        'redirect'   => false,
    ));
} 