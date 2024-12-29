<?php get_header(); ?>

<main class="page">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <section class="house-project">
        <div class="house-project__container">
            <h2 class="house-project__heading h2">
                <?php the_title(); ?>
            </h2>

            <?php if($banner_img = get_field('baner_img')): ?>
                <div class="house-project__illustration">
                    <img src="<?php echo $banner_img; ?>" 
                         width="1200" 
                         height="450" 
                         class="house-project__img" 
                         alt="<?php the_title(); ?>">
                    <div class="house-project__desc">
                        <p><?php the_title(); ?></p>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </section>

    <section class="project-desc">
        <div class="project-desc__container">
            <h2 class="project-desc__heading h2">
                Опис роботи
            </h2>

            <div class="project-desc__block">
                <?php if($slides = get_field('slider')): ?>
                    <div class="project-desc__slider">
                        <div class="desc__slider swiper">
                            <div class="desc__wrapper swiper-wrapper">
                                <?php foreach($slides as $slide): ?>
                                    <div class="desc__slide swiper-slide">
                                        <img src="<?php echo $slide['slide_img']; ?>" 
                                             alt="<?php echo !empty($slide['alt']) ? $slide['alt'] : 'Слайд проекту'; ?>">
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
                        Про проект
                    </h3>

                    <?php if($cost_house_project = get_field('cost_house_project')): ?>
                        <div class="project-desc__adress project-desc__price">
                            <span>Вартість проекту будинку:</span> <?php echo $cost_house_project; ?>
                        </div>
                    <?php endif; ?>

                    <?php if($desc = get_field('desc')): ?>
                        <div class="project-desc__description">
                            <?php echo $desc; ?>
                        </div>
                    <?php endif; ?>

                    <?php if($cost_building_house = get_field('cost_building_house')): ?>
                        <div class="project-desc__adress project-desc__price">
                            <span>Вартість будівництва будинку:</span> <?php echo $cost_building_house; ?>
                        </div>
                    <?php endif; ?>

                    <?php if($cost_building_box = get_field('cost_building_box')): ?>
                        <div class="project-desc__adress project-desc__price">
                            <span>Вартість будівництва будинку ( коробка будинку ):</span> <?php echo $cost_building_box; ?>
                        </div>
                    <?php endif; ?>

                    <?php if($cost_interior_decoration = get_field('cost_interior_decoration')): ?>
                        <div class="project-desc__adress project-desc__price">
                            <span>Вартість будинку з внутрішнім оздобленням ( під ключ ):</span> <?php echo $cost_interior_decoration; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <?php if($plans = get_field('plan')): ?>
                <div class="project-desc__plan plan">
                    <?php foreach($plans as $plan): ?>
                        <?php if(!empty($plan['title']) && !empty($plan['plan_img'])): ?>
                            <div class="plan__item">
                                <h3 class="plan__tetle">
                                    <?php echo $plan['title']; ?> 
                                </h3>
                                <img src="<?php echo $plan['plan_img']; ?>" 
                                     width="600" 
                                     height="640" 
                                     class="plan__img" 
                                     alt="<?php echo $plan['title']; ?>">
                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </section>
    <?php endwhile; endif; ?>

    <?php echo do_shortcode('[consultation_section]'); ?>
</main>

<?php get_footer(); ?>