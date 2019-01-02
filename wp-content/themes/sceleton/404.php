<?php get_header(); ?>

	<article <?php post_class( 'post 404-post' ); ?>>
		<header>
			<h1><?php _e( 'Error 404 - Page Not Found','sceleton' ); ?></h1>
		</header>
	</article>

	<?php get_sidebar(); ?>

<?php get_footer(); ?>
