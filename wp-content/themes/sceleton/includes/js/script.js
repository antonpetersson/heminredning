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

			var searchButton = $(".search-form").is(':visible') ? 'x' : 's';
			$("#show-search-button").text(searchButton);
		});
		$( "#show-menu-button" ).click(function() {
  			$( ".mobile-menu-wrapper" ).toggle();
			$( "#show-menu-button" ).html("x");

			var menuButton = $(".mobile-menu-wrapper").is(':visible') ? 'x' : 'm';
			$("#show-menu-button").text(menuButton);
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
