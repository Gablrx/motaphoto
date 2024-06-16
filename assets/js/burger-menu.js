/* burger-menu.js */
// JavaScript
document.addEventListener('DOMContentLoaded', function () {
    const burgerMenu = document.querySelector('.burger-menu');
    const mobileMenu = document.querySelector('.mobile-menu');

    burgerMenu.addEventListener('click', function () {
        const isExpanded = burgerMenu.getAttribute('aria-expanded') === 'true';
        burgerMenu.setAttribute('aria-expanded', !isExpanded);
        mobileMenu.classList.toggle('active');
        burgerMenu.classList.toggle('open');
    });
});
