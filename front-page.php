<?php
/* front-page.php */
get_header(); ?>

<main id="main-content" role="main">
    <?php get_template_part('template-parts/photos-filters'); ?>
    <?php get_template_part('template-parts/photos-grid'); ?>
    <?php get_template_part('template-parts/lightbox'); ?>

    <button id="load-more">Charger plus</button>
</main>

<?php get_footer(); ?>