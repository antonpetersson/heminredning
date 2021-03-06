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
		<div class="header-main grid">
			<div class="mobile-menu">
 				<button id="show-menu-button">m</button>
				<button id="show-search-button">s</button>
			</div>
			<div class="search-form grid-item">
				<?php get_product_search_form(); ?>
			</div>
			<a href="<?php echo get_option( 'home' ); ?>" class="logotype"><img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" alt="<?php echo get_option( 'blogname' ); ?>" /></a>
			<div class="cart-button grid-item">
				<a class="cart-contents" href="<?php echo wc_get_cart_url(); ?>" title="<?php _e( 'Se din kundvagn' ); ?>"><?php echo sprintf ( _n( '%d artikel', '%d artiklar', WC()->cart->get_cart_contents_count() ), WC()->cart->get_cart_contents_count() ); ?>, <?php echo WC()->cart->get_cart_total(); ?></a>
				<a class="cart-contents-mobile" href="<?php echo wc_get_cart_url(); ?>" title="<?php _e( 'Se din kundvagn' ); ?>">c</a>
				<?php if ( WC()->cart->get_cart_contents_count() > 0 ) {
		        echo '<a class="checkout-link" href="' . wc_get_checkout_url() . '" title="' . __( 'Gå till kassan' ) . '">' . __( 'Till kassan' ) . '</a>';
		  		}?>
			</div>
		</div>
		<div class="menu-wrapper wrapper clearfix">
			<nav class="menu-main" role="navigation">
				<a href="#content" class="screen-reader-text skip-link"><?php _e( 'Skip to content', 'sceleton' ); ?></a>
				<ul class="menu-main-list">
					<?php wp_nav_menu( array( 'theme_location' => 'primary', 'walker' => new Nav_Walker(), 'container' => '', 'items_wrap' => '%3$s' ) ); ?>
				</ul>
			</nav>
		</div>
		<div class="mobile-menu-wrapper wrapper clearfix">
			<nav class="menu-main-m" role="navigation">
				<a href="#content" class="screen-reader-text skip-link"><?php _e( 'Skip to content', 'sceleton' ); ?></a>
				<ul class="menu-main-list-m">
					<?php wp_nav_menu( array( 'theme_location' => 'primary', 'walker' => new Nav_Walker_Mobile(), 'container' => '', 'items_wrap' => '%3$s' ) ); ?>
				</ul>
			</nav>
		</div>



	</header>
	<!-- //TOG BORT class wrapper -->
	<div id="content" class="">
		<?php locate_template('includes/components/slider.php', true); ?>
