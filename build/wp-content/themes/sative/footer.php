<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WP_Bootstrap_Starter
 */

?>
            <footer class="footer">
                <div class="footer__top">
                    <div class="container">
                        <div class="row justify-content-center align-items-end">
                            <div class="col-xl-3 col-lg-4 col-md-5 col-sm-6 col-12">
                                <a href="/" class="logo">
                                    <object type="image/svg+xml" data="<?= get_template_directory_uri(); ?>/assets/img/logo.svg">
                                        <img src="<?= get_template_directory_uri(); ?>/assets/img/logo.png" alt="">
                                    </object>
                                </a>
                            </div>
                            <div class="col-lg-4 col-md-5 col-sm-6 col-12 text-right">
                                <div class="socials">
                                    <a href="https://www.instagram.com/fitufitu_catering/" target="_blank"><i class="fab fa-instagram"></i></a>
                                    <a href="https://www.facebook.com/Fitu-Fitu-Catering-Dietetyczny-119292586147630/" target="_blank"><i class="fab fa-facebook-square"></i></a>
                                </div>
                                <a href="tel:+48576118007" class="tel"><strong>+48 576 118 007</strong></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="footer__middle">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-4 col-md-5 col-sm-6 col-12">
                                <h4>Kontakt</h4>
                                <?php
                                    if(is_active_sidebar('footer-1')){
                                        dynamic_sidebar('footer-1');
                                    }
                                ?>
                            </div>
                            <div class="col-xl-3 col-lg-4 col-md-5 col-sm-6 col-12 text-right">
                                <h4>Mapa strony</h4>
                                <?php
                                    wp_nav_menu(array(
                                        'theme_location'    => 'footer',
                                        'container'       => '',
                                        'container_id'    => '',
                                        'container_class' => '',
                                        'menu_id'         => false,
                                        'menu_class'      => 'footer-menu',
                                        'depth'           => 2,
                                        'fallback_cb'     => 'wp_bootstrap_navwalker::fallback',
                                        'walker'          => new wp_bootstrap_navwalker()
                                    ));
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="footer__bottom">
                    <div class="container">
                        <div class="row justify-content-center align-items-center">
                            <div class="col-lg-4 col-md-5 col-sm-6 col-12 col-auto">
                                Copyright &copy; <?php echo date('Y'); ?> <?php echo '<a href="'.home_url().'">'.get_bloginfo('name').'</a>'; ?>
                            </div>
                            <div class="col-xl-3 col-lg-4 col-md-5 col-sm-6 col-12 col-auto text-right">
                                <a href="https://www.sative.co.uk" target="_blank">
                                    Made with <i class="fas fa-heart"></i> by <strong>SATIVE</strong>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div> <!-- #wrapper end -->
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <?php wp_footer(); ?>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous" defer></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous" defer></script>
        <script type="text/javascript" src="<?= get_template_directory_uri(); ?>/assets/js/main.min.js" defer></script>
        <script src="https://kit.fontawesome.com/7acc43e0e6.js" crossorigin="anonymous" defer></script>
    </body>
</html>