<?php
function get_random_photo()
{
    $args = array(
        'post_type' => 'photo',
        'posts_per_page' => 1,
        'orderby' => 'rand',
        'tax_query' => array(
            array(
                'taxonomy' => 'photo_formats',
                'field'    => 'slug',
                'terms'    => 'paysage',
            ),
        ),
    );
    $query = new WP_Query($args);
    if ($query->have_posts()) {
        $query->the_post();
        $photo_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
        wp_reset_postdata();
        return $photo_url;
    }
    return false;
}
