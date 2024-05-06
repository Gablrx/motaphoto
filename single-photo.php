<?php get_header(); ?>

<main id="main-content" role="main">
    <?php
    while (have_posts()) : the_post();
        // Ici, le contenu de chaque photo
    ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <header class="entry-header">
                <h2 class="entry-title"><?php the_title(); ?></h1>
            </header>

            <div class="entry-content">
                <?php
                if (has_post_thumbnail()) {
                    the_post_thumbnail('large');
                }

                $categorie_terms = get_the_term_list($post->ID, 'photo_categories', '', ', ');
                $format_terms = get_the_term_list($post->ID, 'photo_formats', '', ', ');
                ?>
                <p>Référence : <?php the_field('reference'); ?></p>
                <p>Catégorie : <?php echo !is_wp_error($categorie_terms) ? $categorie_terms : 'Non classé'; ?></p>
                <p>Format : <?php echo !is_wp_error($format_terms) ? $format_terms : 'Non spécifié'; ?></p>
                <p>Type : <?php the_field('type'); ?></p>
                <p>Année : <?php echo get_the_date('Y'); ?></p>
                <p>Cette photo vous intéresse ? <a href="#contactModal" class="open-contact-modal autoFilledRefPhoto" data-ref-photo="<?php the_field('reference'); ?>">Contact</a> </p>


            </div>

            <!-- Navigation links -->
            <nav class="navigation post-navigation" role="navigation">
                <div class="nav-links">
                    <span class="nav-previous"><?php previous_post_link('%link', '←'); ?></span>
                    <span class="nav-next"><?php next_post_link('%link', '→'); ?></span>
                </div>
            </nav>


        </article>

    <?php endwhile;
    ?>
</main>

<?php //get_sidebar(); 
?>
<?php get_footer(); ?>