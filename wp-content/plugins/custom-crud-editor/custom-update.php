<?php
// Update record
function custom_record_update() {
	
	if(isset($_POST['update']))	{
	    global $wpdb;
    	$table_name = $wpdb->prefix . "custom_data"; //Table name
		$id = $_GET["id"]; //Updated id 
		$name = $_POST['name'];
		$data = $_POST['data_id'];
		$id_del = $_GET['id_del'];
		$wpdb->update(
                $table_name, //table
                array('name' => $name, 'data' => $data),
                array('id' => $id), 
                array('%s','%s'),
                array('%s')	
        );
        // If at frontend
        if(!is_admin()) { 
        	header('Location:/signup'); //redirect to list page
        	die();
        }
        //If at backend
        else {
        	//$message.="Custom Record updated";
        	die();
        }
	}
	//delete specific record
	/*if(isset($id_del)) {
		$wpdb->query($wpdb->prepare("DELETE FROM $table_name WHERE id = %s", $id_del));
		 if(!is_admin()) { 
        	die();
        }
        else {
        	die();
        }	
	}*/

}
// Update form with updatable record details  
function custom_record_update_form() {
	global $wpdb;
	$table_name = $wpdb->prefix . "custom_data";
	$id = $_GET["id"];
	// Fetch All Records
	$rows = $wpdb->get_results($wpdb->prepare("SELECT id,name,data from $table_name where id=%s", $id));
		foreach($rows as $row) {
			$name = $row->name;
			$data_id = $row->data;
		}
	?>	
	<div class="custom_div">
		<h1>Update Custom Record</h1>
		<!-- If delete specific record  -->
		<?php if ($_POST['delete']) { ?>
            <a href="<?php echo admin_url('admin.php?page=custom_records_list') ?>"><?php echo __('Back to Records list','custom-crud-editor'); ?></a>
        <!-- If update specific record -->    
        <?php } else if ($_POST['update']) { ?>
            <a href="<?php echo admin_url('admin.php?page=custom_records_list') ?>"><?php echo __('Back to Records list','custom-crud-editor'); ?></a>
        <?php } ?>
		<form id="update_form" name="frm" method="post" action="">
			<table>
				<tr>
					<th>ID<span class="error">*</span></th>
					<td><input id="id" type="text" name="id" value="<?php echo $id; ?>" required disabled></td>
				</tr>
				<tr>
					<th>Name<span class="error">*</span></th>
					<td><input type="text" name="name" value="<?php echo $name; ?>" required></td>
				</tr>
				<tr>
					<th>Data<span class="error">*</span></th>
					<td><?php wp_editor($data_id,"data_id"); ?></td>
				</tr>
			</table>
			<input type="submit" name="update" value="Update" class="update_button" onclick="custom_record_update(); ">
			<!-- <input type="submit" name="delete" value="Delete" onclick="return confirm('Are you sure you want to delete this record?');"> -->
		</form>
	</div>
	<?php
}
custom_record_update();