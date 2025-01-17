<section class="partners">
    <div class="partners__container">
        <h2 class="partners__heading h2">
            <?php _e('Наші', 'budguru'); ?> <span><?php _e('партнери', 'budguru'); ?></span>
        </h2>

        <div class="partners__row">
            <?php 
            $logos = get_field('partner_logos', 'option');
            
            if($logos): 
                foreach($logos as $logo): 
                    $logo_url = $logo['logo'];
                    $alt_text = $logo['alt_text'];
                    $partner_url = $logo['partner_url'];
            ?>
                <div class="partners__col">
                    <?php if($partner_url): ?>
                        <a href="<?php echo esc_url($partner_url); ?>" 
                           class="partners__link" 
                           target="_blank" 
                           rel="noopener noreferrer">
                    <?php endif; ?>
                        
                        <img src="<?php echo $logo_url; ?>" 
                             class="partners__logo" 
                             width="174" 
                             height="90" 
                             alt="<?php echo $alt_text; ?>">
                             
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