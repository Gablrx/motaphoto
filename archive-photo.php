<!-- Archive du CPT photos 
     Slug : /galerie/
-->

<?php
get_header(); ?>

<main id="main-content" role="main">
    <?php get_template_part('template-parts/photos-filters'); ?>
    <?php get_template_part('template-parts/grid-photos'); ?>
    <?php get_template_part('template-parts/lightbox'); ?>

    <div class="load-more-btn">
        <button id="load-more" class="btn">Charger plus</button>
    </div>



</main>

<?php get_footer(); ?>