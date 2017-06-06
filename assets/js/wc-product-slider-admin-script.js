(function($) {
$(function(){

	$(document).on( 'change', 'select.wc_product_slider_show_type', function() {
		var show_type_id = $(this).attr('id');
		var show_type_value = $(this).val();
		if ( show_type_value == 'category' ) {
			$( '#' + show_type_id + '_category').slideDown();
			$( '#' + show_type_id + '_tag').slideUp();
			$( '#' + show_type_id + '_filter').slideDown();
		} else if ( show_type_value == 'tag' ) {
			$( '#' + show_type_id + '_category').slideUp();
			$( '#' + show_type_id + '_tag').slideDown();
			$( '#' + show_type_id + '_filter').slideDown();
		} else {
			$( '#' + show_type_id + '_category').slideUp();
			$( '#' + show_type_id + '_tag').slideUp();
			$( '#' + show_type_id + '_filter').slideUp();
		}
	});

	$(document).on( 'change', 'input.wc_product_slider_skin_type', function() {
		var skin_type_id = $(this).attr('data-id');
		var skin_type_value = $( this ).val();
		if ( skin_type_value == 'widget') {
			$( '#' + skin_type_id + '_card').slideUp();
		} else {
			$( '#' + skin_type_id + '_card').slideDown();
		}
	});

	$(document).on( 'change', 'input.wc_product_slider_slider_auto_scroll', function() {
		var slider_auto_scroll_id = $(this).attr('data-id');
		var slider_auto_scroll_value = $( this ).val();
		if ( slider_auto_scroll_value == 'yes') {
			$( '#' + slider_auto_scroll_id + '_auto').slideDown();
		} else {
			$( '#' + slider_auto_scroll_id + '_auto').slideUp();
		}
	});

});
})(jQuery);