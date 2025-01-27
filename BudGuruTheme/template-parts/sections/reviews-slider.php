<section class="reviews">
    <div class="reviews__container">
        <div class="reviews__top-block">
            <h3 class="reviews__heading h2">
                <span><?php _e('Відгуки', 'budguru'); ?></span> <?php _e('наших клієнтів', 'budguru'); ?>
            </h3>
            <div class="reviews__btn-wrap">
                <a href="<?php echo esc_url(get_field('review_form_link', 'option')); ?>" 
                    class="reviews__btn btn"
                    aria-label="<?php _e('Залишити свій відгук', 'budguru'); ?>">
                    <?php _e('Опишіть ваші враження', 'budguru'); ?>
                </a>

                <div class="reviews__next swiper-button-next"
                    aria-label="<?php _e('Наступний відгук', 'budguru'); ?>">
                </div>
                <div class="reviews__prev swiper-button-prev"
                    aria-label="<?php _e('Попередній відгук', 'budguru'); ?>">
                </div>
            </div>
        </div>

        <?php if($reviews = get_field('reviews', 'option')): ?>
            <div class="reviews__slider swiper">
                <div class="reviews__wrapper swiper-wrapper">
                    <?php foreach($reviews as $review): ?>
                        <div class="reviews__slide swiper-slide">
                            <div class="review-card">
                                <?php if($review['rating']): ?>
                                    <img src="<?php bloginfo('template_url'); ?>/assets/img/reviews/rating.webp" 
                                         width="184" 
                                         height="32" 
                                         alt="<?php echo sprintf(__('Рейтинг %s', 'budguru'), $review['rating']); ?>"
                                    >
                                <?php endif; ?>
                                
                                <div class="review-card__bio">
                                    <h4 class="review-card__user-name">
                                        <?php echo esc_html($review['name']); ?>
                                    </h4>

                                    <?php if($review['avatar']): ?>
                                        <img src="<?php echo esc_url($review['avatar']); ?>" 
                                             class="review-card__avatar" 
                                             width="60" 
                                             height="60" 
                                             alt="<?php echo esc_attr($review['name']); ?>"
                                        >
                                    <?php endif; ?>
                                </div>
                                
                                <div class="review-card__text">
                                    <?php echo esc_html($review['text']); ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

                <div class="reviews__pagination swiper-pagination"></div>
            </div>
        <?php endif; ?>
    </div>
</section> 