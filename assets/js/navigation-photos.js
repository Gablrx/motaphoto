document.addEventListener("DOMContentLoaded", function () {
    var navPrevious = document.querySelector('.nav-previous');
    var navNext = document.querySelector('.nav-next');
    var photoPreview = document.querySelector('.photo-preview img');
    var currentThumbnailURL = photoPreview.getAttribute('src');

    var previousThumbnailURL = navPrevious.getAttribute('data-thumbnail');
    var nextThumbnailURL = navNext.getAttribute('data-thumbnail');

    navPrevious.addEventListener('mouseover', function () {
        photoPreview.setAttribute('src', previousThumbnailURL);
    });

    navNext.addEventListener('mouseover', function () {
        photoPreview.setAttribute('src', nextThumbnailURL);
    });
});
