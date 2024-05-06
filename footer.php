<!-- footer.php -->
<footer class="site-footer">
    <div class="container">
        <nav class="footer-navigation">
            <?php
            wp_nav_menu(array(
                'theme_location' => 'footer',
                'menu_id' => 'footer-menu',
                'menu_class' => 'footer-menu',
                'depth' => 1
            ));
            ?>
        </nav>
        <div class="footer-credits">
            <p>Tous droits réservés</p>
        </div>
    </div>


    <?php get_template_part('template-parts/modal-contact'); ?>


</footer>
<?php wp_footer(); ?>
</body>

</html>