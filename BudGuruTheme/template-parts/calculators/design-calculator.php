<form class="calculator-form" id="design-calculator-form" data-calculator-type="design">
    <h2 class="calculator__heading h2">
        <?php _e('Калькулятор вартості', 'budguru'); ?> 
        <span><?php _e('дизайну інтер\'єру', 'budguru'); ?></span>
    </h2>
    
    <!-- Кроки для калькулятора дизайну -->
    <?php include get_template_directory() . '/template-parts/calculators/steps/design-steps.php'; ?>

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