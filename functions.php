<?php
// functions.php

add_action('after_setup_theme', 'motaphoto_setup');
function motaphoto_scripts()
{


    if (is_front_page()) {
        // jQuery
        wp_enqueue_script('jquery');
        // Select2 
        wp_enqueue_style('select2-css', 'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css');
        wp_enqueue_script('select2-js', 'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js', array('jquery'), null, true);
        wp_enqueue_script('custom-select2-init.js', get_template_directory_uri() . '/assets/js/custom-select2-init.js', array('jquery', 'select2-js'), null, true);

        wp_enqueue_script('filters-js', get_template_directory_uri() . '/assets/js/filters.js', array(), false, true);
    }

    wp_enqueue_script('contact-modal-js', get_template_directory_uri() . '/assets/js/contact-modal.js', array(), false, true);
    wp_enqueue_script('burger-menu-js', get_template_directory_uri() . '/assets/js/burger-menu.js', array(), false, true);
    if (is_singular('photo')) {
        wp_enqueue_script('navigation-photos-js', get_template_directory_uri() . '/assets/js/navigation-photos.js', array(), false, true);
    }
    wp_enqueue_script('lightbox-js', get_template_directory_uri() . '/assets/js/lightbox.js', array(), false, true);

    wp_enqueue_style('motaphoto-style', get_stylesheet_uri());
}



add_action('wp_enqueue_scripts', 'motaphoto_scripts');

function motaphoto_setup()
{
    // Enregistrement des menus
    register_nav_menus(array(
        'primary' => esc_html__('Primary Menu', 'text-domain'),
        'footer' => esc_html__('Footer Menu', 'text-domain')
    ));
}
// Random header photo
require get_template_directory() . '/inc/get-random-photo.php';
// Load more AJAX
require get_template_directory() . '/inc/ajax-load-more.php';
// Filtres AJAX
require get_template_directory() . '/inc/ajax-filters.php';
