document.addEventListener('DOMContentLoaded', function() {
    const likeButtons = document.querySelectorAll('.post-like-button');
    
    likeButtons.forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            
            const postId = this.dataset.postId;
            const likeCount = this.querySelector('.like-count');
            const likeIcon = this.querySelector('.like-icon');
            
            fetch(budguruAjax.ajaxurl, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: `action=like_post&post_id=${postId}&nonce=${budguruAjax.nonce}`
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    likeCount.textContent = data.data.likes;
                    if (data.data.liked) {
                        button.classList.add('liked');
                    } else {
                        button.classList.remove('liked');
                    }
                }
            });
        });
    });
}); 