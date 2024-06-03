document.addEventListener('DOMContentLoaded', function () {
    const loadMoreButton = document.getElementById('load-more');
    const filterCategories = document.getElementById('filter-categories');
    const filterFormats = document.getElementById('filter-formats');
    const sortOrder = document.getElementById('sort-order');
    let currentPage = 1;
    let maxPages = parseInt(document.querySelector('#max-pages').textContent, 10);

    function resetPagination() {
        currentPage = 1;
        maxPages = parseInt(document.querySelector('#max-pages').textContent, 10);
        if (loadMoreButton) {
            loadMoreButton.style.display = 'block'; // Reset button visibility
        }
    }

    if (loadMoreButton) {
        loadMoreButton.addEventListener('click', function () {
            console.log('Load more button clicked');
            console.log('Current page: ' + currentPage + ', Max pages: ' + maxPages);
            if (currentPage < maxPages) {
                currentPage++;
                loadMorePhotos(currentPage);
            } else {
                loadMoreButton.style.display = 'none';
            }
        });
    }

    function loadMorePhotos(page) {
        console.log('Loading more photos for page: ' + page);
        const category = filterCategories ? filterCategories.value : '';
        const format = filterFormats ? filterFormats.value : '';
        const order = sortOrder ? sortOrder.value : 'desc';

        const request = new XMLHttpRequest();
        request.open('GET', wpPhotoData.ajaxUrl + '?action=load_more_photos&page=' + page + '&category=' + category + '&format=' + format + '&order=' + order, true);

        request.onload = function () {
            if (this.status >= 200 && this.status < 400) {
                const response = this.responseText;
                const photoGrid = document.getElementById('photos-grid');
                const initialPhotoCount = photoGrid.querySelectorAll('.photo-item').length;


                const tempDiv = document.createElement('div');
                tempDiv.innerHTML = response;
                const newPhotos = tempDiv.querySelectorAll('.photo-item');
                newPhotos.forEach(photo => {
                    photoGrid.appendChild(photo);
                });

                const newPhotoCount = photoGrid.querySelectorAll('.photo-item').length;

                console.log('Initial photo count: ' + initialPhotoCount);
                console.log('New photo count: ' + newPhotoCount);

                // Check si nouvelle photo
                if (initialPhotoCount === newPhotoCount) {
                    loadMoreButton.style.display = 'none';
                }

                // Check nb max de page atteint
                const newMaxPages = parseInt(tempDiv.querySelector('#max-pages').textContent, 10);
                if (isNaN(newMaxPages) || currentPage >= newMaxPages) {
                    loadMoreButton.style.display = 'none';
                } else {
                    maxPages = newMaxPages;
                }
            } else {
                console.error('Failed to load more photos');
            }
        };

        request.onerror = function () {
            console.error('Request error');
        };

        request.send();
    }

    // recharge si les filtres ont changés
    if (filterCategories) {
        filterCategories.addEventListener('change', function () {
            resetPagination();
            applyFilters();
        });
    }

    if (filterFormats) {
        filterFormats.addEventListener('change', function () {
            resetPagination();
            applyFilters();
        });
    }

    if (sortOrder) {
        sortOrder.addEventListener('change', function () {
            resetPagination();
            applyFilters();
        });
    }

    function applyFilters() {
        const category = filterCategories ? filterCategories.value : '';
        const format = filterFormats ? filterFormats.value : '';
        const order = sortOrder ? sortOrder.value : 'desc';

        const request = new XMLHttpRequest();
        request.open('GET', wpPhotoData.ajaxUrl + '?action=filter_photos&category=' + category + '&format=' + format + '&order=' + order, true);

        request.onload = function () {
            if (this.status >= 200 && this.status < 400) {
                const response = this.responseText;
                const photoGrid = document.getElementById('photos-grid');
                if (photoGrid) {
                    photoGrid.innerHTML = response;
                }

                // Maj maxPages selon résultats filtrés
                const parser = new DOMParser();
                const doc = parser.parseFromString(response, 'text/html');
                maxPages = parseInt(doc.querySelector('#max-pages').textContent, 10);

                // Affiche le btn selon maxePages
                if (isNaN(maxPages) || maxPages <= 1) {
                    if (loadMoreButton) {
                        loadMoreButton.style.display = 'none';
                    }
                } else {
                    if (loadMoreButton) {
                        loadMoreButton.style.display = 'block';
                    }
                }
            } else {
                console.error('Failed to apply filters');
            }
        };

        request.onerror = function () {
            console.error('Request error');
        };

        request.send();
    }
});
