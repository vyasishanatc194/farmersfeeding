<?php
/**
 * Template Name: Donation Page
 */
$homePageID = 5;
$page = get_post(get_the_ID());
$postId =  get_the_ID();
get_header();
?>

<section class="heading-section">
    <div class="<?php echo $heading_class;?>"> 
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="<?php echo $center_class;?>">
                        <?php echo apply_filters('the_content', ($page->header_section)); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section><!-- end of cremations top -->

<div class="middle-container">		
    <section class="breadcrumb-section">
        <div class="breadcrumb-div">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="breadcrumb-row">
                            <a href="index.html">Home</a>
                            <span class="icon-span"><i class="flaticon-right-arrow arrow_icon custom_icon"></i> </span>
                            <p>Donate</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- end of top title -->		
    <section class="main-form-section donate-form-section">
        <div class="main-form-div">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <form id="donation_form" name="donation_form">
                            
                            <div class="common-form-div">								
                                <div class="row">							
                                    <div class="col-lg-12">
                                        <div class="heading">
                                            <h3>Make a donation</h3>
                                        </div>
                                    </div>                                    
                                    <div class="col-lg-12">
                                        <div class="amount-root">
                                            <div class="amount-box">
                                                <label for="amount-1" class="format-radio">
                                                    <div class="title-div"> <h4>1 Utah Sourced Meal: <span class="font-weight-bold"> $5 </span></h4> </div>
                                                    <input type="radio" id="amount-1" class="radio-input radio-input-v1" name="donation_amt" value="5">
                                                </label>
                                            </div>		
                                            <div class="amount-box">
                                                <label for="amount-2" class="format-radio">
                                                    <div class="title-div"> <h4>Meal for a family: <span class="font-weight-bold"> $25 </span></h4> </div>
                                                    <input type="radio" id="amount-2" class="radio-input radio-input-v1" name="donation_amt" value="25">
                                                </label>
                                            </div>
                                            <div class="amount-box">
                                                <label for="amount-3" class="format-radio">
                                                    <div class="title-div"> <h4>Meals for 2 families: <span class="font-weight-bold"> $50 </span></h4> </div>
                                                    <input type="radio" id="amount-3" class="radio-input radio-input-v1" name="donation_amt" value="50">
                                                </label>
                                            </div>
                                            <div class="amount-box">
                                                <label for="amount-4" class="format-radio">
                                                    <div class="title-div"> <h4>Meals for 4 families: <span class="font-weight-bold"> $100 </span></h4> </div>
                                                    <input type="radio" id="amount-4" class="radio-input radio-input-v1" name="donation_amt"  value="100">
                                                </label>
                                            </div>
                                            <div class="amount-box">
                                                <label for="amount-5" class="format-radio">
                                                    <div class="title-div"> <h4>Other amount</h4> </div>
                                                    <input type="radio" id="amount-5" class="radio-input radio-input-v1" name="donation_amt" value="other" id="donation_custom_amt">
                                                </label>
                                            </div>	
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group input-group dollar-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">$</span>
                                            </div>
                                            <input type="number" class="form-control other-donation-amt" placeholder="Enter amount" name="entered_amt" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="row pt-15">
                                    <div class="col-lg-12">
                                        <div class="heading">
                                            <h3>Personal Information</h3>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Full Name *</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" placeholder="Enter first name"  name="full_name" value="testtt">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Email *</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" placeholder="Enter your email address" name="email" value="testtt@gmail.com">
                                            </div>
                                        </div>
                                    </div>						
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Phone number</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" placeholder="Enter your phone number" data-mask="0000000000" name="phone" value="1234567890">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Address *</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" placeholder="Enter Address" name="address" value="27 Fairground St. Jamaica">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>City *</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" placeholder="Enter City" name="city" value="Jamaica">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Postal Code *</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" placeholder="Enter Postal Code" name="postal_code" value="11435">
                                            </div>
                                        </div>
                                    </div>			
                                </div>
                                <div class="row pt-15" id="payment_section">
                                    <div class="col-lg-12">
                                        <div class="heading">
                                            <h3>Payment Information</h3>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Card Number *</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" placeholder="Enter Card Number"  name="card_number" value="4242424242424242">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Expiry Date *</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control expiry_date" placeholder="Select Expiry Date" name="expiry_date" readonly="readonly">
                                            </div>
                                        </div>
                                    </div>	
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>CVV *</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" placeholder="Enter CVV" name="cvv" value="123">
                                            </div>
                                        </div>
                                    </div>								
                                </div>
                                <div class="row pt-15">
                                    <div class="col-lg-12">
                                        <div class="heading">
                                            <h3>Total Amount: <span class="total-span" id="total-donation-amount"></span> </h3>
                                        </div>
                                    </div>				
                                    <div class="col-lg-6">
                                        <div class="btn-row">
                                            <button type="button" class="btn btn-primary btn-readmore btn-payment do_payment">Payment via stripe</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- end of cremations top -->
</div>

<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&display=swap" rel="stylesheet">

<link href="<?php echo get_stylesheet_directory_uri().'/donation'; ?>/css/custom.css" media="all" rel="stylesheet" type="text/css" />
<script src="<?php echo get_stylesheet_directory_uri().'/donation'; ?>/js/modernizr.js"></script>

<link type="text/css" href="<?php echo get_stylesheet_directory_uri().'/donation'; ?>/css/toastr.min.css" rel="stylesheet" />
<link href="<?php echo get_stylesheet_directory_uri().'/donation'; ?>/css/bootstrap-datepicker.min.css" rel="stylesheet">
<script src="<?php echo get_stylesheet_directory_uri().'/donation'; ?>/js/jquery.min.js"></script>
<script src="<?php echo get_stylesheet_directory_uri().'/donation'; ?>/js/toastr.min.js"></script>
<script src="<?php echo get_stylesheet_directory_uri().'/donation'; ?>/js/bootstrap-datepicker.js"></script>
<link type="text/css" href="<?php echo get_stylesheet_directory_uri().'/donation'; ?>/css/feather.min.css" media="all" rel="stylesheet" />

<script>
jQuery('.step-forms-nav-tab ul li a').click(function() { $(this).parent().addClass('active'); });
jQuery('.expiry_date').datepicker({
    format: 'mm/yyyy',
    autoclose: true,
    todayHighlight: true,
    startDate: '+0m +0y',
    endDate: '+10y',
    viewMode: "months", 
    minViewMode: "months"
});
jQuery(document).ready(function() {
    
    jQuery('input[name="donation_amt"]').on('change', function() {
        var checkedValue = $(this).val();
        jQuery('.other-donation-amt').val(checkedValue);
        jQuery('#total-donation-amount').text('$'+checkedValue);
        jQuery('.other-donation-amt').prop('disabled', true);
        if (checkedValue == 'other') {
            jQuery('.other-donation-amt').val();
            jQuery('#total-donation-amount').text('$'+0);
            jQuery('.other-donation-amt').prop('disabled', false);
        }
    });

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
    jQuery("#donation_form").validate({
        rules: {
            email: { 
                required: true,
                email: true,
                maxlength: 200
            },
            full_name: { 
                required: true,
                maxlength: 200
            },
            phone: { 
                required: true,
                phone: true,
                minlength: 8,
                maxlength: 15
            },
            address: { 
                required: true,
                maxlength: 200
            },
            city: { 
                required: true,
                maxlength: 40
            },
            postal_code: { 
                required: true,
                maxlength: 8
            },
            entered_amt: {
                required: true,
            },
            card_number: {
                required: true,
                maxlength: 16,
                minlength: 16
            },
            expiry_date: {
                required: true,
            },
            cvv: {
                required: true,
                maxlength: 3,
                minlength: 3
            }
        },
        messages: {
            email: "Please enter a valid email address.",
            full_name: "Please enter your name.",
            phone: "Please enter phone number.",
            address: "Please enter address.",
            city: "Please enter address.",
            postal_code: "Please enter address.",
            card_number: {
                required: "Please enter card number.",
                maxlength: "Please enter valid card number.",
                minlength: "Please enter valid card number."
            },
            expiry_date: {
                required: "Please enter expiry date."
            },
            cvv: {
                required: "Please enter cvv.",
                maxlength: "Please enter valid cvv.",
                minlength: "Please enter valid cvv."
            }
        },			   
        errorPlacement: function(error, element) {
            error.appendTo(element.parent().parent());
            element.focus();
        }
    });

    jQuery(document).ready(function () {
        $('body').scrollTop($("#donation_form").offset().top);
    });
});
</script>
<script src="<?php echo get_stylesheet_directory_uri().'/donation'; ?>/js/jquery-3.2.1.min.js" ></script>
<!-- validation -->
<script src="<?php echo get_stylesheet_directory_uri().'/donation'; ?>/js/jquery.validate.js"></script>
<?php get_footer(); ?>

