<section class="partners" aria-label="<?php _e('Секція наших клієнтів', 'budguru'); ?>">
    <div class="partners__container">
        <h3 class="partners__heading h2">
            <?php _e('Наші', 'budguru'); ?> <span><?php _e('клієнти', 'budguru'); ?></span>
        </h3>

        <div class="partners__row" 
             role="list" 
             aria-label="<?php _e('Список логотипів клієнтів', 'budguru'); ?>">
            <?php 
            $logos = get_field('logo_clients', 'option');
            
            if($logos): 
                foreach($logos as $logo): 
                    $logo_url = $logo['logo'];
                    $alt_text = $logo['alt_text'];
                    $partner_url = $logo['partner_url'];
            ?>
                <div class="partners__col" role="listitem">
                    <?php if($partner_url): ?>
                        <a href="<?php echo esc_url($partner_url); ?>" 
                           class="partners__link" 
                           target="_blank" 
                           rel="noopener noreferrer"
                           aria-label="<?php 
                               printf(
                                   /* translators: %s: partner name */
                                   __('Відвідати сайт партнера %s (відкриється в новій вкладці)', 'budguru'), 
                                   esc_attr($alt_text)
                               ); 
                           ?>">
                    <?php endif; ?>
                        
                        <img src="<?php echo esc_url($logo_url); ?>" 
                             class="partners__logo" 
                             width="174" 
                             height="90" 
                             alt="<?php 
                                 printf(
                                     /* translators: %s: partner name */
                                     __('Логотип компанії %s', 'budguru'), 
                                     esc_attr($alt_text)
                                 ); 
                             ?>">
                             
                    <?php if($partner_url): ?>
                        </a>
                    <?php endif; ?>
                </div>
            <?php 
                endforeach;
            endif; 
            ?>
        </div>
    </div>
</section> 