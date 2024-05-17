<!-- ajax-functions.php -->
<?php
// Sécurité pour éviter l'accès direct au fichier
if (!defined('ABSPATH')) {
    exit;
}

function filter_photos_function()
{
    $paged = !empty($_POST['page']) ? sanitize_text_field($_POST['page']) : 1;
    $args = [
        'post_type' => 'photo',
        'posts_per_page' => 8,
        'paged' => $paged,
        'orderby' => 'date'
    ];
    $tax_query = [];

    if (!empty($_POST['categoryfilter'])) {
        $tax_query[] = [
            'taxonomy' => 'photo_categories',
            'field' => 'term_id',
            'terms' => sanitize_text_field($_POST['categoryfilter'])
        ];
    }
    if (!empty($_POST['formatfilter'])) {
        $tax_query[] = [
            'taxonomy' => 'photo_formats',
            'field' => 'term_id',
            'terms' => sanitize_text_field($_POST['formatfilter'])
        ];
    }
    if (!empty($tax_query)) {
        $tax_query['relation'] = 'AND';
        $args['tax_query'] = $tax_query;
    }
    if (!empty($_POST['datefilter'])) {
        $args['order'] = sanitize_text_field($_POST['datefilter']);
    }

    $query = new WP_Query($args);
    if ($query->have_posts()) : ob_start();
        while ($query->have_posts()) : $query->the_post();
            get_template_part('template-parts/photo-grid-item');
        endwhile;
        echo ob_get_clean();
    else : echo 'Aucune photo trouvée.';
    endif;
    wp_die();
}
add_action('wp_ajax_myfilter', 'filter_photos_function');
add_action('wp_ajax_nopriv_myfilter', 'filter_photos_function');
