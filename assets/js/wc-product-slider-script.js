(function($) {
$(function(){

	WC_Product_Slider_Frontend = {

		clickPauseResumEvent: function () {
			$(document).on( 'cycle-paused', '.wc-product-slider-container', function( event, opts ) {
				$(this).find( '.cycle-pause' ).hide();
				$(this).find( '.cycle-play' ).show();
			});
			$(document).on( 'cycle-resumed', '.wc-product-slider-container', function( event, opts ) {
				$(this).find( '.cycle-pause' ).show();
				$(this).find( '.cycle-play' ).hide();
			});
		},

		autoSetSizesForImage: function() {
			$(document).on( 'cycle-initialized', '.wc-product-slider-container', function( event, opts ) {
				max_width        = $(this).innerWidth();
				slider_skin_type = $(this).data('slider-skin-type');
				if ( typeof slider_skin_type !== 'undefined' && 'carousel' == slider_skin_type ) {
					carousel_visible = parseInt( $(this).find('.wc-product-slider').data('cycle-carousel-visible') );
					if ( typeof carousel_visible === 'undefined' || carousel_visible < 1 ) {
						carousel_visible = 1;
					}
					max_width = $(this).innerWidth() / carousel_visible;
				}
				$(this).find('.cycle-wc-product-image').each( function( obj ) {
					$(this).attr( 'sizes', '(max-width: ' + max_width + 'px) 100vw, ' + max_width + 'px');
				});
			});
		}
	}


	WC_Product_Slider_Frontend.clickPauseResumEvent();
	//WC_Product_Slider_Frontend.autoSetSizesForImage();

});
})(jQuery);