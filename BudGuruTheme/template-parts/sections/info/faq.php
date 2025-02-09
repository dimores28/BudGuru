<?php
// Перевіряємо чи є взагалі рядки в повторювачі
if(have_rows('faq_question')):
?>
    <section class="faq" aria-label="<?php _e('Часті запитання', 'budguru'); ?>">
        <div class="faq__container">
            <h3 class="faq__heading h2">
                <span><?php _e('Відповіді', 'budguru'); ?></span> <?php _e('на найчастіші запитання', 'budguru'); ?>
            </h3>

            <div class="faq__wrapp">
                <div data-spollers 
                     data-one-spoller 
                     class="faq__spollers spollers"
                     role="region"
                     aria-label="<?php _e('Часті запитання', 'budguru'); ?>">
                    <?php
                    while(have_rows('faq_question')): the_row();
                        $question = get_sub_field('question');
                        $answer = get_sub_field('answer');
                    ?>
                        <details class="spollers__item">
                            <summary class="spollers__title" role="button">
                                <?php echo esc_html($question); ?>
                            </summary>
                            <div class="spollers__body">
                                <p>
                                    <?php echo wp_kses_post($answer); ?>
                                </p>
                            </div>
                        </details>
                    <?php 
                    endwhile;
                    ?>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?> 