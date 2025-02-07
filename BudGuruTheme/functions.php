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
require_once get_template_directory() . '/inc/ajax/form-handlers-t.php';
require_once get_template_directory() . '/inc/ajax/calculator-handler-t.php';
require_once get_template_directory() . '/inc/ajax/calculator-handlers-t.php';
require_once get_template_directory() . '/inc/ajax/cooperation-handler-t.php';

require_once get_template_directory() . '/inc/functions-modules/partners.php';
require_once get_template_directory() . '/inc/functions-modules/clients.php';
require_once get_template_directory() . '/inc/functions-modules/team.php';
require_once get_template_directory() . '/inc/functions-modules/reviews.php';
require_once get_template_directory() . '/inc/functions-modules/certificates.php';
require_once get_template_directory() . '/inc/post-views.php';
require_once get_template_directory() . '/inc/like-system.php';
require_once get_template_directory() . '/inc/classes/class-service-section.php';

include_once('inc/menu.php');
include_once('inc/modules.php');
include_once('inc/ajax.php');
include_once('inc/shortcodes.php');

add_action('wp_enqueue_scripts', function(){
    wp_enqueue_style('main', WPTEST_DIR_CSS . 'style.min.css');

    wp_enqueue_script('main', WPTEST_DIR_JS . 'app.min.js', [], false, true);
    
    // Створюємо новий nonce з унікальним ідентифікатором
    $action = 'consultation_form_' . time();
    $nonce = wp_create_nonce($action);
    
    wp_localize_script('main', 'budguruAjax', array(
        'ajaxurl' => admin_url('admin-ajax.php'),
        'nonce' => $nonce,
        'action_id' => $action // Передаємо ідентифікатор дії
    ));
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


// Додаємо скрипти і стилі
function add_like_system_scripts() {
    wp_enqueue_script('like-system', get_template_directory_uri() . '/assets/js/like-system.js', array('jquery'), '1.0', true);
    wp_localize_script('like-system', 'budguruAjax', array(
        'ajaxurl' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('like_post_nonce')
    ));
}
add_action('wp_enqueue_scripts', 'add_like_system_scripts');


// Реєструємо обробник для AJAX-запитів
add_action( 'wp_ajax_consultation_form_handler', 'consultation_form_handler' );
add_action('wp_ajax_nopriv_consultation_form_handler', 'consultation_form_handler');

add_action('wp_ajax_calculator_form_handler', 'calculator_form_handler');
add_action('wp_ajax_nopriv_calculator_form_handler', 'calculator_form_handler'); 

add_action('wp_ajax_repair_calculator_handler', 'repair_calculator_handler');
add_action('wp_ajax_nopriv_repair_calculator_handler', 'repair_calculator_handler');

add_action('wp_ajax_design_calculator_handler', 'design_calculator_handler');
add_action('wp_ajax_nopriv_design_calculator_handler', 'design_calculator_handler');


//---------------==============================------------------------//

add_filter( 'wp_handle_upload', 'wpturbo_handle_upload_convert_to_webp' );
 
function wpturbo_handle_upload_convert_to_webp( $upload ) {
    if ( $upload['type'] == 'image/jpeg' || $upload['type'] == 'image/png' || $upload['type'] == 'image/gif' ) {
        $file_path = $upload['file'];
 
        // Check if ImageMagick or GD is available
        if ( extension_loaded( 'imagick' ) || extension_loaded( 'gd' ) ) {
            $image_editor = wp_get_image_editor( $file_path );
            if ( ! is_wp_error( $image_editor ) ) {
                $file_info = pathinfo( $file_path );
                $dirname   = $file_info['dirname'];
                $filename  = $file_info['filename'];
 
                // Create a new file path for the WebP image
                $new_file_path = $dirname . '/' . $filename . '.webp';
 
                // Attempt to save the image in WebP format
                $saved_image = $image_editor->save( $new_file_path, 'image/webp' );
                if ( ! is_wp_error( $saved_image ) && file_exists( $saved_image['path'] ) ) {
                    // Success: replace the uploaded image with the WebP image
                    $upload['file'] = $saved_image['path'];
                    $upload['url']  = str_replace( basename( $upload['url'] ), basename( $saved_image['path'] ), $upload['url'] );
                    $upload['type'] = 'image/webp';
 
                    // Optionally remove the original image
                    @unlink( $file_path );
                }
            }
        }
    }
 
    return $upload;
}
//---------------==============================------------------------//


// Додаємо обробники для форми співпраці
add_action('wp_ajax_cooperation_form_handler', 'cooperation_form_handler');
add_action('wp_ajax_nopriv_cooperation_form_handler', 'cooperation_form_handler');

// Додаємо новий include для обробника відгуків
require_once get_template_directory() . '/inc/ajax/feedback-handler.php';

// Оновлюємо секцію AJAX дій
add_action('wp_ajax_feedback_form_handler', 'feedback_form_handler');
add_action('wp_ajax_nopriv_feedback_form_handler', 'feedback_form_handler');