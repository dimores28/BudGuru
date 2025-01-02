<?php
if (function_exists('acf_add_options_page')) {
    acf_add_options_page(array(
        'page_title' => 'Сертифікати',
        'menu_title' => 'Сертифікати',
        'menu_slug'  => 'site-certificates',
        'capability' => 'edit_posts',
        'redirect'   => false,
        'icon_url'   => 'dashicons-awards',
        'position'   => 35
    ));
} 