<?php
if (has_post_thumbnail()) : ?>
    <div class="photo-item">
        <a href="<?php the_permalink(); ?>">
            <?php the_post_thumbnail('medium'); ?>
        </a>
        <div class="photo-overlay">
            <div style="background-color: black;">
                <a href=" <?php the_permalink(); ?>">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icon-eye.svg" alt="Voir la photo en détail"> </a>
            </div>
            <div style="background-color: black;">
                <a href="#">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icon-full-screen.svg" alt="Voir la photo en plein écran"> </a>
            </div>
            <p> <?php the_title(); ?></p>
            <p><?php echo strip_tags(get_the_term_list($post->ID, 'photo_categories', '', ', ')); ?></p>
        </div>
    </div>
<?php endif; ?>