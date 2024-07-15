<?php get_header(); ?>
<!-- single-photo.php -->
<main id="main-content" class="single-photo" role="main">
    <!-- DETAILS PHOTO -->
    <?php while (have_posts()) : the_post(); ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

            <div class="photo-content">

                <div class="infos-photo">

                    <h2 class="entry-title"><?php the_title(); ?></h2>

                    <div>
                        <p>Référence : <?php the_field('reference'); ?></p>
                        <?php $categorie_terms = get_the_term_list($post->ID, 'photo_categories', '', ', ');
                        $format_terms = get_the_term_list($post->ID, 'photo_formats', '', ', '); ?>
                        <p>Catégorie : <?php echo !is_wp_error($categorie_terms) ? $categorie_terms : 'Non classé'; ?></p>
                        <p>Format : <?php echo !is_wp_error($format_terms) ? $format_terms : 'Non spécifié'; ?></p>
                        <p>Type : <?php the_field('type'); ?></p>
                        <p>Année : <?php echo get_the_date('Y'); ?></p>
                    </div>
                </div>

                <div class="img-photo">
                    <?php
                    if (has_post_thumbnail()) {
                        the_post_thumbnail('large');
                    }
                    ?>
                </div>
            </div>

            <!-- INTERACTIONS -->
            <div class="interactions">

                <div class="contact-photo">
                    <p>Cette photo vous intéresse ?</p>
                    <a id="load-more" href="#contactModal" class="btn open-contact-modal autoFilledRefPhoto" data-ref-photo="<?php the_field('reference'); ?>">Contact</a>
                </div>

                <!-- Navigation links -->
                <nav class="navigation post-navigation" role="navigation">
                    <div class="photo-nav">
                        <div class="photo-preview">
                            <?php
                            if (has_post_thumbnail()) {

                                $thumbnail_src = wp_get_attachment_image_src(get_post_thumbnail_id(), 'thumbnail');
                                echo '<img src="' . esc_url($thumbnail_src[0]) . '" alt="Thumbnail" />';
                            } ?>
                        </div>
                        <div class="nav-links">
                            <span class="nav-previous" data-thumbnail="<?php echo esc_url(get_the_post_thumbnail_url(get_previous_post(), 'thumbnail')); ?>"><?php previous_post_link('%link', '←'); ?></span>
                            <span class="nav-next" data-thumbnail="<?php echo esc_url(get_the_post_thumbnail_url(get_next_post(), 'thumbnail')); ?>"><?php next_post_link('%link', '→'); ?></span>
                        </div>
                    </div>
                </nav>

            </div>


            <!-- PHOTOS MEME CATEGORIE : -->
            <?php
            // Récupérer la catégorie de la photo actuelle
            $current_photo_categories = wp_get_post_terms($post->ID, 'photo_categories', array("fields" => "ids"));

            // Vérifier si on a des catégories valides
            if (!is_wp_error($current_photo_categories) && !empty($current_photo_categories)) {
                // Préparer les arguments pour la requête des photos de la même catégorie
                $args = array(
                    'post_type' => 'photo', // Assurez-vous que c'est le bon type de post pour vos photos
                    'posts_per_page' => 2, // 2 photos uniquement
                    'post__not_in' => array($post->ID), // Exclure la photo courante
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'photo_categories',
                            'field' => 'term_id',
                            'terms' => $current_photo_categories,
                        ),
                    ),
                );

                $related_photos = new WP_Query($args);

                if ($related_photos->have_posts()) : ?>
                    <div class="related-photos">

                        <div class="single-photo-grid">
                            <h3>Vous aimerez aussi</h3>
                            <?php while ($related_photos->have_posts()) : $related_photos->the_post(); ?>
                                <?php get_template_part('template-parts/grid-photo-item'); ?>


                            <?php endwhile; ?>

                        </div>
                    </div>
                    <?php wp_reset_postdata(); ?>
            <?php endif;
            }
            ?>
            <?php get_template_part('template-parts/lightbox'); ?>
        </article>

    <?php endwhile;
    ?>
</main>

<?php //get_sidebar(); 
?>
<?php get_footer(); ?>