=== Product Widget Slider for WooCommerce ===

Contributors: a3rev, nguyencongtuan
Tags: WooCommerce widgets, WooCommerce, WooCommerce widget product slideshow, WooCommerce Product images, woothemes, wordpress ecommerce
Requires at least: 6.0
Tested up to: 6.6
Stable tag: 2.2.3
License: GPLv3
License URI: http://www.gnu.org/licenses/gpl-3.0.html

Beautifully lightweight, mobile & tablet responsive Product Widget Slider for WooCommerce plugin that packs a powerful marketing punch

== DESCRIPTION ==

Product Widget Slider for WooCommerce enables you to create slick Product Sliders in any sidebar or widgetized area on your site. Home page, Footer, multiple sidebars.

= KEY FEATURES =

* Creates an eye catching product slideshow in any widgetized area or sidebar.
* Fully mobile and tablet responsive.
* Shows products from any selected product category.
* Set to show any number of products.
* Fully customizable Widget Slider skin style and layout.
* Touch swipe slider images in mobiles.
* 7 different image transition effect plus random.
* Image transition effects timing controls.
* Optimized for all browsers
* Lightweight, fast and powerful.

= WIDGET SKIN FEATURES =

Featuring Dynamic Style options. The Widget skin has over 70 options for creating your perfect Widget Product Slider to match your site design. All without touching the code.


= ADD SLIDER BY WIDGET =

Use the Woo Product Slider on your widget menu to add Product Sliders to any widgeted area on your site. The widget admin menu allows you to set:

* Product Category that slider images will be displayed from
* The number of products the slider will show in 1 full cycle (repeating)
* Select the Image transition effect (8 effects to choose from plus random).
* Set Slider transition Method, Auto or Manual.
* If set at Auto start, then set auto start delay in seconds.
* Set time between each transition in seconds (how long each product is visible in the slider)
* Set the speed of the transition.
* Set the image size

= PREMIUM VERSION =

If you try Widget Slider & Carousel for WooCommerce and like it but find there is a feature it does not have ... there are 2 upgrade Premium versions available.

* [Premium Product Slider and Carousel](https://a3rev.com/shop/woocommerce-carousel-slider/)

= CONTRIBUTE =

When you download Product Widget Slider for WooCommerce, you join our the a3rev Software community. Regardless of if you are a WordPress beginner or experienced developer if you are interested in contributing to the future development of this plugin head over to the WProduct Widget Slider for WooCommerce[GitHub Repository](https://github.com/a3rev/woocommerce-widget-product-slideshow-lite) to find out how you can contribute.

Want to add a new language? You can contribute via [translate.wordpress.org](https://translate.wordpress.org/projects/wp-plugins/woo-widget-product-slideshow)

== Installation ==

= Minimum Requirements =

* PHP version 7.4 or greater is recommended
* MySQL version 5.6 or greater is recommended


== Screenshots ==

1. Screenshot shows the Sidebar widget control panel on the left and the image on the right is how it looks on the front end.


== Usage ==

1. WP admin > Appearance > Widgets

2. Drag and drop the Product Widget Slideshow into any widgetized area / sidebar.

3. Configure settings on the widget and click save.

4. Place and configure as many Product Slideshow widgets as you want.

5. Go to WP-admin > Product Slider > Widget Skin

6. Use the settings to create your unique Widget skin layout and style.

7. Have fun.

== Frequently Asked Questions ==

= When can I use this plugin? =

You can use this plugin only when you have installed the WooCommerce plugin.


== Changelog ==

= 2.2.3 - 2024/07/13 =
* This release has various tweaks for compatibility with WordPress 6.6 and WooCommerce 8.9.3.
* Tweak - Tested for compatibility with WordPress 6.6
* Tweak - Tested for compatibility with WooCommerce 8.9.3

= 2.2.2 - 2023/11/22 =
* This maintenance release has plugin framework updates for compatibility with PHP 8.1 onwards, a WPML compatibility fix plus update backward compatibility to WooCommerce 6.0.
* Tweak - Remove backward compatibility for WooCommerce versions less than 6.0
* Framework - Set parameter number of preg_match function from null to 0 for compatibility with PHP 8.1 onwards
* Framework - Validate empty before call trim for option value
* Fix - Do not registry wpml string text for text that does not exist from settings

= 2.2.1 - 2023/10/30 =
* This maintenance release has a Code Tweak for compatibility with WordPress 6.4 and WooCommerce 8.2
* Tweak - Tested for compatibility with WordPress 6.4
* Tweak - Tested for compatibility with WooCommerce 8.2
* Tweak - Call add action to 'enqueue_block_assets' instead of 'enqueue_block_editor_assets' for enqueue style inside iframe of Gutenberg.

= 2.2.0 - 2023/09/07 =
* This feature release adds a "Products Slider" Block for use with Gutenberg templates. Also compatibility with WooCommerce 8.0.3 and WordPress 6.3
* Feature - Define new "Products Slider" block to show product slider on Gutenberg Block templates pages.
* Tweak - Test for compatibility with WooCommerce 8.0.3
* Tweak - Test for compatibility with WordPress 6.3.0
* Fix - New Product Slider Block resolves issues that the product slider shortcode has with Gutenberg templates.

= 2.1.0 - 2023/04/25 =
* This release has compatibility with WordPress 6.2.0, WooCommerce 7.6.0 plus declared compatibility with WooCommerce HPOS.
* Tweak - Test for compatibility with WordPress 6.2
* Tweak - Test for compatibility with WooCommerce 7.6.0
* Tweak - Test and declare plugin compatibility with WooCommerce HPOS Custom Tables.

= 2.0.0 - 2023/01/03 =
* This feature release removes the fontawesome lib and replaces icons with SVGs plus adds Default Topography option to font controls and has compatibility with WooCommerce 7.2
* Feature - Convert icon from font awesome to SVG
* Feature - Update styling for new SVG icons
* Tweak - Test for compatibility with WooCommerce 7.2
* Plugin Framework - Update typography control from plugin framework to add support for Default value
* Plugin Framework - Default value will get fonts set in the theme.
* Plugin Framework - Change generate typography style for change on typography control
* Plugin Framework - Remove fontawesome lib

= 1.9.2 - 2022/11/01 =
* This maintenance release has a security vulnerability patch, plus compatibility with WordPress major version 6.1.0 and WooCommerce version 7.0
* Tweak - Test for compatibility with WordPress 6.1
* Tweak - Test for compatibility with WooCommerce 7.0
* Security – This release has a patch for a security vulnerability

= 1.9.1 - 2022/05/25 =
* This release fixes a bug with the just released version 1.9.0
* Fix - Do not call update_google_map_api_key from construct of Admin UI

= 1.9.0 - 2022/05/24 =
* This release is for compatibility with WordPress major version 6.0 and WooCommerce version 6.5.1. It and includes various code tweaks and tweaks to harden security.
* Tweak - Test for compatibility with WordPress 6.0
* Tweak - Add filter on generate_border_style_css
* Tweak - Add filter on generate_border_corner_css
* Tweak - Test for compatibility with WooCommerce 6.5
* Framework – Upgrade Plugin Framework to version 2.6.0
* Security - Various code hardening tweaks.
* Security - Escape all $-variable
* Security - Sanitize all $_REQUEST, $_GET, $_POST
* Security - Apply wp_unslash before sanitize

= 1.8.0 - 2022/01/22 =
* This release has a new Google Fonts API Validation feature plus compatibility with WordPress 5.9 and WooCommerce 6.1.1
* Feature - Add Ajax Validate button for Google Fonts API, for quick and easy Validation of API key.
* Dev - Add dynamic help text to Google Font API field
* Tweak - Test for compatibility with WooCommerce 6.1
* Tweak - Test for compatibility with WordPress 5.9
* Framework - Update a3rev Plugin Framework to version 2.5.0

= 1.7.10 - 2021/11/20 =
* This maintenance release has check for compatibility with PHP version 8.x and WooCommerce 5.9
* Tweak - Test for compatibility with PHP 8.x
* Tweak - Test for compatibility with WooCommerce 5.9

= 1.7.9 - 2021/07/20 =
* This maintenance release has code tweaks for compatibility with WordPress Major version 5.8, WooCommerce version 5.5.1 and some Security Hardening.
* Tweak - Test for compatibility with WordPress 5.8
* Tweak - Test for compatibility with WooCommerce 5.5.1
* Security - Add more variable, options and html escaping

= 1.7.8 - 2021/03/19 =
* This maintenance release updates 23 deprecated jQuery functions for compatibility with the latest version of jQuery in WordPress 5.7
* Tweak - Update JavaScript on plugin framework for compatibility with latest version of jQuery and resolve PHP warning event shorthand is deprecated.
* Tweak - Replace deprecated .change( handler ) with .on( 'change', handler )
* Tweak - Replace deprecated .change() with .trigger('change')
* Tweak - Replace deprecated .focus( handler ) with .on( 'focus', handler )
* Tweak - Replace deprecated .focus() with .trigger('focus')
* Tweak - Replace deprecated .click( handler ) with .on( 'click', handler )
* Tweak - Replace deprecated .click() with .trigger('click')
* Tweak - Replace deprecated .select( handler ) with .on( 'select', handler )
* Tweak - Replace deprecated .select() with .trigger('select')
* Tweak - Replace deprecated .blur( handler ) with .on( 'blur', handler )
* Tweak - Replace deprecated .blur() with .trigger('blur')
* Tweak - Replace deprecated .resize( handler ) with .on( 'resize', handler )
* Tweak - Replace deprecated .submit( handler ) with .on( 'submit', handler )
* Tweak - Replace deprecated .scroll( handler ) with .on( 'scroll', handler )
* Tweak - Replace deprecated .mousedown( handler ) with .on( 'mousedown', handler )
* Tweak - Replace deprecated .mouseover( handler ) with .on( 'mouseover', handler )
* Tweak - Replace deprecated .mouseout( handler ) with .on( 'mouseout', handler )
* Tweak - Replace deprecated .keydown( handler ) with .on( 'keydown', handler )
* Tweak - Replace deprecated .attr('disabled', 'disabled') with .prop('disabled', true)
* Tweak - Replace deprecated .removeAttr('disabled') with .prop('disabled', false)
* Tweak - Replace deprecated .attr('selected', 'selected') with .prop('selected', true)
* Tweak - Replace deprecated .removeAttr('selected') with .prop('selected', false)
* Tweak - Replace deprecated .attr('checked', 'checked') with .prop('checked', true)
* Tweak - Replace deprecated .removeAttr('checked') with .prop('checked', false)

= 1.7.7 - 2021/03/09 =
* This maintenance release is for compatibility with WordPress 5.7 and WooCommerce 5.1
* Tweak - Test for compatibility with WordPress 5.7
* Tweak - Test for compatibility with WooCommerce 5.1.0
* Tweak - Use new function wp_getimagesize of WP instead of getimagesize

= 1.7.6 - 2021/01/13 =
* This maintenance release is for compatibility with WooCommerce major version 4.9.0.
* Tweak - Test for compatibility with WooCommerce 4.9.0

= 1.7.5 - 2020/12/30 =
* This is an important maintenance release that updates our scripts for compatibility with the latest version of jQuery released in WordPress 5.6
* Tweak - Update JavaScript on plugin framework for work compatibility with latest version of jQuery
* Fix - Replace .bind( event, handler ) by .on( event, handler ) for compatibility with latest version of jQuery
* Fix - Replace :eq() Selector by .eq() for compatibility with latest version of jQuery
* Fix - Replace .error() by .on( “error” ) for compatibility with latest version of jQuery
* Fix - Replace :first Selector by .first() for compatibility with latest version of jQuery
* Fix - Replace :gt(0) Selector by .slice(1) for compatibility with latest version of jQuery
* Fix - Remove jQuery.browser for compatibility with latest version of jQuery
* Fix - Replace jQuery.isArray() by Array.isArray() for compatibility with latest version of jQuery
* Fix - Replace jQuery.isFunction(x) by typeof x === “function” for compatibility with latest version of jQuery
* Fix - Replace jQuery.isNumeric(x) by typeof x === “number” for compatibility with latest version of jQuery
* Fix - Replace jQuery.now() by Date.now() for compatibility with latest version of jQuery
* Fix - Replace jQuery.parseJSON() by JSON.parse() for compatibility with latest version of jQuery
* Fix - Remove jQuery.support for compatibility with latest version of jQuery
* Fix - Replace jQuery.trim(x) by x.trim() for compatibility with latest version of jQuery
* Fix - Replace jQuery.type(x) by typeof x for compatibility with latest version of jQuery
* Fix - Replace .load( handler ) by .on( “load”, handler ) for compatibility with latest version of jQuery
* Fix - Replace .size() by .length for compatibility with latest version of jQuery
* Fix - Replace .unbind( event ) by .off( event ) for compatibility with latest version of jQuery
* Fix - Replace .unload( handler ) by .on( “unload”, handler ) for compatibility with latest version of jQuery

= 1.7.4 - 2020/12/10 =
* Tweak - Test for compatibility with WooCommerce 4.8.0

= 1.7.3 - 2020/12/08 =
* This maintenance release has tweaks and a fix for compatibility with WordPress major version 5.6, WooCommerce 4.7.1 and PHP 7.4.8
* Tweak - Test for compatibility with PHP 7.4.8
* Tweak - Test for compatibility with WooCommerce 4.7.1
* Tweak - Test for compatibility with WordPress 5.6
* Fix - Add \ before WC() inside namespace file for it to call to correct WC() of WooCommerce 

= 1.7.2 - 2020/08/08 =
* This maintenance release is for compatibility with WordPress major version 5.5 and WooCommerce 4.3.1.
* Tweak - Test for compatibility with WordPress 5.5
* Tweak - Test for compatibility with WooCommerce 4.3.1

= 1.7.1 - 2020/04/01 =
* This maintenance release is for compatibility with WordPress 5.4, WooCommerce 4.0.1, Travis CI build unit test for compliance with WordPress PHP coding standards and PHP tweaks for compatibility with PHP v 7.0 to 7.4
* Tweak - Test for compatibility with WordPress 5.4
* Tweak - Test for compatibility with WooCommerce 4.0.1
* Tweak - Plugin Framework fully refactored to Composer for cleaner code and faster PHP code on admin panels
* Tweak - Update plugin for compatibility with new version of plugin Framework
* Fix - Update global ${$this- to $GLOBALS[$this to resolve 7.0+ PHP warnings
* Fix - Update global ${$option to $GLOBALS[$option to resolve 7.0+ PHP warnings
* Fix - Update less PHP lib that use square brackets [] instead of curly braces {} for Array, depreciated in PHP 7.4
* Fix - Validate to not use get_magic_quotes_gpc function that are depreciated in PHP 7.4

= 1.7.0 - 2019/12/02 =
* This feature release upgrades the plugins PHP to Composer Dependency Manager, a full security review plus compatibility with WordPress 5.3.0 and WooCommerce 3.8.1 
* Feature - Plugin fully refactored to Composer for cleaner and faster PHP code
* Tweak - Remove the hard coded PHP error_reporting display errors false from compile sass to css
* Tweak - Test for compatibility with WordPress 5.3.0
* Tweak - Test for compatibility with WooCommerce 3.8.1
* Tweak - Update premium version text and links on widget
* Dev - Replace file_get_contents with HTTP API wp_remote_get
* Dev - Ensure that all inputs are sanitized and all outputs are escaped

= 1.6.9 - 2019/08/01 =
* This maintenance upgrade is to fix a style conflict with fontawesome icons
* Fix - fontawesome icons not able to get correct style on frontend when the fontawesome script is loaded on the page by theme or another plugin.

= 1.6.8 - 2019/06/29 =
* This is a maintenance upgrade to fix a potentially fatal error conflict with sites running PHP 7.3 plus compatibility with WordPress v 5.2.2 and WooCommerce 3.6.4
* Tweak - Test for compatibility with WooCommerce 3.6.4
* Tweak - Test for compatibility with WordPress 5.2.2
* Fix - PHP warning continue targeting switch is equivalent to break for compatibility on PHP 7.3

= 1.6.7 - 2019/05/23 =
* This maintenance upgrade adds support for ALT text on all Slider images plus compatibility with WordPress 5.2.1 and WooCommerce 3.6.3
* Tweak - Add ALT text support for product slider images
* Tweak - Test for compatibility with WordPress 5.2.1
* Tweak - Test for compatibility with WooCommerce 3.6.3

= 1.6.6 - 2019/04/26 =
* This maintenance update has tweaks for compatibility with WordPress 5.2.0 and WooCommerce 3.6.0 major new versions whilst maintaining backward compatibility
* Tweak - Test for compatibility with WordPress 5.2.0
* Tweak - Test for compatibility with WooCommerce 3.6.2
* Tweak - Support for backward compatibility with WooCommerce v 3.5

= 1.6.5 - 2019/04/04 =
* This Maintenance update has a tweak for WPML dynamic text stings support plus compatibility tests for WooCommerce 3.5.7, upcoming WordPress 5.2 and WPML version 4.2
* Tweak - Test for compatibility with WordPress 5.2
* Tweak - Test for compatibility with WooCommerce 3.5.7
* Tweak - Replace ict_t with wpml_translate_single_string  filter for compatibility with WPML 4.2
* Tweak - Replace icl_register_string with wpml_register_single_string action for compatibility with WPML 4.2
* Tweak - Full compatibility with WPML with dynamic text

= 1.6.4 - 2018/12/27 =
* This maintenance update is for compatibility with WordPress 5.0.2, WooCommerce 3.5.3 and PHP 7.3. It also includes performance updates to the plugin framework.
* Tweak - Test for compatibility with WordPress 5.0.2 and WordPress 4.9.9
* Tweak - Test for compatibility with WooCommerce 3.5.3
* Tweak - Create new structure for future development of Gutenberg Blocks
* Framework - Performance improvement.  Replace wp_remote_fopen  with file_get_contents for get web fonts
* Framework - Performance improvement. Define new variable `is_load_google_fonts` if admin does not require to load google fonts
* Credit - Props to Derek for alerting us to the framework google fonts performance issue
* Framework - Register style name for dynamic style of plugin for use with Gutenberg block
* Framework - Update Modal script and style to version 4.1.1
* Framework - Update a3rev Plugin Framework to version 2.1.0
* Framework - Test and update for compatibility with PHP 7.3

= 1.6.3 - 2018/05/26 =
* This maintenance update is for compatibility with WordPress 4.9.6 and WooCommerce 3.4.0 and the new GDPR compliance requirements for users in the EU 
* Tweak - Test for compatibility with WooCommerce 3.4.0
* Tweak - Test for compatibility with WordPress 4.9.6
* Tweak - Check for any issues with GDPR compliance. None Found
* Framework - Update a3rev Plugin Framework to version 2.0.3

= 1.6.2 - 2018/02/13 =
* Maintenance Update. Under the bonnet tweaks to keep your plugin running smoothly and is the foundation for new features to be developed this year 
* Framework - Update a3rev Plugin Framework to version 2.0.2
* Framework - Add Framework version for all style and script files
* Tweak - Update for full compatibility with a3rev Dashboard plugin
* Tweak - Change OLD thumbnail image name shop_catalog to woocommerce_thumbnail for compatibility with WC 3.3.0 .  Backwards compatibility with WC 3.2.6
* Tweak - Test for compatibility with WordPress 4.9.4
* Tweak - Test for compatibility with WooCommerce 3.3.1

= 1.6.1 - 2017/10/13 =
* Tweak - Tested for compatibility with WooCommerce 3.2.0
* Tweak - Tested for compatibility with WordPress 4.8.2
* Tweak - Added support for the new WC 'tested up to' feature to show this plugin has been tested compatible with WC updates

= 1.6.0 - 2017/06/07 =
* Feature - Launched WooCommerce Widget Product Slider public Github Repository
* Tweak - Tested for compatibility with WordPress major version 4.8.0
* Tweak - tested for compatibility with WooCommerce version 3.0.7
* Tweak - Include bootstrap modal script into plugin framework
* Tweak - Update a3rev plugin framework to latest version
* Fix - Update underscore templateSettings to add support for default symbol - <% in addition to Slider symbol - {{ to remove conflict with plugins that use underscore template with default symbol.

= 1.5.4 - 2017/04/17 =
* Tweak - Full compatibility with WC version 3.0.3 with backward compatibility to WC version 2.6.0
* Tweak - Change call direct to Product properties with new function that are defined on WC v3.0
* Tweak - Get outofstock from term instead of product meta on new WC v3.0
* Tweak - Get product featured from term instead of product meta on new WC v3.0
* Tweak - Apply styling for sale price on new WC v3.0
* Tweak - Tested for full compatibility with WordPress version 4.7.3

= 1.5.3 - 2017/02/08 =
* Tweak - Change global $$variable to global ${$variable} for compatibility with PHP 7.0
* Tweak - Update a3 Revolution to a3rev Software on plugins description
* Tweak - Added Settings link to plugins description on plugins menu
* Tweak - Tested for full compatibility with WordPress version 4.7.2
* Tweak - Tested for full compatibility with WooCommerce version 2.6.14

= 1.5.2 - 2016/10/28 =
* Tweak - Define new 'Ajax Multi Submit' control type with Progress Bar showing and Statistic for plugin framework
* Tweak - Define new 'Ajax Submit' control type with Progress Bar showing for plugin framework
* Tweak - Update plugin framework styles and scripts support for new 'Ajax Submit' and 'Ajax Multi Submit' control type
* Tweak - Tested for full compatibility with WooCommerce version 2.6.7

= 1.5.1 - 2016/09/24 =
* Fix - Apply line-height option to frontend missed on major version 1.5.0 release

= 1.5.0 - 2016/09/23 =
* Feature - Plugin Framework Mobile First focus upgrade
* Feature - Massive improvement in admin UI and UX in PC, tablet and mobile browsers
* Feature - Introducing opening and closing Options Boxes on admin panels
* Feature - Added Font editor 'Line Height' option
* Feature - Added Next | Previous Slider Icons settings option to style those icons
* Feature - Added support for select image size to use from each widget and shortcode
* Tweak - Move Plugin menu to as submenu of WooCommerce menu
* Tweak - Update select type of plugin framework for support group options
* Tweak - Update Typography Preview script for apply 'Line Height' value to Preview box
* Tweak - Update the generate_font_css() function with new 'Line Height' option
* Tweak - Replace all hard code for line-height inside custom style by new dynamic 'Line Height' value
* Tweak - Register fontawesome in plugin framework with style name is 'font-awesome-styles'
* Tweak - Make slider compatible with Caching plugins for mobile display
* Tweak - Support responsive for slider when browser window is resized
* Tweak - Update product_slider.backbone.js script to support new features
* Tweak - Update dynamic style for new features
* Tweak - Update text domain for full support of translation
* Tweak - Make upgrade function to convert old data to new data to work on this version
* Tweak - Update all admin menu option titles and help text
* Tweak - Tested for full compatibility with WordPress version 4.6.1
* Tweak - Tested for full compatibility with PHP 7.0

= 1.4.2 - 2016/08/15 =
* Tweak - Tested for full compatibility with WooCommerce version 2.6.4
* Tweak - Tested for full compatibility with major WordPress version 4.6
* Fix - Check if 'srcset' is return as 'false' by core WP then set it as empty value that browser ignore that value and get correct image url
* Credit - Thanks to Joshua Wilson for the 'srcset' false bug report on the plugins a3rev support forum

= 1.4.1 - 2016/06/29 =
* Tweak - Tested for full compatibility with WooCommerce major version 2.6.0
* Tweak - Tested for full compatibility with WooCommerce version 2.6.1
* Tweak - Tested for full compatibility with WordPress version 4.5.3

= 1.4.0 - 2016/05/11 =
* Feature - Created new Settings page with Plugin Framework Customization settings box and Slider Cache settings box
* Feature - Added Option to set Google Fonts API key to directly access latest fonts and font updates from Google
* Feature - Added House keeping function to settings. Clean up on Deletion.  Option - Choose if you ever delete this plugin it will completely remove all tables and data it created.
* Feature - Added LocalStore Cache option for turn ON or OFF
* Feature - Added Clean Cache option for set timeout of cache
* Tweak - Make new Settings page as first page of plugin
* Tweak - Update slider backbone script to support new caching options
* Tweak - Tested for full compatibility with WordPress version 4.5.2

= 1.3.1 - 2016/04/08 =
* Tweak - Saved the time number into database for one time customize style and Save change on the Plugin Settings
* Tweak - Replace version number by time number for dynamic style file are generated by Sass to solve the issue get cache file on CDN server
* Tweak - Register fontawesome in plugin framework with style name is 'font-awesome-styles'
* Tweak - Update plugin framework to latest version
* Tweak - Tested for full compatibility with WordPress major version 4.5
* Tweak - Tested for full compatibility with WooCommerce version 2.5.5
* Fix - Recent, Featured and On Sale Filters show products in date published order with most recently published product showing first

= 1.3.0 - 2016/02/03 =
* Feature - Update slider scripts for support 'scrset' and 'sizes' for new WordPress v4.4 responsive images feature
* Feature - Make Slider on frontend support the Responsive Image with 2 new attribute 'scrset' and 'sizes' is put on slides for decrease the total size of images are load for small screen
* Feature - Change old Media Uploader pop-up to New UI of Uploader with Backbone and Underscore from WordPress
* Feature - Added full support for Right to Left RTL layout on plugins admin dashboard
* Feature - Update plugin activation and auto Upgrade script for integration with new Responsi Premium Pack plugin
* Feature - Define new 'Background Color' type on plugin framework with ON | OFF switch to disable background or enable it
* Feature - Define new function - hextorgb() - for convert hex color to rgb color on plugin framework
* Feature - Define new function - generate_background_color_css() - for export background style code on plugin framework that is used to make custom style
* Feature - Define new 'strip_methods' argument for Uploader type, allow strip http/https or no
* Feature - Compatibility WPML plugin : Define 'slider_lang' for support get products on carousel and slider on current language
* Tweak - Update backbone script for parse 'slider_lang' parameter
* Tweak - Define new 'autoSetSizesForImage' javascript function for support set 'sizes' attribute of images on Slider
* Tweak - Update the uploader script to save the Attachment ID and work with New Uploader
* Tweak - Change call action from 'wp_head' to 'wp_enqueue_scripts' and use 'wp_enqueue_style' function to load style for better compatibility with minify feature of caching plugins
* Tweak - Change call action from  'wp_head' to 'wp_enqueue_scripts' to load  google fonts
* Tweak - Change 'wc_product_slider_widget_item_tpl' , 'wc_product_slider_mobile_item_tpl' and 'wc_product_slider_card_item_tpl' underscore template for  Slider support 'srcset' and 'sizes' features
* Tweak - Updated a3 Plugin Framework to the latest version
* Tweak - Defined 'frontend_register_scripts' function with all gallery scripts are registered here for easy to enqueue on frontend
* Tweak - Update core style and script of plugin framework for support Background Color type
* Tweak - Updated required WordPress version to 4.1 for full compatibility with WooCommerce plugin
* Tweak - Tested for full compatibility with WooCommerce version 2.5.2
* Tweak - Tested for full compatibility with WordPress version 4.4.2
* Fix - Compatibility with w3 total cache inline minification.

= 1.2.5 - 2015/08/21 =
* Tweak - include new CSSMin lib from https://github.com/tubalmartin/YUI-CSS-compressor-PHP-port into plugin framework instead of old CSSMin lib from http://code.google.com/p/cssmin/ , to avoid conflict with plugins or themes that have CSSMin lib
* Tweak - make __construct() function for 'Compile_Less_Sass' class instead of using a method with the same name as the class for compatibility on WP 4.3 and is deprecated on PHP4
* Tweak - change class name from 'lessc' to 'a3_lessc' so that it does not conflict with plugins or themes that have another Lessc lib
* Tweak - Tested for full compatibility with WooCommerce Version 2.4.5
* Tweak - Tested for full compatibility with WordPress major version 4.3.0
* Fix - Make __construct() function for 'WC_Product_Slider_Carousel_Widget' class instead of using a method with the same name as the class for compatibility on WP 4.3 and is deprecated on PHP4
* Fix - Make __construct() function for 'WC_Product_Slider_Widget' class instead of using a method with the same name as the class for compatibility on WP 4.3 and is deprecated on PHP4
* Fix - Make __construct() function for 'WC_Product_Slider_Shortcode' class instead of using a method with the same name as the class for compatibility on WP 4.3 and is deprecated on PHP4

= 1.2.4 - 2015/06/27 =
* Tweak - Tested for full compatibility with WooCommerce Version 2.3.11
* Tweak - Updated legacy API url for when a site admin has set index.php permalinks

= 1.2.3 - 2015/06/10 =
* Fix - Check 'request_filesystem_credentials' function, if it does not exists then require the core php lib file from WP where it is defined

= 1.2.2 - 2015/06/04 =
* Tweak - Tested for full compatibility with WooCommerce Version 2.3.10
* Tweak - Security Hardening. Removed all php file_put_contents functions in the plugin framework and replace with the WP_Filesystem API
* Tweak - Security Hardening. Removed all php file_get_contents functions in the plugin framework and replace with the WP_Filesystem API
* Fix - Update dynamic stylesheet url in uploads folder to the format <code>//domain.com/</code> so it's always is correct when loaded as http or https

= 1.2.1 - 2015/05/18 =
* Tweak - Change Slider Skins Control and Pager setting default to OFF
* Tweak - Control and pager CSS only loads from the footer when those settings are switched ON

= 1.2.0 - 2015/05/15 =
* Feature - Added ability to Filter the products displayed from selected WooCommerce Product category by Recent (existing), Featured or On-Sale
* Tweak - On widget added new Filter dropdown selector.
* Tweak - Tested and Tweaked for full compatibility with WordPress Version 4.2.2
* Tweak - Update cycle2 script to latest version 2.1.6

= 1.1.7 - 2015/04/21 =
* Tweak - Tested and Tweaked for full compatibility with WordPress Version 4.2.0
* Tweak - Tested and Tweaked for full compatibility with WooCommerce Version 2.3.8
* Tweak - Update style of plugin framework. Removed the [data-icon] selector to prevent conflict with other plugins that have font awesome icons

= 1.1.6 - 2015/03/19 =
* Tweak - Tested and Tweaked for full compatibility with WooCommerce Version 2.3.7
* Tweak - Tested and Tweaked for full compatibility with WordPress Version 4.1.1

= 1.1.5 - 2015/02/13 =
* Tweak - Maintenance update for full compatibility with WooCommerce major version release 2.3.0 with backward compatibility to WC 2.2.0
* Tweak - Tested fully compatible with WooCommerce just released version 2.3.3
* Tweak - Changed WP_CONTENT_DIR to WP_PLUGIN_DIR. When an admin sets a custom WordPress file structure then it can get the correct path of plugin

= 1.1.4 - 2015/01/21 =
* Tweak - Fix Slider skins first load UI when Dynamic height is activated for a skin
* Tweak - Slider container load at 250px high and then expand or contract to height of items loaded when loaded - improved UI.
* Tweak - SliderSkin .css only loads on urls where slider is in a widget - like js assets
* Tweak - Edit for full compatibility with a3 Lazy Load. Only load skin when it comes into the view port like content
* Dev - Convert Sass Global .less to simplify compiling style sheet edits.
* Fix - Show pager on mobile skin when viewing on mobile
* Fix - Update legacy api so that use home_url( '/' ) instead of get_option('siteurl') to solve the problem can't get data when site has WordPress Settings > General,  configured WordPress Address different from Site Address
* Fix - Sass compile path not saving on windows xampp.

= 1.1.3 - 2015/01/12 =
* Tweak - Audit, test and tweak for 100% compatibility with WooCommerce 2.2.10
* Tweak - Audit, test and tweak for 100% compatibility with WordPress Version 4.1
* Tweak - Only load backbone scripts on the post and page where product slider widget is active.
* Tweak - Only load plugin assets on post and page where product slider widget is active.
* Tweak - Only load assets on page that are required for slider effects - not all plugin js assets.
* Tweak - Only load slider mobile assets when load in mobile screen.
* Tweak - Added a3 lazy Load and a3 Portfolios to the admin yellow box list of free plugins.
* Fix - Show the new plugin version on the Core Update page. Feature stopped working with WordPress version 4.1

= 1.1.2 - 2014/09/12 =
* Tweak - Tested 100% compatible with WooCommerce 2.2.2
* Tweak - Tested 100% compatible with WordPress Version 4.0
* Tweak - Added WordPress plugin icon
* Fix - Changed __DIR__ to dirname( __FILE__ ) for Sass script so that on some server __DIR___ is not defined

= 1.1.1 - 2014/09/04 =
* Tweak - Tested 100% compatible with WooCommerce Version 2.2 and backwards to v2.1
* Tweak - Use wc_get_product() function instead of get_product() function when site is using WooCommerce Version 2.2
* Tweak - Updated Sass script in plugin framework.
* Tweak - Removed '//# sourceMappingURL=jquery.cycle2.js.map' comment in cycle2 script The Chrome browser read comment and find jquery.cycle2.js.map file from server

= 1.1.0 - 2014/08/29 =
* Feature - Converted all front end CSS #dynamic {stylesheets} to Sass #dynamic {stylesheets} for faster slider loading.
* Feature - Convert all back end CSS to Sass.
* Feature - Complete rebuild of the Widget Product slider front end in backbone.js
* Feature - Backbone.js / WooCommerce API reduces the plugins resource call on the host server by a massive +50%.
* Feature - Added Underscore.js script as template for Backbone.js for rendering template display on frontend
* Feature - Added Backbone.localStorage.js to cache the widget slider on users local machine.
* Tweak - Register Legacy API  '/wc_product_slider_legacy_api' for plugin to use with Backbone.js
* Tweak - Updated google font face in plugin framework.
* Tweak - Update Cycle2 script from 2.1.2 to latest version 2.1.5

= 1.0.6.2 - 2014/06/17 =
* Tweak - Updated chosen js script to latest version 1.0.1 on the a3rev Plugin Framework
* Tweak - Plugins description on wordpress.org and the admin panel yellow sidebar information.
* Tweak - Tested 100% compatible with WooCommerce version 2.1.11

= 1.0.6.1 - 2014/05/29 =
* Tweak - Changed add_filter( 'gettext', array( $this, 'change_button_text' ), null, 2 ); to add_filter( 'gettext', array( $this, 'change_button_text' ), null, 3 );
* Tweak - Update change_button_text() function from ( $original == 'Insert into Post' ) to ( is_admin() && $original === 'Insert into Post' )
* Tweak : Added support for placeholder feature for input, email , password , text area types.
* Tweak - Updated the plugins wordpress.org description.
* Tweak - Updated the plugins admin panel yellow sidebar text.
* Tweak - Tested 100% compatible with WooCommerce Version 2.1.9
* Tweak - Tested 100% compatible with WordPress Version 3.9.1

= 1.0.6 - 2014/05/03 =
* Feature - Added Plugins dashboard to wp-admin dashboard menu - a3 Product Slider
* Feature - Added fully customizable slider skins each with its own sub menu. Widget Skin | Card Skin | Touch Mobile Skin
* Feature - Skins all support Mobile Touch Swipe feature with ON | OFF option.
* Feature - Skins, Set Fixed slider Tall or Dynamic
* Feature - Skins Slider controls, ON | OFF and upload custom control icons.
* Feature - Skins Slider Pager controls, ON | OFF, position and style settings.
* Feature - Skins Product Name ON | OFF settings, plus position and style settings
* Feature - Skins Product Price ON | OFF settings, plus a3rev font style editor
* Feature - Widget Skin - View Product and View all Products container, font and hyperlink style settings
* Feature - If activated Slider images show in mobile with touch swipe.
* Feature - Widget Settings, Widget Skins, 5 new transition effects, Flip horizontal, Flip Vertical, Random, Fade Out and None.
* Tweak - Removed the plugins limit on the number of items that can be shown in the slider.
* Tweak - Added Performance warning text on Widget and Shortcode pop-up about adding lots of items to the sliders.
* Tweak - Widget Admin panel complete Widget UI redesign.
* Tweak - Widget admin panel - View this Product Link Text and View All Products Link Text removed from Widget. Now set on Skins.
* Tweak - Changed the plugins name from WooCommerce Widget Product Slideshow to WooCommerce Widget Product Slider.
* Tweak - Updated the plugins readme file.
* Tweak - Tested for Full compatibility with WooCommerce Version 2.1.8 and backwards.
* Tweak - Tested for full compatibility with WordPress Version 3.9

= 1.0.5.1 - 2014/01/28 =
* Tweak - Upgraded for 100% compatibility with soon to be released WooCommerce Version 2.1 with backward compatibility to Version 2.0
* Tweak - Added all required code so plugin can work with WooCommerce Version 2.1 refactored code.
* Tweak - Tested for compatibility with WordPress version 3.8.1
* Tweak - Full WP_DEBUG ran, all uncaught exceptions, errors, warnings, notices and php strict standard notices fixed.

= 1.0.5 - 2013/12/24 =
* Feature - Slideshow widget 100% mobile and tablet responsive, portrait and landscape viewing
* Tweak - Tested 100% compatible with WP 3.8.0
* Tweak - Tested 100% compatible with WooCommerce 2.0.20
* Tweak - Ran WP_DEBUG All Uncaught exceptions errors and warnings fixed.

= 1.0.4 - 2013/06/24 =
* Tweak - IE7, IE8, IE9 display issues on some Theme Frameworks. Moved the plugins style sheets to load from the site header. Theme Frameworks load many style sheets and IE has limit of 32 style sheets. When Framework / Child have this many IE won't show any style sheet once that limit is reached.
* Tweak - Updated plugins support forum link to the WordPress support forum.
* Fix - Full WP_DEG run. All Uncaught exceptions fixed.

= 1.0.3 - 2013/03/06 =
* Tweak - Updated plugins code so that it is 100% compatible with WooCommerce V2.0 and backwards.

= 1.0.2 - 2013/01/09 =
* Tweak - Updated Support and Pro Version link URL's on wordpress.org description, plugins and plugins dashboard. Links were returning 404 errors since the launch of the all new a3rev.com mobile responsive site as the base e-commerce permalinks is changed.

= 1.0.1 - 2012/12/01 =
* Fix - Use Relative File Path of image instead of using Image URL's. This fix is for servers that have disabled URL file-access in parameter of getimagesize function.

= 1.0 - 2012/11/06 =
* Initial release.


== Upgrade Notice ==

= 2.2.3 =
This release has various tweaks for compatibility with WordPress 6.6 and WooCommerce 8.9.3

= 2.2.2 =
This maintenance release has plugin framework updates for compatibility with PHP 8.1 onwards, a WPML compatibility fix plus update backward compatibility to WooCommerce 6.0.

= 2.2.1 =
This maintenance release has a Code Tweak for compatibility with WordPress 6.4 and WooCommerce 8.2

= 2.2.0 =
This feature release adds a "Products Slider" Block for use with Gutenberg templates. Also compatibility with WooCommerce 8.0.3 and WordPress 6.3

= 2.1.0 =
This release has compatibility with WordPress 6.2.0, WooCommerce 7.6.0 plus declared compatibility with WooCommerce HPOS.

= 2.0.0 =
This feature release removes the fontawesome lib and replaces icons with SVGs plus adds Default Topography option to font controls and has compatibility with WooCommerce 7.2

= 1.9.2 =
This maintenance release has a security vulnerability patch, plus compatibility with WordPress major version 6.1.0 and WooCommerce version 7.0

= 1.9.1 =
This release fixes a bug with the just released version 1.9.0

= 1.9.0 =
This release is for compatibility with WordPress major version 6.0 and WooCommerce version 6.5.1. It and includes various code tweaks and tweaks to harden security.

= 1.8.0 =
This release has a new Google Fonts API Validation feature plus compatibility with WordPress 5.9 and WooCommerce 6.1.1

= 1.7.10 =
This maintenance release has check for compatibility with PHP version 8.x and WooCommerce 5.9

= 1.7.9 =
This maintenance release has code tweaks for compatibility with WordPress Major version 5.8, WooCommerce version 5.5.1 and some Security Hardening.

= 1.7.8 =
This maintenance release updates 23 deprecated jQuery functions for compatibility with the latest version of jQuery in WordPress 5.7

= 1.7.7 =
This maintenance release is for compatibility with WordPress 5.7 and WooCommerce 5.1

= 1.7.6 =
This maintenance release is for compatibility with WooCommerce major version 4.9.0

= 1.7.5 =
This is an important maintenance release that updates our scripts for compatibility with the latest version of jQuery released in WordPress 5.6

= 1.7.4 =
* This maintenance release is for compatibility with WooCommerce 4.8.0

= 1.7.3 =
This maintenance release has tweaks and a fix for compatibility with WordPress major version 5.6, WooCommerce 4.7.1 and PHP 7.4.8

= 1.7.2 =
This maintenance release is for compatibility with WordPress major version 5.5 and WooCommerce 4.3.1.

= 1.7.1 =
This maintenance release is for compatibility with WordPress 5.4, WooCommerce 4.0.1, Travis CI build unit test for compliance with WordPress PHP coding standards and PHP tweaks for compatibility with PHP v 7.0 to 7.4

= 1.7.0 =
This feature release upgrades the plugins PHP to Composer Dependency Manager, a full security review plus compatibility with WordPress 5.3.0 and WooCommerce 3.8.1

= 1.6.9 =
This maintenance upgrade is to fix a style conflict with fontawesome icons

= 1.6.8 =
This is a maintenance upgrade to fix a potentially fatal error conflict with sites running PHP 7.3 plus compatibility with WordPress v 5.2.2 and WooCommerce 3.6.4

= 1.6.7 =
This maintenance upgrade adds support for ALT text on all Product Slider images plus compatibility with WordPress 5.2.1 and WooCommerce 3.6.3

= 1.6.6 =
This maintenance update has tweaks for compatibility with WordPress 5.2.0 and WooCommerce 3.6.0 major new versions whilst maintaining backward compatibility

= 1.6.5 =
This Maintenance update has a tweak for WPML dynamic text stings support plus compatibility tests for WooCommerce 3.5.7, upcoming WordPress 5.2 and WPML version 4.2

= 1.6.4 =
This maintenance update is for compatibility with WordPress 5.0.2, WooCommerce 3.5.3 and PHP 7.3. It also includes performance updates to the plugin framework.

= 1.6.3 =
Maintenance Update. Compatibility with WooCommerce 3.4.0, WordPress 4.9.6 and the new GDPR compliance requirements for users in the EU

= 1.6.2 =
Maintenance Update. This version updates the Plugin Framework to v 2.0.2, adds full compatibility with a3rev Dashboard, WordPress v 4.9.4 and WooCoomerce v 3.3.1

= 1.6.1 =
Maintenance Upgrade. Tweaks for compatibility with WooCommerce 3.2.0 and WordPress 4.8.2

= 1.6.0 =
Feature Update. 2 code tweaks and 1 bug fix for compatibility with WordPress major version 4.8.0 and WooCommerce version 3.0.7 plus launch of public Github repo for source code

= 1.5.4 =
Maintenance Update. 4 major code tweaks for compatibility with WooCommerce V 3.0.0 backwards to v 2.6.0

= 1.5.3 =
Maintenance Update. 3 code Tweaks for full compatibility with WooCommerce v 2.6.14, WordPress v 4.7.2 and current version of X Theme

= 1.5.2 =
Maintenance Update. 3 code tweaks and full compatibility with WooCommerce version 2.6.7

= 1.5.1 =
Maintenance Upgrade. 1 font line height bug fix from the major version 1.5.0 release

= 1.5.0 =
Major Feature Upgrade. Almost a complete rebuild of the plugin. 6 new features, 15 major code tweaks plus full compatibility with WordPress 4.6.1 and PHP 7.0

= 1.4.2 =
Maintenance Update. 1 bug fix plus full compatibility with WooCommerce Version 2.6.4 and new WordPress Major version 4.6

= 1.4.1 =
Maintenance Update. Tweaked and tested for full compatibility with WooCommerce Version 2.6.1 and WordPress version 4.5.3

= 1.4.0 =
Feature Upgrade. 5 new features. New General Settings page with new features including control of the cache options plus full compatibility with WordPress v 4.5.2

= 1.3.1 =
Maintenance Update. 4 code tweaks and 1 bug fix for full compatibility with upcoming WordPress Major Version 4.5.0 and WooCommerce Version 2.5.5

= 1.3.0 =
Major Feature Upgrade. IMPORTANT! After upgrade clear site cache, browser cache, CDNs. 10 new features, 9 major code tweaks and 1 bug fix - full compatibility with WordPress v 4.4.2 and WooCommerce v 2.5.2.

= 1.2.5 =
Major Maintenance Upgrade. 5 Code Tweaks plus 3 bug fixes for full compatibility with WordPress v 4.3.0 and WooCommerce v 2.4.5

= 1.2.4 =
Maintenance Upgrade. One custom permalinks tweak plus and full compatibility with WooCommerce 2.3.11

= 1.2.3 =
Maintenance Upgrade. Fix for PHP Fatal Error when upgrading from older versions of the plugin to version 1.2.2 on some servers

= 1.2.2 =
Important Maintenance Upgrade. 2 x major a3rev Plugin Framework Security Hardening Tweaks plus 1 https bug fix and full compatibility with WooCommerce 2.3.10

= 1.2.1 =
Maintenance Upgrade. 2 Code Tweaks for improved loading and display of Slider Skin Controls and Pager.

= 1.2.0 =
Feature Upgrade. New Product display Filter, show Recent, Featured or On Sale products from selected Product Category in Slider. Plus Tweaks for compatibility with WordPress 4.2.2

= 1.1.7 =
Maintenance upgrade. Code tweaks for full compatibility with WordPress 4.2.0 and WooCommerce 2.3.8

= 1.1.6 =
Upgrade now for full compatibility with WooCommerce Version 2.3.7 and WordPress version 4.1.1

= 1.1.5 =
Upgrade now for full compatibility with WooCommerce major version release 2.3.0 with backward compatibility to WooCommerce v 2.2.0

= 1.1.4 =
Upgrade now for 3 Code Tweaks that greatly enhance slider first load, plus full compatibility with a3 Lazy Load and 3 bug fixes.

= 1.1.3 =
Upgrade now for full compatibility with WooCommerce 2.2.10 and WordPress version 4.1. Upgrade has 6 performance related code tweaks and 1 bug fix.

= 1.1.2 =
Upgrade now for 1 Sass bug fix and full compatibility with WooCommerce Version 2.2.2 and WordPress 4.0

= 1.1.1 =
Upgrade now and your plugin will be 100% compatible with the new WooCommerce Version 2.2 when it is released.

= 1.1.0 =
Upgrade to version 1.1.0 - full conversion of Widget Product Slider front end display with Sass, backbone.js and WooCommerce API.

= 1.0.6.2 =
Upgrade now for a framework code tweak that makes your plugin fully compatible with WooCommerce version 2.1.11

= 1.0.6.1 =
Update now for 3 framework code tweaks and full compatibility with WooCommerce version 2.1.9 and WordPress version 3.9.1

= 1.0.6 =
Update now for massive feature upgrade. 11 new features, 5 tweaks and full compatibility with WooCommerce 2.1.8 and WordPress 3.9

= 1.0.5.1 =
Upgrade now for full compatibility with WooCommerce Version 2.1 and WordPress version 3.8.1. Includes full backward compatibility with WooCommerce versions 2.0 to 2.0.20.

= 1.0.5 =
Major Upgrade  for Full compatibility with WordPress version 3.8.0, WooCommerce 2.0.20 and backwards. Plus Mobile and Tablet display enhancement.
