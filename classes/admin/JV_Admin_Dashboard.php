<?php
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class JV_Admin_Dashboard {
	public function __construct() {
		add_action( 'admin_menu', array($this, 'jv_menu') );
		add_action( 'admin_init', array($this, 'jv_register_settings' ) );
		add_action( 'update_option_jv_staging', array($this, 'jv_update_jobvite_options'), 10, 2 );
	}

	public function jv_menu() {
		add_menu_page( 
			'GLG Jobvite', 
			'GLG Jobvite', 
			'administrator', 
			'jv-settings', 
			array( $this, 'jv_settings' ), 
			'dashicons-hammer',
			5
		);
	}

	public function jv_settings() { 
		@include_once ( JV_PLUGIN_DIR . 'views/admin/template-admin-dashboard.php' );
	}

	public function jv_register_settings() {
		register_setting( 'jv-settings-group', 'jv_staging' );
		register_setting( 'jv-settings-group', 'jv_api_key' );
		register_setting( 'jv-settings-group', 'jv_api_secret' );
		register_setting( 'jv-settings-group', 'jv_api_endpoint' );
		register_setting( 'jv-settings-group', 'jv_stg_api_endpoint' );
	}

	public function jv_update_jobvite_options( $old_value, $new_value ) {
		delete_transient('_jv_jobs');
	    delete_transient('_career_jobs');
	}
}