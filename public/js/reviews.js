// Complete update review modal with content and rating
document.addEventListener('DOMContentLoaded', function () {
    function openModal(reviewId, content, rating) {
        const form = document.getElementById('update-form');
        form.action = `/reviews/${reviewId}`;

        document.getElementById('contentField').value = content;
        document.getElementById('ratingField').value = rating;

        document.getElementById('update-modal').classList.remove('hidden');
    }

    function closeModal() {
        document.getElementById('update-modal').classList.add('hidden');
    }

    document.querySelectorAll('.edit-review-button').forEach(button => {
        button.addEventListener('click', function () {
            const reviewId = button.getAttribute('data-id');
            const content = button.getAttribute('data-content');
            const rating = button.getAttribute('data-rating');
            openModal(reviewId, content, rating);
        });
    });

    document.querySelector('#update-modal .close').addEventListener('click', closeModal);

    window.addEventListener('click', function (event) {
        if (event.target === document.getElementById('update-modal')) {
            closeModal();
        }
    });
});

// Save the scroll position before reloading the page
window.addEventListener('beforeunload', function() {
    sessionStorage.setItem('scrollPosition', window.scrollY);
});

// Restore the scroll position after reloading the page
window.addEventListener('load', function() {
    const scrollPosition = sessionStorage.getItem('scrollPosition');
    if (scrollPosition !== null) {
        window.scrollTo(0, parseInt(scrollPosition, 10));
        sessionStorage.removeItem('scrollPosition');
    }
});

