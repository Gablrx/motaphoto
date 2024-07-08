<?php
/* front-page.php */
get_header(); ?>

<header id="random-photo-header">
    <?php
    $random_photo_url = get_random_photo();
    if ($random_photo_url) : ?>
        <img src="<?php echo esc_url($random_photo_url); ?>" alt="Photo Paysage Aléatoire">
    <?php endif; ?>
    <h1 class="header-title">Photographe Event</h1>
    <div class="mobile-nav-overlay" style="display: none;">
        <nav class="mobile-nav">
            <?php wp_nav_menu(array('theme_location' => 'primary', 'menu_id' => 'primary-menu-list-mobile')); ?>
        </nav>
    </div>
</header>


<main id="main-content" role="main">
    <?php get_template_part('template-parts/photos-filters'); ?>
    <?php get_template_part('template-parts/grid-photos'); ?>
    <?php get_template_part('template-parts/lightbox'); ?>

    <div class="load-more-btn">
        <button id="load-more" class="btn">Charger plus</button>
    </div>



</main>

<?php get_footer(); ?>