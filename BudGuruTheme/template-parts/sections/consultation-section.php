<section class="consultation" id="consultation-section">
    <div class="consultation__container">
        <div class="consultation__content">
            <div class="consultation__head-block">
                <h2 class="consultation__heading">
                    Потрібна <span>консультація спеціаліста?</span>
                </h2>
            </div>

            <div class="consultation__form-wrap">
                <form class="consultation__form">
                    <div class="consultation__field-wrap">
                        <p class="consultation__text">
                            Якщо вам потрібна консультація спеціаліста по ремонту чи дизайну чи у вас є будь-які запитанняя,
                            вкажіть їх у формі нижче і наші спеціалісти звʼяжуться з вами найближчим часом!
                        </p>

                        <input class="consultation__form-input" 
                               type="text" 
                               id="user-name" 
                               name="user-name" 
                               placeholder="Ваше імʼя" 
                               aria-label="Ваше імʼя">
                        
                        <input class="consultation__form-input" 
                               type="text" 
                               id="input-phone" 
                               name="phone" 
                               placeholder="Номер телефону" 
                               aria-label="Номер телефону" />
                        
                        <textarea class="consultation__form-input consultation__form-textarea" 
                                  name="question" 
                                  id="input-question" 
                                  placeholder="Ваше питання" 
                                  aria-label="Ваше питання"></textarea>
                        
                        <input class="consultation__btn-submit btn" 
                               type="submit" 
                               value="Відправити заявку" 
                               aria-label="Відправити заявку">
                    </div>

                    <div class="consultation__form-success form-success">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/smile.webp" 
                             class="form-success__img" 
                             width="120" 
                             height="120" 
                             alt="smile">
                        <h3 class="form-success__heading">
                            Дякуємо за звернення!
                        </h3>
                        <p class="form-success__text">
                            Наші спеціалісти звʼяжуться з вами найближчим часом!
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