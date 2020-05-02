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
            postal_code: "Please enter postal code.",
            expiry_date: "Please enter expiry date.",
            card_number: {
                required: "Please enter card number.",
                maxlength: "Please enter valid card number.",
                minlength: "Please enter valid card number."
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