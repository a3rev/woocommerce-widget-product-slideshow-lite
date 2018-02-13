<?php
/*
Plugin Name: WooCommerce Widget Product Slider LITE
Description: Adds visually stunning WooCommerce product sliders to any widgeted area. Fully customizable, Widget Skin. Fully mobile responsive. Show any number of products from a selected product category.
Version: 1.6.2
Author: a3rev Software
Author URI: https://a3rev.com/
Requires at least: 4.5
Tested up to: 4.9.4
Text Domain: woo-widget-product-slideshow
Domain Path: /languages
WC requires at least: 2.0.0
WC tested up to: 3.3.1
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
define( 'WC_PRODUCT_SLIDER_VERSION', '1.6.2' );

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

// Product Slider API
include ('includes/class-legacy-api.php');

include ('admin/admin-ui.php');
include ('admin/admin-interface.php');

include ('admin/admin-pages/settings-page.php');

include ('admin/admin-init.php');
include ('admin/less/sass.php');

include 'classes/class-slider-display.php';
include 'classes/class-slider-functions.php';
include 'classes/class-slider-hook-filter.php';

include 'shortcodes/class-slider-shortcodes.php';

include 'classes/class-slider-backbone.php';

include 'widget/class-slider-widget.php';
include 'widget/class-carousel-widget.php';

include 'admin/plugin-init.php';

/**
 * Call when the plugin is activated
 */
register_activation_hook(__FILE__, 'wc_product_slider_activated');

?>