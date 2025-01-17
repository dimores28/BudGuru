<?php
    $defaults = array(
        'title' => __('Студія <span>дизайну інтерʼєру</span> та <span>ремонту</span>', 'budguru'),
        'show_link' => true
    );

    $args = wp_parse_args($atts, $defaults);
?>

<section class="hero">
    <img src="<?php bloginfo('template_url'); ?>/assets/img/hero_bg.webp" class="hero__bg-image" width="1920" height="1100" alt="hero">
    <div class="hero__container">
        <div class="hero__top-block">
            <h1 class="hero__heading h1">
                <?php echo $args['title']; ?>
                <?php if($args['show_link']): ?>
                    <a href="/blog" class="hero__link">
                        <svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M23.9281 1.74694L1.77207 23.9029M23.9281 1.74694L23.8607 20.6705M23.9281 1.74694L5.00456 1.81428" stroke="#1E1E1E" stroke-width="1.58" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </a>
                <?php endif; ?>
            </h1>

            <div class="hero__lang custom-select">
                <?php
                if(function_exists('pll_the_languages')) {
                    $languages = pll_the_languages(array(
                        'show_flags' => 0,
                        'show_names' => 1,
                        'hide_if_empty' => 0,
                        'raw' => 1
                    ));
                    
                    if($languages) {
                        $current_lang = '';
                        echo '<div class="select-selected">';
                        foreach($languages as $language) {
                            if($language['current_lang']) {
                                echo $language['name'];
                                $current_lang = $language['name'];
                            }
                        }
                        echo '</div>';
                        
                        echo '<div class="select-items select-hide">';
                        foreach($languages as $language) {
                            if($language['name'] !== $current_lang) {
                                echo sprintf(
                                    '<div data-url="%s">%s</div>',
                                    $language['url'],
                                    $language['name']
                                );
                            }
                        }
                        echo '</div>';
                    }
                }
                ?>
            </div>
        </div>
        
        <div class="hero__center-block">
            <a href="tel:<?echo get_field('phone', 'option'); ?>" class="hero__btn-coll">
                <svg width="33" height="33" viewBox="0 0 33 33" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M23.7788 32.6107C21.4709 32.5258 14.9303 31.622 8.08029 24.775C1.23191 17.9265 0.329588 11.3888 0.243042 9.07972C0.114825 5.56089 2.81058 2.14301 5.92465 0.808232C6.29964 0.646338 6.7103 0.5847 7.11631 0.629367C7.52232 0.674033 7.90974 0.823469 8.24056 1.06301C10.8049 2.93139 12.5743 5.75799 14.0937 7.98049C14.428 8.46878 14.5709 9.06297 14.4952 9.64984C14.4196 10.2367 14.1306 10.7752 13.6834 11.1628L10.5565 13.4847C10.4054 13.5937 10.2991 13.7539 10.2572 13.9355C10.2154 14.117 10.2408 14.3076 10.3289 14.4717C11.0373 15.7584 12.297 17.6749 13.7395 19.117C15.1819 20.5592 17.1901 21.902 18.5668 22.6903C18.7394 22.7872 18.9426 22.8143 19.1346 22.766C19.3266 22.7177 19.4927 22.5978 19.599 22.4308L21.6344 19.3334C22.0086 18.8364 22.5606 18.5034 23.1749 18.4043C23.7891 18.3051 24.4179 18.4474 24.9296 18.8014C27.1846 20.3621 29.8162 22.1007 31.7427 24.5667C32.0017 24.8999 32.1665 25.2965 32.2198 25.7151C32.2731 26.1337 32.2129 26.5589 32.0456 26.9463C30.7041 30.0757 27.3096 32.7405 23.7788 32.6107Z" fill="#F9C98C" />
                </svg>
            </a>

            <ul class="hero__social">
                <li class="hero__social_item">
                    <a href="<?echo get_field('whatsapp', 'option'); ?>" class="hero__social_link">
                        <img src="<?php bloginfo('template_url'); ?>/assets/img/whatsapp-icon.webp" width="32" height="32" class="hero__social_icon" alt="Image">
                    </a>
                </li>
                <li class="hero__social_item">
                    <a href="<?echo get_field('telegram', 'option'); ?>" class="hero__social_link">
                        <img src="<?php bloginfo('template_url'); ?>/assets/img/telegram.webp" width="32" height="32" class="hero__social_icon" alt="Image">
                    </a>
                </li>
                <li class="hero__social_item">
                    <a href="<?echo get_field('viber', 'option'); ?>" class="hero__social_link">
                        <img src="<?php bloginfo('template_url'); ?>/assets/img/viber.webp" width="32" height="32" class="hero__social_icon" alt="Image">
                    </a>
                </li>
            </ul>
        </div>

        <div class="hero__bottom-block">
            <div class="hero__sticker sticker">
                <div class="sticker__desc">
                    <?php _e('сучасний ремонт та дизайн', 'budguru'); ?>
                </div>

                <h3 class="sticker__heading">
                    <?php _e('Замовте ремонт під ключ', 'budguru'); ?> 
                    <span><?php _e('та отримайте', 'budguru'); ?></span> 
                    <mark><?php _e('дизайн проект у подарунок', 'budguru'); ?></mark>
                </h3>

                <button  class="sticker__btn btn">
                    <?php _e('Обговорити проект', 'budguru'); ?>
                </button>
            </div>
            
            <?php if (get_theme_mod('show_hero_promo', true)) : ?>
                <div class="hero__baner baner">
                    <img src="<?php bloginfo('template_url'); ?>/assets/img/3d-house.webp" alt="house" class="baner__img">
                    <div class="baner__content">
                        <h4 class="baner__heading">
                            <?php _e('Готові проекти будинків', 'budguru'); ?>
                        </h4>
                        <p class="baner__text">
                            <?php _e('Переходтье в наше архітектурне бюро та дізнайтеся більше про готові проекти будинків', 'budguru'); ?>
                        </p>
                        <a href="/about" class="baner__link">
                            <span><?php _e('Детальніше', 'budguru'); ?></span>
                            <svg width="34" height="33" viewBox="0 0 34 33" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M22.8865 9.93992L10.0889 22.7375M22.8865 9.93992L22.8476 20.8704M22.8865 9.93992L11.956 9.97882" stroke="white" stroke-width="1.28358" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </a>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section> 