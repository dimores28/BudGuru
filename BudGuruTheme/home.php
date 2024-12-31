<?php
/*
Template Name: Home
*/
?>

<?php get_header() ?>

    <main class="page">
        
        <section class="hero">
            <img src="<?php bloginfo('template_url'); ?>/assets/img/hero_bg.webp" class="hero__bg-image" width="1920" height="1100" alt="hero">
            <div class="hero__container">
                <div class="hero__top-block">
                    <h1 class="hero__heading h1">
                        Студія <span>дизайну інтерʼєру</span> та <span>ремонту</span>
                        <a href="#" class="hero__link">
                            <svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M23.9281 1.74694L1.77207 23.9029M23.9281 1.74694L23.8607 20.6705M23.9281 1.74694L5.00456 1.81428" stroke="#1E1E1E" stroke-width="1.58" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </a>
                    </h1>

                    <div class="hero__lang custom-select">
                        <?php
                        if(function_exists('pll_the_languages')) {
                            $languages = pll_the_languages(array(
                                'show_flags' => 0,
                                'show_names' => 1,
                                'hide_if_empty' => 0,
                                'raw' => 1
                            ));
                            
                            if($languages) {
                                $current_lang = '';
                                echo '<div class="select-selected">';
                                foreach($languages as $language) {
                                    if($language['current_lang']) {
                                        echo $language['name'];
                                        $current_lang = $language['name'];
                                    }
                                }
                                echo '</div>';
                                
                                echo '<div class="select-items select-hide">';
                                foreach($languages as $language) {
                                    if($language['name'] !== $current_lang) {
                                        echo sprintf(
                                            '<div data-url="%s">%s</div>',
                                            $language['url'],
                                            $language['name']
                                        );
                                    }
                                }
                                echo '</div>';
                            }
                        }
                        ?>
                    </div>
                </div>

                <div class="hero__center-block">
                    <a href="#" class="hero__btn-coll">
                        <svg width="33" height="33" viewBox="0 0 33 33" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M23.7788 32.6107C21.4709 32.5258 14.9303 31.622 8.08029 24.775C1.23191 17.9265 0.329588 11.3888 0.243042 9.07972C0.114825 5.56089 2.81058 2.14301 5.92465 0.808232C6.29964 0.646338 6.7103 0.5847 7.11631 0.629367C7.52232 0.674033 7.90974 0.823469 8.24056 1.06301C10.8049 2.93139 12.5743 5.75799 14.0937 7.98049C14.428 8.46878 14.5709 9.06297 14.4952 9.64984C14.4196 10.2367 14.1306 10.7752 13.6834 11.1628L10.5565 13.4847C10.4054 13.5937 10.2991 13.7539 10.2572 13.9355C10.2154 14.117 10.2408 14.3076 10.3289 14.4717C11.0373 15.7584 12.297 17.6749 13.7395 19.117C15.1819 20.5592 17.1901 21.902 18.5668 22.6903C18.7394 22.7872 18.9426 22.8143 19.1346 22.766C19.3266 22.7177 19.4927 22.5978 19.599 22.4308L21.6344 19.3334C22.0086 18.8364 22.5606 18.5034 23.1749 18.4043C23.7891 18.3051 24.4179 18.4474 24.9296 18.8014C27.1846 20.3621 29.8162 22.1007 31.7427 24.5667C32.0017 24.8999 32.1665 25.2965 32.2198 25.7151C32.2731 26.1337 32.2129 26.5589 32.0456 26.9463C30.7041 30.0757 27.3096 32.7405 23.7788 32.6107Z" fill="#F9C98C" />
                        </svg>
                    </a>

                    <ul class="hero__social">
                        <li class="hero__social_item">
                            <a href="http://" class="hero__social_link">
                                <img src="<?php bloginfo('template_url'); ?>/assets/img/whatsapp-icon.webp" width="32" height="32" class="hero__social_icon" alt="Image">
                            </a>
                        </li>
                        <li class="hero__social_item">
                            <a href="http://" class="hero__social_link">
                                <img src="<?php bloginfo('template_url'); ?>/assets/img/telegram.webp" width="32" height="32" class="hero__social_icon" alt="Image">
                            </a>
                        </li>
                        <li class="hero__social_item">
                            <a href="http://" class="hero__social_link">
                                <img src="<?php bloginfo('template_url'); ?>/assets/img/viber.webp" width="32" height="32" class="hero__social_icon" alt="Image">
                            </a>
                        </li>
                    </ul>
                </div>
                
                <div class="hero__bottom-block">
                    <div class="hero__sticker sticker">
                        <div class="sticker__desc">
                            сучасний ремонт та дизайн
                        </div>

                        <h3 class="sticker__heading">
                            Замовте ремонт під ключ <span>та отримайте</span> <mark>дизайн проект у подарунок</ь>
                        </h3>

                        <a href="#" class="sticker__btn btn">
                            Обговорити проект
                        </a>
                    </div>

                    <div class="hero__baner baner">
                        <img src="<?php bloginfo('template_url'); ?>/assets/img/3d-house.webp" alt="house" class="baner__img">
                        <div class="baner__content">
                            <h4 class="baner__heading">
                                Готові проекти будинків
                            </h4>
                            <p class="baner__text">
                                Переходтье в наше архітектурне бюро та дізнайтеся більше про готові проекти будинків
                            </p>
                            <a href="#" class="baner__link">
                                <span>Детальніше</span>
                                <svg width="34" height="33" viewBox="0 0 34 33" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M22.8865 9.93992L10.0889 22.7375M22.8865 9.93992L22.8476 20.8704M22.8865 9.93992L11.956 9.97882" stroke="white" stroke-width="1.28358" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

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

        <section class="videoplayer">
            <div class="videoplayer__container">
                <video poster="<?php bloginfo('template_url'); ?>/assets/img/video/preview.webp" muted loop controls playsinline preload="yes" width="1600" height="570" class="videoplayer__video" id="videoPlayer">
                    <source src="<?php bloginfo('template_url'); ?>/assets/img/video/Comp2.mp4" type='video/mp4; codecs="avc1.42E01E, mp4a.40.2"' />
                    <source src="<?php bloginfo('template_url'); ?>/assets/img/video/Comp2.mp4" type="video/mp4" />
                </video>
                <button class="videoplayer__btn-play" id="btn-play">
                    <svg width="120" height="120" viewBox="0 0 120 120" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect width="120" height="120" rx="31.1111" fill="white" />
                        <path d="M81.4921 54.8929C85.4236 57.1627 85.4236 62.8373 81.4921 65.1071L54.1837 80.8736C50.2522 83.1435 45.3379 80.3062 45.3379 75.7665L45.3379 44.2335C45.3379 39.6938 50.2522 36.8565 54.1837 39.1264L81.4921 54.8929Z" fill="#1E1E1E" />
                    </svg>
                </button>
            </div>
        </section>

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

        <section class="why-us">
            <div class="why-us__container">
                <div class="why-us__head-block">
                    <h2 class="why-us__heding">Чому <span>BudGuru?</span></h2>
                    <a href="#" class="btn why-us__btn">
                        Обговорити проект
                    </a>
                </div>

                <div class="why-us__number-block number-block">
                    <div class="number-block__item">
                        <div class="number-block__number">
                            01
                        </div>
                        <div class="number-block__text-block">
                            <h4 class="number-block__title">
                                Досвідчені працівники
                            </h4>
                            <p class="number-block__text">
                                Ми залучаємо тільки найкращих та досвідчених працівників з великим багажем успішно реалізованих проектів.
                            </p>
                        </div>
                    </div>
                    <div class="number-block__item">
                        <div class="number-block__number">
                            02
                        </div>
                        <div class="number-block__text-block">
                            <h4 class="number-block__title">
                                Підбір матеріалів
                            </h4>
                            <p class="number-block__text">
                                Наша студія займається підбором матеріалів спеціально для вас під ваш проект.
                            </p>
                        </div>
                    </div>
                    <div class="number-block__item">
                        <div class="number-block__number">
                            03
                        </div>
                        <div class="number-block__text-block">
                            <h4 class="number-block__title">
                                Поетапна оплата
                            </h4>
                            <p class="number-block__text">
                                Зручна система оплати, яка дозволяє вам оплачувати ремонтні роботи поступово по мірі виконання кожного етапу.
                            </p>
                        </div>
                    </div>
                    <div class="number-block__item">
                        <div class="number-block__number">
                            04
                        </div>
                        <div class="number-block__text-block">
                            <h4 class="number-block__title">
                                Гарантія якості
                            </h4>
                            <p class="number-block__text">
                                У нас працюють кваліфіковані спеціалісти, завдяки чому ми даємо гарантію на якісне та своєчасне виконання роботи.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

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

        <section class="stages-work">
            <div class="stages-work__container">
                <h2 class="stages-work__heading h2">
                    <span>Етапи</span> роботи
                </h2>

                <div class="stages-work__stages stages">

                    <div class="stages__col">
                        <div class="stages__item">
                            <div class="stages__number">
                                01
                            </div>
                            <div class="stages__desc">
                                <h3 class="stages__title">
                                    Обговорення проекту
                                </h3>

                                <p class="stages__text">
                                    Перший зідзіон та обговорення всіх деталей проекту та ваших побажань
                                </p>
                            </div>
                            <img class="stages__right-arrow" src="<?php bloginfo('template_url'); ?>/assets/img/stages/right_arrow.svg" width="37" height="102" alt="right arrow">
                        </div>

                        <div class="stages__item">
                            <div class="stages__number">
                                02
                            </div>
                            <div class="stages__desc">
                                <h3 class="stages__title">
                                    Зустріч та консультація
                                </h3>

                                <p class="stages__text">
                                    На консультації ми обговорюємо всі варіанти реалізації проекту та ви отриимуєте відповіді на всі запитання
                                </p>
                            </div>
                            <img class="stages__left-arrow" src="<?php bloginfo('template_url'); ?>/assets/img/stages/left_arrow.svg" width="37" height="102" alt="left arrow">
                        </div>

                        <div class="stages__item">
                            <div class="stages__number">
                                03
                            </div>
                            <div class="stages__desc">
                                <h3 class="stages__title">
                                    Укладення договору
                                </h3>

                                <p class="stages__text">
                                    Укладаємо та підписуємо договір про співпрацю, в якому вказані всі важдиві моменти.
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="stages__col">
                        <div class="stages__item">
                            <div class="stages__number">
                                04
                            </div>
                            <div class="stages__desc">
                                <h3 class="stages__title">
                                    Виїзд на проект
                                </h3>

                                <p class="stages__text">
                                    Приїжджаємо на обʼєкт з метою оцінки роботи та планування.
                                </p>
                            </div>
                            <img class="stages__right-arrow" src="<?php bloginfo('template_url'); ?>/assets/img/stages/right_arrow.svg" width="37" height="102" alt="right arrow">
                        </div>

                        <div class="stages__item">
                            <div class="stages__number">
                                05
                            </div>
                            <div class="stages__desc">
                                <h3 class="stages__title">
                                    Розробка плану робіт
                                </h3>

                                <p class="stages__text">
                                    Плануємо роботи та всі задачі по проекту
                                </p>
                            </div>
                            <img class="stages__left-arrow" src="<?php bloginfo('template_url'); ?>/assets/img/stages/left_arrow.svg" width="37" height="102" alt="left arrow">
                        </div>

                        <div class="stages__item">
                            <div class="stages__number">
                                06
                            </div>
                            <div class="stages__desc">
                                <h3 class="stages__title">
                                    Реалізація та здача проекту
                                </h3>

                                <p class="stages__text">
                                    Виконуємо всі роботи згідно плану та здаємо проект.
                                </p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>

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

        <section class="calculator">
            <div class="calculator__container">
                <div class="calculator__ilustration">
                    <img src="<?php bloginfo('template_url'); ?>/assets/img/calculator/calculator.webp" width="740" height="770" alt="Калькулятор">
                </div>

                <div class="calculator__steps">
                    <form>
                        <h2 class="calculator__heading h2">
                            Калькулятор вартості <span>ремонту</span>
                        </h2>

                        <div class="calculator__step calculator__step-1 active">
                            <div class="calculator__step-counter">
                                <span>Оберіть тип приміщення</span>
                                <div class="counter">
                                    Крок <span>1</span> \ 4
                                </div>
                            </div>
                            <div class="calculator__radio-wrap">
                                <div class="custon-radio-btn">
                                    <input type="radio" name="rooms" id="living-quarters">
                                    <label for="living-quarters">Житлове</label>
                                </div>

                                <div class="custon-radio-btn">
                                    <input type="radio" name="rooms" id="commercial-premises">
                                    <label for="commercial-premises">Житлове</label>
                                </div>
                            </div>
                            <button class="calculator__nextstep-btn btn">
                                Далі
                                <svg width="34" height="34" viewBox="0 0 34 34" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="17" cy="17" r="17" transform="rotate(90 17 17)" fill="white" />
                                    <path d="M13.9261 21.9501L14.8473 22.8705L19.8651 17.8544C19.946 17.774 20.0102 17.6785 20.054 17.5732C20.0978 17.4679 20.1204 17.355 20.1204 17.241C20.1204 17.127 20.0978 17.0141 20.054 16.9088C20.0102 16.8035 19.946 16.7079 19.8651 16.6275L14.8473 11.6089L13.927 12.5293L18.6365 17.2397L13.9261 21.9501Z" fill="#1E1E1E" />
                                </svg>
                            </button>
                        </div>

                        <div class="calculator__step calculator__step-2">
                            <div class="calculator__step-counter">
                                <span>Вкажіть площу</span>
                                <div class="counter">
                                    Крок <span>2</span> \ 4
                                </div>
                            </div>

                            <div class="calculator__range-wrap">
                                <div id="range" data-from="1"></div>
                                <input type="text" name="area" id="range-nput">
                            </div>

                            <button class="calculator__nextstep-btn btn">
                                Далі
                                <svg width="34" height="34" viewBox="0 0 34 34" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="17" cy="17" r="17" transform="rotate(90 17 17)" fill="white" />
                                    <path d="M13.9261 21.9501L14.8473 22.8705L19.8651 17.8544C19.946 17.774 20.0102 17.6785 20.054 17.5732C20.0978 17.4679 20.1204 17.355 20.1204 17.241C20.1204 17.127 20.0978 17.0141 20.054 16.9088C20.0102 16.8035 19.946 16.7079 19.8651 16.6275L14.8473 11.6089L13.927 12.5293L18.6365 17.2397L13.9261 21.9501Z" fill="#1E1E1E" />
                                </svg>
                            </button>
                        </div>

                        <div class="calculator__step calculator__step-3">
                            <div class="calculator__step-counter">
                                <span>Чи потрібен дизайн на ваш проект?</span>
                                <div class="counter">
                                    Крок <span>3</span> \ 4
                                </div>
                            </div>

                            <div class="calculator__radio-wrap">
                                <div class="custon-radio-btn">
                                    <input type="radio" name="desing" id="need-desing">
                                    <label for="need-desing">Потрібен</label>
                                </div>

                                <div class="custon-radio-btn">
                                    <input type="radio" name="desing" id="without-design">
                                    <label for="without-design">Без дизайну</label>
                                </div>
                            </div>

                            <button class="calculator__nextstep-btn btn">
                                Далі
                                <svg width="34" height="34" viewBox="0 0 34 34" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="17" cy="17" r="17" transform="rotate(90 17 17)" fill="white" />
                                    <path d="M13.9261 21.9501L14.8473 22.8705L19.8651 17.8544C19.946 17.774 20.0102 17.6785 20.054 17.5732C20.0978 17.4679 20.1204 17.355 20.1204 17.241C20.1204 17.127 20.0978 17.0141 20.054 16.9088C20.0102 16.8035 19.946 16.7079 19.8651 16.6275L14.8473 11.6089L13.927 12.5293L18.6365 17.2397L13.9261 21.9501Z" fill="#1E1E1E" />
                                </svg>
                            </button>
                        </div>

                        <div class="calculator__step calculator__step-4">
                            <div class="calculator__step-counter">
                                <span>Ваше імʼя та номер телефону</span>
                                <div class="counter">
                                    Крок <span>4</span> \ 4
                                </div>
                            </div>

                            <div class="calculator__input-wrap">
                                <input class="calculator__input input" type="text" name="user-name" placeholder="Ваше імʼя">
                                <input class="calculator__input input" type="text" name="user-phone" placeholder="Номер телефону">
                                <textarea class="calculator__textarea input textarea" name="user-question" placeholder="Ваше питання"></textarea>
                                <input class="calculator__btn-submit btn" type="submit" value="Відправити заявку" aria-label="Відправити заявку">
                            </div>

                        </div>

                    </form>
                </div>
            </div>
        </section>

        <section class="faq">
            <div class="faq__container">
                <h2 class="faq__heading h2">
                    <span>Відповіді</span> на найчастіші запитання
                </h2>

                <div class="faq__wrapp">
                    <div data-spollers data-one-spoller class="faq__spollers spollers">
                        <details class="spollers__item">
                            <summary class="spollers__title">
                                Чи можна замовити перепланування приміщення у рамках ремонтних робіт?
                            </summary>
                            <div class="spollers__body">
                                <p>
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi dignissimos, quas in sapiente assumenda nobis repellendus quae accusamus tenetur iure?
                                </p>
                            </div>
                        </details>

                        <details class="spollers__item">
                            <summary class="spollers__title">
                                Чи можливо адаптувати дизайн-проект під мій бюджет?
                            </summary>
                            <div class="spollers__body">Контент спойлера</div>
                        </details>

                        <details class="spollers__item">
                            <summary class="spollers__title">
                                Чи можна вносити зміни в дизайн-проект після його затвердження?
                            </summary>
                            <div class="spollers__body">Контент спойлера</div>
                        </details>

                        <details class="spollers__item">
                            <summary class="spollers__title">
                                Чи виконуєте ви частковий ремонт, наприклад, лише кухні або ванної кімнати?
                            </summary>
                            <div class="spollers__body">Контент спойлера</div>
                        </details>

                        <details class="spollers__item">
                            <summary class="spollers__title">
                                Які сантехнічні послуги ви пропонуєте?
                            </summary>
                            <div class="spollers__body">Контент спойлера</div>
                        </details>

                        <details class="spollers__item">
                            <summary class="spollers__title">
                                Як обрати матеріали для ремонту?
                            </summary>
                            <div class="spollers__body">Контент спойлера</div>
                        </details>

                        <details class="spollers__item">
                            <summary class="spollers__title">
                                Скільки часу займає виконання сантехнічних робіт?
                            </summary>
                            <div class="spollers__body">Контент спойлера</div>
                        </details>

                        <details class="spollers__item">
                            <summary class="spollers__title">
                                Скільки часу займає розробка індивідуального дизайн-проекту?
                            </summary>
                            <div class="spollers__body">Контент спойлера</div>
                        </details>
                    </div>
                </div>
            </div>
        </section>

        <section class="partners">
            <div class="partners__container">
                <h2 class="partners__heading h2">
                    Наші <span>партнери</span>
                </h2>

                <div class="partners__row">
                    <div class="partners__col">
                        <img src="<?php bloginfo('template_url'); ?>/assets/img/partners/smile.webp" class="partners__logo" width="174" height="90" alt="Image">
                    </div>
                    <div class="partners__col">
                        <img src="<?php bloginfo('template_url'); ?>/assets/img/partners/smile.webp" class="partners__logo" width="174" height="90" alt="Image">
                    </div>
                    <div class="partners__col">
                        <img src="<?php bloginfo('template_url'); ?>/assets/img/partners/smile.webp" class="partners__logo" width="174" height="90" alt="Image">
                    </div>
                    <div class="partners__col">
                        <img src="<?php bloginfo('template_url'); ?>/assets/img/partners/smile.webp" class="partners__logo" width="174" height="90" alt="Image">
                    </div>
                    <div class="partners__col">
                        <img src="<?php bloginfo('template_url'); ?>/assets/img/partners/smile.webp" class="partners__logo" width="174" height="90" alt="Image">
                    </div>
                    <div class="partners__col">
                        <img src="<?php bloginfo('template_url'); ?>/assets/img/partners/smile.webp" class="partners__logo" width="174" height="90" alt="Image">
                    </div>
                    <div class="partners__col">
                        <img src="<?php bloginfo('template_url'); ?>/assets/img/partners/smile.webp" class="partners__logo" width="174" height="90" alt="Image">
                    </div>
                    <div class="partners__col">
                        <img src="<?php bloginfo('template_url'); ?>/assets/img/partners/smile.webp" class="partners__logo" width="174" height="90" alt="Image">
                    </div>
                </div>
            </div>
        </section>

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