document.addEventListener('DOMContentLoaded', function () {
    const filterCategories = document.getElementById('filter-categories');
    const filterFormats = document.getElementById('filter-formats');
    const sortOrder = document.getElementById('sort-order');
    const loadMoreButton = document.getElementById('load-more');
    let currentPage = 1;
    let maxPages = wpPhotoData.maxPages;

    function applyFilters() {
        const category = filterCategories ? filterCategories.value : '';
        const format = filterFormats ? filterFormats.value : '';
        const order = sortOrder ? sortOrder.value : 'desc';

        const request = new XMLHttpRequest();
        request.open('GET', wpPhotoData.ajaxUrl + '?action=filter_photos&category=' + category + '&format=' + format + '&order=' + order, true);

        request.onload = function () {
            if (this.status >= 200 && this.status < 400) {
                const response = this.responseText;
                const photoGrid = document.getElementById('photo-grid');
                if (photoGrid) {
                    photoGrid.innerHTML = response;
                }

                // Màj maxPages selon les résultats
                const parser = new DOMParser();
                const doc = parser.parseFromString(response, 'text/html');
                maxPages = parseInt(doc.querySelector('#max-pages').textContent, 10);

                // Affiche le btn "charger plus" si + d'une page
                if (isNaN(maxPages) || maxPages <= 1) {
                    if (loadMoreButton) {
                        loadMoreButton.style.display = 'none';
                    }
                } else {
                    if (loadMoreButton) {
                        loadMoreButton.style.display = 'block';
                    }
                }
            }
        };

        request.send();
    }

    if (filterCategories) {
        filterCategories.addEventListener('change', applyFilters);
    }

    if (filterFormats) {
        filterFormats.addEventListener('change', applyFilters);
    }

    if (sortOrder) {
        sortOrder.addEventListener('change', applyFilters);
    }
});
