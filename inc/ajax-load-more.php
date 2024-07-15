<?php
/* ajax-load-more.php */
function motaphoto_load_more_photos()
{
    // Validate and sanitize input
    $paged = isset($_GET['page']) ? intval($_GET['page']) : 1;
    $category = isset($_GET['category']) ? sanitize_text_field($_GET['category']) : '';
    $format = isset($_GET['format']) ? sanitize_text_field($_GET['format']) : '';
    $order = isset($_GET['order']) ? sanitize_text_field($_GET['order']) : 'desc';

    $tax_query = array('relation' => 'AND');

    if ($category) {
        $tax_query[] = array(
            'taxonomy' => 'photo_categories',
            'field' => 'slug',
            'terms' => $category,
        );
    }

    if ($format) {
        $tax_query[] = array(
            'taxonomy' => 'photo_formats',
            'field' => 'slug',
            'terms' => $format,
        );
    }

    $args = array(
        'post_type' => 'photo',
        'posts_per_page' => 8,
        'paged' => $paged,
        'tax_query' => $tax_query,
        'order' => $order,
    );

    $photos = new WP_Query($args);

    if ($photos->have_posts()) {
        while ($photos->have_posts()) {
            $photos->the_post();
            get_template_part('template-parts/grid-photo-item');
        }
        wp_reset_postdata();
    } else {
        echo '<p>Aucune photo trouvée.</p>';
    }

    echo '<div id="max-pages" style="display:none;">' . $photos->max_num_pages . '</div>';

    wp_die();
}
add_action('wp_ajax_load_more_photos', 'motaphoto_load_more_photos');
add_action('wp_ajax_nopriv_load_more_photos', 'motaphoto_load_more_photos');

function motaphoto_localize_script()
{
    global $wp_query;
    wp_localize_script('filters-js', 'wpPhotoData', array(
        'ajaxUrl' => admin_url('admin-ajax.php'),
        'maxPages' => get_max_pages()
    ));
}
add_action('wp_enqueue_scripts', 'motaphoto_localize_script');

// Récup le nb max de page au chargement initial
function get_max_pages()
{
    $args = array(
        'post_type' => 'photo',
        'posts_per_page' => 8
    );
    $photos = new WP_Query($args);
    return $photos->max_num_pages;
}
