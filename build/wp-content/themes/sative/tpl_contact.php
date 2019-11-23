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
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <?= get_field('text'); ?>
            </div>
            <div class="col-lg-6">
                <?= do_shortcode('[contact-form-7 id="6" title="Contact form 1"]'); ?>
            </div>
        </div>
    </div>
</section>

<?php
get_footer();