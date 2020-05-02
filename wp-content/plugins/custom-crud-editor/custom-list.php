<?php

function custom_records_list() {

    class contact_step_form_List_Table extends WP_List_Table
    {
        /**
         * [REQUIRED] You must declare constructor and give some basic params
         */
        function __construct()
        {
            global $status, $page;

            parent::__construct(array(
                'singular' => 'contact_table',
                'plural' => 'contact_table',
            ));
        }

        /**
         * [REQUIRED] this is a default column renderer
         *
         * @param $item - row (key, value array)
         * @param $column_name - string (key)
         * @return HTML
         */
        function column_default($item, $column_name)
        {  
            if($column_name == 'email') {
                $actions = array(
                    'detail' => sprintf('<a href="?page=detail_form&id=%s">%s</a>', $item['id'], __('View Record', 'EDU_example')),
                    'delete' => sprintf('<a href="?page=%s&action=delete&id=%s">%s</a>', $_REQUEST['page'], $item['id'], __('Delete', 'EDU_example'))
                );

                return sprintf('%s %s',
                    $item['email'],
                    $this->row_actions($actions)
                );
            } else {
                return $item[$column_name];
            }
            //return $item[$column_name];       
        }

        /**
         * [OPTIONAL] this is example, how to render column with actions,
         * when you hover row "Edit | Delete" links showed
         *
         * @param $item - row (key, value array)
         * @return HTML
         */
        function column_name($item)
        {
            $actions = array(
                'detail' => sprintf('<a href="?page=detail_form&id=%s">%s</a>', $item['id'], __('Edit', 'EDU_example')),
                'delete' => sprintf('<a href="?page=%s&action=delete&id=%s">%s</a>', $_REQUEST['page'], $item['id'], __('Delete', 'EDU_example')),
            );
            return sprintf('%s %s',
                $item['email'],
                $this->row_actions($actions)
            );
        }

        /**
         * [REQUIRED] this is how checkbox column renders
         *
         * @param $item - row (key, value array)
         * @return HTML
         */
        function column_cb($item)
        {
            return sprintf(
                '<input type="checkbox" name="id[]" value="%s" />',
                $item['id']
            );
        }

        /**
         * [REQUIRED] This method return columns to display in table
         * you can skip columns that you do not want to show
         * like content, or description
         *
         * @return array
         */
        function get_columns()
        {
            $columns = array(
                //'cb' => '<input type="checkbox" />', //Render a checkbox instead of text
                'email' => __('Email', 'custom-crud-editor'),
                'your_name' => __('Name', 'EDU_example'),
                'phone' => __('Phone', 'custom-crud-editor'),
                'your_address' => __('Address', 'custom-crud-editor'),
                'created_date' => __('Created At', 'custom-crud-editor'),
                'payment_status' => __('Payment Status', 'custom-crud-editor'),
                
            );
            return $columns;
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
            $sortable_columns = array(
                'email' => array('email', true),
                'your_name' => array('your_name', false)
            );
            return $sortable_columns;
        }

        /**
         * [REQUIRED] This is the most important method
         *
         * It will get rows from database and prepare them to be showed in table
         */
        function prepare_items()
        {
            global $wpdb;
            $table_name = $wpdb->prefix . 'contact_table'; // do not forget about tables prefix

            $per_page = 10; // constant, how much records will be shown per page

            $columns = $this->get_columns();
            $hidden = array();
            $sortable = $this->get_sortable_columns();

            // here we configure table headers, defined in our methods
            $this->_column_headers = array($columns, $hidden, $sortable);

            // [OPTIONAL] process bulk action if any
            //$this->process_bulk_action();

            // will be used in pagination settings
            $total_items = $wpdb->get_var("SELECT COUNT(id) FROM $table_name");

            // prepare query params, as usual current page, order by and order direction
            $paged = isset($_REQUEST['paged']) ? max(0, intval($_REQUEST['paged'] - 1) * $per_page) : 0;
            $orderby = (isset($_REQUEST['orderby']) && in_array($_REQUEST['orderby'], array_keys($this->get_sortable_columns()))) ? $_REQUEST['orderby'] : 'id';
            $order = (isset($_REQUEST['order']) && in_array($_REQUEST['order'], array('asc', 'desc'))) ? $_REQUEST['order'] : 'desc';

            // [REQUIRED] define $items array
            // notice that last argument is ARRAY_A, so we will retrieve array
            
            if(isset($_GET['s']))
            {          
            $search=$_GET['s']; 
            $search = trim($search);         
            $this->items = $wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name WHERE your_name like '%$search%' OR phone like '%$search%' ORDER BY $orderby $order LIMIT %d OFFSET %d", $per_page, $paged), ARRAY_A);
            } 
            else{
                $this->items = $wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name ORDER BY $orderby $order LIMIT %d OFFSET %d", $per_page, $paged), ARRAY_A);
            }
            
            

            // [REQUIRED] configure pagination
            $this->set_pagination_args(array(
                'total_items' => $total_items, // total items defined above
                'per_page' => $per_page, // per page constant defined at top of method
                'total_pages' => ceil($total_items / $per_page) // calculate pages count
            ));
        }
    }
   
    ?>
    <!-- <br><br><a href="<?php echo admin_url('admin.php?page=custom_record_create'); ?>"><?php echo __('Add New','custom-crud-editor'); ?></a>  -->
    <?php
    global $wpdb;

    $table = new contact_step_form_List_Table();
    $table->prepare_items();

    $message = '';
    if ('delete' === $table->current_action()) {
        $message = '<div class="updated below-h2" id="message"><p>' . sprintf(__('Items deleted: %d', 'custom-crud-editor'), count($_REQUEST['id'])) . '</p></div>';
    }
    ?>  
    <div class="wrap">
    <div class="icon32 icon32-posts-post" id="icon-edit"><br></div>
    <h2><?php _e('All Records', 'custom-crud-editor')?> 
    </h2>
    <?php echo $message; ?>

    <form id="businesses-table" method="GET">
        <input type="hidden" name="page" value="<?php echo $_REQUEST['page'] ?>"/>
        <?php $table->search_box( 'search', 'search_id' ); ?>
        <?php $table->display() ?>
    </form>
</div>
<?php 
} 


/**
 * Form page handler checks is there some data posted and tries to save it
 * Also it renders basic wrapper in which we are callin meta box render
 */
function detail_form_page_handler()
{    
    global $wpdb;
    $table_name = $wpdb->prefix . 'contact_table'; // do not forget about tables prefix

    // this is default $item which will be used for new records
    $default = array(
        'id' => 0,
        'title' => ''
    );

    // if this is not post back we load item to edit or give new one to create
    $item = $default;
    if (isset($_REQUEST['id'])) {
        $item = $wpdb->get_row($wpdb->prepare("SELECT * FROM $table_name WHERE id = %d", $_REQUEST['id']), ARRAY_A);
        if (!$item) {
            $item = $default;
            $notice = __('Item not found', 'EDU_example');
        }
    }  

    // here we adding our custom meta box
    add_meta_box('education_form_meta_box', 'Education Details', 'EDU_example_education_form_meta_box_handler', 'person', 'normal', 'default');

    ?>
    <div class="wrap">
        <div class="icon32 icon32-posts-post" id="icon-edit"><br></div>
        <h2><?php _e('Details of record ', 'EDU_example')?> <?php echo '#'.$_REQUEST["id"]; ?>  </h2>  
        <a class="add-new-h2" href="<?php echo get_admin_url(get_current_blog_id(), 'admin.php?page=custom_records_list');?>"><?php _e('Back to list', 'PU_example')?></a> 
        

        <?php if (!empty($notice)): ?>
        <div id="notice" class="error"><p><?php echo $notice ?></p></div>
        <?php endif;?>
        <?php if (!empty($message)): ?>
        <div id="message" class="updated"><p><?php echo $message ?></p></div>
        <?php endif;?>

        <form id="form" method="POST">
            <input type="hidden" name="nonce" value="<?php echo wp_create_nonce(basename(__FILE__))?>"/>
            <?php /* NOTICE: here we storing id to determine will be item added or updated */ ?>
            <input type="hidden" name="id" value="<?php echo $item['id'] ?>"/>

            <div class="metabox-holder" id="poststuff">
                <div id="post-body">
                    <div id="post-body-content">
                        <?php /* And here we call our custom meta box */ ?>
                        <h1>Tell us more about you</h1>
                        <p>Your email address:  <?php if ($item['email'] == '') { echo '-'; } else { echo $item['email']; }  ?> </p>
                        <p>Your full name: <?php if ($item['your_name'] == '') { echo '-'; } else { echo $item['your_name']; }  ?></p>
                        <p>Phone number: <?php if ($item['phone'] == '') { echo '-'; } else { echo $item['phone']; }  ?> </p>
                        <p>Your preference to contact email or phone: <?php if ($item['email_phone'] == '') { echo '-'; } else { echo $item['email_phone']; }  ?></p>
                        <p>Your address:  <?php if ($item['your_address'] == '') { echo '-'; } else { echo $item['your_address']; }  ?> </p>
                        <p>Your relationship to the deceased person: <?php if ($item['relationship'] == '') { echo '-'; } else { echo $item['relationship']; }  ?> </p>
                        <p>Your Town:  <?php if ($item['your_town'] == '') { echo '-'; } else { echo $item['your_town']; }  ?> </p>
                        <p>Your Postcode:  <?php if ($item['your_postcode'] == '') { echo '-'; } else { echo $item['your_postcode']; }  ?> </p>

                        <h1>Tell us more about the person who has died</h1>
                        <p>Full legal name : <?php if ($item['legal_name'] == '') { echo '-'; } else { echo $item['legal_name']; }  ?></p>
                        <p>Sex:  <?php if ($item['sex'] == '') { echo '-'; } else { echo $item['sex']; }  ?></p>
                        <p>Date of birth: <?php if ($item['dob'] == '') { echo '-'; } else { echo $item['dob']; }  ?> </p>
                        <p>Date of death: <?php if ($item['date_of_death'] == '') { echo '-'; } else { echo $item['date_of_death']; }  ?></p>
                        <p>Normal residential address: <?php if ($item['residential_address'] == '') { echo '-'; } else { echo $item['residential_address']; }  ?> </p>

                        <h1>A little more information we need</h1>
                        <p>Where should we collect the person who has died from? : <?php if ($item['where_collect_person'] == '') { echo '-'; } else { echo $item['where_collect_person']; }  ?></p>
                        <p>GP Name and Surgery: <?php if ($item['gp_name'] == '') { echo '-'; } else { echo $item['gp_name']; }  ?> </p>
                        <p>GP’s contact details: <?php if ($item['gp_contact'] == '') { echo '-'; } else { echo $item['gp_contact']; }  ?></p>
            
                        <h1>After the cremation</h1>
                        <p>Would you like the ashes to be returned to you or scattered at the crematorium’s garden of remembrance? : 
                        <?php if ($item['ashes'] == '') { echo '-'; } else { echo $item['ashes']; }  ?>
                        </p>
                        <p>Full name:  <?php echo $item['full_name'];  ?></p>
                        <p>Address: <?php if ($item['address'] == '') { echo '-'; } else { echo $item['address']; }  ?></p>
                        <p>Road:  <?php if ($item['road'] == '') { echo '-'; } else { echo $item['road']; }  ?></p>
                        <p>City: <?php if ($item['city'] == '') { echo '-'; } else { echo $item['city']; }  ?></p>
                        <p>Postcode: <?php if ($item['postcode'] == '') { echo '-'; } else { echo $item['postcode']; }  ?></p>

                        <h1>Payment</h1>
                        <p>Payment Status: <?php if ($item['payment_status'] == '') { echo 'Pending'; } else { echo $item['payment_status']; }  ?></p>
                        <p>Created At: <?php if ($item['created_date'] == '') { echo '-'; } else { echo $item['created_date']; }  ?></p>
                        
                    </div>
                </div>
            </div>
        </form>
    </div>
<?php
}
// custom_records_list();
?>