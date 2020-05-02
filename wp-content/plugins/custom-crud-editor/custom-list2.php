<?php
// Records List
function custom_records_list() {
	//echo do_shortcode('[custom_contact id=1]');
	//echo do_shortcode('[custom_insert]');
	if(!is_admin()) {
	?>
	<br><br><a href="<?php echo admin_url('admin.php?page=custom_record_create'); ?>"><?php echo __('Add New','custom-crud-editor'); ?></a> 
	<?php
	global $wpdb;
    $table_name = $wpdb->prefix . "custom_data"; //Table name
    $rows = $wpdb->get_results("SELECT * from $table_name"); // Fetch All Table data
	?>	
	<div class="custom_div">
		<h1><?php echo __('Custom Records List','custom-crud-editor'); ?> </h1>
		<form name="frm" method="post" class="table-responsive">
			<table class="table table-striped table-bordered table-hover">
				<thead class="thead-dark">
					<tr>
						<th><?php echo __('ID','custom-crud-editor'); ?></th>
						<th><?php echo __('Name','custom-crud-editor'); ?></th>
						<th><?php echo __('Shortcode','custom-crud-editor'); ?></th>
						<th><?php echo __('Update','custom-crud-editor'); ?></th>
						<th><?php echo __('Delete','custom-crud-editor'); ?></th>
					</tr>
				</thead>
				<?php 
				foreach($rows as $row) {
				?>
				<tr>
					<td><?php echo $row->id; ?></td>
					<td><?php echo $row->name; ?></td>
					<?php
					    /*$content = $row->data;
					    $default_content=html_entity_decode($content);
					    $default_content=stripslashes($default_content);*/ 
					?>
					<!-- <td><?php //echo $row->data; ?><?php //wp_editor($row->data,"data_id"); ?></td> -->
					<td><?php echo __('[custom_contact id='.$row->id.']','custom-crud-editor'); ?></td>
					<!-- If in backend -->
					<?php if(is_admin()) { ?>
						<td><a href="<?php echo admin_url('admin.php?page=custom_record_update&id=' . $row->id); ?>">Update</a></td>
						<td><a href="<?php echo admin_url('admin.php?page=custom_record_update&id_del=' . $row->id); ?>" class="del_link" onclick="return confirm('Are you sure you want to delete this record?');">Delete</a></td>
					<!-- If in Frontend -->
					<?php } else { ?>
						<td><a href="<?php echo site_url('record-list?id=' . $row->id); ?>">Update</a></td>
						<td><a href="#" class="" onclick="JSconfirm(<?php echo $row->id; ?>)">Delete</a></td>
					<?php } ?>
				</tr>
			<?php } ?>
			</table>
		</form>
	</div>
	<?php
	} else {
		/**
		 *
		 * In this part you are going to define custom table list class,
		 * that will display your database records in nice looking table
		 *
		 * http://codex.wordpress.org/Class_Reference/WP_List_Table
		 * http://wordpress.org/extend/plugins/custom-list-table-example/
		 */
		if (!class_exists('WP_List_Table')) {
		    require_once(ABSPATH . 'wp-admin/includes/class-wp-list-table.php');
		}
		class Custom_Contact_List_Table extends WP_List_Table
		{
			/**
		     * [ ] You must declare constructor and give some basic params
		     */
		    function __construct()
		    {
		        global $status, $page;

		        parent::__construct(array(
		            'singular' => 'custom_contact',
		            'plural' => 'custom_contacts',
		        ));
		    }
		    /**
		     * [ ] This method return columns to display in table
		     * you can skip columns that you do not want to show
		     * like content, or description
		     *
		     * @return array
		     */
		    function get_columns()
		    {
		        return $columns= array(
				      'col_link_id'=>__('ID'),
				      'col_link_name'=>__('Name'),
				      'col_link_url'=>__('Url'),
				      'col_link_description'=>__('Description'),
				      'col_link_visible'=>__('Visible')
				   );
		    }
		    /**
		     * [OPTIONAL] This method return columns that may be used to sort table
		     * all strings in array - is column names
		     * notice that true on name column means that its default sort
		     *
		     * @return array
		     */
		    function get_sortable_columns()
		    {
		        return $sortable = array(
				      'col_link_id'=>'link_id',
				      'col_link_name'=>'link_name',
				      'col_link_visible'=>'link_visible'
				   );
		    }
		    /**
		     * [OPTIONAL] Return array of bult actions if has any
		     *
		     * @return array
		     */
		    function get_bulk_actions()
		    {
		        $actions = array(
		            'delete' => 'Delete'
		        );
		        return $actions;
		    }

		    /**
		     * [ ] This is the most important method
		     *
		     * It will get rows from database and prepare them to be showed in table
		     */
		    /**
		 * Prepare the table with different parameters, pagination, columns and table elements
		 */
			function prepare_items() {
			   global $wpdb, $_wp_column_headers;
			   $screen = get_current_screen();
			   $table_name = $wpdb->prefix . "custom_data";

			   /* -- Preparing your query -- */
			        $query = "SELECT * FROM $table_name";

			   /* -- Ordering parameters -- */
			       //Parameters that are going to be used to order the result
			       $orderby = !empty($_REQUEST["orderby"]) ? mysql_real_escape_string($_REQUEST["orderby"]) : 'ASC';
			       $order = !empty($_REQUEST["order"]) ? mysql_real_escape_string($_REQUEST["order"]) : '';
			       if(!empty($orderby) & !empty($order)){ $query.=' ORDER BY '.$orderby.' '.$order; }

			   /* -- Pagination parameters -- */
			        //Number of elements in your table?
			        $totalitems = $wpdb->query($query); //return the total number of affected rows
			        //How many to display per page?
			        $perpage = 5;
			        //Which page is this?
			        $paged = !empty($_REQUEST["paged"]) ? mysql_real_escape_string($_REQUEST["paged"]) : '';
			        //echo $paged;
			        //Page Number
			        if(empty($paged) || !is_numeric($paged) || $paged<=0 ){ $paged=1; } //How many pages do we have in total? $totalpages = ceil($totalitems/$perpage); //adjust the query to take pagination into account 
			        if(!empty($paged) && !empty($perpage)){ $offset=($paged-1)*$perpage; $query.=' LIMIT '.(int)$offset.','.(int)$perpage; } /* -- Register the pagination -- */ 
			        $this->set_pagination_args( array(
			         "total_items" => $totalitems,
			         "total_pages" => $totalpages,
			         "per_page" => $perpage,
			      ) );
			      //The pagination links are automatically built according to those parameters

			   /* -- Register the Columns -- */
			      $columns = $this->get_columns();
			      $_wp_column_headers[$screen->id]=$columns;

			   /* -- Fetch the items -- */
			      $this->items = $wpdb->get_results($query);
			}
			/**
			 * Display the rows of records in the table
			 * @return string, echo the markup of the rows
			 */
			function display_rows() {

			   //Get the records registered in the prepare_items method
			   $records = $this->items;

			   //Get the columns registered in the get_columns and get_sortable_columns methods
			   list( $columns, $hidden ) = $this->get_column_info();

			   //Loop for each record
			   if(!empty($records)){foreach($records as $rec){

			      //Open the line
			        echo '< tr id="record_'.$rec->link_id.'">';
			      foreach ( $columns as $column_name => $column_display_name ) {

			         //Style attributes for each col
			         $class = "class='$column_name column-$column_name'";
			         $style = "";
			         if ( in_array( $column_name, $hidden ) ) $style = ' style="display:none;"';
			         $attributes = $class . $style;

			         //edit link
			         $editlink  = '/wp-admin/link.php?action=edit&link_id='.(int)$rec->link_id;

			         //Display the cell
			         switch ( $column_name ) {
			            case "col_link_id":  echo '< td '.$attributes.'>'.stripslashes($rec->link_id).'< /td>';   break;
			            case "col_link_name": echo '< td '.$attributes.'>'.stripslashes($rec->link_name).'< /td>'; break;
			            case "col_link_url": echo '< td '.$attributes.'>'.stripslashes($rec->link_url).'< /td>'; break;
			            case "col_link_description": echo '< td '.$attributes.'>'.$rec->link_description.'< /td>'; break;
			            case "col_link_visible": echo '< td '.$attributes.'>'.$rec->link_visible.'< /td>'; break;
			         }
			      }

			      //Close the line
			      echo'< /tr>';
			   }}
			}
		}
		global $wpdb;
	    $table = new Custom_Contact_List_Table();
	    $table->prepare_items();
	    ?>
	    	<div class="wrap">
			    <div class="icon32 icon32-posts-post" id="icon-edit"><br></div>
			    <h2><?php _e('Custom Contacts', 'custom-crud-editor')?> 
			        <a class="add-new-h2" href="<?php echo get_admin_url(get_current_blog_id(), 'admin.php?page=email_form');?>"><?php _e('Add new', 'custom-crud-editor')?></a>
			    </h2>
			    <?php echo $message; ?>

			    <form id="businesses-table" method="GET">
			        <input type="hidden" name="page" value="<?php echo $_REQUEST['page'] ?>"/>
			        <?php $table->display() ?>
			    </form>
			</div>
	    <?php
		}
}
// custom_records_list();
?>

<link type="text/css" href="<?php echo WP_PLUGIN_URL; ?>/custom-crud/assets/toastr.min.css" rel="stylesheet" />
<link type="text/css" href="<?php echo WP_PLUGIN_URL; ?>/custom-crud/assets/sweetalert.css" rel="stylesheet" />
<script src="<?php echo WP_PLUGIN_URL; ?>/custom-crud/assets/jquery.min.js"></script>
<script src="<?php echo WP_PLUGIN_URL; ?>/custom-crud/assets/toastr.min.js"></script>
<script src="<?php echo WP_PLUGIN_URL; ?>/custom-crud/assets/sweetalert-dev.js"></script>
<script>
	// Toastr Script
	toastr.options = {
	  "closeButton": false,
	  "debug": false,
	  "newestOnTop": false,
	  "progressBar": true,
	  "positionClass": "toast-top-right",
	  "preventDuplicates": false,
	  "onclick": null,
	  "showDuration": "300",
	  "hideDuration": "1000",
	  "timeOut": "5000",
	  "extendedTimeOut": "1000",
	  "showEasing": "swing",
	  "hideEasing": "linear",
	  "showMethod": "fadeIn",
	  "hideMethod": "fadeOut"
	}
	jQuery(function () {
	    jQuery( "#insert_form" ).submit(function( event ) {
	        toastr.success('Custom Record Successfully inserted','Insert');
	      });
	    jQuery('.del_link').click(function () {
	        toastr.success('Custom Record Successfully Deleted','Delete');
	      });
	    jQuery( "#update_form" ).submit(function( event ) {
	        toastr.success('Custom Record Successfully Updated','Update');
	      });

	    jQuery( "#save_form" ).submit(function( event ) {
	    	toastr.success('Custom Record Successfully inserted','Insert');
	      });
	 });

	// Only Allow 0-9 Numbers
	$(document).ready(function() {
      $("#id").bind("keypress", function (e) {
          var keyCode = e.which ? e.which : e.keyCode               
          if (!(keyCode >= 48 && keyCode <= 57)) {
            return false;
          }
      });
    });

	// Sweet Confirmation alert  
	function JSconfirm(id){
		swal({   
			title: "Your record will be deleted permanently!",   
		    text: "Are you sure to proceed?",   
		    type: "warning",   
		    showCancelButton: true,   
		    confirmButtonColor: "#DD6B55",   
		    confirmButtonText: "Yes",   
	    	cancelButtonText: "No",  
		    closeOnConfirm: false,   
		    closeOnCancel: false }, 
	    	function(isConfirm){   
	        	if (isConfirm) 
	    		{   
	          		swal("Record Removed!", "Your record is removed permanently!", "success"); 
	          		window.location = "record-list?id_del="+id; 
	        	} 
	        	else {     
	            	swal("Hurray", "Record is not removed!", "error");   
	        	} 
	    	}
	   );
	}

	jQuery(function () {
		jQuery('#save_form').children('table').find('input').prop('required',true);

		jQuery(".insert_button").submit(function( event ) {
			jQuery("#insert_form").each(function(){
			    console.log(jQuery(this).find(':input')); //<-- Should return all input elements in that specific form.
			});
		});
	});

</script>
<?php