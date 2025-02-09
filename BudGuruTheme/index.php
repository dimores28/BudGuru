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

        <?php 
            $content = get_the_content();
        if (!empty($content)): 
        ?>
            <article class="post-content">
                <div class="post-content__container">
                    <?php the_content(); ?>
                </div>
            </article>
        <?php endif; ?>
    </main>
<?php get_footer() ?>