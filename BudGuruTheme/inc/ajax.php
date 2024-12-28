<?php
//--------------------------------------------------------------//
// Реєструємо скрипт
function register_portfolio_filter_script() {
    wp_enqueue_script(
        'portfolio-filter', 
        get_template_directory_uri() . '/assets/js/portfolio-filter.js', 
        array(), 
        '1.0', 
        true
    );

    // Передаємо необхідні дані в JavaScript
    wp_localize_script('portfolio-filter', 'portfolio_ajax', array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('portfolio_filter_nonce')
    ));
}
add_action('wp_enqueue_scripts', 'register_portfolio_filter_script');

// Обробник AJAX запиту
function filter_portfolio() {
    check_ajax_referer('portfolio_filter_nonce', 'nonce');

    $category = isset($_POST['category']) ? sanitize_text_field($_POST['category']) : '';
    
    $args = array(
        'category' => $category
    );
    
    $portfolios = getPortfolio($args);
    
    ob_start();
    $i = 1;
    foreach($portfolios as $portfolio): ?>
        <div class="work__card <?php echo "work__card_". $i ; ?>">
            <a href="<?php echo $portfolio['link']; ?>" class="work__link">
                <svg width="20" height="18" viewBox="0 0 20 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M18.4246 0.815076L1.32621 16.9364M18.4246 0.815076L18.3726 14.5843M18.4246 0.815076L3.82081 0.864076" stroke="#1E1E1E" stroke-width="1.58" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </a>
            <div class="work__text">
                <h4 class="work__title">
                    <?php echo $portfolio['title']; ?>
                </h4>
            </div>
            <img src="<?php echo $portfolio['img']; ?>" class="work__bg-img" alt="Дизайн">
            <img src="<?php echo $portfolio['mobile_thumbnail']; ?>" class="work__bg-mobile" alt="Дизайн">
        </div>
    <?php $i++; endforeach;
    
    $html = ob_get_clean();
    echo $html;
    die();
}
add_action('wp_ajax_filter_portfolio', 'filter_portfolio');
add_action('wp_ajax_nopriv_filter_portfolio', 'filter_portfolio');


//--------------------------------------------------------------//
function register_portfolio_scripts() {
    // Реєструємо скрипт пагінації
    wp_register_script(
        'portfolio-pagination', 
        get_template_directory_uri() . '/assets/js/portfolio-pagination.js', 
        array('jquery'), 
        '1.0', 
        true
    );

    // Передаємо необхідні дані в JavaScript
    wp_localize_script('portfolio-pagination', 'portfolio_ajax', array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'nonce'    => wp_create_nonce('portfolio_filter_nonce')
    ));

    // Підключаємо скрипт тільки на потрібних сторінках
    if (is_post_type_archive('portfolio') || is_tax('portfolio_category')) {
        wp_enqueue_script('portfolio-pagination');
    }
}
add_action('wp_enqueue_scripts', 'register_portfolio_scripts');

function load_portfolio_ajax() {
    check_ajax_referer('portfolio_filter_nonce', 'nonce');

    $page = isset($_POST['page']) ? intval($_POST['page']) : 1;
    $category = isset($_POST['category']) ? sanitize_text_field($_POST['category']) : '';
    
    $portfolio_data = getPortfolioWithPagination([
        'paged' => $page,
        'category' => $category
    ]);

    ob_start();
    $i = 1;
    foreach($portfolio_data['projects'] as $portfolio): ?>
        <div class="work__card <?php echo "work__card_". $i ; ?>">
            <a href="<?php echo $portfolio['link']; ?>" class="work__link">
                <svg width="20" height="18" viewBox="0 0 20 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M18.4246 0.815076L1.32621 16.9364M18.4246 0.815076L18.3726 14.5843M18.4246 0.815076L3.82081 0.864076" stroke="#1E1E1E" stroke-width="1.58" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </a>
            <div class="work__text">
                <h4 class="work__title">
                    <?php echo $portfolio['title']; ?>
                </h4>
            </div>
            <img src="<?php echo $portfolio['img']; ?>" class="work__bg-img" alt="Дизайн">
            <img src="<?php echo $portfolio['mobile_thumbnail']; ?>" class="work__bg-mobile" alt="Дизайн">
        </div>
    <?php $i++; endforeach;
    $html = ob_get_clean();

    wp_send_json([
        'html' => $html,
        'current_page' => $portfolio_data['current_page'],
        'max_pages' => $portfolio_data['max_pages']
    ]);
}

add_action('wp_ajax_load_portfolio', 'load_portfolio_ajax');
add_action('wp_ajax_nopriv_load_portfolio', 'load_portfolio_ajax');

//--------------------------------------------------------------//