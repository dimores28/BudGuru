<section class="our-services">
    <div class="our-services__container">
        <div class="our-services__head-block">
            <h2 class="our-services__heding">
                <?php _e('Наші', 'budguru'); ?> <span><?php _e('Послуги', 'budguru'); ?></span>
            </h2>

            
        </div>
        
        <?php 
            $services = getServices();
            $total_services = count($services);

            for($i = 0; $i < $total_services; $i += 2): 
                // Перевіряємо чи є пара сервісів
                if(isset($services[$i])): 
            ?>
                <div class="our-services__row">
                    <!-- Перший сервіс (малий) -->
                    <div class="our-services__smal-col">
                        <a href="<?php echo $services[$i]['link']; ?>" 
                            class="our-services__smal-col_link"
                            aria-label="<?php 
                                printf(
                                    /* translators: %s: service title */
                                    __('Перейти до послуги: %s', 'budguru'), 
                                    $services[$i]['title']
                                ); 
                            ?>">
                            <svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M23.3031 1.74685L1.14708 23.9029M23.3031 1.74685L23.2357 20.6704M23.3031 1.74685L4.37957 1.81419" stroke="#1E1E1E" stroke-width="1.58" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </a>
                        <img src="<?php echo $services[$i]['img']; ?>" alt="<?php echo $services[$i]['title']; ?>" width="600" height="400" class="our-services__img">
                        <div class="our-services__desc">
                            <h3 class="our-services__text">
                                <a href="<?php echo $services[$i]['link']; ?>" 
                                   aria-label="<?php 
                                        printf(
                                            /* translators: %s: service title */
                                            __('Перейти до послуги: %s', 'budguru'), 
                                            $services[$i]['title']
                                        ); 
                                    ?>">
                                    <?php echo $services[$i]['title']; ?>
                                </a>
                            </h3>
                        </div>
                    </div>

                    <!-- Другий сервіс (великий), якщо існує -->
                    <?php if(isset($services[$i + 1])): ?>
                        <div class="our-services__big-col">
                            <a href="<?php echo $services[$i + 1]['link']; ?>" 
                                class="our-services__big-col_link our-services__big-col_link-mobile"
                                aria-label="<?php 
                                    printf(
                                        /* translators: %s: service title */
                                        __('Перейти до послуги: %s', 'budguru'), 
                                        $services[$i + 1]['title']
                                    ); 
                                ?>">
                                <svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M23.3031 1.74685L1.14708 23.9029M23.3031 1.74685L23.2357 20.6704M23.3031 1.74685L4.37957 1.81419" stroke="#1E1E1E" stroke-width="1.58" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </a>
                            <img src="<?php echo $services[$i + 1]['img']; ?>" alt="<?php echo $services[$i + 1]['title']; ?>" width="970" height="400" class="our-services__img">
                            <div class="our-services__desc">
                                <h3 class="our-services__text">
                                    <a href="<?php echo $services[$i + 1]['link']; ?>" 
                                       aria-label="<?php 
                                            printf(
                                                /* translators: %s: service title */
                                                __('Перейти до послуги: %s', 'budguru'), 
                                                $services[$i + 1]['title']
                                            ); 
                                        ?>">
                                        <?php echo $services[$i + 1]['title']; ?>
                                    </a>
                                </h3>
                                <a href="<?php echo $services[$i + 1]['link']; ?>" 
                                    class="our-services__big-col_link"
                                    aria-label="<?php 
                                        printf(
                                            /* translators: %s: service title */
                                            __('Перейти до послуги: %s', 'budguru'), 
                                            $services[$i + 1]['title']
                                        ); 
                                    ?>">
                                    <svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M23.3031 1.74685L1.14708 23.9029M23.3031 1.74685L23.2357 20.6704M23.3031 1.74685L4.37957 1.81419" stroke="#1E1E1E" stroke-width="1.58" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            <?php 
                endif;
            endfor; 
        ?>
    </div>
</section>