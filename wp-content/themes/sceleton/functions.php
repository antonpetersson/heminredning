<?php

/**
 * Initial setup of the theme
 * Contains theme supports, language setup, nav menus etc.
 */

function sceleton_setup() {

	/**
	 * Make theme available for translation.
	 * Loads wp-content/languages/themes/sceleton-sv_SE.mo.
	 * Loads wp-content/themes/sceleton/languages/sv_SE.mo.
	 */
	load_theme_textdomain( 'sceleton', trailingslashit( WP_LANG_DIR ) . 'themes/' );
	load_theme_textdomain( 'sceleton', get_template_directory() . '/languages' );

	/**
	 * Add default posts and comments RSS feed links to head.
	 */
	add_theme_support( 'automatic-feed-links' );

	/**
	 * Let WordPress manage the document title.
	 */
	add_theme_support( 'title-tag' );

	/**
	 * Enable support for Post Thumbnails on posts and pages.
	 */
	 add_theme_support( 'post-thumbnails' );

	/**
	 *  Declare support for selective refreshing of widgets.
	 */
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Switch default core markup for search form, comment form, and comments to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
		'widgets',
	) );

	/**
	 * Styles the visual editor to resemble the theme style
	 */
	add_editor_style( array( 'editor-style.css' ) );

	/**
	 * Add menu positions for wp_nav_menu
	 */
	register_nav_menus( array(
		'primary' => 'Huvudmeny',
	) );

}
add_action( 'after_setup_theme', 'sceleton_setup' );


/**
 * Enqueue stylesheets and javascript on frontend.
 */
function sceleton_assets_enqueue() {

	if ( is_admin() ) {
		return;
	}

	/**
	 * IE < 9 scripts
	 * Loads in polyfills for IE 7 and 8
	 */
	$u = $_SERVER['HTTP_USER_AGENT'];
	$is_ie7  = (bool) preg_match( '/msie 7./i', $u );
	$is_ie8  = (bool) preg_match( '/msie 8./i', $u );
	if ( $is_ie7 || $is_ie8 ) {
		wp_enqueue_script( 'selectivizr', get_template_directory_uri() . '/libraries/selectivizr-min.js' );
		wp_enqueue_script( 'respond', get_template_directory_uri() . '/libraries/respond.min.js' );
	}

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	/**
	 * Additional scripts
	 */
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'picturefill', get_template_directory_uri() . '/libraries/picturefill.min.js', '', '', false );
	//wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/includes/js/modernizr-custom.js', '', '', true );

	/**
	 * Our custom script
	 * Ready to be used with wp_localize_script() for localization of js variables
	 */
	wp_register_script( 'script', get_template_directory_uri() . '/includes/js/script-min.js', array( 'jquery' ), filemtime( get_template_directory() . '/includes/js/script-min.js' ), true );
	wp_enqueue_script( 'script' );

	/**
	 * Styles
	 */
	wp_enqueue_style( 'style', get_stylesheet_uri(), array(), filemtime( get_template_directory() . '/style.css' ) );
	wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css?family=Alegreya+Sans+SC:400,700|Open+Sans:400,600', false );
}
add_action( 'wp_enqueue_scripts', 'sceleton_assets_enqueue', 11 );


/**
 * Register widget areas
 */
function sceleton_widgets_init() {
	register_sidebar(array(
		'name' => __( 'Sidebar Widgets', 'sceleton' ),
		'id'   => 'sidebar-widgets',
		'description'   => __( 'These are widgets for the sidebar.', 'sceleton' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>',
	));
}
add_action( 'widgets_init', 'sceleton_widgets_init' );


/**
 * Adds async parameter to specific scripts by targetting their handles
 * Useful for scripts loading in <head>
 */
function sceleton_make_scripts_async( $tag, $handle, $src ) {
	if ( 'picturefill' != $handle ) {
		return $tag;
	}
	return str_replace( '<script', '<script async', $tag );
}
add_filter( 'script_loader_tag', 'sceleton_make_scripts_async', 10, 3 );


/**
 * Stop Redirect Canonical from trying to redirect 404 errors.
 * @link https://core.trac.wordpress.org/ticket/16557
 */
function sceleton_stop_404_guessing( $url ) {
	return ( is_404() ) ? false : $url;
}
add_filter( 'redirect_canonical', 'sceleton_stop_404_guessing' );


/**
 * Sanitize all uploads from anything not a-Z 0-9
 */
function sceleton_extended_sanitize_file_name( $filename ) {
	$sanitized_filename = remove_accents( $filename );
	return $sanitized_filename;
}
add_filter( 'sanitize_file_name', 'sceleton_extended_sanitize_file_name', 10, 2 );


/**
 * Modifies the default comment form fields to better suit our needs.
 * @param  array $fields An array of field markups
 */
function sceleton_modify_comment_form_fields( $fields ) {
	$commenter = wp_get_current_commenter();
	$req = get_option( 'require_name_email' );
	$aria_req = ( $req ? " aria-required='true'" : '' );

	$fields['author'] = '
	<div class="comment-form-item comment-form-name">' .
		'<label for="author">' . __( 'Name', 'sceleton' ) . ( $req ? '<span class="required">*</span>' : '' ) . '</label>' .
		'<input type="text" name="author" id="author" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' />
	</div>';

	$fields['email'] = '
	<div class="comment-form-item comment-form-email">
		<label for="email">' . __( 'Email', 'sceleton' ) . '</label> ' .
		( $req ? '<span class="required">*</span>' : '' ) .
		'<input id="email" name="email" type="text" value="' . esc_attr( $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' />
	</div>';

	//we don't want their url..
	$fields['url'] = '';

	return $fields;
}
add_filter( 'comment_form_default_fields', 'sceleton_modify_comment_form_fields', 10, 1 );


/**
 * Remove emoji support (which adds external files to sources)
 */
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );

/**
 * Remove The SEO Framework notices in source code
 */
add_filter( 'the_seo_framework_indicator', '__return_false' );
add_filter( 'sybre_waaijer_<3', '__return_false' );
add_filter( 'the_seo_framework_indicator_timing', '__return_false' );

/**
 * Move priority for the SEO meta box below ACF etc.
 */
function sceleton_seo_metabox_prio() {
	return 'low';
}
add_filter( 'the_seo_framework_metabox_priority', 'sceleton_seo_metabox_prio' );


/**
 * Add reference to Tigerton in the admin footer
 */
function sceleton_custom_admin_footer() {
	echo '<a href="http://tigerton.se/">' . __( 'Webbplats byggd av Tigerton Webbyrå', 'sceleton' ) . '</a>';
}
add_filter( 'admin_footer_text', 'sceleton_custom_admin_footer' );


/**
 * NOTICE: Custom Code are added below this mark.
 */

 //Lägger till support för woocommerce https://github.com/woocommerce/woocommerce/wiki/Declaring-WooCommerce-support-in-themes
 function sceleton_add_woocommerce_support() {add_theme_support( 'woocommerce' );}
 add_action( 'after_setup_theme', 'sceleton_add_woocommerce_support' );

/**
 * Filter WooCommerce  Search Field
 */
add_filter( 'get_product_search_form' , 'me_custom_product_searchform' );

function me_custom_product_searchform( $form ) {
   $form = '<form role="search" method="get" iclass="woocommerce-product-search" action="' . esc_url( home_url( '/'  ) ) . '">
					<div>
	            	<label class="screen-reader-text" for="s">' . __( 'Search for:', 'woocommerce' ) . '</label>
	              	<input type="search" class="search-field" placeholder="' . esc_attr_x( 'Search Products&hellip;', 'placeholder', 'woocommerce' ) .'" value="' . get_search_query() . '" name="s" title="' . esc_attr_x( 'Search for:', 'label', 'woocommerce' ) . '" />
	              	<button type="submit" value="' . esc_attr_x( '', 'submit button', 'woocommerce' ) . '" />
	              	<input type="hidden" name="post_type" value="product" />
         		</div>
	    		</form>';
return $form;
}

/**
 * Custom Nav walker
 */

 class Nav_Walker extends Walker_Nav_Menu
 {
     function start_lvl(&$output, $depth = 0, $args = array())
     {
         $indent = str_repeat("\t", $depth);
         $output .= "\n$indent<div class=\"sub-menu-wrapper\"><ul class=\"sub-menu\">\n";
     }
     function end_lvl(&$output, $depth = 0, $args = array())
     {
         $indent = str_repeat("\t", $depth);
         $output .= "$indent</ul></div>\n";
     }
 }

 /**
  * Woocommerce Archive Sidebar
  */
//adds sidebar to top of Woocoommerce archive page, and div around products, sorting and result count, + div around all
add_action( 'woocommerce_before_shop_loop', 'woo_sidebar_and_archive_wrapper', 5);
function woo_sidebar_and_archive_wrapper() {
	echo '<div class="woo_archive_wrapper">';
	woocommerce_get_sidebar();
  	echo '<div class="woo_archive_products_wrapper">';
}
//Ends the wrapping divs.
add_action( 'woocommerce_after_shop_loop', 'woo_archive_wrapper_end', 5);
function woo_archive_wrapper_end() {
	echo '</div></div>';
}
//removes duplicate sidebar from page.
remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10);


/**
 * Woocommerce Single Product Page
 */

// Hide trailing zeros on prices.
add_filter( 'woocommerce_price_trim_zeros', 'wc_hide_trailing_zeros', 10, 1 );
function wc_hide_trailing_zeros( $trim ) {return true;}

//Prints brand name under title
add_action('woocommerce_single_product_summary','print_brand_name', 6);
function print_brand_name() {
    global $product;
    $brand_val = $product->get_attribute('pa_varumarke');
    echo $brand_val;
}
//Move summary up over price
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 8 );

// Remove category
remove_action('woocommerce_single_product_summary','woocommerce_template_single_meta', 40);

//Add attributes to summary
add_action('woocommerce_single_product_summary', 'print_attributes_in_summary', 39);
function print_attributes_in_summary(){
	global $product;
	$product->list_attributes();
}

add_filter( 'woocommerce_product_tabs', 'woo_remove_product_tabs', 98 );
function woo_remove_product_tabs( $tabs ) {
	// unset( $tabs['description'] );
	// unset( $tabs['reviews'] );
	unset( $tabs['additional_information'] );
	return $tabs;
}
