<?php
if( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if( ! class_exists('CP_Diet_Planner_Admin') ) :

class CP_Diet_Planner_Admin extends CP_Diet_Planner_Base {

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
		parent::__construct();
	}

	/**
	 * init
	 *
	 * Class init
	 *
	 * @since	1.0.0
	 *
	 * @param	void
	 * @return	void
	 */	
	function init() {
		// Include Admin Utility Class
		include_once( CP_DIET_PLANNER_PATH . 'admin/cp-diet-planner-admin-utility.php');

		// Admin menu
		add_action( 'admin_menu', array( $this, 'admin_menu' )  );

		// Show post metaboxes only if plugin is enabled
		if( $this->get_setting( 'plugin_enabled', true ) ) {
			// Actions
			add_action( 'add_meta_boxes', array( $this, 'register_metaboxes' ) );
			add_action( 'save_post', array( $this, 'save_metaboxes' ) );
		}

		// Enqueue scripts
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_scripts' ) );

		// Setup Ajax action hook
		add_action( 'wp_ajax_cp_diet_planner_ajax', array( $this, 'ajax_load_urls' ) );
	}

	/**
	 * ajax_load_urls
	 *
	 * ajax_load_urls callback
	 *
	 * @since	1.0.0
	 *
	 * @param	void
	 * @return	void
	 */	
	function ajax_load_urls() {
		// Check ajax nonce for security
		check_ajax_referer( 'cp-diet-planner-ajax-nonce', 'security' );

		wp_send_json([
			'status' => 'success',
			'options' => []
		]);
		exit();
	}

	/**
	 * enqueue_scripts
	 *
	 * admin_enqueue_scripts callback
	 *
	 * @since	1.0.0
	 *
	 * @param	void
	 * @return	void
	 */	
	function enqueue_scripts() {
		// Vue JS APP & Components
		wp_enqueue_script( 'cp-diet-planner-admin-vuejs', CP_DIET_PLANNER_URL . 'admin/assets/js/vue.js', array(), CP_DIET_PLANNER_VERSION, true );
		wp_enqueue_script( 'cp-diet-planner-admin-vuejs-components', CP_DIET_PLANNER_URL . 'admin/assets/js/vue-components.js', array(), CP_DIET_PLANNER_VERSION, true );
		wp_enqueue_script( 'cp-diet-planner-admin-vuejs-app', CP_DIET_PLANNER_URL . 'admin/assets/js/vue-app.js', array(), CP_DIET_PLANNER_VERSION, true );
		
		// Admin Scripts
		wp_enqueue_style( 'cp-diet-planner-admin-style', CP_DIET_PLANNER_URL . 'admin/assets/css/admin.css', array(), CP_DIET_PLANNER_VERSION );
		wp_register_script( 'cp-diet-planner-admin-script', CP_DIET_PLANNER_URL . 'admin/assets/js/admin.js', array(), CP_DIET_PLANNER_VERSION, true );
		wp_localize_script( 'cp-diet-planner-admin-script', 'cp_diet_planner_settings', array( 'ajax_url' => admin_url('admin-ajax.php'), 'cp_diet_planner_ajax_nonce' => wp_create_nonce('cp-diet-planner-ajax-nonce')) );

		// Enqueue scripts
		wp_enqueue_script( 'cp-diet-planner-admin-script' );
	}
	
	/**
	 * admin_menu
	 *
	 * admin_menu callback
	 *
	 * @since	1.0.0
	 *
	 * @param	void
	 * @return	void
	 */	
	function admin_menu() {
		global $_wp_last_object_menu;
		$_wp_last_object_menu++;

		$slug = 'cp-diet-planner';

		// ConnectPX Diet Planner Admin Page
		add_menu_page( __( 'ConnectPX Diet Planner', $slug ),
			__( 'ConnectPX Diet Planner', 'cp-diet-planner' ),
			'cp_diet_planner_read_plan', 'cp-diet-planner',
			array( $this, 'admin_management_page' ), 'dashicons-admin-page',
			$_wp_last_object_menu );

		// ConnectPX Diet Planner Admin Edit Page
		$edit = add_submenu_page( $slug,
			__( 'Edit WP View', 'cp-diet-planner' ),
			__( 'ConnectPX Diet Planner', 'cp-diet-planner' ),
			'cp_diet_planner_read_plan', 'cp-diet-planner',
			array( $this, 'admin_management_page' ) );

		add_action( 'load-' . $edit, array( $this, 'cp_diet_planner_load_admin' ), 10, 0 );

		// ConnectPX Diet Planner Admin Add Page
		$addnew = add_submenu_page( $slug,
			__( 'Add New View', 'cp-diet-planner' ),
			__( 'Add New', 'cp-diet-planner' ),
			'cp_diet_planner_edit_plans', 'cp-diet-planner-new',
			array( $this, 'admin_add_new_page' ) );

		add_action( 'load-' . $addnew, array( $this, 'cp_diet_planner_load_admin' ), 10, 0 );

		// ConnectPX Diet Planner Settings Add Page
		$settings = add_submenu_page( $slug,
			__( 'Settings', 'cp-diet-planner' ),
			__( 'Setting', 'cp-diet-planner' ),
			'cp_diet_planner_manage_settings', 'cp-diet-planner-settings',
			array( $this, 'cp_diet_planner_admin_settings_page' ) );

		add_action( 'load-' . $settings, array( $this, 'cp_diet_planner_load_settings_page' ), 10, 0 );
	}

	function cp_diet_planner_load_admin() {
		global $plugin_page;

		$action = CP_Diet_Planner_Utility::current_action();

		do_action( 'cp_diet_planner_admin_load',
			isset( $_GET['page'] ) ? trim( $_GET['page'] ) : '',
			$action
		);

		if ( 'save' == $action ) {

		}

		if ( 'copy' == $action ) {

		}

		if ( 'delete' == $action ) {
			
		}

		$post = null;

		$current_screen = get_current_screen();

		// Include listing table
		if ( ! class_exists( 'CP_Diet_Planner_List_Table' ) ) {
			include_once( CP_DIET_PLANNER_PATH . 'admin/cp-diet-planner-list-table.php');
		}

		add_filter( 'manage_' . $current_screen->id . '_columns',
			array( 'CP_Diet_Planner_List_Table', 'define_columns' ), 10, 0 );

		add_screen_option( 'per_page', array(
			'default' => 20,
			'option' => 'cp_diet_planner_cp_diet_planner_per_page',
		) );
	}

	function admin_add_new_page() {
		$plan = $this->load_plan( null );
		$plan_id = -1;

		// Include Editor Files
		include_once( CP_DIET_PLANNER_PATH . 'admin/templates/cp-diet-planner-edit-form.php');
	}

	function admin_management_page() {
		$list_table = new CP_Diet_Planner_List_Table();
		$list_table->prepare_items();

		?>
		<div class="wrap" id="cp_diet_planner-list-table">

		<h1 class="wp-heading-inline"><?php
			echo esc_html( __( 'ConnectPX Diet Planner', 'cp-diet-planner' ) );
		?></h1>

		<?php
			if ( current_user_can( 'cp_diet_planner_edit_plans' ) ) {
				echo CP_Diet_Planner_Utility::get_link(
					menu_page_url( 'cp-diet-planner-new', false ),
					__( 'Add New', 'cp-diet-planner' ),
					array( 'class' => 'page-title-action' )
				);
			}

			if ( ! empty( $_REQUEST['s'] ) ) {
				echo sprintf( '<span class="subtitle">'
					/* translators: %s: search keywords */
					. __( 'Search results for &#8220;%s&#8221;', 'cp-diet-planner' )
					. '</span>', esc_html( $_REQUEST['s'] )
				);
			}
		?>

		<hr class="wp-header-end">

		<?php
			do_action( 'cp_diet_planner_admin_warnings',
				'cp_diet_planner', CP_Diet_Planner_Utility::current_action(), null );

			do_action( 'cp_diet_planner_admin_notices',
				'cp_diet_planner', CP_Diet_Planner_Utility::current_action(), null );
		?>

		<form method="get" action="">
			<input type="hidden" name="page" value="<?php echo esc_attr( $_REQUEST['page'] ); ?>" />
			<?php $list_table->search_box( __( 'Search ConnectPX Diet Planner', 'cp-diet-planner' ), 'cp_diet_planner-contact' ); ?>
			<?php $list_table->display(); ?>
		</form>

		</div>
		<?php
	}
		
	/**
	 * admin_menu
	 *
	 * admin_menu callback
	 *
	 * @since	1.0.0
	 *
	 * @param	void
	 * @return	void
	 */	
	function cp_diet_planner_admin_settings_page() {
		// Check for permission
		if ( ! current_user_can( 'cp_diet_planner_manage_settings' ) )  {
			wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
		}

		// Save submitted form
	    $messages = $this->settings_page_save();

		// Include admin settings page
	    include_once( CP_DIET_PLANNER_PATH . 'admin/templates/settings.php');
	}


	/**
	 * admin_menu_settings_page_save
	 *
	 * Save admin settings
	 *
	 * @since	1.0.0
	 *
	 * @param	void
	 * @return	void
	 */	
	function cp_diet_planner_load_settings_page() {
		// Check for permission
		if ( !current_user_can( 'cp_diet_planner_manage_settings' ) )  {
			wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
		}

		if ( ! isset( $_POST['cp_diet_planner_settings'] ) ) {
	        return;
	    }

	    $plugin_enabled = isset($_POST['plugin_enabled']) ? $_POST['plugin_enabled'] : 0;
	    $show_in_excerpt = isset($_POST['show_in_excerpt']) ? $_POST['show_in_excerpt'] : 0;

	    // Create option array to save
	    $options = [
	    	'plugin_enabled' => $plugin_enabled,
	    	'show_in_excerpt' => $show_in_excerpt
	    ];

	    // Update options
	    update_option( 'cp_diet_planner_settings',  $options );

	    // Update Settings
	    $this->set_settings( $this->settings, $options );

	    return [
	    	'status' => 'success',
	    	'message' => __( 'Settings saved' )
	    ];
	}

	/**
	 * admin_menu_settings_page_save
	 *
	 * Save admin settings
	 *
	 * @since	1.0.0
	 *
	 * @param	void
	 * @return	void
	 */	
	function settings_page_save() {
		// Check for permission
		if ( !current_user_can( 'cp_diet_planner_manage_settings' ) )  {
			wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
		}

		if ( ! isset( $_POST['cp_diet_planner_settings'] ) ) {
	        return;
	    }

	    $plugin_enabled = isset($_POST['plugin_enabled']) ? $_POST['plugin_enabled'] : 0;
	    $show_in_excerpt = isset($_POST['show_in_excerpt']) ? $_POST['show_in_excerpt'] : 0;

	    // Create option array to save
	    $options = [
	    	'plugin_enabled' => $plugin_enabled,
	    	'show_in_excerpt' => $show_in_excerpt
	    ];

	    // Update options
	    update_option( 'cp_diet_planner_settings',  $options );

	    // Update Settings
	    $this->set_settings( $this->settings, $options );

	    return [
	    	'status' => 'success',
	    	'message' => __( 'Settings saved' )
	    ];
	}

	/**
	 * register_metaboxes
	 *
	 * add_meta_boxes callback
	 *
	 * @since	1.0.0
	 *
	 * @param	void
	 * @return	void
	 */	
	function register_metaboxes() {
		add_meta_box(
	        'cp_diet_planner',
	        __( 'Seo Keyword Internal Link', 'cp_diet_planner' ),
	        array( $this, 'cp_diet_planner_meta_box_callback' )
	    );
	}
	
	/**
	 * cp_diet_planner_meta_box_callback
	 *
	 * add_meta_box callback
	 *
	 * @since	1.0.0
	 *
	 * @param	void
	 * @return	void
	 */	
	function cp_diet_planner_meta_box_callback( $post ) {
		// Add a nonce field so we can check for it later.
	    wp_nonce_field( 'cp_diet_planner_nonce', 'cp_diet_planner_nonce' );

	    // Get meta values
	    $keyword = get_post_meta( $post->ID, 'cp_diet_planner_keyword', true );
	    $url = get_post_meta( $post->ID, 'cp_diet_planner_url', true );

	    // Get all post types
		$post_types = get_post_types([
			'public'   => true,
  			'_builtin' => false
		], 'names', 'and');

		// builtin post types
		$post_types['post'] = 'post';
		$post_types['page'] = 'page';

		// build options
		$post_types_options = [];
		foreach ($post_types as $slug => $name) {
			$post_types_options[ 'post_type:' . $slug ] = $name;
		}

		// Get all taxonomies
		$taxonomies = get_taxonomies([
			'public'   => true,
  			'_builtin' => false
		], 'names', 'and');
		
		// builtin taxonomies
		$taxonomies['category'] = 'category';
		$taxonomies['post_tag'] = 'post_tag';

		// Exclude taxonomies
		$exclude_taxonomies = array( 'product_shipping_class' );

		// build options
		$taxonomies_options = [];
		foreach ($taxonomies as $slug => $name) {
			if( in_array( $slug, $exclude_taxonomies ) ) {
				continue;
			}

			$taxonomies_options[ 'taxonomy:' . $slug ] = $name;
		}

		// Object types
		$object_types = [
			'Post Types' => $post_types_options,
			'Taxonomies' => $taxonomies_options,
			'Custom Link' => [
				'custom_link' => 'Custom Link'
			],
		];

		// Filter object types
		$object_types = apply_filters('cp_diet_planner_object_types', $object_types);

		// get saved meta
		$saved_meta = get_post_meta( $post->ID, 'cp_diet_planner_meta', true );

	    // Include metaboxes fields
	    include_once( CP_DIET_PLANNER_PATH . 'admin/templates/meta-boxes.php');
	}
	
	/**
	 * save_metaboxes
	 *
	 * save_post callback
	 *
	 * @since	1.0.0
	 *
	 * @param	void
	 * @return	void
	 */	
	function save_metaboxes( $post_id ) {
		// Check if our nonce is set.
	    if ( ! isset( $_POST['cp_diet_planner_nonce'] ) ) {
	        return;
	    }

	    // Verify that the nonce is valid.
	    if ( ! wp_verify_nonce( $_POST['cp_diet_planner_nonce'], 'cp_diet_planner_nonce' ) ) {
	        return;
	    }

	    // If this is an autosave, our form has not been submitted, so we don't want to do anything.
	    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
	        return;
	    }

	    // Check the user's permissions.
	    if ( isset( $_POST['post_type'] ) && 'page' == $_POST['post_type'] ) {

	        if ( ! current_user_can( 'edit_page', $post_id ) ) {
	            return;
	        }

	    }
	    else {

	        if ( ! current_user_can( 'edit_post', $post_id ) ) {
	            return;
	        }
	    }

	    /* OK, it's safe for us to save the data now. */

	    // Make sure that it is set.
	    if ( ! isset( $_POST['cp_diet_planner_keyword'] ) ) {
	        return;
	    }

	    if ( ! isset( $_POST['cp_diet_planner_object_type'] ) ) {
	        return;
	    }

	    if ( ! isset( $_POST['cp_diet_planner_object_id'] ) ) {
	        return;
	    }

	    if ( ! isset( $_POST['cp_diet_planner_custom_url'] ) ) {
	        return;
	    }

	    // Sanitize user input.
	    $keyword = sanitize_text_field( $_POST['cp_diet_planner_keyword'] );
	    $object_type = sanitize_text_field( $_POST['cp_diet_planner_object_type'] );
	    $object_id = sanitize_text_field( $_POST['cp_diet_planner_object_id'] );
	    $custom_url = esc_url( $_POST['cp_diet_planner_custom_url'] );

	    $post_meta = [
	    	'keyword' => $keyword,
	    	'object_type' => $object_type,
	    	'object_id' => $object_id,
	    	'custom_url' => $custom_url,
	    ];

	    // Update the meta field in the database.
	    update_post_meta( $post_id, 'cp_diet_planner_meta', $post_meta );
	}
}

endif; // class_exists check
