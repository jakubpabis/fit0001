<?php
/**
 * Template Name: O nas
 */

get_header();
?>

<header class="header header__about">
    <picture class="bg-cover-abs">
        <source class=" bg-cover-abs" media="(min-width: 1600px)" srcset="<?= get_the_post_thumbnail_url(); ?>">
        <source class=" bg-cover-abs" media="(min-width: 1024px)" srcset="<?= get_the_post_thumbnail_url('', '1536x1536'); ?>">
        <source class=" bg-cover-abs" media="(min-width: 480px)" srcset="<?= get_the_post_thumbnail_url('', 'large'); ?>">
        <source class=" bg-cover-abs" media="(min-width: 1px)" srcset="<?= get_the_post_thumbnail_url('', 'medium_large'); ?>">
        <img class=" bg-cover-abs" src="<?= get_the_post_thumbnail_url(); ?>" alt="">
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

<section class="about__section">
    <div class="container">
        <?php if( have_rows('about_sections') ): ?>
            <?php while ( have_rows('about_sections') ) : the_row(); ?>
                <div class="row justify-content-center about__section-item">
                    <div class="col-md-6 about__section-img">
                        <img src="<?= get_sub_field('img')['sizes']['large']; ?>" alt="" class=" bg-cover">
                    </div>
                    <div class="col-md-6 about__section-text">
                        <div class="content">
                            <?= get_sub_field('text'); ?>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php endif; ?>
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
                    <div class="col-lg-3 col-md-6 about__table-item">
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

<?php
get_footer();