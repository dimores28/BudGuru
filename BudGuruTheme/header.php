<!DOCTYPE html>
<html <?php language_attributes() ?>>

<head>
	<title><?php echo wp_get_document_title(); ?></title>
	<meta charset="<?php bloginfo('charset') ?>">
	<meta name="format-detection" content="telephone=no">
	
	<?php wp_head() ?>
	<link rel="shortcut icon" href="favicon.ico">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
	<div class="wrapper">
		<header class="header">
			<div class="header__container">
				<?php
					if (function_exists('the_custom_logo')) {
						$custom_logo_id = get_theme_mod('custom_logo');
						$logo = wp_get_attachment_image_src($custom_logo_id, 'full');
						if ($logo) {
							echo '<a href="' . esc_url(home_url('/')) . '" class="header__logo-link" rel="home" aria-label="' . esc_attr(get_bloginfo('name')) . ' - На головну">';
							echo '<img src="' . esc_url($logo[0]) . '" alt="' . esc_attr(get_bloginfo('name')) . ' - логотип">';
							echo '</a>';
						}
					} else {
						echo '<a href="' . esc_url(home_url('/')) . '" class="site-logo" aria-label="' . esc_attr(get_bloginfo('name')) . ' - На головну">';
						bloginfo('name');
						echo '</a>';
					}

					// Логотип для мобільних пристроїв
					$mobile_logo = get_theme_mod('mobile_logo');
					if ($mobile_logo) {
						echo '<a href="' . esc_url(home_url('/')) . '" class="site-logo-mobile">';
						echo '<img src="' . esc_url($mobile_logo) . '" alt="' . get_bloginfo('name') . '">';
						echo '</a>';
					}
				?>

				<div class="header__menu menu">
					<button type="button" class="menu__icon icon-menu" aria-label="Меню"><span></span></button>
					<?php
						class Custom_Walker_Nav_Menu extends Walker_Nav_Menu {
							public function start_lvl(&$output, $depth = 0, $args = null) {
								if ($depth >= 1) return; // Забороняємо більше 2 рівнів вкладеності
								$output .= '<ul class="sub-menu">';
							}

							public function end_lvl(&$output, $depth = 0, $args = null) {
								if ($depth >= 1) return;
								$output .= '</ul>';
							}

							public function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
								$classes = implode(' ', $item->classes ?? []);
								$active_class = in_array('current-menu-item', $item->classes) ? ' active' : '';
								$has_children = in_array('menu-item-has-children', $item->classes);

								// Клас для елементів меню
								$li_class = 'menu__item';
								if ($depth > 0) {
									$li_class .= ' menu-item'; // Додаємо додатковий клас для підменю
								}

								if ($has_children) {
									$output .= '<li class="' . esc_attr($li_class) . '">';
									$output .= '<div class="drawer-nav-drop-wrap">';
									$output .= '<a href="' . esc_url($item->url) . '" class="menu__link' . $active_class . '">';
									$output .= esc_html($item->title);
									$output .= '<span class="dropdown-nav-toggle">';
									$output .= '<span class="svg-baseline">';
									$output .= '<svg aria-hidden="true" fill="currentColor" version="1.1" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24">';
									$output .= '<path d="M5.293 9.707l6 6c0.391 0.391 1.024 0.391 1.414 0l6-6c0.391-0.391 0.391-1.024 0-1.414s-1.024-0.391-1.414 0l-5.293 5.293-5.293-5.293c-0.391-0.391-1.024-0.391-1.414 0s-0.391 1.024 0 1.414z"></path>';
									$output .= '</svg>';
									$output .= '</span>';
									$output .= '</span>';
									$output .= '</a>';
									$output .= '<button class="dropdown-nav-special-toggle" aria-label="Відкрити підменю для ' . esc_attr($item->title) . '" aria-expanded="false">';
									$output .= '<svg aria-hidden="true" fill="currentColor" version="1.1" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24">';
									$output .= '<path d="M5.293 9.707l6 6c0.391 0.391 1.024 0.391 1.414 0l6-6c0.391-0.391 0.391-1.024 0-1.414s-1.024-0.391-1.414 0l-5.293 5.293-5.293-5.293c-0.391-0.391-1.024-0.391-1.414 0s-0.391 1.024 0 1.414z"></path>';
									$output .= '</svg>';
									$output .= '</button>';
									$output .= '</div>';
								} else {
									$output .= '<li class="' . esc_attr($li_class) . '">';
									$output .= '<a href="' . esc_url($item->url) . '" class="menu__link' . $active_class . '">' . esc_html($item->title) . '</a>';
								}
							}

							public function end_el(&$output, $item, $depth = 0, $args = null) {
								$output .= '</li>';
							}
						}
					?>

					<nav class="menu__body">
						<?php
						wp_nav_menu(array(
							'theme_location' => 'main-menu',
							'container' => false,
							'items_wrap' => '<ul class="menu__list">%3$s</ul>',
							'walker' => new Custom_Walker_Nav_Menu(),
						));
						?>
					</nav>




				</div>

				<a href="tel:<?echo get_field('phone', 'option'); ?>" class="header__phone" aria-label="Телефон">
					<svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M10.2175 7.90169L8.73586 7.73253C8.56164 7.71206 8.38504 7.73135 8.21935 7.78894C8.05365 7.84653 7.90317 7.94092 7.77919 8.06503L6.70586 9.13836C5.05 8.29599 3.70406 6.95005 2.86169 5.29419L3.94086 4.21503C4.19169 3.96419 4.31419 3.61419 4.27336 3.25836L4.10419 1.78836C4.07124 1.50375 3.93471 1.24121 3.72063 1.05079C3.50654 0.860373 3.22987 0.755393 2.94336 0.755861H1.93419C1.27502 0.755861 0.72669 1.30419 0.767524 1.96336C1.07669 6.94503 5.06086 10.9234 10.0367 11.2325C10.6959 11.2734 11.2442 10.725 11.2442 10.0659V9.05669C11.25 8.46753 10.8067 7.97169 10.2175 7.90169Z" />
					</svg>
					<span><?echo get_field('view_phone', 'option'); ?></span>
				</a>
			</div>
		</header>