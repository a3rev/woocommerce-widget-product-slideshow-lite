<?php
/* "Copyright 2012 A3 Revolution Web Design" This software is distributed under the terms of GNU GENERAL PUBLIC LICENSE Version 3, 29 June 2007 */
/**
 * WooCommerce Product Slider Widget Hook Filter
 *
 * Hook anf Filter into woocommerce plugin
 *
 * Table Of Contents
 *
 *
 * frontend_scripts_register()
 * include_slider_widget_scripts()
 * include_slider_card_scripts()
 * include_slider_mobile_scripts()
 * add_google_fonts()
 * a3_wp_admin()
 * admin_sidebar_menu_css()
 * plugin_extra_links()
 */
class WC_Product_Slider_Hook_Filter
{

	public static function frontend_scripts_register() {
		global $wp_scripts;

		$_upload_dir = wp_upload_dir();

		$suffix = defined('SCRIPT_DEBUG') && SCRIPT_DEBUG ? '' : '.min';

		// If don't have any plugin or theme register font awesome style then register it from plugin framework
		if ( ! wp_style_is( 'font-awesome-styles', 'registered' ) ) {
			global $wc_product_slider_admin_interface;
			$wc_product_slider_admin_interface->register_fontawesome_style();
		}
		wp_register_style( 'wc-product-slider-styles', WC_PRODUCT_SLIDER_CSS_URL . '/wc-product-slider'.$suffix.'.css', array( 'font-awesome-styles' ), WC_PRODUCT_SLIDER_VERSION );

		$template_names = array( 'wc_product_slider_widget' );
        foreach ( $template_names as $template_name ) {
        	if ( file_exists( $_upload_dir['basedir'] . '/sass/'.$template_name.$suffix.'.css' ) ) {
        		global $wc_product_slider_less;
				wp_register_style( $template_name, str_replace(array('http:','https:'), '', $_upload_dir['baseurl'] ) . '/sass/'.$template_name.$suffix.'.css', array( 'wc-product-slider-styles' ), $wc_product_slider_less->get_css_file_version() );
        	}
        }

        wp_register_script( 'jquery-imagesloaded', WC_PRODUCT_SLIDER_JS_URL . '/imagesloaded.pkgd' . $suffix . '.js', array( 'jquery' ), '3.1.8' );

		wp_register_script( 'a3-cycle2-script', WC_PRODUCT_SLIDER_JS_URL . '/jquery.cycle2'. $suffix .'.js', array( 'jquery', 'jquery-imagesloaded' ), '2.1.2' );

		wp_register_script( 'a3-cycle2-center-script', WC_PRODUCT_SLIDER_EXTENSION_JS_URL . '/jquery.cycle2.center'. $suffix .'.js', array( 'jquery', 'a3-cycle2-script' ), '2.1.2' );
		wp_register_script( 'a3-cycle2-caption2-script', WC_PRODUCT_SLIDER_EXTENSION_JS_URL . '/jquery.cycle2.caption2'. $suffix .'.js', array( 'jquery', 'a3-cycle2-script' ), '2.1.2' );
		wp_register_script( 'a3-cycle2-swipe-script', WC_PRODUCT_SLIDER_EXTENSION_JS_URL . '/jquery.cycle2.swipe'. $suffix .'.js', array( 'jquery', 'a3-cycle2-script' ), '2.1.2' );

		wp_register_script( 'a3-cycle2-flip-script', WC_PRODUCT_SLIDER_EXTENSION_JS_URL . '/jquery.cycle2.flip'. $suffix .'.js', array( 'jquery', 'a3-cycle2-script' ), '2.1.2' );
		wp_register_script( 'a3-cycle2-scrollVert-script', WC_PRODUCT_SLIDER_EXTENSION_JS_URL . '/jquery.cycle2.scrollVert'. $suffix .'.js', array( 'jquery', 'a3-cycle2-script' ), '2.1.2' );
		wp_register_script( 'a3-cycle2-ie-fade-script', WC_PRODUCT_SLIDER_EXTENSION_JS_URL . '/jquery.cycle2.ie-fade'. $suffix .'.js', array( 'jquery', 'a3-cycle2-script' ), '2.1.2' );
		$wp_scripts->add_data( 'a3-cycle2-ie-fade-script', 'conditional', 'IE' );

		wp_register_script( 'wc-product-slider-script', WC_PRODUCT_SLIDER_JS_URL . '/wc-product-slider-script.js', array( 'jquery' ), WC_PRODUCT_SLIDER_VERSION );

	}

	public static function include_slider_widget_scripts( $script_settings = array() ) {
		global $wc_product_slider_hook_backbone;

		wp_enqueue_style( 'wc_product_slider_widget');

		wp_enqueue_script( 'a3-cycle2-center-script' );
		wp_enqueue_script( 'a3-cycle2-caption2-script' );

		if ( in_array( $script_settings['fx'], array( 'random', 'flipHorz', 'flipVert' ) ) ) {
			wp_enqueue_script( 'a3-cycle2-flip-script' );
		}
		if ( in_array( $script_settings['fx'], array( 'random', 'scrollHorz', 'scrollVert' ) ) ) {
			wp_enqueue_script( 'a3-cycle2-scrollVert-script' );
		}
		if ( in_array( $script_settings['fx'], array( 'random', 'fade', 'fadeout' ) ) ) {
			wp_enqueue_script( 'a3-cycle2-ie-fade-script' );
		}

		$wc_product_slider_hook_backbone->enqueue_plugin_scripts();

		wp_enqueue_script( 'wc-product-slider-script' );
	}

	public static function include_slider_mobile_scripts() {
		global $wc_product_slider_hook_backbone;


		wp_enqueue_script( 'a3-cycle2-center-script' );
		wp_enqueue_script( 'a3-cycle2-caption2-script' );
		wp_enqueue_script( 'a3-cycle2-swipe-script' );

		$wc_product_slider_hook_backbone->enqueue_plugin_scripts();

	}

	public static function add_google_fonts() {
		global $wc_product_slider_fonts_face;

		global $wc_product_slider_widget_skin_settings;

		$google_fonts = array( );

		extract( $wc_product_slider_widget_skin_settings );

		$google_fonts[] = $title_font['face'];
		$google_fonts[] = $price_font['face'];
		$google_fonts[] = $old_price_font['face'];
		$google_fonts[] = $product_link_font['face'];
		$google_fonts[] = $category_link_font['face'];
		$google_fonts[] = $tag_link_font['face'];

		if ( count( $google_fonts ) > 0 ) $wc_product_slider_fonts_face->generate_google_webfonts( $google_fonts );
	}

	public static function include_admin_script() {
		wp_enqueue_script( 'wc-product-slider-admin-script', WC_PRODUCT_SLIDER_JS_URL.'/wc-product-slider-admin-script.js', array( 'jquery' ), WC_PRODUCT_SLIDER_VERSION );
	}

	public static function a3_wp_admin() {
		wp_enqueue_style( 'a3rev-wp-admin-style', WC_PRODUCT_SLIDER_CSS_URL . '/a3_wp_admin.css' );
	}

	public static function admin_sidebar_menu_css() {
		wp_enqueue_style( 'a3rev-wc-product-slider-admin-sidebar-menu-style', WC_PRODUCT_SLIDER_CSS_URL . '/admin_sidebar_menu.css' );
	}

	public static function plugin_extra_links($links, $plugin_name) {
		if ( $plugin_name != WC_PRODUCT_SLIDER_NAME) {
			return $links;
		}

		global $wc_product_slider_admin_init;
		$links[] = '<a href="'.WC_PRODUCT_SLIDER_DOCS_URI.'" target="_blank">'.__('Documentation', 'woo-widget-product-slideshow' ).'</a>';
		$links[] = '<a href="'.$wc_product_slider_admin_init->support_url.'" target="_blank">'.__('Support', 'woo-widget-product-slideshow' ).'</a>';
		return $links;
	}

	public static function settings_plugin_links($actions) {
		$actions = array_merge( array( 'skins' => '<a href="admin.php?page=wc-product-slider&tab=widget-skin">' . __( 'Skins', 'woo-widget-product-slideshow' ) . '</a>' ), $actions );

		$actions = array_merge( array( 'settings' => '<a href="admin.php?page=wc-product-slider">' . __( 'Settings', 'woo-widget-product-slideshow' ) . '</a>' ), $actions );

		return $actions;
	}

	public static function plugin_extension_box( $boxes = array() ) {
		global $wc_product_slider_admin_init;

		$support_box = '<a href="'.$wc_product_slider_admin_init->support_url.'" target="_blank" alt="'.__('Go to Support Forum', 'wooquickview').'"><img src="'.WC_PRODUCT_SLIDER_IMAGES_URL.'/go-to-support-forum.png" /></a>';

		$boxes[] = array(
			'content' => $support_box,
			'css' => 'border: none; padding: 0; background: none;'
		);

		$review_box = '<div style="margin-bottom: 5px; font-size: 12px;"><strong>' . __('Is this plugin is just what you needed? If so', 'wooquickview') . '</strong></div>';
        $review_box .= '<a href="https://wordpress.org/support/view/plugin-reviews/woo-widget-product-slideshow#postform" target="_blank" alt="'.__('Submit Review for Plugin on WordPress', 'wooquickview').'"><img src="'.WC_PRODUCT_SLIDER_IMAGES_URL.'/a-5-star-rating-would-be-appreciated.png" /></a>';

        $boxes[] = array(
            'content' => $review_box,
            'css' => 'border: none; padding: 0; background: none;'
        );

        $product_slider_box = '<a href="'.$wc_product_slider_admin_init->pro_plugin_page_url.'" target="_blank"><img src="'.WC_PRODUCT_SLIDER_IMAGES_URL.'/woocommerce-product-slider.jpg" /></a>';
		$boxes[] = array(
			'content' => $product_slider_box,
			'css' => 'border: none; padding: 0; background: none;'
		);

		$carousel_box = '<a href="'.$wc_product_slider_admin_init->carousel_plugin_page_url.'" target="_blank"><img src="'.WC_PRODUCT_SLIDER_IMAGES_URL.'/woocommerce-carousel-slider.jpg" /></a>';
		$boxes[] = array(
			'content' => $carousel_box,
			'css' => 'border: none; padding: 0; background: none;'
		);


		$free_woocommerce_box = '<a href="https://profiles.wordpress.org/a3rev/#content-plugins" target="_blank" alt="'.__('Free WooCommerce Plugins', 'wooquickview').'"><img src="'.WC_PRODUCT_SLIDER_IMAGES_URL.'/free-woocommerce-plugins.png" /></a>';

		$boxes[] = array(
			'content' => $free_woocommerce_box,
			'css' => 'border: none; padding: 0; background: none;'
		);

		$free_wordpress_box = '<a href="https://profiles.wordpress.org/a3rev/#content-plugins" target="_blank" alt="'.__('Free WordPress Plugins', 'wooquickview').'"><img src="'.WC_PRODUCT_SLIDER_IMAGES_URL.'/free-wordpress-plugins.png" /></a>';

		$boxes[] = array(
			'content' => $free_wordpress_box,
			'css' => 'border: none; padding: 0; background: none;'
		);

		$connect_box = '<div style="margin-bottom: 5px;">' . __('Connect with us via','wooquickview') . '</div>';
		$connect_box .= '<a href="https://www.facebook.com/a3rev" target="_blank" alt="'.__('a3rev Facebook', 'wooquickview').'" style="margin-right: 5px;"><img src="'.WC_PRODUCT_SLIDER_IMAGES_URL.'/follow-facebook.png" /></a> ';
		$connect_box .= '<a href="https://twitter.com/a3rev" target="_blank" alt="'.__('a3rev Twitter', 'wooquickview').'"><img src="'.WC_PRODUCT_SLIDER_IMAGES_URL.'/follow-twitter.png" /></a>';

		$boxes[] = array(
			'content' => $connect_box,
			'css' => 'border-color: #3a5795;'
		);

		return $boxes;
	}
}
?>