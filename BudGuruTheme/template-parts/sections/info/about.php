<section class="about" aria-label="<?php _e('Інформація про компанію', 'budguru'); ?>">
    <div class="about__container">
        <div class="about__left-box">
            <h2 class="about__heading h2">
                <?php echo esc_html(get_field('about_title', 'option')); ?>
            </h2>

            <div class="about__text">
                <?php echo get_field('about_text', 'option'); ?>
            </div>

            <div class="about__futured" 
                 data-da=".about__right-box,992,0"
                 role="list"
                 aria-label="<?php _e('Наші досягнення', 'budguru'); ?>">
                <div class="about__card" role="listitem">
                    <h3 class="about__card-title" aria-label="<?php _e('Відсоток задоволених клієнтів', 'budguru'); ?>">
                        <?php _e('99%', 'budguru'); ?>
                    </h3>
                    <p class="about__card-text">
                        <?php _e('Задоволених клієнтів', 'budguru'); ?>
                    </p>
                    <img src="<?php bloginfo('template_url'); ?>/assets/img/about/card-bg_1.webp" 
                         class="about__card-inage" 
                         width="380"
                         height="380"
                         alt=""
                         aria-hidden="true"
                    >
                </div>

                <div class="about__card" role="listitem">
                    <h3 class="about__card-title" aria-label="<?php _e('Кількість реалізованих проектів', 'budguru'); ?>">
                        <?php _e('100+', 'budguru'); ?>
                    </h3>
                    <p class="about__card-text">
                        <?php _e('Реалізованих проектів', 'budguru'); ?>
                    </p>
                    <img src="<?php bloginfo('template_url'); ?>/assets/img/about/card-bg_2.webp" 
                         class="about__card-inage" 
                         width="380"
                         height="380"
                         alt=""
                         aria-hidden="true"
                    >
                </div>

                <div class="about__card" role="listitem">
                    <h3 class="about__card-title" aria-label="<?php _e('Рівень контролю якості', 'budguru'); ?>">
                        <?php _e('100%', 'budguru'); ?>
                    </h3>
                    <p class="about__card-text">
                        <?php _e('Контроль якості', 'budguru'); ?>
                    </p>
                    <a href="#" 
                       class="about__card-link rounded-link"
                       aria-label="<?php 
                           printf(
                               /* translators: %s: card title */
                               __('Дізнатися більше про %s', 'budguru'), 
                               __('контроль якості', 'budguru')
                           ); 
                       ?>">
                        <svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path d="M23.9281 1.74694L1.77208 23.9029M23.9281 1.74694L23.8607 20.6705M23.9281 1.74694L5.00457 1.81428" 
                                  stroke="#1E1E1E" 
                                  stroke-width="1.58" 
                                  stroke-linecap="round" 
                                  stroke-linejoin="round" 
                            />
                        </svg>
                    </a>
                    <img src="<?php bloginfo('template_url'); ?>/assets/img/about/card-bg_3.webp" 
                         class="about__card-inage" 
                         width="380"
                         height="380"
                         alt=""
                         aria-hidden="true"
                    >
                </div>
            </div>
        </div>

        <div class="about__right-box">
            <?php 
            $about_img = get_field('about_img', 'option');
            if($about_img): 
            ?>
                <img src="<?php echo esc_url($about_img); ?>" 
                     alt="<?php _e('Про нашу компанію', 'budguru'); ?>" 
                     width="640" 
                     height="630" 
                     class="about__img"
                >
            <?php endif; ?>
        </div>
    </div>
</section> 