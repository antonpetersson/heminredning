<!-- Flexslider -->
<?php if ( have_rows( 'slider' ) ) : ?>
	<div id="slider" class="flexslider frontpage-slider">
		<ul class="slides">
			<?php
			while ( have_rows( 'slider' ) ) : the_row();
				$slider_image      = get_sub_field( 'slider_image' ); ?>
				<li>
					<div class="slider-img" style="background-image: url('<?php echo $slider_image["url"]; ?>');"></div>
					<div class="slider-content">
						<div class="slider-content-inner">
								<div class="inner-wrapper">
									<!-- <?php the_sub_field('slider_content');?> -->
									<?php
										$products = get_sub_field('produkt_koppling');
										if( $products ): ?>
											<?php foreach( $products as $p): ?>
												<i class="preTitle"> <?php echo get_sub_field('innan_rubrik'); ?> </i>
												<h2> <?php echo get_the_title( $p->ID ); ?> </h2>
												<p class="price"><?php echo "pris från " . wc_get_price_to_display(new WC_Product($p->ID), $args = array()) . " " . esc_attr( get_woocommerce_currency_symbol() ); ?> </p>

								 				<a class="button" href="<?php echo get_permalink( $p->ID ); ?>">Till Produkten</a>
											<?php endforeach; ?>
										<?php endif; ?>
								</div>
						</div>
					</div>
				</li>
			<?php endwhile; ?>
		</ul>
	</div>
<?php else : endif; ?>
<!-- End of Flexslider -->
