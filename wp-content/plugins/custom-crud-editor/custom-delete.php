<?php
//Delete specific record
function custom_record_delete() {
	global $wpdb;
	$table_name = $wpdb->prefix . "custom_data";
	$id_del = $_GET["id_del"];
	 $wpdb->query($wpdb->prepare("DELETE FROM $table_name WHERE id = %s", $id_del));
	 if(!is_admin()) { 
    	header('Location:/signup');
    	die();
    }
    else {    	
    	header('Location:http://emberleaf.loc/wp-admin/admin.php?page=custom_records_list');
    	die();
    }
}