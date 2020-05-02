<?php 
function custom_specific_record($id) {
	if(!is_admin()) {
	// Fetch Shortcode id	
		extract(shortcode_atts(array(
	        'id' => 'id'
		), $id)); 
		
		global $wpdb;
		$table_name = $wpdb->prefix . "contact_table";

		//print_r($_POST);		
		if(isset($_GET['new_id'])) {
			$new_id = $_GET['new_id'];
            $datas = $wpdb->get_results('SELECT * from  '.$table_name.' WHERE id IN ('.$new_id.')');
            
            foreach($datas as $data){
	            //send mail to user informations
	            $userInfo = array();
	            $userInfo['to'] = $data->email;
	            $userInfo['subject'] = get_option('send_mail_to_subject');
	            $userInfo['body'] = str_replace('[name]', $data->your_name, get_option('send_mail_to_body'));
	            do_action('send_mail_with_params', $userInfo);

				$adminInfo = array();
	            $url = admin_url('admin.php?page=detail_form&id='.$data->id .'');
	            $adminInfo['to'] = get_option('send_mail_to_admin');
	            $adminInfo['subject'] = get_option('send_mail_to_admin_subject');
	            $adminInfo['body'] = str_replace('[url]', $url, get_option('send_mail_to_admin_body'));
	            // To send the mail open this commented code with params array
	            do_action('send_mail_with_params', $adminInfo);

	            // success message
				echo '
				<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
				<script>
				swal({
					type: "success",
					title: "Payment has gone through successfully",
					text: "you will shortly receive a confirmation email including what to do next.",   
					timer: 3000,
					showConfirmButton: false
				});
				if ( window.history.replaceState ) {
					window.history.replaceState( null, null, window.location.href );
				} 
				var uri = window.location.toString();
				if (uri.indexOf("?") > 0) {
				    var clean_uri = uri.substring(0, uri.indexOf("?"));
				    window.history.replaceState({}, document.title, clean_uri);
				}
				</script>';
	        }
		}

		
		if(isset($_POST['submit'])) {
			$table_name = $wpdb->prefix . "contact_table";  //Table name with its ID
			$createTableStatement = "CREATE TABLE $table_name (
				`id` int NOT NULL AUTO_INCREMENT,
				`email` varchar(255) CHARACTER SET utf8 NULL,
				`your_name` varchar(255) CHARACTER SET utf8 NULL,
				`phone` varchar(255) CHARACTER SET utf8 NULL,
				`email_phone` varchar(255) CHARACTER SET utf8 NULL,
				`your_address` varchar(255) CHARACTER SET utf8 NULL,
				`relationship` varchar(255) CHARACTER SET utf8 NULL,
				`your_town` varchar(255) CHARACTER SET utf8 NULL,
				`your_postcode` varchar(255) CHARACTER SET utf8 NULL,
				`legal_name` varchar(255) CHARACTER SET utf8 NULL,
				`sex` varchar(255) CHARACTER SET utf8 NULL,
				`dob` varchar(255) CHARACTER SET utf8 NULL,
				`date_of_death` varchar(255) CHARACTER SET utf8 NULL,
				`residential_address` varchar(255) CHARACTER SET utf8 NULL,
				`where_collect_person` varchar(255) CHARACTER SET utf8 NULL,
				`gp_name` varchar(255) CHARACTER SET utf8 NULL,
				`gp_contact` varchar(255) CHARACTER SET utf8 NULL,
				`ashes` varchar(255) CHARACTER SET utf8 NULL,
				`full_name` varchar(255) CHARACTER SET utf8 NULL,
				`address` varchar(255) CHARACTER SET utf8 NULL,
				`road` varchar(255) CHARACTER SET utf8 NULL,
				`city` varchar(255) CHARACTER SET utf8 NULL,
				`postcode` varchar(255) CHARACTER SET utf8 NULL,
				`created_date` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
				`order_code` varchar(255) CHARACTER SET utf8 NULL,
				`token` varchar(255) CHARACTER SET utf8 NULL,
				`amount` varchar(255) CHARACTER SET utf8 NULL,
				`payment_status` varchar(255) CHARACTER SET utf8 NULL,
				PRIMARY KEY (`id`)
			  ) $charset_collate; ";	
			 
			//echo $createTableStatement;
			require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
			dbDelta($createTableStatement);  //Create Table
			
		    // Insert data in  table
			$wpdb->insert($table_name, array(
				"email" => $_POST["email"],
				"your_name" => $_POST["your_name"],
				"phone" => $_POST["phone"],
				"email_phone" => $_POST["email_phone"],
				"your_address" => $_POST["your_address"],
				"relationship" => $_POST["relationship"],
				"your_town" => $_POST["your_town"],
				"your_postcode" => $_POST["your_postcode"],
				"legal_name" => $_POST["legal_name"],
				"sex" => $_POST["sex"],
				"dob" => $_POST["dob"],
				"date_of_death" => $_POST["date_of_death"],
				"residential_address" => $_POST["residential_address"],
				"where_collect_person" => $_POST["where_collect_person"] ,
				"gp_name" => $_POST["gp_name"],
				"gp_contact" => $_POST["gp_contact"],
				"ashes" => $_POST["ashes"],
				"full_name" => $_POST["full_name"] ,
				"address" => $_POST["address"],
				"road" => $_POST["road"],
				"city" => $_POST["city"],
				"postcode" => $_POST["postcode"] ,
			));

			$newid = $item['id'] = $wpdb->insert_id;
			$itemName = get_option('stripe_description'); 
			$itemPrice = get_option('stripe_amount'); 
			$currency = get_option('stripe_currency'); 

			// Open Card Detail model
			echo '
			 <div class="modal" id="myModal">
			 <div class="modal-dialog modal-dialog-centered">
			   <div class="modal-content">
			   	<div class="modal-header">
					<h4 class="modal-title">Enter Card Details</h4>
				</div>
				<div class="modal-body">		
					<!-- Display errors returned by createToken -->
					<div class="payment-status"></div>					
					<!-- Payment form -->
					<form action="" method="POST" id="paymentFrm">
					<input type="hidden" id="new_id" name="new_id" value="'.$newid.'" />
					<input type="hidden" id="address" name="address" value="'.$_POST["your_address"].'" />
					<input type="hidden" id="city" name="city" value="'.$_POST["city"].'" />
					<input type="hidden" id="postcode" name="postcode" value="'.$_POST["postcode"].'" />
					<input type="hidden" id="new_id" name="new_id" value="'.$newid.'" />
					<input type="hidden" id="stripe_description" name="stripe_description" value="'.$itemName.'" />
					<input type="hidden" id="stripe_amount" name="stripe_amount" value="'.$itemPrice.'" />
					<input type="hidden" id="stripe_currency" name="stripe_currency" value="'.$currency.'" />
						<div class="form-group">
							<label>NAME</label>
							<input type="text" class="form-control" name="name" id="name" placeholder="Enter name" required="" autofocus="">
						</div>
						<div class="form-group">
							<label>EMAIL</label>
							<input type="email" class="form-control" name="email" id="email" placeholder="Enter email" required="">
						</div>
						<div class="form-group">
							<label>CARD NUMBER</label>
							<input type="text" class="form-control" name="card_number" id="card_number" placeholder="1234 1234 1234 1234" maxlength="16" autocomplete="off" required="">
						</div>
						<div class="row">
							<div class="col-lg-6">
								<div class="form-group">
									<label>EXPIRY DATE</label>
									<div class="row	">
										<div class="col-lg-6">
											<input type="text" class="form-control" name="card_exp_month" id="card_exp_month" maxlength="2" placeholder="MM" required="">
										</div>	
										<div class="col-lg-6">
											<input type="text" class="form-control" name="card_exp_year" id="card_exp_year" maxlength="4" placeholder="YYYY" required="">
										</div>							
									</div>            
								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-group">
									<label>CVC CODE</label>
									<input type="text" class="form-control" name="card_cvc" id="card_cvc" placeholder="CVC" maxlength="3" autocomplete="off" required="">
								</div>
							</div>
						</div>
						<input class="token" type="hidden" name="stripeToken" value="" />
						<button type="submit" class="btn btn-success" id="payBtn">Pay Now  £'.$itemPrice.'</button>					
					</form>						
				</div>
			  </div>
			</div>
			</div>';

			//set token of stripe on cart detail and go to payment.php 
			echo '
			<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>'; 
			if(get_option('publishable_key') !== '' && get_option('secret_key') !== '' && get_option('stripe_description') !== '' && get_option('stripe_amount') !== '' && get_option('stripe_currency') !== '') 
			{
				echo '<script type="text/javascript">
				// Set your publishable key	
				Stripe.setPublishableKey("'.get_option('publishable_key').'");
				// Callback to handle the response from stripe  4242424242424242
				function stripeResponseHandler(status, response) { 
					if (response.error) {
						// Enable the submit button
						jQuery("#payBtn").removeAttr("disabled");
						// Display the errors on the form
						jQuery(".payment-status").html("<p>"+response.error.message+"</p>");
					} else {
						var form = jQuery("#paymentFrm");
						// Get token id
						var token = response.id;
						// Insert the token into the form
						jQuery("#paymentFrm .token").val(token);
						// Submit form to the server
						form.get(0).submit();
						
					}
				}

				jQuery(document).ready(function() {
					jQuery("#paymentFrm").submit(function() {
						// Disable the submit button to prevent repeated clicks
						jQuery("#payBtn").attr("disabled", "disabled");
						
						// Create single-use token to charge the user
						Stripe.createToken({
							number: jQuery("#card_number").val(),
							exp_month: jQuery("#card_exp_month").val(),
							exp_year: jQuery("#card_exp_year").val(),
							cvc: jQuery("#card_cvc").val()
						}, stripeResponseHandler);
						
						// Submit from callback
						return false;
					});
				});
				jQuery("#myModal").modal({show: true});
				</script>';
			}	
			else 
			{
				global $wpdb;
				$table_name = $wpdb->prefix . "contact_table"; 
				$q = 'UPDATE '.$table_name.' SET order_code = "", token = "", amount = "", payment_status = "Failed" WHERE id IN ('.$newid.')';
				$wpdb->query($q);
				echo '<script>
					swal({
						type: "error",
						title: "Information",
						text: "Key or Other Detail Not Found",   
						timer: 3000,
						showConfirmButton: false
					});
					if ( window.history.replaceState ) {
						window.history.replaceState( null, null, window.location.href );
					}
					</script>';
			}		
		}

	global $wpdb;
    $table_name = $wpdb->prefix . "custom_data";
    $rows = $wpdb->get_results($wpdb->prepare("SELECT id,name,data from $table_name where id=%s", $id));  //fetch all table records
    foreach($rows as $row) {
    	$id = $row->id;
    	$name = $row->name;
    	$data = $row->data;
    } ?>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&display=swap" rel="stylesheet">
	<link href="<?php echo get_stylesheet_directory_uri().'/assets'; ?>/css/bootstrap.min.css" media="all" rel="stylesheet" type="text/css" />
	<link href="<?php echo get_stylesheet_directory_uri().'/assets'; ?>/css/animate.min.css" media="all" rel="stylesheet" type="text/css" />
	<link href="<?php echo get_stylesheet_directory_uri().'/assets'; ?>/css/style.css" media="all" rel="stylesheet" type="text/css" />
	
	<link href="<?php echo get_stylesheet_directory_uri().'/assets'; ?>/css/custom.css" media="all" rel="stylesheet" type="text/css" />
	<script src="<?php echo get_stylesheet_directory_uri().'/assets'; ?>/js/modernizr.js"></script>

    <link type="text/css" href="<?php echo WP_PLUGIN_URL; ?>/custom-crud-editor/assets/toastr.min.css" rel="stylesheet" />
    <link type="text/css" href="<?php echo WP_PLUGIN_URL; ?>/custom-crud-editor/assets/sweetalert.css" rel="stylesheet" />
    <script src="<?php echo WP_PLUGIN_URL; ?>/custom-crud-editor/assets/jquery.min.js"></script>
    <script src="<?php echo WP_PLUGIN_URL; ?>/custom-crud-editor/assets/toastr.min.js"></script>
    <script src="<?php echo WP_PLUGIN_URL; ?>/custom-crud-editor/assets/sweetalert-dev.js"></script>
    <script src="<?php echo WP_PLUGIN_URL; ?>/custom-crud-editor/assets/select2.full.js"></script>
    <script src="<?php echo WP_PLUGIN_URL; ?>/custom-crud-editor/assets/datepicker-b4.min.js"></script>
    <link type="text/css" href="<?php echo WP_PLUGIN_URL; ?>/custom-crud-editor/assets/select2.min.css" rel="stylesheet" />
    <link type="text/css" href="<?php echo WP_PLUGIN_URL; ?>/custom-crud-editor/assets/datepicker-b4.min.css" media="all" rel="stylesheet" />
    <link type="text/css" href="<?php echo WP_PLUGIN_URL; ?>/custom-crud-editor/assets/feather.min.css" media="all" rel="stylesheet" />


    <div class="custom_div">
		<form id="save_form" name="frm" method="post" action="<?php $_SERVER['REQUEST_URI']; ?>">
			
			<?php echo $data ?>  <!-- Get wp-editor data -->
			
			<!-- <input type="submit"  value="Save" class="save_button" style="display:none;" onclick=<?php //custom_contact_create(); ?> > -->
		</form>
	</div>

	<script>
		jQuery('.step-forms-nav-tab ul li a').click(function() { $(this).parent().addClass('active'); });

		// JQuery for Ashes options
		jQuery('.radio1').on('change', function() {
			var selectedOption = jQuery(this).is(':checked');
			if (selectedOption) {
				jQuery(".notice_line").hide();
				jQuery(".address_hospital").show();
			}
		});
		jQuery('.radio2').on('change', function() {
			var selectedOption = jQuery(this).is(':checked');
			if (selectedOption) {
				jQuery(".address_hospital").hide();
				jQuery(".notice_line").show();
			}
		});

		
		jQuery(document).ready(function() {			
			jQuery(".notice_line, .address_hospital").hide();
            $.validator.addMethod("dateFormat",
		    function(value, element) {
		        return value.match(/^\d{1,2}\/\d{1,2}\/\d{4}$/);
		    },
			"Please enter a date in the format dd/mm/yyyy.");
			$.validator.addMethod("phone",
		    function(value, element) {
		        return value.match(/^[0-9\s]*$/);
		    },
			"Please enter a valid phone number.");
			// jQuery start date end date validation
			$.validator.addMethod("enddate", function(value, element) {
				var startdatevalue = $('#date-picker01').val();
				return Date.parse(startdatevalue) > Date.parse(value);
			}, "Date of death should be greater than date of birth");
			jQuery("#save_form").validate({
			   rules: {
			     email: { 
			     	required: true,
			     	email: true,
					maxlength: 200
			     },
			     your_name: { 
			     	required: true,
					maxlength: 200
			     },
			     phone: { 
			     	required: true,
					phone: true,
					minlength: 8,
					maxlength: 15
			     },
			     email_phone: { 
			     	required: true,
					maxlength: 200
			     },
			     your_address: { 
			     	required: true,
					maxlength: 200 
			     },
			     relationship: { 
			     	required: true,
					maxlength: 200
			     },
				 legal_name: {
					 required: true
				 },
				 dob: {
					 required: true,
                     dateFormat: true
				 },
				 date_of_death: {
					 required: true,
                     dateFormat: true
				 },
				 residential_address: {
					 required: true,
					 maxlength: 200
				 },
				 where_collect_person: {
					required: true,
					maxlength: 200
				 },
				 gp_name: {
					required: true,
					maxlength: 200
				 },
				 gp_contact: {
					required: true,
					maxlength: 200
				 },
				 ashes: {
					required: true
				 },
				 full_name: {
					required: true,
					maxlength: 200
				 },
				 address: {
					required: true,
					maxlength: 200
				 },
				 road: {
					required: true,
					maxlength: 200
				 },
				 city: {
					required: true,
					maxlength: 200
				 },
				 postcode: {
					minlength: 5,
					maxlength: 10
				 },
				 your_postcode: {
				 	required: true,
					minlength: 5,
					maxlength: 10
				 },
				 your_town: {
					required: true,
					maxlength: 40
				 },
			   },
			   messages: {
			     email: "Please enter a valid email address",
			     your_name: "Please enter your name",
			     phone: "Please enter phone number",
			     email_phone: "Please enter your preference to contact email or phone",
			     your_address: "Please enter youe address",
			     relationship: "Please enter your relationship to the deceased person",
				 legal_name: "Please enter legal name",
				 dob: "Please enter date of birth",
				 date_of_death: {
					 required: "Please enter date of death",
					 enddate: "Date of death should be greater than date of birth"
				 },
				 residential_address: "Please enter residential address",
				 where_collect_person: "Please enter where should we collect the person",
				 gp_name: "Please enter GP Name",
				 gp_contact: "Please enter GP Contact",
				 ashes: "Please select place",
				 full_name: "Please enter full name",
				 address: "Please enter address",
				 road: "Please enter road",
				 your_postcode: "Please enter postcode",
				 your_town: "Please enter town"
			   },			   
			   errorPlacement: function(error, element) {
				   	if (element.attr("name") == "ashes" ) {
		                error.appendTo(element.parent().parent().parent());
		            }
		            else {
		                error.appendTo(element.parent());
		            }				     
				}
			});

			jQuery(document).ready(function () {
				$('body').scrollTop($("#save_form").offset().top);
			});


			
			jQuery('.next_step_1').click(function() {
			 //jQuery("#save_form").valid();
			 if(jQuery('#save_form').valid()) {
			 	jQuery('#menu1').removeClass('active show');
				jQuery('.step_1').addClass('done'); 
				jQuery('.step_2').addClass('active'); 
			 	jQuery('#menu2').addClass('active show');
			 }
			});
			jQuery('.next_step_2').click(function() {
			 //jQuery("#save_form").valid();
			 if(jQuery('#save_form').valid()) {
			 	jQuery('#menu2').removeClass('active show');
				jQuery('.step_2').addClass('done');
				jQuery('.step_3').addClass('active');
			 	jQuery('#menu3').addClass('active show');
			 }
			});
			jQuery('.next_step_3').click(function() {
			 //jQuery("#save_form").valid();
			 if(jQuery('#save_form').valid()) {
			 	jQuery('#menu3').removeClass('active show');
				jQuery('.step_3').addClass('done');
				jQuery('.step_4').addClass('active'); 
			 	jQuery('#menu4').addClass('active show');
			 }
			});
			jQuery('.save_button').click(function() {
			 if(jQuery('#save_form').valid()) {
				jQuery('#save_form').delay(6000).submit();
			 }
			});

			jQuery('.back_1').click(function() {
			 	jQuery('#menu1').addClass('active show');
				jQuery('.step_2').removeClass('active'); 
				jQuery('.step_1').removeClass('done');
			 	jQuery('#menu2').removeClass('active show');
			 
			});

			jQuery('.back_2').click(function() {
			 	jQuery('#menu2').addClass('active show');
				jQuery('.step_3').removeClass('active'); 
				jQuery('.step_2').removeClass('done');
			 	jQuery('#menu3').removeClass('active show');
			 
			});

			jQuery('.back_3').click(function() {
			 	jQuery('#menu3').addClass('active show');
				jQuery('.step_4').removeClass('active'); 
				jQuery('.step_3').removeClass('done');
			 	jQuery('#menu4').removeClass('active show');
			 
			});

			jQuery('.step_2 a').click(function() {
				if(jQuery('#save_form').valid()) {
					return true;
				}
				else{
					jQuery('.step_2').removeClass('active');
					return false;
				}
			});

			jQuery('.step_3 a').click(function() {
				if(jQuery('#save_form').valid()) {
					return true;
				}
				else{
					jQuery('.step_3').removeClass('active');
					return false;
				}
			});
			jQuery('.step_4 a').click(function() {
				if(jQuery('#save_form').valid()) {
					return true;
				}
				else{
					jQuery('.step_4').removeClass('active');
					return false;
				}
			});

			
		});
		
		</script>

		<script>
		var dateToday = new Date(); 
		var yesterday = new Date((dateToday.setDate(dateToday.getDate()-1))).toString();
		var currentYear = (new Date).getFullYear();
  		var currentMonth = (new Date).getMonth();
  		var currentDay = (new Date).getDate();
		$('.step-forms-nav-tab ul li a').click(function() { $(this).parent().addClass('active'); });
		$('#date-picker01').datepicker({ format: "dd/mm/yyyy", showOtherMonths: true, maxDate: new Date(currentYear, currentMonth, currentDay) });
		$('#date-picker02').datepicker({ format: "dd/mm/yyyy", showOtherMonths: true, maxDate: new Date(currentYear, currentMonth, currentDay) });
		$(".js-select2").select2({ minimumResultsForSearch: -1 });
		</script>
	<?php


	}

}
?>