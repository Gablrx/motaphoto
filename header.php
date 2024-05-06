<!-- header.php -->
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">

    <!-- Préchargement des polices Space Mono -->
    <link rel="preload" href="<?php echo get_template_directory_uri(); ?>/assets/fonts/space-mono/SpaceMono-BoldItalic.woff2" as="font" type="font/woff2" crossorigin="anonymous">

    <!-- Préchargement des polices Poppins -->
    <link rel="preload" href="<?php echo get_template_directory_uri(); ?>/assets/fonts/poppins/Poppins-Light.woff2" as="font" type="font/woff2" crossorigin="anonymous">



    <?php wp_head(); ?>
</head>



<body <?php body_class(); ?>>

    <header class="site-header">
        <div class="desktop-menu">
            <div class="container">
                <a href="<?php echo home_url(); ?>" class="logo">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/Nathalie_Mota_logo_345x22.png" alt="Nathalie Mota">
                </a>



                <nav class="site-navigation">
                    <?php wp_nav_menu(array('theme_location' => 'primary', 'menu_id' => 'primary-menu')); ?>
                    <!-- Lien modale Contact -->
                    <a href="#contactModal" class="open-contact-modal">Contact</a>
                </nav>
            </div>
        </div>
        <div class="mobile-menu">
            <div class="container">
                <a href="<?php echo home_url(); ?>" class="logo">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/Nathalie_Mota_logo_345x22.png" alt="Nathalie Mota">
                </a>

                <!-- Hamburger Menu Button -->
                <button class="hamburger-menu" aria-controls="primary-menu" aria-expanded="false">
                    <span class="bar"></span>
                    <span class="bar"></span>
                    <span class="bar"></span>
                </button>

            </div>
        </div>
    </header>