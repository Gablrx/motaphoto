<?php
/* 404.php */
get_header(); ?>

<main id="main-content" role="main">


    <section>
        <header class="page-header">
            <h1 class="page-title"><?php esc_html_e('404', 'motaphoto'); ?></h1>
        </header>

        <div class="error-404">
            <p><?php esc_html_e('Il semble que nous ne puissions pas trouver ce que vous cherchez.', 'motaphoto'); ?></p>
            <a class="button" href="<?php echo esc_url(home_url('/')); ?>"><?php esc_html_e('Retour à l\'accueil', 'motaphoto'); ?></a>
        </div>
    </section>

</main><!-- #main-content -->

<?php
get_footer();
