<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-title" content="<?php bloginfo('name'); ?> - <?php bloginfo('description'); ?>">
    <link rel="shortcut icon" href="<?php echo esc_url(get_template_directory_uri() . '/assets/img/favicon.ico'); ?>"
          type="image/x-icon">
    <link rel="icon" href="<?php echo esc_url(get_template_directory_uri() . '/assets/img/favicon.ico'); ?>"
          type="image/x-icon">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?> id="top">

<?php wp_body(); ?>

<div class="wrapper">
    <header class="header bebas">
        <div class="container">
	        <div class="header-row d-flex align-items-center">
		        <?php if ( has_nav_menu( 'menu-left' ) ) { ?>
                    <div class="header-item header-menu">
                        <nav class="menu menu-left">
					        <?php wp_nav_menu( array(
						        'theme_location' => 'menu-left',
						        'container'      => false,
						        'menu_class'     => 'menu-list',
						        'menu_id'        => '',
						        'fallback_cb'    => 'wp_page_menu',
						        'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
						        'depth'          => 3
					        ) ); ?>
                        </nav>
                    </div>
		        <?php } ?>
                <div class="header-item header-logo mx-auto"><?php get_default_logo_link(); ?></div>
		        <?php if ( has_nav_menu( 'menu-right' ) ) { ?>
                    <div class="header-item header-menu">
                        <nav class="menu menu-right">
					        <?php wp_nav_menu( array(
						        'theme_location' => 'menu-right',
						        'container'      => false,
						        'menu_class'     => 'menu-list',
						        'menu_id'        => '',
						        'fallback_cb'    => 'wp_page_menu',
						        'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
						        'depth'          => 3
					        ) ); ?>
                        </nav>
                    </div>
		        <?php } ?>
            </div>
        </div>
    </header>

    <?php if (has_nav_menu('menu-left') || has_nav_menu('menu-right')) { ?>
        <nav class="nav js-menu bebas">
            <button type="button" tabindex="0" class="menu-item-close menu-close js-menu-close"></button>
            <?php wp_nav_menu(array(
                'theme_location' => 'menu-left',
                'container' => false,
                'menu_class' => 'menu-container',
                'menu_id' => '',
                'fallback_cb' => 'wp_page_menu',
                'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                'depth' => 3
            ));
            wp_nav_menu(array(
		        'theme_location' => 'menu-right',
		        'container' => false,
		        'menu_class' => 'menu-container',
		        'menu_id' => '',
		        'fallback_cb' => 'wp_page_menu',
		        'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
		        'depth' => 3
	        )); ?>
        </nav>
    <?php } ?>
        <?php
            global $container_class;
            if (!isset($container_class) || empty($container_class) || !$container_class) {
                $container_class = "container js-container";
            }
        ?>
    <div class="<?php echo $container_class; ?>">

        <div class="nav-mobile-header">
            <button class="hamburger js-hamburger" type="button" tabindex="0">
            <span class="hamburger-box">
                <span class="hamburger-inner"></span>
            </span>
            </button>
            <div class="logo"><?php get_default_logo_link(); ?></div>
        </div>

        <?php /*
        <button class="button-large">Test</button>
        <button class="button-medium">Test</button>
        <button class="button-small">Test</button>
        <button class="button-large button-inverse">Test</button>
        <button class="button-medium button-inverse">Test</button>
        <button class="button-small button-inverse">Test</button>
        <div style="background-color: #000">
            <button class="button-large button-outline">Test</button>
            <button class="button-medium button-outline">Test</button>
            <button class="button-small button-outline">Test</button>
        </div>
        */ ?>
