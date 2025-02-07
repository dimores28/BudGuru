<section class="reviews" aria-label="<?php _e('Секція відгуків клієнтів', 'budguru'); ?>">
    <div class="reviews__container">
        <div class="reviews__top-block">
            <h3 class="reviews__heading h2">
                <span><?php _e('Відгуки', 'budguru'); ?></span> <?php _e('наших клієнтів', 'budguru'); ?>
            </h3>
            <div class="reviews__btn-wrap">
                <a href="#feedback" 
                    data-popup="#feedback"
                    class="reviews__btn btn popup-link"
                    aria-label="<?php _e('Залишити свій відгук про нашу роботу', 'budguru'); ?>">
                    <?php _e('Опишіть ваші враження', 'budguru'); ?>
                </a>

                <div class="reviews__next swiper-button-next"
                    role="button"
                    tabindex="0"
                    aria-label="<?php _e('Наступний відгук', 'budguru'); ?>">
                </div>
                <div class="reviews__prev swiper-button-prev"
                    role="button"
                    tabindex="0"
                    aria-label="<?php _e('Попередній відгук', 'budguru'); ?>">
                </div>
            </div>
        </div>

        <?php 
        $reviews = getReviews(6); // Отримуємо 6 останніх відгуків
        if($reviews): 
        ?>
            <div class="reviews__slider swiper" 
                 role="region" 
                 aria-label="<?php _e('Слайдер відгуків', 'budguru'); ?>">
                <div class="reviews__wrapper swiper-wrapper">
                    <?php foreach($reviews as $index => $review): ?>
                        <div class="reviews__slide swiper-slide" 
                             role="group" 
                             aria-label="<?php 
                                 printf(
                                     /* translators: 1: slide number, 2: total slides */
                                     __('Слайд %1$d з %2$d', 'budguru'),
                                     $index + 1,
                                     count($reviews)
                                 ); 
                             ?>">
                            <div class="review-card">
                                <div data-rating="5" 
                                     data-rating-value="<?php echo esc_attr($review['rating']); ?>" 
                                     class="rating">
                                </div>
                                
                                <div class="review-card__bio">
                                    <h4 class="review-card__user-name">
                                        <?php echo esc_html($review['title']); ?>
                                    </h4>

                                    <?php 
                                    $image_url = $review['photo'] 
                                        ? esc_url($review['photo'])
                                        : get_template_directory_uri() . '/assets/img/reviews/avatar.png';
                                    ?>
                                    <img src="<?php echo $image_url; ?>" 
                                         class="review-card__avatar" 
                                         width="60" 
                                         height="60" 
                                         alt="<?php 
                                             printf(
                                                 /* translators: %s: reviewer name */
                                                 __('Фото користувача %s', 'budguru'), 
                                                 esc_attr($review['title'])
                                             ); 
                                         ?>"
                                    >
                                </div>
                                
                                <div class="review-card__text" 
                                     aria-label="<?php 
                                         printf(
                                             /* translators: %s: reviewer name */
                                             __('Відгук від %s', 'budguru'), 
                                             esc_attr($review['title'])
                                         ); 
                                     ?>">
                                    <?php echo esc_html($review['content']); ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

                <div class="reviews__pagination swiper-pagination" 
                     role="group" 
                     aria-label="<?php _e('Навігація по слайдах', 'budguru'); ?>">
                </div>
            </div>
        <?php endif; ?>
    </div>
</section> 