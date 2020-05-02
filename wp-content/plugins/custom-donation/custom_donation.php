<?php
/**
* Plugin Name: Custom Donation
* Plugin URI: http://customdonation.com/plugin
* Description: This is custom donation plugin.
* Version: 1.0.0
* Author: Citrusbug
* Author URI: Author's website
* License: GPL12
* Text Domain: custom-donation
*/

//define plugin root path
define('ROOTDIR', plugin_dir_path(__FILE__));

//menu items
add_action('admin_menu','custom_donation_menu');
function custom_donation_menu() {
	
	//this is the main item for the menu
	add_menu_page('Donations', //page title
	'Donations', //menu title
	'manage_options', //capabilities
	'donations_list', //menu slug
	'donations_list' //function
	);

	add_submenu_page(null, //parent slug
	'Detail Donation', //page title
	'Detail Donation', //menu title
	'manage_options', //capability
	'view_detail', //menu slug
	'view_detail_page_handler'); //function
}

//include files
require_once(ROOTDIR . 'includes/donations_list.php');  // View donation records file