<section class="work-performed">
            <div class="work-performed__container">
                <div class="work-performed__top-block">

                    <div class="work-performed__head-wrap">
                        <h2 class="work-performed__heading h2">
                            <span>Виконані роботи</span>
                        </h2>
                        <a href="<?php echo bloginfo('url'); ?>/portfolio" class="work-performed__btn btn">
                            Дивитись більше
                        </a>
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

                <div class="work-performed__grid work" id="portfolio-grid">
                    <?php $i = 1; foreach(getPortfolio() as $portfolio): ?>
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

            </div>
        </section>