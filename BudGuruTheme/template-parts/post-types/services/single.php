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

	<?php echo do_shortcode('[consultation_section]'); ?>

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
								<tr class="table__row">
									<td class="table__cell table__cell--title"><?php _e('Склад проекту', 'budguru'); ?></td>
									<td class="table__cell">
										<svg width="38" height="39" viewBox="0 0 38 39" fill="none" xmlns="http://www.w3.org/2000/svg">
											<rect x="0.0078125" y="0.140625" width="38" height="38" fill="white" />
											<path d="M32.5059 11.6384L14.5059 29.6384L6.25586 21.3884L8.37086 19.2734L14.5059 25.3934L30.3909 9.52344L32.5059 11.6384Z" fill="#1E1E1E" />
										</svg>
									</td>
									<td class="table__cell">
										<svg width="38" height="39" viewBox="0 0 38 39" fill="none" xmlns="http://www.w3.org/2000/svg">
											<rect x="0.0078125" y="0.140625" width="38" height="38" fill="white" />
											<path d="M32.5059 11.6384L14.5059 29.6384L6.25586 21.3884L8.37086 19.2734L14.5059 25.3934L30.3909 9.52344L32.5059 11.6384Z" fill="#1E1E1E" />
										</svg>
									</td>
									<td class="table__cell">
										<svg width="36" height="37" viewBox="0 0 36 37" style="background: #1E1E1E;" xmlns="http://www.w3.org/2000/svg">
											<path d="M31.5059 10.6384L13.5059 28.6384L5.25586 20.3884L7.37086 18.2734L13.5059 24.3934L29.3909 8.52344L31.5059 10.6384Z" fill="white" />
										</svg>
									</td>
									<td class="table__cell">
										<svg width="38" height="39" viewBox="0 0 38 39" fill="none" xmlns="http://www.w3.org/2000/svg">
											<rect x="0.0078125" y="0.140625" width="38" height="38" fill="white" />
											<path d="M32.5059 11.6384L14.5059 29.6384L6.25586 21.3884L8.37086 19.2734L14.5059 25.3934L30.3909 9.52344L32.5059 11.6384Z" fill="#1E1E1E" />
										</svg>
									</td>
								</tr>

								<tr class="table__row">
									<td class="table__cell table__cell--title"><?php _e('Обмірний план', 'budguru'); ?></td>
									<td class="table__cell">
										<svg width="38" height="39" viewBox="0 0 38 39" fill="none" xmlns="http://www.w3.org/2000/svg">
											<rect x="0.0078125" y="0.140625" width="38" height="38" fill="white" />
											<path d="M32.5059 11.6384L14.5059 29.6384L6.25586 21.3884L8.37086 19.2734L14.5059 25.3934L30.3909 9.52344L32.5059 11.6384Z" fill="#1E1E1E" />
										</svg>
									</td>
									<td class="table__cell">
										<svg width="38" height="39" viewBox="0 0 38 39" fill="none" xmlns="http://www.w3.org/2000/svg">
											<rect x="0.0078125" y="0.140625" width="38" height="38" fill="white" />
											<path d="M32.5059 11.6384L14.5059 29.6384L6.25586 21.3884L8.37086 19.2734L14.5059 25.3934L30.3909 9.52344L32.5059 11.6384Z" fill="#1E1E1E" />
										</svg>
									</td>
									<td class="table__cell">
										<svg width="36" height="37" viewBox="0 0 36 37" style="background: #1E1E1E;" xmlns="http://www.w3.org/2000/svg">
											<path d="M31.5059 10.6384L13.5059 28.6384L5.25586 20.3884L7.37086 18.2734L13.5059 24.3934L29.3909 8.52344L31.5059 10.6384Z" fill="white" />
										</svg>
									</td>
									<td class="table__cell">
										<svg width="38" height="39" viewBox="0 0 38 39" fill="none" xmlns="http://www.w3.org/2000/svg">
											<rect x="0.0078125" y="0.140625" width="38" height="38" fill="white" />
											<path d="M32.5059 11.6384L14.5059 29.6384L6.25586 21.3884L8.37086 19.2734L14.5059 25.3934L30.3909 9.52344L32.5059 11.6384Z" fill="#1E1E1E" />
										</svg>
									</td>
								</tr>

								<tr class="table__row">
									<td class="table__cell table__cell--title"><?php _e('План розташування стін', 'budguru'); ?></td>
									<td class="table__cell">
										<svg width="38" height="39" viewBox="0 0 38 39" fill="none" xmlns="http://www.w3.org/2000/svg">
											<rect x="0.0078125" y="0.140625" width="38" height="38" fill="white" />
											<path d="M32.5059 11.6384L14.5059 29.6384L6.25586 21.3884L8.37086 19.2734L14.5059 25.3934L30.3909 9.52344L32.5059 11.6384Z" fill="#1E1E1E" />
										</svg>
									</td>
									<td class="table__cell">
										<svg width="38" height="39" viewBox="0 0 38 39" fill="none" xmlns="http://www.w3.org/2000/svg">
											<rect x="0.0078125" y="0.140625" width="38" height="38" fill="white" />
											<path d="M32.5059 11.6384L14.5059 29.6384L6.25586 21.3884L8.37086 19.2734L14.5059 25.3934L30.3909 9.52344L32.5059 11.6384Z" fill="#1E1E1E" />
										</svg>
									</td>
									<td class="table__cell">
										<svg width="36" height="37" viewBox="0 0 36 37" style="background: #1E1E1E;" xmlns="http://www.w3.org/2000/svg">
											<path d="M31.5059 10.6384L13.5059 28.6384L5.25586 20.3884L7.37086 18.2734L13.5059 24.3934L29.3909 8.52344L31.5059 10.6384Z" fill="white" />
										</svg>
									</td>
									<td class="table__cell">
										<svg width="38" height="39" viewBox="0 0 38 39" fill="none" xmlns="http://www.w3.org/2000/svg">
											<rect x="0.0078125" y="0.140625" width="38" height="38" fill="white" />
											<path d="M32.5059 11.6384L14.5059 29.6384L6.25586 21.3884L8.37086 19.2734L14.5059 25.3934L30.3909 9.52344L32.5059 11.6384Z" fill="#1E1E1E" />
										</svg>
									</td>
								</tr>

								<tr class="table__row">
									<td class="table__cell table__cell--title"><?php _e('Візуалізація', 'budguru'); ?></td>
									<td class="table__cell">
										<svg width="38" height="39" viewBox="0 0 38 39" fill="none" xmlns="http://www.w3.org/2000/svg">
											<rect x="0.0078125" y="0.140625" width="38" height="38" fill="white" />
											<path d="M32.5059 11.6384L14.5059 29.6384L6.25586 21.3884L8.37086 19.2734L14.5059 25.3934L30.3909 9.52344L32.5059 11.6384Z" fill="#1E1E1E" />
										</svg>
									</td>
									<td class="table__cell">
										<svg width="38" height="39" viewBox="0 0 38 39" fill="none" xmlns="http://www.w3.org/2000/svg">
											<rect x="0.507812" y="0.640625" width="37" height="37" stroke="white" />
										</svg>
									</td>
									<td class="table__cell">
										<svg width="36" height="37" viewBox="0 0 36 37" style="background: #1E1E1E;" xmlns="http://www.w3.org/2000/svg">
											<path d="M31.5059 10.6384L13.5059 28.6384L5.25586 20.3884L7.37086 18.2734L13.5059 24.3934L29.3909 8.52344L31.5059 10.6384Z" fill="white" />
										</svg>
									</td>
									<td class="table__cell">
										<svg width="38" height="39" viewBox="0 0 38 39" fill="none" xmlns="http://www.w3.org/2000/svg">
											<rect x="0.0078125" y="0.140625" width="38" height="38" fill="white" />
											<path d="M32.5059 11.6384L14.5059 29.6384L6.25586 21.3884L8.37086 19.2734L14.5059 25.3934L30.3909 9.52344L32.5059 11.6384Z" fill="#1E1E1E" />
										</svg>
									</td>
								</tr>

								<tr class="table__row">
									<td class="table__cell table__cell--title"><?php _e('Підбір матеріалів', 'budguru'); ?></td>
									<td class="table__cell">
										<svg width="38" height="39" viewBox="0 0 38 39" fill="none" xmlns="http://www.w3.org/2000/svg">
											<rect x="0.0078125" y="0.140625" width="38" height="38" fill="white" />
											<path d="M32.5059 11.6384L14.5059 29.6384L6.25586 21.3884L8.37086 19.2734L14.5059 25.3934L30.3909 9.52344L32.5059 11.6384Z" fill="#1E1E1E" />
										</svg>
									</td>
									<td class="table__cell">
										<svg width="38" height="39" viewBox="0 0 38 39" fill="none" xmlns="http://www.w3.org/2000/svg">
											<rect x="0.507812" y="0.640625" width="37" height="37" stroke="white" />
										</svg>
									</td>
									<td class="table__cell">
										<svg width="36" height="37" viewBox="0 0 36 37" style="background: #1E1E1E;" xmlns="http://www.w3.org/2000/svg">
											<path d="M31.5059 10.6384L13.5059 28.6384L5.25586 20.3884L7.37086 18.2734L13.5059 24.3934L29.3909 8.52344L31.5059 10.6384Z" fill="white" />
										</svg>
									</td>
									<td class="table__cell">
										<svg width="38" height="39" viewBox="0 0 38 39" fill="none" xmlns="http://www.w3.org/2000/svg">
											<rect x="0.0078125" y="0.140625" width="38" height="38" fill="white" />
											<path d="M32.5059 11.6384L14.5059 29.6384L6.25586 21.3884L8.37086 19.2734L14.5059 25.3934L30.3909 9.52344L32.5059 11.6384Z" fill="#1E1E1E" />
										</svg>
									</td>
								</tr>

								<tr class="table__row">
									<td class="table__cell table__cell--title"><?php _e('План розміщення меблів', 'budguru'); ?></td>
									<td class="table__cell">
										<svg width="38" height="39" viewBox="0 0 38 39" fill="none" xmlns="http://www.w3.org/2000/svg">
											<rect x="0.0078125" y="0.140625" width="38" height="38" fill="white" />
											<path d="M32.5059 11.6384L14.5059 29.6384L6.25586 21.3884L8.37086 19.2734L14.5059 25.3934L30.3909 9.52344L32.5059 11.6384Z" fill="#1E1E1E" />
										</svg>
									</td>
									<td class="table__cell">
										<svg width="38" height="39" viewBox="0 0 38 39" fill="none" xmlns="http://www.w3.org/2000/svg">
											<rect x="0.0078125" y="0.140625" width="38" height="38" fill="white" />
											<path d="M32.5059 11.6384L14.5059 29.6384L6.25586 21.3884L8.37086 19.2734L14.5059 25.3934L30.3909 9.52344L32.5059 11.6384Z" fill="#1E1E1E" />
										</svg>
									</td>
									<td class="table__cell">
										<svg width="36" height="37" viewBox="0 0 36 37" style="background: #1E1E1E;" xmlns="http://www.w3.org/2000/svg">
											<path d="M31.5059 10.6384L13.5059 28.6384L5.25586 20.3884L7.37086 18.2734L13.5059 24.3934L29.3909 8.52344L31.5059 10.6384Z" fill="white" />
										</svg>
									</td>
									<td class="table__cell">
										<svg width="38" height="39" viewBox="0 0 38 39" fill="none" xmlns="http://www.w3.org/2000/svg">
											<rect x="0.0078125" y="0.140625" width="38" height="38" fill="white" />
											<path d="M32.5059 11.6384L14.5059 29.6384L6.25586 21.3884L8.37086 19.2734L14.5059 25.3934L30.3909 9.52344L32.5059 11.6384Z" fill="#1E1E1E" />
										</svg>
									</td>
								</tr>

								<tr class="table__row">
									<td class="table__cell table__cell--title"><?php _e('План демонтажу', 'budguru'); ?></td>
									<td class="table__cell">
										<svg width="38" height="39" viewBox="0 0 38 39" fill="none" xmlns="http://www.w3.org/2000/svg">
											<rect x="0.507812" y="0.640625" width="37" height="37" stroke="white" />
										</svg>
									</td>
									<td class="table__cell">
										<svg width="38" height="39" viewBox="0 0 38 39" fill="none" xmlns="http://www.w3.org/2000/svg">
											<rect x="0.0078125" y="0.140625" width="38" height="38" fill="white" />
											<path d="M32.5059 11.6384L14.5059 29.6384L6.25586 21.3884L8.37086 19.2734L14.5059 25.3934L30.3909 9.52344L32.5059 11.6384Z" fill="#1E1E1E" />
										</svg>
									</td>
									<td class="table__cell">
										<svg width="36" height="37" viewBox="0 0 36 37" style="background: #1E1E1E;" xmlns="http://www.w3.org/2000/svg">
											<path d="M31.5059 10.6384L13.5059 28.6384L5.25586 20.3884L7.37086 18.2734L13.5059 24.3934L29.3909 8.52344L31.5059 10.6384Z" fill="white" />
										</svg>
									</td>
									<td class="table__cell">
										<svg width="38" height="39" viewBox="0 0 38 39" fill="none" xmlns="http://www.w3.org/2000/svg">
											<rect x="0.0078125" y="0.140625" width="38" height="38" fill="white" />
											<path d="M32.5059 11.6384L14.5059 29.6384L6.25586 21.3884L8.37086 19.2734L14.5059 25.3934L30.3909 9.52344L32.5059 11.6384Z" fill="#1E1E1E" />
										</svg>
									</td>
								</tr>

								<tr class="table__row">
									<td class="table__cell table__cell--title"><?php _e('План підлоги із зазначенням типу покриття, плінтуса і теплої підлоги', 'budguru'); ?></td>
									<td class="table__cell">
										<svg width="38" height="39" viewBox="0 0 38 39" fill="none" xmlns="http://www.w3.org/2000/svg">
											<rect x="0.507812" y="0.640625" width="37" height="37" stroke="white" />
										</svg>
									</td>
									<td class="table__cell">
										<svg width="38" height="39" viewBox="0 0 38 39" fill="none" xmlns="http://www.w3.org/2000/svg">
											<rect x="0.0078125" y="0.140625" width="38" height="38" fill="white" />
											<path d="M32.5059 11.6384L14.5059 29.6384L6.25586 21.3884L8.37086 19.2734L14.5059 25.3934L30.3909 9.52344L32.5059 11.6384Z" fill="#1E1E1E" />
										</svg>
									</td>
									<td class="table__cell">
										<svg width="36" height="37" viewBox="0 0 36 37" style="background: #1E1E1E;" xmlns="http://www.w3.org/2000/svg">
											<path d="M31.5059 10.6384L13.5059 28.6384L5.25586 20.3884L7.37086 18.2734L13.5059 24.3934L29.3909 8.52344L31.5059 10.6384Z" fill="white" />
										</svg>
									</td>
									<td class="table__cell">
										<svg width="38" height="39" viewBox="0 0 38 39" fill="none" xmlns="http://www.w3.org/2000/svg">
											<rect x="0.0078125" y="0.140625" width="38" height="38" fill="white" />
											<path d="M32.5059 11.6384L14.5059 29.6384L6.25586 21.3884L8.37086 19.2734L14.5059 25.3934L30.3909 9.52344L32.5059 11.6384Z" fill="#1E1E1E" />
										</svg>
									</td>
								</tr>

								<tr class="table__row">
									<td class="table__cell table__cell--title"><?php _e('План стелі', 'budguru'); ?></td>
									<td class="table__cell">
										<svg width="38" height="39" viewBox="0 0 38 39" fill="none" xmlns="http://www.w3.org/2000/svg">
											<rect x="0.507812" y="0.640625" width="37" height="37" stroke="white" />
										</svg>
									</td>
									<td class="table__cell">
										<svg width="38" height="39" viewBox="0 0 38 39" fill="none" xmlns="http://www.w3.org/2000/svg">
											<rect x="0.0078125" y="0.140625" width="38" height="38" fill="white" />
											<path d="M32.5059 11.6384L14.5059 29.6384L6.25586 21.3884L8.37086 19.2734L14.5059 25.3934L30.3909 9.52344L32.5059 11.6384Z" fill="#1E1E1E" />
										</svg>
									</td>
									<td class="table__cell">
										<svg width="36" height="37" viewBox="0 0 36 37" style="background: #1E1E1E;" xmlns="http://www.w3.org/2000/svg">
											<path d="M31.5059 10.6384L13.5059 28.6384L5.25586 20.3884L7.37086 18.2734L13.5059 24.3934L29.3909 8.52344L31.5059 10.6384Z" fill="white" />
										</svg>
									</td>
									<td class="table__cell">
										<svg width="38" height="39" viewBox="0 0 38 39" fill="none" xmlns="http://www.w3.org/2000/svg">
											<rect x="0.0078125" y="0.140625" width="38" height="38" fill="white" />
											<path d="M32.5059 11.6384L14.5059 29.6384L6.25586 21.3884L8.37086 19.2734L14.5059 25.3934L30.3909 9.52344L32.5059 11.6384Z" fill="#1E1E1E" />
										</svg>
									</td>
								</tr>

								<tr class="table__row">
									<td class="table__cell table__cell--title"><?php _e('План розташування розеток і вимикачів', 'budguru'); ?></td>
									<td class="table__cell">
										<svg width="38" height="39" viewBox="0 0 38 39" fill="none" xmlns="http://www.w3.org/2000/svg">
											<rect x="0.507812" y="0.640625" width="37" height="37" stroke="white" />
										</svg>
									</td>
									<td class="table__cell">
										<svg width="38" height="39" viewBox="0 0 38 39" fill="none" xmlns="http://www.w3.org/2000/svg">
											<rect x="0.0078125" y="0.140625" width="38" height="38" fill="white" />
											<path d="M32.5059 11.6384L14.5059 29.6384L6.25586 21.3884L8.37086 19.2734L14.5059 25.3934L30.3909 9.52344L32.5059 11.6384Z" fill="#1E1E1E" />
										</svg>
									</td>
									<td class="table__cell">
										<svg width="36" height="37" viewBox="0 0 36 37" style="background: #1E1E1E;" xmlns="http://www.w3.org/2000/svg">
											<path d="M31.5059 10.6384L13.5059 28.6384L5.25586 20.3884L7.37086 18.2734L13.5059 24.3934L29.3909 8.52344L31.5059 10.6384Z" fill="white" />
										</svg>
									</td>
									<td class="table__cell">
										<svg width="38" height="39" viewBox="0 0 38 39" fill="none" xmlns="http://www.w3.org/2000/svg">
											<rect x="0.0078125" y="0.140625" width="38" height="38" fill="white" />
											<path d="M32.5059 11.6384L14.5059 29.6384L6.25586 21.3884L8.37086 19.2734L14.5059 25.3934L30.3909 9.52344L32.5059 11.6384Z" fill="#1E1E1E" />
										</svg>
									</td>
								</tr>

								<tr class="table__row">
									<td class="table__cell table__cell--title"><?php _e('План привʼязки світильників зі схемою включення', 'budguru'); ?></td>
									<td class="table__cell">
										<svg width="38" height="39" viewBox="0 0 38 39" fill="none" xmlns="http://www.w3.org/2000/svg">
											<rect x="0.507812" y="0.640625" width="37" height="37" stroke="white" />
										</svg>
									</td>
									<td class="table__cell">
										<svg width="38" height="39" viewBox="0 0 38 39" fill="none" xmlns="http://www.w3.org/2000/svg">
											<rect x="0.0078125" y="0.140625" width="38" height="38" fill="white" />
											<path d="M32.5059 11.6384L14.5059 29.6384L6.25586 21.3884L8.37086 19.2734L14.5059 25.3934L30.3909 9.52344L32.5059 11.6384Z" fill="#1E1E1E" />
										</svg>
									</td>
									<td class="table__cell">
										<svg width="36" height="37" viewBox="0 0 36 37" style="background: #1E1E1E;" xmlns="http://www.w3.org/2000/svg">
											<path d="M31.5059 10.6384L13.5059 28.6384L5.25586 20.3884L7.37086 18.2734L13.5059 24.3934L29.3909 8.52344L31.5059 10.6384Z" fill="white" />
										</svg>
									</td>
									<td class="table__cell">
										<svg width="38" height="39" viewBox="0 0 38 39" fill="none" xmlns="http://www.w3.org/2000/svg">
											<rect x="0.0078125" y="0.140625" width="38" height="38" fill="white" />
											<path d="M32.5059 11.6384L14.5059 29.6384L6.25586 21.3884L8.37086 19.2734L14.5059 25.3934L30.3909 9.52344L32.5059 11.6384Z" fill="#1E1E1E" />
										</svg>
									</td>
								</tr>

								<tr class="table__row">
									<td class="table__cell table__cell--title"><?php _e('План оздоблення стін', 'budguru'); ?></td>
									<td class="table__cell">
										<svg width="38" height="39" viewBox="0 0 38 39" fill="none" xmlns="http://www.w3.org/2000/svg">
											<rect x="0.507812" y="0.640625" width="37" height="37" stroke="white" />
										</svg>
									</td>
									<td class="table__cell">
										<svg width="38" height="39" viewBox="0 0 38 39" fill="none" xmlns="http://www.w3.org/2000/svg">
											<rect x="0.0078125" y="0.140625" width="38" height="38" fill="white" />
											<path d="M32.5059 11.6384L14.5059 29.6384L6.25586 21.3884L8.37086 19.2734L14.5059 25.3934L30.3909 9.52344L32.5059 11.6384Z" fill="#1E1E1E" />
										</svg>
									</td>
									<td class="table__cell">
										<svg width="36" height="37" viewBox="0 0 36 37" style="background: #1E1E1E;" xmlns="http://www.w3.org/2000/svg">
											<path d="M31.5059 10.6384L13.5059 28.6384L5.25586 20.3884L7.37086 18.2734L13.5059 24.3934L29.3909 8.52344L31.5059 10.6384Z" fill="white" />
										</svg>
									</td>
									<td class="table__cell">
										<svg width="38" height="39" viewBox="0 0 38 39" fill="none" xmlns="http://www.w3.org/2000/svg">
											<rect x="0.0078125" y="0.140625" width="38" height="38" fill="white" />
											<path d="M32.5059 11.6384L14.5059 29.6384L6.25586 21.3884L8.37086 19.2734L14.5059 25.3934L30.3909 9.52344L32.5059 11.6384Z" fill="#1E1E1E" />
										</svg>
									</td>
								</tr>

								<tr class="table__row">
									<td class="table__cell table__cell--title"><?php _e('Відомість обробки із зазначенням типу, кількості та назви покриттів', 'budguru'); ?></td>
									<td class="table__cell">
										<svg width="38" height="39" viewBox="0 0 38 39" fill="none" xmlns="http://www.w3.org/2000/svg">
											<rect x="0.507812" y="0.640625" width="37" height="37" stroke="white" />
										</svg>
									</td>
									<td class="table__cell">
										<svg width="38" height="39" viewBox="0 0 38 39" fill="none" xmlns="http://www.w3.org/2000/svg">
											<rect x="0.0078125" y="0.140625" width="38" height="38" fill="white" />
											<path d="M32.5059 11.6384L14.5059 29.6384L6.25586 21.3884L8.37086 19.2734L14.5059 25.3934L30.3909 9.52344L32.5059 11.6384Z" fill="#1E1E1E" />
										</svg>
									</td>
									<td class="table__cell">
										<svg width="36" height="37" viewBox="0 0 36 37" style="background: #1E1E1E;" xmlns="http://www.w3.org/2000/svg">
											<path d="M31.5059 10.6384L13.5059 28.6384L5.25586 20.3884L7.37086 18.2734L13.5059 24.3934L29.3909 8.52344L31.5059 10.6384Z" fill="white" />
										</svg>
									</td>
									<td class="table__cell">
										<svg width="38" height="39" viewBox="0 0 38 39" fill="none" xmlns="http://www.w3.org/2000/svg">
											<rect x="0.0078125" y="0.140625" width="38" height="38" fill="white" />
											<path d="M32.5059 11.6384L14.5059 29.6384L6.25586 21.3884L8.37086 19.2734L14.5059 25.3934L30.3909 9.52344L32.5059 11.6384Z" fill="#1E1E1E" />
										</svg>
									</td>
								</tr>

								<tr class="table__row">
									<td class="table__cell table__cell--title"><?php _e('План привʼязки сантехнічного обладнання', 'budguru'); ?></td>
									<td class="table__cell">
										<svg width="38" height="39" viewBox="0 0 38 39" fill="none" xmlns="http://www.w3.org/2000/svg">
											<rect x="0.507812" y="0.640625" width="37" height="37" stroke="white" />
										</svg>
									</td>
									<td class="table__cell">
										<svg width="38" height="39" viewBox="0 0 38 39" fill="none" xmlns="http://www.w3.org/2000/svg">
											<rect x="0.0078125" y="0.140625" width="38" height="38" fill="white" />
											<path d="M32.5059 11.6384L14.5059 29.6384L6.25586 21.3884L8.37086 19.2734L14.5059 25.3934L30.3909 9.52344L32.5059 11.6384Z" fill="#1E1E1E" />
										</svg>
									</td>
									<td class="table__cell">
										<svg width="36" height="37" viewBox="0 0 36 37" style="background: #1E1E1E;" xmlns="http://www.w3.org/2000/svg">
											<path d="M31.5059 10.6384L13.5059 28.6384L5.25586 20.3884L7.37086 18.2734L13.5059 24.3934L29.3909 8.52344L31.5059 10.6384Z" fill="white" />
										</svg>
									</td>
									<td class="table__cell">
										<svg width="38" height="39" viewBox="0 0 38 39" fill="none" xmlns="http://www.w3.org/2000/svg">
											<rect x="0.0078125" y="0.140625" width="38" height="38" fill="white" />
											<path d="M32.5059 11.6384L14.5059 29.6384L6.25586 21.3884L8.37086 19.2734L14.5059 25.3934L30.3909 9.52344L32.5059 11.6384Z" fill="#1E1E1E" />
										</svg>
									</td>
								</tr>

								<tr class="table__row">
									<td class="table__cell table__cell--title"><?php _e('Розгортки стін санвузла та кухні зі схемою розкладки плитки', 'budguru'); ?></td>
									<td class="table__cell">
										<svg width="38" height="39" viewBox="0 0 38 39" fill="none" xmlns="http://www.w3.org/2000/svg">
											<rect x="0.507812" y="0.640625" width="37" height="37" stroke="white" />
										</svg>
									</td>
									<td class="table__cell">
										<svg width="38" height="39" viewBox="0 0 38 39" fill="none" xmlns="http://www.w3.org/2000/svg">
											<rect x="0.0078125" y="0.140625" width="38" height="38" fill="white" />
											<path d="M32.5059 11.6384L14.5059 29.6384L6.25586 21.3884L8.37086 19.2734L14.5059 25.3934L30.3909 9.52344L32.5059 11.6384Z" fill="#1E1E1E" />
										</svg>
									</td>
									<td class="table__cell">
										<svg width="36" height="37" viewBox="0 0 36 37" style="background: #1E1E1E;" xmlns="http://www.w3.org/2000/svg">
											<path d="M31.5059 10.6384L13.5059 28.6384L5.25586 20.3884L7.37086 18.2734L13.5059 24.3934L29.3909 8.52344L31.5059 10.6384Z" fill="white" />
										</svg>
									</td>
									<td class="table__cell">
										<svg width="38" height="39" viewBox="0 0 38 39" fill="none" xmlns="http://www.w3.org/2000/svg">
											<rect x="0.0078125" y="0.140625" width="38" height="38" fill="white" />
											<path d="M32.5059 11.6384L14.5059 29.6384L6.25586 21.3884L8.37086 19.2734L14.5059 25.3934L30.3909 9.52344L32.5059 11.6384Z" fill="#1E1E1E" />
										</svg>
									</td>
								</tr>

								<tr class="table__row">
									<td class="table__cell table__cell--title"><?php _e('Специфікація електрофурнітури', 'budguru'); ?></td>
									<td class="table__cell">
										<svg width="38" height="39" viewBox="0 0 38 39" fill="none" xmlns="http://www.w3.org/2000/svg">
											<rect x="0.507812" y="0.640625" width="37" height="37" stroke="white" />
										</svg>
									</td>
									<td class="table__cell">
										<svg width="38" height="39" viewBox="0 0 38 39" fill="none" xmlns="http://www.w3.org/2000/svg">
											<rect x="0.507812" y="0.640625" width="37" height="37" stroke="white" />
										</svg>
									</td>
									<td class="table__cell">
										<svg width="36" height="37" viewBox="0 0 36 37" style="background: #1E1E1E;" xmlns="http://www.w3.org/2000/svg">
											<path d="M31.5059 10.6384L13.5059 28.6384L5.25586 20.3884L7.37086 18.2734L13.5059 24.3934L29.3909 8.52344L31.5059 10.6384Z" fill="white" />
										</svg>
									</td>
									<td class="table__cell">
										<svg width="38" height="39" viewBox="0 0 38 39" fill="none" xmlns="http://www.w3.org/2000/svg">
											<rect x="0.0078125" y="0.140625" width="38" height="38" fill="white" />
											<path d="M32.5059 11.6384L14.5059 29.6384L6.25586 21.3884L8.37086 19.2734L14.5059 25.3934L30.3909 9.52344L32.5059 11.6384Z" fill="#1E1E1E" />
										</svg>
									</td>
								</tr>

								<tr class="table__row">
									<td class="table__cell table__cell--title"><?php _e('Специфікація освітлювальних приладів', 'budguru'); ?></td>
									<td class="table__cell">
										<svg width="38" height="39" viewBox="0 0 38 39" fill="none" xmlns="http://www.w3.org/2000/svg">
											<rect x="0.507812" y="0.640625" width="37" height="37" stroke="white" />
										</svg>
									</td>
									<td class="table__cell">
										<svg width="38" height="39" viewBox="0 0 38 39" fill="none" xmlns="http://www.w3.org/2000/svg">
											<rect x="0.507812" y="0.640625" width="37" height="37" stroke="white" />
										</svg>
									</td>
									<td class="table__cell">
										<svg width="36" height="37" viewBox="0 0 36 37" style="background: #1E1E1E;" xmlns="http://www.w3.org/2000/svg">
											<path d="M31.5059 10.6384L13.5059 28.6384L5.25586 20.3884L7.37086 18.2734L13.5059 24.3934L29.3909 8.52344L31.5059 10.6384Z" fill="white" />
										</svg>
									</td>
									<td class="table__cell">
										<svg width="38" height="39" viewBox="0 0 38 39" fill="none" xmlns="http://www.w3.org/2000/svg">
											<rect x="0.0078125" y="0.140625" width="38" height="38" fill="white" />
											<path d="M32.5059 11.6384L14.5059 29.6384L6.25586 21.3884L8.37086 19.2734L14.5059 25.3934L30.3909 9.52344L32.5059 11.6384Z" fill="#1E1E1E" />
										</svg>
									</td>
								</tr>

								<tr class="table__row">
									<td class="table__cell table__cell--title"><?php _e('Специфікація сантехнічного обладнання', 'budguru'); ?></td>
									<td class="table__cell">
										<svg width="38" height="39" viewBox="0 0 38 39" fill="none" xmlns="http://www.w3.org/2000/svg">
											<rect x="0.507812" y="0.640625" width="37" height="37" stroke="white" />
										</svg>
									</td>
									<td class="table__cell">
										<svg width="38" height="39" viewBox="0 0 38 39" fill="none" xmlns="http://www.w3.org/2000/svg">
											<rect x="0.507812" y="0.640625" width="37" height="37" stroke="white" />
										</svg>
									</td>
									<td class="table__cell">
										<svg width="36" height="37" viewBox="0 0 36 37" style="background: #1E1E1E;" xmlns="http://www.w3.org/2000/svg">
											<path d="M31.5059 10.6384L13.5059 28.6384L5.25586 20.3884L7.37086 18.2734L13.5059 24.3934L29.3909 8.52344L31.5059 10.6384Z" fill="white" />
										</svg>
									</td>
									<td class="table__cell">
										<svg width="38" height="39" viewBox="0 0 38 39" fill="none" xmlns="http://www.w3.org/2000/svg">
											<rect x="0.0078125" y="0.140625" width="38" height="38" fill="white" />
											<path d="M32.5059 11.6384L14.5059 29.6384L6.25586 21.3884L8.37086 19.2734L14.5059 25.3934L30.3909 9.52344L32.5059 11.6384Z" fill="#1E1E1E" />
										</svg>
									</td>
								</tr>

								<tr class="table__row">
									<td class="table__cell table__cell--title"><?php _e('Розгортки стін усіх приміщень', 'budguru'); ?></td>
									<td class="table__cell">
										<svg width="38" height="39" viewBox="0 0 38 39" fill="none" xmlns="http://www.w3.org/2000/svg">
											<rect x="0.507812" y="0.640625" width="37" height="37" stroke="white" />
										</svg>
									</td>
									<td class="table__cell">
										<svg width="38" height="39" viewBox="0 0 38 39" fill="none" xmlns="http://www.w3.org/2000/svg">
											<rect x="0.507812" y="0.640625" width="37" height="37" stroke="white" />
										</svg>
									</td>
									<td class="table__cell">
										<svg width="38" height="39" viewBox="0 0 38 39" fill="none" xmlns="http://www.w3.org/2000/svg">
											<rect x="0.507812" y="0.640625" width="37" height="37" stroke="#1E1E1E" />
										</svg>
									</td>
									<td class="table__cell">
										<svg width="38" height="39" viewBox="0 0 38 39" fill="none" xmlns="http://www.w3.org/2000/svg">
											<rect x="0.0078125" y="0.140625" width="38" height="38" fill="white" />
											<path d="M32.5059 11.6384L14.5059 29.6384L6.25586 21.3884L8.37086 19.2734L14.5059 25.3934L30.3909 9.52344L32.5059 11.6384Z" fill="#1E1E1E" />
										</svg>
									</td>
								</tr>

								<tr class="table__row">
									<td class="table__cell table__cell--title"><?php _e('Креслення меблів', 'budguru'); ?></td>
									<td class="table__cell">
										<svg width="38" height="39" viewBox="0 0 38 39" fill="none" xmlns="http://www.w3.org/2000/svg">
											<rect x="0.507812" y="0.640625" width="37" height="37" stroke="white" />
										</svg>
									</td>
									<td class="table__cell">
										<svg width="38" height="39" viewBox="0 0 38 39" fill="none" xmlns="http://www.w3.org/2000/svg">
											<rect x="0.507812" y="0.640625" width="37" height="37" stroke="white" />
										</svg>
									</td>
									<td class="table__cell">
										<svg width="38" height="39" viewBox="0 0 38 39" fill="none" xmlns="http://www.w3.org/2000/svg">
											<rect x="0.507812" y="0.640625" width="37" height="37" stroke="#1E1E1E" />
										</svg>
									</td>
									<td class="table__cell">
										<svg width="38" height="39" viewBox="0 0 38 39" fill="none" xmlns="http://www.w3.org/2000/svg">
											<rect x="0.0078125" y="0.140625" width="38" height="38" fill="white" />
											<path d="M32.5059 11.6384L14.5059 29.6384L6.25586 21.3884L8.37086 19.2734L14.5059 25.3934L30.3909 9.52344L32.5059 11.6384Z" fill="#1E1E1E" />
										</svg>
									</td>
								</tr>

								<tr class="table__row table__row-divider">
									<td class="table__cell table__cell--title"><?php _e('Правки', 'budguru'); ?></td>
									<td class="table__cell"></td>
									<td class="table__cell"></td>
									<td class="table__cell"></td>
									<td class="table__cell"></td>
								</tr>

								<tr class="table__row">
									<td class="table__cell table__cell--title"><?php _e('До 3-х правок на кожний етап', 'budguru'); ?></td>
									<td class="table__cell">
										<svg width="38" height="39" viewBox="0 0 38 39" fill="none" xmlns="http://www.w3.org/2000/svg">
											<rect x="0.0078125" y="0.140625" width="38" height="38" fill="white" />
											<path d="M32.5059 11.6384L14.5059 29.6384L6.25586 21.3884L8.37086 19.2734L14.5059 25.3934L30.3909 9.52344L32.5059 11.6384Z" fill="#1E1E1E" />
										</svg>
									</td>
									<td class="table__cell">
										<svg width="38" height="39" viewBox="0 0 38 39" fill="none" xmlns="http://www.w3.org/2000/svg">
											<rect x="0.0078125" y="0.140625" width="38" height="38" fill="white" />
											<path d="M32.5059 11.6384L14.5059 29.6384L6.25586 21.3884L8.37086 19.2734L14.5059 25.3934L30.3909 9.52344L32.5059 11.6384Z" fill="#1E1E1E" />
										</svg>
									</td>
									<td class="table__cell">
										<svg width="36" height="37" viewBox="0 0 36 37" style="background: #1E1E1E;" xmlns="http://www.w3.org/2000/svg">
											<path d="M31.5059 10.6384L13.5059 28.6384L5.25586 20.3884L7.37086 18.2734L13.5059 24.3934L29.3909 8.52344L31.5059 10.6384Z" fill="white" />
										</svg>
									</td>
									<td class="table__cell">
										<svg width="38" height="39" viewBox="0 0 38 39" fill="none" xmlns="http://www.w3.org/2000/svg">
											<rect x="0.0078125" y="0.140625" width="38" height="38" fill="white" />
											<path d="M32.5059 11.6384L14.5059 29.6384L6.25586 21.3884L8.37086 19.2734L14.5059 25.3934L30.3909 9.52344L32.5059 11.6384Z" fill="#1E1E1E" />
										</svg>
									</td>
								</tr>

								<tr class="table__row">
									<td class="table__cell table__cell--title"><?php _e('Необмежена кількість правок', 'budguru'); ?></td>
									<td class="table__cell">
										<svg width="38" height="39" viewBox="0 0 38 39" fill="none" xmlns="http://www.w3.org/2000/svg">
											<rect x="0.507812" y="0.640625" width="37" height="37" stroke="white" />
										</svg>
									</td>
									<td class="table__cell">
										<svg width="38" height="39" viewBox="0 0 38 39" fill="none" xmlns="http://www.w3.org/2000/svg">
											<rect x="0.507812" y="0.640625" width="37" height="37" stroke="white" />
										</svg>
									</td>
									<td class="table__cell">
										<svg width="38" height="39" viewBox="0 0 38 39" fill="none" xmlns="http://www.w3.org/2000/svg">
											<rect x="0.507812" y="0.640625" width="37" height="37" stroke="#1E1E1E" />
										</svg>
									</td>
									<td class="table__cell">
										<svg width="38" height="39" viewBox="0 0 38 39" fill="none" xmlns="http://www.w3.org/2000/svg">
											<rect x="0.0078125" y="0.140625" width="38" height="38" fill="white" />
											<path d="M32.5059 11.6384L14.5059 29.6384L6.25586 21.3884L8.37086 19.2734L14.5059 25.3934L30.3909 9.52344L32.5059 11.6384Z" fill="#1E1E1E" />
										</svg>
									</td>
								</tr>

								<tr class="table__row">
									<td class="table__cell table__cell--title">
										<?php _e('Авторський нагляд', 'budguru'); ?>
										(<?php _e('до 4 виїздів на обʼєкт', 'budguru'); ?>)
									</td>
									<td class="table__cell">
										<svg width="38" height="39" viewBox="0 0 38 39" fill="none" xmlns="http://www.w3.org/2000/svg">
											<rect x="0.507812" y="0.640625" width="37" height="37" stroke="white" />
										</svg>
									</td>
									<td class="table__cell">
										<svg width="38" height="39" viewBox="0 0 38 39" fill="none" xmlns="http://www.w3.org/2000/svg">
											<rect x="0.507812" y="0.640625" width="37" height="37" stroke="white" />
										</svg>
									</td>
									<td class="table__cell">
										<svg width="38" height="39" viewBox="0 0 38 39" fill="none" xmlns="http://www.w3.org/2000/svg">
											<rect x="0.507812" y="0.640625" width="37" height="37" stroke="#1E1E1E" />
										</svg>
									</td>
									<td class="table__cell">
										<svg width="38" height="39" viewBox="0 0 38 39" fill="none" xmlns="http://www.w3.org/2000/svg">
											<rect x="0.0078125" y="0.140625" width="38" height="38" fill="white" />
											<path d="M32.5059 11.6384L14.5059 29.6384L6.25586 21.3884L8.37086 19.2734L14.5059 25.3934L30.3909 9.52344L32.5059 11.6384Z" fill="#1E1E1E" />
										</svg>
									</td>
								</tr>

								<tr class="table__row table__row-divider table__row-last">
									<td class="table__cell table__cell--title"><?php _e('Вартість:', 'budguru'); ?></td>
									<td class="table__cell">
                                        <?php echo $prices['vizual']; ?>
										<a href="#consultation-section" class="table__link"><?php _e('Замовити', 'budguru'); ?></a>
									</td>
									<td class="table__cell">
                                        <?php echo $prices['tehnical']; ?>
										<a href="#consultation-section" class="table__link"><?php _e('Замовити', 'budguru'); ?></a>
									</td>
									<td class="table__cell">
                                        <?php echo $prices['everything_considered'] ?? '32$/m2'; ?>
										<a href="#consultation-section" class="table__link"><?php _e('Замовити', 'budguru'); ?></a>
									</td>
									<td class="table__cell">
                                        <?php echo $prices['maximum'] ?? '45$/m2'; ?>
										<a href="#consultation-section" class="table__link"><?php _e('Замовити', 'budguru'); ?></a>
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

	<section class="man_hour">
        <div class="man_hour__container">
            <h2 class="man_hour__heading h2">
                <?php _e('Послуги', 'budguru'); ?> <span><?php _e('чоловіка на годину', 'budguru'); ?></span>: 
                <?php _e('електрик, сантехнік,плиточник', 'budguru'); ?>
            </h2>

            <div class="man_hour__content">
                <div class="man_hour__text-box">
                    <p class="man_hour__text">
                        <?php _e('Послуга "Чоловік на годину" — ідеальне рішення для швидкого та якісного виконання
                        різноманітних побутових завдань і ремонтних робіт вдома або в офісі. Наші майстри
                        оперативно вирішують такі питання, як дрібний ремонт, встановлення техніки, монтаж
                        меблів, сантехнічні та електротехнічні роботи, а також інші побутові задачі. Це зручно,
                        швидко і дозволяє заощадити час, не витрачаючи зусиль на пошук різних спеціалістів. Якщо
                        у вас виникли проблеми з електрикою, сантехнікою , меблями або іншими побутовими
                        пристроями , то ви можете викликати майстра на дім, він швидко та якісно виконає
                        необхідні роботи, дозволяючи вам економити свій час та сили.
                        Довірте дрібний ремонт та побутові завдання професіоналам і звільніть свій час для
                        важливих справ! Ми гарантуємо надійний сервіс, швидку реакцію та 100% задоволення від
                        результату.', 'budguru'); ?>
                    </p>

                    <p>
                        <strong><?php _e('Електрик:', 'budguru'); ?></strong> <?php _e('заміна та ремонт розеток, вимикачів, підключення освітлення,
                        встановлення та
                        ремонт електроприладів.', 'budguru'); ?> <br>

                        <strong><?php _e('Сантехнік:', 'budguru'); ?></strong> <?php _e('усунення протікань, установка змішувачів, унітазів, ванн і
                        душових кабін,
                        ремонт сантехнічних систем.', 'budguru'); ?> <br>

                        <strong><?php _e('Плиточник:', 'budguru'); ?></strong> <?php _e('укладання плитки на підлогу, стіни у ванній кімнаті та
                        кухні, вирівнювання
                        поверхонь, герметизація швів.', 'budguru'); ?> <br>
                    </p>


                    <a href="#calculator-form" class="man_hour__btn btn" data-da=".man_hour__illustration, 768, 1">
                        <?php _e('Викликати майстра', 'budguru'); ?>
                    </a>
                </div>
                <div class="man_hour__illustration">
                    <img src="<?php bloginfo('template_url'); ?>/assets/img/services/man.webp" width="552" height="598" alt="Викликати майстра">
                </div>
            </div>
        </div>
    </section>

	<?php get_template_part('template-parts/sections/info/stages-work'); ?>

	<?php get_template_part('template-parts/sections/reviews-slider'); ?>

	<?php echo do_shortcode('[calculator]'); ?>

	<?php get_template_part('template-parts/sections/info/faq'); ?>

	<?php get_template_part('template-parts/sections/clients-section'); ?>

	<?php 
		$master_section = new BudGuru_Service_Section(array(
			'title_first' => __('Швидкий та зручний', 'budguru'),
			'title_second' => __('виїзд майстра додому', 'budguru'),
			'description' => __('Наші майстри приїдуть до вас у зручний час, щоб швидко та якісно вирішити будь-які побутові
							завдання. Від дрібного ремонту до складних робіт – обирайте професійний сервіс, який
							гарантує оперативність, доступність та надійний результат. Електрик, сантехнік чи плиточник
							– замовити послугу легко, а про всі клопоти ми подбаємо за вас!
							Довірте дрібний ремонт та побутові завдання професіоналам і звільніть свій час для важливих
							справ! Ми гарантуємо надійний сервіс, швидку реакцію та 100% задоволення від результату.
							Наш сервіс пропонує швидке рішення для тих, хто цінує свій час та комфорт. Вам більше не
							потрібно відкладати ремонт чи витрачати час на пошуки майстрів – просто замовте виїзд
							спеціаліста додому. Усі роботи будуть виконані професійно, а головне – без зайвих турбот для
							вас. Будь то несправність у проводці, сантехніка або укладання плитки, наші майстри готові
							допомогти саме тоді, коли вам зручно.', 'budguru'),
			'image' => get_template_directory_uri() . '/assets/img/services/master.webp',
			'button_text' => __('Викликати майстра', 'budguru'),
			'button_url' => '#consultation-section'
		));

		get_template_part('template-parts/sections/info/master-call', null, array('section' => $master_section));
	?>

	<?php get_template_part('template-parts/sections/certificates-slider'); ?>

	<?php echo do_shortcode('[blog_section]'); ?>
</main>

<?php get_footer(); ?>