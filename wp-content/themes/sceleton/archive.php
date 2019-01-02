<?php get_header(); ?>

	<?php if ( have_posts() ) : ?>

		<?php while ( have_posts() ) : the_post(); ?>

			<article id="post-<?php the_ID(); ?>" <?php post_class() ?>>
				<header>
					<h2 class="post-title"><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h2>
					<?php locate_template( array( 'includes/components/post-meta.php' ), true ); ?>
				</header>
				<div class="entry">
					<?php the_content(); ?>
				</div>
			</article>

		<?php endwhile; ?>

		<?php locate_template( array( 'includes/components/pagination.php' ), true ); ?>

	<?php else : ?>

		<h1><?php _e( 'No posts', 'sceleton' ); ?></h1>

	<?php endif; ?>

	<?php get_sidebar(); ?>

<?php get_footer(); ?>
