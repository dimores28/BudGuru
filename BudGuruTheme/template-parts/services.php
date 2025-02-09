<?php
/*
Template Name: Services
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

        // Отримуємо URL та alt текст головного зображення
        $post_thumbnail_id = get_post_thumbnail_id(get_the_ID());
        $bg_image = get_the_post_thumbnail_url(get_the_ID(), 'full');
        $bg_alt = get_post_meta($post_thumbnail_id, '_wp_attachment_image_alt', true);
        
        // Передаємо параметри bg_image та bg_alt тільки якщо є зображення
        $shortcode_args = array(
            'title' => sprintf('%s <span>%s</span>', 
                implode(' ', $first_part), 
                implode(' ', $second_part)
            ),
            'show_link' => 'false'
        );

        // Додаємо параметри зображення тільки якщо воно є
        if ($bg_image) {
            $shortcode_args['bg_image'] = $bg_image;
            $shortcode_args['bg_alt'] = esc_attr($bg_alt);
        }
        
        // Формуємо шорткод
        $shortcode = '[hero_section';
        foreach ($shortcode_args as $key => $value) {
            $shortcode .= sprintf(' %s="%s"', $key, $value);
        }
        $shortcode .= ']';
        
        echo do_shortcode($shortcode);
    ?>

    <?php echo do_shortcode('[services_section]'); ?>


    <?php get_template_part('template-parts/sections/partners-section'); ?>

    <?php get_template_part('template-parts/sections/info/videoplayer'); ?>

    <?php echo do_shortcode('[consultation_section]'); ?>

 

    <?php get_template_part('template-parts/sections/info/why-us'); ?>

    <?php echo do_shortcode('[portfolio_section]'); ?>

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

    <?php get_template_part('template-parts/sections/info/stages-work'); ?>

    <?php get_template_part('template-parts/sections/reviews-slider'); ?>

    <?php echo do_shortcode('[calculator]'); ?>

    <?php get_template_part('template-parts/sections/info/faq'); ?>

    <?php get_template_part('template-parts/sections/clients-section'); ?>

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

    <?php get_template_part('template-parts/sections/certificates-slider'); ?>

    <?php echo do_shortcode('[blog_section]'); ?>

    
</main>

<?php get_footer() ?>