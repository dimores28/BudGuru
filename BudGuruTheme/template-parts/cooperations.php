<?php
/*
Template Name: Cooperations
*/
?>

<?php get_header(); ?>

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
        
        $shortcode_args = array(
            'title' => sprintf('%s <span>%s</span>', 
                implode(' ', $first_part), 
                implode(' ', $second_part)
            ),
            'show_link' => 'false'
        );

        if ($bg_image) {
            $shortcode_args['bg_image'] = $bg_image;
            $shortcode_args['bg_alt'] = esc_attr($bg_alt);
        }
        
        $shortcode = '[hero_section';
        foreach ($shortcode_args as $key => $value) {
            $shortcode .= sprintf(' %s="%s"', $key, $value);
        }
        $shortcode .= ']';
        
        echo do_shortcode($shortcode);
    ?>

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

    <section class="consultation" aria-label="<?php _e('Форма заявки на співпрацю', 'budguru'); ?>">
        <div class="consultation__container">
            <div class="consultation__content">
                <div class="consultation__head-block">
                    <h2 class="consultation__heading">
                        <?php echo wp_kses(
                            __('<span>Заявка</span> на співпрацю', 'budguru'),
                            array('span' => array())
                        ); ?>
                    </h2>
                </div>

                <div class="consultation__form-wrap">
                    <form class="cooperation__form" 
                          id="cooperation-form"
                          aria-label="<?php _e('Форма для подання заявки на співпрацю', 'budguru'); ?>">

                        <div class="consultation__field-wrap">
                            <p class="consultation__text">
                                <?php _e('Якщо ви хочете звернутися до нас із пропозицією про співпрацю або з інших питань, заповніть, будь ласка, форму нижче', 'budguru'); ?>
                            </p>

                            <div class="consultation__form-group">
                                <label for="user-name" class="visually-hidden">
                                    <?php _e('Ваше імʼя', 'budguru'); ?>
                                </label>
                                <input class="consultation__form-input" 
                                       type="text" 
                                       id="user-name" 
                                       name="user-name"
                                       placeholder="<?php esc_attr_e('Ваше імʼя', 'budguru'); ?>" 
                                       required>

                                <label for="company" class="visually-hidden">
                                    <?php _e('Компанія', 'budguru'); ?>
                                </label>
                                <input class="consultation__form-input" 
                                       type="text" 
                                       id="company" 
                                       name="company"
                                       placeholder="<?php esc_attr_e('Компанія', 'budguru'); ?>" 
                                       required>
                            </div>

                            <div class="consultation__form-group">
                                <label for="input-phone" class="visually-hidden">
                                    <?php _e('Номер телефону', 'budguru'); ?>
                                </label>
                                <input class="consultation__form-input" 
                                       type="tel" 
                                       id="input-phone" 
                                       name="phone"
                                       placeholder="<?php esc_attr_e('Номер телефону', 'budguru'); ?>" 
                                       required>

                                <label for="site-url" class="visually-hidden">
                                    <?php _e('Сайт компанії', 'budguru'); ?>
                                </label>
                                <input class="consultation__form-input" 
                                       type="url" 
                                       id="site-url" 
                                       name="site-url"
                                       placeholder="<?php esc_attr_e('Сайт компанії', 'budguru'); ?>">
                            </div>

                            <label for="input-question" class="visually-hidden">
                                <?php _e('Суть звернення', 'budguru'); ?>
                            </label>
                            <textarea class="consultation__form-input consultation__form-textarea"
                                      name="question" 
                                      id="input-question" 
                                      placeholder="<?php esc_attr_e('Напишіть суть вашого звернення', 'budguru'); ?>"
                                      required></textarea>

                            <button type="submit" 
                                    class="consultation__btn-submit btn">
                                <?php _e('Відправити заявку', 'budguru'); ?>
                            </button>
                        </div>

                        <div class="consultation__form-success form-success" 
                             role="alert" 
                             aria-hidden="true">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/smile.webp" 
                                 class="form-success__img" 
                                 width="120" 
                                 height="120"
                                 alt=""
                                 aria-hidden="true">
                            <h3 class="form-success__heading">
                                <?php _e('Дякуємо за звернення!', 'budguru'); ?>
                            </h3>
                            <p class="form-success__text">
                                <?php _e('Наші спеціалісти звʼяжуться з вами найближчим часом!', 'budguru'); ?>
                            </p>
                        </div>
                    </form>
                </div>
            </div>

            <div class="consultation__illustration">
                <img class="consultation__img" 
                     src="<?php echo get_template_directory_uri(); ?>/assets/img/Rectangle26103829.webp" 
                     width="740" 
                     height="720"
                     alt=""
                     aria-hidden="true">
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>