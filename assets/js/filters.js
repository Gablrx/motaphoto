// filters.js
document.addEventListener('DOMContentLoaded', function () {
    var filterForm = document.getElementById('filters');
    var page = 1; // Page initiale
    filterForm.addEventListener('change', function () {
        page = 1; // Réinitialiser la pagination lors d'un changement de filtre
        loadPhotos();
    });

    document.getElementById('more_photos').addEventListener('click', function () {
        page++;
        loadPhotos();
    });

    function loadPhotos() {
        var formData = new FormData(filterForm);
        formData.append('action', 'myfilter');
        formData.append('page', page); // Envoyer la page courante

        fetch(myScriptData.ajaxurl, {
            method: 'POST',
            body: formData
        }).then(response => response.text())
            .then(data => {
                if (page === 1) {
                    document.querySelector('.photo-grid').innerHTML = data;
                } else {
                    document.querySelector('.photo-grid').insertAdjacentHTML('beforeend', data);
                }
            }).catch(error => console.error('Error:', error));
    }
}); 