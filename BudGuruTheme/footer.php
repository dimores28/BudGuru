	<?php
		// Функція для виводу однорівневого меню
		function render_footer_menu($menu_location) {
			if (has_nav_menu($menu_location)) {
				wp_nav_menu(array(
					'theme_location' => $menu_location,
					'container'      => false,
					'items_wrap'     => '<ul class="footer__menu">%3$s</ul>',
					'walker'         => new class extends Walker_Nav_Menu {
						public function start_lvl(&$output, $depth = 0, $args = null) {
							// Не дозволяємо вкладене меню
							return;
						}

						public function end_lvl(&$output, $depth = 0, $args = null) {
							// Не дозволяємо вкладене меню
							return;
						}

						public function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
							if ($depth > 0) return; // Ігноруємо вкладені елементи
							$output .= '<li class="footer__menu-item">';
							$output .= '<a href="' . esc_url($item->url) . '" class="footer__menu-link">' . esc_html($item->title) . '</a>';
						}

						public function end_el(&$output, $item, $depth = 0, $args = null) {
							if ($depth > 0) return; // Ігноруємо вкладені елементи
							$output .= '</li>';
						}
					},
				));
			} else {
				echo '<ul class="footer__menu"><li class="footer__menu-item">Меню не налаштовано</li></ul>';
			}
		}
	?>


		<footer class="footer">
			<div class="footer__container">
				<div class="footer__content">

					<div class="footer__col">
						<?php
							$footer_logo = get_theme_mod('footer_logo');
							if ($footer_logo) {
								echo '<a href="' . esc_url(home_url('/')) . '" class="footer__logo">';
								echo '<img src="' . esc_url($footer_logo) . '" alt="' . get_bloginfo('name') . '">';
								echo '</a>';
							} else {
								// Альтернативний текстовий логотип, якщо логотип не завантажено
								echo '<a href="' . esc_url(home_url('/')) . '" class="footer__logo">';
								bloginfo('name');
								echo '</a>';
							}
						?>

						<ul class="footer__contact-list">
							<li class="footer__contact-list-item">
								<a href="tel:<?echo get_field('phone', 'option'); ?>"
									class="footer__contact-list-link"
									aria-label="<?php 
										printf(
											/* translators: %s: phone number */
											__('Зателефонувати: %s', 'budguru'), 
											get_field('view_phone', 'option')
										); 
									?>">
									<svg aria-hidden="true" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M21.64 16.347L18.2533 15.9603C17.8551 15.9136 17.4515 15.9577 17.0727 16.0893C16.694 16.2209 16.35 16.4367 16.0667 16.7203L13.6133 19.1737C9.82852 17.2483 6.75208 14.1718 4.82666 10.387L7.29333 7.92034C7.86666 7.34701 8.14666 6.54701 8.05333 5.73368L7.66666 2.37368C7.59135 1.72313 7.27928 1.12304 6.78994 0.6878C6.30061 0.25256 5.66822 0.0126051 5.01333 0.0136754H2.70666C1.19999 0.0136754 -0.0533401 1.26701 0.0399932 2.77368C0.74666 14.1603 9.85333 23.2537 21.2267 23.9603C22.7333 24.0537 23.9867 22.8003 23.9867 21.2937V18.987C24 17.6403 22.9867 16.507 21.64 16.347Z" fill="#1E1E1E" />
									</svg>
									<span><?echo get_field('view_phone', 'option'); ?></span>
								</a>
							</li>
							<li class="footer__contact-list-item">
								<a href="mailto:<?php echo get_field('email', 'option'); ?>"
									class="footer__contact-list-link"
									aria-label="<?php 
										printf(
											/* translators: %s: email address */
											__('Написати на email: %s', 'budguru'), 
											get_field('email', 'option')
										); 
									?>">
									<svg aria-hidden="true" width="28" height="22" viewBox="0 0 28 22" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path fill-rule="evenodd" clip-rule="evenodd" d="M10.0408 12.8676L14.0028 15.5766L17.822 12.9418L26.383 21.388C26.1571 21.4617 25.9182 21.4991 25.6662 21.5H2.3338C2.0258 21.5 1.7318 21.4398 1.4616 21.332L10.0408 12.8676ZM28 5.9264V19.1662C28 19.512 27.9244 19.8396 27.79 20.135L19.3984 11.8554L28 5.9264ZM0 6.0006L8.4588 11.7854L0.1484 19.9866C0.0510479 19.724 0.000810589 19.4463 0 19.1662L0 6.0006ZM25.6662 0.5C26.9542 0.5 28 1.5444 28 2.8338V3.6542L13.9972 13.3072L0 3.734V2.8338C0 1.5458 1.0444 0.5 2.3338 0.5H25.6662Z" fill="#1E1E1E" />
									</svg>
									<span><?php echo get_field('email', 'option'); ?></span>
								</a>
							</li>
							<li class="footer__contact-list-item">
								<a href="<?echo get_field('google_map_url', 'option'); ?>"
									class="footer__contact-list-link"
									aria-label="<?php 
										printf(
											/* translators: %s: address */
											__('Відкрити на карті: %s', 'budguru'), 
											get_field('adresa', 'option')
										); 
									?>">
									<svg aria-hidden="true" width="24" height="32" viewBox="0 0 24 32" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M12 32C12 32 0.799988 17.392 0.799988 11.2C0.799988 9.7292 1.08968 8.27279 1.65254 6.91395C2.21539 5.5551 3.04038 4.32042 4.08039 3.2804C5.12041 2.24039 6.35509 1.4154 7.71393 0.852549C9.07278 0.289697 10.5292 0 12 0C13.4708 0 14.9272 0.289697 16.286 0.852549C17.6449 1.4154 18.8796 2.24039 19.9196 3.2804C20.9596 4.32042 21.7846 5.5551 22.3474 6.91395C22.9103 8.27279 23.2 9.7292 23.2 11.2C23.2 17.392 12 32 12 32ZM12 14.4C12.8487 14.4 13.6626 14.0629 14.2627 13.4627C14.8628 12.8626 15.2 12.0487 15.2 11.2C15.2 10.3513 14.8628 9.53737 14.2627 8.93726C13.6626 8.33714 12.8487 8 12 8C11.1513 8 10.3374 8.33714 9.73725 8.93726C9.13713 9.53737 8.79999 10.3513 8.79999 11.2C8.79999 12.0487 9.13713 12.8626 9.73725 13.4627C10.3374 14.0629 11.1513 14.4 12 14.4Z" fill="#1E1E1E" />
									</svg>
									<span><?echo get_field('adresa', 'option'); ?></span>
								</a>
							</li>
							<li class="footer__contact-list-item">
								<a class="footer__contact-list-link" href="#">
									<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M12 0.333008C10.4679 0.333008 8.9508 0.634775 7.53534 1.22108C6.11987 1.80738 4.83375 2.66675 3.7504 3.7501C1.56248 5.93802 0.333313 8.90548 0.333313 11.9997C0.333313 15.0939 1.56248 18.0613 3.7504 20.2493C4.83375 21.3326 6.11987 22.192 7.53534 22.7783C8.9508 23.3646 10.4679 23.6663 12 23.6663C15.0942 23.6663 18.0616 22.4372 20.2496 20.2493C22.4375 18.0613 23.6666 15.0939 23.6666 11.9997C23.6666 10.4676 23.3649 8.9505 22.7786 7.53503C22.1923 6.11957 21.3329 4.83345 20.2496 3.7501C19.1662 2.66675 17.8801 1.80738 16.4646 1.22108C15.0492 0.634775 13.5321 0.333008 12 0.333008ZM16.9 16.8997L10.8333 13.1663V6.16634H12.5833V12.233L17.8333 15.383L16.9 16.8997Z" fill="#1E1E1E" />
									</svg>
									<span>
										<?echo get_field('working_hours', 'option'); ?>
									</span>
								</a>
							</li>
						</ul>

						<div class="footer__social">
							<h5 class="footer__social_title"><?php _e('Ми в соцмережах:', 'budguru'); ?></h5>
							<ul class="footer__social_list">
								<?php if (get_field('instagram', 'option')): ?>
								<li class="footer__social_list-item">
									<a href="<?php echo get_field('instagram', 'option'); ?>"
										aria-label="<?php _e('Перейти в Instagram', 'budguru'); ?>">
										<svg aria-hidden="true" width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path d="M15.3707 0.666992C16.8707 0.670992 17.632 0.678992 18.2893 0.697659L18.548 0.706992C18.8467 0.717659 19.1413 0.730992 19.4973 0.746992C20.916 0.813659 21.884 1.03766 22.7333 1.36699C23.6133 1.70566 24.3547 2.16433 25.096 2.90433C25.7742 3.57064 26.2989 4.37696 26.6333 5.26699C26.9627 6.11633 27.1867 7.08433 27.2533 8.50433C27.2693 8.85899 27.2827 9.15366 27.2933 9.45366L27.3013 9.71233C27.3213 10.3683 27.3293 11.1297 27.332 12.6297L27.3333 13.6243V15.371C27.3366 16.3435 27.3263 17.3161 27.3027 18.2883L27.2947 18.547C27.284 18.847 27.2707 19.1417 27.2547 19.4963C27.188 20.9163 26.9613 21.883 26.6333 22.7337C26.2989 23.6237 25.7742 24.43 25.096 25.0963C24.4297 25.7746 23.6234 26.2992 22.7333 26.6337C21.884 26.963 20.916 27.187 19.4973 27.2537L18.548 27.2937L18.2893 27.3017C17.632 27.3203 16.8707 27.3297 15.3707 27.3323L14.376 27.3337H12.6307C11.6577 27.3371 10.6847 27.3269 9.71199 27.303L9.45332 27.295C9.1368 27.283 8.82035 27.2692 8.50399 27.2537C7.08532 27.187 6.11732 26.963 5.26665 26.6337C4.37709 26.2991 3.57124 25.7744 2.90532 25.0963C2.22658 24.4301 1.70146 23.6238 1.36665 22.7337C1.03732 21.8843 0.813319 20.9163 0.746652 19.4963L0.706652 18.547L0.699985 18.2883C0.675407 17.3161 0.664294 16.3435 0.666652 15.371V12.6297C0.662961 11.6571 0.67274 10.6846 0.695985 9.71233L0.705319 9.45366C0.715985 9.15366 0.729319 8.85899 0.745319 8.50433C0.811985 7.08433 1.03599 6.11766 1.36532 5.26699C1.70091 4.37659 2.22695 3.57024 2.90665 2.90433C3.57219 2.22639 4.37757 1.70176 5.26665 1.36699C6.11732 1.03766 7.08399 0.813659 8.50399 0.746992C8.85865 0.730992 9.15465 0.717659 9.45332 0.706992L9.71199 0.698992C10.6842 0.675302 11.6568 0.665079 12.6293 0.668325L15.3707 0.666992ZM14 7.33366C12.2319 7.33366 10.5362 8.03604 9.28594 9.28628C8.0357 10.5365 7.33332 12.2322 7.33332 14.0003C7.33332 15.7684 8.0357 17.4641 9.28594 18.7144C10.5362 19.9646 12.2319 20.667 14 20.667C15.7681 20.667 17.4638 19.9646 18.714 18.7144C19.9643 17.4641 20.6667 15.7684 20.6667 14.0003C20.6667 12.2322 19.9643 10.5365 18.714 9.28628C17.4638 8.03604 15.7681 7.33366 14 7.33366ZM14 10.0003C14.5253 10.0002 15.0454 10.1036 15.5308 10.3046C16.0161 10.5055 16.4571 10.8001 16.8286 11.1714C17.2001 11.5428 17.4948 11.9837 17.6959 12.469C17.897 12.9542 18.0006 13.4744 18.0007 13.9997C18.0007 14.5249 17.8974 15.0451 17.6964 15.5304C17.4955 16.0158 17.2009 16.4568 16.8296 16.8283C16.4582 17.1998 16.0173 17.4945 15.532 17.6956C15.0467 17.8967 14.5266 18.0002 14.0013 18.0003C12.9405 18.0003 11.923 17.5789 11.1729 16.8288C10.4227 16.0786 10.0013 15.0612 10.0013 14.0003C10.0013 12.9395 10.4227 11.922 11.1729 11.1719C11.923 10.4218 12.9405 10.0003 14.0013 10.0003M21.0013 5.33366C20.5593 5.33366 20.1354 5.50925 19.8228 5.82181C19.5102 6.13438 19.3347 6.5583 19.3347 7.00033C19.3347 7.44235 19.5102 7.86628 19.8228 8.17884C20.1354 8.4914 20.5593 8.66699 21.0013 8.66699C21.4433 8.66699 21.8673 8.4914 22.1798 8.17884C22.4924 7.86628 22.668 7.44235 22.668 7.00033C22.668 6.5583 22.4924 6.13438 22.1798 5.82181C21.8673 5.50925 21.4433 5.33366 21.0013 5.33366Z" fill="#1E1E1E" />
										</svg>
									</a>
								</li>
								<?php endif; ?>
								
								<?php if (get_field('telegram', 'option')): ?>
								<li class="footer__social_list-item">
									<a href="<?php echo get_field('telegram', 'option'); ?>"
										aria-label="<?php _e('Перейти в Telegram', 'budguru'); ?>">
										<svg aria-hidden="true" width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path d="M16 2.66699C8.64002 2.66699 2.66669 8.64033 2.66669 16.0003C2.66669 23.3603 8.64002 29.3337 16 29.3337C23.36 29.3337 29.3334 23.3603 29.3334 16.0003C29.3334 8.64033 23.36 2.66699 16 2.66699ZM22.1867 11.7337C21.9867 13.8403 21.12 18.9603 20.68 21.3203C20.4934 22.3203 20.12 22.6537 19.7734 22.6937C19 22.7603 18.4134 22.187 17.6667 21.6937C16.4934 20.9203 15.8267 20.4403 14.6934 19.6937C13.3734 18.827 14.2267 18.347 14.9867 17.5737C15.1867 17.3737 18.6 14.267 18.6667 13.987C18.6759 13.9446 18.6747 13.9006 18.6631 13.8587C18.6515 13.8169 18.6298 13.7786 18.6 13.747C18.52 13.6803 18.4134 13.707 18.32 13.7203C18.2 13.747 16.3334 14.987 12.6934 17.4403C12.16 17.8003 11.68 17.987 11.2534 17.9737C10.7734 17.9603 9.86669 17.707 9.18669 17.4803C8.34669 17.2137 7.69335 17.067 7.74669 16.6003C7.77335 16.3603 8.10669 16.1203 8.73335 15.867C12.6267 14.1737 15.2134 13.0537 16.5067 12.5203C20.2134 10.9737 20.9734 10.707 21.48 10.707C21.5867 10.707 21.84 10.7337 22 10.867C22.1334 10.9737 22.1734 11.1203 22.1867 11.227C22.1734 11.307 22.2 11.547 22.1867 11.7337Z" fill="#1E1E1E" />
										</svg>
									</a>
								</li>
								<?php endif; ?>
								
								<?php if (get_field('viber', 'option')): ?>
								<li class="footer__social_list-item">
									<a href="<?php echo get_field('viber', 'option'); ?>"
										aria-label="<?php _e('Перейти в Viber', 'budguru'); ?>">
										<svg aria-hidden="true" width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path fill-rule="evenodd" clip-rule="evenodd" d="M22.2346 3.50406C18.0397 2.56635 13.6895 2.56635 9.49464 3.50406L9.04264 3.60406C7.86235 3.86717 6.77823 4.4527 5.91099 5.29545C5.04376 6.1382 4.42744 7.20511 4.13064 8.37739C3.06916 12.5677 3.06916 16.9565 4.13064 21.1467C4.41372 22.2647 4.98768 23.2878 5.79421 24.1122C6.60074 24.9365 7.6111 25.5327 8.72264 25.8401L9.34264 29.5414C9.36244 29.6589 9.41337 29.769 9.49016 29.8602C9.56694 29.9513 9.66675 30.0202 9.77921 30.0597C9.89167 30.0992 10.0127 30.1078 10.1296 30.0847C10.2465 30.0615 10.3551 30.0074 10.444 29.9281L14.0853 26.6707C16.8187 26.8357 19.5618 26.6172 22.2346 26.0214L22.688 25.9214C23.8683 25.6583 24.9524 25.0728 25.8196 24.23C26.6869 23.3873 27.3032 22.3203 27.6 21.1481C28.6615 16.9578 28.6615 12.569 27.6 8.37873C27.3031 7.20627 26.6866 6.13925 25.8191 5.29648C24.9516 4.45371 23.8672 3.86828 22.6866 3.60539L22.2346 3.50406ZM10.62 8.26939C10.3722 8.23311 10.1194 8.283 9.90398 8.41073H9.88531C9.38531 8.70406 8.93464 9.07339 8.55064 9.50806C8.23064 9.87739 8.05731 10.2507 8.01198 10.6107C7.98531 10.8241 8.00398 11.0401 8.06664 11.2441L8.09064 11.2574C8.45064 12.3147 8.91998 13.3321 9.49331 14.2894C10.2329 15.6338 11.1426 16.8774 12.2 17.9894L12.232 18.0347L12.2826 18.0721L12.3133 18.1081L12.3506 18.1401C13.4666 19.2005 14.7131 20.1145 16.06 20.8601C17.6 21.6987 18.5346 22.0947 19.096 22.2601V22.2681C19.26 22.3187 19.4093 22.3414 19.56 22.3414C20.0383 22.3071 20.4911 22.1126 20.8453 21.7894C21.2786 21.4054 21.6453 20.9534 21.9306 20.4507V20.4414C22.1986 19.9347 22.108 19.4574 21.7213 19.1334C20.9453 18.454 20.1054 17.8512 19.2133 17.3334C18.616 17.0094 18.0093 17.2054 17.764 17.5334L17.24 18.1947C16.9706 18.5227 16.4826 18.4774 16.4826 18.4774L16.4693 18.4854C12.828 17.5561 11.856 13.8694 11.856 13.8694C11.856 13.8694 11.8106 13.3681 12.148 13.1121L12.804 12.5841C13.1186 12.3281 13.3373 11.7227 13 11.1254C12.4834 10.234 11.882 9.39451 11.204 8.61873C11.0557 8.43656 10.848 8.31242 10.6173 8.26806M16.772 6.66673C16.5952 6.66673 16.4256 6.73697 16.3006 6.86199C16.1756 6.98701 16.1053 7.15658 16.1053 7.33339C16.1053 7.5102 16.1756 7.67977 16.3006 7.8048C16.4256 7.92982 16.5952 8.00006 16.772 8.00006C18.4586 8.00006 19.8586 8.55073 20.9666 9.60673C21.536 10.1841 21.98 10.8681 22.2706 11.6174C22.5626 12.3681 22.696 13.1694 22.6613 13.9721C22.6576 14.0596 22.6712 14.147 22.7013 14.2293C22.7315 14.3116 22.7775 14.3872 22.8368 14.4517C22.9565 14.5819 23.1232 14.6593 23.3 14.6667C23.4768 14.6742 23.6493 14.611 23.7796 14.4913C23.9099 14.3715 23.9872 14.2049 23.9946 14.0281C24.0344 13.0408 23.8706 12.0559 23.5133 11.1347C23.1544 10.2088 22.6078 9.36721 21.908 8.66273L21.8946 8.64939C20.52 7.33606 18.78 6.66673 16.772 6.66673ZM16.7266 8.85873C16.5498 8.85873 16.3803 8.92897 16.2552 9.05399C16.1302 9.17901 16.06 9.34858 16.06 9.52539C16.06 9.70221 16.1302 9.87177 16.2552 9.9968C16.3803 10.1218 16.5498 10.1921 16.7266 10.1921H16.7493C17.9653 10.2787 18.8506 10.6841 19.4706 11.3494C20.1066 12.0347 20.436 12.8867 20.4106 13.9401C20.4066 14.1169 20.4729 14.2881 20.5951 14.416C20.7172 14.5439 20.8852 14.618 21.062 14.6221C21.2388 14.6261 21.41 14.5598 21.5379 14.4376C21.6658 14.3155 21.7399 14.1475 21.744 13.9707C21.776 12.5881 21.3306 11.3947 20.448 10.4427V10.4401C19.5453 9.47206 18.3066 8.96006 16.816 8.86006L16.7933 8.85739L16.7266 8.85873ZM16.7013 11.0921C16.6121 11.0842 16.5222 11.0944 16.437 11.122C16.3518 11.1496 16.2731 11.1942 16.2055 11.2529C16.1378 11.3117 16.0828 11.3834 16.0435 11.4639C16.0042 11.5444 15.9816 11.632 15.977 11.7215C15.9723 11.8109 15.9857 11.9004 16.0164 11.9845C16.0471 12.0687 16.0944 12.1458 16.1555 12.2112C16.2167 12.2767 16.2904 12.3291 16.3722 12.3655C16.4541 12.4018 16.5424 12.4213 16.632 12.4227C17.1893 12.4521 17.5453 12.6201 17.7693 12.8454C17.9946 13.0721 18.1626 13.4361 18.1933 14.0054C18.195 14.0949 18.2146 14.1831 18.2511 14.2648C18.2876 14.3465 18.3401 14.42 18.4056 14.481C18.4711 14.542 18.5482 14.5891 18.6324 14.6196C18.7165 14.6502 18.8059 14.6635 18.8952 14.6587C18.9846 14.654 19.0721 14.6313 19.1525 14.592C19.2329 14.5527 19.3045 14.4977 19.3632 14.4301C19.4219 14.3626 19.4664 14.2839 19.494 14.1988C19.5216 14.1137 19.5318 14.0239 19.524 13.9347C19.4813 13.1347 19.2306 12.4281 18.7173 11.9081C18.2013 11.3881 17.4986 11.1347 16.7013 11.0921Z" fill="#1E1E1E" />
										</svg>
									</a>
								</li>
								<?php endif; ?>
								
								<?php if (get_field('whatsapp', 'option')): ?>
								<li class="footer__social_list-item">
									<a href="<?php echo get_field('whatsapp', 'option'); ?>"
										aria-label="<?php _e('Перейти в WhatsApp', 'budguru'); ?>">
										<svg aria-hidden="true" width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path fill-rule="evenodd" clip-rule="evenodd" d="M16 2.66699C8.63602 2.66699 2.66669 8.63633 2.66669 16.0003C2.66669 18.5203 3.36669 20.8803 4.58402 22.891L3.39469 26.9337C3.3264 27.1658 3.32191 27.412 3.38168 27.6464C3.44145 27.8809 3.56328 28.0949 3.73437 28.266C3.90545 28.4371 4.11946 28.5589 4.35391 28.6187C4.58836 28.6784 4.83458 28.6739 5.06669 28.6057L9.10935 27.4163C11.1877 28.6736 13.571 29.3368 16 29.3337C23.364 29.3337 29.3334 23.3643 29.3334 16.0003C29.3334 8.63633 23.364 2.66699 16 2.66699ZM12.984 19.0177C15.6814 21.7137 18.256 22.0697 19.1654 22.103C20.548 22.1537 21.8947 21.0977 22.4187 19.8723C22.4843 19.7198 22.508 19.5525 22.4874 19.3877C22.4667 19.2229 22.4025 19.0667 22.3014 18.935C21.5707 18.0017 20.5827 17.331 19.6174 16.6643C19.4159 16.5246 19.1681 16.4685 18.9262 16.5078C18.6842 16.5471 18.4669 16.6787 18.32 16.875L17.52 18.095C17.4777 18.1603 17.4122 18.2072 17.3367 18.226C17.2612 18.2448 17.1813 18.2342 17.1134 18.1963C16.5707 17.8857 15.78 17.3577 15.212 16.7897C14.644 16.2217 14.148 15.467 13.8694 14.959C13.8356 14.8943 13.8261 14.8196 13.8425 14.7485C13.8589 14.6774 13.9001 14.6145 13.9587 14.571L15.1907 13.6563C15.367 13.5038 15.4809 13.2915 15.5104 13.0603C15.5399 12.829 15.483 12.5949 15.3507 12.403C14.7534 11.5283 14.0574 10.4163 13.048 9.67899C12.9175 9.5852 12.7649 9.52672 12.6052 9.5092C12.4454 9.49168 12.2838 9.51572 12.136 9.57899C10.9094 10.1043 9.84802 11.451 9.89869 12.8363C9.93202 13.7457 10.288 16.3203 12.984 19.0177Z" fill="#1E1E1E" />
										</svg>
									</a>
								</li>
								<?php endif; ?>
							</ul>
						</div>
					</div>

					<div class="footer__col footer__col_our-services">
						<h4 class="footer__title "><?php _e('Наші послуги', 'budguru'); ?></h4>
						<?php render_footer_menu('footer-services'); ?>
					</div>

					<div class="footer__col">
						<h4 class="footer__title"><?php _e('Про компанію', 'budguru'); ?></h4>
						<?php render_footer_menu('footer-about'); ?>
					</div>

					<div class="footer__col">
						<h4 class="footer__title"><?php _e('Користувачам', 'budguru'); ?></h4>
						<?php render_footer_menu('footer-users'); ?>
					</div>

				</div>
				<div class="footer_copyright">
					<p><?php _e('Студія ремонту та дизайну інтерʼєру Budguru. Всі права захищені', 'budguru'); ?></p>
				</div>

				<button class="footer__scroll-to" 
					id="scroll-top" 
					aria-label="<?php _e('Прокрутити до початку сторінки', 'budguru'); ?>">
					<svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M23.9281 1.74694L1.77207 23.9029M23.9281 1.74694L23.8607 20.6705M23.9281 1.74694L5.00456 1.81428" stroke="#1E1E1E" stroke-width="1.58" stroke-linecap="round" stroke-linejoin="round" />
					</svg>
				</button>
			</div>
		</footer>

		<div id="popup" aria-hidden="true" class="popup">
			<div class="popup__wrapper">
				<div class="popup__content popup__content--consultation">
					<button data-close type="button" class="popup__close">
						<svg width="23" height="23" viewBox="0 0 23 23" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path opacity="0.850056" d="M1.73333 1.48883L21.5469 21.0288" stroke="#979797" stroke-linecap="square" />
							<path opacity="0.850056" d="M21.2667 1.48883L1.45309 21.0288" stroke="#979797" stroke-linecap="square" />
						</svg>
					</button>
					<div class="popup__text">
						<section class="consultation">
							<div class="consultation__container">
								<div class="consultation__content">
									<div class="consultation__head-block">
										<h2 class="consultation__heading">
											<?php _e('Потрібна', 'budguru'); ?> <span><?php _e('консультація спеціаліста?', 'budguru'); ?></span>
										</h2>
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
										alt="form illustration">
								</div>
							</div>
						</section>
					</div>
				</div>
			</div>
		</div>

		<div id="reviews-popup" aria-hidden="true" class="popup">
			<div class="popup__wrapper">
				<div class="popup__content">
					<button data-close type="button" class="popup__close">

						<svg width="23" height="23" viewBox="0 0 23 23" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path opacity="0.850056" d="M1.73333 1.48883L21.5469 21.0288" stroke="#979797" stroke-linecap="square" />
							<path opacity="0.850056" d="M21.2667 1.48883L1.45309 21.0288" stroke="#979797" stroke-linecap="square" />
						</svg>
					</button>
					<div class="popup__text">
						<article class="feedback">
							<div class="feedback__content">
								<h3 class="feedback__title"><?php _e('Залиште свій відгук', 'budguru'); ?></h3>
								<p class="feedback__subtitle"><?php _e('Наш менеджер зв\'яжеться з вами найближчим часом для обговорення завдань.', 'budguru'); ?></p>
								<div class="feedback__image-container">
									<?php 
									$custom_logo_id = get_theme_mod('custom_logo');
									$logo = wp_get_attachment_image_src($custom_logo_id, 'full');
									?>
									<img src="<?php echo esc_url($logo[0]); ?>" 
										 width="<?php echo esc_attr($logo[1]); ?>" 
										 height="<?php echo esc_attr($logo[2]); ?>" 
										 alt="<?php echo esc_attr(get_bloginfo('name')); ?>" 
										 class="feedback__image"> 
								</div>
							</div>


							<form class="feedback-form" id="feedback-form">
								<div class="feedback-form__group">
									<input type="text" id="name" name="name" class="feedback-form__input input" placeholder="<?php _e('Ім\'я', 'budguru'); ?>" aria-label="<?php _e('Ім\'я', 'budguru'); ?>" required>
								</div>

								<div class="feedback-form__group">
									<input type="tel" id="phone" name="phone" class="feedback-form__input input" placeholder="<?php _e('Номер телефону', 'budguru'); ?>" aria-label="<?php _e('Номер телефону', 'budguru'); ?>" required>
								</div>

								<div class="feedback-form__group">
									<select id="service" name="service" class="feedback-form__select" aria-label="<?php _e('Оберіть послугу', 'budguru'); ?>" required>
										<option value="" disabled selected><?php _e('Оберіть послугу', 'budguru'); ?></option>
										<?php 
										$services = getServices();

										foreach ($services as $service) {
											printf(
												'<option value="%s">%s</option>',
												esc_attr($service['title']),
												esc_html($service['title'])
											);
										}
										?>
									</select>
								</div>


								<div class="feedback-form__group">
									<textarea id="review" name="review" class="feedback-form__textarea input textarea" placeholder="Ваш відгук" aria-label="Ваш відгук" rows="5" required></textarea>
								</div>

								<div class="feedback-form__group">
									<p class="feedback-form__label"><?php _e('Поставте свою оцінку:', 'budguru'); ?></p>
									<div data-rating="set" class="rating"></div>
								</div>

								<div class="feedback-form__group">
									<div class="feedback-form__upload">
										<input type="file" id="photo" class="feedback-form__file-input" accept="image/*" aria-label="Завантажити фото" hidden>
										<label for="photo" class="feedback-form__file-label">
											<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
												<path d="M21 15V19C21 19.5304 20.7893 20.0391 20.4142 20.4142C20.0391 20.7893 19.5304 21 19 21H5C4.46957 21 3.96086 20.7893 3.58579 20.4142C3.21071 20.0391 3 19.5304 3 19V15" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
												<path d="M17 8L12 3L7 8" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
												<path d="M12 3V15" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
											</svg>
											<span><?php _e('Завантажити фото', 'budguru'); ?></span>
										</label>
										<p class="feedback-form__file-info"><?php _e('Максимальний розмір файлу: 5MB', 'budguru'); ?></p>
									</div>
								</div>

								<button type="submit" class="feedback-form__submit btn"><?php _e('Надіслати відгук', 'budguru'); ?></button>
								<p class="feedback-form__agreement">
									<?php _e('Натискаючи на кнопку, ви погоджуєтесь з умовами', 'budguru'); ?>
									<a href="/privacy-policy/"><?php _e('політики обробки персональних даних', 'budguru'); ?></a>
								</p>


								<div class="feedback-form__message">
									<div class="feedback-form__message-success" hidden>
										<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path d="M22 11.08V12C21.9988 14.1564 21.3005 16.2547 20.0093 17.9818C18.7182 19.709 16.9033 20.9725 14.8354 21.5839C12.7674 22.1953 10.5573 22.1219 8.53447 21.3746C6.51168 20.6273 4.78465 19.2461 3.61096 17.4371C2.43727 15.628 1.87979 13.4881 2.02168 11.3363C2.16356 9.18455 2.99721 7.13631 4.39828 5.49706C5.79935 3.85781 7.69279 2.71537 9.79619 2.24013C11.8996 1.7649 14.1003 1.98232 16.07 2.85999" stroke="#2DC071" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
											<path d="M22 4L12 14.01L9 11.01" stroke="#2DC071" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
										</svg>
										<span><?php _e('Дякуємо за ваш відгук! Ми зв\'яжемося з вами найближчим часом.', 'budguru'); ?></span>

									</div>
									<div class="feedback-form__message-error" hidden>
										<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z" stroke="#E74C3C" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
											<path d="M15 9L9 15" stroke="#E74C3C" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
											<path d="M9 9L15 15" stroke="#E74C3C" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
										</svg>
										<span><?php _e('Виникла помилка при відправці. Будь ласка, спробуйте ще раз.', 'budguru'); ?></span>
									</div>
								</div>

							</form>
						</article>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php wp_footer() ?>
</body>

</html>