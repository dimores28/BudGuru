<?php
/*
Template Name: Home
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

        <?php get_template_part('template-parts/sections/info/about'); ?>

        <?php get_template_part('template-parts/sections/info/videoplayer'); ?>

        <?php echo do_shortcode('[consultation_section]'); ?>

        <?php echo do_shortcode('[services_section]'); ?>

        <?php get_template_part('template-parts/sections/team-slider'); ?>

        <?php get_template_part('template-parts/sections/info/why-us'); ?>

        <?php echo do_shortcode('[portfolio_section]'); ?>


        <?php 
            $section_heading = get_field('section_heading');
            $text_section = get_field('text_section');
            $section_img = get_field('section_img');
        
        if ($section_heading && $text_section && $section_img): 
        ?>
            <section class="man_hour">
                <div class="man_hour__container">
                    <h2 class="man_hour__heading h2">
                        <?php echo $section_heading; ?>
                    </h2>

                    <div class="man_hour__content post-content">
                        <div class="man_hour__text-box">
                             <?php echo $text_section; ?>
                        </div>

                        <div class="man_hour__illustration">
                            <img src="<?php echo $section_img; ?>" 
                                width="552" 
                                height="598" 
                                alt="<?php echo get_field('section_alt'); ?>"
                            >
                        </div>
                    </div>
                </div>
            </section>
        <?php endif; ?>

        <?php get_template_part('template-parts/sections/info/stages-work'); ?>

        <?php get_template_part('template-parts/sections/reviews-slider'); ?>

        <?php echo do_shortcode('[calculator]'); ?>

        <?php get_template_part('template-parts/sections/info/faq'); ?>

        <?php get_template_part('template-parts/sections/partners-section'); ?>

        <?php 
        $content = get_the_content();
        if (!empty($content)): 
        ?>
            <article class="post-content">
                <div class="post-content__container">
                    <?php the_content(); ?>
                </div>
            </article>
        <?php endif; ?>

        <?php get_template_part('template-parts/sections/certificates-slider'); ?>

        <?php echo do_shortcode('[projects_section]'); ?>

        <?php echo do_shortcode('[blog_section]'); ?>

    </main>

<?php get_footer() ?>