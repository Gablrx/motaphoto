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
            <p>Touts droits réservés</p>
        </div>
    </div>
</footer>
<?php wp_footer(); ?>
</body>

</html>