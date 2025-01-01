<?php
/*
Template Name: Home
*/
?>

<?php get_header() ?>

    <main class="page">
        
        <?php echo do_shortcode('[hero_section title="Студія <span>дизайну інтерʼєру</span> та <span>ремонту</span>" show_link="false"]'); ?>

        <section class="about">
            <div class="about__container">
                <div class="about__left-box">
                    <h2 class="about__heading h2">
                        Про нас
                    </h2>

                    <p class="about__text">
                        Ми – команда професіоналів, яка перетворює простір на справжній дім. Займаючись ремонтом та дизайном
                        інтер'єрів, ми не лише втілюємо стильні ідеї, а й робимо їх максимально комфортними та функціональними
                        для кожного клієнта. Наш підхід поєднує сучасні тенденції, перевірені методики та високоякісні
                        матеріали. Ми надаємо комплексний сервіс: від розробки індивідуального дизайн-проєкту до фінального
                        оздоблення та декору. Наша мета – зробити процес ремонту простим і приємним для вас, взявши на себе всі
                        етапи, включаючи консультації, підбір матеріалів та повну реалізацію проєкту. Обираючи нас, ви отримуєте
                        не просто результат, а створюєте простір, який буде надихати та дарувати комфорт щодня.
                    </p>

                    <div class="about__futured" data-da=".about__right-box,992,0">

                        <div class="about__card">
                            <h3 class="about__card-title">
                                99%
                            </h3>
                            <p class="about__card-text">
                                Задоволених клієнтів
                            </p>
                            <img src="<?php bloginfo('template_url'); ?>/assets/img/about/card-bg_1.webp" class="about__card-inage" alt="Image">
                        </div>

                        <div class="about__card">
                            <h3 class="about__card-title">
                                100+
                            </h3>
                            <p class="about__card-text">
                                Реалізованих проектів
                            </p>
                            <img src="<?php bloginfo('template_url'); ?>/assets/img/about/card-bg_2.webp" class="about__card-inage" alt="Image">
                        </div>

                        <div class="about__card">
                            <h3 class="about__card-title">
                                100%
                            </h3>
                            <p class="about__card-text">
                                Контроль якості
                            </p>
                            <a href="#" class="about__card-link rounded-link">
                                <svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M23.9281 1.74694L1.77208 23.9029M23.9281 1.74694L23.8607 20.6705M23.9281 1.74694L5.00457 1.81428" stroke="#1E1E1E" stroke-width="1.58" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </a>
                            <img src="<?php bloginfo('template_url'); ?>/assets/img/about/card-bg_3.webp" class="about__card-inage" alt="Image">
                        </div>
                    </div>
                </div>

                <div class="about__right-box">
                    <img src="<?php bloginfo('template_url'); ?>/assets/img/about/about.webp" alt="Про нас" width="640" height="630" class="about__img">
                </div>
            </div>
        </section>

        <?php get_template_part('template-parts/sections/info/videoplayer'); ?>

        <?php echo do_shortcode('[consultation_section]'); ?>

        <?php echo do_shortcode('[services_section]'); ?>

        <section class="our-team">
            <div class="our-team__container">

                <div class="our-team__head-block">
                    <h2 class="our-team__heading h2">
                        Наша <span>команда</span>
                    </h2>

                    <div>
                        <div class="our-team__next swiper-button-next"></div>
                        <div class="our-team__prev swiper-button-prev"></div>
                    </div>
                </div>

                <div class="our-team__slider team-swiper">
                    <div class="our-team__wrapper swiper-wrapper">
                        <div class="our-team__slide swiper-slide">
                            <div class="human">
                                <img src="<?php bloginfo('template_url'); ?>/assets/img/teem/Ocsana.webp" width="510" height="550" class="human__img" alt="Головний дизайнер">
                                <div class="human__desc">
                                    <h3 class="human__name">
                                        Оксана
                                    </h3>

                                    <p class="human__position">
                                        Головний дизайнер
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="our-team__slide swiper-slide">
                            <div class="human">
                                <img src="<?php bloginfo('template_url'); ?>/assets/img/teem/Dmytro.webp" width="510" height="550" class="human__img" alt="Засновник та керівник">
                                <div class="human__desc">
                                    <h3 class="human__name">
                                        Дмитро
                                    </h3>

                                    <p class="human__position">
                                        Засновник та керівник
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="our-team__slide swiper-slide">
                            <div class="human">
                                <img src="<?php bloginfo('template_url'); ?>/assets/img/teem/Daria.webp" width="510" height="550" class="human__img" alt="Головний архітектор">
                                <div class="human__desc">
                                    <h3 class="human__name">
                                        Дарія
                                    </h3>

                                    <p class="human__position">
                                        Головний архітектор
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="our-team__slide swiper-slide">
                            <div class="human">
                                <img src="<?php bloginfo('template_url'); ?>/assets/img/teem/Roman.webp" width="510" height="550" class="human__img" alt="Виконроб">
                                <div class="human__desc">
                                    <h3 class="human__name">
                                        Роман
                                    </h3>

                                    <p class="human__position">
                                        Виконроб
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="our-team__slide swiper-slide">
                            <div class="human">
                                <img src="<?php bloginfo('template_url'); ?>/assets/img/teem/Katja.webp" width="510" height="550" class="human__img" alt="Архітектор">
                                <div class="human__desc">
                                    <h3 class="human__name">
                                        Катерина
                                    </h3>

                                    <p class="human__position">
                                        Архітектор
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="our-team__slide swiper-slide">
                            <div class="human">
                                <img src="<?php bloginfo('template_url'); ?>/assets/img/teem/Viktoria.webp" width="510" height="550" class="human__img" alt="Дизайнер">
                                <div class="human__desc">
                                    <h3 class="human__name">
                                        Вікторія
                                    </h3>

                                    <p class="human__position">
                                        Дизайнер
                                    </p>
                                </div>
                            </div>
                        </div>
                        <!-- Тестові слайди -->
                        <div class="our-team__slide swiper-slide">
                            <div class="human">
                                <img src="<?php bloginfo('template_url'); ?>/assets/img/teem/Ocsana.webp" width="510" height="550" class="human__img" alt="Головний дизайнер">
                                <div class="human__desc">
                                    <h3 class="human__name">
                                        Оксана
                                    </h3>

                                    <p class="human__position">
                                        Головний дизайнер
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="our-team__slide swiper-slide">
                            <div class="human">
                                <img src="<?php bloginfo('template_url'); ?>/assets/img/teem/Dmytro.webp" width="510" height="550" class="human__img" alt="Засновник та керівник">
                                <div class="human__desc">
                                    <h3 class="human__name">
                                        Дмитро
                                    </h3>

                                    <p class="human__position">
                                        Засновник та керівник
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>

        <?php get_template_part('template-parts/sections/info/why-us'); ?>

        <?php echo do_shortcode('[portfolio_section]'); ?>

        <section class="man_hour">
            <div class="man_hour__container">
                <h2 class="man_hour__heading h2">
                    <span>Чоловік на годину:</span> надійний помічник у ремонті та обслуготуванні дому
                </h2>

                <div class="man_hour__content">
                    <div class="man_hour__text-box">
                        <p class="man_hour__text">
                            Послуга "Чоловік на годину" — ідеальне рішення для швидкого та якісного виконання різноманітних
                            побутових завдань і ремонтних робіт вдома або в офісі. Наші майстри оперативно вирішують такі
                            питання, як дрібний ремонт, встановлення техніки, монтаж меблів, сантехнічні та електротехнічні
                            роботи, а також інші побутові задачі. Це зручно, швидко і дозволяє заощадити час, не витрачаючи
                            зусиль на пошук різних спеціалістів. Якщо у вас виникли проблеми з електрикою, сантехнікою , меблями
                            або іншими побутовими пристроями , то ви можете викликати майстра на дім, він швидко та якісно
                            виконає необхідні роботи, дозволяючи вам економити свій час та сили.
                            Довірте дрібний ремонт та побутові завдання професіоналам і звільніть свій час для важливих справ!
                            Ми гарантуємо надійний сервіс, швидку реакцію та 100% задоволення від результату.
                        </p>

                        <div class="man_hour__list-box">
                            <h3 class="man_hour__title">
                                В чому будуть корисні вам наші майстри?
                            </h3>

                            <ul class="man_hour__list">
                                <li class="man_hour__list-item">
                                    Дрібний ремонт – ремонт меблів, заміна замків, регулювання дверей, ремонт розеток і
                                    вимикачів.
                                </li>
                                <li class="man_hour__list-item">
                                    Монтаж техніки – встановлення телевізорів, кріплення побутової техніки, підключення
                                    приладів.
                                </li>
                                <li class="man_hour__list-item">
                                    Сантехнічні роботи – встановлення та заміна змішувачів, ремонт труб, усунення протікань.
                                </li>
                                <li class="man_hour__list-item">
                                    Електромонтажні послуги – заміна лампочок, монтаж світильників, встановлення розеток.
                                </li>
                                <li class="man_hour__list-item">
                                    Збірка меблів – професійне складання нових меблів або перенесення старих.
                                </li>
                            </ul>
                        </div>

                    </div>
                    <div class="man_hour__illustration">
                        <img src="<?php bloginfo('template_url'); ?>/assets/img/man_hour.webp" width="552" height="598" alt="Викликати майстра">

                        <a href="#" class="man_hour__btn btn">
                            Викликати майстра
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <?php get_template_part('template-parts/sections/info/stages-work'); ?>

        <section class="reviews">
            <div class="reviews__container">
                <div class="reviews__top-block">
                    <h2 class="reviews__heading h2">
                        <span>Відгуки</span> наших клієнтів
                    </h2>
                    <div class="reviews__btn-wrap">
                        <a href="#" class="reviews__btn btn">Опишіть ваші враження</a>

                        <div class="reviews__next swiper-button-next"></div>
                        <div class="reviews__prev swiper-button-prev"></div>
                    </div>
                </div>

                <div class="reviews__slider swiper">
                    <div class="reviews__wrapper swiper-wrapper">

                        <div class="reviews__slide swiper-slide">
                            <div class="review-card">
                                <img src="<?php bloginfo('template_url'); ?>/assets/img/reviews/rating.webp" width="184" height="32" alt="rating">
                                <div class="review-card__bio">
                                    <h4 class="review-card__user-name">
                                        Анна Скляренко
                                    </h4>

                                    <img src="<?php bloginfo('template_url'); ?>/assets/img/reviews/user1.webp" class="review-card__avatar" width="60" height="60" alt="avatar">
                                </div>
                                <div class="review-card__text">
                                    Ми залишились дуже задоволені студією BUDGURU, відмінна якість, сервіс на висоті, а а
                                    фвхівці справді професіонали своєї справи, рекомендую!
                                </div>
                            </div>
                        </div>

                        <div class="reviews__slide swiper-slide">
                            <div class="review-card">
                                <img src="<?php bloginfo('template_url'); ?>/assets/img/reviews/rating.webp" width="184" height="32" alt="rating">
                                <div class="review-card__bio">
                                    <h4 class="review-card__user-name">
                                        Віктор Бондар
                                    </h4>

                                    <img src="<?php bloginfo('template_url'); ?>/assets/img/reviews/user2.webp" class="review-card__avatar" width="60" height="60" alt="avatar">
                                </div>
                                <div class="review-card__text">
                                    Ми залишились дуже задоволені студією BUDGURU, всі наші зауваження були враховані, в
                                    результати отримали саме те що очікували.
                                </div>
                            </div>
                        </div>

                        <div class="reviews__slide swiper-slide">
                            <div class="review-card">
                                <img src="<?php bloginfo('template_url'); ?>/assets/img/reviews/rating.webp" width="184" height="32" alt="rating">
                                <div class="review-card__bio">
                                    <h4 class="review-card__user-name">
                                        Вікторія Грищук
                                    </h4>

                                    <img src="<?php bloginfo('template_url'); ?>/assets/img/reviews/user3.webp" class="review-card__avatar" width="60" height="60" alt="avatar">
                                </div>
                                <div class="review-card__text">
                                    Виконано всі роботи якісно та в срок, задоволені, це справждні спеціалісти своєї справи.
                                    Також зі всіма було буже легко співпрацювати, одразу знайшли спільну мову.
                                </div>
                            </div>
                        </div>

                        <div class="reviews__slide swiper-slide">
                            <div class="review-card">
                                <img src="<?php bloginfo('template_url'); ?>/assets/img/reviews/rating.webp" width="184" height="32" alt="rating">
                                <div class="review-card__bio">
                                    <h4 class="review-card__user-name">
                                        Анна Скляренко
                                    </h4>

                                    <img src="<?php bloginfo('template_url'); ?>/assets/img/reviews/user2.webp" class="review-card__avatar" width="60" height="60" alt="avatar">
                                </div>
                                <div class="review-card__text">
                                    Виконано всі роботи якісно та в срок, задоволені, це справждні спеціалісти своєї справи.
                                    Також зі всіма було буже легко співпрацювати, одразу знайшли спільну мову.
                                </div>
                            </div>
                        </div>

                    </div>

                    <!-- If we need pagination -->
                    <div class="reviews__pagination swiper-pagination"></div>
                </div>
            </div>
        </section>

        <?php echo do_shortcode('[calculator]'); ?>

        <?php get_template_part('template-parts/sections/info/faq'); ?>

        <?php get_template_part('template-parts/sections/partners-section'); ?>

        <section class="master">
            <div class="master__container">
                <div class="master__lef-col">
                    <h2 class="master__heading h2">
                        <span>Виклик майстра на дім:</span> швидко та зручно
                    </h2>

                    <p class="master__text">
                        Послуга "Виклик майстра додому" забезпечує оперативну і професійну допомогу в питаннях ремонту та
                        побутових робіт. Незалежно від того, чи потрібно вирішити дрібні проблеми з сантехнікою, електрикою,
                        меблями або провести більш складний ремонт, наші майстри готові допомогти. Чоловік на годину приїде до
                        вас у зручний для вас час і виконає потрібні роботи швидко та якісно, він виконає будь-яу задачу,
                        повʼязану з ремонтом чи обслуговуванням будинку.
                        Забудьте про довгі пошуки майстрів або спроби самостійно справитися з ремонтом. Наші фахівці завжди
                        готові прийти на допомогу в будь-яких питаннях дрібного ремонту чи обслуговуванні будинку!
                    </p>


                </div>
                <div class="master__right-col">
                    <a href="#" class="master__btn btn">Викликати майстра</a>
                    <img src="<?php bloginfo('template_url'); ?>/assets/img/master.webp" width="680" alt="550" class="master__img" alt="Викликати майстра">
                </div>
            </div>
        </section>

        <section class="certificates">
            <div class="certificates__container">
                <div class="certificates__top-block">
                    <h2 class="certificates__heading h2">
                        Наші <span>cертифікати та нагороди</span>
                    </h2>

                    <div class="certificates__arowws">
                        <div class="certificates__next swiper-button-next"></div>
                        <div class="certificates__prev swiper-button-prev"></div>
                    </div>
                </div>

                <div class="certificates__slider swiper">
                    <div class="certificates__wrapper swiper-wrapper">
                        <div class="certificates__slide swiper-slide">
                            <div class="certificat">

                            </div>
                        </div>
                        <div class="certificates__slide swiper-slide">
                            <div class="certificat">

                            </div>
                        </div>
                        <div class="certificates__slide swiper-slide">
                            <div class="certificat">

                            </div>
                        </div>
                        <div class="certificates__slide swiper-slide">
                            <div class="certificat">

                            </div>
                        </div>
                        <div class="certificates__slide swiper-slide">
                            <div class="certificat">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <?php echo do_shortcode('[projects_section]'); ?>

        <?php echo do_shortcode('[blog_section]'); ?>

    </main>

<?php get_footer() ?>