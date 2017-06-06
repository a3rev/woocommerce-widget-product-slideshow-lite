<?php
/* "Copyright 2012 A3 Revolution Web Design" This software is distributed under the terms of GNU GENERAL PUBLIC LICENSE Version 3, 29 June 2007 */
/**
 * WooCommerce Product Slider Hook Backbone
 *
 * Table Of Contents
 *
 * register_admin_screen()
 */
class WC_Product_Slider_Hook_Backbone
{
	public function __construct() {

		add_action( 'wp_enqueue_scripts', array( $this, 'add_underscore_scripts' ), 8 );
		add_action( 'wp_enqueue_scripts', array( $this, 'register_plugin_scripts' ) );
		add_action( 'wp_footer', array( $this, 'include_scripts_footer' ), 100 );
	}

	public function register_plugin_scripts() {
		wp_register_script( 'backbone.localStorage', WC_PRODUCT_SLIDER_JS_URL . '/backbone/backbone.localStorage.js', array( 'jquery', 'underscore', 'backbone' ) , '1.1.9', true );
		wp_register_script( 'wc-product-sliders-app', WC_PRODUCT_SLIDER_JS_URL . '/backbone/product_sliders_app.js', array( 'jquery', 'underscore', 'backbone' ), WC_PRODUCT_SLIDER_VERSION, true );
		wp_register_script( 'wc-product-slider-backbone', WC_PRODUCT_SLIDER_JS_URL . '/backbone/product_slider.backbone.js', array( 'jquery', 'underscore', 'backbone', 'backbone.localStorage', 'wc-product-sliders-app' ), WC_PRODUCT_SLIDER_VERSION, true );
	}

	public function enqueue_plugin_scripts() {
		wp_enqueue_script( 'wc-product-slider-backbone' );

		global $wc_product_slider_legacy_api;
		$legacy_api_url = $wc_product_slider_legacy_api->get_legacy_api_url();
		$current_lang = '';
		if ( class_exists( 'SitePress' ) ) {
			$current_lang = ICL_LANGUAGE_CODE;
		}

		global $wc_product_slider_global_settings;
		wp_localize_script( 'wc-product-slider-backbone',
			'wc_product_slider_vars',
			apply_filters( 'wc_product_slider_vars', array(
				'legacy_api_url' => $legacy_api_url,
				'enable_cache'   => $wc_product_slider_global_settings['wc_carousel_slider_allow_cache'],
				'cache_timeout'  => $wc_product_slider_global_settings['wc_carousel_slider_cache_timeout'],
				'slider_lang'    => $current_lang,
			) )
		);
	}

	public function add_underscore_scripts() {
		global $wc_product_slider_widget_skin_settings;

	?>
    <!-- Slider Template -->
    <script type="text/template" id="wc_product_slider_widget_item_tpl">
    	{{ var srcset = '', sizes = ''; }}
		{{ if ( typeof img_srcset !== 'undefined' ) { srcset = img_srcset; } }}
		{{ if ( typeof img_sizes !== 'undefined' ) { sizes = img_sizes; } }}

		{{ var item_title_html = ''; }}
		<?php if ( $wc_product_slider_widget_skin_settings['enable_slider_title'] == 1 ) { ?>
		{{ if ( item_title != '' ) { }}
			{{ item_title_html += '<div class="cycle-product-name"><a href="' + item_link + '">' + item_title + '</a></div>'; }}
		{{ } }}
		<?php } ?>
		{{ if ( product_price != '' ) { }}
			{{ item_title_html += '<div class="cycle-product-price">'+ product_price +'</div>'; }}
		{{ } }}
		<?php if ( $wc_product_slider_widget_skin_settings['enable_product_link'] == 1 ) { ?>
		{{ var cycle_desc = '<a class="cycle-product-linked" href="' + item_link + '"><?php echo trim( $wc_product_slider_widget_skin_settings['product_link_text'] ) ; ?></a>'; }}
		<?php } ?>
		<?php echo apply_filters( 'a3_lazy_load_images', str_replace( array("\r\n", "\r", "\n"), '', '<img class="cycle-wc-product-image"
			data-cycle-number="{{= index_product }}"
			srcset="{{- srcset }}"
			sizes="{{- sizes }}"
			src="{{= img_url }}"
			name="{{- item_title_html }}"
			title=""
			data-cycle-desc="{{ if ( item_link != "" ) { }} {{- cycle_desc }}{{ } }}"
            style="position:absolute; top:0; left:0; {{ if ( index_product > 1 ) { }} visibility:hidden; {{ } }} "
            {{ if ( typeof extra_attributes !== "undefined" && extra_attributes != "" ) { }} {{= extra_attributes }} {{ } }}
        />' ), false ); ?>

	</script>

    <script type="text/template" id="wc_product_slider_mobile_item_tpl">
    	{{ var srcset = '', sizes = ''; }}
		{{ if ( typeof img_srcset !== 'undefined' ) { srcset = img_srcset; } }}
		{{ if ( typeof img_sizes !== 'undefined' ) { sizes = img_sizes; } }}

		{{ var item_title_html = ''; }}
		{{ if ( item_title != '' ) { }}
			{{ item_title_html += '<div class="cycle-product-name"><a href="' + item_link + '">' + item_title + '</a></div>'; }}
		{{ } }}
		{{ if ( product_price != '' ) { }}
			{{ item_title_html += '<div class="cycle-product-price">'+ product_price +'</div>'; }}
		{{ } }}
		{{ var category_tag_link = ''; }}
		{{ if ( category_link != '' ) { }}
			{{ category_tag_link = '<div class="cycle-mobile-skin-category-linked-container"><a class="cycle-category-linked" href="' + category_link + '"><?php echo __( 'View all Products in this Category', 'woo-widget-product-slideshow' ); ?></a></div>'; }}
		{{ } }}
		{{ if ( tag_link != '' ) { }}
			{{ category_tag_link = '<div class="cycle-mobile-skin-tag-linked-container"><a class="cycle-tag-linked" href="' + tag_link + '"><?php echo __( 'View all Products in this Tag', 'woo-widget-product-slideshow' ); ?></a></div>'; }}
		{{ } }}
		{{ if ( is_used_mobile_skin == 'true' ) { }}
			<?php echo apply_filters( 'a3_lazy_load_images', str_replace( array("\r\n", "\r", "\n"), '', '<img class="cycle-wc-product-image"
				srcset="{{- srcset }}"
				sizes="{{- sizes }}"
				src="{{= img_url }}"
				title="{{- item_title_html }}"
				data-cycle-desc="{{- category_tag_link }}"
				style="position:absolute; top:0; left:0; {{ if ( index_product > 1 ) { }} visibility:hidden; {{ } }} "
			/>' ), false ); ?>

		{{ } else { }}
			<?php echo apply_filters( 'a3_lazy_load_images', str_replace( array("\r\n", "\r", "\n"), '', '<img class="cycle-wc-product-image"
				srcset="{{- srcset }}"
				sizes="{{- sizes }}"
				src="{{= img_url }}"
				title="{{- item_title_html }}"
				alt=""
				style="position:absolute; top:0; left:0; {{ if ( index_product > 1 ) { }} visibility:hidden; {{ } }} "
			/>' ), false ); ?>
		{{ } }}
	</script>

    <script type="text/template" id="wc_product_slider_card_item_tpl"><div></div>
	</script>

    <?php
	}

	public function include_scripts_footer() {
	?>
    	<script type="text/javascript">
		(function($) {
		$(function(){
			if( typeof(wc_product_sliders_app) !== 'undefined' ) {
				wc_product_sliders_app.start();
			}
		});
		})(jQuery);
		</script>
    <?php
	}
}

global $wc_product_slider_hook_backbone;
$wc_product_slider_hook_backbone = new WC_Product_Slider_Hook_Backbone();
?>