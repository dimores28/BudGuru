<?php
$categories = get_categories();
$posts_query = new WP_Query([
    'posts_per_page' => 2,
    'post_status' => 'publish'
]);
?>

<section class="blog">
    <div class="blog__container">
        <div class="blog_top-block">
            <div class="blog__box">
                <h3 class="blog__heading h2">Блог</h3>
                <div class="blog__filters filters" data-da=".filters-wrap,1120,0">
                    <a href="#" 
                        class="filters__item active" 
                        data-category="all"
                        aria-label="<?php _e('Фільтрувати: показати всі теми', 'budguru'); ?>">
                        <?php _e('Всі теми', 'budguru'); ?>
                    </a>
                    <?php foreach($categories as $category): ?>
                        <a href="#" 
                           class="filters__item" 
                           data-category="<?php echo $category->term_id; ?>"
                           aria-label="<?php 
                                printf(
                                    /* translators: %s: category name */
                                    __('Фільтрувати за категорією: %s', 'budguru'), 
                                    $category->name
                                ); 
                            ?>">
                            <?php echo $category->name; ?>
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>

            <a href="/blog" 
                class="blog__btn btn"
                aria-label="<?php _e('Перейти до всіх статей блогу', 'budguru'); ?>">
                <?php _e('Дивитися більше', 'budguru'); ?>
            </a>
        </div>

        <div class="filters-wrap"></div>

        <div class="blog__posts" id="blog-posts-container">
            <?php if($posts_query->have_posts()): while($posts_query->have_posts()): $posts_query->the_post(); ?>
                <div class="post">
                    <div class="post__top-block">
                        <div class="post__tags">
                        <?php 
                            $post_tags = get_the_tags();
                        if($post_tags): 
                            foreach($post_tags as $tag): 
                        ?>
                            <p class="post__tag">
                                <?php echo $tag->name; ?>
                            </p>
                        <?php 
                            endforeach;
                        endif; 
                        ?>
                        </div>
                    </div>

                    <div class="post__content">
                        <div class="post__date"><?php echo get_the_date('d.m.Y'); ?></div>
                        <h4 class="post__title">
                            <a href="<?php the_permalink(); ?>" 
                               aria-label="<?php 
                                   printf(
                                       /* translators: %s: post title */
                                       __('Читати статтю: %s', 'budguru'), 
                                       get_the_title()
                                   ); 
                               ?>">
                                <?php echo wp_trim_words(get_the_title(), 10); ?>
                            </a>
                        </h4>
                        <p class="post__text">
                            <?php echo wp_trim_words(get_the_excerpt(), 20); ?>
                        </p>

                        <a href="<?php the_permalink(); ?>" 
                            class="post__url"
                            aria-label="<?php 
                                printf(
                                    /* translators: %s: post title */
                                    __('Читати статтю: %s', 'budguru'), 
                                    get_the_title()
                                ); 
                            ?>">
                            <?php _e('Дивитися більше', 'budguru'); ?>
                        </a>
                    </div>
                    <?php if(has_post_thumbnail()): ?>
                        <img src="<?php the_post_thumbnail_url(); ?>" 
                             class="post__image" 
                             alt="<?php echo esc_attr(get_the_title()); ?>">
                    <?php endif; ?>
                </div>
            <?php endwhile; endif; wp_reset_postdata(); ?>
        </div>
    </div>
</section> 