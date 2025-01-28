<?php
/*
Template Name: Calculators
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

    <section class="calculator">
        <div class="calculator__btn-wrapp">
            <button class="calculator__tab active" data-calculator="repair">
                <?php _e('Калькулятор вартості ремонту', 'budguru'); ?>
            </button>
            <button class="calculator__tab" data-calculator="design">
                <?php _e('Калькулятор вартості дизайну', 'budguru'); ?>
            </button>
        </div>
        
        <div class="calculator__container">
            <div class="calculator__ilustration">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/calculator/calculator.webp" 
                    width="740" height="770" 
                    alt="<?php _e('Калькулятор', 'budguru'); ?>">
            </div>

            <div class="calculator__steps">
                <!-- Контейнери для калькуляторів -->
                <div class="calculator-container active" data-calculator="repair">
                    <?php include get_template_directory() . '/template-parts/calculators/repair-calculator.php'; ?>
                </div>
                
                <div class="calculator-container" data-calculator="design">
                    <?php include get_template_directory() . '/template-parts/calculators/design-calculator.php'; ?>
                </div>
            </div>
        </div>
    </section>

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

    <?php get_template_part('template-parts/sections/info/why-us'); ?>

    <?php echo do_shortcode('[consultation_section]'); ?>
</main>

<?php get_footer() ?>