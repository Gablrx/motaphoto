<?php

function motaphoto_scripts()
{
    wp_enqueue_style('motaphoto-style', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'motaphoto_scripts');



function motaphoto_setup()
{
    // Menu
    register_nav_menus(array(
        'menu_principal' => 'Menu Principal',
    ));
}
add_action('after_setup_theme', 'motaphoto_setup');
