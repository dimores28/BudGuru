<?php
// if (function_exists('acf_add_options_page')) {
//     acf_add_options_page(array(
//         'page_title' => 'Відгуки',
//         'menu_title' => 'Відгуки',
//         'menu_slug'  => 'site-reviews',
//         'capability' => 'edit_posts',
//         'redirect'   => false,
//         'icon_url'   => 'dashicons-star-filled',
//         'position'   => 30
//     ));
// }

// Додаємо код для реєстрації типу запису "Відгуки"
function register_review_post_type() {
    register_post_type('review',
        array(
            'labels'      => array(
                'name'          => __('Відгуки', 'budguru'),
                'singular_name' => __('Відгук', 'budguru'),
            ),
            'public'      => true,
            'has_archive' => true,
            'supports'    => array('title', 'editor', 'thumbnail'),
            'menu_icon'   => 'dashicons-testimonial',
        )
    );
}
add_action('init', 'register_review_post_type');

function getReviews($count = 6) {
    $args = array(
        'post_type'      => 'review',
        'posts_per_page' => $count,
        'orderby'        => 'date',
        'order'          => 'DESC',
        'post_status'    => 'publish'
    );

    $reviews = [];

    foreach(get_posts($args) as $post) {
        $review = get_fields($post->ID);
        $review['title'] = $post->post_title;
        $review['content'] = $post->post_content;
        $review['date'] = get_the_date('d.m.Y', $post->ID);
        $review['photo'] = get_the_post_thumbnail_url($post->ID, 'thumbnail');
        
        $reviews[] = $review;
    }

    return $reviews;
}

// Додаємо локалізацію для AJAX
function add_ajax_data() {
    wp_localize_script('main', 'budguruAjax', array(
        'ajaxurl' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('budguruAjax-nonce')
    ));
}
add_action('wp_enqueue_scripts', 'add_ajax_data');


