<?php 
function remove_wordpress_version_number() {
    return '';
}
add_filter('the_generator', 'remove_wordpress_version_number');
function remove_version_from_scripts( $src ) {
   if ( strpos( $src, '?ver=' ) )
       $src = remove_query_arg( 'ver', $src );
   return $src;
}
add_filter( 'style_loader_src', 'remove_version_from_scripts');
add_filter( 'script_loader_src', 'remove_version_from_scripts');

define('WPTEST_DIR_CSS', get_template_directory_uri() . '/assets/css/');
define('WPTEST_DIR_JS', get_template_directory_uri() . '/assets/js/');
define('WPTEST_DIR_iMG', get_template_directory_uri() . '/assets/img/');

include_once('inc/functions-modules/services.php');
include_once('inc/functions-modules/jobs.php');
include_once('inc/functions-modules/portfolio.php');
include_once('inc/functions-modules/projects.php');
include_once('inc/functions-modules/contacts.php');
// include_once('inc/functions-modules/reviews.php');

// Підключаємо модуль партнерів
require_once get_template_directory() . '/inc/functions-modules/partners.php';

// Підключаємо модуль клієнтів
require_once get_template_directory() . '/inc/functions-modules/clients.php';

// Підключаємо модуль команди
require_once get_template_directory() . '/inc/functions-modules/team.php';

include_once('inc/menu.php');
include_once('inc/modules.php');
include_once('inc/ajax.php');
include_once('inc/shortcodes.php');

add_action('wp_enqueue_scripts', function(){
    wp_enqueue_style('main', WPTEST_DIR_CSS . 'style.min.css');

    wp_enqueue_script('main', WPTEST_DIR_JS . 'app.min.js', [], false, true);
});



add_action('after_setup_theme', function(){
    add_theme_support('post-thumbnails');
    add_theme_support('title-tag');
    add_theme_support('post-formats', ['aside', 'video']);
    add_theme_support('custom-logo');
});

add_filter( "jpeg_quality", function( $quality ){
	return 100;
} );

add_filter( 'big_image_size_threshold', '__return_false' );


add_filter('theme_page_templates', function($page_templates, $wp_theme, $post) {
    // Додаємо шаблони з папки template-parts
    $templates = glob(get_template_directory() . '/template-parts/*.php');
    
    foreach ($templates as $template) {
        $template_data = get_file_data($template, array('Template Name' => 'Template Name'));
        if (!empty($template_data['Template Name'])) {
            $page_templates[str_replace(get_template_directory() . '/', '', $template)] = $template_data['Template Name'];
        }
    }
    
    return $page_templates;
}, 10, 3);


function custom_template_include($template) {
    // Отримуємо поточний post type
    $post_type = get_post_type();
    
    // Масив зареєстрованих custom post types
    $custom_post_types = ['portfolio', 'services', 'projects', 'other-cpt', 'jobs'];
    
    // Якщо це один з наших custom post types
    if (in_array($post_type, $custom_post_types)) {
        // Для single post
        if (is_singular()) {
            $new_template = locate_template([
                "template-parts/post-types/{$post_type}/single.php"
            ]);
            if ($new_template) {
                return $new_template;
            }
        }
        
        // Для archive
        if (is_post_type_archive()) {
            $new_template = locate_template([
                "template-parts/post-types/{$post_type}/archive.php"
            ]);
            if ($new_template) {
                return $new_template;
            }
        }
        
        // Для taxonomy
        if (is_tax()) {
            $new_template = locate_template([
                "template-parts/post-types/{$post_type}/taxonomy.php"
            ]);
            if ($new_template) {
                return $new_template;
            }
        }
    }
    
    return $template;
}
add_filter('template_include', 'custom_template_include');

function budguru_load_theme_textdomain() {
    load_theme_textdomain('budguru', get_template_directory() . '/languages');
}
add_action('after_setup_theme', 'budguru_load_theme_textdomain');

// Підключаємо систему лайків
require_once get_template_directory() . '/inc/like-system.php';

// Додаємо скрипти і стилі
function add_like_system_scripts() {
    wp_enqueue_script('like-system', get_template_directory_uri() . '/assets/js/like-system.js', array('jquery'), '1.0', true);
    wp_localize_script('like-system', 'budguruAjax', array(
        'ajaxurl' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('like_post_nonce')
    ));
}
add_action('wp_enqueue_scripts', 'add_like_system_scripts');

require_once get_template_directory() . '/inc/post-views.php';
