<?php
   /*
   Plugin Name: Custom CRUD Editor
   Author: Citrusbug
   Text Domain: custom-crud-editor
   Description: This is my first custom crud plugin
   Version: 1.0
   License: GPL2
   */
   function __construct() {
   		add_action('init', array($this, 'custom_record_install'));
   		add_action('init', array($this, 'custom_records_modifymenu'));
   		add_action('init', array($this, 'myplugin_load_textdomain'));
   }
   //create 'custom' table 
   function custom_record_install() {

    global $wpdb;

    $table_name = $wpdb->prefix . "custom_data";
    $charset_collate = $wpdb->get_charset_collate();
    $sql = "CREATE TABLE $table_name (
            `id` varchar(3) CHARACTER SET utf8 NOT NULL,
            `name` varchar(50) CHARACTER SET utf8 NOT NULL,
            `data` text CHARACTER SET utf8 NOT NULL,
            PRIMARY KEY (`id`)
          ) $charset_collate; ";

    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    dbDelta($sql);
}

// run the install scripts upon plugin activation
register_activation_hook(__FILE__, 'custom_record_install');
//register_activation_hook(__FILE__, 'custom_record_editor');
register_activation_hook(__FILE__, 'custom_records_modifymenu');
//menu items
add_action('admin_menu','custom_records_modifymenu');



function custom_records_modifymenu() {
	
	//this is the main item for the menu
	add_menu_page(__('Customs Records','custom-crud-editor'), //page title
	__('Customs Records','custom-crud-editor'), //menu title
	'manage_options', //capabilities
	'custom_records_list', //menu slug
	'custom_records_list' //function
	);

	add_submenu_page('master_educations', __('Details', 'EDU_example'), __('Details', 'EDU_example'), 'activate_plugins', 'detail_form', 'detail_form_page_handler');

	// add_menu_page(__('Contact Step Form', 'custom_record_editor'), __('Contact Step Form', 'custom_record_editor'), 'manage_options', 'custom_records_list', 'contact_step_form_page_handler');
	
	//this is a submenu
// 	 add_submenu_page('custom_records_list', //parent slug
// 	 __('Add New Custom Record','custom-crud-editor'), //page title
// 	 __('Add New','custom-crud-editor'), //menu title
// 	 'manage_options', //capability
// 	 'custom_record_create', //menu slug
// 	 'custom_record_create_form'); //function
	
	//this submenu is HIDDEN, however, we need to add it anyways
	// add_submenu_page(null, //parent slug
	// __('Update Custom Record','custom-crud-editor'), //page title
	// __('Update','custom-crud-editor'), //menu title
	// 'manage_options', //capability
	// 'custom_record_update', //menu slug
	// 'custom_record_update_form'); //function

}
function myplugin_load_textdomain() {
	$path = dirname(plugin_basename( __FILE__ )) . '/languages/';
	load_plugin_textdomain( 'custom-crud-editor', false, $path );
}

//include all required php file of plugin
require_once(plugin_dir_path(__FILE__) . 'custom-list.php');
require_once(plugin_dir_path(__FILE__) . 'custom-create.php');
require_once(plugin_dir_path(__FILE__) . 'custom-update.php');
require_once(plugin_dir_path(__FILE__) . 'custom-delete.php');
require_once(plugin_dir_path(__FILE__) . 'custom-specific-data.php');
require_once(plugin_dir_path(__FILE__) . 'payment.php');

//create shortcode 
add_shortcode('custom_record', 'custom_records_list');
add_shortcode('custom_insert','custom_record_create_form');
add_shortcode('custom_update','custom_record_update_form');
add_shortcode('custom_contact','custom_specific_record');