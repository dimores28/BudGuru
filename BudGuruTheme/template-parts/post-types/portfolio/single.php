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

        <section class="project-desc internal-work">
            <div class="project-desc__container">
            <?php if(have_posts()): while(have_posts()): the_post(); 
                $portfolio = get_fields(); 
            ?>
                <?php if(!empty($portfolio['hero_slider'])): ?>
                    <div class="one-work__slider swiper">
                        <div class="one-work__wrapper swiper-wrapper">
                            <?php foreach($portfolio['hero_slider'] as $slide): ?>
                                <div class="one-work__slide swiper-slide">
                                    <img src="<?php echo $slide['slide_image']; ?>" class="one-work__img" alt="Image">
                                    <div class="one-work__desc">
                                        <?php echo $slide['slide_title']; ?>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>

                        <div class="one-work__next swiper-button-next"></div>
                        <div class="one-work__prev swiper-button-prev"></div>
                    </div>
                <?php endif; ?>
                 
                <h2 class="project-desc__heading h2">
                    <?php _e('Опис роботи', 'budguru'); ?>
                </h2>

                <div class="project-desc__block">
                    <?php if(!empty($portfolio['aside_slider'])): ?>
                        <div class="project-desc__slider">
                            <div class="desc__slider swiper">
                                <div class="desc__wrapper swiper-wrapper">
                                    <?php foreach($portfolio['aside_slider'] as $slide): ?>
                                        <div class="desc__slide swiper-slide">
                                            <img src="<?php echo $slide['slide_img']; ?>" alt="Image">
                                        </div>
                                    <?php endforeach; ?>
                                </div>

                                <div class="desc__next swiper-button-next"></div>
                                <div class="desc__prev swiper-button-prev"></div>
                            </div>
                        </div>
                    <?php endif; ?>

                    <div class="project-desc__text-block">
                        <h3 class="project-desc__title">
                            <?php _e('Про проект', 'budguru'); ?>
                        </h3>

                        <div class="project-desc__list">
                            <?php if(!empty($portfolio['cost_project'])): ?>
                                <div class="project-desc__adress project-desc__price">
                                    <span><?php _e('Вартість проекту будинку:', 'budguru'); ?></span> <?php echo $portfolio['cost_project']; ?>
                                </div>
                            <?php endif; ?>

                            <?php if(!empty($portfolio['area'])): ?>
                                <div class="project-desc__adress">
                                    <svg width="26" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M4.87759 25.328H21.1364C23.9359 25.328 25.3284 23.9354 25.3284 21.1765V4.82281C25.3284 2.06396 23.9359 0.671387 21.1364 0.671387H4.87759C2.09187 0.671387 0.671875 2.05082 0.671875 4.82281V21.1771C0.671875 23.9491 2.09187 25.328 4.87759 25.328ZM4.91759 23.1725C3.57873 23.1725 2.82845 22.4628 2.82845 21.0697V4.93139C2.82845 3.53824 3.57873 2.82853 4.91759 2.82853H21.0964C22.4222 2.82853 23.1724 3.53824 23.1724 4.93139V21.0685C23.1724 22.4617 22.4222 23.1714 21.0964 23.1714L4.91759 23.1725Z" fill="black" />
                                    </svg>
                                    <span><?php echo $portfolio['area']; ?></span>
                                </div>
                            <?php endif; ?>

                            <?php if(!empty($portfolio['date'])): ?>
                                <div class="project-desc__adress">
                                    <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M10.3328 3.33325C10.3328 3.06804 10.2275 2.81368 10.0399 2.62615C9.85239 2.43861 9.59803 2.33325 9.33282 2.33325C9.0676 2.33325 8.81325 2.43861 8.62571 2.62615C8.43817 2.81368 8.33282 3.06804 8.33282 3.33325V5.43992C6.41282 5.59325 5.15415 5.96925 4.22882 6.89592C3.30215 7.82125 2.92615 9.08125 2.77148 10.9999H29.2275C29.0728 9.07992 28.6968 7.82125 27.7701 6.89592C26.8448 5.96925 25.5848 5.59325 23.6662 5.43859V3.33325C23.6662 3.06804 23.5608 2.81368 23.3733 2.62615C23.1857 2.43861 22.9314 2.33325 22.6662 2.33325C22.4009 2.33325 22.1466 2.43861 21.959 2.62615C21.7715 2.81368 21.6662 3.06804 21.6662 3.33325V5.35059C20.7795 5.33325 19.7848 5.33325 18.6662 5.33325H13.3328C12.2142 5.33325 11.2195 5.33325 10.3328 5.35059V3.33325Z" fill="black" />
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M2.66602 16C2.66602 14.8813 2.66602 13.8867 2.68335 13H29.3153C29.3327 13.8867 29.3327 14.8813 29.3327 16V18.6667C29.3327 23.6947 29.3327 26.2093 27.77 27.7707C26.2073 29.332 23.694 29.3333 18.666 29.3333H13.3327C8.30468 29.3333 5.79002 29.3333 4.22868 27.7707C2.66735 26.208 2.66602 23.6947 2.66602 18.6667V16ZM22.666 18.6667C23.0196 18.6667 23.3588 18.5262 23.6088 18.2761C23.8589 18.0261 23.9993 17.687 23.9993 17.3333C23.9993 16.9797 23.8589 16.6406 23.6088 16.3905C23.3588 16.1405 23.0196 16 22.666 16C22.3124 16 21.9733 16.1405 21.7232 16.3905C21.4732 16.6406 21.3327 16.9797 21.3327 17.3333C21.3327 17.687 21.4732 18.0261 21.7232 18.2761C21.9733 18.5262 22.3124 18.6667 22.666 18.6667ZM22.666 24C23.0196 24 23.3588 23.8595 23.6088 23.6095C23.8589 23.3594 23.9993 23.0203 23.9993 22.6667C23.9993 22.313 23.8589 21.9739 23.6088 21.7239C23.3588 21.4738 23.0196 21.3333 22.666 21.3333C22.3124 21.3333 21.9733 21.4738 21.7232 21.7239C21.4732 21.9739 21.3327 22.313 21.3327 22.6667C21.3327 23.0203 21.4732 23.3594 21.7232 23.6095C21.9733 23.8595 22.3124 24 22.666 24ZM17.3327 17.3333C17.3327 17.687 17.1922 18.0261 16.9422 18.2761C16.6921 18.5262 16.353 18.6667 15.9993 18.6667C15.6457 18.6667 15.3066 18.5262 15.0565 18.2761C14.8065 18.0261 14.666 17.687 14.666 17.3333C14.666 16.9797 14.8065 16.6406 15.0565 16.3905C15.3066 16.1405 15.6457 16 15.9993 16C16.353 16 16.6921 16.1405 16.9422 16.3905C17.1922 16.6406 17.3327 16.9797 17.3327 17.3333ZM17.3327 22.6667C17.3327 23.0203 17.1922 23.3594 16.9422 23.6095C16.6921 23.8595 16.353 24 15.9993 24C15.6457 24 15.3066 23.8595 15.0565 23.6095C14.8065 23.3594 14.666 23.0203 14.666 22.6667C14.666 22.313 14.8065 21.9739 15.0565 21.7239C15.3066 21.4738 15.6457 21.3333 15.9993 21.3333C16.353 21.3333 16.6921 21.4738 16.9422 21.7239C17.1922 21.9739 17.3327 22.313 17.3327 22.6667ZM9.33268 18.6667C9.6863 18.6667 10.0254 18.5262 10.2755 18.2761C10.5255 18.0261 10.666 17.687 10.666 17.3333C10.666 16.9797 10.5255 16.6406 10.2755 16.3905C10.0254 16.1405 9.6863 16 9.33268 16C8.97906 16 8.63992 16.1405 8.38987 16.3905C8.13982 16.6406 7.99935 16.9797 7.99935 17.3333C7.99935 17.687 8.13982 18.0261 8.38987 18.2761C8.63992 18.5262 8.97906 18.6667 9.33268 18.6667ZM9.33268 24C9.6863 24 10.0254 23.8595 10.2755 23.6095C10.5255 23.3594 10.666 23.0203 10.666 22.6667C10.666 22.313 10.5255 21.9739 10.2755 21.7239C10.0254 21.4738 9.6863 21.3333 9.33268 21.3333C8.97906 21.3333 8.63992 21.4738 8.38987 21.7239C8.13982 21.9739 7.99935 22.313 7.99935 22.6667C7.99935 23.0203 8.13982 23.3594 8.38987 23.6095C8.63992 23.8595 8.97906 24 9.33268 24Z" fill="black" />
                                    </svg>
                                    <span><?php echo $portfolio['date']; ?></span>
                                </div>
                            <?php endif; ?>
                        </div>

                        <?php if(!empty($portfolio['project_team'])): ?>
                            <div class="project__team">
                                <h3 class="project__team-title">
                                    <?php _e('Команда проекту', 'budguru'); ?>
                                </h3>
                                <div class="project__team-row">
                                    <?php foreach($portfolio['project_team'] as $team): ?>
                                        <div class="project__team-item">
                                            <img src="<?php echo $team['photo']; ?>" width="150" height="130" alt="<?php echo $team['position']; ?>" class="project__team-photo">
                                            <div class="project__team-text">
                                                <h4 class="project__team-name">
                                                    <?php echo $team['name']; ?>
                                                </h4>
                                                <div class="project__team-position">
                                                    <?php echo $team['position']; ?>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endwhile; endif; ?>
            </div>
        </section>

        <?php get_template_part('template-parts/sections/info/videoplayer'); ?>

        <?php echo do_shortcode('[calculator]'); ?>

        <?php get_template_part('template-parts/sections/clients-section'); ?>

        <?php echo do_shortcode('[consultation_section]'); ?>
    </main>
<?php get_footer(); ?>