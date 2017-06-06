<?php
/**
 * WooCommerce Product Carousel Widget
 *
 * Table Of Contents
 *
 * __construct()
 * widget()
 * update()
 * form()
 */
class WC_Product_Slider_Carousel_Widget extends WP_Widget
{
	function __construct() {
		$widget_ops = array(
			'classname'   => 'wc_product_slider_carousel',
			'description' => __( 'Use this widget to add WooCommerce Products Carousel as a widget.', 'woo-widget-product-slideshow' ),
			'customize_selective_refresh' => true,
		);
		parent::__construct('wc_product_slider_carousel', __('Woo Products Carousel', 'woo-widget-product-slideshow' ), $widget_ops);
	}

	function widget( $args, $instance ) {				
		echo '';
	}
		
	function update( $new_instance, $old_instance ) {
		
		$instance = array_merge( $old_instance, $new_instance );
		$instance['title'] 					= esc_attr( $new_instance['title'] );
		
		$carousel_visible = intval( $new_instance['carousel_visible'] );
		$number_products = intval( $new_instance['number_products'] );
		if ( $number_products < 0 ) $number_products = -1;
		$instance['number_products'] 		= $number_products;
		
		return $instance;
	}

	function form( $instance ) {
		$instance = wp_parse_args( (array) $instance, array( 
			'title' 				=> '', 
			'show_type' 			=> 'category',
			'category_id' 			=> 0, 
			'tag_id' 				=> 0,
			'filter_type'			=> '',
			'carousel_type'			=> 'horizontal',
			'carousel_visible'		=> 1,
			'slider_auto_scroll'	=> 'no',
			'effect_delay'			=> 1,
			'effect_timeout'		=> 4,
			'effect_speed'			=> 2,
			'image_size'			=> 'shop_catalog',
			
			'number_products' => 6 
		) );
				
		extract( $instance );
		
		$title = esc_attr( $title );
		$carousel_visible = intval( $carousel_visible );
		$number_products = intval( $number_products );
		if ( $number_products < 0 ) $number_products = -1;
		
?>
<fieldset id="wc_product_slider_upgrade_area">
<legend><?php _e('Upgrade to','woo-widget-product-slideshow' ); ?> <a href="<?php echo WC_CAROUSEL_SLIDER_VERSION_URI; ?>" target="_blank"><?php _e('Carousel & Slider Version', 'woo-widget-product-slideshow' ); ?></a> <?php _e('to activate', 'woo-widget-product-slideshow' ); ?></legend>
<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e( 'Title:', 'woo-widget-product-slideshow' ); ?></label> <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></p>

<p>
	<label for="<?php echo $this->get_field_id('show_type'); ?>"><strong><?php _e( 'Show Type:', 'woo-widget-product-slideshow' ); ?></strong></label>
    <select class="wc_product_slider_show_type" id="<?php echo $this->get_field_id('show_type'); ?>" name="<?php echo $this->get_field_name('show_type'); ?>" >
		<option value="category" <?php selected( $show_type, 'category' ); ?>><?php _e( 'Category', 'woo-widget-product-slideshow' ); ?></option>
        <option value="tag" <?php selected( $show_type, 'tag' ); ?>><?php _e( 'Tag', 'woo-widget-product-slideshow' ); ?></option>
        <option value="recent" <?php selected( $show_type, 'recent' ); ?>><?php _e( 'Newest', 'woo-widget-product-slideshow' ); ?></option>
        <option value="featured" <?php selected( $show_type, 'featured' ); ?>><?php _e( 'Featured', 'woo-widget-product-slideshow' ); ?></option>
        <option value="onsale" <?php selected( $show_type, 'onsale' ); ?>><?php _e( 'On Sale', 'woo-widget-product-slideshow' ); ?></option>
	</select>
</p>

<p id="<?php echo $this->get_field_id('show_type'); ?>_category" <?php if ( $show_type != 'category' ) { echo 'style="display:none"'; } ?> >
<label for="<?php echo $this->get_field_id('category_id'); ?>"><?php _e('Category:', 'woo-widget-product-slideshow' ); ?></label> 
<?php wp_dropdown_categories( array('orderby' => 'name', 'selected' => $category_id, 'name' => $this->get_field_name('category_id'), 'id' => $this->get_field_id('category_id'), 'class' => 'widefat', 'depth' => true, 'taxonomy' => 'product_cat') ); ?>
</p>

<p id="<?php echo $this->get_field_id('show_type'); ?>_tag" <?php if ( $show_type != 'tag' ) { echo 'style="display:none"'; } ?> >
<label for="<?php echo $this->get_field_id('tag_id'); ?>"><?php _e('Tag:', 'woo-widget-product-slideshow' ); ?></label> 
<?php wp_dropdown_categories( array('orderby' => 'name', 'selected' => $tag_id, 'name' => $this->get_field_name('tag_id'), 'id' => $this->get_field_id('tag_id'), 'class' => 'widefat', 'depth' => true, 'taxonomy' => 'product_tag') ); ?>
</p>

<p id="<?php echo $this->get_field_id('show_type'); ?>_filter" <?php if ( ! in_array( $show_type, array( 'category', 'tag' ) ) ) { echo 'style="display:none"'; } ?> >
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

<p><label><strong><?php _e( 'Carousel Type:', 'woo-widget-product-slideshow' ); ?></strong></label>
	<label><input type="radio" name="<?php echo $this->get_field_name('carousel_type'); ?>" value="horizontal" checked="checked" /> <?php _e( 'HORIZONTAL', 'woo-widget-product-slideshow' ); ?></label> &nbsp;&nbsp;&nbsp;
	<label><input type="radio" name="<?php echo $this->get_field_name('carousel_type'); ?>" value="vertical" <?php checked( $carousel_type, 'vertical' ); ?> /> <?php _e( 'VERTICAL', 'woo-widget-product-slideshow' ); ?></label>
</p>

<p><label><?php _e('Carousel Number Visible:', 'woo-widget-product-slideshow' ); ?> <input name="<?php echo $this->get_field_name('carousel_visible'); ?>" type="text" value="<?php echo $carousel_visible; ?>" size="1" /> <?php _e('slides', 'woo-widget-product-slideshow' ); ?></label><br />
<span class="description"><?php _e('Number of slides to be displayed in the carousel.', 'woo-widget-product-slideshow' ); ?></span>
</p>
  
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

</fieldset>      
<?php
	}
}
?>