<?php
/* "Copyright 2012 A3 Revolution Web Design" This software is distributed under the terms of GNU GENERAL PUBLIC LICENSE Version 3, 29 June 2007 */
// File Security Check
if ( ! defined( 'ABSPATH' ) ) exit;
?>
<?php
/*-----------------------------------------------------------------------------------
Slider Widget Skin Price Settings

-----------------------------------------------------------------------------------*/

class WC_Product_Slider_Widget_Skin_Price_Settings
{

	/**
	 * @var string
	 * You must change to correct form key that you are working
	 */
	public $form_key = 'wc_product_slider_a3_widget_skin_price_settings';

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
				'name'		=> __( 'Product Price', 'woo-widget-product-slideshow' ),
                'type' 		=> 'heading',
                'id'		=> 'widget_skin_price_box',
                'is_box'	=> true,
           	),
			array(  
				'name' 		=> __( 'Product Price', 'woo-widget-product-slideshow' ),
				'id' 		=> 'enable_slider_price',
				'class'		=> 'enable_slider_price',
				'type' 		=> 'onoff_checkbox',
				'default'	=> 1,
				'checked_value'		=> 1,
				'unchecked_value' 	=> 0,
				'checked_label'		=> __( 'ON', 'woo-widget-product-slideshow' ),
				'unchecked_label' 	=> __( 'OFF', 'woo-widget-product-slideshow' ),
			),
			
			array(
                'type' 		=> 'heading',
				'class'		=> 'slider_price_container'
           	),
			array(  
				'name' 		=> __( 'Price Font', 'woo-widget-product-slideshow' ),
				'id' 		=> 'price_font',
				'type' 		=> 'typography',
				'default'	=> array( 'size' => '12px', 'line_height' => '1.4em', 'face' => 'Arial, sans-serif', 'style' => 'normal', 'color' => '#FF0000' )
			),
			array(  
				'name' 		=> __( 'Old Price Font', 'woo-widget-product-slideshow' ),
				'id' 		=> 'old_price_font',
				'type' 		=> 'typography',
				'default'	=> array( 'size' => '11px', 'line_height' => '1.4em', 'face' => 'Arial, sans-serif', 'style' => 'normal', 'color' => '#000000' )
			),
			array(  
				'name' 		=> __( 'Price Font Margin', 'woo-widget-product-slideshow' ),
				'id' 		=> 'price_margin',
				'type' 		=> 'array_textfields',
				'ids'		=> array( 
	 								array( 
											'id' 		=> 'price_margin_top',
	 										'name' 		=> __( 'Top', 'woo-widget-product-slideshow' ),
	 										'css'		=> 'width:40px;',
	 										'default'	=> 5 ),
	 
	 								array(  'id' 		=> 'price_margin_bottom',
	 										'name' 		=> __( 'Bottom', 'woo-widget-product-slideshow' ),
	 										'css'		=> 'width:40px;',
	 										'default'	=> 5 ),
											
									array( 
											'id' 		=> 'price_margin_left',
	 										'name' 		=> __( 'Left', 'woo-widget-product-slideshow' ),
	 										'css'		=> 'width:40px;',
	 										'default'	=> 5 ),
											
									array( 
											'id' 		=> 'price_margin_right',
	 										'name' 		=> __( 'Right', 'woo-widget-product-slideshow' ),
	 										'css'		=> 'width:40px;',
	 										'default'	=> 5 ),
	 							)
			),
			
        ));
	}
	
	public function include_script() {
	?>
<script>
(function($) {
$(document).ready(function() {
	
	if ( $("input.enable_slider_price:checked").val() != '1') {
		$(".slider_price_container").css( {'visibility': 'hidden', 'height' : '0px', 'overflow' : 'hidden', 'margin-bottom' : '0px'} );
	}
	
	$(document).on( "a3rev-ui-onoff_checkbox-switch", '.enable_slider_price', function( event, value, status ) {
		$(".slider_price_container").attr('style','display:none;');
		if ( status == 'true' ) {
			$(".slider_price_container").slideDown();
		}
	});
	
});
})(jQuery);
</script>
    <?php	
	}
}

global $wc_product_slider_widget_skin_price_settings;
$wc_product_slider_widget_skin_price_settings = new WC_Product_Slider_Widget_Skin_Price_Settings();

?>