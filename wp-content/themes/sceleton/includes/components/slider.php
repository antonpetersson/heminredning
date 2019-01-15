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
							<div class="wrapper">
								<div class="inner-wrapper">
									<?php the_sub_field('slider_content');?>
								</div>
							</div>
						</div>
							
					</div>
				</li>
			<?php endwhile; ?>
		</ul>
	</div>
<?php else : endif; ?>
<!-- End of Flexslider -->
