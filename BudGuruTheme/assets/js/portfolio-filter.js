document.addEventListener('DOMContentLoaded', function() {
    const filters = document.querySelectorAll('.work-performed__filters_link');
    const grid = document.getElementById('portfolio-grid');

    filters.forEach(filter => {
        filter.addEventListener('click', function(e) {
            e.preventDefault();
            
            // Видаляємо active клас з усіх фільтрів
            filters.forEach(f => f.classList.remove('active'));
            // Додаємо active клас поточному фільтру
            this.classList.add('active');

            const category = this.dataset.category;

            // Додаємо клас для анімації завантаження
            grid.classList.add('loading');

            // Відправляємо AJAX запит
            fetch(portfolio_ajax.ajax_url, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: new URLSearchParams({
                    action: 'filter_portfolio',
                    category: category,
                    nonce: portfolio_ajax.nonce
                })
            })
            .then(response => response.text())
            .then(html => {
                grid.innerHTML = html;
                grid.classList.remove('loading');
            })
            .catch(error => {
                console.error('Error:', error);
                grid.classList.remove('loading');
            });
        });
    });
});