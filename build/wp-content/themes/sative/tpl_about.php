<?php
/**
 * Template Name: O nas
 */

get_header();
?>

<header class="header header__diets">
    <picture class="bg-cover-abs">
        <source class="lazyset bg-cover-abs" media="(min-width: 1600px)" data-srcset="<?= get_the_post_thumbnail_url(); ?>">
        <source class="lazyset bg-cover-abs" media="(min-width: 1024px)" data-srcset="<?= get_the_post_thumbnail_url('', '1536x1536'); ?>">
        <source class="lazyset bg-cover-abs" media="(min-width: 480px)" data-srcset="<?= get_the_post_thumbnail_url('', 'large'); ?>">
        <source class="lazyset bg-cover-abs" media="(min-width: 1px)" data-srcset="<?= get_the_post_thumbnail_url('', 'medium_large'); ?>">
        <img class="lazy bg-cover-abs" data-src="<?= get_the_post_thumbnail_url(); ?>" alt="">
    </picture>
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8 col-12">
                <h1>
                    <?= get_the_title(); ?>
                </h1>
            </div>
        </div>
    </div>
</header>

<?php
get_footer();