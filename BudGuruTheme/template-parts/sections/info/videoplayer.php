<section class="videoplayer">
    <div class="videoplayer__container">
        <?php 
        $video_url = get_field('video_url', 'option');
        
        // Перевіряємо чи це YouTube URL
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
            <button class="videoplayer__btn-play" 
                id="btn-play" 
                aria-label="<?php _e('Відтворити відео', 'budguru'); ?>">
                <svg width="120" height="120" viewBox="0 0 120 120" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect width="120" height="120" rx="31.1111" fill="white" />
                    <path d="M81.4921 54.8929C85.4236 57.1627 85.4236 62.8373 81.4921 65.1071L54.1837 80.8736C50.2522 83.1435 45.3379 80.3062 45.3379 75.7665L45.3379 44.2335C45.3379 39.6938 50.2522 36.8565 54.1837 39.1264L81.4921 54.8929Z" fill="#1E1E1E" />
                </svg>
            </button>
            <?php
        }
        ?>
    </div>
    <style>
        .videoplayer__youtube-wrapper {
            position: relative;
            width: 100%;
            padding-bottom: 56.25%; /* 16:9 */
            height: 0;
        }

        .videoplayer__youtube-wrapper iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }
    </style>
</section> 