<?php 
if (!defined('ABSPATH')) {
    exit;
}

get_header(); 
?>
    <main class="page">
        <section class="page-404">
            <div class="page-404__container">
                <h1 class="page-404__heading h1">
                    <?php _e('Здається, <span>такої сторінки не існує</span>', 'budguru'); ?>
                </h1>

                <p class="page-404__desc">
                    <?php _e('Перейдіть на головну та спробуйте ще раз', 'budguru'); ?>
                </p>

                <a href="<?php echo home_url('/'); ?>" class="page-404__link btn">
                    <?php _e('На головну', 'budguru'); ?>
                </a>
            </div>
            <img src="<?php bloginfo('template_url'); ?>/assets/img/404.webp" class="page-404__bg-img" alt="404">
        </section>
    </main>
<?php get_footer(); ?>