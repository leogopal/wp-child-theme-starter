<?php if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Sets up the theme and provides some helper functions, which are used
 * in the theme as custom template tags. Others are attached to action and
 * filter hooks in WordPress to change core functionality.
 *
 * When using a child theme (see http://codex.wordpress.org/Theme_Development and
 * http://codex.wordpress.org/Child_Themes), you can override certain functions
 * (those wrapped in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before the parent
 * theme's file, so the child theme functions would be used.
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are instead attached
 * to a filter or action hook.
 *
 * For more information on hooks, actions, and filters, @link http://codex.wordpress.org/Plugin_API
 * 
 * @package WordPress
 * @since 	1.0.0
 * @author 	Wobble
 */

/**
 *  Add actions and filter hook calls here.
 */
add_action( 'wp_enqueue_scripts', 'wobble_child_enqueues', 30 );


/**
 * Setup Wobble Child Themes's textdomain.
 *
 * Declare a textdomain for current child-theme.
 * Translations can be filed in the /languages/ directory.
 * 
 * @since  	1.0.0
 * @return 	void
 * @author 	Wobble
 */
function wobble_child_theme_setup() {
	load_child_theme_textdomain( 'wobble', apply_filters( 'child_theme_textdomain', get_stylesheet_directory() . '/languages', 'wobble' ) );
}
add_action( 'after_setup_theme', 'wobble_child_theme_setup' );

/**
 * Child-theme Welcome Dashabord
 */
if ( is_admin() ) {
	require get_stylesheet_directory() . '/dashboard/init.php';
}

// add theme support for the welcome dashboard scripts

add_theme_support( 'welcome-dashboard' );

/**
 * Child Theme Enqueues
 *
 * Enqueues Custom Styles and General JS files.
 *
 * @since  	1.0.0
 * @return 	void
 * @author 	Wobble
 */
function wobble_child_enqueues() {
	// Load Stylesheets
	wp_enqueue_style( 'wobble-parent-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'wobble-child-style', get_stylesheet_uri() );

	// Load JS - comment out if not needed
	wp_enqueue_script( 'wobble-general-script', get_stylesheet_directory_uri() . '/js/general.js', array( 'jquery' ) );
}