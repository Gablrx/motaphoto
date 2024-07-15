<!-- header.php -->
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">

    <!-- Titre dynamique -->
    <?php if (function_exists('wp_get_document_title')) : ?>
        <title><?php echo wp_get_document_title(); ?></title>
    <?php else : ?>
        <title><?php bloginfo('name'); ?></title>
    <?php endif; ?>

    <!-- Description dynamique -->
    <?php if (is_front_page() || is_home()) : ?>
        <meta name="description" content="<?php bloginfo('description'); ?>">
    <?php elseif (is_single() || is_page()) : ?>
        <meta name="description" content="<?php echo strip_tags(get_the_excerpt()); ?>">
    <?php else : ?>
        <meta name="description" content="<?php bloginfo('description'); ?>">
    <?php endif; ?>
    <!-- Feuille de style principale -->
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">

    <!-- Préchargement des polices Space Mono -->
    <link rel="preload" href="<?php echo get_template_directory_uri(); ?>/assets/fonts/space-mono/SpaceMono-BoldItalic.woff2" as="font" type="font/woff2" crossorigin="anonymous">

    <!-- Préchargement des polices Poppins -->
    <link rel="preload" href="<?php echo get_template_directory_uri(); ?>/assets/fonts/poppins/Poppins-Light.woff2" as="font" type="font/woff2" crossorigin="anonymous">



    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <header class="site-header">

        <div class="container">
            <a href="<?php echo home_url(); ?>" class="logo">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/Nathalie_Mota_logo_345x22.png" alt="Nathalie Mota">
            </a>

            <nav class="site-navigation desktop-menu">
                <?php wp_nav_menu(array('theme_location' => 'primary', 'menu_id' => 'primary-menu')); ?>
            </nav>

            <!-- Burger Menu btn -->
            <button class="burger-menu" aria-controls="primary-menu" aria-expanded="false">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </button>
        </div>
        <nav class="site-navigation mobile-menu">
            <?php wp_nav_menu(array('theme_location' => 'primary', 'menu_id' => 'primary-menu')); ?>
        </nav>
    </header>