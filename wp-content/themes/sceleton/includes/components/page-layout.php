<?php
if( have_rows('layout') ):

    while ( have_rows('layout') ) : the_row();
    ?>


		<?php
	    /**
		 * Textblock
		 */
	    if( get_row_layout() == 'textblock' ):
	    $width = get_sub_field('textblock_columns_width');
	    $background = get_sub_field('textblock_background');
		 $heading = get_sub_field('textblock_heading');
		 $subHeading = get_sub_field('textblock_subheading');

	    ?>

			<?php if( have_rows('textblock_columns') ):?>

				<section class="section column-section" style="background:<?php echo $background; ?>; ">
					<?php
						if($heading != null || $subHeading != null){
						echo '<div class="column-heading">';
							echo '<h2>' . $heading . '</h2>';
							echo '<p>' . $subHeading . '</p></div>';
						}
					?>


					<div class="wrapper clearfix grid">
						<?php while ( have_rows('textblock_columns') ) : the_row();
							$backgroundImage = get_sub_field('textblock_column_background_image');
							$link = get_sub_field('textblock_column_link');
							$color = get_sub_field('textblock_color');

							// Sets class if background image is set.
							if(get_sub_field('textblock_column_background_image')){$imageCol = "imageCol";}
							else{$imageCol = "";}?>

							<div class="col <?php echo $width . " " . $imageCol; ?>" style="background-image: url('<?php echo $backgroundImage['url']; ?>'); color:<?php echo $color; ?>;">

								<?php if(get_sub_field('textblock_column_link')){
									echo '<a class="linkblock" href="' . $link['url'] . '" style="color: ' . $color . ';">';
									the_sub_field('textblock_column');
									echo "</a>";
								} else{
								the_sub_field('textblock_column');
							} ?>

							</div>

					    <?php endwhile; ?>
					</div>
				</section>
			<?php else : endif; ?>



        <?php
	    /**
		 * Imageblock
		 */
	    elseif( get_row_layout() == 'imageblock' ):
	    $fullimg = get_sub_field('imageblock_img');
	    $fullimg_add_caption = get_sub_field('imageblock_add_cap');
		$fullimg_caption = get_sub_field('imageblock_caption');

		$alt = $fullimg['alt'];
		$size = 'large';
		$thumb = $fullimg['sizes'][ $size ];
		$width = $fullimg['sizes'][ $size . '-width' ];
		$height = $fullimg['sizes'][ $size . '-height' ];
	    ?>

			<?php if($fullimg) : ?>
				<section class="fullscreen-section">
					<img src="<?php echo $thumb; ?>" alt="<?php echo $alt; ?>" width="<?php echo $width; ?>" height="<?php echo $height; ?>" class="fullscreen" />

					<?php if( ($fullimg_add_caption == 1) && $fullimg_caption ) : ?>
						<div class="caption">
							<div class="inner-wrapper clearfix">
								<?php echo $fullimg_caption; ?>
							</div>
						</div>
					<?php endif; ?>

				</section>
			<?php endif; ?>


		 <?php
	    /**
		 * Quoteblock
		 */
	    elseif( get_row_layout() == 'quoteblock' ):
	    $quote = get_sub_field('quoteblock_quote');
	    $quote_name = get_sub_field('quoteblock_name');
	    $background = get_sub_field('quoteblock_background');
	    $color = get_sub_field('quoteblock_color');
	    ?>

	    	<?php if( $quote ): ?>
				<section class="section quote-section" style="background:<?php echo $background; ?>; color:<?php echo $color; ?>;">
					<div class="inner-wrapper clearfix">
						<div class="quote"><?php echo $quote; ?></div>
						<p class="name"><?php echo $quote_name; ?></p>
					</div>
				</section>
			<?php else : endif; ?>




        <?php endif; ?>



    <?php endwhile;

else : endif;
?>
