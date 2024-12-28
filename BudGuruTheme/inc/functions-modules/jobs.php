<?php
function register_jobs_post_type() {
    $labels = array(
        'name'               => 'Вакансії',
        'singular_name'      => 'Вакансія',
        'menu_name'          => 'Вакансії',
        'add_new'            => 'Додати нову',
        'add_new_item'       => 'Додати нову вакансію',
        'edit_item'          => 'Редагувати вакансію',
        'new_item'           => 'Нова вакансія',
        'view_item'          => 'Переглянути вакансію',
        'search_items'       => 'Шукати вакансії',
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'has_archive'        => true,
        'menu_icon'          => 'dashicons-businessperson',
        'supports'           => array('title', 'thumbnail'),
        'rewrite'            => array('slug' => 'jobs'),
    );

    register_post_type('jobs', $args);
}
add_action('init', 'register_jobs_post_type');

// Додаємо таксономії для вакансій
function register_job_taxonomies() {
    // Категорії вакансій
    register_taxonomy('job_category', 'jobs', array(
        'label'              => 'Категорії вакансій',
        'hierarchical'       => true,
        'public'             => true,
        'show_admin_column'  => true,
    ));

    // Тип зайнятості
    register_taxonomy('job_type', 'jobs', array(
        'label'              => 'Тип зайнятості',
        'hierarchical'       => true,
        'public'             => true,
        'show_admin_column'  => true,
    ));
}
add_action('init', 'register_job_taxonomies');


function getJobs() {
    $args = array(
        'post_type' => 'jobs', 
        'orderby'   => 'date',
        'order'     => 'ASC',
        'numberposts' => -1,
    );

    $jobs = [];

    foreach(get_posts($args) as $post) {
        $job = get_fields($post->ID);
        $job['title'] = $post->post_title;
        $job['img'] = get_the_post_thumbnail_url($post->ID, 'thumbnail');
        $job['link'] = get_permalink($post->ID);
        
        $jobs[] = $job;
    }

    return $jobs;
}