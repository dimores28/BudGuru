<section class="consultation" id="consultation-section">
    <div class="consultation__container">
        <div class="consultation__content">
            <div class="consultation__head-block">
                <h3 class="consultation__heading">
                    <?php _e('Потрібна', 'budguru'); ?> <span><?php _e('консультація спеціаліста?', 'budguru'); ?></span>
                </h3>
            </div>

            <div class="consultation__form-wrap">
                <form class="consultation__form">
                    <div class="consultation__field-wrap">
                        <p class="consultation__text">
                            <?php _e('Якщо вам потрібна консультація спеціаліста по ремонту чи дизайну чи у вас є будь-які запитанняя, вкажіть їх у формі нижче і наші спеціалісти звʼяжуться з вами найближчим часом!', 'budguru'); ?>
                        </p>

                        <input class="consultation__form-input" 
                               type="text" 
                               id="user-name" 
                               name="user-name" 
                               placeholder="<?php _e('Ваше імʼя', 'budguru'); ?>" 
                               aria-label="<?php _e('Ваше імʼя', 'budguru'); ?>">
                        
                        <input class="consultation__form-input" 
                               type="text" 
                               id="input-phone" 
                               name="phone" 
                               placeholder="<?php _e('Номер телефону', 'budguru'); ?>" 
                               aria-label="<?php _e('Номер телефону', 'budguru'); ?>" />
                        
                        <textarea class="consultation__form-input consultation__form-textarea" 
                                  name="question" 
                                  id="input-question" 
                                  placeholder="<?php _e('Ваше питання', 'budguru'); ?>" 
                                  aria-label="<?php _e('Ваше питання', 'budguru'); ?>"></textarea>
                        
                        <input class="consultation__btn-submit btn" 
                               type="submit" 
                               value="<?php _e('Відправити заявку', 'budguru'); ?>" 
                               aria-label="<?php _e('Відправити заявку', 'budguru'); ?>">
                    </div>

                    <div class="consultation__form-success form-success">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/smile.webp" 
                             class="form-success__img" 
                             width="120" 
                             height="120" 
                             alt="smile">
                        <div class="form-success__heading">
                            <?php _e('Дякуємо за звернення!', 'budguru'); ?>
                        </div>
                        <p class="form-success__text">
                            <?php _e('Наші спеціалісти звʼяжуться з вами найближчим часом!', 'budguru'); ?>
                        </p>
                    </div>
                </form>
            </div>
        </div>

        <div class="consultation__illustration">
            <img class="consultation__img" 
                 src="<?php echo get_template_directory_uri(); ?>/assets/img/Rectangle26103829.webp" 
                 width="740" 
                 height="720" 
                 alt="form illustration">
        </div>
    </div>
</section> 