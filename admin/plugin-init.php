<?php
/* "Copyright 2012 A3 Revolution Web Design" This software is distributed under the terms of GNU GENERAL PUBLIC LICENSE Version 3, 29 June 2007 */
/**
 * Install Database, settings option
 */
function wc_product_slider_activated(){
	update_option( 'woo_gallery_widget_lite_version', WC_PRODUCT_SLIDER_VERSION );

	delete_metadata( 'user', 0, $GLOBALS[WC_PRODUCT_SLIDER_PREFIX.'admin_init']->plugin_name . '-' . 'plugin_framework_global_box' . '-' . 'opened', '', true );

	update_option('a3_wc_widget_product_slider_just_installed', true);
}

function wc_product_slider_init() {
	if ( get_option( 'a3_wc_widget_product_slider_just_installed' ) ) {
		delete_option( 'a3_wc_widget_product_slider_just_installed' );

		// Set Settings Default from Admin Init
		$GLOBALS[WC_PRODUCT_SLIDER_PREFIX.'admin_init']->set_default_settings();

		// Build sass
		$GLOBALS[WC_PRODUCT_SLIDER_PREFIX.'less']->plugin_build_sass();
	}

	wc_product_slider_plugin_textdomain();
}

add_action( 'init', 'wc_product_slider_init' );

// Add custom style to dashboard
add_action( 'admin_enqueue_scripts', array( '\A3Rev\WCPSlider\Hook_Filter', 'a3_wp_admin' ) );

// Add text on right of Visit the plugin on Plugin manager page
add_filter( 'plugin_row_meta', array('\A3Rev\WCPSlider\Hook_Filter', 'plugin_extra_links'), 10, 2 );

// Add admin sidebar menu css
add_action( 'admin_enqueue_scripts', array( '\A3Rev\WCPSlider\Hook_Filter', 'admin_sidebar_menu_css' ) );


$GLOBALS[WC_PRODUCT_SLIDER_PREFIX.'admin_init']->init();

// Add upgrade notice to Dashboard pages
add_filter( $GLOBALS[WC_PRODUCT_SLIDER_PREFIX.'admin_init']->plugin_name . '_plugin_extension_boxes', array( '\A3Rev\WCPSlider\Hook_Filter', 'plugin_extension_box' ) );

// Add extra link on left of Deactivate link on Plugin manager page
add_action('plugin_action_links_' . WC_PRODUCT_SLIDER_NAME, array( '\A3Rev\WCPSlider\Hook_Filter', 'settings_plugin_links' ) );

add_action( 'wp_enqueue_scripts', array( '\A3Rev\WCPSlider\Hook_Filter', 'frontend_scripts_register' ), 20 );

// Include google fonts into header
add_action( 'wp_enqueue_scripts', array( '\A3Rev\WCPSlider\Hook_Filter', 'add_google_fonts'), 9 );

global $wc_product_slider_shortcode;
$wc_product_slider_shortcode = new \A3Rev\WCPSlider\Shortcode();

function wc_product_slider_register_widgets() {
	register_widget( '\A3Rev\WCPSlider\Widget\Slider' );
	register_widget( '\A3Rev\WCPSlider\Widget\Carousel' );
}

// Registry Widgets
add_action( 'widgets_init', 'wc_product_slider_register_widgets' );

if ( in_array( basename( $_SERVER['PHP_SELF'] ), array( 'widgets.php' ) ) ) {
	add_action( 'admin_footer', array( '\A3Rev\WCPSlider\Hook_Filter', 'include_admin_script' ) );
}

// Check upgrade functions
add_action( 'init', 'wc_product_slider_lite_upgrade_plugin' );
function wc_product_slider_lite_upgrade_plugin () {

	if( version_compare(get_option('woo_gallery_widget_lite_version'), '1.2.1') === -1 ){
		update_option('woo_gallery_widget_lite_version', '1.2.1');

		// Build sass
		$GLOBALS[WC_PRODUCT_SLIDER_PREFIX.'less']->plugin_build_sass();
	}

	if( version_compare(get_option('woo_gallery_widget_lite_version'), '1.3.1') === -1 ){
		update_option('woo_gallery_widget_lite_version', '1.3.1');

		update_option('wc_widget_product_slider_lite_style_version', time() );
	}

	if( version_compare(get_option('woo_gallery_widget_lite_version'), '1.4.1') === -1 ){
		update_option('woo_gallery_widget_lite_version', '1.4.1');

		global $wc_product_slider_a3_card_skin_card_layout_settings;
		$wc_product_slider_a3_card_skin_card_layout_settings['single_category_text'] = __( 'Category:', 'woocommerce' ) . ' ';
		$wc_product_slider_a3_card_skin_card_layout_settings['multi_category_text'] = __( 'Categories:', 'woocommerce' ) . ' ';
		$wc_product_slider_a3_card_skin_card_layout_settings['single_tag_text'] = __( 'Tag:', 'woocommerce' ) . ' ';
		$wc_product_slider_a3_card_skin_card_layout_settings['multi_tag_text'] = __( 'Tags:', 'woocommerce' ) . ' ';

		update_option( 'wc_product_slider_a3_card_skin_card_layout_settings', $wc_product_slider_a3_card_skin_card_layout_settings );
	}

	// Upgrade to 1.5.0
	if(version_compare(get_option('woo_gallery_widget_lite_version'), '1.5.0') === -1){
		update_option('woo_gallery_widget_lite_version', '1.5.0');
		include( WC_PRODUCT_SLIDER_FILE_PATH. '/includes/updates/update-1.5.0.php' );
	}

	update_option('woo_gallery_widget_lite_version', WC_PRODUCT_SLIDER_VERSION );
}

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
