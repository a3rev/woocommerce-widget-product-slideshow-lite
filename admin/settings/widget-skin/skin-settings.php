<?php
/* "Copyright 2012 A3 Revolution Web Design" This software is distributed under the terms of GNU GENERAL PUBLIC LICENSE Version 3, 29 June 2007 */

namespace A3Rev\WCPSlider\FrameWork\Settings {

use A3Rev\WCPSlider\FrameWork;

// File Security Check
if ( ! defined( 'ABSPATH' ) ) exit;

/*-----------------------------------------------------------------------------------
Slider Widget Skin Settings

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

class Widget_Skin extends FrameWork\Admin_UI
{
	
	/**
	 * @var string
	 */
	private $parent_tab = 'widget-skin';
	
	/**
	 * @var array
	 */
	private $subtab_data;
	
	/**
	 * @var string
	 * You must change to correct option name that you are working
	 */
	public $option_name = 'wc_product_slider_widget_skin_settings';
	
	/**
	 * @var string
	 * You must change to correct form key that you are working
	 */
	public $form_key = 'wc_product_slider_widget_skin_settings';
	
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
		$this->subtab_init();
		
		$this->form_messages = array(
				'success_message'	=> __( 'Skin Settings successfully saved.', 'woo-widget-product-slideshow' ),
				'error_message'		=> __( 'Error: Skin Settings can not save.', 'woo-widget-product-slideshow' ),
				'reset_message'		=> __( 'Skin Settings successfully reseted.', 'woo-widget-product-slideshow' ),
			);
		
		add_action( $this->plugin_name . '-' . $this->form_key . '_settings_end', array( $this, 'include_script' ) );
							
		add_action( $this->plugin_name . '_set_default_settings' , array( $this, 'set_default_settings' ) );
				
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
		$GLOBALS[$this->plugin_prefix.'admin_interface']->reset_settings( $this->form_fields, $this->option_name, false );
	}
	
	/*-----------------------------------------------------------------------------------*/
	/* get_settings()
	/* Get settings with function called from Admin Interface */
	/*-----------------------------------------------------------------------------------*/
	public function get_settings() {		
		$GLOBALS[$this->plugin_prefix.'admin_interface']->get_settings( $this->form_fields, $this->option_name );
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
			'name'				=> 'skin-settings',
			'label'				=> __( 'Skin Settings', 'woo-widget-product-slideshow' ),
			'callback_function'	=> 'wc_product_slider_widget_skin_settings_panel_form',
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
		$output = '';
		$output .= $GLOBALS[$this->plugin_prefix.'admin_interface']->admin_forms( $this->form_fields, $this->form_key, $this->option_name, $this->form_messages );
		
		return $output;
	}
	
	/*-----------------------------------------------------------------------------------*/
	/* init_form_fields() */
	/* Init all fields of this form */
	/*-----------------------------------------------------------------------------------*/
	public function init_form_fields() {
		
  		// Define settings			
     	$this->form_fields = array();

		global $wc_product_slider_widget_skin_dimensions_settings;
		$wc_product_slider_widget_skin_dimensions_settings = new Widget_Skin\Dimensions();
		$this->form_fields = array_merge( $this->form_fields, $wc_product_slider_widget_skin_dimensions_settings->form_fields );

		global $wc_product_slider_widget_skin_control_settings;
		$wc_product_slider_widget_skin_control_settings = new Widget_Skin\Control();
		$this->form_fields = array_merge( $this->form_fields, $wc_product_slider_widget_skin_control_settings->form_fields );

		global $wc_product_slider_widget_skin_pager_settings;
		$wc_product_slider_widget_skin_pager_settings = new Widget_Skin\Pager();
		$this->form_fields = array_merge( $this->form_fields, $wc_product_slider_widget_skin_pager_settings->form_fields );

		global $wc_product_slider_widget_skin_title_settings;
		$wc_product_slider_widget_skin_title_settings = new Widget_Skin\Title();
		$this->form_fields = array_merge( $this->form_fields, $wc_product_slider_widget_skin_title_settings->form_fields );

		global $wc_product_slider_widget_skin_price_settings;
		$wc_product_slider_widget_skin_price_settings = new Widget_Skin\Price();
		$this->form_fields = array_merge( $this->form_fields, $wc_product_slider_widget_skin_price_settings->form_fields );

		global $wc_product_slider_widget_skin_product_link_settings;
		$wc_product_slider_widget_skin_product_link_settings = new Widget_Skin\Product_Link();
		$this->form_fields = array_merge( $this->form_fields, $wc_product_slider_widget_skin_product_link_settings->form_fields );

		global $wc_product_slider_widget_skin_category_link_settings;
		$wc_product_slider_widget_skin_category_link_settings = new Widget_Skin\Category_Link();
		$this->form_fields = array_merge( $this->form_fields, $wc_product_slider_widget_skin_category_link_settings->form_fields );

        $this->form_fields = apply_filters( $this->form_key . '_settings_fields', $this->form_fields );
	}
	
	public function include_script() {
		global $wc_product_slider_widget_skin_dimensions_settings;
		global $wc_product_slider_widget_skin_control_settings;
		global $wc_product_slider_widget_skin_pager_settings;
		global $wc_product_slider_widget_skin_title_settings;
		global $wc_product_slider_widget_skin_price_settings;
		global $wc_product_slider_widget_skin_product_link_settings;
		global $wc_product_slider_widget_skin_category_link_settings;

    	$wc_product_slider_widget_skin_dimensions_settings->include_script();
    	$wc_product_slider_widget_skin_control_settings->include_script();
    	$wc_product_slider_widget_skin_pager_settings->include_script();
    	$wc_product_slider_widget_skin_title_settings->include_script();
    	$wc_product_slider_widget_skin_price_settings->include_script();
    	$wc_product_slider_widget_skin_product_link_settings->include_script();
    	$wc_product_slider_widget_skin_category_link_settings->include_script();
	}
	
}

}

// global code
namespace {

/** 
 * wc_product_slider_widget_skin_settings_panel_form()
 * Define the callback function to show subtab content
 */
function wc_product_slider_widget_skin_settings_panel_form() {
	global $wc_product_slider_widget_skin_settings_panel;
	$wc_product_slider_widget_skin_settings_panel->settings_form();
}

}
