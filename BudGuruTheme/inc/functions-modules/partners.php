<?php
if (function_exists('acf_add_options_page')) {
    // Додаємо сторінку "Партнери" в адмінку
    acf_add_options_page(array(
        'page_title' => 'Партнери',
        'menu_title' => 'Партнери',
        'menu_slug'  => 'site-partners',
        'capability' => 'edit_posts',
        'redirect'   => false,
    ));
} 