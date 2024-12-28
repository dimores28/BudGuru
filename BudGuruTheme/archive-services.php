<?php
get_header();

if (have_posts()) :
    echo '<div class="services-grid">';
    while (have_posts()) : the_post();
        // Карточка послуги
        get_template_part('template-parts/service-card');
    endwhile;
    echo '</div>';
endif;

get_footer(); 