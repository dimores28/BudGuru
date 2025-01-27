<section class="our-team">
    <div class="our-team__container">
        <div class="our-team__head-block">
            <h2 class="our-team__heading h2">
                <?php _e('Наша', 'budguru'); ?> <span><?php _e('команда', 'budguru'); ?></span>
            </h2>

            <div>
                <div class="our-team__next swiper-button-next" 
                    aria-label="<?php _e('Наступний слайд', 'budguru'); ?>">
                </div>
                <div class="our-team__prev swiper-button-prev"
                    aria-label="<?php _e('Попередній слайд', 'budguru'); ?>">
                </div>
            </div>
        </div>

        <?php if($team_members = get_field('team_members', 'option')): ?>
            <div class="our-team__slider team-swiper">
                <div class="our-team__wrapper swiper-wrapper">
                    <?php foreach($team_members as $member): ?>
                        <div class="our-team__slide swiper-slide">
                            <div class="human">
                                <img src="<?php echo esc_url($member['photo']); ?>" 
                                     width="510" 
                                     height="550" 
                                     class="human__img" 
                                     alt="<?php echo esc_attr($member['name']); ?>"
                                >
                                <div class="human__desc">
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