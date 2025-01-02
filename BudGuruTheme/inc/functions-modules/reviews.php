<?php
if (function_exists('acf_add_options_page')) {
    acf_add_options_page(array(
        'page_title' => 'Відгуки',
        'menu_title' => 'Відгуки',
        'menu_slug'  => 'site-reviews',
        'capability' => 'edit_posts',
        'redirect'   => false,
        'icon_url'   => 'dashicons-star-filled',
        'position'   => 30
    ));
}
