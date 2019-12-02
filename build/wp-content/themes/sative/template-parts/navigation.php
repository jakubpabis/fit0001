<nav class="main-navigation">
    <div class="container">
        <div class="row align-items-center justify-content-between">
            <div class="col-sm-3 col-auto">
                <a href="/" class="logo">
                    <object type="image/svg+xml" data="<?= get_template_directory_uri(); ?>/assets/img/logo.svg">
                        <img src="<?= get_template_directory_uri(); ?>/assets/img/logo.png" alt="">
                    </object>
                </a>
            </div>
            <div class="col-auto menu-btn">
                <a href="/koszyk">
                    <i class="fas fa-shopping-basket"></i>
                </a>
                <button type="button" class="menu-button">
                    <i class="fas fa-bars"></i>
                </button>
            </div>
            <div class="col-sm-9 col-12 main-navigation__menu-container">
                <button type="button" class="menu-close">
                    <i class="far fa-times-circle"></i>
                </button>
                <div class="row">
                    <div class="d-sm-block d-none col-12">
                        <?php
                            wp_nav_menu(array(
                                'theme_location'    => 'upper',
                                'container'       => '',
                                'container_id'    => '',
                                'container_class' => '',
                                'menu_id'         => false,
                                'menu_class'      => 'upper-menu',
                                'depth'           => 1,
                                'fallback_cb'     => 'wp_bootstrap_navwalker::fallback',
                                'walker'          => new wp_bootstrap_navwalker()
                            ));
                        ?>
                        <!--<i class="fas fa-shopping-basket"></i><span>Koszyk</span>-->
                    </div>
                    <div class="col-12">
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
                    <div class="col-12 d-sm-none d-block text-center account-mobile">
                        <a href="/moje-konto">
                            <i class="fas fa-user-circle"></i>
                            <span>Moje konto</span>
                        </a>
                    </div>
                    <div class="d-sm-none d-block col-12 text-center mobile-contact">
                        <a title="Numer telefonu" href="tel:+48576118007">+48 576 118 007</a>
                        <div class="socials text-center">
                            <a class="msg" href="http://m.me/119292586147630" target="_blank">
                                <i class="fab fa-facebook-messenger"></i>
                            </a>
                            <a class="fb" href="https://www.facebook.com/Fitu-Fitu-Catering-Dietetyczny-119292586147630/" target="_blank">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a class="insta" href="https://www.instagram.com/fitufitu_catering/" target="_blank">
                                <i class="fab fa-instagram"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>