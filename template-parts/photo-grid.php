<div id="photo-grid">
    <?php
    $args = array(
        'post_type' => 'photo',
        'posts_per_page' => 8,
        'order' => 'desc'
    );
    $photos = new WP_Query($args);
    if ($photos->have_posts()) :
        while ($photos->have_posts()) : $photos->the_post();
            get_template_part('template-parts/grid-photo-item');
        endwhile;
        wp_reset_postdata();
    endif;
    ?>
    <div id="max-pages" style="display:none;"><?php echo $photos->max_num_pages; ?></div>
</div>