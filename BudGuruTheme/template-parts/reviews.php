<?php
/*
Template Name: Reviews
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

    <?php get_template_part('template-parts/sections/reviews-slider'); ?>

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

    <?php echo do_shortcode('[consultation_section]'); ?>
</main>

<?php get_footer() ?>