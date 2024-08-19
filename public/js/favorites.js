// Check if the user is logged in when clicking on the favorite button. If not, display a message else submit the form.
document.addEventListener('DOMContentLoaded', function() {
    function handleFavoriteClick(event) {
        const button = event.currentTarget;
        const isLoggedIn = button.getAttribute('data-logged-in') === 'true';

        if (!isLoggedIn) {
            event.preventDefault();
            document.getElementById('login-message').classList.remove('hidden');
        }
    }

    document.querySelectorAll('.movie__favorite').forEach(button => {
        button.addEventListener('click', handleFavoriteClick);
    });

    function closeLoginMessage() {
        document.getElementById('login-message').classList.add('hidden');
    }

    document.querySelectorAll('.close-login-message').forEach(button => {
        button.addEventListener('click', closeLoginMessage);
    });
});

// Add a favorite without reloading the page
document.addEventListener('DOMContentLoaded', function() {
    const favoriteForms = document.querySelectorAll('.favorite-form');

    favoriteForms.forEach(form => {
        form.addEventListener('submit', function(event) {
            event.preventDefault();

            const formData = new FormData(form);
            const button = form.querySelector('button');
            const icon = button.querySelector('i');

            fetch(form.action, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'X-CSRF-TOKEN': formData.get('_token')
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    if (data.isFavorited) {
                        icon.classList.remove('bi-bookmark-plus');
                        icon.classList.add('bi-bookmark-x-fill');
                    } else {
                        icon.classList.remove('bi-bookmark-x-fill');
                        icon.classList.add('bi-bookmark-plus');
                    }
                } else {
                    alert(data.message);
                }
            })
            .catch(error => console.error('Erreur:', error));
        });
    });

    window.addEventListener('load', function() {
        const scrollPosition = sessionStorage.getItem('scrollPosition');
        if (scrollPosition !== null) {
            window.scrollTo(0, parseInt(scrollPosition, 10));
            sessionStorage.removeItem('scrollPosition');
        }
    });
});
