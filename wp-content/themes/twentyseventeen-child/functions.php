<?php
function demo_enqueue_styles() {
    // enqueue parent styles
wp_enqueue_style('parent-theme', get_stylesheet_directory_uri() .'/style.css');
}
add_action('wp_enqueue_scripts', 'demo_enqueue_styles');


function mailtrap($phpmailer)
{
    $phpmailer->isSMTP();
    $phpmailer->Host = 'smtp.mailtrap.io';
    $phpmailer->SMTPAuth = true;
    $phpmailer->Port = 2525;
    $phpmailer->Username = '733499e81d52de';
    $phpmailer->Password = 'dff231956c074c';
}

//add_action('phpmailer_init', 'mailtrap');




/*============== NAV BAR FUNCTION ======================== */

add_action( 'after_setup_theme', 'wpt_setup' );
    if ( ! function_exists( 'wpt_setup' ) ):
        function wpt_setup() {
            register_nav_menu( 'primary', __( 'header-menu', 'wptuts' ) );
        } endif;

function wpt_register_js() {
    //wp_register_script('jquery.bootstrap.min', get_template_directory_uri() . '/assets/js/bootstrap.min.js', 'jquery');
    //wp_enqueue_script('jquery.bootstrap.min');
}
add_action( 'init', 'wpt_register_js' );
function wpt_register_css() {
    //wp_register_style( 'bootstrap.min', get_template_directory_uri() . '/assets/css/bootstrap.min.css' );
    //wp_enqueue_style( 'bootstrap.min' );
}
add_action( 'wp_enqueue_scripts', 'wpt_register_css' );

require_once get_stylesheet_directory() . '/class-wp-bootstrap-navwalker.php';

/**
 * Change the placeholder image
 */
function custom_placeholder_img_src($attr)
{
    extract(shortcode_atts(array(
        'alt' => '',
        'title' => '',
        'class' => 'img-fluid',
    ), $attr));
    $src = get_bloginfo('template_url') . "/assets/images/placeholder.png";
    echo $src;
    //echo '<img src="' . $src . '" alt="' . $alt . '" title="' . $title . '"  class="' . $class . '"/>';
}
add_shortcode('custom_placeholder_img_src', 'custom_placeholder_img_src');


// Theme Panel
function theme_settings_page()
{
    ?>
    <div class="wrap">
	    <h1>Theme Panel</h1>
	    <form method="post" class="themepanel" action="options.php" enctype="multipart/form-data">
	        <?php
            settings_fields("section");
                do_settings_sections("theme-options");
            submit_button();
            ?>
	    </form>
		</div>
		<style>
			.col-12-fields {
				width: 80%;
			}
		</style>
        <?php
}

function add_theme_menu_item()
{
    add_menu_page("Theme Panel", "Theme Panel", "manage_options", "theme-panel", "theme_settings_page", null, 99);
}

add_action("admin_menu", "add_theme_menu_item");

function display_facebook_element()
{
    ?>
    	<input type="text"  class="col-12-fields"name="facebook_url" id="facebook_url" Placeholder="Facebook Url" value="<?php echo get_option('facebook_url'); ?>" />
    <?php
}

function display_twitter_element()
{
    ?>
    	<input type="text"  class="col-12-fields"name="twitter_url" id="twitter_url" Placeholder="Twitter Url" value="<?php echo get_option('twitter_url'); ?>" />
    <?php
}

function display_email_element()
{
    ?>
    	<input type="email" class="col-12-fields" name="email" id="email" Placeholder="Email" value="<?php echo get_option('email'); ?>" />
    <?php
}
function display_phone_number_element()
{
    ?>
    	<input type="text" class="col-12-fields" name="phone_number" id="phone_number" Placeholder="Phone No" value="<?php echo get_option('phone_number'); ?>" />
    <?php
}

function display_copy_right_content_element()
{
    ?>
    	<input type="text"  class="col-12-fields"name="copy_right_content" id="copy_right_content" Placeholder="Copy Right content" value="<?php echo get_option('copy_right_content'); ?>" />
    <?php
}


function display_footer_content_1_element()
{
    ?>
    <textarea type="text"  class="col-12-fields"name="footer_content_1" id="footer_content_1" Placeholder="Footer content 1"><?php echo get_option('footer_content_1'); ?></textarea>
    <?php
}

function display_footer_content_2_element()
{
    ?>
    <textarea type="text" class="col-12-fields" name="footer_content_2" id="footer_content_2" Placeholder="Footer content 2"><?php echo get_option('footer_content_2'); ?></textarea>

    <?php
}

function display_secret_key_element() { ?>
    <input type="text"  class="col-12-fields"name="secret_key" id="secret_key" Placeholder="Secret Key" value="<?php echo get_option('secret_key'); ?>" />
<?php }

function display_publishable_key_element() { ?>
    <input type="text"  class="col-12-fields"name="publishable_key" id="publishable_key" Placeholder="Publishable Key" value="<?php echo get_option('publishable_key'); ?>" />
<?php }

function display_stripe_description_element() { ?>
    <input type="text"  class="col-12-fields"name="stripe_description" id="stripe_description" Placeholder="Stripe Description" value="<?php echo get_option('stripe_description'); ?>" />
<?php }

function display_stripe_currency_element() { ?>
    <input type="text"  class="col-12-fields"name="stripe_currency" id="stripe_currency" Placeholder="Stripe Currency" value="<?php echo get_option('stripe_currency'); ?>" />
<?php }

function display_send_mail_to_subject_element() { ?>
	<u>Mail To User</u><br/>
    <input type="text" maxlength="150" class="col-12-fields" name="send_mail_to_subject" id="send_mail_to_subject" Placeholder="Enter Subject" value="<?php echo get_option('send_mail_to_subject'); ?>" />
<?php }
function display_send_mail_to_body_element() { ?>
	<textarea class="col-12-fields" name="send_mail_to_body" id="send_mail_to_body" rows="12" Placeholder="Enter Body Message"><?php echo get_option('send_mail_to_body'); ?></textarea>
<?php }


function display_send_mail_to_admin_element() { ?>
	<u>Mail To Admin</u><br/>
    <input type="email"  class="col-12-fields" name="send_mail_to_admin" id="send_mail_to_admin" Placeholder="Enter Email Address" value="<?php echo get_option('send_mail_to_admin'); ?>" />
<?php }
function display_send_mail_to_admin_subject_element() { ?>
    <input type="text" maxlength="150" class="col-12-fields" name="send_mail_to_admin_subject" id="send_mail_to_admin_subject" Placeholder="Enter Subject" value="<?php echo get_option('send_mail_to_admin_subject'); ?>" />
<?php }
function display_send_mail_to_admin_body_element() { ?>
	<textarea class="col-12-fields" name="send_mail_to_admin_body" id="send_mail_to_admin_body" rows="12" Placeholder="Enter Body Message"><?php echo get_option('send_mail_to_admin_body'); ?></textarea>
<?php }


function display_theme_panel_fields()
{
    add_settings_section("section", "All Settings", null, "theme-options");
    add_settings_field("phone_number", "Phone No. ", "display_phone_number_element", "theme-options", "section");
    add_settings_field("email", "Email", "display_email_element", "theme-options", "section");
    add_settings_field("facebook_url", "Facebook Profile Url", "display_facebook_element", "theme-options", "section");
    add_settings_field("twitter_url", "Twitter Profile Url", "display_twitter_element", "theme-options", "section");
    add_settings_field("copy_right_content", "Copy Right content", "display_copy_right_content_element", "theme-options", "section");
    add_settings_field("footer_content_1", "Footer content 1", "display_footer_content_1_element", "theme-options", "section");
    add_settings_field("footer_content_2", "Footer content 2", "display_footer_content_2_element", "theme-options", "section");
    add_settings_field("secret_key", "Secret Key", "display_secret_key_element", "theme-options", "section");
	add_settings_field("publishable_key", "Publishable Key", "display_publishable_key_element", "theme-options", "section");
	add_settings_field("stripe_description", "Stripe Description", "display_stripe_description_element", "theme-options", "section");
	add_settings_field("stripe_currency", "Stripe Currency", "display_stripe_currency_element", "theme-options", "section");

	add_settings_field("send_mail_to_subject", "Subject", "display_send_mail_to_subject_element", "theme-options", "section");
	add_settings_field("send_mail_to_body", "Body", "display_send_mail_to_body_element", "theme-options", "section");
	add_settings_field("send_mail_to_admin", "To", "display_send_mail_to_admin_element", "theme-options", "section");
	add_settings_field("send_mail_to_admin_subject", "Subject", "display_send_mail_to_admin_subject_element", "theme-options", "section");
	add_settings_field("send_mail_to_admin_body", "Body", "display_send_mail_to_admin_body_element", "theme-options", "section");


    register_setting("section", "phone_number");
    register_setting("section", "email");
    register_setting("section", "facebook_url");
    register_setting("section", "twitter_url");
    register_setting("section", "copy_right_content");
    register_setting("section", "footer_content_1");
    register_setting("section", "footer_content_2");
    register_setting("section", "secret_key");
	register_setting("section", "publishable_key");
	register_setting("section", "stripe_description");
	register_setting("section", "stripe_currency");
	
	register_setting("section", "send_mail_to_subject");
	register_setting("section", "send_mail_to_body");
	register_setting("section", "send_mail_to_admin");
	register_setting("section", "send_mail_to_admin_subject");
	register_setting("section", "send_mail_to_admin_body");
}
add_action("admin_init", "display_theme_panel_fields");

function admin_style()
{
    wp_enqueue_style('admin-styles', get_bloginfo('template_url') . "/assets/css/admin.css");
}
add_action('admin_enqueue_scripts', 'admin_style');


function wpautop2( $pee, $br = true ) {

    $pee = str_replace('</div>', '</p>', $pee);
    $pee = str_replace('<div>', '<p>', $pee);

	return $pee;
}

// remove br tag
//remove_filter('the_content', 'wpautop');
add_filter('the_p_content', 'wpautop2');


// Mail send to Admin
add_action("send_mail_with_params", "liberty_send_mail");

function liberty_send_mail($arr) {
	if (!empty($arr)) {
		$email_to = $arr['to'];
		$email_subject = $arr['subject'];
		$email_body = $arr['body'];
		$headers[] = 'Content-Type: text/html; charset=UTF-8';
		wp_mail($email_to, $email_subject, $email_body, $headers);
	}
}

add_filter('wp_mail_from_name', 'new_mail_from_name');

function new_mail_from_name($old)  
{  
    $wpfrom = get_bloginfo( 'name' );
    return $wpfrom;
}


//ajax localise
add_action('wp_enqueue_scripts', 'pw_load_scripts');
function pw_load_scripts() {
  wp_enqueue_script('pw-script', get_stylesheet_directory_uri() . '/donation/js/donation.js','','',true);
  wp_localize_script('pw-script', 'pw_script_vars', array(
    'ajaxurl' => admin_url('admin-ajax.php'),
    'siteurl' => get_stylesheet_directory_uri(),
    'security' => wp_create_nonce('farmersfeeding'),
  ) );
}

// action to save data in db
add_action('wp_ajax_donate_now', 'donate_now');
add_action('wp_ajax_nopriv_donate_now', 'donate_now');
function donate_now() {
	check_ajax_referer('farmersfeeding', 'security');
	$insertdata = [];
	$result = [];
	// default response
	$result['success'] = false;
	$result['data'] = [
		'message' => 'Network error.',
	];
	if ($_POST['card_number'] !== '' || $_POST['cvv'] !== '' || $_POST['expiry_date'] !== '') {
		$result['success'] = false;
		$result['data'] = [
			'message' => 'Please enter calid card details.',
		];
	}
	$action = $_POST['action'];
	if ($action == 'donate_now') { // check for action name
		$insertdata['full_name'] = $_POST['your_name'];
		$insertdata['email_address'] = $_POST['email'];
		$insertdata['amount'] = ($_POST['donation_amt'] == 'other') ? $_POST['entered_amt'] : $_POST['donation_amt'];
		$insertdata['phone'] = $_POST['phone'];
		$insertdata['contact_email_phone'] = $_POST['email_phone'];
		$insertdata['deleted_at'] = null;
		$insertdata['selected_option'] = $_POST['soption'];

		//export month and year
		$ExpDate = explode("/", $_POST['expiry_date']);
		$month = $ExpDate[0];
		$year = $ExpDate[1];

		// Include Stripe PHP library
		require_once('stripe/Stripe.php');		

		$stripeDescription = get_option('stripe_description');
		$stripeCurrency = get_option('stripe_currency');
		// Set Publishable key
		Stripe::setApiKey(get_option('publishable_key'));

		// Stripe Create Token
		$token = Stripe_Token::create([
			'card' => [
			  'number' => $_POST['card_number'],
			  'exp_month' => $month,
			  'exp_year' => $year,
			  'cvc' => $_POST['cvv'],
			],
		]);

		// Set Secret key
		Stripe::setApiKey(get_option('secret_key'));
		
		$customer = Stripe_Customer::create(array(
			'name' 			=> $_POST['your_name'],
			'description' 	=> $stripeDescription,
			'email' 		=> $_POST['email'],
			'source'        => $token->id,
			'address' 		=> ['city' => $_POST['city'], 'country' => 'United States', 'line1' => $_POST['address'], 'line2' => '', 'postal_code' => $_POST['email'], 'state' => '']
		)); 

		// Unique order ID 
		$orderID = strtoupper(str_replace('.','',uniqid('', true)));

		try{
			$itemPrice = ($insertdata['amount']*100);

			// Charge a credit or a debit card 
			$charge = Stripe_Charge::create(array( 
				'customer' => $customer->id,
				'amount'   => $itemPrice,
				'currency' => $stripeCurrency,
				'description' => $stripeDescription,
				'metadata' => array(
					'order_id' => $orderID
				)
			));		
		} catch (\Exception $ex) {
			print_r($ex);
			$result['success'] = false;
			$result['data'] = [
				'message' => 'Something Error in transaction process.',
				'data'	=> ''
			];
			wp_send_json_error( $result );
		}
		// Retrieve charge details 
    	$chargeJson = $charge->jsonSerialize();
		
		// Check whether the charge is successful 
		if ($chargeJson['amount_refunded'] == 0 && empty($chargeJson['failure_code']) && $chargeJson['paid'] == 1 && $chargeJson['captured'] == 1) {
			// Order details 
			$transactionID = $chargeJson['balance_transaction'];
			$paidCurrency = $chargeJson['currency'];
			$paidAmount = $chargeJson['amount'];
			$insertdata['amount'] = $paidAmount/100;
			$insertdata['stripe_transaction_id'] = $chargeJson['order_id'];
			$insertdata['payment_status'] = $chargeJson['status'];
			// print_r($insertdata);
			// insert record in database
			global $wpdb;
			$action = $wpdb->insert('wp_donations', $insertdata);
			if($wpdb->last_query) {
				$result['success'] = true;
				$result['data'] = [
					'message' => 'Thank You For Donating.',
					'data' => $wpdb->insert_id
				];
				wp_send_json_success( $result );
			} else {
				$result['success'] = false;
				$result['data'] = [
					'message' => 'Something Error in insertion process.',
					'data'	=> ''
				];
				wp_send_json_error( $result );
			}
		}
	}
	$result = json_encode($result);
	echo $result;
	wp_die();
}