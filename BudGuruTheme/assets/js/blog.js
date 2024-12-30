document.addEventListener('DOMContentLoaded', function() {
    const container = document.getElementById('blog-posts-container');
    const filters = document.querySelector('.blog__filters');
    const pagination = document.querySelector('.blog__pagination');
    
    if(!container) return;

    // Обробка фільтрів
    if(filters) {
        filters.addEventListener('click', function(e) {
            e.preventDefault();
            
            if(e.target.classList.contains('filters__item')) {
                const category = e.target.dataset.category;
                
                // Оновлюємо активний клас
                filters.querySelectorAll('.filters__item').forEach(item => {
                    item.classList.remove('active');
                });
                e.target.classList.add('active');
                
                // Відправляємо AJAX запит
                const formData = new FormData();
                formData.append('action', 'filter_posts');
                formData.append('category', category);

                fetch(ajaxurl, {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.text())
                .then(data => {
                    container.innerHTML = data;
                    
                    // Оновлюємо пагінацію якщо вона є
                    if(pagination) {
                        const maxPages = pagination.dataset.maxPages;
                        pagination.querySelector('.pagination__prev').classList.add('disabled');
                        pagination.querySelector('.pagination__next').classList.remove('disabled');
                        
                        const paginationList = pagination.querySelector('.pagination__list');
                        paginationList.querySelector('.active').classList.remove('active');
                        paginationList.querySelector('[data-page="1"]').parentElement.classList.add('active');
                    }
                });
            }
        });
    }

    // Обробка пагінації
    if(pagination) {
        pagination.addEventListener('click', function(e) {
            e.preventDefault();
            
            if(e.target.closest('a')) {
                const pageLink = e.target.closest('a');
                const page = pageLink.dataset.page;
                
                if(pageLink.classList.contains('disabled')) return;
                
                const category = filters ? 
                    filters.querySelector('.filters__item.active').dataset.category : 
                    'all';
                
                const formData = new FormData();
                formData.append('action', 'load_posts');
                formData.append('page', page);
                formData.append('category', category);

                fetch(ajaxurl, {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.text())
                .then(data => {
                    container.innerHTML = data;
                    
                    document.querySelectorAll('.pagination__item').forEach(item => {
                        item.classList.remove('active');
                        if(item.querySelector('a').dataset.page === page) {
                            item.classList.add('active');
                        }
                    });
                    
                    const maxPages = pagination.dataset.maxPages;
                    const prev = pagination.querySelector('.pagination__prev');
                    const next = pagination.querySelector('.pagination__next');
                    
                    prev.dataset.page = page > 1 ? page - 1 : 1;
                    next.dataset.page = page < maxPages ? Number(page) + 1 : maxPages;
                    
                    prev.classList.toggle('disabled', page <= 1);
                    next.classList.toggle('disabled', page >= maxPages);
                    
                    container.scrollIntoView({ behavior: 'smooth' });
                });
            }
        });
    }
}); 