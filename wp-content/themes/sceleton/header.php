<!DOCTYPE html>
<html dir="ltr" <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

	<header class="header" role="banner">
		<div class="wrapper clearfix">
			<a href="<?php echo get_option( 'home' ); ?>" class="logotype"><img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" alt="<?php echo get_option( 'blogname' ); ?>" /></a>
			<nav class="menu-main" role="navigation">
				<a href="#content" class="screen-reader-text skip-link"><?php _e( 'Skip to content', 'sceleton' ); ?></a>
				<ul class="menu-main-list clearfix">
					<?php wp_nav_menu( array( 'theme_location' => 'primary', 'container' => '', 'items_wrap' => '%3$s' ) ); ?>
				</ul>
			</nav>
		</div>
	</header>

	<div id="content" class="wrapper">
