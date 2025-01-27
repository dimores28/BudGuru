<section class="about">
    <div class="about__container">
        <div class="about__left-box">
            <h2 class="about__heading h2">
                <?php _e('Про нас', 'budguru'); ?>
            </h2>

            <p class="about__text">
                <?php _e('Ми – команда професіоналів, яка перетворює простір на справжній дім. Займаючись ремонтом та дизайном інтер\'єрів, ми не лише втілюємо стильні ідеї, а й робимо їх максимально комфортними та функціональними для кожного клієнта. Наш підхід поєднує сучасні тенденції, перевірені методики та високоякісні матеріали. Ми надаємо комплексний сервіс: від розробки індивідуального дизайн-проєкту до фінального оздоблення та декору. Наша мета – зробити процес ремонту простим і приємним для вас, взявши на себе всі етапи, включаючи консультації, підбір матеріалів та повну реалізацію проєкту. Обираючи нас, ви отримуєте не просто результат, а створюєте простір, який буде надихати та дарувати комфорт щодня.', 'budguru'); ?>
            </p>

            <div class="about__futured" data-da=".about__right-box,992,0">
                <div class="about__card">
                    <h3 class="about__card-title">
                        <?php _e('99%', 'budguru'); ?>
                    </h3>
                    <p class="about__card-text">
                        <?php _e('Задоволених клієнтів', 'budguru'); ?>
                    </p>
                    <img src="<?php bloginfo('template_url'); ?>/assets/img/about/card-bg_1.webp" 
                         class="about__card-inage" 
                         alt="<?php _e('Задоволені клієнти', 'budguru'); ?>"
                    >
                </div>

                <div class="about__card">
                    <h3 class="about__card-title">
                        <?php _e('100+', 'budguru'); ?>
                    </h3>
                    <p class="about__card-text">
                        <?php _e('Реалізованих проектів', 'budguru'); ?>
                    </p>
                    <img src="<?php bloginfo('template_url'); ?>/assets/img/about/card-bg_2.webp" 
                         class="about__card-inage" 
                         alt="<?php _e('Реалізовані проекти', 'budguru'); ?>"
                    >
                </div>

                <div class="about__card">
                    <h3 class="about__card-title">
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
                        <svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
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
                         alt="<?php _e('Контроль якості', 'budguru'); ?>"
                    >
                </div>
            </div>
        </div>

        <div class="about__right-box">
            <img src="<?php bloginfo('template_url'); ?>/assets/img/about/about.webp" 
                 alt="<?php _e('Про нас', 'budguru'); ?>" 
                 width="640" 
                 height="630" 
                 class="about__img"
            >
        </div>
    </div>
</section> 