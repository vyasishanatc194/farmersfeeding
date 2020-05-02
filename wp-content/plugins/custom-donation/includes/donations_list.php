<?php
function donations_list() {
    global $wpdb;   
    $table_name = $wpdb->prefix . "donations";
    $rows = $wpdb->get_results("SELECT * from $table_name");  
    $table = new custom_donation_List_Table();
    $table->prepare_items();
    $message = '';
    if ('delete' === $table->current_action()) {
        $message = '<div class="updated below-h2" id="message"><p>' . sprintf(__('Item Deleted', 'custom-donation')) . '</p></div>';
    }
    ?>
    <div class="wrap">
        <div class="icon32 icon32-posts-post" id="icon-edit"><br></div>
            <h2><?php _e('All Donations', 'custom-donation')?> </h2>           
            <?php echo $message; ?>
            <form id="businesses-table" method="GET">
                <input type="hidden" name="page" value="<?php echo $_REQUEST['page'] ?>"/>
                <?php $table->search_box( 'search', 'search_id' ); ?>
                <?php $table->display() ?>
            </form>
        </div>
    </div>
    <?php
}
if (!class_exists('WP_List_Table')) {
    require_once(ABSPATH . 'wp-admin/includes/class-wp-list-table.php');
}
// custom_donation_List_Table()
class custom_donation_List_Table extends WP_List_Table
{
    /**
     * [REQUIRED] You must declare constructor and give some basic params
     */
    function __construct()
    {
        global $status, $page;

        parent::__construct(array(
            'singular' => 'donations',
            'plural' => 'donations',
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
        if($column_name == 'full_name') {
            $actions = array(
                'edit' => sprintf('<a href="?page=view_detail&id=%s">%s</a>', $item['id'], __('Detail', 'EDU_example')),
                'delete' => sprintf('<a href="?page=%s&action=delete&id=%s">%s</a>', $_REQUEST['page'], $item['id'], __('Delete', 'custom-donation')),
            );

            return sprintf('%s %s',
                $item['full_name'],
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
            'edit' => sprintf('<a href="?page=view_detail&id=%s">%s</a>', $item['id'], __('Detail', 'EDU_example')),
            'delete' => sprintf('<a href="?page=%s&action=delete&id=%s">%s</a>', $_REQUEST['page'], $item['id'], __('Delete', 'custom-donation')),
        );
        return sprintf('%s %s',
            $item['full_name'],
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
            'full_name' => __('Name', 'custom-donation'),
            'email_address' => __('Email', 'custom-donation'),
            'phone' => __('Phone', 'custom-donation'),
            'contact_email_phone' => __('Contact Email/Phone', 'custom-donation'),
            'stripe_transaction_id' => __('Stripe Transaction ID', 'custom-donation'),
            'created_at' => __('Created At', 'custom-donation'),
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
            'full_name' => array('full_name', true),  
            'email_address' => array('email_address', true), 
            'phone' => array('phone', true),      
            'contact_email_phone' => array('contact_email_phone', true),
            'created_at' => array('created_at', true)
        );
        return $sortable_columns;
    }
    /**
     * [OPTIONAL] Return array of bult actions if has any
     *
     * @return array
     */
    // function get_bulk_actions()
    // {
    //     $actions = array(
    //         'delete' => 'Delete'
    //     );
    //     return $actions;
    // }
    /**
     * [OPTIONAL] This method processes bulk actions
     * it can be outside of class
     * it can not use wp_redirect coz there is output already
     * in this example we are processing delete action
     * message about successful deletion will be shown on page in next part
     */
    function process_bulk_action()
    {
        global $wpdb;
        $table_name = $wpdb->prefix . 'donations'; // do not forget about tables prefix
        $today = date("Y-m-d H:i:s");
        if ('delete' === $this->current_action()) {
            $ids = isset($_REQUEST['id']) ? $_REQUEST['id'] : array();
            if (is_array($ids)) $ids = @implode(',', $ids);                
            if (!empty($ids)) {
                $wpdb->query("UPDATE $table_name SET deleted_at = '$today' WHERE id IN($ids)");
            }
        }
    }
    /**
     * [REQUIRED] This is the most important method
     *
     * It will get rows from database and prepare them to be showed in table
     */
    function prepare_items()
    {
        global $wpdb;
        $table_name = $wpdb->prefix . 'donations'; // do not forget about tables prefix

        $per_page = 10; // constant, how much records will be shown per page

        $columns = $this->get_columns();
        $hidden = array();
        $sortable = $this->get_sortable_columns();

        // here we configure table headers, defined in our methods
        $this->_column_headers = array($columns, $hidden, $sortable);

        // [OPTIONAL] process bulk action if any
        $this->process_bulk_action();

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
            $this->items = $wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name WHERE deleted_at IS NULL AND full_name like '%$search%' OR phone like '%$search%' ORDER BY $orderby $order LIMIT %d OFFSET %d", $per_page, $paged), ARRAY_A);
        } else {
            $this->items = $wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name WHERE deleted_at IS NULL ORDER BY $orderby $order LIMIT %d OFFSET %d", $per_page, $paged), ARRAY_A);
        }
        
        // [REQUIRED] configure pagination
        $this->set_pagination_args(array(
            'total_items' => $total_items, // total items defined above
            'per_page' => $per_page, // per page constant defined at top of method
            'total_pages' => ceil($total_items / $per_page) // calculate pages count
        ));
    }
}

//Donation details
function view_detail_page_handler()
{    
    global $wpdb;
    $table_name = $wpdb->prefix . 'donations'; // do not forget about tables prefix
    if (isset($_REQUEST['id'])) {
        $item = $wpdb->get_row($wpdb->prepare("SELECT * FROM $table_name WHERE id = %d", $_REQUEST['id']), ARRAY_A);
        if (!$item) {
            $notice = __('Item not found', 'EDU_example');
        } 
    }
    ?>
    <div class="wrap">
        <div class="icon32 icon32-posts-post" id="icon-edit"><br></div>
        <h2><?php _e('Details of record ', 'EDU_example')?> <?php echo '#'.$_REQUEST["id"]; ?>  </h2>  
        <a class="add-new-h2" href="<?php echo get_admin_url(get_current_blog_id(), 'admin.php?page=donations_list');?>"><?php _e('Back to list', 'EDU_example')?></a> 
        <div class="metabox-holder" id="poststuff">
            <div id="post-body">
                <div id="post-body-content">
                    <?php /* And here we call our custom meta box */ ?>
                    <h1>Donation Information</h1>
                    <p>	Full Name:  <?php if ($item['full_name'] == '') { echo '-'; } else { echo $item['full_name']; }  ?> </p> 
                    <p>	Email:  <?php if ($item['email_address'] == '') { echo '-'; } else { echo $item['email_address']; }  ?> </p> 
                    <p>	Phone:  <?php if ($item['phone'] == '') { echo '-'; } else { echo $item['phone']; }  ?> </p> 
                    <p>	Contact Email/Phone:  <?php if ($item['contact_email_phone'] == '') { echo '-'; } else { echo $item['contact_email_phone']; }  ?> </p>                   
                    <p>	Stripe Transaction Id:  <?php if ($item['stripe_transaction_id'] == '') { echo '-'; } else { echo $item['stripe_transaction_id']; }  ?> </p> 
                    <p>	Created At:  <?php if ($item['created_at'] == '') { echo '-'; } else { echo $item['created_at']; }  ?> </p>
                </div>
            </div>
        </div>
    </div>
    <?php
}