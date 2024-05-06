/* contact-modal.js */

// Une fois que le DOM est entièrement chargé :
document.addEventListener('DOMContentLoaded', function () {


    const openModalButtons = document.querySelectorAll('.open-contact-modal'); // Tous les elmts qui ouvrent la modale de contact
    const contactModal = document.getElementById('contactModal'); // La fenêtre de la modale

    openModalButtons.forEach(button => { // Pour chaque bouton 
        button.addEventListener('click', function () {
            const refPhoto = this.getAttribute('data-ref-photo'); // Récupére la valeur 'data-ref-photo' stockée dans l'attribut du bouton.
            const refPhotoField = document.querySelector('input[name="ref-photo"]'); // Champ du form pour la réf de la photo.

            if (refPhotoField) { // Si le champ réf-photo existe
                refPhotoField.value = refPhoto; // Rempli le champ avec la réf de la photo

                if (button.classList.contains('autoFilledRefPhoto')) {  // Si le btn cliqué a la classe 'autoFilledRefPhoto' (donc n'est pas le btn du header)
                    refPhotoField.disabled = true; // Désactive le champ pour le rendre non modifiable
                } else {
                    refPhotoField.disabled = false; // Sinon, le champ du header reste modifiable
                }
            }
            contactModal.style.display = 'block'; // Afficher la modale de contact.
        });
    });

    // Si l'utilisateur clique en dehors du form, fermer la modale
    window.onclick = function (event) {
        if (event.target === contactModal) {
            contactModal.style.display = 'none';
        }
    };
});