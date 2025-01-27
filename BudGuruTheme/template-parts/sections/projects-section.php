<?php 
$projects = getProjects(6); // Отримуємо 6 останніх проектів
if (!empty($projects)): // Перевіряємо чи є проекти
?>
<section class="projects">
    <div class="projects__container">
        <div class="projects__top-block">
            <h2 class="projects__heading h2">
                <?php _e('Готові', 'budguru'); ?> <span><?php _e('проекти будинків', 'budguru'); ?></span>
            </h2>
            <a href="/projects" 
                class="projects__btn btn" 
                data-da=".projects__btn-wrap,768,0"
                aria-label="<?php _e('Переглянути всі проекти будинків', 'budguru'); ?>">
                <?php _e('Дивитися більше', 'budguru'); ?>
            </a>
        </div>

        <div class="projects__text-block">
            <div class="projects__left">
                <p class="projects__text">
                    <?php _e('Команда професіоналів Budguru розробляє проекти:', 'budguru'); ?>
                </p>

                <ul class="projects__list">
                    <li class="projects__list-item">
                        <?php _e('Будинків та котеджів', 'budguru'); ?>
                    </li>
                    <li class="projects__list-item">
                        <?php _e('Будівель комерційного призначення: готелів, ресторанів, магазинів тощо.', 'budguru'); ?>
                    </li>
                    <li class="projects__list-item">
                        <?php _e('Дизайн фасадів', 'budguru'); ?>
                    </li>
                </ul>
            </div>
            <div class="projects__right">
                <p class="projects__text">
                    <?php _e('Ми пропонуємо великий вибір готових проектів будинків, розроблених з урахуванням сучасних вимог до комфорту, функціональності та стилю. Наші готові проекти — це оптимальні архітектурні рішення для тих, хто цінує свій час та хоче отримати якісний результат.', 'budguru'); ?>
                </p>
            </div>
        </div>

        <div class="projects__row">
            <?php 
            foreach($projects as $project): 
            ?>
                <div class="projects__col project">
                    <img src="<?php echo $project['img']; ?>" 
                         class="project__img" 
                         width="510" 
                         height="436" 
                         alt="<?php echo $project['title']; ?>">
                    <a href="<?php echo $project['link']; ?>" 
                        class="project__link"
                        aria-label="<?php 
                            printf(
                                /* translators: %s: project title */
                                __('Переглянути проект: %s', 'budguru'), 
                                $project['title']
                            ); 
                        ?>">
                        <svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M23.9281 1.74743L1.77208 23.9034M23.9281 1.74743L23.8607 20.6709M23.9281 1.74743L5.00457 1.81477" stroke="#1E1E1E" stroke-width="1.58" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </a>
                    <div class="projects__title">
                        <?php echo $project['title']; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="projects__btn-wrap"></div>
    </div>
</section> 
<?php endif; ?> 