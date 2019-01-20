	</div>
	<footer class="footer">
		<div class="wrapper">
			<hr>
			<nav class="menu-footer" role="navigation">
				<ul class="menu-footer-list clearfix">
					<?php wp_nav_menu( array( 'theme_location' => 'footer', 'container' => '', 'items_wrap' => '%3$s' ) ); ?>
				</ul>
			</nav>
			<hr>

			<div class="footer-content grid grid--1of3">
				<div class="contact-box grid-item">
					<h2>Kontakta oss</h2>
					<?php
					if( have_rows('footer-contact', 'option') ):
						while ( have_rows('footer-contact', 'option') ) : the_row();
					   	echo '<p>' . the_sub_field('footer-textfield', 'option') . '</p>';
					   endwhile;
					else :
					endif;
					?>

				</div>
				<div class="socialmedia-box grid-item">
					<h2>Följ oss</h2>
					<?php
					$follow = get_field('footer-follow', 'option');

					if( $follow ):?>
						<a class="fb-icon" href=" <?php echo $follow['footer-facebook']; ?>">f</a>
						<a class="ig-icon" href=" <?php echo $follow['footer-instagram']; ?>">i</a>
						<a class="p-icon" href=" <?php echo $follow['footer-pinterest']; ?>">p</a>
					<?php endif; ?>

				</div>
				<div class="newsletter-box grid-item">
					<h2>Nyhetsbrev</h2>
				</div>

			</div>
			<hr>

			<nav class="menu-footer-bottom" role="navigation">
				<span>Copyright Hemlängtan 2019</span>
				<ul class="menu-footer-bottom-list clearfix">
					<?php wp_nav_menu( array( 'theme_location' => 'footerbottom', 'container' => '', 'items_wrap' => '%3$s' ) ); ?>
				</ul>
			</nav>

		</div>
	</footer>

	<?php wp_footer(); ?>
</body>
</html>
