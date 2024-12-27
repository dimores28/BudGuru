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

// include_once('inc/functions-modules/contacts.php');
// include_once('inc/functions-modules/reviews.php');

include_once('inc/menu.php');
include_once('inc/modules.php');

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
