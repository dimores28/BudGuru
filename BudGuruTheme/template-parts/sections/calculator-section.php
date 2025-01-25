<section class="calculator">
    <div class="calculator__container">
        <div class="calculator__ilustration">
            <img src="<?php bloginfo('template_url'); ?>/assets/img/calculator/calculator.webp" width="740" height="770" alt="<?php _e('Калькулятор', 'budguru'); ?>">
        </div>

        <div class="calculator__steps">
            <form class="calculator-form" id="calculator-form">
                <h3 class="calculator__heading h2">
                    <?php _e('Калькулятор вартості', 'budguru'); ?> <span><?php _e('ремонту', 'budguru'); ?></span>
                </h3>

                <!-- ... Решта коду форми ... -->
                <?php include get_template_directory() . '/template-parts/forms/calculator-steps.php'; ?>

                <div class="form-success">
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
</section> 