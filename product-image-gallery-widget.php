<?php
/*
Plugin Name: Product Widget Slider for WooCommerce
Description: Adds visually stunning WooCommerce product sliders to any widgeted area. Fully customizable, Widget Skin. Fully mobile responsive. Show any number of products from a selected product category.
Version: 2.2.3
Author: a3rev Software
Author URI: https://a3rev.com/
Requires at least: 6.0
Tested up to: 6.6
Text Domain: woo-widget-product-slideshow
Domain Path: /languages
WC requires at least: 6.0
WC tested up to: 9.0
License: GPLv2 or later

	WooCommerce Widget Product Slider Lite plugin.
	Copyright © 2011 A3 Revolution Software Development team

	A3 Revolution Software Development team
	admin@a3rev.com
	PO Box 1170
	Gympie 4570
	QLD Australia
*/
?>
<?php
define('WC_PRODUCT_SLIDER_FILE_PATH', dirname(__FILE__));
define('WC_PRODUCT_SLIDER_DIR_NAME', basename(WC_PRODUCT_SLIDER_FILE_PATH));
define('WC_PRODUCT_SLIDER_FOLDER', dirname(plugin_basename(__FILE__)));
define('WC_PRODUCT_SLIDER_NAME', plugin_basename(__FILE__));
define('WC_PRODUCT_SLIDER_URL', untrailingslashit(plugins_url('/', __FILE__)));
define('WC_PRODUCT_SLIDER_DIR', WP_PLUGIN_DIR . '/' . WC_PRODUCT_SLIDER_FOLDER);
define('WC_PRODUCT_SLIDER_IMAGES_URL', WC_PRODUCT_SLIDER_URL . '/assets/images');
define('WC_PRODUCT_SLIDER_JS_URL', WC_PRODUCT_SLIDER_URL . '/assets/js');
define('WC_PRODUCT_SLIDER_EXTENSION_JS_URL', WC_PRODUCT_SLIDER_JS_URL . '/cycle2-extensions');
define('WC_PRODUCT_SLIDER_CSS_URL', WC_PRODUCT_SLIDER_URL . '/assets/css');

if (!defined("WC_PRODUCT_SLIDER_DOCS_URI")) define("WC_PRODUCT_SLIDER_DOCS_URI", "http://docs.a3rev.com/user-guides/plugins-extensions/woocommerce-product-slider/");
if (!defined("WC_PRODUCT_SLIDER_VERSION_URI")) define("WC_PRODUCT_SLIDER_VERSION_URI", "http://a3rev.com/shop/woocommerce-product-slider/");
if (!defined("WC_CAROUSEL_SLIDER_VERSION_URI")) define("WC_CAROUSEL_SLIDER_VERSION_URI", "http://a3rev.com/shop/woocommerce-carousel-slider/");

define( 'WC_PRODUCT_SLIDER_KEY', 'woo_gallery_widget' );
define( 'WC_PRODUCT_SLIDER_PREFIX', 'wc_product_slider_' );
define( 'WC_PRODUCT_SLIDER_VERSION', '2.2.3' );
define( 'WC_PRODUCT_SLIDER_G_FONTS', true );

// declare compatibility with new HPOS of WooCommerce
add_action( 'before_woocommerce_init', function() {
	if ( class_exists( \Automattic\WooCommerce\Utilities\FeaturesUtil::class ) ) {
		\Automattic\WooCommerce\Utilities\FeaturesUtil::declare_compatibility( 'custom_order_tables', __FILE__, true );
	}
} );

use \A3Rev\WCPSlider\FrameWork;

if ( version_compare( PHP_VERSION, '5.6.0', '>=' ) ) {
	require __DIR__ . '/vendor/autoload.php';

	// Product Slider API
	global $wc_product_slider_legacy_api;
	$wc_product_slider_legacy_api = new \A3Rev\WCPSlider\Legacy_API();

	global $wc_product_slider_wpml;
	$wc_product_slider_wpml = new \A3Rev\WCPSlider\WPML();

	/**
	 * Plugin Framework init
	 */
	$GLOBALS[WC_PRODUCT_SLIDER_PREFIX.'admin_interface'] = new FrameWork\Admin_Interface();

	global $wc_product_slider_settings_page;
	$wc_product_slider_settings_page = new FrameWork\Pages\Product_Slider();

	$GLOBALS[WC_PRODUCT_SLIDER_PREFIX.'admin_init'] = new FrameWork\Admin_Init();

	$GLOBALS[WC_PRODUCT_SLIDER_PREFIX.'less'] = new FrameWork\Less_Sass();

	// End - Plugin Framework init

	global $wc_product_slider_hook_backbone;
	$wc_product_slider_hook_backbone = new \A3Rev\WCPSlider\Backbone();

	global $wp_version;
	if ( version_compare( $wp_version, '5.5', '>=' ) ) {
		// Gutenberg Blocks init
		global $wc_pslider_blocks;
		$wc_pslider_blocks = new \A3Rev\WCPSlider\Blocks();

		require 'src/blocks/slider/block.php';
	}

} else {
	return;
}

/**
 * Load Localisation files.
 *
 * Note: the first-loaded translation file overrides any following ones if the same translation is present.
 *
 * Locales found in:
 * 		- WP_LANG_DIR/woo-widget-product-slideshow/woo-widget-product-slideshow-LOCALE.mo
 * 	 	- /wp-content/plugins/woo-widget-product-slideshow/languages/woo-widget-product-slideshow-LOCALE.mo (which if not found falls back to)
 * 	 	- WP_LANG_DIR/plugins/woo-widget-product-slideshow-LOCALE.mo
 */
function wc_product_slider_plugin_textdomain() {
	$locale = apply_filters( 'plugin_locale', get_locale(), 'woo-widget-product-slideshow' );

	load_textdomain( 'woo-widget-product-slideshow', WP_LANG_DIR . '/woo-widget-product-slideshow/woo-widget-product-slideshow-' . $locale . '.mo' );
	load_plugin_textdomain( 'woo-widget-product-slideshow', false, WC_PRODUCT_SLIDER_FOLDER . '/languages/' );
}

include 'admin/plugin-init.php';

/**
 * Call when the plugin is activated
 */
register_activation_hook(__FILE__, 'wc_product_slider_activated');
