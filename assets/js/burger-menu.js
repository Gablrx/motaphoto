document.addEventListener('DOMContentLoaded', function () {
    var hamburger = document.querySelector('.hamburger-menu');
    var nav = document.querySelector('.site-navigation');

    hamburger.addEventListener('click', function () {
        var expanded = this.getAttribute('aria-expanded') === 'true';
        this.setAttribute('aria-expanded', !expanded);
        nav.classList.toggle('is-active');
    });
});