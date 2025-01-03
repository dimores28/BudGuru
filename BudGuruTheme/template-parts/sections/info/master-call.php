<?php
/**
 * @var array $args
 */

// Отримуємо об'єкт секції з аргументів
$section = isset($args['section']) ? $args['section'] : null;

// Перевіряємо чи існує об'єкт
if (!$section instanceof BudGuru_Service_Section) {
    return;
}
?>
<section class="master">
    <div class="master__container">
        <div class="master__lef-col">
            <h2 class="master__heading h2">
                <span><?php echo esc_html($section->get('title_first')); ?></span> <?php echo esc_html($section->get('title_second')); ?>
            </h2>

            <p class="master__text">
                <?php echo wp_kses_post($section->get('description')); ?>
            </p>
        </div>
        <div class="master__right-col">
            <a href="<?php echo esc_url($section->get('button_url')); ?>" class="master__btn btn">
                <?php echo esc_html($section->get('button_text')); ?>
            </a>
            <img src="<?php echo esc_url($section->get('image')); ?>" 
                 width="680" 
                 height="550" 
                 class="master__img" 
                 alt="<?php echo esc_attr($section->get('title_first')); ?>"
            >
        </div>
    </div>
</section>