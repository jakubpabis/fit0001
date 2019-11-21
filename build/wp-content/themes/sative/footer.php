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

                </div>
                <div class="footer__bottom">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-12 text-center">
                                <a href="/" class="logo">
                                    <object type="image/svg+xml" data="<?= get_template_directory_uri(); ?>/assets/img/logo.svg">
                                        <img src="<?= get_template_directory_uri(); ?>/assets/img/logo.png" alt="">
                                    </object>
                                </a>
                            </div>
                            <div class="col-lg-4">
                                <h4>Kontakt</h4>
                            </div>
                            <div class="col-lg-4">
                                <h4>Mapa strony</h4>
                                <?php
                                    wp_nav_menu(array(
                                        'theme_location'    => 'primary',
                                        'container'       => '',
                                        'container_id'    => '',
                                        'container_class' => '',
                                        'menu_id'         => false,
                                        'menu_class'      => 'main-menu',
                                        'depth'           => 2,
                                        'fallback_cb'     => 'wp_bootstrap_navwalker::fallback',
                                        'walker'          => new wp_bootstrap_navwalker()
                                    ));
                                ?>
                            </div>
                            <div class="col-lg-4">
                                <h4>Pomoc</h4>
                                <?php
                                    wp_nav_menu(array(
                                        'theme_location'    => 'help',
                                        'container'       => '',
                                        'container_id'    => '',
                                        'container_class' => '',
                                        'menu_id'         => false,
                                        'menu_class'      => 'help-menu',
                                        'depth'           => 2,
                                        'fallback_cb'     => 'wp_bootstrap_navwalker::fallback',
                                        'walker'          => new wp_bootstrap_navwalker()
                                    ));
                                ?>
                            </div>
                        </div>
                        <div class="row justify-content-between align-items-center">
                            <div class="col-auto">
                                Copyright &copy; <?php echo date('Y'); ?> <?php echo '<a href="'.home_url().'">'.get_bloginfo('name').'</a>'; ?>
                            </div>
                            <div class="col-auto">
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