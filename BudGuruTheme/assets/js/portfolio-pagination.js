document.addEventListener('DOMContentLoaded', function() {
    const grid = document.getElementById('portfolio-grid');
    const pagination = document.querySelector('.work-performed__pagination');
    const filters = document.querySelectorAll('.work-performed__filters_link');
    
    if(!grid || !pagination) return;

    // Обробка кліків по пагінації
    pagination.addEventListener('click', function(e) {
        e.preventDefault();
        
        if(!e.target.dataset.page) return;
        
        const page = e.target.dataset.page;
        const category = document.querySelector('.work-performed__filters_link.active').dataset.category;
        
        loadPortfolio(page, category);
    });

    // Обробка кліків по фільтрах
    filters.forEach(filter => {
        filter.addEventListener('click', function(e) {
            e.preventDefault();
            
            filters.forEach(f => f.classList.remove('active'));
            this.classList.add('active');
            
            loadPortfolio(1, this.dataset.category);
        });
    });

    function loadPortfolio(page, category) {
        grid.classList.add('loading');

        fetch(portfolio_ajax.ajax_url, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: new URLSearchParams({
                action: 'load_portfolio',
                page: page,
                category: category,
                nonce: portfolio_ajax.nonce
            })
        })
        .then(response => response.json())
        .then(data => {
            grid.innerHTML = data.html;
            updatePagination(data.current_page, data.max_pages);
            grid.classList.remove('loading');
            
            // Прокручуємо до початку сітки
            grid.scrollIntoView({ behavior: 'smooth' });
        })
        .catch(error => {
            console.error('Error:', error);
            grid.classList.remove('loading');
        });
    }

    function updatePagination(currentPage, maxPages) {
        const list = pagination.querySelector('.pagination__list');
        const prev = pagination.querySelector('.pagination__prev');
        const next = pagination.querySelector('.pagination__next');
        
        // Оновлюємо номери сторінок
        let html = '';
        for(let i = 1; i <= maxPages; i++) {
            html += `<li class="pagination__item">
                        <a href="#" data-page="${i}" class="${i == currentPage ? 'active' : ''}">${i}</a>
                    </li>`;
        }
        list.innerHTML = html;

        // Оновлюємо кнопки prev/next
        prev.dataset.page = Math.max(1, currentPage - 1);
        next.dataset.page = Math.min(maxPages, currentPage + 1);
    }
}); 