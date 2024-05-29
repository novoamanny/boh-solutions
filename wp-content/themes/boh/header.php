<?php
/**
 * The header for the theme.
 *
 * This is the template that displays all of the <head> section and before the main content area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/style.css"> <!-- WordPress Stylesheet for Theme Reference -->
        <link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_stylesheet_directory_uri(); ?>/apple-touch-icon.png" />
        <link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon-16x16.png">
        <link rel="stylesheet" href="https://use.typekit.net/nzw1pgv.css">

        <link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/assets/js/assets/owl.carousel.min.css">
        <link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/assets/js/assets/owl.theme.default.min.css">   

        <?php wp_head(); ?>

        <!-- Google Tag Manager -->
        <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
        new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
        j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
        'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-xxxxxxx');</script>
        <!-- End Google Tag Manager -->

    </head>
    <body <?php body_class('sub'); ?>>
        <!-- Google Tag Manager (noscript) -->
        <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-xxxxxxx"
        height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
        <!-- End Google Tag Manager (noscript) -->
        <header>
            <div class="top">
                <div class="container flex">
                    
                    <div class="navwrap">
                        <!--DESKTOP MENU-->
                        <nav class="desktopmenu">
                            <?php wp_nav_menu(array('theme_location' => 'header_row_1', 'menu_class' => 'navigation', 'sitemap', 'container' => false)); ?>
                            <div class="brand">
                                <?php if (get_field('logo', 'option')) : ?>
                                    <a href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php echo the_field('logo', 'option'); ?>" class="logo" alt="BOH Solutions logo" /></a>
                                <?php else : ?>
                                    <a href="<?php echo esc_url(home_url('/')); ?>"><?php echo get_option( 'blogname' ); ?></a>
                                <?php endif; ?>
                            </div>
                            <?php wp_nav_menu(array('theme_location' => 'header_row_2', 'menu_class' => 'navigation', 'sitemap', 'container' => false)); ?>
                        </nav>
                        <!--MOBILE MENU-->
                        <!-- <a id="menu-toggle" class="mobile-menu-toggle" href="#menu">Menu</a> -->
                        <!-- <div class="container">
                            <div class="bar1"></div>
                            <div class="bar2"></div>
                            <div class="bar3"></div>
                        </div> -->
                        <a href="#menu" id="menu-toggle" class="mobile-menu-toggle">     
                            <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 64 64">
                                <style>
                                    line { stroke: #ffffff; stroke-width: 2px; }
                                </style>
                                <line x1="20" y1="20" x2="0" y2="20" />
                                <line x1="20" y1="25" x2="0" y2="25" />
                                <line x1="20" y1="30" x2="" y2="30" />
                            </svg>
                        </a>
                        <nav id="menu" class="mobilemenu">
                   
                            <div class="inner">
                                <?php wp_nav_menu(array('theme_location' => 'mobile', 'menu_class' => 'mobile', 'depth' => 1)); ?>
                                <a href="#" class="close">     
                                    <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 64 64">
                                        <style>
                                            line { stroke: #ffffff; stroke-width: 2px; }
                                        </style>
                                        <line x1="20" y1="20" x2="44" y2="44" />
                                        <line x1="20" y1="44" x2="44" y2="20" />
                                    </svg>
                                </a>
                            </div>
                        </nav>
                    </div>
                    <!-- <div class="cta">
                        <a href="/get-a-quote" class="button white">Get a Quote</a>
                            <?php if( get_field('phone', 'option') ): ?><a class="telephone" href="tel:<?php the_field('phone', 'option'); ?>"><?php the_field('phone', 'option'); ?></a><?php endif; ?>
                    </div> -->
                </div>
            </div>
        </header>