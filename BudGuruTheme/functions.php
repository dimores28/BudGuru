<?php 

define('WPTEST_DIR_CSS', get_template_directory_uri() . '/assets/css/');
define('WPTEST_DIR_JS', get_template_directory_uri() . '/assets/js/');
define('WPTEST_DIR_iMG', get_template_directory_uri() . '/assets/img/');

// include_once('inc/functions-modules/reviews.php');
include_once('inc/menu.php');

add_action('wp_enqueue_scripts', function(){
    wp_enqueue_style('main', WPTEST_DIR_CSS . 'style.min.css');

    wp_enqueue_script('main', WPTEST_DIR_JS . 'app.min.js', [], false, true);
});




add_action('after_setup_theme', function(){
    add_theme_support('post-thumbnails');
    add_theme_support('title-tag');
    add_theme_support('post-formats', ['aside', 'video']);
});