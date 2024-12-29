<?php get_header(); ?>

<main class="page">
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
									<th class="table__head table__head--packages">Пакети</th>
									<th class="table__head table__head--visual">Візуальний</th>
									<th class="table__head table__head--technical">Технічний</th>
									<th class="table__head table__head--all-included">Все враховано</th>
									<th class="table__head table__head--maximum">Максимальний</th>
								</tr>
							</thead>
							<tbody class="table__body">
								<tr class="table__row">
									<td class="table__cell table__cell--title">Склад проекту</td>
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
									<td class="table__cell table__cell--title">Обмірний план</td>
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
									<td class="table__cell table__cell--title">План розташування стін</td>
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
									<td class="table__cell table__cell--title">Візуалізація</td>
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
									<td class="table__cell table__cell--title">Підбір матеріалів</td>
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
									<td class="table__cell table__cell--title">План розміщення меблів</td>
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
									<td class="table__cell table__cell--title">План демонтажу</td>
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
									<td class="table__cell table__cell--title">План підлоги із зазначенням типу покриття, плінтуса і теплої підлоги</td>
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
									<td class="table__cell table__cell--title">План стелі</td>
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
									<td class="table__cell table__cell--title">План розташування розеток і вимикачів</td>
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
									<td class="table__cell table__cell--title">План привʼязки світильників зі схемою включення</td>
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
									<td class="table__cell table__cell--title">План оздоблення стін</td>
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
									<td class="table__cell table__cell--title">Відомість обробки із зазначенням типу, кількості та назви покриттів</td>
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
									<td class="table__cell table__cell--title">План привʼязки сантехнічного обладнання</td>
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
									<td class="table__cell table__cell--title">Розгортки стін санвузла та кухні зі схемою розкладки плитки</td>
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
									<td class="table__cell table__cell--title">Специфікація електрофурнітури</td>
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
									<td class="table__cell table__cell--title">Специфікація освітлювальних приладів</td>
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
									<td class="table__cell table__cell--title">Специфікація сантехнічного обладнання</td>
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
									<td class="table__cell table__cell--title">Розгортки стін усіх приміщень</td>
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
									<td class="table__cell table__cell--title">Креслення меблів</td>
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
									<td class="table__cell table__cell--title">Правки</td>
									<td class="table__cell"></td>
									<td class="table__cell"></td>
									<td class="table__cell"></td>
									<td class="table__cell"></td>
								</tr>

								<tr class="table__row">
									<td class="table__cell table__cell--title">До 3-х правок на кожний етап</td>
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
									<td class="table__cell table__cell--title">Необмежена кількість правок</td>
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
									<td class="table__cell table__cell--title">Авторський нагляд
										(до 4 виїздів на обʼєкт)</td>
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
									<td class="table__cell table__cell--title">Вартість:</td>
									<td class="table__cell">
                                        <?php echo $prices['vizual']; ?>
										<a href="#consultation-section" class="table__link">Замовити</a>
									</td>
									<td class="table__cell">
                                        <?php echo $prices['tehnical']; ?>
										<a href="#consultation-section" class="table__link">Замовити</a>
									</td>
									<td class="table__cell">
                                        <?php echo $prices['everything_considered'] ?? '32$/m2'; ?>
										<a href="#consultation-section" class="table__link">Замовити</a>
									</td>
									<td class="table__cell">
                                        <?php echo $prices['maximum'] ?? '45$/m2'; ?>
										<a href="#consultation-section" class="table__link">Замовити</a>
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
                                            Замовити
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
</main>

<?php get_footer(); ?>