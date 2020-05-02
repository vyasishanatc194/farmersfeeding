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

<div class="middle-container middle-container2">
	<section class="step-forms-section">
		<div class="step-forms-inner">
		  	<div class="container">
		  		<div class="row">
					<div class="col-lg-12">
					  <div class="step-heading">
						<h2 id="pagetitle">Donation Form</h2>
					  </div>
					</div>
			  	</div>
                <form id="donation_form" name="donation_form">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="step-forms-nav-tab">
                                <ul class="nav nav-tabs">
                                    <li class="active done step_1"><a data-toggle="tab" href="#menu1">1</a></li>
                                    <li class="step_2"><a data-toggle="tab" href="#menu2">2</a></li>
                                    <li class="step_3"><a data-toggle="tab" href="#menu3">3</a></li>
                                </ul>
                            </div>
                            <div class="step-forms-tab-content">
                                <div class="tab-content">
                                    <div id="menu1" class="tab-pane tab-pane-one fade in active show">
                                        <div class="tab-title tab-h-400">
                                            <div class="heading">
                                                <h3>Tell us more about you</h3>
                                            </div>
                                            <div class="form-steps">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label>* Your email address</label>
                                                            <input type="email" class="form-control" placeholder="Enter your email address" name="email">
                                                        </div>
                                                    </div>			
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label>* Your full name</label>
                                                            <input type="text" class="form-control" placeholder="Enter your full name" name="your_name">
                                                        </div>
                                                    </div>				
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label>* Phone number</label>
                                                            <div class="input-group">
                                                                <input type="text" class="form-control" placeholder="Enter your phone number" data-mask="0000000000" name="phone"> 
                                                            </div>
                                                        </div>
                                                    </div>				
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label>* Your preference to contact email or phone</label>
                                                            <input type="text" class="form-control" placeholder="Enter preference to contact email or phone" name="email_phone">
                                                        </div>
                                                    </div>										
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-footer">
                                            <div class="row justify-content-end">
                                                <div class="col-lg-12">
                                                <div class="step-btn">
                                                    <a href="javascript:void(0);" class="btn btn-next next_step_1" >Next</a>
                                                </div>
                                                </div>
                                            </div>							
                                        </div>
                                    </div>
                                    <div id="menu2" class="tab-pane tab-pane-two fade">
                                        <div class="tab-title tab-h-400">
                                            <div class="heading">
                                                <h3>How you want to donate?</h3>
                                            </div>		
                                            <div class="form-steps">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="form-group">
                                                            <input type="radio" id="50" class="custom-control-input" name="donation_amt" value="50">
                                                            <label class="custom-control-label" for="50">$50</label>
                                                        </div>
                                                    </div>	
                                                    <div class="col-lg-4">
                                                        <div class="form-group">
                                                            <input type="radio" id="100" class="custom-control-input" name="donation_amt" value="100">
                                                            <label class="custom-control-label" for="100">$100</label>
                                                        </div>
                                                    </div>	
                                                    <div class="col-lg-4">
                                                        <div class="form-group">
                                                            <input type="radio" id="200" class="custom-control-input" name="donation_amt" value="200">
                                                            <label class="custom-control-label" for="200">200</label>
                                                        </div>
                                                    </div>	
                                                    <div class="col-lg-4">
                                                        <div class="form-group">
                                                            <input type="radio" id="500" class="custom-control-input" name="donation_amt" value="500">
                                                            <label class="custom-control-label" for="500">500</label>
                                                        </div>
                                                    </div>	
                                                    <div class="col-lg-4">
                                                        <div class="form-group">
                                                            <input type="radio" class="custom-control-input" name="donation_amt" value="other" id="donation_custom_amt">
                                                            <label class="custom-control-label" for="donation_custom_amt">Other</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control other-donation-amt" placeholder="Enter Amount" name="entered_amt" disabled="disabled">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="radio-button-div">
                                                            <div class="custom-control custom-radio custom-control-inline">
                                                                <input type="radio" class="custom-control-input radio1" id="Option1" name="soption" value="Option1">
                                                                <label class="custom-control-label" for="Option1">OPTION 1</label>
                                                            </div><br>
                                                            <div class="custom-control custom-radio custom-control-inline">
                                                                <input type="radio" class="custom-control-input radio2" id="Option2" name="soption" value="Option2">
                                                                <label class="custom-control-label" for="Option2">OPTION 2</label>
                                                            </div>
                                                        </div>
                                                    </div>								
                                                </div>
                                            </div>
                                        </div>							
                                        <div class="tab-footer">
                                            <div class="row justify-content-end">
                                                <div class="col-lg-12">
                                                    <div class="step-btn">
                                                        <a href="javascript:void(0);" class="btn btn-previous back_1">Back</a>
                                                        <a href="javascript:void(0);" class="btn btn-next next_step_2" >Next</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="menu3" class="tab-pane tab-pane-three fade">
                                        <div class="tab-title tab-h-400">
                                            <div class="heading">
                                                <h3>Payment Form</h3>
                                            </div>
                                            <div class="form-steps">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="form-group">
                                                            <label>* Card Number</label>
                                                            <input type="text" class="form-control" placeholder="Enter Card Number" name="card_number" id="card_number">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label>* Expiry Date</label>
                                                            <input type="text" class="form-control expiry_date" placeholder="Expiry Date" name="expiry_date" id="expiry_date" readonly="readonly" >
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label>* CVV</label>
                                                            <input type="text" class="form-control" placeholder="CVV" name="cvv" id="cvv" >
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>	
                                        <div class="tab-footer">
                                            <div class="row justify-content-end">
                                                <div class="col-lg-12">
                                                    <div class="step-btn">
                                                        <a href="javascript:void(0);" class="btn btn-previous back_2">Back</a>
                                                        <input type="submit" name="submit" class="btn btn-next save_button" value="Confirm and pay">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
			</div>
	  	</div>
	</section>
</div>

<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&display=swap" rel="stylesheet">
<link href="<?php echo get_stylesheet_directory_uri().'/donation'; ?>/css/bootstrap.min.css" media="all" rel="stylesheet" type="text/css" />
<link href="<?php echo get_stylesheet_directory_uri().'/donation'; ?>/css/animate.min.css" media="all" rel="stylesheet" type="text/css" />
<link href="<?php echo get_stylesheet_directory_uri().'/donation'; ?>/css/style.css" media="all" rel="stylesheet" type="text/css" />

<link href="<?php echo get_stylesheet_directory_uri().'/donation'; ?>/css/custom.css" media="all" rel="stylesheet" type="text/css" />
<script src="<?php echo get_stylesheet_directory_uri().'/donation'; ?>/js/modernizr.js"></script>

<link type="text/css" href="<?php echo get_stylesheet_directory_uri().'/donation'; ?>/css/toastr.min.css" rel="stylesheet" />
<link href="<?php echo get_stylesheet_directory_uri().'/donation'; ?>/css/bootstrap-datepicker.min.css" rel="stylesheet">
<script src="<?php echo get_stylesheet_directory_uri().'/donation'; ?>/js/jquery.min.js"></script>
<script src="<?php echo get_stylesheet_directory_uri().'/donation'; ?>/js/toastr.min.js"></script>
<script src="<?php echo get_stylesheet_directory_uri().'/donation'; ?>/js/bootstrap-datepicker.js"></script>
<link type="text/css" href="<?php echo get_stylesheet_directory_uri().'/donation'; ?>/css/feather.min.css" media="all" rel="stylesheet" />
<script src="<?php echo get_stylesheet_directory_uri().'/donation'; ?>/js/custom.js"></script>

<script src="<?php echo get_stylesheet_directory_uri().'/donation'; ?>/js/jquery-3.2.1.min.js" ></script>
<!-- validation -->
<script src="<?php echo get_stylesheet_directory_uri().'/donation'; ?>/js/jquery.validate.js"></script>
<?php get_footer(); ?>

