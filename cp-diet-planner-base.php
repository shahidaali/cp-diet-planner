<?php

if( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * CP_Diet_Planner_Base
 *
 * Base Class
 *
 * @since	1.0.0
 *
 * @param	void
 * @return	void
 */	
if( ! class_exists('CP_Diet_Planner_Base') ) :

class CP_Diet_Planner_Base {
	
	/** @var string The plugin version number. */
	var $version = '1.0.0';
	
	/** @var array The plugin settings array. */
	var $settings = array();
	
	/** @var array content types array */
	var $content_types = array();
	
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

		// Set settings
		$options = get_option('cp_diet_planner_settings') ? get_option('cp_diet_planner_settings') : [];
		$this->set_settings([
			'plugin_enabled' => 1,
			'show_in_excerpt' => 1,
		], $options );

		// CP_Diet_Planner Post Type
		$this->register_post_type();
		add_filter( 'map_meta_cap', array( $this, 'map_meta_cap' ) , 10, 4 );
	}

	/**
	 * register_post_type
	 *
	 * register wp cp_diet_planner post type to save cp_diet_planner
	 *
	 * @since	1.0.0
	 *
	 * @param	void
	 * @return	void
	 */	
	function register_post_type() {
		register_post_type( CP_DIET_PLANNER_POST_TYPE, array(
			'labels' => array(
				'name' => __( 'Diet Planner', 'cp_diet_planner' ),
				'singular_name' => __( 'Diet Planner Plan', 'cp_diet_planner' ),
			),
			'rewrite' => false,
			'query_var' => false,
			'public' => false,
			'capability_type' => 'page',
			'capabilities' => array(
				'edit_post' => 'cp_diet_planner_edit_plan',
				'read_post' => 'cp_diet_planner_read_plan',
				'delete_post' => 'cp_diet_planner_delete_plan',
				'edit_posts' => 'cp_diet_planner_edit_plans',
				'edit_others_posts' => 'cp_diet_planner_edit_plans',
				'publish_posts' => 'cp_diet_planner_edit_plans',
				'read_private_posts' => 'cp_diet_planner_edit_plans',
			),
		) );
	}

	/**
	 * map_meta_cap
	 *
	 * map post type meta caps
	 *
	 * @since	1.0.0
	 *
	 * @param	void
	 * @return	void
	 */	
	function map_meta_cap( $caps, $cap, $user_id, $args ) {
		$meta_caps = array(
			'cp_diet_planner_edit_plan' => 'publish_pages',
			'cp_diet_planner_edit_plans' => 'publish_pages',
			'cp_diet_planner_read_plan' => 'edit_posts',
			'cp_diet_planner_read_cp_diet_planner' => 'edit_posts',
			'cp_diet_planner_delete_plan' => 'publish_pages',
			'cp_diet_planner_delete_plans' => 'publish_pages',
			'cp_diet_planner_manage_settings' => 'manage_options',
			'cp_diet_planner_submit' => 'read',
		);

		$meta_caps = apply_filters( 'cp_diet_planner_map_meta_cap', $meta_caps );

		$caps = array_diff( $caps, array_keys( $meta_caps ) );

		if ( isset( $meta_caps[$cap] ) ) {
			$caps[] = $meta_caps[$cap];
		}

		return $caps;
	}

	/**
	 * set_settings
	 *
	 * Update plugin settings
	 *
	 * @since	1.0.0
	 *
	 * @param	$settings: default settings, $options: options to merge
	 * @return	void
	 */	
	function set_settings($settings, $options) {
		// Merge plugin settings and default settings
		$settings = array_merge($settings, $options);

		// Filter and set Settings
		$this->settings = apply_filters('cp_diet_planner_settings', $settings);
	}

	/**
	 * get_setting
	 *
	 * Get setting
	 *
	 * @since	1.0.0
	 *
	 * @param	$key: settings key, $default: default value
	 * @return	Setting value
	 */	
	function get_setting($key, $default = null) {
		return isset($this->settings[$key]) ? $this->settings[$key] : $default;
	}
	
	/**
	 * get_data
	 *
	 * Get value from array
	 *
	 * @since	1.0.0
	 *
	 * @param	$data: data array, $key: data key, $default: default value
	 * @return	data value
	 */	
	function get_data($data, $key, $default = null) {
		return isset($data[$key]) ? $data[$key] : $default;
	}
	
	/**
	 * is_checked
	 *
	 * Checked checkbox
	 *
	 * @since	1.0.0
	 *
	 * @param	$value: checked value, $compare: checkbox value to compare
	 * @return	checked attribute
	 */	
	function is_checked($value, $compare = 1) {
		return ($value == $compare) ? 'checked="checked"' : '';
	}

	/**
	 * select_options
	 *
	 * Array to select options
	 *
	 * @since	1.0.0
	 *
	 * @param	$rows: array values, $selected_option: selected option, $use_key: usey keys for values
	 * @return	checked attribute
	 */	
	function select_options($rows, $selected_option = null, $empty_lable = "", $use_key = true) {
	    if( !is_array($rows) ) return;

	    $options = "";

	    // Selected value to array for multiple values
	    if($selected_option && !is_array($selected_option)) {
	        $selected_option = array($selected_option);
	    }

	    // Empty label
	    if( $empty_lable != "" ) {
	        $options .= "<option value=\"\">{$empty_lable}</option>";
	    }

	    // Creaye options from array
	    foreach ($rows as $key => $value) {
	        $value_item = ($use_key) ? $key : $value;
	        $selected = (!empty($selected_option) && in_array($value_item, $selected_option)) ? 'selected="selected"' : "";

	        $options .= "<option value=\"{$value_item}\" {$selected}>{$value}</option>";
	    }
	    return $options;
	}	

	/**
	 * load_plan
	 *
	 * Load plan from post 
	 *
	 * @since	1.0.0
	 *
	 * @param	$post: post from cp-diet-planner-post-type
	 * @return	Plan instance
	 */	
	function load_plan( $post ) {
		$plan = new CP_Diet_Planner_Plan($post);
		return $plan;
	}
}

endif; // class_exists check
