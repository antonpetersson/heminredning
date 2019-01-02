<?php global $wp_query; ?>
<div class="pagination">
	<?php
	echo paginate_links( array(
		'base' => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
		'format' => '?paged=%#%',
		'current' => max( 1, get_query_var( 'paged' ) ),
		'total' => $wp_query->max_num_pages,
	) );
	?>
</div>
