<?php
/*
Template Name: About
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
    
    <?php get_template_part('template-parts/sections/info/about'); ?>

    <?php get_template_part('template-parts/sections/info/videoplayer'); ?>

    <?php get_template_part('template-parts/sections/team-slider'); ?>

    <?php get_template_part('template-parts/sections/info/why-us'); ?>

    <?php get_template_part('template-parts/sections/clients-section'); ?>

    <section class="man_hour">
        <div class="man_hour__container">
            <h2 class="man_hour__heading h2">
                <span><?php _e('Чоловік на годину:', 'budguru'); ?></span> <?php _e('домашній майстер на різного роду дріб’язок!', 'budguru'); ?>
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
                        Коли виникають проблеми з сантехнікою в будинку або квартирі, це завжди викликає
                        незручності. Якщо запустити проблему й вчасно її не вирішити, згодом її усунення
                        обійдеться дорожче. Щоб уникнути неприємних наслідків та повернути комфорт, оптимальним
                        рішенням буде викликати сантехніка на дім. Майстри BUDGURU мають досвід для вирішення
                        будь-яких проблем з ремонту, заміни та обслуговування сантехніки.
                        Професійні фахівці надають сантехнічні послуги під ключ: від виявлення проблеми до її
                        усунення. Сантехніки можуть замінити протікаючий бачок, встановити нову душову кабіну,
                        відновити цілісність труб або створити проект каналізаційної системи. Будь-яка з цих
                        сантехнічних послуг надається відповідно до норм безпеки та чинних технічних стандартів.', 'budguru'); ?>
                    </p>

                    <a href="#calculator-form" class="man_hour__btn btn" data-da=".man_hour__illustration, 768, 1">
                        <?php _e('Викликати майстра', 'budguru'); ?>
                    </a>
                </div>
                <div class="man_hour__illustration">
                    <img src="<?php bloginfo('template_url'); ?>/assets/img/about/men.webp" width="552" height="598" alt="Викликати майстра">
                </div>
            </div>
        </div>
    </section>

    <?php echo do_shortcode('[portfolio_section]'); ?>

    <?php get_template_part('template-parts/sections/reviews-slider'); ?>

    <?php echo do_shortcode('[consultation_section]'); ?>

    <?php get_template_part('template-parts/sections/certificates-slider'); ?>

    <?php get_template_part('template-parts/sections/info/faq'); ?>
</main>

<?php get_footer() ?>