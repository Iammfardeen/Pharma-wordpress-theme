<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<a class="visually-hidden" href="#main-content"><?php _e('Skip to content','daniyal-pharma'); ?></a>

<header id="masthead" class="site-header" role="banner">
    <div class="header-inner">

        <!-- LOGO + SITE NAME -->
        <a href="<?php echo esc_url( home_url('/') ); ?>" class="site-logo" rel="home">
            <?php if ( has_custom_logo() ) : ?>
                <?php the_custom_logo(); ?>
            <?php else : ?>
                <div class="logo-icon">D</div>
            <?php endif; ?>
            <div class="logo-text">
                <span class="name"><?php bloginfo('name'); ?></span>
                <span class="tagline">Private Limited</span>
            </div>
        </a>

        <!-- RIGHT: Desktop nav + CTA + Hamburger -->
        <div class="header-right">

            <nav id="primary-navigation" role="navigation" aria-label="<?php _e('Primary Navigation','daniyal-pharma'); ?>">
                <?php
                wp_nav_menu([
                    'theme_location' => 'primary',
                    'container'      => false,
                    'menu_class'     => 'nav-menu',
                    'depth'          => 2,
                    'fallback_cb'    => function() {
                        $pages = [
                            'Home'                 => '/',
                            'About Us'             => '/about-us/',
                            'Products'             => '/products/',
                            'Therapeutic Segments' => '/therapeutic-segments/',
                            'Services'             => '/services/',
                            'Quality'              => '/quality/',
                            'Blog'                 => '/blog/',
                            'Contact'              => '/contact/',
                        ];
                        echo '<ul class="nav-menu">';
                        foreach ( $pages as $label => $url ) {
                            echo '<li><a href="' . esc_url( home_url($url) ) . '">' . esc_html($label) . '</a></li>';
                        }
                        echo '</ul>';
                    }
                ]);
                ?>
            </nav>

            <a href="<?php echo esc_url( home_url('/contact/') ); ?>" class="btn btn-primary nav-cta">
                📩 Business Inquiry
            </a>

            <!-- HAMBURGER (mobile only) -->
            <button class="menu-toggle" id="menu-toggle-btn"
                    aria-controls="mobile-nav"
                    aria-expanded="false"
                    aria-label="<?php _e('Toggle Menu','daniyal-pharma'); ?>">
                <span class="bar bar1"></span>
                <span class="bar bar2"></span>
                <span class="bar bar3"></span>
            </button>

        </div>
    </div>

    <!-- MOBILE NAV PANEL -->
    <div id="mobile-nav" class="mobile-nav" aria-hidden="true">
        <?php
        wp_nav_menu([
            'theme_location' => 'primary',
            'container'      => false,
            'menu_class'     => 'mobile-nav-menu',
            'depth'          => 2,
            'fallback_cb'    => function() {
                $pages = [
                    'Home'                 => '/',
                    'About Us'             => '/about-us/',
                    'Products'             => '/products/',
                    'Therapeutic Segments' => '/therapeutic-segments/',
                    'Services'             => '/services/',
                    'Quality'              => '/quality/',
                    'Blog'                 => '/blog/',
                    'Contact'              => '/contact/',
                ];
                echo '<ul class="mobile-nav-menu">';
                foreach ( $pages as $label => $url ) {
                    echo '<li><a href="' . esc_url( home_url($url) ) . '">' . esc_html($label) . '</a></li>';
                }
                echo '</ul>';
            }
        ]);
        ?>
        <div style="padding: 12px 16px 20px;">
            <a href="<?php echo esc_url( home_url('/contact/') ); ?>"
               class="btn btn-primary"
               style="width:100%; justify-content:center; display:flex;">
                📩 Business Inquiry
            </a>
        </div>
    </div>

</header>

<main id="main-content" class="site-main">
