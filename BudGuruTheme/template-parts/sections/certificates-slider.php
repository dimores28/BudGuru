<section class="certificates" aria-label="<?php _e('Секція сертифікатів та нагород', 'budguru'); ?>">
    <div class="certificates__container">
        <div class="certificates__top-block">
            <h3 class="certificates__heading h2">
                <?php _e('Наші', 'budguru'); ?> <span><?php _e('cертифікати та нагороди', 'budguru'); ?></span>
            </h3>

            <div class="certificates__arowws">
                <div class="certificates__next swiper-button-next"
                     role="button"
                     tabindex="0"
                     aria-label="<?php _e('Наступний сертифікат', 'budguru'); ?>">
                </div>
                <div class="certificates__prev swiper-button-prev"
                     role="button"
                     tabindex="0"
                     aria-label="<?php _e('Попередній сертифікат', 'budguru'); ?>">
                </div>
            </div>
        </div>

        <?php if($certificates = get_field('certificates', 'option')): ?>
            <div class="certificates__slider swiper" 
                 role="region" 
                 aria-label="<?php _e('Слайдер сертифікатів', 'budguru'); ?>">
                <div class="certificates__wrapper swiper-wrapper">
                    <?php foreach($certificates as $index => $certificate): ?>
                        <div class="certificates__slide swiper-slide" 
                             role="group" 
                             aria-label="<?php 
                                 printf(
                                     /* translators: 1: slide number, 2: total slides, 3: certificate title */
                                     __('Слайд %1$d з %2$d: %3$s', 'budguru'),
                                     $index + 1,
                                     count($certificates),
                                     esc_attr($certificate['title'])
                                 ); 
                             ?>">
                            <div class="certificat">
                                <?php if($certificate['image']): ?>
                                    <img src="<?php echo esc_url($certificate['image']); ?>" 
                                         alt="<?php 
                                             printf(
                                                 /* translators: %s: certificate title */
                                                 __('Сертифікат: %s', 'budguru'), 
                                                 esc_attr($certificate['title'])
                                             ); 
                                         ?>"
                                         class="certificat__img"
                                         width="380"
                                         height="537"
                                    >
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section> 