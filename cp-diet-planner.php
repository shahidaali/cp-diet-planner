<?php
/*
Plugin Name: ConnectPX Diet Planner
Plugin URI: http://connectpx.com/
Description: This plugin will provide backend to create cp_diet_planner and displays for posts, categroies, taxonomies and terms.
Version: 1.0.0
Author: ConnectPX
Author URI: http://connectpx.com/
Text Domain: cp_diet_planner
Domain Path: /lang
*/

if( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * CP_Diet_Planner
 *
 * Main Class
 *
 * @since	1.0.0
 *
 * @param	void
 * @return	void
 */	

if( ! class_exists('CP_Diet_Planner') ) :

class CP_Diet_Planner {
	/** @var instance, front instance. */
	var $front = null;

	/** @var instance, admin instance. */
	var $admin = null;

	/**
	 * __construct
	 *
	 * Class constructor
	 *
	 * @since	1.0.0
	 *
	 * @param	void
	 * @return	void
	 */	
	function __construct() {

	}

	/**
	 * init()
	 *
	 * Init ConnectPX Diet Planner
	 *
	 * @since	1.0.0
	 *
	 * @param	void
	 * @return	void
	 */	
	function init() {
		// Load constants
		$this->constants();

		// Load includes
		$this->includes();
		
		// Load admin
		$this->load_admin();

		// Load front
		$this->load_front();
	}

	/**
	 * load_admin
	 *
	 * Load plugin admin
	 *
	 * @since	1.0.0
	 *
	 * @param	void
	 * @return	void
	 */	
	function load_admin() {
		// Init admin
		if( is_admin() ) {
			$admin = new CP_Diet_Planner_Admin();
			$admin->init();
			$this->admin = $admin;
		}
	}

	/**
	 * load_front
	 *
	 * Load plugin front
	 *
	 * @since	1.0.0
	 *
	 * @param	void
	 * @return	void
	 */	
	function load_front() {
		// Init front
		$front = new CP_Diet_Planner_Front();
		$front->init();
		$this->front = $front;
	}

	/**
	 * constants
	 *
	 * define constants
	 *
	 * @since	1.0.0
	 *
	 * @param	void
	 * @return	void
	 */	
	function constants() {
		// Define constants.
		if(!defined('CP_DIET_PLANNER_VERSION')) {
			define( 'CP_DIET_PLANNER_VERSION', '1.0.0' );
		}
		if(!defined('CP_DIET_PLANNER_PATH')) {
			define( 'CP_DIET_PLANNER_PATH', plugin_dir_path( __FILE__ ) );
		}
		if(!defined('CP_DIET_PLANNER_URL')) {
			define( 'CP_DIET_PLANNER_URL', plugins_url( '/', __FILE__ ) );
		}
		if(!defined('CP_DIET_PLANNER_BASENAME')) {
			define( 'CP_DIET_PLANNER_BASENAME', plugin_basename( __FILE__ ) );
		}
		if(!defined('CP_DIET_PLANNER_POST_TYPE')) {
			define( 'CP_DIET_PLANNER_POST_TYPE', 'cp_diet_planner_post' );
		}		
	}

	/**
	 * includes
	 *
	 * include required files
	 *
	 * @since	1.0.0
	 *
	 * @param	void
	 * @return	void
	 */	
	function includes() {
		// Include utility functions.
		include_once( CP_DIET_PLANNER_PATH . 'includes/cp-diet-planner-functions.php');

		// Include utility class.
		include_once( CP_DIET_PLANNER_PATH . 'includes/cp-diet-planner-utility.php');

		// Include Redux Settings.
		include_once( CP_DIET_PLANNER_PATH . 'includes/redux/redux-config.php');

		// Include base class
		include_once( CP_DIET_PLANNER_PATH . 'cp-diet-planner-base.php');

		// Include view singleton class
		include_once( CP_DIET_PLANNER_PATH . 'includes/cp-diet-planner-plan.php');

		// Include admin class
		include_once( CP_DIET_PLANNER_PATH . 'admin/cp-diet-planner-admin.php');

		// Include front class
		include_once( CP_DIET_PLANNER_PATH . 'cp-diet-planner-front.php');
	}
}

/*
 * CP_Diet_Planner
 *
 * The main function responsible for returning the one true CP_Diet_Planner Instance to functions everywhere.
 * Use this function like you would a global variable, except without needing to declare the global.
 *
 * Example: <?php $CP_Diet_Planner = CP_Diet_Planner(); ?>
 *
 * @since	1.0.0
 *
 * @param	void
 * @return	CP_Diet_Planner
 */
function CP_Diet_Planner() {
	global $CP_Diet_Planner;
	
	// Instantiate only once.
	if( !isset($CP_Diet_Planner) ) {
		$CP_Diet_Planner = new CP_Diet_Planner();
		$CP_Diet_Planner->init();
	}

	$GLOBALS['CP_Diet_Planner'] = $CP_Diet_Planner;
	return $CP_Diet_Planner;
}

/*
 * Hook CP_Diet_Planner early onto the 'plugins_loaded' action.
 *
 * This gives all other plugins the chance to load before CP_Diet_Planner,
 * to get their actions, filters, and overrides setup without
 * CP_Diet_Planner being in the way.
 */
if ( defined( 'CP_DIET_PLANNER_LATE_LOAD' ) ) {
	add_action( 'plugins_loaded', 'CP_Diet_Planner', (int) CP_DIET_PLANNER_LATE_LOAD );

// "And now here's something we hope you'll really like!"
} else {
	CP_Diet_Planner();
}

endif; // class_exists check
