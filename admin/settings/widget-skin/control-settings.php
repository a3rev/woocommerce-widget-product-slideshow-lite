<?php
/* "Copyright 2012 A3 Revolution Web Design" This software is distributed under the terms of GNU GENERAL PUBLIC LICENSE Version 3, 29 June 2007 */
// File Security Check
if ( ! defined( 'ABSPATH' ) ) exit;
?>
<?php
/*-----------------------------------------------------------------------------------
Slider Widget Skin Controls Settings

-----------------------------------------------------------------------------------*/

class WC_Product_Slider_Widget_Skin_Control_Settings
{

	/**
	 * @var string
	 * You must change to correct form key that you are working
	 */
	public $form_key = 'wc_product_slider_a3_widget_skin_control_settings';

	/**
	 * @var array
	 */
	public $form_fields = array();

	/*-----------------------------------------------------------------------------------*/
	/* __construct() */
	/* Settings Constructor */
	/*-----------------------------------------------------------------------------------*/
	public function __construct() {
		$this->init_form_fields();
	}

	/*-----------------------------------------------------------------------------------*/
	/* init_form_fields() */
	/* Init all fields of this form */
	/*-----------------------------------------------------------------------------------*/
	public function init_form_fields() {
				
  		// Define settings			
     	$this->form_fields = apply_filters( $this->form_key . '_settings_fields', array(
			
			array(
				'name'		=> __( 'Next / Previous Slider Icons', 'woo-widget-product-slideshow' ),
				'desc'		=> __( 'Slider Control < Back and Forward > Arrow Icons', 'woo-widget-product-slideshow' ),
                'type' 		=> 'heading',
                'id'		=> 'widget_skin_controls_box',
                'is_box'	=> true,
           	),
			array(  
				'name' 		=> __( 'Control Arrow Icons', 'woo-widget-product-slideshow' ),
				'id' 		=> 'enable_slider_control',
				'class'		=> 'enable_slider_control',
				'type' 		=> 'onoff_checkbox',
				'default'	=> 1,
				'checked_value'		=> 1,
				'unchecked_value' 	=> 0,
				'checked_label'		=> __( 'ON', 'woo-widget-product-slideshow' ),
				'unchecked_label' 	=> __( 'OFF', 'woo-widget-product-slideshow' ),
			),
			
			array(
                'type' 		=> 'heading',
				'class'		=> 'slider_control_container'
           	),
			array(  
				'name' 		=> __( 'Arrows Display', 'woo-widget-product-slideshow' ),
				'id' 		=> 'slider_control_transition',
				'type' 		=> 'onoff_radio',
				'class'		=> 'slider_control_transition',
				'default' 	=> 'hover',
				'onoff_options' => array(
					array(
						'val' 				=> 'alway',
						'text' 				=> __( 'Alway show when slider loaded', 'woo-widget-product-slideshow' ),
						'checked_label'		=> __( 'ON', 'woo-widget-product-slideshow' ) ,
						'unchecked_label' 	=> __( 'OFF', 'woo-widget-product-slideshow' ) ,
					),
					array(
						'val' 				=> 'hover',
						'text' 				=> __( 'Show when hover on slider container', 'woo-widget-product-slideshow' ),
						'checked_label'		=> __( 'ON', 'woo-widget-product-slideshow' ) ,
						'unchecked_label' 	=> __( 'OFF', 'woo-widget-product-slideshow' ) ,
					),
				),			
			),
			array(
				'name' => __( 'Icons Size', 'woo-widget-product-slideshow' ),
				'desc' 		=> "px",
				'id' 		=> 'slider_control_icons_size',
				'type' 		=> 'slider',
				'default'	=> 30,
				'min'		=> 10,
				'max'		=> 60,
				'increment'	=> 1,
			),
			array(
				'name' 		=> __( 'Icons Colour', 'woo-widget-product-slideshow' ),
				'id' 		=> 'slider_control_icons_color',
				'type' 		=> 'color',
				'default'	=> '#000000'
			),
			array(
				'name' => __( 'Icons Transparency', 'woo-widget-product-slideshow' ),
				'desc' 		=> "%. " . __( '100% = Full Colour', 'woo-widget-product-slideshow' ),
				'id' 		=> 'slider_control_icons_opacity',
				'type' 		=> 'slider',
				'default'	=> 60,
				'min'		=> 0,
				'max'		=> 100,
				'increment'	=> 10,
			),
			array(  
				'name' 		=> __( 'Previous Icon Left Margin', 'woo-widget-product-slideshow' ),
				'desc'		=> 'px',
				'id' 		=> 'control_previous_icon_margin_left',
				'type' 		=> 'text',
				'css'		=> 'width:40px;',
				'default'	=> 5,
			),
			array(  
				'name' 		=> __( 'Next Icon Right Margin', 'woo-widget-product-slideshow' ),
				'desc'		=> 'px',
				'id' 		=> 'control_next_icon_margin_right',
				'type' 		=> 'text',
				'css'		=> 'width:40px;',
				'default'	=> 5,
			),
        ));
	}
	
	public function include_script() {
	?>
<script>
(function($) {
$(document).ready(function() {
	if ( $("input.enable_slider_control:checked").val() != '1') {
		$(".slider_control_container").css( {'visibility': 'hidden', 'height' : '0px', 'overflow' : 'hidden', 'margin-bottom' : '0px' } );
	}

	$(document).on( "a3rev-ui-onoff_checkbox-switch", '.enable_slider_control', function( event, value, status ) {
		$(".slider_control_container").attr('style','display:none;');
		if ( status == 'true' ) {
			$(".slider_control_container").slideDown();
		}
	});
	
});
})(jQuery);
</script>
    <?php	
	}
}

global $wc_product_slider_widget_skin_control_settings;
$wc_product_slider_widget_skin_control_settings = new WC_Product_Slider_Widget_Skin_Control_Settings();

?>