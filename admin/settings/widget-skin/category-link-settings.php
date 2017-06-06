<?php
/* "Copyright 2012 A3 Revolution Web Design" This software is distributed under the terms of GNU GENERAL PUBLIC LICENSE Version 3, 29 June 2007 */
// File Security Check
if ( ! defined( 'ABSPATH' ) ) exit;
?>
<?php
/*-----------------------------------------------------------------------------------
Slider Widget Skin Category & Tag Link Settings

-----------------------------------------------------------------------------------*/

class WC_Product_Slider_Widget_Skin_Category_Link_Settings
{

	/**
	 * @var string
	 * You must change to correct form key that you are working
	 */
	public $form_key = 'wc_product_slider_a3_widget_skin_category_tag_link_settings';

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
				'name'		=> __( "'View Product Category' Link", 'woo-widget-product-slideshow' ),
                'type' 		=> 'heading',
                'id'		=> 'widget_skin_category_link_box',
                'is_box'	=> true,
           	),
			array(  
				'name' 		=> __( 'Product Category Link', 'woo-widget-product-slideshow' ),
				'id' 		=> 'enable_category_link',
				'class'		=> 'enable_category_link',
				'type' 		=> 'onoff_checkbox',
				'default'	=> 1,
				'checked_value'		=> 1,
				'unchecked_value' 	=> 0,
				'checked_label'		=> __( 'ON', 'woo-widget-product-slideshow' ),
				'unchecked_label' 	=> __( 'OFF', 'woo-widget-product-slideshow' ),
			),
			
			array(
                'type' 		=> 'heading',
				'class'		=> 'category_link_container'
           	),
			array(  
				'name' 		=> __( 'Category Link Text', 'woo-widget-product-slideshow' ),
				'id' 		=> 'category_link_text',
				'type' 		=> 'text',
				'default'	=> __( 'View all Products in this Category', 'woo-widget-product-slideshow' ),
			),
			array(  
				'name' 		=> __( 'Category Link Font', 'woo-widget-product-slideshow' ),
				'id' 		=> 'category_link_font',
				'type' 		=> 'typography',
				'default'	=> array( 'size' => '14px', 'line_height' => '1.4em', 'face' => 'Arial, sans-serif', 'style' => 'normal', 'color' => '#000000' )
			),
			array(  
				'name' 		=> __( 'Text Hover Colour', 'woo-widget-product-slideshow' ),
				'id' 		=> 'category_link_font_hover_color',
				'type' 		=> 'color',
				'default'	=> '#999999'
			),
			array(  
				'name' 		=> __( 'Text Alignment', 'woo-widget-product-slideshow' ),
				'id' 		=> 'category_link_alignment',
				'type' 		=> 'onoff_radio',
				'default' 	=> 'center',
				'onoff_options' => array(
					array(
						'val' 				=> 'left',
						'text' 				=> __( 'Left', 'woo-widget-product-slideshow' ),
						'checked_label'		=> __( 'ON', 'woo-widget-product-slideshow' ) ,
						'unchecked_label' 	=> __( 'OFF', 'woo-widget-product-slideshow' ) ,
					),
					array(
						'val' 				=> 'center',
						'text' 				=> __( 'Center', 'woo-widget-product-slideshow' ),
						'checked_label'		=> __( 'ON', 'woo-widget-product-slideshow' ) ,
						'unchecked_label' 	=> __( 'OFF', 'woo-widget-product-slideshow' ) ,
					),
					array(
						'val' 				=> 'right',
						'text' 				=> __( 'Right', 'woo-widget-product-slideshow' ),
						'checked_label'		=> __( 'ON', 'woo-widget-product-slideshow' ) ,
						'unchecked_label' 	=> __( 'OFF', 'woo-widget-product-slideshow' ) ,
					),
				),
			),
			array(  
				'name' 		=> __( 'Text Container Colour', 'woo-widget-product-slideshow' ),
				'id' 		=> 'category_link_background_colour',
				'type' 		=> 'bg_color',
				'default'	=> array( 'enable' => 1, 'color' => '#F7F7F7' ),
			),
			array(  
				'name' 		=> __( 'Container Border', 'woo-widget-product-slideshow' ),
				'id' 		=> 'category_link_border',
				'type' 		=> 'border',
				'default'	=> array( 'width' => '0px', 'style' => 'solid', 'color' => '#000000', 'corner' => 'rounded' , 'rounded_value' => 0 )
			),
			array(  
				'name' 		=> __( 'Container Border Shadow', 'woo-widget-product-slideshow' ),
				'id' 		=> 'category_link_shadow',
				'type' 		=> 'box_shadow',
				'default'	=> array( 'enable' => 0, 'h_shadow' => '5px' , 'v_shadow' => '5px', 'blur' => '2px' , 'spread' => '2px', 'color' => '#DBDBDB', 'inset' => '' )
			),
			array(  
				'name' 		=> __( 'Border Margin (Outside)', 'woo-widget-product-slideshow' ),
				'id' 		=> 'category_link_margin',
				'type' 		=> 'array_textfields',
				'ids'		=> array( 
	 								array( 
											'id' 		=> 'category_link_margin_top',
	 										'name' 		=> __( 'Top', 'woo-widget-product-slideshow' ),
	 										'css'		=> 'width:40px;',
	 										'default'	=> 5 ),
	 
	 								array(  'id' 		=> 'category_link_margin_bottom',
	 										'name' 		=> __( 'Bottom', 'woo-widget-product-slideshow' ),
	 										'css'		=> 'width:40px;',
	 										'default'	=> 5 ),
											
									array( 
											'id' 		=> 'category_link_margin_left',
	 										'name' 		=> __( 'Left', 'woo-widget-product-slideshow' ),
	 										'css'		=> 'width:40px;',
	 										'default'	=> 0 ),
											
									array( 
											'id' 		=> 'category_link_margin_right',
	 										'name' 		=> __( 'Right', 'woo-widget-product-slideshow' ),
	 										'css'		=> 'width:40px;',
	 										'default'	=> 0 ),
	 							)
			),
			array(  
				'name' 		=> __( 'Border Padding (Inside)', 'woo-widget-product-slideshow' ),
				'id' 		=> 'category_link_padding',
				'type' 		=> 'array_textfields',
				'ids'		=> array( 
	 								array( 
											'id' 		=> 'category_link_padding_top',
	 										'name' 		=> __( 'Top', 'woo-widget-product-slideshow' ),
	 										'css'		=> 'width:40px;',
	 										'default'	=> 5 ),
	 
	 								array(  'id' 		=> 'category_link_padding_bottom',
	 										'name' 		=> __( 'Bottom', 'woo-widget-product-slideshow' ),
	 										'css'		=> 'width:40px;',
	 										'default'	=> 5 ),
											
									array( 
											'id' 		=> 'category_link_padding_left',
	 										'name' 		=> __( 'Left', 'woo-widget-product-slideshow' ),
	 										'css'		=> 'width:40px;',
	 										'default'	=> 10 ),
											
									array( 
											'id' 		=> 'category_link_padding_right',
	 										'name' 		=> __( 'Right', 'woo-widget-product-slideshow' ),
	 										'css'		=> 'width:40px;',
	 										'default'	=> 10 ),
	 							)
			),
			
			array(
				'name'		=> __( "'View Product Tag' Link", 'woo-widget-product-slideshow' ),
                'type' 		=> 'heading',
                'id'		=> 'widget_skin_tag_link_box',
                'is_box'	=> true,
           	),
			array(  
				'name' 		=> __( 'Product Tag Link', 'woo-widget-product-slideshow' ),
				'id' 		=> 'enable_tag_link',
				'class'		=> 'enable_tag_link',
				'type' 		=> 'onoff_checkbox',
				'default'	=> 1,
				'checked_value'		=> 1,
				'unchecked_value' 	=> 0,
				'checked_label'		=> __( 'ON', 'woo-widget-product-slideshow' ),
				'unchecked_label' 	=> __( 'OFF', 'woo-widget-product-slideshow' ),
			),
			
			array(
                'type' 		=> 'heading',
				'class'		=> 'tag_link_container'
           	),
			array(  
				'name' 		=> __( 'Tag Link Text', 'woo-widget-product-slideshow' ),
				'id' 		=> 'tag_link_text',
				'type' 		=> 'text',
				'default'	=> __( 'View all Products in this Tag', 'woo-widget-product-slideshow' ),
			),
			array(  
				'name' 		=> __( 'Tag Link Font', 'woo-widget-product-slideshow' ),
				'id' 		=> 'tag_link_font',
				'type' 		=> 'typography',
				'default'	=> array( 'size' => '14px', 'line_height' => '1.4em', 'face' => 'Arial, sans-serif', 'style' => 'normal', 'color' => '#000000' )
			),
			array(  
				'name' 		=> __( 'Text Hover Colour', 'woo-widget-product-slideshow' ),
				'id' 		=> 'tag_link_font_hover_color',
				'type' 		=> 'color',
				'default'	=> '#999999'
			),
			array(  
				'name' 		=> __( 'Text Alignment', 'woo-widget-product-slideshow' ),
				'id' 		=> 'tag_link_alignment',
				'type' 		=> 'onoff_radio',
				'default' 	=> 'center',
				'onoff_options' => array(
					array(
						'val' 				=> 'left',
						'text' 				=> __( 'Left', 'woo-widget-product-slideshow' ),
						'checked_label'		=> __( 'ON', 'woo-widget-product-slideshow' ) ,
						'unchecked_label' 	=> __( 'OFF', 'woo-widget-product-slideshow' ) ,
					),
					array(
						'val' 				=> 'center',
						'text' 				=> __( 'Center', 'woo-widget-product-slideshow' ),
						'checked_label'		=> __( 'ON', 'woo-widget-product-slideshow' ) ,
						'unchecked_label' 	=> __( 'OFF', 'woo-widget-product-slideshow' ) ,
					),
					array(
						'val' 				=> 'right',
						'text' 				=> __( 'Right', 'woo-widget-product-slideshow' ),
						'checked_label'		=> __( 'ON', 'woo-widget-product-slideshow' ) ,
						'unchecked_label' 	=> __( 'OFF', 'woo-widget-product-slideshow' ) ,
					),
				),
			),
			array(  
				'name' 		=> __( 'Text Container Colour', 'woo-widget-product-slideshow' ),
				'id' 		=> 'tag_link_background_colour',
				'type' 		=> 'bg_color',
				'default'	=> array( 'enable' => 1, 'color' => '#F7F7F7' ),
			),
			array(  
				'name' 		=> __( 'Container Border', 'woo-widget-product-slideshow' ),
				'id' 		=> 'tag_link_border',
				'type' 		=> 'border',
				'default'	=> array( 'width' => '0px', 'style' => 'solid', 'color' => '#000000', 'corner' => 'rounded' , 'rounded_value' => 0 )
			),
			array(  
				'name' 		=> __( 'Container Border Shadow', 'woo-widget-product-slideshow' ),
				'id' 		=> 'tag_link_shadow',
				'type' 		=> 'box_shadow',
				'default'	=> array( 'enable' => 0, 'h_shadow' => '5px' , 'v_shadow' => '5px', 'blur' => '2px' , 'spread' => '2px', 'color' => '#DBDBDB', 'inset' => '' )
			),
			array(  
				'name' 		=> __( 'Border Margin (Outside)', 'woo-widget-product-slideshow' ),
				'id' 		=> 'tag_link_margin',
				'type' 		=> 'array_textfields',
				'ids'		=> array( 
	 								array( 
											'id' 		=> 'tag_link_margin_top',
	 										'name' 		=> __( 'Top', 'woo-widget-product-slideshow' ),
	 										'css'		=> 'width:40px;',
	 										'default'	=> 5 ),
	 
	 								array(  'id' 		=> 'tag_link_margin_bottom',
	 										'name' 		=> __( 'Bottom', 'woo-widget-product-slideshow' ),
	 										'css'		=> 'width:40px;',
	 										'default'	=> 5 ),
											
									array( 
											'id' 		=> 'tag_link_margin_left',
	 										'name' 		=> __( 'Left', 'woo-widget-product-slideshow' ),
	 										'css'		=> 'width:40px;',
	 										'default'	=> 0 ),
											
									array( 
											'id' 		=> 'tag_link_margin_right',
	 										'name' 		=> __( 'Right', 'woo-widget-product-slideshow' ),
	 										'css'		=> 'width:40px;',
	 										'default'	=> 0 ),
	 							)
			),
			array(  
				'name' 		=> __( 'Border Padding (Inside)', 'woo-widget-product-slideshow' ),
				'id' 		=> 'tag_link_padding',
				'type' 		=> 'array_textfields',
				'ids'		=> array( 
	 								array( 
											'id' 		=> 'tag_link_padding_top',
	 										'name' 		=> __( 'Top', 'woo-widget-product-slideshow' ),
	 										'css'		=> 'width:40px;',
	 										'default'	=> 5 ),
	 
	 								array(  'id' 		=> 'tag_link_padding_bottom',
	 										'name' 		=> __( 'Bottom', 'woo-widget-product-slideshow' ),
	 										'css'		=> 'width:40px;',
	 										'default'	=> 5 ),
											
									array( 
											'id' 		=> 'tag_link_padding_left',
	 										'name' 		=> __( 'Left', 'woo-widget-product-slideshow' ),
	 										'css'		=> 'width:40px;',
	 										'default'	=> 10 ),
											
									array( 
											'id' 		=> 'tag_link_padding_right',
	 										'name' 		=> __( 'Right', 'woo-widget-product-slideshow' ),
	 										'css'		=> 'width:40px;',
	 										'default'	=> 10 ),
	 							)
			),
			
        ));
	}
	
	public function include_script() {
	?>
<script>
(function($) {
$(document).ready(function() {
	if ( $("input.enable_category_link:checked").val() != '1') {
		$(".category_link_container").css( {'visibility': 'hidden', 'height' : '0px', 'overflow' : 'hidden', 'margin-bottom' : '0px' } );
	}
	
	if ( $("input.enable_tag_link:checked").val() != '1') {
		$(".tag_link_container").css( {'visibility': 'hidden', 'height' : '0px', 'overflow' : 'hidden', 'margin-bottom' : '0px' } );
	}
	
	$(document).on( "a3rev-ui-onoff_checkbox-switch", '.enable_category_link', function( event, value, status ) {
		$(".category_link_container").attr('style','display:none;');
		if ( status == 'true' ) {
			$(".category_link_container").slideDown();
		}
	});
	
	$(document).on( "a3rev-ui-onoff_checkbox-switch", '.enable_tag_link', function( event, value, status ) {
		$(".tag_link_container").attr('style','display:none;');
		if ( status == 'true' ) {
			$(".tag_link_container").slideDown();
		}
	});
	
});
})(jQuery);
</script>
    <?php	
	}
}

global $wc_product_slider_widget_skin_category_link_settings;
$wc_product_slider_widget_skin_category_link_settings = new WC_Product_Slider_Widget_Skin_Category_Link_Settings();

?>