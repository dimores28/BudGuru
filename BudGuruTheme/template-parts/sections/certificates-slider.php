<section class="certificates">
    <div class="certificates__container">
        <div class="certificates__top-block">
            <h2 class="certificates__heading h2">
                <?php _e('Наші', 'budguru'); ?> <span><?php _e('cертифікати та нагороди', 'budguru'); ?></span>
            </h2>

            <div class="certificates__arowws">
                <div class="certificates__next swiper-button-next"></div>
                <div class="certificates__prev swiper-button-prev"></div>
            </div>
        </div>

        <?php if($certificates = get_field('certificates', 'option')): ?>
            <div class="certificates__slider swiper">
                <div class="certificates__wrapper swiper-wrapper">
                    <?php foreach($certificates as $certificate): ?>
                        <div class="certificates__slide swiper-slide">
                            <div class="certificat">
                                <?php if($certificate['image']): ?>
                                    <img src="<?php echo esc_url($certificate['image']); ?>" 
                                         alt="<?php echo esc_attr($certificate['title']); ?>"
                                         class="certificat__img"
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