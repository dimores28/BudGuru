<?php
/*
Template Name: Services
*/
?>

<?php get_header() ?>

<main class="page">
    <?php echo do_shortcode('[hero_section title="Наші <span>послуги</span>" show_link="false"]'); ?>
    <?php get_template_part('template-parts/sections/partners-section'); ?>

    <?php echo do_shortcode('[portfolio_section]'); ?>
</main>

<?php get_footer() ?>