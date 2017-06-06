<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// Widget Skin
$wc_product_slider_widget_skin_settings = get_option( 'wc_product_slider_widget_skin_settings', array() );

$wc_product_slider_a3_widget_skin_global_settings = get_option( 'wc_product_slider_a3_widget_skin_global_settings', array() );
$wc_product_slider_widget_skin_settings = array_merge( $wc_product_slider_a3_widget_skin_global_settings, $wc_product_slider_widget_skin_settings );

$wc_product_slider_a3_widget_skin_dimensions_settings = get_option( 'wc_product_slider_a3_widget_skin_dimensions_settings', array() );
$wc_product_slider_widget_skin_settings = array_merge( $wc_product_slider_a3_widget_skin_dimensions_settings, $wc_product_slider_widget_skin_settings );

$wc_product_slider_a3_widget_skin_control_settings = get_option( 'wc_product_slider_a3_widget_skin_control_settings', array() );
$wc_product_slider_widget_skin_settings = array_merge( $wc_product_slider_a3_widget_skin_control_settings, $wc_product_slider_widget_skin_settings );

$wc_product_slider_a3_widget_skin_pager_settings = get_option( 'wc_product_slider_a3_widget_skin_pager_settings', array() );
$wc_product_slider_a3_widget_skin_pager_settings['pager_background_colour'] = array( 'enable' => 1, 'color' => $wc_product_slider_a3_widget_skin_pager_settings['pager_background_colour'] );
$wc_product_slider_widget_skin_settings = array_merge( $wc_product_slider_a3_widget_skin_pager_settings, $wc_product_slider_widget_skin_settings );

$wc_product_slider_a3_widget_skin_title_settings = get_option( 'wc_product_slider_a3_widget_skin_title_settings', array() );
$wc_product_slider_widget_skin_settings = array_merge( $wc_product_slider_a3_widget_skin_title_settings, $wc_product_slider_widget_skin_settings );

$wc_product_slider_a3_widget_skin_price_settings = get_option( 'wc_product_slider_a3_widget_skin_price_settings', array() );
$wc_product_slider_widget_skin_settings = array_merge( $wc_product_slider_a3_widget_skin_price_settings, $wc_product_slider_widget_skin_settings );

$wc_product_slider_a3_widget_skin_product_link_settings = get_option( 'wc_product_slider_a3_widget_skin_product_link_settings', array() );
$wc_product_slider_a3_widget_skin_product_link_settings['product_link_background_colour'] = array( 'enable' => 1, 'color' => $wc_product_slider_a3_widget_skin_product_link_settings['product_link_background_colour'] );
$wc_product_slider_widget_skin_settings = array_merge( $wc_product_slider_a3_widget_skin_product_link_settings, $wc_product_slider_widget_skin_settings );

$wc_product_slider_a3_widget_skin_category_tag_link_settings = get_option( 'wc_product_slider_a3_widget_skin_category_tag_link_settings', array() );
$wc_product_slider_a3_widget_skin_category_tag_link_settings['category_link_background_colour'] = array( 'enable' => 1, 'color' => $wc_product_slider_a3_widget_skin_category_tag_link_settings['category_link_background_colour'] );
$wc_product_slider_a3_widget_skin_category_tag_link_settings['tag_link_background_colour'] = array( 'enable' => 1, 'color' => $wc_product_slider_a3_widget_skin_category_tag_link_settings['tag_link_background_colour'] );
$wc_product_slider_widget_skin_settings = array_merge( $wc_product_slider_a3_widget_skin_category_tag_link_settings, $wc_product_slider_widget_skin_settings );

update_option( 'wc_product_slider_widget_skin_settings', $wc_product_slider_widget_skin_settings );



// Set Settings Default from Admin Init
global $wc_product_slider_admin_init;
$wc_product_slider_admin_init->set_default_settings();

// Build sass
global $wc_product_slider_less;
$wc_product_slider_less->plugin_build_sass();