
<?php
// functions.php

add_action('after_setup_theme', 'motaphoto_setup');
function motaphoto_scripts()
{
    wp_enqueue_style(
        'motaphoto-style',
        get_stylesheet_uri()
    );
    wp_enqueue_script(
        'contact-modal-js',
        get_template_directory_uri() . '/assets/js/contact-modal.js',
        array(),
        false,
        true

    );
    wp_enqueue_script(
        'burger-menu-js',
        get_template_directory_uri() . '/assets/js/burger-menu.js',
        array(),
        false,
        true

    );
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
