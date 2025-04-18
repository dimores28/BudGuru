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
									<?php 
									if($prices['columns']): 
										foreach($prices['columns'] as $key => $column): 
											$column_class = ($key === 2) ? 'table__head--all-included' : 'table__head--technical';
										?>
											<th class="table__head <?php echo $column_class; ?>">
												<?php echo $column['column_name']; ?>
											</th>
										<?php 
										endforeach;
									endif; 
									?>
								</tr>
							</thead>
							<tbody class="table__body">
								<?php if($prices['price_table_row']): 
									foreach($prices['price_table_row'] as $row): 
										if($row['empty_row']): ?>
											<tr class="table__row table__row-divider">
												<td class="table__cell table__cell--title"><?php echo $row['row_name']; ?></td>
												<?php 
												if($prices['columns']): 
													foreach($prices['columns'] as $column): ?>
														<td class="table__cell"></td>
													<?php 
													endforeach;
												endif; 
												?>
											</tr>
										<?php else: ?>
											<tr class="table__row">
												<td class="table__cell table__cell--title"><?php echo $row['row_name']; ?></td>
												
												<?php 
												if($prices['columns']): 
													foreach($prices['columns'] as $key => $column): 
														$option_value = $row['column_options'][$key]['option_enabled'] ?? false;
														?>
														<td class="table__cell">
															<?php if(!$option_value): ?>
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
													<?php 
													endforeach;
												endif; 
												?>
											</tr>
										<?php endif;
									endforeach;
								endif; ?>

								<tr class="table__row table__row-divider table__row-last">
									<td class="table__cell table__cell--title"><?php _e('Вартість:', 'budguru'); ?></td>
									<?php 
									if($prices['columns']): 
										foreach($prices['columns'] as $column): ?>
											<td class="table__cell">
												<p class="table__price">
													<?php echo $column['price']; ?>
												</p>
												<a href="#consultation-section" 
													class="table__link" 
													data-package="<?php echo $column['column_name']; ?>" 
													aria-label="<?php _e('Замовити', 'budguru'); ?>">
													<?php _e('Замовити', 'budguru'); ?>
												</a>
											</td>
										<?php 
										endforeach;
									endif; 
									?>
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

	<?php
	// Додаємо секцію дочірніх послуг, якщо вони є
	$child_services = getServices(get_the_ID());
	if (!empty($child_services)): ?>
		<section class="our-services">
			<div class="our-services__container">
				<div class="our-services__head-block">
					<h2 class="our-services__heding">
						<?php _e('Додаткові', 'budguru'); ?> <span><?php _e('послуги', 'budguru'); ?></span>
					</h2>
				</div>

				<?php 
					$total_services = count($child_services);

					for($i = 0; $i < $total_services; $i += 2): 
						// Перевіряємо чи є пара сервісів
						if(isset($child_services[$i])): 
					?>
						<div class="our-services__row">
							<!-- Перший сервіс (малий) -->
							<div class="our-services__smal-col">
								<a href="<?php echo $child_services[$i]['link']; ?>" 
									class="our-services__smal-col_link"
									aria-label="<?php 
										printf(
											/* translators: %s: service title */
											__('Перейти до послуги: %s', 'budguru'), 
											$child_services[$i]['title']
										); 
									?>">
									<svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M23.3031 1.74685L1.14708 23.9029M23.3031 1.74685L23.2357 20.6704M23.3031 1.74685L4.37957 1.81419" stroke="#1E1E1E" stroke-width="1.58" stroke-linecap="round" stroke-linejoin="round" />
									</svg>
								</a>
								<img src="<?php echo $child_services[$i]['img']; ?>" alt="<?php echo $child_services[$i]['title']; ?>" width="600" height="400" class="our-services__img">
								<div class="our-services__desc">
									<h3 class="our-services__text">
										<a href="<?php echo $child_services[$i]['link']; ?>" 
										aria-label="<?php 
											printf(
												/* translators: %s: service title */
												__('Перейти до послуги: %s', 'budguru'), 
												$child_services[$i]['title']
											); 
										?>">
											<?php echo $child_services[$i]['title']; ?>
											<?php if($child_services[$i]['has_children']): ?>
												<span class="service-has-children"></span>
											<?php endif; ?>
										</a>
									</h3>
								</div>
							</div>

							<!-- Другий сервіс (великий), якщо існує -->
							<?php if(isset($child_services[$i + 1])): ?>
								<div class="our-services__big-col">
									<a href="<?php echo $child_services[$i + 1]['link']; ?>" 
										class="our-services__big-col_link our-services__big-col_link-mobile"
										aria-label="<?php 
											printf(
												/* translators: %s: service title */
												__('Перейти до послуги: %s', 'budguru'), 
												$child_services[$i + 1]['title']
											); 
										?>">
										<svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path d="M23.3031 1.74685L1.14708 23.9029M23.3031 1.74685L23.2357 20.6704M23.3031 1.74685L4.37957 1.81419" stroke="#1E1E1E" stroke-width="1.58" stroke-linecap="round" stroke-linejoin="round" />
										</svg>
									</a>
									<img src="<?php echo $child_services[$i + 1]['img']; ?>" alt="<?php echo $child_services[$i + 1]['title']; ?>" width="970" height="400" class="our-services__img">
									<div class="our-services__desc">
										<h3 class="our-services__text">
											<a href="<?php echo $child_services[$i + 1]['link']; ?>" 
											aria-label="<?php 
												printf(
													/* translators: %s: service title */
													__('Перейти до послуги: %s', 'budguru'), 
													$child_services[$i + 1]['title']
												); 
											?>">
												<?php echo $child_services[$i + 1]['title']; ?>
												<?php if($child_services[$i + 1]['has_children']): ?>
													<span class="service-has-children"></span>
												<?php endif; ?>
											</a>
										</h3>
										<a href="<?php echo $child_services[$i + 1]['link']; ?>" 
											class="our-services__big-col_link"
											aria-label="<?php 
												printf(
													/* translators: %s: service title */
													__('Перейти до послуги: %s', 'budguru'), 
													$child_services[$i + 1]['title']
												); 
											?>">
											<svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
												<path d="M23.3031 1.74685L1.14708 23.9029M23.3031 1.74685L23.2357 20.6704M23.3031 1.74685L4.37957 1.81419" stroke="#1E1E1E" stroke-width="1.58" stroke-linecap="round" stroke-linejoin="round" />
											</svg>
										</a>
									</div>
								</div>
							<?php endif; ?>
						</div>
					<?php 
						endif;
					endfor; 
				?>
			</div>
		</section>
	<?php endif; ?>
</main>

<?php get_footer(); ?>