<?php get_header(); ?>

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

        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <section class="vacancies">
                <div class="vacancies__container">
                    <h2 class="vacancies__heading h2">
                        <?php the_title(); ?>
                    </h2>

                    <div class="vacancies__bord">

                        <div class="vacancies__announcement announcement">
                            <div class="announcement__text-block">
                                <h4 class="announcement__title">
                                    <?php _e('Вакансія дизайнера іетерʼєру', 'budguru'); ?>
                                </h4>

                                <p class="announcement__desc">
                                    <svg width="20" height="27" viewBox="0 0 20 27" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M10.0013 12.8334C9.11725 12.8334 8.2694 12.4822 7.64428 11.8571C7.01916 11.232 6.66797 10.3841 6.66797 9.50008C6.66797 8.61603 7.01916 7.76818 7.64428 7.14306C8.2694 6.51794 9.11725 6.16675 10.0013 6.16675C10.8854 6.16675 11.7332 6.51794 12.3583 7.14306C12.9834 7.76818 13.3346 8.61603 13.3346 9.50008C13.3346 9.93782 13.2484 10.3713 13.0809 10.7757C12.9134 11.1801 12.6679 11.5476 12.3583 11.8571C12.0488 12.1666 11.6813 12.4122 11.2769 12.5797C10.8725 12.7472 10.439 12.8334 10.0013 12.8334ZM10.0013 0.166748C7.52595 0.166748 5.15198 1.15008 3.40164 2.90042C1.6513 4.65076 0.667969 7.02473 0.667969 9.50008C0.667969 16.5001 10.0013 26.8334 10.0013 26.8334C10.0013 26.8334 19.3346 16.5001 19.3346 9.50008C19.3346 7.02473 18.3513 4.65076 16.601 2.90042C14.8506 1.15008 12.4767 0.166748 10.0013 0.166748Z" fill="#F9C98C" />
                                    </svg>
                                    <?php if($location = get_field('city')): ?>
                                        <span><?php echo $location; ?></span> 
                                    <?php endif; ?>
                                    <?php if($salary = get_field('salaty')): ?>
                                        <span><?php echo $salary; ?></span> 
                                    <?php endif; ?>
                                </p>
                            </div>
                            <div class="announcement__action">
                                <a href="mailto:<?php echo get_field('email', 'option'); ?>" class="announcement__link btn">
                                    <?php _e('Відправити резюме', 'budguru'); ?>
                                </a>
                            </div>
                        </div>

                    </div>

                    <div class="job-desc">
                        <?php if($requirements = get_field('requirements')): ?>
                            <div class="job-desc__block">
                                <h3 class="job-desc__title">
                                    <?php _e('Ми пропонуємо:', 'budguru'); ?>
                                </h3>
                                <?php echo $requirements; ?>
                            </div>
                        <?php endif; ?>
                        
                        <?php if($benefits = get_field('benefits')): ?>
                            <div class="job-desc__block">
                                <h3 class="job-desc__title">
                                    <?php _e('Вимоги до кандидатів', 'budguru'); ?>
                                </h3>

                                <?php echo $benefits; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </section>
        <?php endwhile; endif; ?>

        <?php echo do_shortcode('[consultation_section]'); ?>
    </main>

<?php get_footer(); ?> 