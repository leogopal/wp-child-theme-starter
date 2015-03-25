<?php
/**
 * Welcome Dashboard class.
 *
 * @package     Welcome Dashboard
 * @copyright   Copyright (c) 2014
 * @license     GPL-2.0+
 * @link        http://dayofcode.net/
 * @since       0.0.1
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) { exit; }

/**
 * Our Welcome_Dashboard class which creates a user-focused dashboard page.
 *
 * @package Welcome Dashboard
 * @version 0.0.1
 */
class Welcome_Dashboard {

	/**
	 * The current theme information.
	 *
	 * @var   theme
	 * @since 0.0.1
	 */
	public $theme = '';

	/**
	 * The lowercase name of the current theme.
	 *
	 * @var   theme_name
	 * @since 0.0.1
	 */
	public $theme_name = '';

	/**
	* Get things running!
	*
	* @since  0.0.1
	* @access public
	* @return void
	*/
	public function run() {
		if ( ! get_theme_support( 'welcome-dashboard' ) ) {
			return;
		}
		$this->theme      = wp_get_theme();
		$this->theme_name = get_template();
		$this->wp_hooks();
		$this->dashboard_hooks();
	}

	/**
	* Hook into WordPress.
	*
	* @since  0.0.1
	* @access public
	* @return void
	*/
	public function wp_hooks() {
		add_action( 'after_switch_theme',    array( $this, 'dashboard_setup'    )     );
		add_action( 'after_switch_theme',    array( $this, 'dashboard_redirect' ), 12 );
		add_action( 'switch_theme',          array( $this, 'dashboard_cleanup'  )     );
		add_action( 'admin_menu',            array( $this, 'dashboard_menu'     )     );
	}

	/**
	* Hook template parts into the Wobble Dashboard.
	*
	* @since  0.0.1
	* @access public
	* @return void
	*/
	public function dashboard_hooks() {
		add_action( 'welcome_dashboard_intro',              array( $this, 'dashboard_intro' ), 				5  );
		add_action( 'welcome_dashboard_getting_started',    array( $this, 'dashboard_getting_started' ), 	15  );
		add_action( 'welcome_dashboard_about',              array( $this, 'dashboard_about' ), 				99  );	
	}

	/**
	 * Set up the dashboard options.
	 *
	 * @since   0.0.1
	 * @access  public
	 * @return  void
	 */
	function dashboard_setup() {
		// Bail if activating from network.
		if ( is_network_admin() ) {
			return;
		}
		// Add the transient to redirect
		add_option( "welcome_dashboard_{$this->theme_name}_redirect", true );
	}

	/**
	 * Add options and fire a redirect when the theme is first activated.
	 *
	 * @since   0.0.1
	 * @access  public
	 * @return  void
	 */
	function dashboard_redirect() {
		// Bail if this isn't the first time our theme has been activated.
		if ( is_network_admin() || ! get_option( "welcome_dashboard_{$this->theme_name}_redirect" ) ) {
			return;
		}

		// Make sure this isn't run the next time the theme is activated.
		update_option( "welcome_dashboard_{$this->theme_name}_redirect", false );

		wp_safe_redirect( admin_url( "themes.php?page={$this->theme_name}-dashboard" ) );
		exit;
	}

	/**
	 * Remove any option that won't be reused by other Kolakube products.
	 *
	 * @since   0.0.1
	 * @access  public
	 * @return  void
	 */
	function dashboard_cleanup() {
		delete_option( "welcome_dashboard_{$this->theme_name}_redirect" );
	}

	/**
	 * Add the Wobble Dashboard to the main WordPress dashboard menu.
	 *
	 * @since   0.0.1
	 * @access  public
	 * @return  void
	 */
	function dashboard_menu() {
		add_theme_page(
			__( "{$this->theme}", "{$this->theme_name}-dashboard" ),
			__( "{$this->theme}", "{$this->theme_name}-dashboard" ),
			'manage_options',
			"{$this->theme_name}-dashboard",
			array( $this, 'dashboard_page' )
		);
	}

	/**
	 * Return a relative path to the wobble dashboard template directory.
	 *
	 * @since   0.0.1
	 * @access  public
	 * @return  string
	 */
	public function get_template_dir() {
		return trailingslashit( str_replace( get_stylesheet_directory(), '', DASH_DIR ) ) . 'templates/';
	}

	/**
	 * Return the correct URI to the wobble dashboard directory.
	 *
	 * @since   0.0.1
	 * @access  public
	 * @return  string
	 */
	public function get_dashboard_uri() {
		return str_replace( realpath( get_theme_root() ), get_theme_root_uri(), realpath( DASH_DIR ) );
	}

	/**
	 * Include the base template for our dashboard page.
	 *
	 * @since   0.0.1
	 * @access  public
	 * @return  void
	 */
	public function dashboard_page() {
		require_once( ABSPATH . 'wp-load.php' );
		require_once( ABSPATH . 'wp-admin/admin.php' );
		require_once( ABSPATH . 'wp-admin/admin-header.php' );
		get_template_part( $this->get_template_dir() . 'dashboard-page' );
	}

	/**
	 * Add introductory content to the top section of the dashboard.
	 *
	 * @since   0.0.1
	 * @access  public
	 * @return  void
	 */
	public function dashboard_intro() {
		$theme      = $this->theme;
		$screenshot = trailingslashit( get_stylesheet_directory_uri() ) . 'screenshot.png';
		require_once( locate_template( $this->get_template_dir() . 'intro.php' ) );
	}

	/**
	 * Welcome screen about section
	 * @since 1.0.0
	 */
	public function dashboard_about() {
		$theme      = $this->theme;
		$screenshot = trailingslashit( get_stylesheet_directory_uri() ) . 'screenshot.png';
		require_once( locate_template( $this->get_template_dir() . 'about.php' ) );
	}

	public function dashboard_getting_started() {
		$theme      = $this->theme;
		// get theme customizer url
		$customize_url 		= admin_url() . 'customize.php?';
		$customize_url  	.= '&return=' . urlencode( admin_url() . "themes.php?page={$this->theme_name}-dashboard" );
		require_once( locate_template( $this->get_template_dir() . 'getting-started.php' ) );
	}

}
$GLOBALS['Welcome_Dashboard'] = new Welcome_Dashboard();