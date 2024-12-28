<?php 
get_header(); 
$portfolio_data = getPortfolioWithPagination();
?>
<main class="page">
    <section class="work-performed">
        <div class="work-performed__container">
            <div class="work-performed__top-block">
                <div class="work-performed__head-wrap">
                    <h2 class="work-performed__heading h2">
                        <span>Виконані роботи</span>
                    </h2>
                </div>

                <div class="work-performed__filters">
                    <a href="#" class="work-performed__filters_link active" data-category="">
                        Усі
                    </a>
                    <a href="#" class="work-performed__filters_link" data-category="residential">
                        Житлові приміщення
                    </a>
                    <a href="#" class="work-performed__filters_link" data-category="commercial">
                        Комерційні приміщення
                    </a>
                </div>
            </div>

            <div class="work-performed__grid work archive-portfolio" id="portfolio-grid">
                <?php $i = 1; foreach($portfolio_data['projects'] as $portfolio): ?>
                    <div class="work__card <?php echo "work__card_". $i ; ?>">
                        <a href="<?php echo $portfolio['link']; ?>" class="work__link">
                            <svg width="20" height="18" viewBox="0 0 20 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M18.4246 0.815076L1.32621 16.9364M18.4246 0.815076L18.3726 14.5843M18.4246 0.815076L3.82081 0.864076" stroke="#1E1E1E" stroke-width="1.58" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </a>
                        <div class="work__text">
                            <h4 class="work__title">
                                <?php echo $portfolio['title']; ?>
                            </h4>
                        </div>
                        <img src="<?php echo $portfolio['img']; ?>" class="work__bg-img" alt="Дизайн">
                        <img src="<?php echo $portfolio['mobile_thumbnail']; ?>" class="work__bg-mobile" alt="Дизайн">
                    </div>
                <?php $i++; endforeach; ?>
            </div>

            <?php if($portfolio_data['max_pages'] > 1): ?>
                <div class="work-performed__pagination pagination" data-max-pages="<?php echo $portfolio_data['max_pages']; ?>">
                    <a href="#" class="pagination__prev" data-page="<?php echo max(1, $portfolio_data['current_page'] - 1); ?>">
                        <svg width="7" height="15" viewBox="0 0 7 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M6.42298 1.95796C6.47561 1.89432 6.51675 1.81944 6.54406 1.73763C6.57137 1.65581 6.58431 1.56864 6.58214 1.48111C6.57998 1.39357 6.56275 1.30738 6.53143 1.22746C6.50012 1.14753 6.45534 1.07544 6.39965 1.0153C6.34396 0.955151 6.27845 0.90813 6.20685 0.87692C6.13526 0.84571 6.05899 0.83092 5.9824 0.833397C5.90581 0.835873 5.83039 0.855566 5.76046 0.891352C5.69052 0.927138 5.62744 0.978315 5.57481 1.04196L0.616481 7.04196C0.514085 7.16574 0.457031 7.32962 0.457031 7.49996C0.457031 7.6703 0.514085 7.83418 0.616481 7.95796L5.57481 13.9586C5.6271 14.0237 5.69016 14.0762 5.76035 14.1131C5.83054 14.1501 5.90646 14.1707 5.98369 14.1739C6.06092 14.177 6.13792 14.1626 6.21023 14.1314C6.28254 14.1002 6.34871 14.053 6.4049 13.9923C6.46108 13.9317 6.50617 13.8589 6.53753 13.7782C6.5689 13.6975 6.58591 13.6104 6.5876 13.5221C6.58928 13.4338 6.57559 13.346 6.54733 13.2638C6.51907 13.1816 6.47681 13.1067 6.42298 13.0433L1.84265 7.49996L6.42298 1.95796Z" fill="white" />
                        </svg>
                    </a>

                    <ul class="pagination__list">
                        <?php for($i = 1; $i <= $portfolio_data['max_pages']; $i++): ?>
                            <li class="pagination__item">
                                <a href="#" data-page="<?php echo $i; ?>" 
                                class="<?php echo $i == $portfolio_data['current_page'] ? 'active' : ''; ?>">
                                    <?php echo $i; ?>
                                </a>
                            </li>
                        <?php endfor; ?>
                    </ul>

                    <a href="#" class="pagination__next" data-page="<?php echo min($portfolio_data['max_pages'], $portfolio_data['current_page'] + 1); ?>">
                        <svg width="8" height="15" viewBox="0 0 8 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M0.513802 1.95796C0.453657 1.89432 0.406637 1.81944 0.375426 1.73763C0.344216 1.65581 0.329426 1.56864 0.331903 1.48111C0.334379 1.39357 0.354072 1.30738 0.389858 1.22746C0.425644 1.14753 0.476821 1.07544 0.540469 1.0153C0.604116 0.955151 0.678987 0.90813 0.760806 0.87692C0.842625 0.84571 0.92979 0.83092 1.01732 0.833397C1.10486 0.835873 1.19105 0.855566 1.27097 0.891352C1.3509 0.927138 1.42299 0.978315 1.48314 1.04196L7.1498 7.04196C7.26683 7.16574 7.33203 7.32962 7.33203 7.49996C7.33203 7.6703 7.26683 7.83418 7.1498 7.95796L1.48314 13.9586C1.42339 14.0237 1.35131 14.0762 1.27109 14.1131C1.19087 14.1501 1.10411 14.1707 1.01585 14.1739C0.927589 14.177 0.839583 14.1626 0.756945 14.1314C0.674307 14.1002 0.598684 14.053 0.534471 13.9923C0.470257 13.9317 0.418732 13.8589 0.382887 13.7782C0.347043 13.6975 0.327595 13.6104 0.325672 13.5221C0.323749 13.4338 0.339389 13.346 0.371686 13.2638C0.403982 13.1816 0.452289 13.1067 0.513802 13.0433L5.74847 7.49996L0.513802 1.95796Z" fill="white" />
                        </svg>
                    </a>
                </div>
            <?php endif; ?>
        </div>
    </section>
</main>
<?php get_footer(); ?>