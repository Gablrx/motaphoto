<?php

function motaphoto_scripts()
{
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

add_action('after_setup_theme', 'motaphoto_setup');
