document.addEventListener('DOMContentLoaded', function () {
    const filterCategories = document.getElementById('filter-categories');
    const filterFormats = document.getElementById('filter-formats');
    const sortOrder = document.getElementById('sort-order');
    const loadMoreButton = document.getElementById('load-more');
    let currentPage = 1;
    let maxPages = parseInt(document.querySelector('#max-pages').textContent, 10);

    function applyFilters() {
        const category = filterCategories ? filterCategories.value : '';
        const format = filterFormats ? filterFormats.value : '';
        const order = sortOrder ? sortOrder.value : 'desc';

        sendAjaxRequest('filter_photos', category, format, order, 1, function (response) {
            const photoGrid = document.getElementById('photos-grid');
            if (photoGrid) {
                photoGrid.innerHTML = response;
            }

            updateMaxPages(response);

            // Reset pagination
            resetPagination();
        });
    }

    function loadMorePhotos(page) {
        const category = filterCategories ? filterCategories.value : '';
        const format = filterFormats ? filterFormats.value : '';
        const order = sortOrder ? sortOrder.value : 'desc';

        sendAjaxRequest('load_more_photos', category, format, order, page, function (response) {
            const photoGrid = document.getElementById('photos-grid');
            const tempDiv = document.createElement('div');
            tempDiv.innerHTML = response;
            const newPhotos = tempDiv.querySelectorAll('.photo-item');
            newPhotos.forEach(photo => {
                photoGrid.appendChild(photo);
            });

            updateMaxPages(response);
        });
    }

    function sendAjaxRequest(action, category, format, order, page, callback) {
        const request = new XMLHttpRequest();
        request.open('GET', wpPhotoData.ajaxUrl + `?action=${action}&category=${category}&format=${format}&order=${order}&page=${page}`, true);

        request.onload = function () {
            if (this.status >= 200 && this.status < 400) {
                const response = this.responseText;
                callback(response);
            } else {
                console.error('Failed to send AJAX request');
            }
        };

        request.onerror = function () {
            console.error('Request error');
        };

        request.send();
    }

    function updateMaxPages(response) {
        const parser = new DOMParser();
        const doc = parser.parseFromString(response, 'text/html');
        maxPages = parseInt(doc.querySelector('#max-pages').textContent, 10);

        if (isNaN(maxPages) || maxPages <= 1 || currentPage >= maxPages) {
            if (loadMoreButton) {
                loadMoreButton.style.display = 'none';
            }
        } else {
            if (loadMoreButton) {
                loadMoreButton.style.display = 'block';
            }
        }
    }

    function resetPagination() {
        currentPage = 1;
        maxPages = parseInt(document.querySelector('#max-pages').textContent, 10);
        if (loadMoreButton) {
            loadMoreButton.style.display = 'block';
        }
    }

    if (loadMoreButton) {
        loadMoreButton.addEventListener('click', function () {
            if (currentPage < maxPages) {
                currentPage++;
                loadMorePhotos(currentPage);
            } else {
                loadMoreButton.style.display = 'none';
            }
        });
    }

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
});
