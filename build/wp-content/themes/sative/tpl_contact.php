<?php
/**
 * Template Name: Kontakt
 */

get_header();
?>

<header class="header header__about">
    <picture class="bg-cover-abs">
        <source class=" bg-cover-abs" media="(min-width: 1600px)" srcset="<?= get_field('header_image')['url']; ?>">
        <source class=" bg-cover-abs" media="(min-width: 1024px)" srcset="<?= get_field('header_image')['sizes']['1536x1536']; ?>">
        <source class=" bg-cover-abs" media="(min-width: 480px)" srcset="<?= get_field('header_image')['sizes']['large']; ?>">
        <source class=" bg-cover-abs" media="(min-width: 1px)" srcset="<?= get_field('header_image')['sizes']['medium_large']; ?>">
        <img class=" bg-cover-abs" src="<?= get_field('header_image')['url']; ?>" alt="">
    </picture>
    <?php if(get_field('header_title')) : ?>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8 col-12">
                    <h1>
                        <?= get_field('header_title'); ?>
                    </h1>
                </div>
            </div>
        </div>
    <?php endif; ?>
</header>

<section class="contact__section">
    <div class="container">
        <div class="row justify-content-center contact__section-text">
            <div class="col-md-6 col-12">
                <?= get_field('text'); ?>
                <h4>Social Media</h4>
                <div class="socials">
                    <a href="https://www.instagram.com/fitufitu_catering/" target="_blank"><i class="fab fa-instagram"></i></a>
                    <a href="https://www.facebook.com/Fitu-Fitu-Catering-Dietetyczny-119292586147630/" target="_blank"><i class="fab fa-facebook-square"></i></a>
                </div>
            </div>
            <div class="col-md-6 col-12 contact__section-form">
                <h5>Masz pytania?</h5>
                <h4>Wyślij nam wiadomość!</h4>
                <?= do_shortcode('[contact-form-7 id="6" title="Contact form 1"]'); ?>
            </div>
        </div>
    </div>
</section>

<?php
get_footer();