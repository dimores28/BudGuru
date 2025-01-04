<div class="calculator__step calculator__step-1 active">
    <div class="calculator__step-counter">
        <span><?php _e('Оберіть тип приміщення', 'budguru'); ?></span>
        <div class="counter">
            <?php _e('Крок', 'budguru'); ?> <span>1</span> \ 4
        </div>
    </div>
    <div class="calculator__radio-wrap">
        <div class="custon-radio-btn">
            <input type="radio" name="rooms" id="repair-living-quarters">
            <label for="repair-living-quarters"><?php _e('Житлове', 'budguru'); ?></label>
        </div>

        <div class="custon-radio-btn">
            <input type="radio" name="rooms" id="repair-commercial-premises">
            <label for="repair-commercial-premises"><?php _e('Комерційне', 'budguru'); ?></label>
        </div>
    </div>
    <button type="button" class="calculator__nextstep-btn btn">
        <?php _e('Далі', 'budguru'); ?>
        <svg width="34" height="34" viewBox="0 0 34 34" fill="none" xmlns="http://www.w3.org/2000/svg">
            <circle cx="17" cy="17" r="17" transform="rotate(90 17 17)" fill="white" />
            <path d="M13.9261 21.9501L14.8473 22.8705L19.8651 17.8544C19.946 17.774 20.0102 17.6785 20.054 17.5732C20.0978 17.4679 20.1204 17.355 20.1204 17.241C20.1204 17.127 20.0978 17.0141 20.054 16.9088C20.0102 16.8035 19.946 16.7079 19.8651 16.6275L14.8473 11.6089L13.927 12.5293L18.6365 17.2397L13.9261 21.9501Z" fill="#1E1E1E" />
        </svg>
    </button>
</div>

<div class="calculator__step calculator__step-2">
    <div class="calculator__step-counter">
        <span><?php _e('Вкажіть площу', 'budguru'); ?></span>
        <div class="counter">
            <?php _e('Крок', 'budguru'); ?> <span>2</span> \ 4
        </div>
    </div>

    <div class="calculator__range-wrap">
        <div id="repair-range" data-from="1"></div>
        <input type="text" name="area" id="repair-range-input">
    </div>

    <button type="button" class="calculator__nextstep-btn btn">
        <?php _e('Далі', 'budguru'); ?>
        <svg width="34" height="34" viewBox="0 0 34 34" fill="none" xmlns="http://www.w3.org/2000/svg">
            <circle cx="17" cy="17" r="17" transform="rotate(90 17 17)" fill="white" />
            <path d="M13.9261 21.9501L14.8473 22.8705L19.8651 17.8544C19.946 17.774 20.0102 17.6785 20.054 17.5732C20.0978 17.4679 20.1204 17.355 20.1204 17.241C20.1204 17.127 20.0978 17.0141 20.054 16.9088C20.0102 16.8035 19.946 16.7079 19.8651 16.6275L14.8473 11.6089L13.927 12.5293L18.6365 17.2397L13.9261 21.9501Z" fill="#1E1E1E" />
        </svg>
    </button>
</div>

<div class="calculator__step calculator__step-3">
    <div class="calculator__step-counter">
        <span><?php _e('Чи потрібен дизайн на ваш проект?', 'budguru'); ?></span>
        <div class="counter">
            <?php _e('Крок', 'budguru'); ?> <span>3</span> \ 4
        </div>
    </div>

    <div class="calculator__radio-wrap">
        <div class="custon-radio-btn">
            <input type="radio" name="desing" id="repair-need-desing">
            <label for="repair-need-desing"><?php _e('Потрібен', 'budguru'); ?></label>
        </div>

        <div class="custon-radio-btn">
            <input type="radio" name="desing" id="repair-without-design">
            <label for="repair-without-design"><?php _e('Без дизайну', 'budguru'); ?></label>
        </div>
    </div>

    <button type="button" class="calculator__nextstep-btn btn">
        <?php _e('Далі', 'budguru'); ?>
        <svg width="34" height="34" viewBox="0 0 34 34" fill="none" xmlns="http://www.w3.org/2000/svg">
            <circle cx="17" cy="17" r="17" transform="rotate(90 17 17)" fill="white" />
            <path d="M13.9261 21.9501L14.8473 22.8705L19.8651 17.8544C19.946 17.774 20.0102 17.6785 20.054 17.5732C20.0978 17.4679 20.1204 17.355 20.1204 17.241C20.1204 17.127 20.0978 17.0141 20.054 16.9088C20.0102 16.8035 19.946 16.7079 19.8651 16.6275L14.8473 11.6089L13.927 12.5293L18.6365 17.2397L13.9261 21.9501Z" fill="#1E1E1E" />
        </svg>
    </button>
</div>

<div class="calculator__step calculator__step-4">
    <div class="calculator__step-counter">
        <span><?php _e('Ваше імʼя та номер телефону', 'budguru'); ?></span>
        <div class="counter">
            <?php _e('Крок', 'budguru'); ?> <span>4</span> \ 4
        </div>
    </div>

    <div class="calculator__input-wrap">
        <input class="calculator__input input" type="text" name="user-name" id="repair-user-name" placeholder="Ваше імʼя">
        <input class="calculator__input input" type="text" name="user-phone" id="repair-user-phone" placeholder="Номер телефону">
        <textarea class="calculator__textarea input textarea" name="user-question" id="repair-user-question" placeholder="Ваше питання"></textarea>
        <input class="calculator__btn-submit btn" type="submit" value="<?php _e('Відправити заявку', 'budguru'); ?>" aria-label="<?php _e('Відправити заявку', 'budguru'); ?>">
    </div>

</div>