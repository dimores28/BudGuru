<section class="videoplayer">
    <div class="videoplayer__container">
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
                src="<?php bloginfo('template_url'); ?>/assets/img/video/Comp2.mp4" 
                type='video/mp4; codecs="avc1.42E01E, mp4a.40.2"' 
            />
            <source 
                src="<?php bloginfo('template_url'); ?>/assets/img/video/Comp2.mp4" 
                type="video/mp4" 
            />
        </video>
        <button class="videoplayer__btn-play" id="btn-play">
            <svg width="120" height="120" viewBox="0 0 120 120" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect width="120" height="120" rx="31.1111" fill="white" />
                <path d="M81.4921 54.8929C85.4236 57.1627 85.4236 62.8373 81.4921 65.1071L54.1837 80.8736C50.2522 83.1435 45.3379 80.3062 45.3379 75.7665L45.3379 44.2335C45.3379 39.6938 50.2522 36.8565 54.1837 39.1264L81.4921 54.8929Z" fill="#1E1E1E" />
            </svg>
        </button>
    </div>
</section> 