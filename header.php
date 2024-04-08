<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
    <?php wp_head(); ?>
</head>

<header class="site-header">
    <div class="container">
        <div class="site-branding">
            <a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a>
        </div>
        <nav class="site-navigation">
            <?php wp_nav_menu(array('theme_location' => 'menu_principal')); ?>
        </nav>
    </div>
</header>


<body <?php body_class(); ?>>