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
        'supports'            => array('title', 'thumbnail'),
        'rewrite'            => array('slug' => 'services'),
    );

    register_post_type('services', $args);
}
add_action('init', 'register_services_post_type');

function getServices() {
    $args = array(
        'post_type'    => 'services',
        'orderby'      => 'date',
        'order'        => 'DESC',
        'numberposts'  => -1,
    );

    $services = [];

    foreach(get_posts($args) as $post) {
        $service = get_fields($post->ID);
        $service['title'] = $post->post_title;
        $service['img'] = get_the_post_thumbnail_url($post->ID, 'thumbnail');
        $service['link'] = get_permalink($post->ID);
        
        $services[] = $service;
    }

    return $services;
}