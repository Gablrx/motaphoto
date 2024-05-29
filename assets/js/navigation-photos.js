document.addEventListener("DOMContentLoaded", function () {
    var navPrevious = document.querySelector('.nav-previous');
    var navNext = document.querySelector('.nav-next');
    var photoPreview = document.querySelector('.photo-preview img');

    if (photoPreview) {
        var currentThumbnailURL = photoPreview.getAttribute('src');

        if (navPrevious) {
            var previousThumbnailURL = navPrevious.getAttribute('data-thumbnail');
            navPrevious.addEventListener('mouseover', function () {
                photoPreview.setAttribute('src', previousThumbnailURL);
            });
            navPrevious.addEventListener('mouseout', function () {
                photoPreview.setAttribute('src', currentThumbnailURL);
            });
        }

        if (navNext) {
            var nextThumbnailURL = navNext.getAttribute('data-thumbnail');
            navNext.addEventListener('mouseover', function () {
                photoPreview.setAttribute('src', nextThumbnailURL);
            });
            navNext.addEventListener('mouseout', function () {
                photoPreview.setAttribute('src', currentThumbnailURL);
            });
        }
    }
});
