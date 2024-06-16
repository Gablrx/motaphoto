<!-- template-parts/grid-photo-item.php -->
<?php if (has_post_thumbnail()) : ?>
    <div class="photo-item">

        <?php the_post_thumbnail('large'); ?>

        <div class="photo-overlay">
            <div class="full-screen-icon">
                <a href="javascript:void(0);" class="open-lightbox" data-img="<?php echo get_the_post_thumbnail_url(); ?>" data-title="<?php the_title(); ?>" data-cat="<?php echo strip_tags(get_the_term_list($post->ID, 'photo_categories', '', ', ')); ?>">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icon-full-screen.svg" alt="Voir la photo en plein écran">
                </a>
            </div>
            <div class="eye-icon">
                <a href="<?php the_permalink(); ?>">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icon-eye.svg" alt="Voir la photo en détail">
                </a>
            </div>
            <div class="bottom-info">
                <p><?php the_title(); ?></p>
                <p><?php echo strip_tags(get_the_term_list($post->ID, 'photo_categories', '', ', ')); ?></p>

            </div>
        </div>
    </div>
<?php endif; ?>