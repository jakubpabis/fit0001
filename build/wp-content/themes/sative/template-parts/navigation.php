<nav class="main-navigation">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-3">
                <a href="/" class="logo">
                    <object type="image/svg+xml" data="<?= get_template_directory_uri(); ?>/assets/img/logo.svg">
                        <img src="<?= get_template_directory_uri(); ?>/assets/img/logo.png" alt="">
                    </object>
                </a>
            </div>
            <div class="col-lg-9">
                <div class="row">
                    <div class="col-12">
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
                </div>
            </div>
        </div>
    </div>
</nav>