<?php
/**
 * WC Product Slider Uninstall
 *
 * Uninstalling deletes options, tables, and pages.
 *
 */
if( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) 
	exit();

// Delete Google Font
delete_option('wc_product_slider_google_api_key' . '_enable');
delete_transient('wc_product_slider_google_api_key' . '_status');
delete_option('wc_product_slider' . '_google_font_list');

if ( get_option('wc_widget_product_slider_lite_clean_on_deletion') == 1) {
	delete_option('wc_product_slider_google_api_key');
    delete_option('wc_product_slider_toggle_box_open');
    delete_option('wc_product_slider' . '-custom-boxes');

    delete_metadata( 'user', 0, 'wc_product_slider' . '-' . 'plugin_framework_global_box' . '-' . 'opened', '', true );

delete_option( 'wc_product_slider_global_settings' );
delete_option( 'wc_product_slider_a3_widget_skin_global_settings' );
delete_option( 'wc_product_slider_a3_widget_skin_title_settings' );
delete_option( 'wc_product_slider_a3_widget_skin_dimensions_settings' );
delete_option( 'wc_product_slider_a3_widget_skin_category_tag_link_settings' );
delete_option( 'wc_product_slider_a3_widget_skin_control_settings' );
delete_option( 'wc_product_slider_a3_widget_skin_pager_settings' );
delete_option( 'wc_product_slider_a3_widget_skin_price_settings' );
delete_option( 'wc_product_slider_a3_widget_skin_product_link_settings' );

delete_option( 'wc_product_slider_a3_card_skin_global_settings' );
delete_option( 'wc_product_slider_a3_card_skin_card_layout_settings' );
delete_option( 'wc_product_slider_a3_card_skin_card_style_settings' );
delete_option( 'wc_product_slider_a3_card_skin_control_settings' );
delete_option( 'wc_product_slider_a3_card_skin_description_settings' );
delete_option( 'wc_product_slider_a3_card_skin_footer_cell_settings' );
delete_option( 'wc_product_slider_a3_card_skin_pager_settings' );
delete_option( 'wc_product_slider_a3_card_skin_price_settings' );
delete_option( 'wc_product_slider_a3_card_skin_title_settings' );

delete_option( 'wc_product_slider_a3_mobile_skin_card_container_settings' );
delete_option( 'wc_product_slider_a3_mobile_skin_category_tag_link_settings' );
delete_option( 'wc_product_slider_a3_mobile_skin_pager_settings' );
delete_option( 'wc_product_slider_a3_mobile_skin_price_settings' );
delete_option( 'wc_product_slider_a3_mobile_skin_title_settings' );

delete_option( 'wc_product_slider_a3_carousel_global_settings' );
delete_option( 'wc_product_slider_a3_carousel_container_settings' );
delete_option( 'wc_product_slider_a3_carousel_control_settings' );
delete_option( 'wc_product_slider_a3_carousel_pager_settings' );

delete_option( 'wc_product_slider_widget_skin_settings' );

delete_option( 'wc_widget_product_slider_lite_clean_on_deletion' );

}