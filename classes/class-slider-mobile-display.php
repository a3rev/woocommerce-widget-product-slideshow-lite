<?php
class WC_Product_Slider_Mobile_Display
{	
	public static function mobile_dispay_slider( $slider_id = '', $is_used_mobile_skin = false , $slider_settings = array(), $category_link = '', $tag_link = '' ) {

		// slider id
		$slider_query_string = base64_decode( $slider_id );
		$slider_data = array();
		parse_str( $slider_query_string, $slider_data );
		$slider_data['show_type'] = 'mobile';
		unset( $slider_data['widget_effect'] );
		$slider_id = '';
		$command = '';
		foreach ( $slider_data as $key => $value ) {
			$slider_id .= $command.$key.'='.$value;
			$command = '&';
		}
		$slider_id = base64_encode( $slider_id );
		
		$slider_settings['skin_type'] = 'mobile';
		$slider_settings['is_used_mobile_skin'] = $is_used_mobile_skin;
		$slider_settings['category_link'] = $category_link;
		$slider_settings['tag_link'] = $tag_link;
				
		add_action( 'wp_footer', array( 'WC_Product_Slider_Hook_Filter', 'include_slider_mobile_scripts' ) );

		$caption_fx_out = 'fadeOut';
		$caption_fx_in = 'fadeIn';
		
		$unique_id = rand( 1, 100 );
				
		$overlay_class = '#cycle-mobile-skin-overlay-' . $unique_id;
		
		$fx 							= 'scrollHorz';
		ob_start();

	?>
    <div style="clear:both;"></div>
    <div class="wc-product-slider-mobile-skin-container wc-product-slider-basic-mobile-skin-container" style="display: none;">
	<?php
    $lazy_load = '';
    $lazy_hidden = '';
    if ( !is_admin() && function_exists( 'a3_lazy_load_enable' ) ) {
        $lazy_load = 'wc-product-slider-lazyload';
        $lazy_hidden = '<div class="a3-cycle-lazy-hidden lazy-hidden"></div>';
    }
    ?>
    <?php echo $lazy_hidden;?>
    <div id="wc-product-slider-container-<?php echo $unique_id; ?>" class="wc-product-slider-container wc-product-slider-mobile-skin" data-slider-id="<?php echo $slider_id; ?>" data-slider-settings="<?php echo esc_attr( json_encode( $slider_settings ) ); ?>" data-slider-skin-type="mobile" >
    	<div id="wc-product-slider-<?php echo $unique_id; ?>" class="wc-product-slider <?php echo $lazy_load; ?>"
        	data-cycle-fx="<?php echo $fx; ?>"
            data-cycle-paused=true
            data-cycle-auto-height=container
            
            data-cycle-center-horz=true
            
            data-cycle-swipe=true
            
            data-cycle-caption="> .cycle-caption-container .cycle-caption"
            data-cycle-caption-template="{{slideNum}} / {{slideCount}}"
            data-cycle-caption-plugin="caption2"

            data-cycle-loader=true
        >

        	<div class="cycle-caption-container">
            	<div class="cycle-caption-inside">
            		<div class="cycle-caption-overlay"></div>
                	<div class="cycle-caption"></div>
                </div>
            </div>
            
        </div>
    	<div class="wc-product-slider-bg"></div>
    </div>

    </div>
    
    <?php
		$slider_output = ob_get_clean();
		
		return str_replace( array("\r\n", "\r", "\n"), '', $slider_output );
		
	}
	
	public static function get_caption_mobile_template( $unique_id = 1 ) {
	?>
		<div id="cycle-mobile-skin-overlay-<?php echo $unique_id; ?>" class="cycle-mobile-skin-overlay"></div>
    <?php	
	}
	
}
?>