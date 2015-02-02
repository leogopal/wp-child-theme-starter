<?php
/**
 * Welcome Dashboard Init
 *
 * @package     Welcome Dashboard
 * @copyright   Copyright (c) 2014
 * @license     GPL-2.0+
 * @link        http://wobble.co.za/
 * @since       0.0.1
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! defined( 'DASH_DIR' ) ) {
	define( 'DASH_DIR', dirname( __FILE__ ) );
}

if ( ! class_exists( 'Welcome_Dashboard' ) ) {
	require_once( trailingslashit( DASH_DIR ) . 'includes/class-welcome-dashboard.php' );
}

if ( ! class_exists( 'Dashboard_RSS_Widget' ) ) {
	require_once( trailingslashit( DASH_DIR ) . 'includes/class-dashboard-rss-widget.php' );
	new Dashboard_RSS_Widget;
}

if ( ! function_exists( 'welcome_dashboard' ) ) {
	/**
	 * Helper function for grabbing an instance of the welcome dashboard class.
	 *
	 * Usage Example:
	 *
	 * <?php add_theme_support( 'welcome-dashboard' ); ?>
	 *
	 * @version 0.0.1
	 * @access  public
	 * @return  object Welcome_Dashboard
	 */
	function welcome_dashboard() {
		if ( ! class_exists( 'Welcome_Dashboard' ) ) {
			return;
		}
		static $dashboard;
		if ( null === $dashboard ) {
			$dashboard = new Welcome_Dashboard();
		}
		return $dashboard;
	}
	add_action( 'init', array( welcome_dashboard(), 'run' ) );
}