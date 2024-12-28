<?php 
function portfolio_section_shortcode($atts) {
    ob_start();
    include get_template_directory() . '/template-parts/sections/portfolio-section.php';
    return ob_get_clean();
}
add_shortcode('portfolio_section', 'portfolio_section_shortcode');