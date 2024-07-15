<?php

// Récupére l'URL d'une photo aléatoire au format paysage. 
function get_random_photo()
{
    $randomPhoto = array(
        'post_type' => 'photo', // CPT 'photo'
        'tax_query' => array( // Uniquement le format 'paysage'
            array(
                'taxonomy' => 'photo_formats',
                'field'    => 'slug', // 
                'terms'    => 'paysage',
            ),
        ),
        'orderby' => 'rand', // Tri aléatoire
        'posts_per_page' => 1, // Une seule photo
    );

    $query = new WP_Query($randomPhoto);
    if ($query->have_posts()) { // Vérifie s'il y a des posts correspondants à la requête
        $query->the_post();
        $photo_url = get_the_post_thumbnail_url(get_the_ID(), 'full'); // Récupère l'URL de la photo taille full
        wp_reset_postdata(); // Réinitialise les données
        return $photo_url; // retourne l'url de la photo
    }
    return false; // Si pas de photo ttrouvée retourne false
}
