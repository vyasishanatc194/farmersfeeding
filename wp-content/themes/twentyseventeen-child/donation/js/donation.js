jQuery(document).on('click','.do_payment',function() {
    if(jQuery('#donation_form').valid()) {

        var btnText = jQuery('.do_payment');
        btnText.prop('disabled', true);
        btnText.text('Loading...');
        var formData = jQuery("#donation_form").serialize();
        try {
            jQuery.ajax({
                type: "POST", 
                url: pw1_script_vars.ajaxurl,
                dataType: "json",
                data: 'action=donate_now&security='+pw1_script_vars.security+'&'+formData,
                error: function(e){
                    //console.log(e);
                },
                beforeSend: function() {},
                success: function(response, xhr) {
                    console.log(response);
                    if (!response.success) {
                        btnText.prop('disabled', false);
                        btnText.text('Payment via stripe');
                        toastr.error('Please contact administrator of site.', response.data.data.message);
                    } else {
                        btnText.text('Thank You');
                        jQuery("#pagetitle").text("Thank You");
                        jQuery("#donation_form").hide();
                        toastr.success('You will get a mail.', response.data.data.message);
                    }
                },
                complate: function() {}
            });
        } catch(error) {
            console.error(error);
        }
    }
});