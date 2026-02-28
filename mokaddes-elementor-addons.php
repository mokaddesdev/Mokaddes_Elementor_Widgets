<?php
/**
 * Plugin Name: Mokaddes Elementor Addons
 * Plugin URI: http://wordpress.org/plugins
 * Description: This plugin is based on Pro Elementor widget.
 * Version: 1.0.0
 * Requires at least: 6.0
 * Requires PHP: 7.4
 * Author: Mokaddes Ali
 * Author URI: http://mokaddesali.com/
 * License: GPLv3
 * License URI: https://www.gnu.org/licenses/gpl-3.0.html
 * Textdomain: mea
 * Domain Path: \languages
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

function mea_register_frontend_styles() {
	wp_register_style( 'service-css', plugins_url( 'assets/css/service.css', __FILE__ ) );
}
add_action( 'elementor/frontend/before_register_styles', 'mea_register_frontend_styles' );

function mea_enqueue_frontend_styles() {
	wp_enqueue_style( 'service-css' );
}
add_action( 'elementor/frontend/before_enqueue_styles', 'mea_enqueue_frontend_styles' );
function mea_register_frontend_scripts() {
	wp_register_script( 'image-slider-js', plugins_url( 'assets/js/image-slider.js', __FILE__ ) );
}
add_action( 'elementor/frontend/before_register_scripts', 'mea_register_frontend_scripts' );

function mea_enqueue_frontend_scripts() {
	wp_enqueue_script( 'image-slider-js' );
}
add_action( 'elementor/frontend/before_enqueue_scripts', 'mea_enqueue_frontend_scripts' );
function mea_register_new_widgets( $widgets_manager ) {

	require_once( __DIR__ . '/widgets/services.php' );
	require_once( __DIR__ . '/widgets/image-slider.php' );
	$widgets_manager->register( new \MEA_Image_Slider() );
	$widgets_manager->register( new \MEA_Service_Widget() );

}
add_action( 'elementor/widgets/register', 'mea_register_new_widgets' );