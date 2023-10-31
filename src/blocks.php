<?php
/**
 * Blocks Initializer
 *
 * Enqueue CSS/JS of all the blocks.
 *
 * @since   1.0.0
 * @package CGB
 */

namespace A3Rev\WCPSlider;

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Blocks {

	public function __construct() {
		add_action( 'init', array( $this, 'register_block' ) );

		// Hook: Editor assets.
		add_action( 'enqueue_block_assets', array( $this, 'cgb_editor_assets' ) );
	}

	public function create_a3blocks_section() {

		add_filter( 'block_categories_all', function( $categories ) {

			$category_slugs = wp_list_pluck( $categories, 'slug' );

			if ( in_array( 'a3rev-blocks', $category_slugs ) ) {
				return $categories;
			}

			return array_merge(
				array(
					array(
						'slug' => 'a3rev-blocks',
						'title' => __( 'a3rev Blocks' ),
						'icon' => '',
					),
				),
				$categories
			);
		}, 2 );
	}

	public function register_block() {
		$this->create_a3blocks_section();
	}

	/**
	 * Enqueue Gutenberg block assets for backend editor.
	 *
	 * @uses {wp-blocks} for block type registration & related functions.
	 * @uses {wp-element} for WP Element abstraction — structure of blocks.
	 * @uses {wp-i18n} to internationalize the block's text.
	 * @uses {wp-editor} for WP editor styles.
	 * @since 1.0.0
	 */
	function cgb_editor_assets() { // phpcs:ignore

		if ( ! is_admin() ) {
			return;
		}

		$js_deps = apply_filters( 'wc_pslider_block_js_deps', array( 'wp-block-editor', 'wp-blocks', 'wp-i18n', 'wp-element', 'wp-data', 'wp-compose', 'wp-components' ) );

		wp_register_script(
			'wc-pslider-block-editor', // Handle.
			plugins_url( '/dist/blocks.build.js', dirname( __FILE__ ) ),
			$js_deps,
			WC_PRODUCT_SLIDER_VERSION,
			array(
				'strategy'  => 'defer',
				'in_footer' => true,
			)
		);

		$all_cats = get_terms( array(
		    'taxonomy'   => 'product_cat',
		    'hide_empty' => true,
		) );

		$catList = array();
		if ( $all_cats && is_array( $all_cats ) && count( $all_cats ) > 0 ) {
			foreach ( $all_cats as $cat ) {
				$catList[] = array( 'label' => trim( esc_attr( $cat->name ) ), 'value' => $cat->term_id );
			}
		}

		$available_sizes = get_intermediate_image_sizes();
		$imageSizes = array();
		if ( $available_sizes && is_array( $available_sizes ) && count( $available_sizes ) > 0 ) {
	    	foreach ( $available_sizes as $size_name ) {
	    		$imageSizes[] = array( 'label' => trim( esc_attr( $size_name ) ), 'value' => $size_name );
	    	}
	    }

	    $transitions_list = Functions::slider_transitions_list();
		$widgetEffects = array();
		if ( $transitions_list && is_array( $transitions_list ) && count( $transitions_list ) > 0 ) {
	    	foreach ( $transitions_list as $effect_key => $effect_name ) {
	    		$widgetEffects[] = array( 'label' => trim( esc_attr( $effect_name ) ), 'value' => $effect_key );
	    	}
	    }

		wp_localize_script( 'wc-pslider-block-editor', 'pslider_block_editor', array(
			'catList'       => json_encode( $catList ),
			'imageSizes'    => json_encode( $imageSizes ),
			'widgetEffects' => json_encode( $widgetEffects ),
			'preview'       => WC_PRODUCT_SLIDER_URL.  '/src/assets/preview.jpg',
		) );

		// Styles.
		wp_register_style(
			'wc-pslider-block-editor', // Handle.
			plugins_url( 'dist/blocks.editor.build.css', dirname( __FILE__ ) ), // Block editor CSS.
			array( 'wp-edit-blocks' ),
			WC_PRODUCT_SLIDER_VERSION
		);
	}
}
