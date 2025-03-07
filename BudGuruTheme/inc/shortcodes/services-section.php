function services_section_shortcode($atts) {
    $atts = shortcode_atts(array(
        'title' => __('Наші', 'budguru') . ' <span>' . __('послуги', 'budguru') . '</span>',
        'parent' => 0, // Додаємо параметр для фільтрації за батьківським запитом
    ), $atts);

    $services = getServices($atts['parent']); // Передаємо параметр parent

    ob_start();
    ?>
    <section class="services">
        <div class="services__container">
            <h2 class="services__heading h2">
                <?php echo $atts['title']; ?>
            </h2>

            <div class="services__row">
                <?php foreach($services as $service): ?>
                    <div class="service">
                        <div class="service__illustration">
                            <img src="<?php echo $service['img']; ?>" alt="<?php echo $service['title']; ?>" class="service__img" width="370" height="370">
                        </div>
                        <div class="service__content">
                            <h3 class="service__heading"><?php echo $service['title']; ?></h3>
                            <?php if(!empty($service['description'])): ?>
                                <p class="service__text"><?php echo $service['description']; ?></p>
                            <?php endif; ?>
                            <a href="<?php echo $service['link']; ?>" class="service__btn"><?php _e('Детальніше', 'budguru'); ?></a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <?php
    return ob_get_clean();
}
add_shortcode('services_section', 'services_section_shortcode');