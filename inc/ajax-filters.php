<?php
function motaphoto_filter_photos()
{
    $category = isset($_GET['category']) ? $_GET['category'] : '';
    $format = isset($_GET['format']) ? $_GET['format'] : '';
    $order = isset($_GET['order']) ? $_GET['order'] : 'desc'; // Default order to 'desc'

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
        'tax_query' => $tax_query,
        'order' => $order,
    );

    $photos = new WP_Query($args);

    if ($photos->have_posts()) :
        while ($photos->have_posts()) : $photos->the_post();
            get_template_part('template-parts/grid-photo-item');
        endwhile;
        wp_reset_postdata();
    endif;

    // nombre maximum de pages de résultats
    echo '<div id="max-pages" style="display:none;">' . $photos->max_num_pages . '</div>';

    wp_die();
}
add_action('wp_ajax_filter_photos', 'motaphoto_filter_photos');
add_action('wp_ajax_nopriv_filter_photos', 'motaphoto_filter_photos');
