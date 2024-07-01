// assets/js/lightbox.js
document.addEventListener('DOMContentLoaded', function () {
    const lightbox = document.getElementById('photo-lightbox');
    const lightboxImg = document.getElementById('lightbox-img');
    const lightboxTitle = document.getElementById('lightbox-title');
    const lightboxCat = document.getElementById('lightbox-category');
    const closeBtn = document.querySelector('.lightbox .close');
    const prevBtn = document.querySelector('.lightbox-prev');
    const nextBtn = document.querySelector('.lightbox-next');
    let currentPhotoIndex = -1;
    let photos = [];

    // Fonction pour ouvrir la lightbox
    function openLightbox(event) {
        const target = event.target.closest('.open-lightbox');
        if (target) {
            photos = document.querySelectorAll('.open-lightbox');
            currentPhotoIndex = Array.from(photos).indexOf(target);
            updateLightbox();
            lightbox.style.display = 'block';
        }
    }

    // Fonction pour mettre à jour la lightbox
    function updateLightbox() {
        const photo = photos[currentPhotoIndex];
        lightboxImg.src = photo.getAttribute('data-img');
        lightboxTitle.textContent = photo.getAttribute('data-title');
        lightboxCat.textContent = photo.getAttribute('data-cat');
    }

    // Attacher l'événement click à l'élément parent pour front-page et single-photo
    document.querySelectorAll('#photos-grid, .single-photo').forEach(grid => {
        grid.addEventListener('click', openLightbox);
    });

    // Fermer la lightbox
    closeBtn.addEventListener('click', function () {
        lightbox.style.display = 'none';
    });

    // Navigation dans la lightbox
    prevBtn.addEventListener('click', function () {
        currentPhotoIndex = (currentPhotoIndex > 0) ? currentPhotoIndex - 1 : photos.length - 1;
        updateLightbox();
    });

    nextBtn.addEventListener('click', function () {
        currentPhotoIndex = (currentPhotoIndex < photos.length - 1) ? currentPhotoIndex + 1 : 0;
        updateLightbox();
    });
});