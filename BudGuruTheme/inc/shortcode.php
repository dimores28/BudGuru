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