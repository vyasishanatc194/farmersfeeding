<?php
// Create new record
function custom_record_create() {
	if(isset($_POST['insert']))	{
		$id = $_POST['id'] || '';
		$name = $_POST['name'] || '';
		$data = $_POST['data_id'] || '';
		global $wpdb;
		$table_name = $wpdb->prefix . "custom_data";
		$date = date('Y-m-d');
		$wpdb->insert(
                $table_name, //table
                array('id' => $id, 'name' => $name, 'data' => $data), //data
            	array('%s', '%s', '%s') //data format			
    	);
    	if(!is_admin()) { 
        	header('Location:/signup');
        	die();
        }
        else {
        	//$message.="Custom Record updated";
        	header('Location:http://libertycremations.co.uk/wp-admin/admin.php?page=custom_records_list');
        	die();
        }
	}
}
//create new record form
function custom_record_create_form() {
	?>	
		<h1>Add New Custom Record</h1>
		<?php if($message != '') { ?>
			<div class="updated"><p><?php echo $message; ?></p></div>
		<?php } ?>

			<form id="insert_form" name="frm" method="post" action="" >
			<table>
				<tr>
					<th>ID<span class="error">*</span></th>
					<td><input id="id" type="text" name="id" value="<?php echo $id; ?>" required></td>
				</tr>
				<tr>
					<th for="name">Name<span class="error">*</span></th>
					<td><input type="text" name="name" value="<?php echo $name; ?>" required></td>
				</tr>
				<tr>
					<th for="name">Data<span class="error">*</span></th>
					<td><?php wp_editor("","data_id"); ?></td>   <!-- wp_editor for create form in table -->
				</tr>
			</table>
			<input type="submit" name="insert" value="Save" class="button insert_button" onclick="<?php custom_record_create(); ?>" >
		</form>
	</div>
	<?php
}
custom_record_create();