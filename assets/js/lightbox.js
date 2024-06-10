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

    document.querySelectorAll('.open-lightbox').forEach((element, index) => {
        element.addEventListener('click', function () {
            const imgSrc = this.getAttribute('data-img');
            const title = this.getAttribute('data-title');
            const cat = this.getAttribute('data-cat');
            currentPhotoIndex = index;
            photos = document.querySelectorAll('.open-lightbox');

            lightboxImg.src = imgSrc;
            lightboxTitle.textContent = title;
            lightboxCat.textContent = cat;
            lightbox.style.display = 'block';
        });
    });

    closeBtn.addEventListener('click', function () {
        lightbox.style.display = 'none';
    });

    prevBtn.addEventListener('click', function () {
        currentPhotoIndex = (currentPhotoIndex > 0) ? currentPhotoIndex - 1 : photos.length - 1;
        updateLightbox();
    });

    nextBtn.addEventListener('click', function () {
        currentPhotoIndex = (currentPhotoIndex < photos.length - 1) ? currentPhotoIndex + 1 : 0;
        updateLightbox();
    });

    function updateLightbox() {
        const photo = photos[currentPhotoIndex];
        const imgSrc = photo.getAttribute('data-img');
        const title = photo.getAttribute('data-title');
        const cat = photo.getAttribute('data-cat');

        lightboxImg.src = imgSrc;
        lightboxTitle.textContent = title;
        lightboxCat.textContent = cat;
    }

    window.addEventListener('click', function (event) {
        if (event.target == lightbox) {
            lightbox.style.display = 'none';
        }
    });
});
