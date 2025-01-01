<?php
/*
Template Name: About
*/
?>

<?php get_header() ?>

<main class="page">
    <?php echo do_shortcode('[hero_section title="Про нашу <span>компанію</span>" show_link="false"]'); ?>
    <?php get_template_part('template-parts/sections/clients-section'); ?>
    <?php echo do_shortcode('[portfolio_section]'); ?>
</main>

<?php get_footer() ?>