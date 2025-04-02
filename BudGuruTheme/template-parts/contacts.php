<?php
/*
Template Name: Contacts
*/
?>

<?php get_header() ?>

<main class="page">
    <?php
        $page_title = get_the_title();
        $words = explode(' ', $page_title);

        $middle = ceil(count($words) / 2);
        $first_part = array_slice($words, 0, $middle);
        $second_part = array_slice($words, $middle);

        // Отримуємо URL та alt текст головного зображення
        $post_thumbnail_id = get_post_thumbnail_id(get_the_ID());
        $bg_image = get_the_post_thumbnail_url(get_the_ID(), 'full');
        $bg_alt = get_post_meta($post_thumbnail_id, '_wp_attachment_image_alt', true);
        
        // Передаємо параметри bg_image та bg_alt тільки якщо є зображення
        $shortcode_args = array(
            'title' => sprintf('%s <span>%s</span>', 
                implode(' ', $first_part), 
                implode(' ', $second_part)
            ),
            'show_link' => 'false'
        );

        // Додаємо параметри зображення тільки якщо воно є
        if ($bg_image) {
            $shortcode_args['bg_image'] = $bg_image;
            $shortcode_args['bg_alt'] = esc_attr($bg_alt);
        }
        
        // Формуємо шорткод
        $shortcode = '[hero_section';
        foreach ($shortcode_args as $key => $value) {
            $shortcode .= sprintf(' %s="%s"', $key, $value);
        }
        $shortcode .= ']';
        
        echo do_shortcode($shortcode);
    ?>


    <section class="contacts">
        <div class="contacts__container">
            <h2 class="contacts__heading h2">
                <?php _e('Наші <span>контакти</span>', 'budguru'); ?>
            </h2>

            <div class="contacts__block">
                <div class="contacts__content">
                    <h3 class="contacts__title">
                        <?php _e('Наші <span>Контакти</span>', 'budguru'); ?>
                    </h3>

                    <ul class="contacts__list">
                        <li class="contacts__item">
                            <a href="tel:<?echo get_field('phone', 'option'); ?>">
                                <svg width="40" height="41" viewBox="0 0 40 41" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M32.0491 25.9333L27.8158 25.4499C27.318 25.3915 26.8134 25.4466 26.34 25.6111C25.8666 25.7757 25.4366 26.0454 25.0824 26.3999L22.0158 29.4666C17.2847 27.0598 13.4392 23.2143 11.0324 18.4833L14.1158 15.3999C14.8324 14.6833 15.1824 13.6833 15.0658 12.6666L14.5824 8.46661C14.4883 7.65342 14.0982 6.90331 13.4865 6.35926C12.8749 5.81521 12.0844 5.51527 11.2658 5.51661H8.38243C6.49909 5.51661 4.93242 7.08327 5.04909 8.96661C5.93242 23.1999 17.3158 34.5666 31.5324 35.4499C33.4158 35.5666 34.9824 33.9999 34.9824 32.1166V29.2333C34.9991 27.5499 33.7324 26.1333 32.0491 25.9333Z" fill="#F9C98C" />
                                </svg>
                                <span>
                                    <?echo get_field('view_phone', 'option'); ?>
                                </span>
                            </a>
                        </li>
                        <li class="contacts__item">
                            <a href="mailto:<?php echo get_field('email', 'option'); ?>">
                                <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_3378_5646)">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M14.344 22.668L20.004 26.538L25.46 22.774L37.69 34.84C37.3673 34.9453 37.026 34.9987 36.666 35H3.334C2.894 35 2.474 34.914 2.088 34.76L14.344 22.668ZM40 12.752V31.666C40 32.16 39.892 32.628 39.7 33.05L27.712 21.222L40 12.752ZM0 12.858L12.084 21.122L0.212 32.838C0.0729255 32.4629 0.00115798 32.0661 0 31.666L0 12.858ZM36.666 5C38.506 5 40 6.492 40 8.334V9.506L19.996 23.296L0 9.62V8.334C0 6.494 1.492 5 3.334 5H36.666Z" fill="#F9C98C" />
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_3378_5646">
                                            <rect width="40" height="40" fill="white" />
                                        </clipPath>
                                    </defs>
                                </svg>

                                <span><?php echo get_field('email', 'option'); ?></span>
                            </a>
                        </li>
                        <li class="contacts__item">
                            <a href="<?echo get_field('google_map_url', 'option'); ?>">
                                <svg width="28" height="40" viewBox="0 0 28 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M14 40C14 40 0 21.74 0 14C-2.73959e-08 12.1615 0.362121 10.341 1.06569 8.64243C1.76925 6.94387 2.80048 5.40053 4.1005 4.1005C5.40053 2.80048 6.94387 1.76925 8.64243 1.06569C10.341 0.362121 12.1615 0 14 0C15.8385 0 17.659 0.362121 19.3576 1.06569C21.0561 1.76925 22.5995 2.80048 23.8995 4.1005C25.1995 5.40053 26.2307 6.94387 26.9343 8.64243C27.6379 10.341 28 12.1615 28 14C28 21.74 14 40 14 40ZM14 18C15.0609 18 16.0783 17.5786 16.8284 16.8284C17.5786 16.0783 18 15.0609 18 14C18 12.9391 17.5786 11.9217 16.8284 11.1716C16.0783 10.4214 15.0609 10 14 10C12.9391 10 11.9217 10.4214 11.1716 11.1716C10.4214 11.9217 10 12.9391 10 14C10 15.0609 10.4214 16.0783 11.1716 16.8284C11.9217 17.5786 12.9391 18 14 18Z" fill="#F9C98C" />
                                </svg>
                                <span>
                                    <span><?echo get_field('adresa', 'option'); ?></span>
                                </span>
                            </a>
                        </li>
                        <li class="contacts__item">
                            <a href="#">
                                <svg width="34" height="35" viewBox="0 0 34 35" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M17.0007 0.833252C14.812 0.833252 12.6447 1.26435 10.6226 2.10193C8.6005 2.9395 6.76318 4.16716 5.21554 5.71481C2.08993 8.84041 0.333984 13.0796 0.333984 17.4999C0.333984 21.9202 2.08993 26.1594 5.21554 29.285C6.76318 30.8327 8.6005 32.0603 10.6226 32.8979C12.6447 33.7355 14.812 34.1666 17.0007 34.1666C21.4209 34.1666 25.6602 32.4106 28.7858 29.285C31.9114 26.1594 33.6673 21.9202 33.6673 17.4999C33.6673 15.3112 33.2362 13.144 32.3986 11.1219C31.5611 9.09977 30.3334 7.26245 28.7858 5.71481C27.2381 4.16716 25.4008 2.9395 23.3787 2.10193C21.3566 1.26435 19.1893 0.833252 17.0007 0.833252ZM24.0007 24.4999L15.334 19.1666V9.16658H17.834V17.8333L25.334 22.3333L24.0007 24.4999Z" fill="#F9C98C" />
                                </svg>
                                <span>
                                    <?echo get_field('working_hours', 'option'); ?>
                                </span>
                            </a>
                        </li>
                    </ul>

                    <div class="contacts__social">
                        <h4 class="social__title">
                            <?php _e('Ми в соцмережах:', 'budguru'); ?>
                        </h4>
                        <ul class="social__list">
                            <?php if(get_field('instagram', 'option')): ?>
                            <li class="social__item">
                                <a href="<?php echo get_field('instagram', 'option'); ?>">
                                    <svg width="34" height="34" viewBox="0 0 34 34" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M18.713 0.333252C20.588 0.338252 21.5396 0.348252 22.3613 0.371585L22.6846 0.383252C23.058 0.396585 23.4263 0.413252 23.8713 0.433252C25.6446 0.516585 26.8546 0.796585 27.9163 1.20825C29.0163 1.63159 29.943 2.20492 30.8696 3.12992C31.7175 3.96281 32.3733 4.97071 32.7913 6.08325C33.203 7.14492 33.483 8.35492 33.5663 10.1299C33.5863 10.5733 33.603 10.9416 33.6163 11.3166L33.6263 11.6399C33.6513 12.4599 33.6613 13.4116 33.6646 15.2866L33.6663 16.5299V18.7133C33.6704 19.9289 33.6576 21.1446 33.628 22.3599L33.618 22.6833C33.6046 23.0583 33.588 23.4266 33.568 23.8699C33.4846 25.6449 33.2013 26.8533 32.7913 27.9166C32.3733 29.0291 31.7175 30.037 30.8696 30.8699C30.0368 31.7177 29.0289 32.3736 27.9163 32.7916C26.8546 33.2033 25.6446 33.4833 23.8713 33.5666L22.6846 33.6166L22.3613 33.6266C21.5396 33.6499 20.588 33.6616 18.713 33.6649L17.4696 33.6666H15.288C14.0717 33.6709 12.8555 33.6581 11.6396 33.6283L11.3163 33.6183C10.9207 33.6033 10.5251 33.586 10.1296 33.5666C8.35631 33.4833 7.14631 33.2033 6.08298 32.7916C4.97103 32.3733 3.96372 31.7175 3.13131 30.8699C2.28289 30.0372 1.62649 29.0293 1.20798 27.9166C0.796313 26.8549 0.516312 25.6449 0.432979 23.8699L0.382979 22.6833L0.374646 22.3599C0.343923 21.1446 0.330032 19.9289 0.332979 18.7133V15.2866C0.328366 14.0709 0.34059 12.8552 0.369646 11.6399L0.381313 11.3166C0.394646 10.9416 0.411313 10.5733 0.431313 10.1299C0.514646 8.35492 0.794646 7.14658 1.20631 6.08325C1.6258 4.97025 2.28335 3.96231 3.13298 3.12992C3.9649 2.2825 4.97163 1.62671 6.08298 1.20825C7.14631 0.796585 8.35465 0.516585 10.1296 0.433252C10.573 0.413252 10.943 0.396585 11.3163 0.383252L11.6396 0.373252C12.855 0.34364 14.0706 0.330861 15.2863 0.334918L18.713 0.333252ZM16.9996 8.66658C14.7895 8.66658 12.6699 9.54456 11.1071 11.1074C9.54429 12.6702 8.66631 14.7898 8.66631 16.9999C8.66631 19.2101 9.54429 21.3297 11.1071 22.8925C12.6699 24.4553 14.7895 25.3333 16.9996 25.3333C19.2098 25.3333 21.3294 24.4553 22.8922 22.8925C24.455 21.3297 25.333 19.2101 25.333 16.9999C25.333 14.7898 24.455 12.6702 22.8922 11.1074C21.3294 9.54456 19.2098 8.66658 16.9996 8.66658ZM16.9996 11.9999C17.6563 11.9998 18.3065 12.129 18.9131 12.3802C19.5198 12.6314 20.0711 12.9996 20.5354 13.4638C20.9998 13.928 21.3682 14.4791 21.6196 15.0857C21.8709 15.6923 22.0004 16.3425 22.0005 16.9991C22.0006 17.6557 21.8714 18.3059 21.6202 18.9126C21.369 19.5192 21.0008 20.0705 20.5366 20.5349C20.0724 20.9992 19.5213 21.3676 18.9147 21.619C18.3081 21.8704 17.6579 21.9998 17.0013 21.9999C15.6752 21.9999 14.4035 21.4731 13.4658 20.5355C12.5281 19.5978 12.0013 18.326 12.0013 16.9999C12.0013 15.6738 12.5281 14.4021 13.4658 13.4644C14.4035 12.5267 15.6752 11.9999 17.0013 11.9999M25.7513 6.16658C25.1988 6.16658 24.6689 6.38608 24.2782 6.77678C23.8875 7.16748 23.668 7.69738 23.668 8.24992C23.668 8.80245 23.8875 9.33236 24.2782 9.72306C24.6689 10.1138 25.1988 10.3333 25.7513 10.3333C26.3038 10.3333 26.8337 10.1138 27.2245 9.72306C27.6152 9.33236 27.8346 8.80245 27.8346 8.24992C27.8346 7.69738 27.6152 7.16748 27.2245 6.77678C26.8337 6.38608 26.3038 6.16658 25.7513 6.16658Z" />
                                    </svg>
                                </a>
                            </li>
                            <?php endif; ?>
                            
                            <?php if(get_field('telegram', 'option')): ?>
                            <li class="social__item">
                                <a href="<?php echo get_field('telegram', 'option'); ?>">
                                    <svg width="34" height="34" viewBox="0 0 34 34" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M17.0007 0.333252C7.80065 0.333252 0.333984 7.79992 0.333984 16.9999C0.333984 26.1999 7.80065 33.6666 17.0007 33.6666C26.2007 33.6666 33.6673 26.1999 33.6673 16.9999C33.6673 7.79992 26.2007 0.333252 17.0007 0.333252ZM24.734 11.6666C24.484 14.2999 23.4007 20.6999 22.8507 23.6499C22.6173 24.8999 22.1507 25.3166 21.7173 25.3666C20.7507 25.4499 20.0173 24.7333 19.084 24.1166C17.6173 23.1499 16.784 22.5499 15.3673 21.6166C13.7173 20.5333 14.784 19.9333 15.734 18.9666C15.984 18.7166 20.2507 14.8333 20.334 14.4833C20.3456 14.4302 20.344 14.3752 20.3295 14.3229C20.315 14.2706 20.2879 14.2227 20.2507 14.1833C20.1507 14.0999 20.0173 14.1333 19.9007 14.1499C19.7507 14.1833 17.4173 15.7333 12.8673 18.7999C12.2007 19.2499 11.6007 19.4833 11.0673 19.4666C10.4673 19.4499 9.33398 19.1333 8.48398 18.8499C7.43398 18.5166 6.61732 18.3333 6.68398 17.7499C6.71732 17.4499 7.13399 17.1499 7.91732 16.8333C12.784 14.7166 16.0173 13.3166 17.634 12.6499C22.2673 10.7166 23.2173 10.3833 23.8507 10.3833C23.984 10.3833 24.3007 10.4166 24.5007 10.5833C24.6673 10.7166 24.7173 10.8999 24.734 11.0333C24.7173 11.1333 24.7507 11.4333 24.734 11.6666Z" />
                                    </svg>
                                </a>
                            </li>
                            <?php endif; ?>
                            
                            <?php if(get_field('viber', 'option')): ?>
                            <li class="social__item">
                                <a href="<?php echo get_field('viber', 'option'); ?>">
                                    <svg width="32" height="35" viewBox="0 0 32 35" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M23.7931 1.38008C18.5495 0.207944 13.1117 0.207944 7.86811 1.38008L7.30311 1.50508C5.82773 1.83396 4.47259 2.56587 3.38854 3.61931C2.3045 4.67275 1.5341 6.00639 1.16311 7.47174C-0.163744 12.7096 -0.163744 18.1956 1.16311 23.4334C1.51695 24.8309 2.2344 26.1098 3.24256 27.1402C4.25073 28.1706 5.51368 28.9158 6.90311 29.3001L7.67811 33.9267C7.70285 34.0737 7.76652 34.2113 7.8625 34.3252C7.95847 34.4392 8.08324 34.5253 8.22382 34.5746C8.36439 34.624 8.51562 34.6348 8.66177 34.6058C8.80791 34.5769 8.94362 34.5093 9.05477 34.4101L13.6064 30.3384C17.0232 30.5447 20.4521 30.2715 23.7931 29.5267L24.3598 29.4017C25.8352 29.0729 27.1903 28.3409 28.2743 27.2875C29.3584 26.2341 30.1288 24.9004 30.4998 23.4351C31.8266 18.1972 31.8266 12.7112 30.4998 7.47341C30.1287 6.00784 29.358 4.67406 28.2736 3.6206C27.1893 2.56714 25.8338 1.83535 24.3581 1.50674L23.7931 1.38008ZM9.27477 7.33674C8.96501 7.29138 8.64907 7.35375 8.37977 7.51341H8.35644C7.73144 7.88008 7.16811 8.34174 6.68811 8.88508C6.28811 9.34674 6.07144 9.81341 6.01477 10.2634C5.98144 10.5301 6.00477 10.8001 6.08311 11.0551L6.11311 11.0717C6.56311 12.3934 7.14977 13.6651 7.86644 14.8617C8.79093 16.5423 9.92807 18.0968 11.2498 19.4867L11.2898 19.5434L11.3531 19.5901L11.3914 19.6351L11.4381 19.6751C12.8331 21.0006 14.3912 22.1432 16.0748 23.0751C17.9998 24.1234 19.1681 24.6184 19.8698 24.8251V24.8351C20.0748 24.8984 20.2614 24.9267 20.4498 24.9267C21.0477 24.8839 21.6137 24.6408 22.0564 24.2367C22.5981 23.7567 23.0564 23.1917 23.4131 22.5634V22.5517C23.7481 21.9184 23.6348 21.3217 23.1514 20.9167C22.1814 20.0674 21.1315 19.3139 20.0164 18.6667C19.2698 18.2617 18.5114 18.5067 18.2048 18.9167L17.5498 19.7434C17.2131 20.1534 16.6031 20.0967 16.6031 20.0967L16.5864 20.1067C12.0348 18.9451 10.8198 14.3367 10.8198 14.3367C10.8198 14.3367 10.7631 13.7101 11.1848 13.3901L12.0048 12.7301C12.3981 12.4101 12.6714 11.6534 12.2498 10.9067C11.6041 9.79245 10.8522 8.74314 10.0048 7.77341C9.8194 7.5457 9.55978 7.39052 9.27144 7.33508M16.9648 5.33341C16.7438 5.33341 16.5318 5.42121 16.3755 5.57749C16.2192 5.73377 16.1314 5.94573 16.1314 6.16674C16.1314 6.38776 16.2192 6.59972 16.3755 6.756C16.5318 6.91228 16.7438 7.00008 16.9648 7.00008C19.0731 7.00008 20.8231 7.68841 22.2081 9.00841C22.9198 9.73008 23.4748 10.5851 23.8381 11.5217C24.2031 12.4601 24.3698 13.4617 24.3264 14.4651C24.3218 14.5745 24.3388 14.6838 24.3765 14.7866C24.4141 14.8895 24.4716 14.9839 24.5458 15.0646C24.6955 15.2274 24.9038 15.3241 25.1248 15.3334C25.3458 15.3427 25.5614 15.2638 25.7243 15.1141C25.8871 14.9644 25.9838 14.7561 25.9931 14.5351C26.0428 13.301 25.838 12.0699 25.3914 10.9184C24.9428 9.76105 24.2596 8.70901 23.3848 7.82841L23.3681 7.81174C21.6498 6.17008 19.4748 5.33341 16.9648 5.33341ZM16.9081 8.07341C16.6871 8.07341 16.4751 8.16121 16.3189 8.31749C16.1626 8.47377 16.0748 8.68573 16.0748 8.90674C16.0748 9.12776 16.1626 9.33972 16.3189 9.496C16.4751 9.65228 16.6871 9.74008 16.9081 9.74008H16.9364C18.4564 9.84841 19.5631 10.3551 20.3381 11.1867C21.1331 12.0434 21.5448 13.1084 21.5131 14.4251C21.508 14.6461 21.5909 14.8601 21.7436 15.0199C21.8963 15.1798 22.1063 15.2725 22.3273 15.2776C22.5483 15.2827 22.7623 15.1997 22.9221 15.0471C23.082 14.8944 23.1747 14.6844 23.1798 14.4634C23.2198 12.7351 22.6631 11.2434 21.5598 10.0534V10.0501C20.4314 8.84008 18.8831 8.20008 17.0198 8.07508L16.9914 8.07174L16.9081 8.07341ZM16.8764 10.8651C16.7649 10.8552 16.6526 10.868 16.5461 10.9025C16.4396 10.9371 16.3411 10.9927 16.2566 11.0661C16.1721 11.1396 16.1033 11.2293 16.0542 11.3299C16.0051 11.4305 15.9768 11.54 15.971 11.6518C15.9652 11.7636 15.9819 11.8755 16.0203 11.9806C16.0586 12.0858 16.1178 12.1822 16.1942 12.264C16.2706 12.3458 16.3627 12.4114 16.4651 12.4568C16.5674 12.5023 16.6778 12.5266 16.7898 12.5284C17.4864 12.5651 17.9314 12.7751 18.2114 13.0567C18.4931 13.3401 18.7031 13.7951 18.7414 14.5067C18.7435 14.6186 18.7681 14.7288 18.8137 14.831C18.8593 14.9331 18.925 15.025 19.0069 15.1012C19.0887 15.1774 19.1851 15.2364 19.2902 15.2746C19.3954 15.3127 19.5071 15.3293 19.6188 15.3234C19.7305 15.3175 19.8399 15.2891 19.9404 15.24C20.0409 15.1909 20.1305 15.1221 20.2038 15.0377C20.2772 14.9532 20.3327 14.8549 20.3673 14.7485C20.4018 14.6421 20.4146 14.5298 20.4048 14.4184C20.3514 13.4184 20.0381 12.5351 19.3964 11.8851C18.7514 11.2351 17.8731 10.9184 16.8764 10.8651Z" />
                                    </svg>
                                </a>
                            </li>
                            <?php endif; ?>
                            
                            <?php if(get_field('whatsapp', 'option')): ?>
                            <li class="social__item">
                                <a href="<?php echo get_field('whatsapp', 'option'); ?>">
                                    <svg width="34" height="37" viewBox="0 0 34 37" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M17.0007 0.333252C7.79565 0.333252 0.333984 7.79492 0.333984 16.9999C0.333984 20.1499 1.20898 23.0999 2.73065 25.6133L1.24398 30.6666C1.15863 30.9567 1.15301 31.2645 1.22773 31.5576C1.30244 31.8506 1.45473 32.1181 1.66858 32.332C1.88244 32.5458 2.14995 32.6981 2.44301 32.7728C2.73607 32.8476 3.04385 32.8419 3.33398 32.7566L8.38732 31.2699C10.9852 32.8415 13.9644 33.6705 17.0007 33.6666C26.2057 33.6666 33.6673 26.2049 33.6673 16.9999C33.6673 7.79492 26.2057 0.333252 17.0007 0.333252ZM13.2307 20.7716C16.6023 24.1416 19.8207 24.5866 20.9573 24.6283C22.6857 24.6916 24.369 23.3716 25.024 21.8399C25.106 21.6492 25.1356 21.4401 25.1098 21.2342C25.084 21.0282 25.0038 20.8328 24.8773 20.6683C23.964 19.5016 22.729 18.6633 21.5223 17.8299C21.2705 17.6553 20.9608 17.5852 20.6583 17.6343C20.3559 17.6834 20.0843 17.8479 19.9007 18.0933L18.9007 19.6183C18.8478 19.6999 18.7659 19.7584 18.6715 19.782C18.5771 19.8055 18.4773 19.7922 18.3923 19.7449C17.714 19.3566 16.7257 18.6966 16.0157 17.9866C15.3057 17.2766 14.6857 16.3333 14.3373 15.6983C14.2952 15.6173 14.2833 15.5241 14.3037 15.4352C14.3242 15.3463 14.3757 15.2676 14.449 15.2133L15.989 14.0699C16.2094 13.8792 16.3517 13.6139 16.3886 13.3248C16.4255 13.0357 16.3544 12.7432 16.189 12.5033C15.4423 11.4099 14.5723 10.0199 13.3107 9.09825C13.1475 8.98102 12.9568 8.90791 12.7571 8.88601C12.5573 8.86411 12.3554 8.89416 12.1707 8.97325C10.6373 9.62992 9.31065 11.3133 9.37398 13.0449C9.41565 14.1816 9.86065 17.3999 13.2307 20.7716Z" />
                                    </svg>
                                </a>
                            </li>
                            <?php endif; ?>

                            <?php if(get_field('tik-tok', 'option')): ?>
                            <li class="social__item">
                                <a href="<?php echo get_field('tik-tok', 'option'); ?>">
                                    <svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="24" cy="24" r="24" fill="white"/>
                                        <g clip-path="url(#clip0_3708_25)">
                                        <path d="M30.2687 19.802C32.1656 21.1825 34.4896 21.9947 36.9995 21.9947V17.0778C36.5245 17.078 36.0507 17.0276 35.586 16.9272V20.7975C33.0762 20.7975 30.7526 19.9854 28.8552 18.605V28.639C28.8552 33.6586 24.8581 37.7275 19.9279 37.7275C18.0883 37.7275 16.3784 37.1613 14.958 36.1902C16.5791 37.8778 18.8399 38.9246 21.341 38.9246C26.2717 38.9246 30.2689 34.8557 30.2689 29.8359V19.802H30.2687ZM32.0125 14.8414C31.043 13.7632 30.4064 12.3697 30.2687 10.8292V10.1968H28.9291C29.2663 12.1547 30.4165 13.8275 32.0125 14.8414ZM18.0764 32.3384C17.5347 31.6155 17.2419 30.731 17.2433 29.8215C17.2433 27.5258 19.0715 25.6644 21.3271 25.6644C21.7474 25.6641 22.1652 25.7298 22.5659 25.8592V20.8323C22.0976 20.767 21.6252 20.7392 21.1529 20.7494V24.6621C20.7521 24.5327 20.334 24.467 19.9135 24.4674C17.658 24.4674 15.8299 26.3286 15.8299 28.6246C15.8299 30.2482 16.7437 31.6537 18.0764 32.3384Z" fill="#FF004F"/>
                                        <path d="M28.8551 18.6048C30.7526 19.9853 33.0761 20.7974 35.5859 20.7974V16.9271C34.1849 16.6233 32.9447 15.8781 32.0123 14.8414C30.4162 13.8274 29.2662 12.1546 28.9291 10.1968H25.4106V29.8357C25.4026 32.1252 23.5775 33.979 21.3268 33.979C20.0006 33.979 18.8223 33.3355 18.0761 32.3383C16.7436 31.6537 15.8297 30.2481 15.8297 28.6247C15.8297 26.3289 17.6579 24.4675 19.9134 24.4675C20.3455 24.4675 20.762 24.5359 21.1527 24.6622V20.7495C16.309 20.8514 12.4136 24.8805 12.4136 29.8358C12.4136 32.3095 13.3836 34.5519 14.958 36.1904C16.3784 37.1613 18.0882 37.7277 19.9279 37.7277C24.8582 37.7277 28.8552 33.6585 28.8552 28.639L28.8551 18.6048Z" fill="black"/>
                                        <path d="M35.5857 16.9272V15.881C34.3224 15.8828 33.0841 15.5227 32.0122 14.8416C32.961 15.8991 34.2103 16.6283 35.5857 16.9274M28.9288 10.1969C28.8967 10.0098 28.872 9.82149 28.8549 9.63238V9H23.9968V28.6391C23.989 30.9284 22.164 32.7822 19.9131 32.7822C19.275 32.7832 18.6457 32.6313 18.0759 32.3388C18.822 33.3357 20.0004 33.9791 21.3266 33.9791C23.5772 33.9791 25.4025 32.1255 25.4104 29.836V10.197L28.9288 10.1969ZM21.1528 20.7497V19.6356C20.7468 19.5792 20.3376 19.5509 19.9279 19.551C14.997 19.551 11 23.62 11 28.6391C11 31.7859 12.5709 34.5592 14.958 36.1904C13.3836 34.552 12.4135 32.3095 12.4135 29.8359C12.4135 24.8808 16.3089 20.8516 21.1528 20.7497Z" fill="#00F2EA"/>
                                        </g>
                                        <defs>
                                        <clipPath id="clip0_3708_25">
                                        <rect width="26" height="30" fill="white" transform="translate(11 9)"/>
                                        </clipPath>
                                        </defs>
                                    </svg>
                                </a>
                            </li>
                            <?php endif; ?>

                            <?php if(get_field('youtube', 'option')): ?>
                            <li class="social__item">
                                <a href="<?php echo get_field('youtube', 'option'); ?>">
                                    <svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="24" cy="24" r="24" fill="white"/>
                                        <g clip-path="url(#clip0_3708_26)">
                                        <path d="M38.3374 16.2754C38.1654 15.6423 37.8297 15.0652 37.3639 14.6014C36.8981 14.1376 36.3183 13.8034 35.6824 13.6321C33.3544 13 23.9848 13 23.9848 13C23.9848 13 14.6147 13.0191 12.2867 13.6512C11.6507 13.8226 11.071 14.1568 10.6052 14.6206C10.1394 15.0844 9.80372 15.6616 9.63166 16.2947C8.92748 20.4128 8.65432 26.6878 9.651 30.6412C9.82307 31.2743 10.1587 31.8514 10.6246 32.3152C11.0904 32.779 11.6701 33.1131 12.306 33.2845C14.634 33.9166 24.0039 33.9166 24.0039 33.9166C24.0039 33.9166 33.3736 33.9166 35.7015 33.2845C36.3375 33.1132 36.9172 32.779 37.3831 32.3152C37.8489 31.8514 38.1846 31.2743 38.3567 30.6412C39.0994 26.5172 39.3283 20.2461 38.3374 16.2754Z" fill="#FF0000"/>
                                        <path d="M21.0024 27.9403L28.7753 23.4582L21.0024 18.9761V27.9403Z" fill="white"/>
                                        </g>
                                        <defs>
                                        <clipPath id="clip0_3708_26">
                                        <rect width="30" height="21" fill="white" transform="translate(9 13)"/>
                                        </clipPath>
                                        </defs>
                                    </svg>
                                </a>
                            </li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
                <div class="contacts__map">
                    <?echo get_field('google_map', 'option'); ?>
                </div>
            </div>
        </div>
    </section>

    <?php echo do_shortcode('[consultation_section]'); ?>
</main>

<?php get_footer() ?>