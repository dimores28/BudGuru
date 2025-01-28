<section class="our-team" aria-label="<?php _e('Секція нашої команди', 'budguru'); ?>">
    <div class="our-team__container">
        <div class="our-team__head-block">
            <h2 class="our-team__heading h2">
                <?php _e('Наша', 'budguru'); ?> <span><?php _e('команда', 'budguru'); ?></span>
            </h2>

            <div class="our-team__navigation">
                <div class="our-team__next swiper-button-next" 
                     role="button"
                     tabindex="0"
                     aria-label="<?php _e('Наступний член команди', 'budguru'); ?>">
                </div>
                <div class="our-team__prev swiper-button-prev"
                     role="button"
                     tabindex="0"
                     aria-label="<?php _e('Попередній член команди', 'budguru'); ?>">
                </div>
            </div>
        </div>

        <?php if($team_members = get_field('team_members', 'option')): ?>
            <div class="our-team__slider team-swiper"
                 role="region" 
                 aria-label="<?php _e('Слайдер членів команди', 'budguru'); ?>">
                <div class="our-team__wrapper swiper-wrapper">
                    <?php foreach($team_members as $index => $member): ?>
                        <div class="our-team__slide swiper-slide"
                             role="group" 
                             aria-label="<?php 
                                 printf(
                                     /* translators: 1: slide number, 2: total slides */
                                     __('Слайд %1$d з %2$d', 'budguru'),
                                     $index + 1,
                                     count($team_members)
                                 ); 
                             ?>">
                            <div class="human">
                                <img src="<?php echo esc_url($member['photo']); ?>" 
                                     width="510" 
                                     height="550" 
                                     class="human__img" 
                                     alt="<?php 
                                         printf(
                                             /* translators: 1: team member name, 2: position */
                                             __('Фото: %1$s, %2$s', 'budguru'),
                                             esc_attr($member['name']),
                                             esc_attr($member['position'])
                                         ); 
                                     ?>"
                                >
                                <div class="human__desc" 
                                     aria-label="<?php _e('Інформація про співробітника', 'budguru'); ?>">
                                    <h3 class="human__name">
                                        <?php echo esc_html($member['name']); ?>
                                    </h3>

                                    <p class="human__position">
                                        <?php echo esc_html($member['position']); ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section> 