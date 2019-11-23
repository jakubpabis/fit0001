<?php
/**
 * Template Name: Kontakt
 */

get_header();
?>

<header class="header header__contact">
    <iframe src="<?= get_field('map') ?>" frameborder="0" style="border:0" allowfullscreen></iframe>
</header>

<section class="contact__section">
    <div class="container">
        <div class="row justify-content-center contact__section-text">
            <div class="col-lg-6">
                <?= get_field('text'); ?>
                <h4>Social Media</h4>
                <div class="socials">
                    <a href="https://www.instagram.com/fitufitu_catering/" target="_blank"><i class="fab fa-instagram"></i></a>
                    <a href="https://www.facebook.com/Fitu-Fitu-Catering-Dietetyczny-119292586147630/" target="_blank"><i class="fab fa-facebook-square"></i></a>
                </div>
            </div>
            <div class="col-lg-6 contact__section-form">
                <h4>Masz pytania? Wyślij nam wiadomość!</h4>
                <?= do_shortcode('[contact-form-7 id="6" title="Contact form 1"]'); ?>
            </div>
        </div>
    </div>
</section>

<?php
get_footer();