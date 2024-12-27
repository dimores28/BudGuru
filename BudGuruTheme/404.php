<?php get_header() ?>
    <main class="page">
        <section class="page-404">
            <div class="page-404__container">
                <h1 class="page-404__heading h1">
                    Здається, <span>такої сторінки не існує</span>
                </h1>

                <p class="page-404__desc">
                    Перейдіть на головну та спробуйте ще раз
                </p>

                <a href="/" class="page-404__link btn">
                    На головну
                </a>
            </div>
            <img src="<?php bloginfo('template_url'); ?>/assets/img/404.webp" class="page-404__bg-img" alt="Image">
        </section>
    </main>
<?php get_footer() ?>