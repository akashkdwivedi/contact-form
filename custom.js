  $(document).ready(function() {
    $('#contact_form').bootstrapValidator({
        // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            name: {
                validators: {
                        stringLength: {
                        min: 2,
                    },
                        notEmpty: {
                        message: 'Please supply your first name'
                    }
                }
            },
            email: {
                validators: {
                    notEmpty: {
                        message: 'Please supply your email address'
                    },
                    emailAddress: {
                        message: 'Please supply a valid email address'
                    }
                }
            },
            phone: {
                validators: {
                    stringLength: {
                        min: 6,
                    },
                    notEmpty: {
                        message: 'Please supply your phone number'
                    }
                }
            },
            company_name: {
                validators: {
                     stringLength: {
                        min: 2,
                    },
                    notEmpty: {
                        message: 'Please provide your company\'s name'
                    }
                }
            },
            company_size: {
                validators: {
                    notEmpty: {
                        message: 'Please select your company\'s size'
                    }
                }
            },
            service: {
                validators: {
                    notEmpty: {
                        message: 'Please select a service'
                    }
                }
            }
        }
    })

    function showErrorMsg(){
        $('#error_message').slideDown({ opacity: "show" }, "slow") // Do something ...    
    }

    $("#submitForm").click(function(e){
        console.log('form submit button clicked');
        $('#success_message').hide();
        $('#error_message').hide();

        if(!$('#contact_form').data('bootstrapValidator').validate().isValid()) {
            // form contains errors.
            return false;    
        }
        
        // Prevent form submission
        e.preventDefault();

        $('#submitForm').prop('disabled', true);

        // Get the form instance
        var $form = $('#contact_form');

        // Get the BootstrapValidator instance
        var bv = $form.data('bootstrapValidator');

        // Use Ajax to submit form data
        $.post('savecontact.php', $form.serialize(), function(result) {
            
        }, 'json')

        .done(function(result) {
            $('#submitForm').prop('disabled', false);
            if(!result || !result.mailed) {
                showErrorMsg();
                return false;
            }
            console.log( "second success", result );
            // console.log('ajax result: ', result);
            $('#contact_form').data('bootstrapValidator').resetForm();
            $('#success_message').slideDown({ opacity: "show" }, "slow") // Do something ...
            $('#contact_form').reset();            
        })

        .fail(function(err, b) {
            $('#submitForm').prop('disabled', false);
            console.log("error in ajax..", err, b);
            showErrorMsg();
            return false;
        })

        return false;
    })


});



