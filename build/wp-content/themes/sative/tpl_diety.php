<?php
/**
 * Template Name: Diety
 */

get_header();

$products = wc_get_products( array(
    'limit' => -1,
    'order' => 'ASC'
) );

//var_dump($prod->get_variation_attributes()['pa_kalorycznosc']); ?>

<header class="header header__diets">
    <img class="bg-cover-abs lazy" data-src="<?= get_field('header_image')['url']; ?>" alt="">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8 col-12">
                <h1>
                    <?= get_field('header_title'); ?>
                </h1>
                <?php if(get_field('header_cta')) : ?>
                    <a href="<?= get_field('header_cta')['url']; ?>" class="btn btn__default"><?= get_field('header_cta')['title']; ?></a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</header>

<section class="diets">
    <div class="container">
        <?php foreach($products as $product) : ?>
            <div class="row diets__row">
                <div class="col-12">
                    <div class="row align-items-stretch diets__product">
                        <div class="col-lg-6 diets__product-text">
                            <div class="content">
                                <h2 style="color: <?= get_field('color', $product->get_ID()); ?>">
                                    <?= $product->get_title(); ?>
                                </h2>
                                <?= get_the_content('', '', $product->get_ID()); ?>
                            </div>
                            <a href="<?= get_the_permalink($product->get_ID()); ?>" class="diets__product-btn" style="background-color: <?= get_field('color', $product->get_ID()); ?>">
                                Zamów swoją dietę już teraz!
                            </a>
                        </div>
                        <div class="col-lg-6 diets__product-image">
                            <img data-src="<?= get_the_post_thumbnail_url($product->get_ID()); ?>" alt="" class="lazy bg-cover">
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</section>




<?php get_footer();