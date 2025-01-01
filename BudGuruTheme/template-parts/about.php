<?php
/*
Template Name: About
*/
?>

<?php get_header() ?>

<main class="page">
    <?php
        $page_title = get_the_title();
        $words = explode(' ', $page_title);

        $middle = ceil(count($words) / 2);
        $first_part = array_slice($words, 0, $middle);
        $second_part = array_slice($words, $middle);

        echo do_shortcode(sprintf(
            '[hero_section title="%s <span>%s</span>" show_link="false"]',
            implode(' ', $first_part),
            implode(' ', $second_part)
        ));
    ?>
    
    <?php get_template_part('template-parts/sections/clients-section'); ?>
    <?php echo do_shortcode('[portfolio_section]'); ?>
</main>

<?php get_footer() ?>