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
        <script type="text/javascript" src="<?= get_template_directory_uri(); ?>/assets/js/main.min.js" defer></script>
        <script src="https://kit.fontawesome.com/7acc43e0e6.js" crossorigin="anonymous" defer></script>
    </body>
</html>