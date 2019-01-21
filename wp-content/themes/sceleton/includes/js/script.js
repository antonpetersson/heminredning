/**
 * Map jQuery to $
 */
(function( $ ) {
	'use strict';

	/**
	 * Functions go here
	 */


	/**
	 * Runs when window is ready.
	 * Usually where most code that's not functions go.
	 */
	$(function() {
		/**
      * Menu
      */
		$( "#show-search-button" ).click(function() {
  			$( ".search-form" ).toggle();
			$( "#show-search-button" ).html("x");


			var txt = $(".search-form").is(':visible') ? 'x' : 's';
			$("#show-search-button").text(txt);
		
		});





		/**
      * Slider
      */

        jQuery('.flexslider').flexslider({
            slideshow: true,
            slideshowSpeed: 7000,
            animationSpeed: 600,
            controlNav: false,
            directionNav: true
        });
			$(".linkblock").parent().click(function() {
				window.location = $(this).find("a").attr("href");
				return false;
			});
			$(".linkblock").parent().css({
					"cursor": "pointer"
			  });

	});

})( jQuery );
