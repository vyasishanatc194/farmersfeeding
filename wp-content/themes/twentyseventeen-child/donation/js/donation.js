jQuery(document).on('click','.do_payment',function() {
    // if(jQuery('#donation_form').valid()) {

        var btnText = jQuery('.do_payment');
        btnText.prop('disabled', true);
        btnText.val('Loading...');
        var formData = jQuery("#donation_form").serialize();
        console.log(formData);
        jQuery.ajax({
            type: "POST", 
            url: pw_script_vars.ajaxurl,
            dataType: "json",
            data: 'action=donate_now&security='+pw_script_vars.security+'&'+formData,
            error: function(e){
                //console.log(e);
            },
            beforeSend: function() {},
            success: function(response, xhr) {
                if (!response.success) {
                    btnText.val('Submit Again');
                    toastr.success('Please contact administrator of site.', response.data.data.message);
                } else {
                    btnText.val('Thank You');
                    jQuery("#pagetitle").text("Thank You");
                    jQuery("#donation_form").hide();
                    toastr.success('You will get a mail.', response.data.data.message);
                }
            },
            complate: function() {}
        });

    // }
});