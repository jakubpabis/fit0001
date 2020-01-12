<?php
/**
 * Template Name: Diety
 */

get_header();

$products = wc_get_products( array(
    'limit' => -1,
    'status' => 'publish',
    'order' => 'ASC'
) );

//var_dump($prod->get_variation_attributes()['pa_kalorycznosc']); ?>

<header class="header header__diets">
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
                <?php if(get_field('header_cta')) : ?>
                    <a href="<?= get_field('header_cta')['url']; ?>" class="btn btn__default"><?= get_field('header_cta')['title']; ?></a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</header>

<section class="diets">
    <div class="container">
        <?php foreach($products as $product) : 
            
            $colorCode = get_field('color', $product->get_ID()); 
            $color = '';
            switch($colorCode) {
                case strtolower('#501B73'):
                    $color = 'purple';
                    break;
                case strtolower('#FF8A00'):
                    $color = 'orange';
                    break;
                case strtolower('#00A3FF'):
                    $color = 'blue';
                    break;
                case strtolower('#A8CE38'):
                    $color = 'green';
                    break;
                case strtolower('#244d97'):
                    $color = 'hashi';
                    break;
                case strtolower('#12a876'):
                    $color = 'wege';
                    break;
            }
            
        ?>
            <div class="row diets__row justify-content-center">
                <div class="col-lg-12 col-md-10 col-12">
                    <div class="row align-items-stretch diets__product">
                        <div class="col-lg-6 col-12 diets__product-text">
                            <div class="content">
                                <h2 class="<?= $color; ?>">
                                    <?= $product->get_title(); ?>
                                </h2>
                                <?= get_the_content('', '', $product->get_ID()); ?>
                            </div>
                            <a href="<?= get_the_permalink($product->get_ID()); ?>" class="diets__product-btn <?= $color; ?>">
                                Zamów swoją dietę już dziś!
                            </a>
                        </div>
                        <div class="col-lg-6 col-12 diets__product-image">
                            <img src="<?= get_the_post_thumbnail_url($product->get_ID(), 'large'); ?>" alt="" class=" bg-cover">
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</section>


<section class="about__table">
    <div class="container">
        <div class="row justify-content-center align-items-stretch">
            <div class="col-lg-10 col-12 text-center">
                <h2>
                    <?= get_field('table_title'); ?>
                </h2>
            </div>
            <?php if( have_rows('table') ): ?>
                <?php while ( have_rows('table') ) : the_row(); ?>
                    <div class="col-lg-3 col-sm-6 col-xs-8 col-12 about__table-item">
                        <div class="content">
                            <div class="line" style="background-color: <?= get_sub_field('color'); ?>">
                                <h5>
                                    <?= get_sub_field('title'); ?>
                                </h5>
                                <?= get_sub_field('icon_code'); ?>
                            </div>
                            <div class="text">
                                <?= get_sub_field('text'); ?>
                            </div>
                            <a class="btn btn__full slim nocolor" style="background-color: <?= get_sub_field('color'); ?>" href="<?= get_sub_field('link'); ?>">Zamów teraz</a>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </div>
</section>


<?php get_footer();