<section class="calculator">
    <div class="calculator__container">
        <div class="calculator__ilustration">
            <img src="<?php bloginfo('template_url'); ?>/assets/img/calculator/calculator.webp" width="740" height="770" alt="<?php _e('Калькулятор', 'budguru'); ?>">
        </div>

        <div class="calculator__steps">
            <form class="calculator-form" id="calculator-form">
                <h2 class="calculator__heading h2">
                    <?php _e('Калькулятор вартості', 'budguru'); ?> <span><?php _e('ремонту', 'budguru'); ?></span>
                </h2>

                <!-- ... Решта коду форми ... -->
                <?php include get_template_directory() . '/template-parts/forms/calculator-steps.php'; ?>

            </form>
        </div>
    </div>
</section> 