<?php get_header(); ?>

	<?php if ( have_posts() ) : ?>

		<h1><?php _e( 'Search results', 'sceleton' ); ?></h1>

		<?php while ( have_posts() ) : the_post(); ?>

			<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
				<header>
					<h1><?php the_title(); ?></h1>
					<?php locate_template( array( 'includes/components/post-meta.php' ), true ); ?>
				</header>
				<div class="entry">
					<?php the_excerpt(); ?>
				</div>
			</article>

		<?php endwhile; ?>

		<?php locate_template( array( 'includes/components/pagination.php' ), true ); ?>

	<?php else : ?>

		<h1><?php _e( 'No search results', 'sceleton' ); ?></h1>

	<?php endif; ?>

	<?php get_sidebar(); ?>

<?php get_footer(); ?>
