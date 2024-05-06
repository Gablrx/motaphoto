<?php get_header(); ?>

<main id="main-content" role="main">
    <?php
    while (have_posts()) : the_post();
        // Ici, le contenu de chaque photo
    ?>
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

            <div class="interactions">
                <div class="contact-photo">
                    <p>Cette photo vous intéresse ?</p>
                    <a href="#contactModal" class="contact-photo-btn open-contact-modal autoFilledRefPhoto" data-ref-photo="<?php the_field('reference'); ?>">Contact</a>

                </div>

                <!-- Navigation links -->
                <nav class="navigation post-navigation" role="navigation">
                    <div class="photo-nav">
                        <div class="photo-preview">
                            <?php
                            if (has_post_thumbnail()) {

                                $thumbnail_src = wp_get_attachment_image_src(get_post_thumbnail_id(), 'thumbnail');
                                echo '<img src="' . esc_url($thumbnail_src[0]) . '" alt="Thumbnail" />';
                            }
                            ?>
                        </div>
                        <div class="nav-links">
                            <span class="nav-previous" data-thumbnail="<?php echo esc_url(get_the_post_thumbnail_url(get_previous_post(), 'thumbnail')); ?>"><?php previous_post_link('%link', '←'); ?></span>
                            <span class="nav-next" data-thumbnail="<?php echo esc_url(get_the_post_thumbnail_url(get_next_post(), 'thumbnail')); ?>"><?php next_post_link('%link', '→'); ?></span>
                        </div>
                    </div>
                </nav>

            </div>

        </article>

    <?php endwhile;
    ?>
</main>

<?php //get_sidebar(); 
?>
<?php get_footer(); ?>