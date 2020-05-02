<?php 
// Include configuration file  
include_once($_SERVER['DOCUMENT_ROOT'].'/wp-config.php' ); 
include_once($_SERVER['DOCUMENT_ROOT'].'/wp-load.php' ); 
//print_r($_POST); die; 
$payment_id = $statusMsg = ''; 
$ordStatus = 'error'; 
 
// Check whether stripe token is not empty 
if(!empty($_POST['stripeToken'])){ 
    // Retrieve stripe token, card and user info from the submitted form data 
    $token  = $_POST['stripeToken']; 
    $name = $_POST['name']; 
    $email = $_POST['email']; 
    $card_number = $_POST['card_number']; 
    $card_exp_month = $_POST['card_exp_month']; 
    $card_exp_year = $_POST['card_exp_year']; 
    $card_cvc = $_POST['card_cvc']; 
    $itemName = $_POST['stripe_description']; 
    $itemPrice = $_POST['stripe_amount']; 
    $currency = $_POST['stripe_currency']; 
    // Include Stripe PHP library 
    require 'stripe/Stripe.php'; 
     
    // Set API key
    Stripe::setApiKey(get_option('secret_key'));  
    
    // Add customer to stripe 
    $customer = Stripe_Customer::create(array(
        'name' => $name, 
        'email' => $email, 
        'source'  => $token,
        'address' => ['city' => $_POST['city'], 'country' => 'United Kingdom', 'line1' => $_POST['address'], 'line2' => '', 'postal_code' => $_POST['postcode'], 'state' => '']
    )); 

    // Unique order ID 
    $orderID = strtoupper(str_replace('.','',uniqid('', true))); 

    // Convert price to cents 
    $itemPrice = ($itemPrice*100); 
     
    // Charge a credit or a debit card 
    $charge = Stripe_Charge::create(array( 
        'customer' => $customer->id, 
        'amount'   => $itemPrice, 
        'currency' => $currency, 
        'description' => $itemName, 
        'metadata' => array( 
            'order_id' => $orderID 
        ) 
    ));    

    // Retrieve charge details 
    $chargeJson = $charge->jsonSerialize(); 

    // Check whether the charge is successful 
    if($chargeJson['amount_refunded'] == 0 && empty($chargeJson['failure_code']) && $chargeJson['paid'] == 1 && $chargeJson['captured'] == 1){ 
        // Order details 
        $transactionID = $chargeJson['balance_transaction']; 
        $order_id = $chargeJson['order_id'];
        $paidAmount = $chargeJson['amount']; 
        $paidAmount = $paidAmount/100;
        $paidCurrency = $chargeJson['currency']; 
        $payment_status = $chargeJson['status']; 

        // If the order is successful 
        if($payment_status == 'succeeded'){ 
            global $wpdb;
            $table_name = $wpdb->prefix . "contact_table";
            $new_id = $_POST['new_id']; 
            $q = 'UPDATE '.$table_name.' SET order_code = "'.$orderID.'", token = "'.$token.'", amount = "'.$paidAmount.'", payment_status = "'.$payment_status.'" WHERE id IN ('.$new_id.')';
            $wpdb->query($q);     

            echo '<script>window.location.href="'.home_url('/arrange-now/?new_id='.$new_id.'').'"</script>';            

        }else{ 
            global $wpdb;
            $table_name = $wpdb->prefix . "contact_table";
            $new_id = $_POST['new_id']; 
            $q = 'UPDATE '.$table_name.' SET order_code = "'.$orderID.'", token = "'.$token.'", amount = "'.$paidAmount.'", payment_status = "'.$payment_status.'" WHERE id IN ('.$new_id.')';
            $wpdb->query($q); 
            
            echo '<script>window.location.href="'.home_url('/arrange-now/').'"</script>';
        } 
    }else{ 
        //print '<pre>';print_r($chargeJson); 
        $statusMsg = "Transaction has been failed!"; 
    } 
}else{ 
    $statusMsg = "Error on form submission."; 
} 

?>