jQuery(document).ready(function($) {

	var gallery_counter = 1;

	/* Gallery Shortcode Integration */

	$('.gallery').append('<div class="clear"></div>');

	$('.gallery').each(function(){

		var current_gallery = $(this),
			gallery_id = current_gallery.attr('id');

		current_gallery.find('.gallery-item a').each(function(){

			// Add bootstrap thumbnail class
			$(this).find('img').addClass('thumbnail');

			// Append lightbox if it's an image
			if(this.href.match(/\.(jpe?g|png|bmp|gif|tiff?)$/i)) {
			    $(this).attr('rel','themeblvd_lightbox['+gallery_id+']');
			    $(this).addClass('image-button');
			}

			// Remove caption
			$(this).attr( 'title', '' );

		});

	});

	/* Add prettyPhoto's gallery extension */

	var gallery_counter = 1, current_rel = '';

	$('.themeblvd-gallery').each(function(){

		// Filter on gallery extension
		$(this).find('a[rel^="themeblvd_lightbox"], a[rel^="prettyPhoto"]').each(function(){
			current_rel = $(this).attr('rel');
			$(this).attr('rel', current_rel+'[gallery_'+gallery_counter+']' );
		});

		// Increase gallery counter
		gallery_counter++;

	});

	/* Bind prettyPhoto */

	$('a[rel^="prettyPhoto"], a[rel^="themeblvd_lightbox"]').prettyPhoto({
		social_tools: false, // Share icons are not compatible with IE9
		deeplinking: false,
		overlay_gallery: false
		//show_title: false
	});

});