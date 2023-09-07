<?php
/**
 * Server-side rendering of the `core/post-title` block.
 *
 * @package WordPress
 */

/**
 * Renders the `core/post-title` block on the server.
 *
 * @param array    $attributes Block attributes.
 * @param string   $content    Block default content.
 * @param WP_Block $block      Block instance.
 *
 * @return string Returns the filtered post title for the current post wrapped inside "h1" tags.
 */
function render_block_wc_product_slider( $attributes, $content, $block ) {
	$category_id = ! empty( $attributes['category_id'] ) ? $attributes['category_id'] : '';
	if ( empty( $category_id ) ) {
    	return '';
    }

    $output = \A3Rev\WCPSlider\Widget\Slider::items_cycle( '', $attributes );

    $wrapper_attributes = get_block_wrapper_attributes();

    return sprintf( '<div %1$s>%2$s</div>', $wrapper_attributes, $output );
}

/**
 * Registers the `core/post-title` block on the server.
 */
function register_block_wc_product_slider() {
	register_block_type(
		__DIR__ . '/block.json',
		array(
			'render_callback' => 'render_block_wc_product_slider',
		)
	);
}
add_action( 'init', 'register_block_wc_product_slider' );
