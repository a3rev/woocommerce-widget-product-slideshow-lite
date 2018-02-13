<?php
/* "Copyright 2012 A3 Revolution Web Design" This software is distributed under the terms of GNU GENERAL PUBLIC LICENSE Version 3, 29 June 2007 */
// File Security Check
if ( ! defined( 'ABSPATH' ) ) exit;
?>
<?php
/*-----------------------------------------------------------------------------------
Slider Widget Skin Title Settings

TABLE OF CONTENTS

- var parent_tab
- var subtab_data
- var option_name
- var form_key
- var position
- var form_fields
- var form_messages

- __construct()
- subtab_init()
- set_default_settings()
- get_settings()
- subtab_data()
- add_subtab()
- settings_form()
- init_form_fields()

-----------------------------------------------------------------------------------*/

class WC_Product_Slider_Global_Settings extends WC_Product_Slider_Admin_UI
{
	
	/**
	 * @var string
	 */
	private $parent_tab = 'global-settings';
	
	/**
	 * @var array
	 */
	private $subtab_data;
	
	/**
	 * @var string
	 * You must change to correct option name that you are working
	 */
	public $option_name = 'wc_product_slider_global_settings';
	
	/**
	 * @var string
	 * You must change to correct form key that you are working
	 */
	public $form_key = 'wc_product_slider_global_settings';
	
	/**
	 * @var string
	 * You can change the order show of this sub tab in list sub tabs
	 */
	private $position = 1;
	
	/**
	 * @var array
	 */
	public $form_fields = array();
	
	/**
	 * @var array
	 */
	public $form_messages = array();
	
	/*-----------------------------------------------------------------------------------*/
	/* __construct() */
	/* Settings Constructor */
	/*-----------------------------------------------------------------------------------*/
	public function __construct() {
		add_action( 'plugins_loaded', array( $this, 'init_form_fields' ), 1 );
		//$this->subtab_init();
		
		$this->form_messages = array(
				'success_message'	=> __( 'Global Settings successfully saved.', 'woo-widget-product-slideshow' ),
				'error_message'		=> __( 'Error: Global Settings can not save.', 'woo-widget-product-slideshow' ),
				'reset_message'		=> __( 'Global Settings successfully reseted.', 'woo-widget-product-slideshow' ),
			);
		
		add_action( $this->plugin_name . '-' . $this->form_key . '_settings_end', array( $this, 'include_script' ) );
							
		add_action( $this->plugin_name . '_set_default_settings' , array( $this, 'set_default_settings' ) );

		add_action( $this->plugin_name . '-' . $this->form_key . '_settings_init' , array( $this, 'clean_on_deletion' ) );
				
		add_action( $this->plugin_name . '_get_all_settings' , array( $this, 'get_settings' ) );
	}
	
	/*-----------------------------------------------------------------------------------*/
	/* subtab_init() */
	/* Sub Tab Init */
	/*-----------------------------------------------------------------------------------*/
	public function subtab_init() {
		
		add_filter( $this->plugin_name . '-' . $this->parent_tab . '_settings_subtabs_array', array( $this, 'add_subtab' ), $this->position );
		
	}
	
	/*-----------------------------------------------------------------------------------*/
	/* set_default_settings()
	/* Set default settings with function called from Admin Interface */
	/*-----------------------------------------------------------------------------------*/
	public function set_default_settings() {
		global $wc_product_slider_admin_interface;
		
		$wc_product_slider_admin_interface->reset_settings( $this->form_fields, $this->option_name, false );
	}

	/*-----------------------------------------------------------------------------------*/
	/* clean_on_deletion()
	/* Process when clean on deletion option is un selected */
	/*-----------------------------------------------------------------------------------*/
	public function clean_on_deletion() {
		if ( ( isset( $_POST['bt_save_settings'] ) || isset( $_POST['bt_reset_settings'] ) ) && get_option( $this->plugin_name . '_clean_on_deletion' ) == 0  )  {
			$uninstallable_plugins = (array) get_option('uninstall_plugins');
			unset($uninstallable_plugins[ $this->plugin_path ]);
			update_option('uninstall_plugins', $uninstallable_plugins);
		}
	}
	
	/*-----------------------------------------------------------------------------------*/
	/* get_settings()
	/* Get settings with function called from Admin Interface */
	/*-----------------------------------------------------------------------------------*/
	public function get_settings() {
		global $wc_product_slider_admin_interface;
		
		$wc_product_slider_admin_interface->get_settings( $this->form_fields, $this->option_name );
	}
	
	/**
	 * subtab_data()
	 * Get SubTab Data
	 * =============================================
	 * array ( 
	 *		'name'				=> 'my_subtab_name'				: (required) Enter your subtab name that you want to set for this subtab
	 *		'label'				=> 'My SubTab Name'				: (required) Enter the subtab label
	 * 		'callback_function'	=> 'my_callback_function'		: (required) The callback function is called to show content of this subtab
	 * )
	 *
	 */
	public function subtab_data() {
		
		$subtab_data = array( 
			'name'				=> 'global-settings',
			'label'				=> __( 'Global Settings', 'woo-widget-product-slideshow' ),
			'callback_function'	=> 'wc_product_slider_global_settings_form',
		);
		
		if ( $this->subtab_data ) return $this->subtab_data;
		return $this->subtab_data = $subtab_data;
		
	}
	
	/*-----------------------------------------------------------------------------------*/
	/* add_subtab() */
	/* Add Subtab to Admin Init
	/*-----------------------------------------------------------------------------------*/
	public function add_subtab( $subtabs_array ) {
	
		if ( ! is_array( $subtabs_array ) ) $subtabs_array = array();
		$subtabs_array[] = $this->subtab_data();
		
		return $subtabs_array;
	}
	
	/*-----------------------------------------------------------------------------------*/
	/* settings_form() */
	/* Call the form from Admin Interface
	/*-----------------------------------------------------------------------------------*/
	public function settings_form() {
		global $wc_product_slider_admin_interface;
		
		$output = '';
		$output .= $wc_product_slider_admin_interface->admin_forms( $this->form_fields, $this->form_key, $this->option_name, $this->form_messages );
		
		return $output;
	}
	
	/*-----------------------------------------------------------------------------------*/
	/* init_form_fields() */
	/* Init all fields of this form */
	/*-----------------------------------------------------------------------------------*/
	public function init_form_fields() {
				
  		// Define settings			
     	$this->form_fields = apply_filters( $this->option_name . '_settings_fields', array(
		
			array(
            	'name' 		=> __( 'Plugin Framework Global Settings', 'woo-widget-product-slideshow' ),
            	'id'		=> 'plugin_framework_global_box',
                'type' 		=> 'heading',
                'first_open'=> true,
                'is_box'	=> true,
           	),

           	array(
           		'name'		=> __( 'Customize Admin Setting Box Display', 'woo-widget-product-slideshow' ),
           		'desc'		=> __( 'By default each admin panel will open with all Setting Boxes in the CLOSED position.', 'woo-widget-product-slideshow' ),
                'type' 		=> 'heading',
           	),
           	array(
				'type' 		=> 'onoff_toggle_box',
			),
			array(
           		'name'		=> __( 'Google Fonts', 'woo-widget-product-slideshow' ),
           		'desc'		=> __( 'By Default Google Fonts are pulled from a static JSON file in this plugin. This file is updated but does not have the latest font releases from Google.', 'woo-widget-product-slideshow' ),
                'type' 		=> 'heading',
           	),
           	array(
                'type' 		=> 'google_api_key',
           	),
           	array(
            	'name' 		=> __( 'House Keeping', 'woo-widget-product-slideshow' ),
                'type' 		=> 'heading',
            ),
			array(
				'name' 		=> __( 'Clean up on Deletion', 'woo-widget-product-slideshow' ),
				'desc' 		=> __( 'On deletion (not deactivate) the plugin will completely remove all tables and data it created, leaving no trace it was ever here.', 'woo-widget-product-slideshow' ),
				'id' 		=> $this->plugin_name . '_clean_on_deletion',
				'type' 		=> 'onoff_checkbox',
				'default'	=> '0',
				'separate_option'	=> true,
				'free_version'		=> true,
				'checked_value'		=> '1',
				'unchecked_value'	=> '0',
				'checked_label'		=> __( 'ON', 'woo-widget-product-slideshow' ),
				'unchecked_label' 	=> __( 'OFF', 'woo-widget-product-slideshow' ),
			),

			array(
            	'name' 		=> __( 'Slider Cache', 'woo-widget-product-slideshow' ),
            	'desc' 		=> __( 'This plugin supports supercharged localstorage caching and is higly recommended. Only turn this ON after you have finished your setup otherwise you will not see the changes because it will be cached in your machine.', 'woo-widget-product-slideshow' ),
                'type' 		=> 'heading',
                'id'		=> 'slider_carousel_cache_box',
                'is_box'	=> true,
           	),
			array(
				'name' 		=> __( 'LocalStore Cache', 'woo-widget-product-slideshow' ),
				'id' 		=> 'wc_carousel_slider_allow_cache',
				'class'		=> 'wc_carousel_slider_allow_cache',
				'type' 		=> 'onoff_checkbox',
				'default'	=> 'no',
				'checked_value'		=> 'yes',
				'unchecked_value'	=> 'no',
				'checked_label'		=> __( 'ON', 'woo-widget-product-slideshow' ),
				'unchecked_label' 	=> __( 'OFF', 'woo-widget-product-slideshow' ),
			),
			array(
                'type' 		=> 'heading',
                'class'		=> 'wc_carousel_slider_allow_cache_container',
            ),
            array(  
				'name' 		=> __( 'Clean Cache', 'woo-widget-product-slideshow' ),
				'desc' 		=> __( 'hours', 'woo-widget-product-slideshow' ) . '. </span><span>' . __( 'Recommend 72 hours unless you are changing slider items daily', 'woo-widget-product-slideshow' ),
				'id' 		=> 'wc_carousel_slider_cache_timeout',
				'type' 		=> 'slider',
				'default'	=> 24,
				'min'		=> 1,
				'max'		=> 72,
				'increment'	=> 1
			),

			array(
            	'name' 		=> __( 'Getting Started', 'woo-widget-product-slideshow' ),
            	'id'		=> 'compare_getting_started_box',
                'type' 		=> 'heading',
                'is_box'	=> true,
           	),
           	array(
           		'name'		=> __( 'Quick Start', 'woo-widget-product-slideshow' ),
           		'desc'		=> __( 'Here is a 9 step guide for a fast start', 'woo-widget-product-slideshow' ) .
'<ul style="padding-left: 20px;">
	<li>1. ' . __( "Check that the + Slider & Carousel cache LocalStore cache option is OFF while setting up and testing.", 'woo-widget-product-slideshow' ) . '</li>
	<li>2. ' . __( "Product Carousel and Product Sliders are added by widgets or shortcode.", 'woo-widget-product-slideshow' ) . '</li>
	<li>3. ' . __( "Go to Appearance > Widgets menu and you will see the Woo Products Carousel and Woo Products Slider widgets.", 'woo-widget-product-slideshow' ) . '</li>
	<li>4. ' . __( "Add Widgets and configure content type, apply a skin and set transition effects.", 'woo-widget-product-slideshow' ) . '</li>
	<li>5. ' . __( "Go to any product, post or page and create or edit and you will see the Product Slider insert shortcode button has been added above the WordPress editor.", 'woo-widget-product-slideshow' ) . '</li>
	<li>6. ' . __( "Once Carousel / Sliders widgets have been added to widget areas or content areas by shortcode then use the options on the Skins tabs on this admin to customize the style.", 'woo-widget-product-slideshow' ) . '</li>
	<li>7. ' . __( "Customizing Tip! Open the site in another tab where you can see the slider / carousel and as you save changes to the skin style then go to the tab the site is open in and refresh the page to see changes.", 'woo-widget-product-slideshow' ) . '</li>
	<li>8. ' . __( "Cache - Be sure to clear any caching made by plugins when you have completed the setup or editing so that frontend users can view the changes.", 'woo-widget-product-slideshow' ) . '</li>
	<li>9. ' . __( "Performance! Once setup / testing is complete be sure to switch LocalStore cache ON for best performance.", 'woo-widget-product-slideshow' ) . '</li>
</ul>',
                'type' 		=> 'heading',
           	),
           	array(
           		'name'		=> __( 'Dynamic Style Options', 'woo-widget-product-slideshow' ),
           		'desc'		=> __( 'The tabs at the top of this page have full dynamic style and layout options for the Widget, Card and Mobile skins as well as the carousel container', 'woo-widget-product-slideshow' ) .
'<ul style="padding-left: 20px;">
	<li>1. ' . __( "Widget Skin tab - 9 Option boxes with over 70 options for customizing the style and layout of the Widget Skin.", 'woo-widget-product-slideshow' ) . '</li>
	<li>2. ' . __( "Card Skin tab -  10 Option boxes with over 60 options for customizing the style and layout of the Product Card skin.", 'woo-widget-product-slideshow' ) . '</li>
	<li>3. ' . __( "Mobile Skin tab - 6 Option boxes with over 30 options for creating a custom style and layout for the Widget and Card skins in mobile devices.", 'woo-widget-product-slideshow' ) . '</li>
	<li>4. ' . __( "Carousel Container tab - Product Carousels use the Card Skin to display products in a carousel container. This tab has 3 Option boxes with over 30 options for customizing the style and layout of the Carousel Container.", 'woo-widget-product-slideshow' ) . '</li>
</ul>',
                'type' 		=> 'heading',
           	),
        ));
	}
	
	public function include_script() {
	?>
<script>
(function($) {
$(document).ready(function() {
	if ( $("input.wc_carousel_slider_allow_cache:checked").val() != 'yes' ) {
		$('.wc_carousel_slider_allow_cache_container').css( {'visibility': 'hidden', 'height' : '0px', 'overflow' : 'hidden', 'margin-bottom' : '0px' } );
	}

	$(document).on( "a3rev-ui-onoff_checkbox-switch", '.wc_carousel_slider_allow_cache', function( event, value, status ) {
		$('.wc_carousel_slider_allow_cache_container').attr('style','display:none;');
		if ( status == 'true' ) {
			$(".wc_carousel_slider_allow_cache_container").slideDown();
		}
	});

});
})(jQuery);
</script>
    <?php	
	}
}

global $wc_product_slider_global_settings_panel;
$wc_product_slider_global_settings_panel = new WC_Product_Slider_Global_Settings();

/** 
 * wc_product_slider_widget_skin_title_settings_form()
 * Define the callback function to show subtab content
 */
function wc_product_slider_global_settings_form() {
	global $wc_product_slider_global_settings_panel;
	$wc_product_slider_global_settings_panel->settings_form();
}

?>