<?php
get_header(); ?>

<main id="main-content" role="main">
    <?php get_template_part('template-parts/photo-filters'); ?>
    <?php get_template_part('template-parts/photo-grid'); ?>

    <button id="load-more">Charger plus</button>
</main>

<?php get_footer(); ?>