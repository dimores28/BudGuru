<?php 
$portfolio_items = getPortfolio();
if (!empty($portfolio_items)):
?>
<section class="work-performed">
    <div class="work-performed__container">
        <div class="work-performed__top-block">

            <div class="work-performed__head-wrap">
                <h2 class="work-performed__heading h2">
                    <span><?php _e('Виконані роботи', 'budguru'); ?></span>
                </h2>
                <a href="<?php echo bloginfo('url'); ?>/portfolio" 
                    class="work-performed__btn btn"
                    aria-label="<?php _e('Переглянути все портфоліо', 'budguru'); ?>">
                    <?php _e('Дивитись більше', 'budguru'); ?>
                </a>
            </div>

            <div class="work-performed__filters">
                <a href="#" 
                    class="work-performed__filters_link active" 
                    data-category=""
                    aria-label="<?php _e('Показати всі проекти', 'budguru'); ?>">
                    <?php _e('Усі', 'budguru'); ?>
                </a>
                <a href="#" 
                    class="work-performed__filters_link" 
                    data-category="residential"
                    aria-label="<?php _e('Фільтрувати: показати тільки житлові приміщення', 'budguru'); ?>">
                    <?php _e('Житлові приміщення', 'budguru'); ?>
                </a>
                <a href="#" 
                    class="work-performed__filters_link" 
                    data-category="commercial"
                    aria-label="<?php _e('Фільтрувати: показати тільки комерційні приміщення', 'budguru'); ?>">
                    <?php _e('Комерційні приміщення', 'budguru'); ?>
                </a>
            </div>

        </div>

        <div class="work-performed__grid work" id="portfolio-grid">
            <?php $i = 1; foreach($portfolio_items as $portfolio): ?>
                <div class="work__card <?php echo "work__card_". $i ; ?>">
                    <a href="<?php echo $portfolio['link']; ?>" 
                        class="work__link"
                        aria-label="<?php 
                            printf(
                                /* translators: %s: portfolio item title */
                                __('Переглянути проект: %s', 'budguru'), 
                                $portfolio['title']
                            ); 
                        ?>">
                        <svg width="20" height="18" viewBox="0 0 20 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M18.4246 0.815076L1.32621 16.9364M18.4246 0.815076L18.3726 14.5843M18.4246 0.815076L3.82081 0.864076" stroke="#1E1E1E" stroke-width="1.58" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </a>
                    <div class="work__text">
                        <h4 class="work__title">
                            <a href="<?php echo $portfolio['link']; ?>" 
                               aria-label="<?php 
                                   printf(
                                       /* translators: %s: portfolio item title */
                                       __('Переглянути проект: %s', 'budguru'), 
                                       $portfolio['title']
                                   ); 
                               ?>">
                                <?php echo $portfolio['title']; ?>
                            </a>
                        </h4>
                    </div>
                    <img src="<?php echo $portfolio['img']; ?>" class="work__bg-img" alt="<?php echo $portfolio['title']; ?>">
                    <img src="<?php echo $portfolio['mobile_thumbnail']; ?>" class="work__bg-mobile" alt="<?php echo $portfolio['title']; ?>">
                </div>
            <?php $i++; endforeach; ?>
        </div>

    </div>
</section>
<?php endif; ?>