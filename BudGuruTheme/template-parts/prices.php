<?php
/*
Template Name: Prices
*/
?>

<?php get_header();

    $list_items = get_field('list');
    $prices = get_field('table');
?>

<main class="page">
    <?php
        $page_title = get_the_title();
        $words = explode(' ', $page_title);

        $middle = ceil(count($words) / 2);
        $first_part = array_slice($words, 0, $middle);
        $second_part = array_slice($words, $middle);

        // Отримуємо URL та alt текст головного зображення
        $post_thumbnail_id = get_post_thumbnail_id(get_the_ID());
        $bg_image = get_the_post_thumbnail_url(get_the_ID(), 'full');
        $bg_alt = get_post_meta($post_thumbnail_id, '_wp_attachment_image_alt', true);
        
        // Передаємо параметри bg_image та bg_alt тільки якщо є зображення
        $shortcode_args = array(
            'title' => sprintf('%s <span>%s</span>', 
                implode(' ', $first_part), 
                implode(' ', $second_part)
            ),
            'show_link' => 'false'
        );

        // Додаємо параметри зображення тільки якщо воно є
        if ($bg_image) {
            $shortcode_args['bg_image'] = $bg_image;
            $shortcode_args['bg_alt'] = esc_attr($bg_alt);
        }
        
        // Формуємо шорткод
        $shortcode = '[hero_section';
        foreach ($shortcode_args as $key => $value) {
            $shortcode .= sprintf(' %s="%s"', $key, $value);
        }
        $shortcode .= ']';
        
        echo do_shortcode($shortcode);
    ?>

    <div class="prices-wrapper">
        <div class="custom-tab__wrapp">
            <button class="custom-tab__tab active">
                <?php _e('Ціни на дизайн', 'budguru'); ?>
            </button>
            <button class="custom-tab__tab">
                <?php _e('Ціни на послуги Чоловік на годину', 'budguru'); ?>
            </button>
        </div>

        <section class="design-prices custom-tab__content">
            <div class="design-prices__container">
                <h2 class="design-prices__heading h2">
                    <?php _e('Ціни на дизайн інтерʼєру в Києві', 'budguru'); ?>
                </h2>

                <div class="design-prices__table-wrap">
                    <table class="design-prices__table table">
                        <thead class="table__header">
                            <tr class="table__row">
                                <th class="table__head table__head--packages"><?php _e('Пакети', 'budguru'); ?></th>
                                <th class="table__head table__head--visual"><?php _e('Візуальний', 'budguru'); ?></th>
                                <th class="table__head table__head--technical"><?php _e('Технічний', 'budguru'); ?></th>
                                <th class="table__head table__head--all-included"><?php _e('Все враховано', 'budguru'); ?></th>
                                <th class="table__head table__head--maximum"><?php _e('Максимальний', 'budguru'); ?></th>
                            </tr>
                        </thead>
                        <tbody class="table__body">
                            <?php if($prices['price_table_row']): 
                                foreach($prices['price_table_row'] as $row): 
                                    if($row['empty_row']): ?>
                                        <tr class="table__row table__row-divider">
                                            <td class="table__cell table__cell--title"><?php echo $row['row_name']; ?></td>
                                            <td class="table__cell"></td>
                                            <td class="table__cell"></td>
                                            <td class="table__cell"></td>
                                            <td class="table__cell"></td>
                                        </tr>
                                    <?php else: ?>
                                        <tr class="table__row">
                                            <td class="table__cell table__cell--title"><?php echo $row['row_name']; ?></td>
                                            
                                            <td class="table__cell">
                                                <?php if(!$row['visual_option']): ?>
                                                    <svg width="38" height="39" viewBox="0 0 38 39" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <rect x="0.507812" y="0.640625" width="37" height="37" stroke="white" />
                                                    </svg>
                                                <?php else: ?>
                                                    <svg width="38" height="39" viewBox="0 0 38 39" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <rect x="0.0078125" y="0.140625" width="38" height="38" fill="white" />
                                                        <path d="M32.5059 11.6384L14.5059 29.6384L6.25586 21.3884L8.37086 19.2734L14.5059 25.3934L30.3909 9.52344L32.5059 11.6384Z" fill="#1E1E1E" />
                                                    </svg>
                                                <?php endif; ?>
                                            </td>
                                            
                                            <td class="table__cell">
                                                <?php if(!$row['tehnical_option']): ?>
                                                    <svg width="38" height="39" viewBox="0 0 38 39" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <rect x="0.507812" y="0.640625" width="37" height="37" stroke="white" />
                                                    </svg>
                                                <?php else: ?>
                                                    <svg width="38" height="39" viewBox="0 0 38 39" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <rect x="0.0078125" y="0.140625" width="38" height="38" fill="white" />
                                                        <path d="M32.5059 11.6384L14.5059 29.6384L6.25586 21.3884L8.37086 19.2734L14.5059 25.3934L30.3909 9.52344L32.5059 11.6384Z" fill="#1E1E1E" />
                                                    </svg>
                                                <?php endif; ?>
                                            </td>
                                            
                                            <td class="table__cell">
                                                <?php if(!$row['all_option']): ?>
                                                    <svg width="38" height="39" viewBox="0 0 38 39" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <rect x="0.507812" y="0.640625" width="37" height="37" stroke="white" />
                                                    </svg>
                                                <?php else: ?>
                                                    <svg width="36" height="37" viewBox="0 0 36 37" style="background: #1E1E1E;" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M31.5059 10.6384L13.5059 28.6384L5.25586 20.3884L7.37086 18.2734L13.5059 24.3934L29.3909 8.52344L31.5059 10.6384Z" fill="white" />
                                                    </svg>
                                                <?php endif; ?>
                                            </td>
                                            
                                            <td class="table__cell">
                                                <?php if(!$row['max_option']): ?>
                                                    <svg width="38" height="39" viewBox="0 0 38 39" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <rect x="0.507812" y="0.640625" width="37" height="37" stroke="white" />
                                                    </svg>
                                                <?php else: ?>
                                                    <svg width="38" height="39" viewBox="0 0 38 39" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <rect x="0.0078125" y="0.140625" width="38" height="38" fill="white" />
                                                        <path d="M32.5059 11.6384L14.5059 29.6384L6.25586 21.3884L8.37086 19.2734L14.5059 25.3934L30.3909 9.52344L32.5059 11.6384Z" fill="#1E1E1E" />
                                                    </svg>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php endif;
                                endforeach;
                            endif; ?>

                            <tr class="table__row table__row-divider table__row-last">
                                <td class="table__cell table__cell--title"><?php _e('Вартість:', 'budguru'); ?></td>
                                <td class="table__cell">
                                    <?php echo $prices['vizual']; ?>
                                    <a href="#consultation-section" class="table__link"><?php _e('Замовити', 'budguru'); ?></a>
                                </td>
                                <td class="table__cell">
                                    <?php echo $prices['tehnical']; ?>
                                    <a href="#consultation-section" class="table__link"><?php _e('Замовити', 'budguru'); ?></a>
                                </td>
                                <td class="table__cell">
                                    <?php echo $prices['everything_considered'] ?? '32$/m2'; ?>
                                    <a href="#consultation-section" class="table__link"><?php _e('Замовити', 'budguru'); ?></a>
                                </td>
                                <td class="table__cell">
                                    <?php echo $prices['maximum'] ?? '45$/m2'; ?>
                                    <a href="#consultation-section" class="table__link"><?php _e('Замовити', 'budguru'); ?></a>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </section>

        <section class="prices custom-tab__content">
            <div class="prices__container">
                <h2 class="prices__heading">
                    <?php _e('Ціни на послуги чоловіка на годину', 'budguru'); ?>
                </h2>

                <div class="prices__row">
                    <?php if($list_items): 
                        foreach($list_items['row'] as $item): ?>
                            <div class="price">
                                <h3 class="price__heading">
                                    <?php echo $item['title']; ?>
                                </h3>

                                <div class="price__desc">
                                    <p class="price__text">
                                        <?php echo $item['desc']; ?>
                                    </p>
                                    <a href="#consultation-section" class="price__btn btn">
                                        <?php _e('Замовити', 'budguru'); ?>
                                    </a>
                                </div>
                            </div>
                        <?php endforeach;
                    endif; ?>
                </div>
            </div>
        </section>
    </div>

    <?php echo do_shortcode('[consultation_section]'); ?>

</main>

<?php get_footer() ?>