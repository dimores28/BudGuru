<?php
/*
Template Name: Home
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

        <?php echo do_shortcode('[consultation_section]'); ?>

        <?php echo do_shortcode('[services_section]'); ?>

        <?php get_template_part('template-parts/sections/team-slider'); ?>

        <?php get_template_part('template-parts/sections/info/why-us'); ?>

        <?php echo do_shortcode('[portfolio_section]'); ?>

        <?php get_template_part('template-parts/sections/info/man-hour'); ?>

        <?php get_template_part('template-parts/sections/info/stages-work'); ?>

        <?php get_template_part('template-parts/sections/reviews-slider'); ?>

        <?php echo do_shortcode('[calculator]'); ?>

        <?php get_template_part('template-parts/sections/info/faq'); ?>

        <?php get_template_part('template-parts/sections/partners-section'); ?>

        <?php 
            $master_section = new BudGuru_Service_Section(array(
                'title_first' => __('Виклик майстра на дім:', 'budguru'),
                'title_second' => __('швидко та зручно', 'budguru'),
                'description' => __('Послуга "Виклик майстра додому" забезпечує оперативну і професійну допомогу в питаннях ремонту та
							побутових робіт. Незалежно від того, чи потрібно вирішити дрібні проблеми з сантехнікою, електрикою,
							меблями або провести більш складний ремонт, наші майстри готові допомогти. Чоловік на годину приїде до
							вас у зручний для вас час і виконає потрібні роботи швидко та якісно, він виконає будь-яу задачу,
							повʼязану з ремонтом чи обслуговуванням будинку.
							Забудьте про довгі пошуки майстрів або спроби самостійно справитися з ремонтом. Наші фахівці завжди
							готові прийти на допомогу в будь-яких питаннях дрібного ремонту чи обслуговуванні будинку!', 'budguru'),
                'image' => get_template_directory_uri() . '/assets/img/master.webp',
                'button_text' => __('Викликати майстра', 'budguru'),
                'button_url' => '#consultation-section'
            ));

            get_template_part('template-parts/sections/info/master-call', null, array('section' => $master_section));
        ?>

        <?php get_template_part('template-parts/sections/certificates-slider'); ?>

        <?php echo do_shortcode('[projects_section]'); ?>

        <?php echo do_shortcode('[blog_section]'); ?>

    </main>

<?php get_footer() ?>