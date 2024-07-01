/* filters.js */
document.addEventListener('DOMContentLoaded', function () {
    // Sélectionne les éléments DOM pour les filtres et le bouton de chargement
    const loadMoreButton = document.getElementById('load-more');

    // Variables pour la pagination
    let currentPage = 1;
    let maxPages = parseInt(document.querySelector('#max-pages').textContent, 10);

    // Fonction pour appliquer les filtres
    function applyFilters() {
        const category = jQuery('#filter-categories').val();
        const format = jQuery('#filter-formats').val();
        const order = jQuery('#sort-order').val();
        currentPage = 1;

        // Envoie une requête AJAX pour récupérer les photos filtrées
        fetchPhotos('filter_photos', category, format, order, 1);
    }

    // Fonction pour charger plus de photos
    function loadMorePhotos() {
        const category = jQuery('#filter-categories').val();
        const format = jQuery('#filter-formats').val();
        const order = jQuery('#sort-order').val();

        // Envoie une requête AJAX pour charger plus de photos
        fetchPhotos('load_more_photos', category, format, order, ++currentPage);
    }

    // Fonction pour envoyer une requête AJAX
    function fetchPhotos(action, category, format, order, page) {
        const xhr = new XMLHttpRequest();
        xhr.open('GET', `${wpPhotoData.ajaxUrl}?action=${action}&category=${category}&format=${format}&order=${order}&page=${page}`, true);
        xhr.onload = function () {
            if (this.status >= 200 && this.status < 400) {
                const response = this.responseText;
                const photoGrid = document.getElementById('photos-grid');

                if (action === 'filter_photos') {
                    // Remplace le contenu du grille de photos par les nouvelles photos filtrées
                    photoGrid.innerHTML = response;
                } else {
                    // Ajoute les nouvelles photos à la fin de la grille
                    const tempDiv = document.createElement('div');
                    tempDiv.innerHTML = response;
                    photoGrid.append(...tempDiv.children);
                }

                // Met à jour le nombre maximal de pages et le bouton "Charger plus"
                updateMaxPages(response);
                updateLoadMoreButton();

                // Réattache les événements de la lightbox
                reattachLightboxEvents();
            }
        };
        xhr.send();
    }

    // Fonction pour mettre à jour le nombre maximal de pages
    function updateMaxPages(response) {
        const tempDiv = document.createElement('div');
        tempDiv.innerHTML = response;
        maxPages = parseInt(tempDiv.querySelector('#max-pages').textContent, 10);
    }

    // Fonction pour mettre à jour l'affichage du bouton "Charger plus"
    function updateLoadMoreButton() {
        if (currentPage >= maxPages) {
            loadMoreButton.style.display = 'none';
        } else {
            loadMoreButton.style.display = 'block';
        }
    }

    // Fonction pour réattacher les événements de la lightbox
    function reattachLightboxEvents() {
        const event = new CustomEvent('updateLightboxEvents');
        document.dispatchEvent(event);
    }

    // Attache des événements aux filtres et au bouton "Charger plus" en utilisant jQuery pour Select2
    jQuery('#filter-categories').on('change', applyFilters);
    jQuery('#filter-formats').on('change', applyFilters);
    jQuery('#sort-order').on('change', applyFilters);
    loadMoreButton.addEventListener('click', loadMorePhotos);

    // Réattache initialement les événements de la lightbox
    reattachLightboxEvents();
});
