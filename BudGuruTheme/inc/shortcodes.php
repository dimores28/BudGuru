<?php 
function portfolio_section_shortcode($atts) {
    ob_start();
    include get_template_directory() . '/template-parts/sections/portfolio-section.php';
    return ob_get_clean();
}
add_shortcode('portfolio_section', 'portfolio_section_shortcode');

function services_section_shortcode($atts) {
    ob_start();
    include get_template_directory() . '/template-parts/sections/services-section.php';
    return ob_get_clean();
}
add_shortcode('services_section', 'services_section_shortcode');

function consultation_section_shortcode() {
    ob_start();
    include get_template_directory() . '/template-parts/sections/consultation-section.php';
    return ob_get_clean();
}
add_shortcode('consultation_section', 'consultation_section_shortcode');

function projects_section_shortcode() {
    ob_start();
    include get_template_directory() . '/template-parts/sections/projects-section.php';
    return ob_get_clean();
}
add_shortcode('projects_section', 'projects_section_shortcode');

function blog_section_shortcode() {
    ob_start();
    include get_template_directory() . '/template-parts/sections/blog-section.php';
    return ob_get_clean();
}
add_shortcode('blog_section', 'blog_section_shortcode');

function hero_section_shortcode($atts) {
    // Перетворюємо атрибути в масив
    $atts = shortcode_atts(
        array(
            'title' => '',
            'show_link' => 'true' // за замовчуванням true
        ),
        $atts,
        'hero_section'
    );

    // Конвертуємо строкове значення в булеве
    $atts['show_link'] = filter_var($atts['show_link'], FILTER_VALIDATE_BOOLEAN);

    // Буферизуємо вивід
    ob_start();
    include get_template_directory() . '/template-parts/sections/hero-section.php';
    return ob_get_clean();
}
add_shortcode('hero_section', 'hero_section_shortcode'); 


function calculator_shortcode($atts) {
    // Буферизуємо вивід
    ob_start();
    
    // Підключаємо шаблон
    include get_template_directory() . '/template-parts/sections/calculator-section.php';
    
    // Повертаємо результат
    return ob_get_clean();
}
add_shortcode('calculator', 'calculator_shortcode'); 