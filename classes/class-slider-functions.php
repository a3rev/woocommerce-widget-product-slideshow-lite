<?php
/* "Copyright 2012 A3 Revolution Web Design" This software is distributed under the terms of GNU GENERAL PUBLIC LICENSE Version 3, 29 June 2007 */
/**
 * WooCommerce Product Slider Widget Functions
 *
 * Hook anf Filter into woocommerce plugin
 *
 * Table Of Contents
 *
 *
 * plugins_loaded()
 * create_page()
 */
class WC_Product_Slider_Functions
{

	/**
	 * get_template_image_file_info( $file )
	 *
	 * @access public
	 * @since 3.8
	 * @param $file string filename
	 * @return PATH to the file
	 */
	public static function get_template_image_file_info( $file = '' ) {
		// If we're not looking for a file, do not proceed
		if ( empty( $file ) )
			return;

		// Look for file in stylesheet
		$image_info = array();
		if ( file_exists( get_stylesheet_directory() . '/images/' . $file ) ) {
			$file_url = get_stylesheet_directory_uri() . '/images/' . $file;
			list($current_width, $current_height) = getimagesize(get_stylesheet_directory() . '/images/' . $file);
			$image_info['url'] = $file_url;
			$image_info['width'] = $current_width;
			$image_info['height'] = $current_height;
		// Look for file in template
		} elseif ( file_exists( get_template_directory() . '/images/' . $file ) ) {
			$file_url = get_template_directory_uri() . '/images/' . $file;
			list($current_width, $current_height) = getimagesize(get_template_directory() . '/images/' . $file);
			$image_info['url'] = $file_url;
			$image_info['width'] = $current_width;
			$image_info['height'] = $current_height;
		// Backwards compatibility
		} else {
			$woocommerce_db_version = get_option( 'woocommerce_db_version', null );
			$file_url = ( ( version_compare( $woocommerce_db_version, '2.1', '<' ) ) ? woocommerce_placeholder_img_src() : wc_placeholder_img_src() );
			list($current_width, $current_height) = getimagesize($file_url);
			$image_info['url'] = $file_url;
			$image_info['width'] = $current_width;
			$image_info['height'] = $current_height;
		}

		if ( is_ssl() ) {
			$file_url = str_replace('http://', 'https://', $file_url);
			$image_info['url'] = $file_url;
		}

		return $image_info;
	}

	public static function limit_words($str='',$len=100,$more=true) {
		if (trim($len) == '' || $len < 0) $len = 100;
	   if ( $str=="" || $str==NULL ) return $str;
	   if ( is_array($str) ) return $str;
	   $str = trim($str);
	   $str = strip_tags($str);
	   if ( strlen($str) <= $len ) return $str;
	   $str = substr($str,0,$len);
	   if ( $str != "" ) {
			if ( !substr_count($str," ") ) {
					  if ( $more ) $str .= " ...";
					return $str;
			}
			while( strlen($str) && ($str[strlen($str)-1] != " ") ) {
					$str = substr($str,0,-1);
			}
			$str = substr($str,0,-1);
			if ( $more ) $str .= " ...";
			}
			return $str;
	}

	public static function slider_transitions_list () {
		$arr_effect = array(
			'none'			=> __( 'None', 'woo-widget-product-slideshow' ),
			'random'		=> __( 'Random', 'woo-widget-product-slideshow' ),
			'fade'			=> __( 'Fade', 'woo-widget-product-slideshow' ),
			'fadeout'		=> __( 'Fade Out', 'woo-widget-product-slideshow' ),
			'scrollHorz'	=> __( 'Scroll Horizontal', 'woo-widget-product-slideshow' ),
			'scrollVert'	=> __( 'Scroll Vertical', 'woo-widget-product-slideshow' ),
			'flipHorz'		=> __( 'Flip Horizontal', 'woo-widget-product-slideshow' ),
			'flipVert'		=> __( 'Flip Vertical', 'woo-widget-product-slideshow' ),
		);

		return $arr_effect;
	}

	public static function card_slider_transitions_list () {
		$arr_effect = array(
			'fade'			=> __( 'Fade', 'woo-widget-product-slideshow' ),
			'fadeout'		=> __( 'Fade Out', 'woo-widget-product-slideshow' ),
			'scrollHorz'	=> __( 'Scroll Horizontal', 'woo-widget-product-slideshow' ),
			'scrollVert'	=> __( 'Scroll Vertical', 'woo-widget-product-slideshow' ),
		);

		return $arr_effect;
	}

	public static function get_slider_transition( $slider_transition_effect = '', $slider_settings = array() ) {

		$fx = $slider_transition_effect;
		$transition_attributes = '';
		$timeout = (int) $slider_settings['effect_timeout'] * 1000;
		$delay = (int) $slider_settings['effect_delay'] * 1000;
		$speed = (int) $slider_settings['effect_speed'] * 1000;

		if ( $slider_settings['slider_auto_scroll'] == 'no' ) {
			$transition_attributes .= 'data-cycle-paused=true' . " \n";
		}

		$transition_effect = array(
			'fx'					=> $fx,
			'timeout'				=> $timeout,
			'delay'					=> $delay,
			'speed'					=> $speed,
			'transition_attributes'	=> $transition_attributes
		);

		return $transition_effect;
	}

	public static function get_transition_random( $slider_settings = array() ) {
		$slider_transitions_list = self::slider_transitions_list();
		unset( $slider_transitions_list['none'] );
		unset( $slider_transitions_list['random'] );

		$transition_random = array_rand( $slider_transitions_list );

		$transition_effect = self::get_slider_transition( $transition_random, $slider_settings );

		$transition_ouput = ' data-cycle-fx="'.$transition_effect['fx'].'" '.$transition_effect['transition_attributes'].' ';

		return $transition_ouput;

	}

	public static function get_kenburns_positions() {
		$position_options = array(
			'random'	=> __( 'Random', 'woo-widget-product-slideshow' ),
			'tl'		=> __( 'Top Left', 'woo-widget-product-slideshow' ),
			'tc'		=> __( 'Top Center', 'woo-widget-product-slideshow' ),
			'tr'		=> __( 'Top Right', 'woo-widget-product-slideshow' ),
			'cl'		=> __( 'Center Left', 'woo-widget-product-slideshow' ),
			'cc'		=> __( 'Center Center', 'woo-widget-product-slideshow' ),
			'cr'		=> __( 'Center Right', 'woo-widget-product-slideshow' ),
			'bl'		=> __( 'Bottom Left', 'woo-widget-product-slideshow' ),
			'bc'		=> __( 'Bottom Center', 'woo-widget-product-slideshow' ),
			'br'		=> __( 'Bottom Right', 'woo-widget-product-slideshow' ),
		);

		return $position_options;
	}

	public static function get_kenburns_transition( $slider_settings = array() ) {

		$fx = 'kenburns';
		$transition_attributes = '';
		$timeout = (int) $slider_settings['kb_slider_timeout'] * 1000;
		$delay = (int) $slider_settings['kb_slider_delay'] * 1000;
		$speed = (int) $slider_settings['kb_slider_speed'] * 1000;

		if ( $slider_settings['kb_is_auto_start'] == 0 ) {
			$transition_attributes .= 'data-cycle-paused=true' . " \n";
		}
		$transition_attributes .= 'data-cycle-kbzoom='.$slider_settings['data-cycle-kbzoom']. " \n";
		$transition_attributes .= 'data-cycle-kbduration='.$slider_settings['data-cycle-kbduration']. " \n";
		$transition_attributes .= 'data-cycle-start-pos='.$slider_settings['data-cycle-startPos']. " \n";
		$transition_attributes .= 'data-cycle-end-pos='.$slider_settings['data-cycle-endPos']. " \n";

		$transition_effect = array(
			'fx'					=> $fx,
			'timeout'				=> $timeout,
			'delay'					=> $delay,
			'speed'					=> $speed,
			'transition_attributes'	=> $transition_attributes
		);

		return $transition_effect;
	}
}
?>