<?php 
function register_portfolio_post_type() {
    register_post_type('portfolio', array(
        'labels' => array(
            'name'               => 'Портфоліо',
            'singular_name'      => 'Проект',
            'add_new'           => 'Додати проект',
            'add_new_item'      => 'Додати новий проект',
            'edit_item'         => 'Редагувати проект',
        ),
        'public'              => true,
        'supports'            => array('title', 'thumbnail'),
        'menu_icon'           => 'dashicons-portfolio',
        'has_archive'         => true,
        'rewrite'            => array('slug' => 'portfolio')
    ));

    // Реєструємо таксономію для категорій проектів
    register_taxonomy('portfolio_category', 'portfolio', array(
        'labels' => array(
            'name'              => 'Категорії проектів',
            'singular_name'     => 'Категорія проекту',
        ),
        'hierarchical'        => true,
        'show_admin_column'   => true,
        'rewrite'            => array('slug' => 'portfolio-category')
    ));
}
add_action('init', 'register_portfolio_post_type');



function getPortfolio($custom_args = array()) {  
    $default_args = array(  
        'post_type' => 'portfolio',
        'posts_per_page' => 5,
        'orderby'   => 'date',
        'order'     => 'DESC',
        'numberposts' => -1,
    );

    $args = wp_parse_args($custom_args, $default_args);  // Об'єднуємо з користувацькими параметрами

    // Якщо передана категорія
    if (!empty($custom_args['category'])) {  // Перевіряємо саме custom_args
        $args['tax_query'] = array(
            array(
                'taxonomy' => 'portfolio_category',
                'field'    => 'slug',
                'terms'    => $custom_args['category']
            )
        );
    }

    $projects = [];

    foreach(get_posts($args) as $post) {
        $project = get_fields($post->ID);
        $project['title'] = $post->post_title;
        $project['img'] = get_the_post_thumbnail_url($post->ID, 'thumbnail');
        $project['link'] = get_permalink($post->ID);
        
        $projects[] = $project;
    }

    return $projects;
}

function getPortfolioWithPagination($args = array()) {
    $default_args = array(
        'post_type'      => 'portfolio',
        'posts_per_page' => 10, // змінюємо на 10 проектів
        'orderby'        => 'date',
        'order'          => 'DESC',
        'paged'          => get_query_var('paged') ? get_query_var('paged') : 1,
        'category'       => ''
    );

    $args = wp_parse_args($args, $default_args);
    
    if (!empty($args['category'])) {
        $args['tax_query'] = array(
            array(
                'taxonomy' => 'portfolio_category',
                'field'    => 'slug',
                'terms'    => $args['category']
            )
        );
    }

    $query = new WP_Query($args);
    $projects = array();

    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            $project = get_fields(get_the_ID());
            $project['title'] = get_the_title();
            $project['img'] = get_the_post_thumbnail_url(get_the_ID(), 'thumbnail');
            $project['link'] = get_permalink();
            
            $projects[] = $project;
        }
        wp_reset_postdata();
    }

    return array(
        'projects' => $projects,
        'max_pages' => $query->max_num_pages,
        'current_page' => $args['paged']
    );
}