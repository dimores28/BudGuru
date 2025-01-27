<?php
/*
Template Name: Vacancies
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


    <section class="vacancies">
        <div class="vacancies__container">
            <h2 class="vacancies__heading h2">
                <?php _e('Наші <span>вакансії</span>', 'budguru'); ?>
            </h2>

            <div class="vacancies__bord">

            <?php foreach(getJobs() as $job): ?>
                <div class="vacancies__announcement announcement">
                    <div class="announcement__text-block">
                        <h4 class="announcement__title">
                            <?php echo $job['title']; ?>
                        </h4>

                        <p class="announcement__desc">
                            <svg width="20" height="27" viewBox="0 0 20 27" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M10.0013 12.8334C9.11725 12.8334 8.2694 12.4822 7.64428 11.8571C7.01916 11.232 6.66797 10.3841 6.66797 9.50008C6.66797 8.61603 7.01916 7.76818 7.64428 7.14306C8.2694 6.51794 9.11725 6.16675 10.0013 6.16675C10.8854 6.16675 11.7332 6.51794 12.3583 7.14306C12.9834 7.76818 13.3346 8.61603 13.3346 9.50008C13.3346 9.93782 13.2484 10.3713 13.0809 10.7757C12.9134 11.1801 12.6679 11.5476 12.3583 11.8571C12.0488 12.1666 11.6813 12.4122 11.2769 12.5797C10.8725 12.7472 10.439 12.8334 10.0013 12.8334ZM10.0013 0.166748C7.52595 0.166748 5.15198 1.15008 3.40164 2.90042C1.6513 4.65076 0.667969 7.02473 0.667969 9.50008C0.667969 16.5001 10.0013 26.8334 10.0013 26.8334C10.0013 26.8334 19.3346 16.5001 19.3346 9.50008C19.3346 7.02473 18.3513 4.65076 16.601 2.90042C14.8506 1.15008 12.4767 0.166748 10.0013 0.166748Z" fill="#F9C98C" />
                            </svg>
                            <span><?php echo $job['city']; ?></span> 
                            <span><?php echo $job['salaty']; ?></span>
                        </p>
                    </div>
                    <div class="announcement__action">
                        <a href="<?php echo $job['link']; ?>" class="announcement__link btn">
                            <?php _e('Детальніше', 'budguru'); ?>
                        </a>
                    </div>
                </div>
            <?php endforeach; ?> 

            </div>

            <div class="job-desc">
                <div class="job-desc__block">
                    <h3 class="job-desc__title">
                        <?php _e('Ми пропонуємо:', 'budguru'); ?>
                    </h3>

                    <?php if($benefits = get_field('benefits')): ?>
                        <?php echo $benefits; ?>
                    <?php endif; ?>
                </div>

                <div class="job-desc__block">
                    <h3 class="job-desc__title">
                        <?php _e('Вимоги до кандидатів', 'budguru'); ?>
                    </h3>

                    <?php if($requirements = get_field('requirements')): ?>
                        <?php echo $requirements; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>

    <?php echo do_shortcode('[consultation_section]'); ?>

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
</main>

<?php get_footer() ?>