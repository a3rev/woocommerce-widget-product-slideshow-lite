<?php
/**
 * WooCommerce Product Slider Widget
 *
 * Table Of Contents
 *
 * __construct()
 * widget()
 * update()
 * form()
 */
class WC_Product_Slider_Widget extends WP_Widget
{
	function __construct() {
		$widget_ops = array(
			'classname'   => 'widget_product_cycle',
			'description' => __( 'Use this widget to add Woocommerce Products slider as a widget.', 'woo-widget-product-slideshow' ),
			'customize_selective_refresh' => true,
		);
		parent::__construct('widget_product_cycle', __('Woo Products Slider', 'woo-widget-product-slideshow' ), $widget_ops);
	}

	function widget( $args, $instance ) {
		extract($args);

		if ( version_compare( WC_VERSION, '3.3.0', '<' ) ) {
			// bw compat. for less than WC 3.3.0
			$thumbnail_size_name = 'shop_catalog';
		} else {
			$thumbnail_size_name = 'woocommerce_thumbnail';
		}
		
		$instance = wp_parse_args( (array) $instance, array( 
			'title' 				=> '', 
			'category_id' 			=> 0,
			'filter_type'			=> '',
			'widget_effect'			=> 'fade',
			'slider_auto_scroll'	=> 'no',
			'effect_delay'			=> 1,
			'effect_timeout'		=> 4,
			'effect_speed'			=> 2,
			'image_size'			=> $thumbnail_size_name,

			'number_products' => 6
		) );
		
		$title = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );
		
		echo $before_widget;
		if ( $title )
			echo $before_title . $title . $after_title;
		echo $this->items_cycle( $widget_id, $instance );
		echo $after_widget;
	}
	
	public static function items_cycle( $widget_id, $slider_settings ) {
		
		$output = '';
		
		// slider id
		$slider_id = 'plugin=wc_product_slider';
		
		
		$category_id 		= $slider_settings['category_id'];
		$filter_type 		= $slider_settings['filter_type'];
		
		$widget_effect 		= $slider_settings['widget_effect'];
		
		$number_products 	= intval( $slider_settings['number_products'] );
		if ( $number_products < 0 ) $number_products = -1;
		
		
		$tag_link = '';
		$category_link = '';
		
		$slider_id .= '&show_type=category';
		
		if ( $category_id < 1) return;
		$slider_id .= '&category_id='.$category_id;
		$slider_id .= '&filter_type='.$filter_type;
		$category_link = get_term_link( (int) $category_id, 'product_cat');
		
		$slider_id .= '&skin_type=widget';
		$slider_id .= '&number_products='.$number_products;

		if ( class_exists( 'SitePress' ) ) {
			$slider_id .= '&slider_lang'.ICL_LANGUAGE_CODE;
		}

		$output = '<div class="wc-product-slider-parent-container">';

		if ( $widget_effect == 'random' ) $slider_id .= '&widget_effect='.$widget_effect;
		$slider_id = base64_encode( $slider_id );
		$output .= WC_Product_Slider_Display::dispay_slider_widget( $slider_id, $slider_settings, $category_link, $tag_link );

		$output .= '</div>';
		
		return $output;
	}
	
	function update( $new_instance, $old_instance ) {
		
		$instance = array_merge( $old_instance, $new_instance );
		$instance['title'] 					= esc_attr( $new_instance['title'] );
		
		$number_products = intval( $new_instance['number_products'] );
		if ( $number_products < 0 ) $number_products = -1;
		$instance['number_products'] 		= $number_products;

		return $instance;
	}

	function form( $instance ) {

		if ( version_compare( WC_VERSION, '3.3.0', '<' ) ) {
			// bw compat. for less than WC 3.3.0
			$thumbnail_size_name = 'shop_catalog';
		} else {
			$thumbnail_size_name = 'woocommerce_thumbnail';
		}

		$instance = wp_parse_args( (array) $instance, array( 
			'title' 				=> '', 
			'category_id' 			=> 0,
			'filter_type'			=> '',
			'widget_effect'			=> 'fade',
			'slider_auto_scroll'	=> 'no',
			'effect_delay'			=> 1,
			'effect_timeout'		=> 4,
			'effect_speed'			=> 2,
			'image_size'			=> $thumbnail_size_name,
			
			'number_products' => 6
		) );
		
		$widget_id = str_replace('widget_product_cycle-','',$this->id);
		
		extract( $instance );
		
		$title = esc_attr( $title );
		$number_products = intval( $number_products );
		if ( $number_products < 0 ) $number_products = -1;
		
?>
<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e( 'Title:', 'woo-widget-product-slideshow' ); ?></label> <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></p>

<fieldset id="wc_product_slider_upgrade_area">
<legend><?php _e('Upgrade to','woo-widget-product-slideshow' ); ?> <a href="<?php echo WC_PRODUCT_SLIDER_VERSION_URI; ?>" target="_blank"><?php _e('Product Slider Version', 'woo-widget-product-slideshow' ); ?></a> <?php _e('to activate', 'woo-widget-product-slideshow' ); ?></legend>
<p>
	<label for="<?php echo $this->get_field_id('show_type'); ?>"><strong><?php _e( 'Show Type:', 'woo-widget-product-slideshow' ); ?></strong></label>
    <select class="wc_product_slider_show_type" id="<?php echo $this->get_field_id('show_type'); ?>" name="<?php echo $this->get_field_name('show_type'); ?>" >
		<option value="category" selected="selected" ><?php _e( 'Category', 'woo-widget-product-slideshow' ); ?></option>
        <option value="tag"><?php _e( 'Tag', 'woo-widget-product-slideshow' ); ?></option>
        <option value="recent"><?php _e( 'Newest', 'woo-widget-product-slideshow' ); ?></option>
        <option value="featured"><?php _e( 'Featured', 'woo-widget-product-slideshow' ); ?></option>
        <option value="onsale"><?php _e( 'On Sale', 'woo-widget-product-slideshow' ); ?></option>
	</select>
</p>

<p id="<?php echo $this->get_field_id('show_type'); ?>_tag" style="display:none">
<label for="<?php echo $this->get_field_id('tag_id'); ?>"><?php _e('Tag:', 'woo-widget-product-slideshow' ); ?></label> 
<?php wp_dropdown_categories( array('orderby' => 'name', 'name' => $this->get_field_name('tag_id'), 'id' => $this->get_field_id('tag_id'), 'class' => 'widefat', 'depth' => true, 'taxonomy' => 'product_tag') ); ?>
</p>

<p id="<?php echo $this->get_field_id('show_type'); ?>_filter" >
	<label for="<?php echo $this->get_field_id('filter_type'); ?>_pro"><strong><?php _e('Filter:', 'woo-widget-product-slideshow' ); ?></strong></label>
	<select id="<?php echo $this->get_field_id('filter_type'); ?>_pro" name="<?php echo $this->get_field_name('filter_type'); ?>_pro" >
		<option value="" selected="selected"><?php _e( 'Recent', 'woo-widget-product-slideshow' ); ?></option>
        <option value="featured" <?php selected( $filter_type, 'featured' ); ?>><?php _e( 'Featured', 'woo-widget-product-slideshow' ); ?></option>
        <option value="onsale" <?php selected( $filter_type, 'onsale' ); ?>><?php _e( 'On Sale', 'woo-widget-product-slideshow' ); ?></option>
	</select>
</p>
</fieldset>

<p>
<label for="<?php echo $this->get_field_id('category_id'); ?>"><?php _e('Category:', 'woo-widget-product-slideshow' ); ?></label> 
<?php wp_dropdown_categories( array('orderby' => 'name', 'selected' => $category_id, 'name' => $this->get_field_name('category_id'), 'id' => $this->get_field_id('category_id'), 'class' => 'widefat', 'depth' => true, 'taxonomy' => 'product_cat') ); ?>
</p>

<p>
	<label for="<?php echo $this->get_field_id('filter_type'); ?>"><strong><?php _e('Filter:', 'woo-widget-product-slideshow' ); ?></strong></label>
	<select id="<?php echo $this->get_field_id('filter_type'); ?>" name="<?php echo $this->get_field_name('filter_type'); ?>" >
		<option value="" selected="selected"><?php _e( 'Recent', 'woo-widget-product-slideshow' ); ?></option>
        <option value="featured" <?php selected( $filter_type, 'featured' ); ?>><?php _e( 'Featured', 'woo-widget-product-slideshow' ); ?></option>
        <option value="onsale" <?php selected( $filter_type, 'onsale' ); ?>><?php _e( 'On Sale', 'woo-widget-product-slideshow' ); ?></option>
	</select>
</p>

<p><label><?php _e('Number of products to show:', 'woo-widget-product-slideshow' ); ?> <input class="" name="<?php echo $this->get_field_name('number_products'); ?>" type="text" value="<?php echo $number_products; ?>" size="2" /></label><br />
<span class="description"><?php _e('Important! Set -1 to show all products. Warning - Setting large numbers (unlimited) could / will have an  impact on page load speed on some sites.', 'woo-widget-product-slideshow' ); ?></span>
</p>

<fieldset id="wc_product_slider_upgrade_area">
<legend><?php _e('Upgrade to','woo-widget-product-slideshow' ); ?> <a href="<?php echo WC_PRODUCT_SLIDER_VERSION_URI; ?>" target="_blank"><?php _e('Product Slider Version', 'woo-widget-product-slideshow' ); ?></a> <?php _e('to activate', 'woo-widget-product-slideshow' ); ?></legend>
<p><label><strong><?php _e( 'Skin Type:', 'woo-widget-product-slideshow' ); ?></strong></label>
	<label><input type="radio" class="wc_product_slider_skin_type" data-id="<?php echo $this->get_field_id('skin_type'); ?>" name="<?php echo $this->get_field_name('skin_type'); ?>" value="widget" checked="checked" /> <?php _e( 'WIDGET', 'woo-widget-product-slideshow' ); ?></label> &nbsp;&nbsp;&nbsp;
	<label><input type="radio" class="wc_product_slider_skin_type" data-id="<?php echo $this->get_field_id('skin_type'); ?>" name="<?php echo $this->get_field_name('skin_type'); ?>" value="card" /> <?php _e( 'CARD', 'woo-widget-product-slideshow' ); ?></label>
</p>

<div id="<?php echo $this->get_field_id('skin_type'); ?>_card" style="display:none">
    <p><label><strong><?php _e('Effects Type:', 'woo-widget-product-slideshow' ); ?></strong></label>
        <select>
        <?php
        $transitions_list = WC_Product_Slider_Functions::card_slider_transitions_list();
        foreach ( $transitions_list as $effect_key => $effect_name ) {
        ?>
            <option value="<?php echo $effect_key; ?>"><?php echo $effect_name; ?></option>
        <?php
        }
        ?>
        </select>
    </p>
</div>
</fieldset>

<div id="<?php echo $this->get_field_id('skin_type'); ?>_widget">
    <p><label><strong><?php _e('Effects Type:', 'woo-widget-product-slideshow' ); ?></strong></label>
        <select id="<?php echo $this->get_field_id('widget_effect'); ?>" name="<?php echo $this->get_field_name('widget_effect'); ?>" >
        <?php
        $transitions_list = WC_Product_Slider_Functions::slider_transitions_list();
        foreach ( $transitions_list as $effect_key => $effect_name ) {
        ?>
            <option value="<?php echo $effect_key; ?>" <?php selected( $effect_key, $widget_effect ); ?>><?php echo $effect_name; ?></option>
        <?php
        }
        ?>
        </select>
    </p>
</div>
  
<p><label><strong><?php _e( 'Transition Method:', 'woo-widget-product-slideshow' ); ?></strong></label>
    <label><input type="radio" class="wc_product_slider_slider_auto_scroll" data-id="<?php echo $this->get_field_id('slider_auto_scroll'); ?>" name="<?php echo $this->get_field_name('slider_auto_scroll'); ?>" value="no" checked="checked" /> <?php _e( 'MANUAL', 'woo-widget-product-slideshow' ); ?></label> &nbsp;&nbsp;&nbsp;
    <label><input type="radio" class="wc_product_slider_slider_auto_scroll" data-id="<?php echo $this->get_field_id('slider_auto_scroll'); ?>" name="<?php echo $this->get_field_name('slider_auto_scroll'); ?>" value="yes" <?php checked( $slider_auto_scroll, 'yes' ); ?> /> <?php _e( 'AUTO', 'woo-widget-product-slideshow' ); ?></label>
</p>

<div id="<?php echo $this->get_field_id('slider_auto_scroll'); ?>_auto" <?php if ( $slider_auto_scroll != 'yes' ) { echo 'style="display:none"'; } ?>>
    <p><label><?php _e('Auto Start Delay:', 'woo-widget-product-slideshow' ); ?> <input name="<?php echo $this->get_field_name('effect_delay'); ?>" type="text" value="<?php echo $effect_delay; ?>" size="1" /> <?php _e('seconds', 'woo-widget-product-slideshow' ); ?></label></p>
</div>

<p><label><?php _e('Time Between Transitions:', 'woo-widget-product-slideshow' ); ?> <input name="<?php echo $this->get_field_name('effect_timeout'); ?>" type="text" value="<?php echo $effect_timeout; ?>" size="1" /> <?php _e('seconds', 'woo-widget-product-slideshow' ); ?></label></p>
<p><label><?php _e('Transition Effect Speed:', 'woo-widget-product-slideshow' ); ?> <input name="<?php echo $this->get_field_name('effect_speed'); ?>" type="text" value="<?php echo $effect_speed; ?>" size="1" /> <?php _e('seconds', 'woo-widget-product-slideshow' ); ?></label></p>

<p><label><strong><?php _e('Thumbnail Size:', 'woo-widget-product-slideshow' ); ?></strong></label>
    <select id="<?php echo $this->get_field_id('image_size'); ?>" name="<?php echo $this->get_field_name('image_size'); ?>" >
    <?php
    $available_sizes = get_intermediate_image_sizes();
    foreach ( $available_sizes as $size_name ) {
    ?>
        <option value="<?php echo $size_name; ?>" <?php selected( $image_size, $size_name ); ?>><?php echo $size_name; ?></option>
    <?php
    }
    ?>
    </select>
</p>
<?php
	}
}
?>