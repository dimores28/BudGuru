<?php
function register_services_post_type() {
    $labels = array(
        'name'               => 'Послуги',
        'singular_name'      => 'Послуга',
        'menu_name'          => 'Послуги',
        'add_new'            => 'Додати нову',
        'add_new_item'       => 'Додати нову послугу',
        'edit_item'          => 'Редагувати послугу',
        'new_item'           => 'Нова послуга',
        'view_item'          => 'Переглянути послугу',
        'search_items'       => 'Шукати послуги',
    );

    $args = array(
        'labels'              => $labels,
        'public'              => true,
        'has_archive'         => true, // Для сторінки зі списком всіх послуг
        'menu_icon'           => 'dashicons-clipboard', // Іконка в адмінці
        'supports'            => array('title', 'editor', 'thumbnail'),
        'rewrite'            => array('slug' => 'services'),
    );

    register_post_type('services', $args);
}
add_action('init', 'register_services_post_type');