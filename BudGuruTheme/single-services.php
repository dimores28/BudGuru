<?php
get_header();

if (have_posts()) :
    while (have_posts()) : the_post();
        // Детальна інформація про послугу
        get_template_part('template-parts/service-single');
    endwhile;
endif;

get_footer(); 