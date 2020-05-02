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
        jQuery('.other-donation-amt').prop('disabled', true);
        if (checkedValue == 'other') {
            jQuery('.other-donation-amt').val(0);
            jQuery('.other-donation-amt').prop('disabled', false);
        }
    });

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
    jQuery("#donation_form").validate({
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
            donation_amt: {
                required: true
            },
            soption: {
                required: true
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
            your_name: "Please enter your name.",
            phone: "Please enter phone number.",
            email_phone: "Please enter your preference to contact email or phone.",
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
            },
            soption: "Please select one option."
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
        $('body').scrollTop($("#donation_form").offset().top);
    });

    jQuery('.next_step_1').click(function() {
        //jQuery("#donation_form").valid();
        if(jQuery('#donation_form').valid()) {
        jQuery('#menu1').removeClass('active show');
        jQuery('.step_1').addClass('done'); 
        jQuery('.step_2').addClass('active'); 
        jQuery('#menu2').addClass('active show');
        }
    });
    jQuery('.next_step_2').click(function() {
        //jQuery("#donation_form").valid();
        if(jQuery('#donation_form').valid()) {
        jQuery('#menu2').removeClass('active show');
        jQuery('.step_2').addClass('done');
        jQuery('.step_3').addClass('active');
        jQuery('#menu3').addClass('active show');
        }
    });
    jQuery('.next_step_3').click(function() {
        //jQuery("#donation_form").valid();
        if(jQuery('#donation_form').valid()) {
        jQuery('#menu3').removeClass('active show');
        jQuery('.step_3').addClass('done');
        jQuery('.step_4').addClass('active'); 
        jQuery('#menu4').addClass('active show');
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

    // jQuery('.back_3').click(function() {
    //     jQuery('#menu3').addClass('active show');
    //     jQuery('.step_4').removeClass('active'); 
    //     jQuery('.step_3').removeClass('done');
    //     jQuery('#menu4').removeClass('active show');
        
    // });

    jQuery('.step_2 a').click(function() {
        if(jQuery('#donation_form').valid()) {
            return true;
        }
        else{
            jQuery('.step_2').removeClass('active');
            return false;
        }
    });

    jQuery('.step_3 a').click(function() {
        if(jQuery('#donation_form').valid()) {
            return true;
        }
        else{
            jQuery('.step_3').removeClass('active');
            return false;
        }
    });
    jQuery('.step_4 a').click(function() {
        if(jQuery('#donation_form').valid()) {
            return true;
        }
        else{
            jQuery('.step_4').removeClass('active');
            return false;
        }
    });
});