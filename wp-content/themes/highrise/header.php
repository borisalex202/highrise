<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:100,200,300,400,500,600,700,800">

	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php endif; ?>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site-wrapper">

		<header class="site-header">
            <div class="container">
                <a href="/" class="site-logo"><?php echo get_theme_mod('main_slogan'); ?></a>

                <div class="right">
                    <?php if ( has_nav_menu( 'primary' ) ) : ?>
                        <nav class="site-nav">
                            <?php
                                wp_nav_menu( array(
                                    'menu_class'     => 'site-main_menu',
                                    'theme_location' => 'primary'
                                ) );
                            ?>
                        </nav><!-- .site-nav -->
                    <?php endif; ?>
                </div>
                <button class="icon-menu">
                    <span class="icon-menu__bar"></span>
                    <span class="icon-menu__bar"></span>
                    <span class="icon-menu__bar"></span>
                </button>
            </div>
            <div class="site-mobile-menu">
                <?php if ( has_nav_menu( 'primary' ) ) : ?>
                    <nav class="site-nav">
                        <?php
                            wp_nav_menu( array(
                                'menu_class'     => 'site-main_menu',
                                'theme_location' => 'primary'
                            ) );
                        ?>
                    </nav><!-- .site-nav -->
                <?php endif; ?>
                <?php if ( has_nav_menu( 'social' ) ) : ?>
                    <nav class="site-social">
                        <?php
                            wp_nav_menu( array(
                                'theme_location' => 'social'
                            ) );
                        ?>
                    </nav><!-- .site-social -->
                <?php endif; ?>
            </div>
		</header><!-- .site-header -->

		<div class="site-content">
