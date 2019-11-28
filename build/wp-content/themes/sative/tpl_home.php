<?php
/**
 * Template Name: Home
 */

get_header();
?>

<header class="header header__home">
    <picture class="bg-cover-abs">
        <source class=" bg-cover-abs" media="(min-width: 1600px)" srcset="<?= get_field('header_image')['url']; ?>">
        <source class=" bg-cover-abs" media="(min-width: 1024px)" srcset="<?= get_field('header_image')['sizes']['1536x1536']; ?>">
        <source class=" bg-cover-abs" media="(min-width: 480px)" srcset="<?= get_field('header_image')['sizes']['large']; ?>">
        <source class=" bg-cover-abs" media="(min-width: 1px)" srcset="<?= get_field('header_image')['sizes']['medium_large']; ?>">
        <img class=" bg-cover-abs" src="<?= get_field('header_image')['url']; ?>" alt="">
    </picture>
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8 col-12">
                <h1>
                    <?= get_field('header_title'); ?>
                </h1>
                <a href="<?= get_field('header_cta')['url']; ?>" class="btn btn__default"><?= get_field('header_cta')['title']; ?></a>
            </div>
        </div>
    </div>
</header>

<section class="intro intro__home">
    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-lg-9">
                <h2>
                    <?= get_field('intro_title'); ?>
                </h2>
                <?= get_field('intro_text'); ?>
                <a href="<?= get_field('intro_cta')['url']; ?>" class="btn btn__border green"><?= get_field('intro_cta')['title']; ?></a>
            </div>
        </div>
    </div>
</section>

<section class="diets__home">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-9 col-12 text-center">
                <h2 class="diets__home-title">
                    <?= get_field('diets_title'); ?>
                </h2>
            </div>
        </div>
        <?php if( have_rows('diets') ): ?>
            <div class="row justify-content-center align-items-stretch">
                <?php while ( have_rows('diets') ) : the_row(); ?>
                    <div class="col-lg-5 col-md-6 col-sm-10 col-12 diets__home-card">
                        <div class="content">
                            <div class="img">
                                <img src="<?= get_sub_field('image')['sizes']['woocommerce_single']; ?>" alt="" class=" bg-cover">
                            </div>
                            <div class="line" style="background-color: <?= get_sub_field('color'); ?>">
                                <h4>
                                    <?= get_sub_field('title'); ?>
                                </h4>
                                <?= get_sub_field('icon_code'); ?>
                            </div>
                            <div class="text">
                                <?= get_sub_field('text'); ?>
                            </div>
                            <div class="btns">
                                <a class="more" style="color: <?= get_sub_field('color'); ?>" href="<?= get_sub_field('more_link')['url']; ?>"><?= get_sub_field('more_link')['title']; ?></a>
                                <a class="btn btn__full slim nocolor" style="background-color: <?= get_sub_field('color'); ?>" href="<?= get_sub_field('buy_link')['url']; ?>"><?= get_sub_field('buy_link')['title']; ?></a>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>
        <?php if(get_field('diets_more')['url']) : ?>
            <div class="row justify-content-center">
                <div class="col-auto text-center">
                    <a href="<?= get_field('diets_more')['url']; ?>" class="btn btn__border diets__home-more"><?= get_field('diets_more')['title']; ?></a>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section>

<?php
get_footer();