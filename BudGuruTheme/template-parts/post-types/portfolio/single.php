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
                <?php 
                // Перевірка на наявність відео
                $video_url = get_field('video_url'); // Отримуємо URL відео з ACF
                if($video_url): ?>
                    <!-- Виводимо відео, якщо URL є -->
                    <section class="videoplayer">
                        <div class="videoplayer__container">
                            <?php 
                            // Перевірка, чи є це YouTube URL
                            if (preg_match('/^(https?:\/\/)?(www\.)?(youtube\.com|youtu\.be)/', $video_url)) {
                                // Отримуємо ID відео з URL
                                $video_id = '';
                                
                                if (preg_match('/youtube\.com\/watch\?v=([^\&\?\/]+)/', $video_url, $id)) {
                                    $video_id = $id[1];
                                } else if (preg_match('/youtu\.be\/([^\&\?\/]+)/', $video_url, $id)) {
                                    $video_id = $id[1];
                                }
                                
                                if ($video_id) {
                                    // Виводимо iframe для YouTube
                                    ?>
                                    <div class="videoplayer__youtube-wrapper">
                                        <iframe 
                                            width="1600" 
                                            height="570" 
                                            src="https://www.youtube.com/embed/<?php echo esc_attr($video_id); ?>?rel=0&showinfo=0" 
                                            title="YouTube video player" 
                                            frameborder="0" 
                                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                                            allowfullscreen
                                            class="videoplayer__video"
                                        ></iframe>
                                    </div>
                                    <?php
                                }
                            } else {
                                // Виводимо звичайний відеоплеєр для локальних відео
                                ?>
                                <video 
                                    poster="<?php bloginfo('template_url'); ?>/assets/img/video/preview.webp" 
                                    muted 
                                    loop 
                                    controls 
                                    playsinline 
                                    preload="yes" 
                                    width="1600" 
                                    height="570" 
                                    class="videoplayer__video" 
                                    id="videoPlayer"
                                >
                                    <source 
                                        src="<?php echo esc_url($video_url); ?>" 
                                        type='video/mp4; codecs="avc1.42E01E, mp4a.40.2"' 
                                    />
                                    <source 
                                        src="<?php echo esc_url($video_url); ?>" 
                                        type="video/mp4" 
                                    />
                                </video>
                                <button class="videoplayer__btn-play" id="btn-play">
                                    <svg width="120" height="120" viewBox="0 0 120 120" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <rect width="120" height="120" rx="31.1111" fill="white" />
                                        <path d="M81.4921 54.8929C85.4236 57.1627 85.4236 62.8373 81.4921 65.1071L54.1837 80.8736C50.2522 83.1435 45.3379 80.3062 45.3379 75.7665L45.3379 44.2335C45.3379 39.6938 50.2522 36.8565 54.1837 39.1264L81.4921 54.8929Z" fill="#1E1E1E" />
                                    </svg>
                                </button>
                                <?php
                            }
                            ?>
                        </div>
                    </section>
                <?php elseif(!empty($portfolio['hero_slider'])): ?>
                    <!-- Якщо відео немає, відображаємо слайдер -->
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

                <!-- Решта коду для опису проекту -->

            <?php endwhile; endif; ?>
            </div>
        </section>


        <?php get_template_part('template-parts/sections/info/videoplayer'); ?>

        <?php echo do_shortcode('[calculator]'); ?>

        <?php get_template_part('template-parts/sections/clients-section'); ?>

        <?php echo do_shortcode('[consultation_section]'); ?>
    </main>
<?php get_footer(); ?>