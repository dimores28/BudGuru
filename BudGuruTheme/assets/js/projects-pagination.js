document.addEventListener('DOMContentLoaded', function() {
    const container = document.getElementById('projects-container');
    const pagination = document.querySelector('.projects__pagination');
    
    if(!pagination) return;

    pagination.addEventListener('click', function(e) {
        e.preventDefault();
        
        if(e.target.closest('a')) {
            const pageLink = e.target.closest('a');
            const page = pageLink.dataset.page;
            
            if(pageLink.classList.contains('disabled')) return;
            
            // Створюємо об'єкт FormData
            const formData = new FormData();
            formData.append('action', 'load_projects');
            formData.append('page', page);

            // Відправляємо запит
            fetch(ajaxurl, {
                method: 'POST',
                body: formData
            })
            .then(response => response.text())
            .then(data => {
                // Оновлюємо контент
                container.innerHTML = data;
                
                // Оновлюємо активну сторінку
                document.querySelectorAll('.pagination__item').forEach(item => {
                    item.classList.remove('active');
                    if(item.querySelector('a').dataset.page === page) {
                        item.classList.add('active');
                    }
                });
                
                // Оновлюємо стан кнопок prev/next
                const maxPages = pagination.dataset.maxPages;
                const prev = pagination.querySelector('.pagination__prev');
                const next = pagination.querySelector('.pagination__next');
                
                prev.dataset.page = page > 1 ? page - 1 : 1;
                next.dataset.page = page < maxPages ? Number(page) + 1 : maxPages;
                
                // Використовуємо клас замість атрибута
                prev.classList.toggle('disabled', page <= 1);
                next.classList.toggle('disabled', page >= maxPages);
                
                // Прокручуємо до початку секції
                container.scrollIntoView({ behavior: 'smooth' });
            });
        }
    });
});