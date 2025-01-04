<?php
/*
Template Name: Calculators
*/
?>

<?php get_header() ?>

<main class="page">
    <?php
        $page_title = get_the_title();
        $words = explode(' ', $page_title);

        $middle = ceil(count($words) / 2);
        $first_part = array_slice($words, 0, $middle);
        $second_part = array_slice($words, $middle);

        echo do_shortcode(sprintf(
            '[hero_section title="%s <span>%s</span>" show_link="false"]',
            implode(' ', $first_part),
            implode(' ', $second_part)
        ));
    ?>

    <section class="calculator">
        <div class="calculator__btn-wrapp">
            <button class="calculator__tab active" data-calculator="repair">
                <?php _e('Калькулятор вартості ремонту', 'budguru'); ?>
            </button>
            <button class="calculator__tab" data-calculator="design">
                <?php _e('Калькулятор вартості дизайну', 'budguru'); ?>
            </button>
        </div>
        
        <div class="calculator__container">
            <div class="calculator__ilustration">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/calculator/calculator.webp" 
                    width="740" height="770" 
                    alt="<?php _e('Калькулятор', 'budguru'); ?>">
            </div>

            <div class="calculator__steps">
                <!-- Контейнери для калькуляторів -->
                <div class="calculator-container active" data-calculator="repair">
                    <?php include get_template_directory() . '/template-parts/calculators/repair-calculator.php'; ?>
                </div>
                
                <div class="calculator-container" data-calculator="design">
                    <?php include get_template_directory() . '/template-parts/calculators/design-calculator.php'; ?>
                </div>
            </div>
        </div>
    </section>

    <?php get_template_part('template-parts/sections/info/faq'); ?>

    <?php echo do_shortcode('[consultation_section]'); ?>
</main>

<?php get_footer() ?>