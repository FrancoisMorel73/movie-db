document.addEventListener('DOMContentLoaded', () => {
    const menuToggle = document.getElementById('menu-toggle');
    const mobileMenu = document.getElementById('mobile-menu');
    const menuClose = document.getElementById('menu-close');

    if (menuToggle) {
        menuToggle.addEventListener('click', () => {
            mobileMenu.classList.remove('hidden');
        });
    }

    if (menuClose) {
        menuClose.addEventListener('click', () => {
            mobileMenu.classList.add('hidden');
        });
    }

    // close mobile menu when clicking outside of it
    window.addEventListener('click', (e) => {
        if (e.target === mobileMenu) {
            mobileMenu.classList.add('hidden');
        }
    });
});
