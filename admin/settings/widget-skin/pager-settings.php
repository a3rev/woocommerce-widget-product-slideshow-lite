<?php
/* "Copyright 2012 A3 Revolution Web Design" This software is distributed under the terms of GNU GENERAL PUBLIC LICENSE Version 3, 29 June 2007 */
// File Security Check
if ( ! defined( 'ABSPATH' ) ) exit;
?>
<?php
/*-----------------------------------------------------------------------------------
Slider Widget Skin Pager Settings

-----------------------------------------------------------------------------------*/

class WC_Product_Slider_Widget_Skin_Pager_Settings
{

	/**
	 * @var string
	 * You must change to correct form key that you are working
	 */
	public $form_key = 'wc_product_slider_a3_widget_skin_pager_settings';

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
				'name'		=> __( 'Slider Items Pager Bullets', 'woo-widget-product-slideshow' ),
				'desc'		=> __( 'The small colour bullets that indicate how many images are in the slider and current image position in the slider', 'woo-widget-product-slideshow' ),
                'type' 		=> 'heading',
                'id'		=> 'widget_skin_pager_box',
                'is_box'	=> true,
           	),
			array(  
				'name' 		=> __( 'Slider Pager', 'woo-widget-product-slideshow' ),
				'id' 		=> 'enable_slider_pager',
				'class'		=> 'enable_slider_pager',
				'type' 		=> 'onoff_checkbox',
				'default'	=> 1,
				'checked_value'		=> 1,
				'unchecked_value' 	=> 0,
				'checked_label'		=> __( 'ON', 'woo-widget-product-slideshow' ),
				'unchecked_label' 	=> __( 'OFF', 'woo-widget-product-slideshow' ),
			),
			
			array(
                'type' 		=> 'heading',
				'class'		=> 'slider_pager_container'
           	),
			array(  
				'name' 		=> __( 'Pager Display', 'woo-widget-product-slideshow' ),
				'id' 		=> 'slider_pager_transition',
				'type' 		=> 'onoff_radio',
				'class'		=> 'slider_pager_transition',
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
				'name' 		=> __( 'Pager Direction', 'woo-widget-product-slideshow' ),
				'id' 		=> 'slider_pager_direction',
				'class'		=> 'slider_pager_direction',
				'type' 		=> 'switcher_checkbox',
				'default'	=> 'horizontal',
				'checked_value'		=> 'horizontal',
				'unchecked_value'	=> 'vertical',
				'checked_label'		=> __( 'Horizontal', 'woo-widget-product-slideshow' ),
				'unchecked_label' 	=> __( 'Vertical', 'woo-widget-product-slideshow' ),	
			),
			array(  
				'name' 		=> __( 'Pager Position', 'woo-widget-product-slideshow' ),
				'id' 		=> 'slider_pager_position',
				'type' 		=> 'select',
				'default'	=> 'bottom-right',
				'options'	=> array(
					'top-left'		=> __( 'Top Left', 'woo-widget-product-slideshow' ),
					'top-center'	=> __( 'Top Center', 'woo-widget-product-slideshow' ),
					'top-right'		=> __( 'Top Right', 'woo-widget-product-slideshow' ),
					'bottom-left'	=> __( 'Bottom Left', 'woo-widget-product-slideshow' ),
					'bottom-center'	=> __( 'Bottom Center', 'woo-widget-product-slideshow' ),
					'bottom-right'	=> __( 'Bottom Right', 'woo-widget-product-slideshow' ),
				),
				'css' 		=> 'width:160px;',
			),
			array(  
				'name' 		=> __( 'Pager Container Background', 'woo-widget-product-slideshow' ),
				'desc'		=> __( 'Pager Bullets sit inside of this container', 'woo-widget-product-slideshow' ),
				'id' 		=> 'pager_background_colour',
				'class'		=> 'pager_background_colour',
				'type' 		=> 'bg_color',
				'default'	=> array( 'enable' => 1, 'color' => '#000000' ),
			),

			array(
				'type'   => 'heading',
				'class'     => 'pager_background_colour_container',
			),
			array(  
				'name' 		=> __( 'Background Transparency', 'woo-widget-product-slideshow' ),
				'desc'		=> __( 'Scale - 0 = 100% transparent - 100 = 100% Solid Colour.', 'woo-widget-product-slideshow' ),
				'id' 		=> 'pager_background_transparency',
				'type' 		=> 'slider',
				'default'	=> 60,
				'min'		=> 0,
				'max'		=> 100,
				'increment'	=> 10,
			),

			array(
				'type'   => 'heading',
				'class'     => 'slider_pager_container',
			),
			array(  
				'name' 		=> __( 'Pager Container Border', 'woo-widget-product-slideshow' ),
				'id' 		=> 'pager_border',
				'type' 		=> 'border',
				'default'	=> array( 'width' => '0px', 'style' => 'solid', 'color' => '#000000', 'corner' => 'rounded' , 'rounded_value' =>4 )
			),
			array(  
				'name' 		=> __( 'Container Border Shadow', 'woo-widget-product-slideshow' ),
				'id' 		=> 'pager_shadow',
				'type' 		=> 'box_shadow',
				'default'	=> array( 'enable' => 0, 'h_shadow' => '5px' , 'v_shadow' => '5px', 'blur' => '2px' , 'spread' => '2px', 'color' => '#DBDBDB', 'inset' => '' )
			),
			
			array(  
				'name' 		=> __( 'Bullets Colour', 'woo-widget-product-slideshow' ),
				'id' 		=> 'pager_item_background_colour',
				'type' 		=> 'color',
				'default'	=> '#000000'
			),
			array(  
				'name' 		=> __( 'Bullets Border', 'woo-widget-product-slideshow' ),
				'id' 		=> 'pager_item_border',
				'type' 		=> 'border',
				'default'	=> array( 'width' => '1px', 'style' => 'solid', 'color' => '#FFFFFF', 'corner' => 'rounded' , 'rounded_value' => 10 )
			),
			array(  
				'name' 		=> __( 'Bullet Shadow', 'woo-widget-product-slideshow' ),
				'id' 		=> 'pager_item_shadow',
				'type' 		=> 'box_shadow',
				'default'	=> array( 'enable' => 0, 'h_shadow' => '5px' , 'v_shadow' => '5px', 'blur' => '2px' , 'spread' => '2px', 'color' => '#DBDBDB', 'inset' => '' )
			),
			
			array(  
				'name' 		=> __( 'Active Bullet Colour', 'woo-widget-product-slideshow' ),
				'id' 		=> 'pager_activate_item_background_colour',
				'type' 		=> 'color',
				'default'	=> '#FFFFFF'
			),
			array(  
				'name' 		=> __( 'Active Bullet Border', 'woo-widget-product-slideshow' ),
				'id' 		=> 'pager_activate_item_border',
				'type' 		=> 'border',
				'default'	=> array( 'width' => '1px', 'style' => 'solid', 'color' => '#FFFFFF', 'corner' => 'rounded' , 'rounded_value' => 10 )
			),
			array(  
				'name' 		=> __( 'Active Bullet Shadow', 'woo-widget-product-slideshow' ),
				'id' 		=> 'pager_activate_item_shadow',
				'type' 		=> 'box_shadow',
				'default'	=> array( 'enable' => 0, 'h_shadow' => '5px' , 'v_shadow' => '5px', 'blur' => '2px' , 'spread' => '2px', 'color' => '#DBDBDB', 'inset' => '' )
			),
			
        ));
	}
	
	public function include_script() {
	?>
<script>
(function($) {
$(document).ready(function() {
	
	if ( $("input.enable_slider_pager:checked").val() != '1') {
		$(".slider_pager_container").css( {'visibility': 'hidden', 'height' : '0px', 'overflow' : 'hidden', 'margin-bottom' : '0px' } );
		$(".pager_background_colour_container").css( {'visibility': 'hidden', 'height' : '0px', 'overflow' : 'hidden', 'margin-bottom' : '0px' } );
	}

	if ( $("input.pager_background_colour:checked").val() != 1 ) {
		$('.pager_background_colour_container').css( {'visibility': 'hidden', 'height' : '0px', 'overflow' : 'hidden', 'margin-bottom' : '0px' } );
	}
	
	$(document).on( "a3rev-ui-onoff_checkbox-switch", '.enable_slider_pager', function( event, value, status ) {
		$(".slider_pager_container").attr('style','display:none;');
		$(".pager_background_colour_container").attr('style','display:none;');
		if ( status == 'true' ) {
			$(".slider_pager_container").slideDown();

			if ( $("input.pager_background_colour:checked").val() == 1 ) {
				$(".pager_background_colour_container").slideDown();
			}
		}
	});

	$(document).on( "a3rev-ui-onoff_checkbox-switch", '.pager_background_colour', function( event, value, status ) {
		$('.pager_background_colour_container').attr('style','display:none;');
		if ( status == 'true' ) {
			$(".pager_background_colour_container").slideDown();
		}
	});
	
});
})(jQuery);
</script>
    <?php	
	}
}

global $wc_product_slider_widget_skin_pager_settings;
$wc_product_slider_widget_skin_pager_settings = new WC_Product_Slider_Widget_Skin_Pager_Settings();


?>