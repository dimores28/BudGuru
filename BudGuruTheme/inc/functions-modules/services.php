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
        'supports'            => array('title', 'thumbnail', 'editor', 'page-attributes'),
        'show_in_rest'        => true, // Додали підтримку REST API для Gutenberg
        'hierarchical'        => true, // Включаємо ієрархічність
        'rewrite'            => array('slug' => 'services'),
    );

    register_post_type('services', $args);
}
add_action('init', 'register_services_post_type');

function getServices($parent = 0) {
    $args = array(
        'post_type'    => 'services',
        'orderby'      => 'menu_order date', // Додаємо сортування за menu_order
        'order'        => 'ASC',
        'numberposts'  => -1,
        'post_parent'  => $parent, // Додаємо фільтр за батьківським ID
    );

    $services = [];

    foreach(get_posts($args) as $post) {
        $service = get_fields($post->ID);
        $service['title'] = $post->post_title;
        $service['img'] = get_the_post_thumbnail_url($post->ID, 'thumbnail');
        $service['link'] = get_permalink($post->ID);
        $service['id'] = $post->ID;
        
        // Перевіряємо чи є дочірні послуги
        $children = get_posts(array(
            'post_type' => 'services',
            'post_parent' => $post->ID,
            'numberposts' => -1
        ));
        $service['has_children'] = !empty($children);
        
        $services[] = $service;
    }

    return $services;
}