<?php

/*
 * Plugin Name: Easy Social Share Buttons for WordPress - Custom Display Method Boilerplate
 * Description: Example plugin that illustrates how to create custom display method that you can use with Easy Social Share Buttons for WordPress
 * Plugin URI: http://codecanyon.net/item/easy-social-share-buttons-for-wordpress/6394476?ref=appscreo
 * Version: 1.0
 * Author: CreoApps
 * Author URI: http://codecanyon.net/user/appscreo/portfolio?ref=appscreo
 */

define ( 'ESSB_CUSTOM_BOILERPLATE', dirname ( __FILE__ ) . '/' );
define ( 'ESSB_CUSTOM_BOILERPLATE_URL', plugins_url () . '/' . basename ( dirname ( __FILE__ ) ) );

add_action('init', 'essb_custom_methods_register', 99);

add_filter('essb4_button_positions', 'essb_display_mycustom_position');
add_filter('essb4_button_positions_mobile', 'essb_display_mycustom_position');
add_filter('essb4_custom_positions', 'essb_display_register_mycustom_position');
add_filter('essb4_custom_method_list', 'essb_register_mycustom_position');

function essb_register_mycustom_position($methods) {
	$methods['display-41'] = __('My custom position #1', 'essb');
	$methods['display-42'] = __('My custom position #2', 'essb');
	$methods['display-43'] = __('My custom position #3', 'essb');
	$methods['display-44'] = __('My custom position #4', 'essb');
	$methods['display-45'] = __('My custom position #5', 'essb');
	
	return $methods;
}

function essb_custom_methods_register() {
	
	if (is_admin()) {
		if (class_exists('ESSBOptionsStructureHelper')) {
			essb_prepare_location_advanced_customization('where', 'display-41', 'custompos1');
			essb_prepare_location_advanced_customization('where', 'display-42', 'custompos2');
			essb_prepare_location_advanced_customization('where', 'display-43', 'custompos3');
			essb_prepare_location_advanced_customization('where', 'display-44', 'custompos4');
			essb_prepare_location_advanced_customization('where', 'display-45', 'custompos5');
		}

	}
}

function essb_display_mycustom_position($positions) {
	
	$positions['custompos1'] = array ("image" => "assets/images/display-positions-09.png", "label" => __("My custom position #1", "essb") );
	$positions['custompos2'] = array ("image" => "assets/images/display-positions-09.png", "label" => __("My custom position #2", "essb") );
	$positions['custompos3'] = array ("image" => "assets/images/display-positions-09.png", "label" => __("My custom position #3", "essb") );
	$positions['custompos4'] = array ("image" => "assets/images/display-positions-09.png", "label" => __("My custom position #4", "essb") );
	$positions['custompos5'] = array ("image" => "assets/images/display-positions-09.png", "label" => __("My custom position #5", "essb") );
	
	return $positions;
}

function essb_display_register_mycustom_position($positions) {
	$positions['custompos1'] = __('Custom Position #1', 'essb');
	$positions['custompos2'] = __('Custom Position #2', 'essb');
	$positions['custompos3'] = __('Custom Position #3', 'essb');
	$positions['custompos4'] = __('Custom Position #4', 'essb');
	$positions['custompos5'] = __('Custom Position #5', 'essb');
}

if (!function_exists('essb_draw_custom_position')) {
	function essb_draw_custom_position($position) {
		if (function_exists('essb_core')) {
			$general_options = essb_core()->get_general_options();
			
			if (is_array($general_options)) {
				if (in_array($position, $general_options['button_position'])) {
					echo essb_core()->generate_share_buttons($position);
				}
			}
		}
	}
}
