<?php
if (is_single()) {
    set_post_views(get_the_ID());
}
?>

<?php get_header() ?>
    <main class="page">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

        <?php echo do_shortcode('[hero_section title="'.get_the_title().'" show_link="false"]'); ?>

        <section class="post-meta">
            <div class="post-meta__container">
                <div class="post-meta__date">
                    <?php echo get_the_date('d.m.Y'); ?>
                </div>
                <div class="post-meta__actions">
                    <?php 
                        $likes = get_post_meta(get_the_ID(), 'post_likes', true);
                        if (empty($likes)) $likes = 0;
                        $liked_class = has_user_liked_post(get_the_ID()) ? 'liked' : '';
                    ?>
                    <button class="post-meta__action post-like-button <?php echo $liked_class; ?>" data-post-id="<?php echo get_the_ID(); ?>">
                        <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M23.1641 10C23.1641 9.46957 22.9533 8.96086 22.5783 8.58579C22.2032 8.21071 21.6945 8 21.1641 8H14.8441L15.8041 3.43C15.8241 3.33 15.8341 3.22 15.8341 3.11C15.8341 2.7 15.6641 2.32 15.3941 2.05L14.3341 1L7.75406 7.58C7.38406 7.95 7.16406 8.45 7.16406 9V19C7.16406 19.5304 7.37478 20.0391 7.74985 20.4142C8.12492 20.7893 8.63363 21 9.16406 21H18.1641C18.9941 21 19.7041 20.5 20.0041 19.78L23.0241 12.73C23.1141 12.5 23.1641 12.26 23.1641 12V10ZM1.16406 21H5.16406V9H1.16406V21Z"/>
                        </svg>	
                        <span class="like-count">
                            <?php echo $likes; ?>
                        </span>							
                    </button>
                    <button class="post-meta__action">
                        <svg width="22" height="16" viewBox="0 0 22 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M11 5C10.2044 5 9.44129 5.31607 8.87868 5.87868C8.31607 6.44129 8 7.20435 8 8C8 8.79565 8.31607 9.55871 8.87868 10.1213C9.44129 10.6839 10.2044 11 11 11C11.7956 11 12.5587 10.6839 13.1213 10.1213C13.6839 9.55871 14 8.79565 14 8C14 7.20435 13.6839 6.44129 13.1213 5.87868C12.5587 5.31607 11.7956 5 11 5ZM11 13C9.67392 13 8.40215 12.4732 7.46447 11.5355C6.52678 10.5979 6 9.32608 6 8C6 6.67392 6.52678 5.40215 7.46447 4.46447C8.40215 3.52678 9.67392 3 11 3C12.3261 3 13.5979 3.52678 14.5355 4.46447C15.4732 5.40215 16 6.67392 16 8C16 9.32608 15.4732 10.5979 14.5355 11.5355C13.5979 12.4732 12.3261 13 11 13ZM11 0.5C6 0.5 1.73 3.61 0 8C1.73 12.39 6 15.5 11 15.5C16 15.5 20.27 12.39 22 8C20.27 3.61 16 0.5 11 0.5Z"/>
                        </svg>									
                        <span>
                            <?php echo get_post_views(get_the_ID()); ?>
                        </span>							
                    </button>
                </div>
            </div>
        </section>

        <article class="post-content">
            <div class="post-content__container">
                    <?php the_content(); ?>
            </div>
        </article>

        <section class="post-meta">
            <div class="post-meta__container">
                <h3 class="post-meta__heading">
                    <?php _e('Сподобалась стаття?', 'budguru'); ?>
                </h3>
                <div class="post-meta__actions">
                    <p class="post-meta__text">
                        <?php _e('Постав лайк', 'budguru'); ?>
                    </p>
                    <button class="post-meta__action post-like-button <?php echo $liked_class; ?>" data-post-id="<?php echo get_the_ID(); ?>">
                        <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M23.1641 10C23.1641 9.46957 22.9533 8.96086 22.5783 8.58579C22.2032 8.21071 21.6945 8 21.1641 8H14.8441L15.8041 3.43C15.8241 3.33 15.8341 3.22 15.8341 3.11C15.8341 2.7 15.6641 2.32 15.3941 2.05L14.3341 1L7.75406 7.58C7.38406 7.95 7.16406 8.45 7.16406 9V19C7.16406 19.5304 7.37478 20.0391 7.74985 20.4142C8.12492 20.7893 8.63363 21 9.16406 21H18.1641C18.9941 21 19.7041 20.5 20.0041 19.78L23.0241 12.73C23.1141 12.5 23.1641 12.26 23.1641 12V10ZM1.16406 21H5.16406V9H1.16406V21Z"/>
                        </svg>	
                        <span class="like-count">
                            <?php echo $likes; ?>
                        </span>							
                    </button>
                </div>
            </div>
        </section>
    <?php endwhile; endif; ?>

        <?php echo do_shortcode('[consultation_section]'); ?>
    </main>

    
<?php get_footer() ?>