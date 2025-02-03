<?php get_header(); ?>

<main class="page">
	<?php
        $page_title = get_the_title();
        $words = explode(' ', $page_title);

        $middle = ceil(count($words) / 2);
        $first_part = array_slice($words, 0, $middle);
        $second_part = array_slice($words, $middle);

        echo do_shortcode(sprintf('[hero_section title="%s <span>%s</span>" show_link="false"]', implode(' ', $first_part), implode(' ', $second_part)));
    ?>

	<?php get_template_part('template-parts/sections/partners-section'); ?>

	<?php get_template_part('template-parts/sections/info/videoplayer'); ?>

	<section class="consultation" id="consultation-section">
		<div class="consultation__container">
			<div class="consultation__content">
				<div class="consultation__head-block">
					<h3 class="consultation__heading">
						<?php _e('Потрібна', 'budguru'); ?> <span><?php _e('консультація спеціаліста?', 'budguru'); ?></span>
					</h3>
				</div>

				<div class="consultation__form-wrap">
					<form class="consultation__form">
						<div class="consultation__field-wrap">
							<p class="consultation__text">
								<?php _e('Якщо вам потрібна консультація спеціаліста по ремонту чи дизайну чи у вас є будь-які запитанняя, вкажіть їх у формі нижче і наші спеціалісти звʼяжуться з вами найближчим часом!', 'budguru'); ?>
							</p>

							<input class="consultation__form-input" 
								type="text" 
								id="user-name" 
								name="user-name" 
								placeholder="<?php _e('Ваше імʼя', 'budguru'); ?>" 
								aria-label="<?php _e('Ваше імʼя', 'budguru'); ?>">
							
							<input class="consultation__form-input" 
								type="text" 
								id="input-phone" 
								name="phone" 
								placeholder="<?php _e('Номер телефону', 'budguru'); ?>" 
								aria-label="<?php _e('Номер телефону', 'budguru'); ?>" />

							<input class="consultation__form-input" 
								type="text" 
								id="consultation-package" 
								name="consultation-package" 
								placeholder="<?php _e('Пакет', 'budguru'); ?>" 
								aria-label="<?php _e('Пакет', 'budguru'); ?>" />
							
							<textarea class="consultation__form-input consultation__form-textarea" 
									name="question" 
									id="input-question" 
									placeholder="<?php _e('Ваше питання', 'budguru'); ?>" 
									aria-label="<?php _e('Ваше питання', 'budguru'); ?>"></textarea>
							
							<input class="consultation__btn-submit btn" 
								type="submit" 
								value="<?php _e('Відправити заявку', 'budguru'); ?>" 
								aria-label="<?php _e('Відправити заявку', 'budguru'); ?>">
						</div>

						<div class="consultation__form-success form-success">
							<img src="<?php echo get_template_directory_uri(); ?>/assets/img/smile.webp" 
								class="form-success__img" 
								width="120" 
								height="120" 
								alt="smile">
							<div class="form-success__heading">
								<?php _e('Дякуємо за звернення!', 'budguru'); ?>
							</div>
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
					alt="form illustration">
			</div>
		</div>
	</section> 

    <?php if (have_posts()) : while (have_posts()) : the_post(); 
        $service_type = get_field('display_option');
        
        if($service_type == 'Таблиця'): 
            // Отримуємо дані для таблиці
            $prices = get_field('table');
        ?>
            <section class="design-prices">
                <div class="design-prices__container">
                    <h2 class="design-prices__heading h2">
                        <?php the_title(); ?>
                    </h2>

                    <!-- Ваш існуючий код таблиці -->
                    <div class="design-prices__table-wrap">
                    	<table class="design-prices__table table">
							<thead class="table__header">
								<tr class="table__row">
									<th class="table__head table__head--packages"><?php _e('Пакети', 'budguru'); ?></th>
									<th class="table__head table__head--visual"><?php _e('Візуальний', 'budguru'); ?></th>
									<th class="table__head table__head--technical"><?php _e('Технічний', 'budguru'); ?></th>
									<th class="table__head table__head--all-included"><?php _e('Все враховано', 'budguru'); ?></th>
									<th class="table__head table__head--maximum"><?php _e('Максимальний', 'budguru'); ?></th>
								</tr>
							</thead>
							<tbody class="table__body">
								<?php if($prices['price_table_row']): 
									foreach($prices['price_table_row'] as $row): 
										if($row['empty_row']): ?>
											<tr class="table__row table__row-divider">
												<td class="table__cell table__cell--title"><?php echo $row['row_name']; ?></td>
												<td class="table__cell"></td>
												<td class="table__cell"></td>
												<td class="table__cell"></td>
												<td class="table__cell"></td>
											</tr>
										<?php else: ?>
											<tr class="table__row">
												<td class="table__cell table__cell--title"><?php echo $row['row_name']; ?></td>
												
												<td class="table__cell">
													<?php if(!$row['visual_option']): ?>
														<svg width="38" height="39" viewBox="0 0 38 39" fill="none" xmlns="http://www.w3.org/2000/svg">
															<rect x="0.507812" y="0.640625" width="37" height="37" stroke="white" />
														</svg>
													<?php else: ?>
														<svg width="38" height="39" viewBox="0 0 38 39" fill="none" xmlns="http://www.w3.org/2000/svg">
															<rect x="0.0078125" y="0.140625" width="38" height="38" fill="white" />
															<path d="M32.5059 11.6384L14.5059 29.6384L6.25586 21.3884L8.37086 19.2734L14.5059 25.3934L30.3909 9.52344L32.5059 11.6384Z" fill="#1E1E1E" />
														</svg>
													<?php endif; ?>
												</td>
												
												<td class="table__cell">
													<?php if(!$row['tehnical_option']): ?>
														<svg width="38" height="39" viewBox="0 0 38 39" fill="none" xmlns="http://www.w3.org/2000/svg">
															<rect x="0.507812" y="0.640625" width="37" height="37" stroke="white" />
														</svg>
													<?php else: ?>
														<svg width="38" height="39" viewBox="0 0 38 39" fill="none" xmlns="http://www.w3.org/2000/svg">
															<rect x="0.0078125" y="0.140625" width="38" height="38" fill="white" />
															<path d="M32.5059 11.6384L14.5059 29.6384L6.25586 21.3884L8.37086 19.2734L14.5059 25.3934L30.3909 9.52344L32.5059 11.6384Z" fill="#1E1E1E" />
														</svg>
													<?php endif; ?>
												</td>
												
												<td class="table__cell">
													<?php if(!$row['all_option']): ?>
														<svg width="38" height="39" viewBox="0 0 38 39" fill="none" xmlns="http://www.w3.org/2000/svg">
															<rect x="0.507812" y="0.640625" width="37" height="37" stroke="#1E1E1E" />
														</svg>
													<?php else: ?>
														<svg width="36" height="37" viewBox="0 0 36 37" style="background: #1E1E1E;" xmlns="http://www.w3.org/2000/svg">
															<path d="M31.5059 10.6384L13.5059 28.6384L5.25586 20.3884L7.37086 18.2734L13.5059 24.3934L29.3909 8.52344L31.5059 10.6384Z" fill="white" />
														</svg>
													<?php endif; ?>
												</td>
												
												<td class="table__cell">
													<?php if(!$row['max_option']): ?>
														<svg width="38" height="39" viewBox="0 0 38 39" fill="none" xmlns="http://www.w3.org/2000/svg">
															<rect x="0.507812" y="0.640625" width="37" height="37" stroke="white" />
														</svg>
													<?php else: ?>
														<svg width="38" height="39" viewBox="0 0 38 39" fill="none" xmlns="http://www.w3.org/2000/svg">
															<rect x="0.0078125" y="0.140625" width="38" height="38" fill="white" />
															<path d="M32.5059 11.6384L14.5059 29.6384L6.25586 21.3884L8.37086 19.2734L14.5059 25.3934L30.3909 9.52344L32.5059 11.6384Z" fill="#1E1E1E" />
														</svg>
													<?php endif; ?>
												</td>
											</tr>
										<?php endif;
									endforeach;
								endif; ?>

								<tr class="table__row table__row-divider table__row-last">
									<td class="table__cell table__cell--title"><?php _e('Вартість:', 'budguru'); ?></td>
									<td class="table__cell">
										<?php echo $prices['vizual']; ?>
										<a href="#consultation-section" class="table__link" data-package="<?php _e('Візуальний', 'budguru'); ?>" aria-label="<?php _e('Замовити', 'budguru'); ?>"><?php _e('Замовити', 'budguru'); ?></a>
									</td>
									<td class="table__cell">
										<?php echo $prices['tehnical']; ?>
										<a href="#consultation-section" class="table__link" data-package="<?php _e('Технічний', 'budguru'); ?>" aria-label="<?php _e('Замовити', 'budguru'); ?>"><?php _e('Замовити', 'budguru'); ?></a>
									</td>
									<td class="table__cell">
										<?php echo $prices['everything_considered'] ?? '32$/m2'; ?>
										<a href="#consultation-section" class="table__link" data-package="<?php _e('Все враховано', 'budguru'); ?>" aria-label="<?php _e('Замовити', 'budguru'); ?>"><?php _e('Замовити', 'budguru'); ?></a>
									</td>
									<td class="table__cell">
										<?php echo $prices['maximum'] ?? '45$/m2'; ?>
										<a href="#consultation-section" class="table__link" data-package="<?php _e('Максимальний', 'budguru'); ?>" aria-label="<?php _e('Замовити', 'budguru'); ?>"><?php _e('Замовити', 'budguru'); ?></a>
									</td>
								</tr>

							</tbody>
						</table>
                    </div>
                </div>
            </section>

        <?php elseif($service_type == 'Список'): 
            // Отримуємо дані для списку
            $list_items = get_field('list');
        ?>
            <section class="prices">
                <div class="prices__container">
                    <h2 class="prices__heading">
                        <?php the_title(); ?>
                    </h2>
					
                    <div class="prices__row">
                        <?php if($list_items): 
                            foreach($list_items['row'] as $item): ?>
                                <div class="price">
                                    <h3 class="price__heading">
                                        <?php echo $item['title']; ?>
                                    </h3>

                                    <div class="price__desc">
                                        <p class="price__text">
                                            <?php echo $item['desc']; ?>
                                        </p>
                                        <a href="#consultation-section" class="price__btn btn">
                                            <?php _e('Замовити', 'budguru'); ?>
                                        </a>
                                    </div>
                                </div>
                            <?php endforeach;
                        endif; ?>
                    </div>
                </div>
            </section>
        <?php endif; ?>

    <?php endwhile; endif; ?>


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

	<?php get_template_part('template-parts/sections/clients-section'); ?>

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

	<?php echo do_shortcode('[blog_section]'); ?>
</main>

<?php get_footer(); ?>