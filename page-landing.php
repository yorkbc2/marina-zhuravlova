<?php
/**
 * Template Name: Landing
 **/
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes" />
	<meta name="apple-mobile-web-app-title" content="<?php bloginfo( 'name' ); ?> - <?php bloginfo( 'description' ); ?>">
    
	<title><?php wp_title(); ?></title>
	<link rel="shortcut icon" href="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/favicon.ico" type="image/x-icon" />

	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
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
	<div class="home">
		<div class="home__block">
			<div class="home__block_content">
				<h4>
					Semptember 2018
				</h4>
				<h1>
					Alina + Maxim
				</h1>
				<div class="sp-md-6 sp-sm-6 sp-xs-6"></div>
				<a href="#" class="button-large button-outline">
					View
				</a>
			</div>
		</div>
	</div>

<?php wp_footer(); ?>

</body>
</html>
