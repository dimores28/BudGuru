<?php
function register_projects_post_type() {
    $labels = array(
        'name'               => 'Проекти',
        'singular_name'      => 'Проект',
        'menu_name'          => 'Проекти',
        'add_new'            => 'Додати новий',
        'add_new_item'       => 'Додати новий проект',
        'edit_item'          => 'Редагувати проект',
        'new_item'           => 'Новий проект',
        'view_item'          => 'Переглянути проект',
        'search_items'       => 'Шукати проекти',
    );

    $args = array(
        'labels'              => $labels,
        'public'              => true,
        'has_archive'         => true,
        'show_in_rest'        => true,
        'menu_icon'           => 'dashicons-admin-home',
        'supports'            => array('title', 'thumbnail', 'editor'),
        'rewrite'            => array('slug' => 'projects'),
    );

    register_post_type('projects', $args);
}
add_action('init', 'register_projects_post_type');

// Функція для отримання проектів
function getProjects($limit = -1) {
    $args = array(
        'post_type'    => 'projects',
        'orderby'      => 'date',
        'order'        => 'DESC',
        'numberposts'  => $limit,
    );

    $projects = [];

    foreach(get_posts($args) as $post) {
        $project = get_fields($post->ID);
        $project['title'] = $post->post_title;
        $project['img'] = get_the_post_thumbnail_url($post->ID, 'full');
        $project['link'] = get_permalink($post->ID);
        
        $projects[] = $project;
    }

    return $projects;
} 

function modify_projects_query($query) {
    if (!is_admin() && $query->is_main_query()) {
        // Перевіряємо чи це архів проектів або сторінка з потрібним шаблоном
        if (is_post_type_archive('projects') || 
            (is_page() && strpos(get_page_template(), 'template-parts/projects.php') !== false)) {
            $query->set('post_type', 'projects');
            $query->set('posts_per_page', 12);
        }
    }
}
add_action('pre_get_posts', 'modify_projects_query');