<?php
/* "Copyright 2012 A3 Revolution Web Design" This software is distributed under the terms of GNU GENERAL PUBLIC LICENSE Version 3, 29 June 2007 */
// File Security Check
if ( ! defined( 'ABSPATH' ) ) exit;
?>
<?php
/**
 * WooCommerce Product Slider Display
 *
 * Table Of Contents
 *
 * dispay_slider_widget()
 * get_title_widget_skin()
 * dispay_slider_card()
 */
class WC_Product_Slider_Display
{

	public static function dispay_slider_widget( $slider_id = '', $slider_settings = array(), $category_link = '', $tag_link = '' ) {

		global $wc_product_slider_widget_skin_settings;

		extract( $wc_product_slider_widget_skin_settings );

		$is_used_mobile_skin = false;

		require_once WC_PRODUCT_SLIDER_DIR . '/classes/class-slider-mobile-display.php';
		$slider_output = WC_Product_Slider_Mobile_Display::mobile_dispay_slider( $slider_id, $is_used_mobile_skin , $slider_settings, $category_link, $tag_link );

		$caption_fx_out = 'fadeOut';
		$caption_fx_in = 'fadeIn';

		$unique_id = rand( 1, 100 );

		$caption_class = '#cycle-widget-skin-caption-' . $unique_id;
		$overlay_class = '#cycle-widget-skin-overlay-' . $unique_id;

		$slider_transition_data 		= WC_Product_Slider_Functions::get_slider_transition( $slider_settings['widget_effect'], $slider_settings );
		$fx 							= $slider_transition_data['fx'];
		$transition_attributes 			= $slider_transition_data['transition_attributes'];
		$timeout 						= $slider_transition_data['timeout'];
		$speed 							= $slider_transition_data['speed'];
		$delay 							= $slider_transition_data['delay'];

		$dynamic_tall = 'false';
		if ( $is_slider_tall_dynamic == 1 ) $dynamic_tall = 'container';

        WC_Product_Slider_Hook_Filter::include_slider_widget_scripts( $slider_transition_data );

		ob_start();
	?>
    <div style="clear:both;"></div>
    <div class="wc-product-slider-widget-skin-container" style="display: none;">
    <?php
    $lazy_load = '';
    $lazy_hidden = '';
    if ( !is_admin() && function_exists( 'a3_lazy_load_enable' ) ) {
        $lazy_load = 'wc-product-slider-lazyload';
        $lazy_hidden = '<div class="a3-cycle-lazy-hidden lazy-hidden"></div>';
    }
    ?>
    <?php echo $lazy_hidden;?>
    <?php if ( $title_position == 'above' ) self::get_title_widget_skin( $unique_id ); ?>

    <div id="wc-product-slider-container-<?php echo $unique_id; ?>" class="wc-product-slider-container wc-product-slider-widget-skin" data-slider-id="<?php echo $slider_id; ?>" data-slider-settings="<?php echo esc_attr( json_encode( $slider_settings ) ); ?>" data-slider-skin-type="widget" >
    	<div style=" <?php if ( $is_slider_tall_dynamic == 0 ) { echo 'height:'.$slider_height_fixed. 'px'; } ?>" id="wc-product-slider-<?php echo $unique_id; ?>" class="wc-product-slider <?php echo $lazy_load; ?> <?php if ( $is_slider_tall_dynamic == 1 ) { ?>wc-product-slider-dynamic-tall<?php } ?>"
        	data-cycle-fx="<?php echo $fx; ?>"
            <?php echo $transition_attributes; ?>

        	data-cycle-timeout=<?php echo $timeout; ?>
            data-cycle-speed=<?php echo $speed; ?>
            data-cycle-delay=<?php echo $delay; ?>
            data-cycle-swipe=true

            data-cycle-prev="> .a3-cycle-controls .cycle-prev"
            data-cycle-next="> .a3-cycle-controls .cycle-next"
            data-cycle-pager="> .cycle-pager-container .cycle-pager-inside .cycle-pager"

            <?php if ( $is_slider_tall_dynamic == 0 ) { ?>
            data-cycle-center-vert=true
            <?php  } ?>
            data-cycle-auto-height=<?php echo $dynamic_tall; ?>
    		data-cycle-center-horz=true

            data-cycle-caption="<?php echo $caption_class; ?>"
            data-cycle-caption-template="{{name}}"
            data-cycle-caption-plugin="caption2"
            data-cycle-caption-fx-out="<?php echo $caption_fx_out; ?>"
            data-cycle-caption-fx-in="<?php echo $caption_fx_in; ?>"

            data-cycle-overlay="<?php echo $overlay_class; ?>"
			data-cycle-overlay-fx-out="<?php echo $caption_fx_out; ?>"
			data-cycle-overlay-fx-in="<?php echo $caption_fx_in; ?>"

            data-cycle-loader=true
        >

        	<div class="a3-cycle-controls" style="display: none;">
            	<span class="cycle-prev-control"><span class="fa fa-angle-left cycle-prev"></span></span>
                <span class="cycle-next-control"><span class="fa fa-angle-right cycle-next"></span></span>
                <span class="cycle-pause-control"><span class="fa fa-pause cycle-pause" data-cycle-cmd="pause" data-cycle-context="#wc-product-slider-<?php echo $unique_id; ?>" onclick="return false;" style=" <?php if ( $slider_settings['slider_auto_scroll'] == 'no' ) { echo 'display:none'; } ?>"></span></span>
                <span class="cycle-play-control"><span class="fa fa-play cycle-play" data-cycle-cmd="resume" data-cycle-context="#wc-product-slider-<?php echo $unique_id; ?>" onclick="return false;" style=" <?php if ( $slider_settings['slider_auto_scroll'] != 'no' ) { echo 'display:none'; } ?>"></span></span>
            </div>

        	<div class="cycle-pager-container" style="display: none;">
            	<div class="cycle-pager-inside">
            		<div class="cycle-pager-overlay"></div>
                	<div class="cycle-pager"></div>
                </div>
            </div>

        </div>

    </div>

    <?php if ( $title_position == 'bellow' ) self::get_title_widget_skin( $unique_id ); ?>

    <div id="cycle-widget-skin-overlay-<?php echo $unique_id; ?>" class="cycle-widget-skin-product-linked-container"></div>

    <?php if ( $enable_category_link == 1 && trim( $category_link ) != '' ) { ?>
    <div class="cycle-widget-skin-category-linked-container"><a class="cycle-category-linked" href="<?php echo esc_attr( $category_link ); ?>"><?php echo trim( $category_link_text ); ?></a></div>
    <?php } ?>

    <?php if ( $enable_tag_link == 1 && trim( $tag_link ) != '' ) { ?>
    <div class="cycle-widget-skin-tag-linked-container"><a class="cycle-tag-linked" href="<?php echo esc_attr( $tag_link ); ?>"><?php echo trim( $tag_link_text ); ?></a></div>
    <?php } ?>

    </div>
    <div style="clear:both;"></div>
    <?php
		$slider_output .= ob_get_clean();

		return str_replace( array("\r\n", "\r", "\n"), '', $slider_output );

	}

	public static function get_title_widget_skin( $unique_id = 1 ) {
	?>
		<div id="cycle-widget-skin-caption-<?php echo $unique_id; ?>" class="cycle-widget-skin-product-name-container"></div>
    <?php
	}

}
?>