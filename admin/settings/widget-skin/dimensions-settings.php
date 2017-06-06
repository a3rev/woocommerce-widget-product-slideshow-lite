<?php
/* "Copyright 2012 A3 Revolution Web Design" This software is distributed under the terms of GNU GENERAL PUBLIC LICENSE Version 3, 29 June 2007 */
// File Security Check
if ( ! defined( 'ABSPATH' ) ) exit;
?>
<?php
/*-----------------------------------------------------------------------------------
Slider Widget Skin Dimensions Settings

-----------------------------------------------------------------------------------*/

class WC_Product_Slider_Widget_Skin_Dimensions_Settings
{

	/**
	 * @var string
	 * You must change to correct form key that you are working
	 */
	public $form_key = 'wc_product_slider_a3_widget_skin_dimensions_settings';

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
				'name' 		=> __( 'Slider Dimensions', 'woo-widget-product-slideshow' ),
                'type' 		=> 'heading',
				'id'		=> 'widget_skin_dimensions_box',
                'is_box'	=> true,
           	),
			array(  
				'name' 		=> __( 'Slider Height', 'woo-widget-product-slideshow' ),
				'id' 		=> 'is_slider_tall_dynamic',
				'class'		=> 'is_slider_tall_dynamic',
				'type' 		=> 'switcher_checkbox',
				'default'	=> 0,
				'checked_value'		=> 0,
				'unchecked_value'	=> 1,
				'checked_label'		=> __( 'Fixed', 'woo-widget-product-slideshow' ),
				'unchecked_label' 	=> __( 'Dynamic', 'woo-widget-product-slideshow' ),	
			),
			
			array(
                'type' 		=> 'heading',
				'class'		=> 'is_slider_tall_dynamic_off',
           	),
			array(  
				'name' 		=> __( 'Height', 'woo-widget-product-slideshow' ),
				'desc'		=> 'px',
				'id' 		=> 'slider_height_fixed',
				'type' 		=> 'text',
				'default'	=> 250,
				'css'		=> 'width:40px;',
			),
			
        ));
	}
	
	public function include_script() {
	?>
<script>
(function($) {
$(document).ready(function() {
	if ( $("input.is_slider_tall_dynamic:checked").val() != '0') {
		$(".is_slider_tall_dynamic_off").hide();
	}
	
	$(document).on( "a3rev-ui-onoff_checkbox-switch", '.is_slider_tall_dynamic', function( event, value, status ) {
		if ( status == 'true' ) {
			$(".is_slider_tall_dynamic_off").slideDown();
		} else {
			$(".is_slider_tall_dynamic_off").slideUp();
		}
	});
	
});
})(jQuery);
</script>
    <?php	
	}
}

global $wc_product_slider_widget_skin_dimensions_settings;
$wc_product_slider_widget_skin_dimensions_settings = new WC_Product_Slider_Widget_Skin_Dimensions_Settings();

?>