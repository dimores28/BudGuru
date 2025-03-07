<?php get_header(); ?>

    <main class="page">
        <?php
            $page_title = get_the_title();
            $words = explode(' ', $page_title);

            $middle = ceil(count($words) / 2);
            $first_part = array_slice($words, 0, $middle);
            $second_part = array_slice($words, $middle);

            echo do_shortcode(sprintf('[hero_section title="%s <span>%s</span>" show_link="false"]', implode(' ', $first_part), implode(' ', $second_part)));
        ?>

        <?php get_template_part('template-parts/sections/partners-section'); ?>

        <?php get_template_part('template-parts/sections/info/videoplayer'); ?>

        <?php echo do_shortcode('[consultation_section]'); ?>

        <?php echo do_shortcode('[services_section parent="0"]'); ?>

        <?php get_template_part('template-parts/sections/info/why-us'); ?>

        <?php echo do_shortcode('[portfolio_section]'); ?>

        <section class="man_hour">
            <div class="man_hour__container">
                <h2 class="man_hour__heading h2">
                    <?php _e('Послуги', 'budguru'); ?> <span><?php _e('чоловіка на годину', 'budguru'); ?></span>: 
                    <?php _e('електрик, сантехнік,плиточник', 'budguru'); ?>
                </h2>

                <div class="man_hour__content">
                    <div class="man_hour__text-box">
                        <p class="man_hour__text">
                            <?php _e('Послуга "Чоловік на годину" — ідеальне рішення для швидкого та якісного виконання
                            різноманітних побутових завдань і ремонтних робіт вдома або в офісі. Наші майстри
                            оперативно вирішують такі питання, як дрібний ремонт, встановлення техніки, монтаж
                            меблів, сантехнічні та електротехнічні роботи, а також інші побутові задачі. Це зручно,
                            швидко і дозволяє заощадити час, не витрачаючи зусиль на пошук різних спеціалістів. Якщо
                            у вас виникли проблеми з електрикою, сантехнікою , меблями або іншими побутовими
                            пристроями , то ви можете викликати майстра на дім, він швидко та якісно виконає
                            необхідні роботи, дозволяючи вам економити свій час та сили.
                            Довірте дрібний ремонт та побутові завдання професіоналам і звільніть свій час для
                            важливих справ! Ми гарантуємо надійний сервіс, швидку реакцію та 100% задоволення від
                            результату.', 'budguru'); ?>
                        </p>

                        <p>
                            <strong><?php _e('Електрик:', 'budguru'); ?></strong> <?php _e('заміна та ремонт розеток, вимикачів, підключення освітлення,
                            встановлення та
                            ремонт електроприладів.', 'budguru'); ?> <br>

                            <strong><?php _e('Сантехнік:', 'budguru'); ?></strong> <?php _e('усунення протікань, установка змішувачів, унітазів, ванн і
                            душових кабін,
                            ремонт сантехнічних систем.', 'budguru'); ?> <br>

                            <strong><?php _e('Плиточник:', 'budguru'); ?></strong> <?php _e('укладання плитки на підлогу, стіни у ванній кімнаті та
                            кухні, вирівнювання
                            поверхонь, герметизація швів.', 'budguru'); ?> <br>
                        </p>


                        <a href="#calculator-form" class="man_hour__btn btn" data-da=".man_hour__illustration, 768, 1">
                            <?php _e('Викликати майстра', 'budguru'); ?>
                        </a>
                    </div>
                    <div class="man_hour__illustration">
                        <img src="<?php bloginfo('template_url'); ?>/assets/img/services/man.webp" width="552" height="598" alt="Викликати майстра">
                    </div>
                </div>
            </div>
        </section>

        <?php get_template_part('template-parts/sections/info/stages-work'); ?>

        <?php get_template_part('template-parts/sections/reviews-slider'); ?>

        <?php echo do_shortcode('[calculator]'); ?>

        <?php get_template_part('template-parts/sections/info/faq'); ?>

        <?php get_template_part('template-parts/sections/clients-section'); ?>

        <?php 
            $master_section = new BudGuru_Service_Section(array(
                'title_first' => __('Швидкий та зручний', 'budguru'),
                'title_second' => __('виїзд майстра додому', 'budguru'),
                'description' => __('Наші майстри приїдуть до вас у зручний час, щоб швидко та якісно вирішити будь-які побутові
                                завдання. Від дрібного ремонту до складних робіт – обирайте професійний сервіс, який
                                гарантує оперативність, доступність та надійний результат. Електрик, сантехнік чи плиточник
                                – замовити послугу легко, а про всі клопоти ми подбаємо за вас!
                                Довірте дрібний ремонт та побутові завдання професіоналам і звільніть свій час для важливих
                                справ! Ми гарантуємо надійний сервіс, швидку реакцію та 100% задоволення від результату.
                                Наш сервіс пропонує швидке рішення для тих, хто цінує свій час та комфорт. Вам більше не
                                потрібно відкладати ремонт чи витрачати час на пошуки майстрів – просто замовте виїзд
                                спеціаліста додому. Усі роботи будуть виконані професійно, а головне – без зайвих турбот для
                                вас. Будь то несправність у проводці, сантехніка або укладання плитки, наші майстри готові
                                допомогти саме тоді, коли вам зручно.', 'budguru'),
                'image' => get_template_directory_uri() . '/assets/img/services/master.webp',
                'button_text' => __('Викликати майстра', 'budguru'),
                'button_url' => '#consultation-section'
            ));

            get_template_part('template-parts/sections/info/master-call', null, array('section' => $master_section));
        ?>

        <?php get_template_part('template-parts/sections/certificates-slider'); ?>

        <?php echo do_shortcode('[blog_section]'); ?>
    </main>

<?php get_footer(); ?> 