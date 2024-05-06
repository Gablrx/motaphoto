<!--  modal-contact.php  -->
<div id="contactModal" class="contact-modal" style="display:none;">

    <div class="modal-content"><!-- 
        <span class="close-modal">&times;</span> -->

        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/Contact_header.svg">
        <div class="contactFormContainer">
            <?php echo do_shortcode('[contact-form-7 id="e86cca7" title="Formulaire de contact 1"]'); ?>
        </div>
    </div>
</div>