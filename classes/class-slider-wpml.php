<?php
/**
 * a3 Slider WPML Class
 *
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

class WC_Product_Slider_WPML
{
	public $plugin_wpml_name = 'WooCommerce Widget Product Slider';

	public function __construct() {

		add_action( 'plugins_loaded', array( $this, 'plugins_loaded' ) );

		$this->wpml_ict_t();

	}

	/**
	 * Register WPML String when plugin loaded
	 */
	public function plugins_loaded() {
		$this->wpml_register_dynamic_string();
		$this->wpml_register_static_string();
	}

	/**
	 * Get WPML String when plugin loaded
	 */
	public function wpml_ict_t() {

		$plugin_name = WC_PRODUCT_SLIDER_KEY;

		add_filter( $plugin_name . '_' . 'wc_product_slider_card_skin_settings' . '_get_settings', array( $this, 'ict_t_wc_product_slider_card_skin_settings' ) );

		add_filter( $plugin_name . '_' . 'wc_product_slider_widget_skin_settings' . '_get_settings', array( $this, 'ict_t_wc_product_slider_widget_skin_settings' ) );

		add_filter( $plugin_name . '_' . 'wc_product_slider_mobile_skin_settings' . '_get_settings', array( $this, 'ict_t_wc_product_slider_mobile_skin_settings' ) );

	}

	// Card Skin Settings
	public function ict_t_wc_product_slider_card_skin_settings( $current_settings = array() ) {
		if ( is_array( $current_settings ) && isset( $current_settings['single_category_text'] ) ) {
			$current_settings['single_category_text'] = apply_filters( 'wpml_translate_single_string', $current_settings['single_category_text'], $this->plugin_wpml_name, 'Card Skin - Single Category Text' );
		}

		if ( is_array( $current_settings ) && isset( $current_settings['multi_category_text'] ) ) {
			$current_settings['multi_category_text'] = apply_filters( 'wpml_translate_single_string', $current_settings['multi_category_text'], $this->plugin_wpml_name, 'Card Skin - Multi Categories Text' );
		}

		if ( is_array( $current_settings ) && isset( $current_settings['single_tag_text'] ) ) {
			$current_settings['single_tag_text'] = apply_filters( 'wpml_translate_single_string', $current_settings['single_tag_text'], $this->plugin_wpml_name, 'Card Skin - Single Tag Text' );
		}

		if ( is_array( $current_settings ) && isset( $current_settings['multi_tag_text'] ) ) {
			$current_settings['multi_tag_text'] = apply_filters( 'wpml_translate_single_string', $current_settings['multi_tag_text'], $this->plugin_wpml_name, 'Card Skin - Multi Tags Text' );
		}

		return $current_settings;
	}

	// Widget Skin Settings
	public function ict_t_wc_product_slider_widget_skin_settings( $current_settings = array() ) {
		if ( is_array( $current_settings ) && isset( $current_settings['category_link_text'] ) ) {
			$current_settings['category_link_text'] = apply_filters( 'wpml_translate_single_string', $current_settings['category_link_text'], $this->plugin_wpml_name, 'Widget Skin - Category Link Text' );
		}

		if ( is_array( $current_settings ) && isset( $current_settings['tag_link_text'] ) ) {
			$current_settings['tag_link_text'] = apply_filters( 'wpml_translate_single_string', $current_settings['tag_link_text'], $this->plugin_wpml_name, 'Widget Skin - Tag Link Text' );
		}

		if ( is_array( $current_settings ) && isset( $current_settings['product_link_text'] ) ){
			$current_settings['product_link_text'] = apply_filters( 'wpml_translate_single_string', $current_settings['product_link_text'], $this->plugin_wpml_name, 'Widget Skin - View Produc Text' );
		}

		return $current_settings;
	}

	// Mobile Skin Settings
	public function ict_t_wc_product_slider_mobile_skin_settings( $current_settings = array() ) {
		if ( is_array( $current_settings ) && isset( $current_settings['category_link_text'] ) ) {
			$current_settings['category_link_text'] = apply_filters( 'wpml_translate_single_string', $current_settings['category_link_text'], $this->plugin_wpml_name, 'Mobile Skin - Category Link Text' );
		}

		if ( is_array( $current_settings ) && isset( $current_settings['tag_link_text'] ) ) {
			$current_settings['tag_link_text'] = apply_filters( 'wpml_translate_single_string', $current_settings['tag_link_text'], $this->plugin_wpml_name, 'Mobile Skin - Tag Link Text' );
		}

		return $current_settings;
	}

	// Registry Dynamic String for WPML
	public function wpml_register_dynamic_string() {
		global $wc_product_slider_admin_interface;

		$wc_product_slider_card_skin_settings = array_map( array( $wc_product_slider_admin_interface, 'admin_stripslashes' ), get_option( 'wc_product_slider_card_skin_settings', array() ) );

		$wc_product_slider_widget_skin_settings = array_map( array( $wc_product_slider_admin_interface, 'admin_stripslashes' ), get_option( 'wc_product_slider_widget_skin_settings', array() ) );

		$wc_product_slider_mobile_skin_settings = array_map( array( $wc_product_slider_admin_interface, 'admin_stripslashes' ), get_option( 'wc_product_slider_mobile_skin_settings', array() ) );

		// Card Skin Settings
		do_action( 'wpml_register_single_string', $this->plugin_wpml_name, 'Card Skin - Single Category Text', $wc_product_slider_card_skin_settings['single_category_text'] );
		do_action( 'wpml_register_single_string', $this->plugin_wpml_name, 'Card Skin - Multi Categories Text', $wc_product_slider_card_skin_settings['multi_category_text'] );
		do_action( 'wpml_register_single_string', $this->plugin_wpml_name, 'Card Skin - Single Tag Text', $wc_product_slider_card_skin_settings['single_tag_text'] );
		do_action( 'wpml_register_single_string', $this->plugin_wpml_name, 'Card Skin - Multi Tags Text', $wc_product_slider_card_skin_settings['multi_tag_text'] );

		// Widget Skin Category Tag Link Settings
		do_action( 'wpml_register_single_string', $this->plugin_wpml_name, 'Widget Skin - Category Link Text', $wc_product_slider_widget_skin_settings['category_link_text'] );
		do_action( 'wpml_register_single_string', $this->plugin_wpml_name, 'Widget Skin - Tag Link Text', $wc_product_slider_widget_skin_settings['tag_link_text'] );

		// Widget Skin Product Link Settings
		do_action( 'wpml_register_single_string', $this->plugin_wpml_name, 'Widget Skin - View Product Text', $wc_product_slider_widget_skin_settings['product_link_text'] );

		// Mobile Skin Category Tag Link Settings
		do_action( 'wpml_register_single_string', $this->plugin_wpml_name, 'Mobile Skin - Category Link Text', $wc_product_slider_mobile_skin_settings['category_link_text'] );
		do_action( 'wpml_register_single_string', $this->plugin_wpml_name, 'Mobile Skin - Tag Link Text', $wc_product_slider_mobile_skin_settings['tag_link_text'] );
	}

	// Registry Static String for WPML
	public function wpml_register_static_string() {
		if ( function_exists('icl_register_string') ) {
		}
	}

}

global $wc_product_slider_wpml;
$wc_product_slider_wpml = new WC_Product_Slider_WPML();

function wc_product_slider_ict_t_e( $name, $string ) {
	global $wc_product_slider_wpml;
	$string = ( function_exists('icl_t') ? icl_t( $wc_product_slider_wpml->plugin_wpml_name, $name, $string ) : $string );

	echo $string;
}

function wc_product_slider_ict_t__( $name, $string ) {
	global $wc_product_slider_wpml;
	$string = ( function_exists('icl_t') ? icl_t( $wc_product_slider_wpml->plugin_wpml_name, $name, $string ) : $string );

	return $string;
}
?>