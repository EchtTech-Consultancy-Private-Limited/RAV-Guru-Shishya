'use strict';
$(document).ready(function() {
    $(function() {
        // [ Add phone validator ]
        $.validator.addMethod(
            'phone_format',
            function(value, element) {
                return this.optional(element) || /^\(\d{3}\)[ ]\d{3}\-\d{4}$/.test(value);
            },
            'Invalid phone number.'
        );

        // [ Initialize validation ]
        $('.validation-form123').validate({
            ignore: '.ignore, .select2-input',
            focusInvalid: false,
            rules: {

                'firstname': {
                    required: true,
                    maxlength: 30

                },
                'lastname': {
                    required: true,
                    maxlength: 30

                },
                'title': {
                    required: true
                },
                'name': {
                    required: true,
                    maxlength: 40

                },
                'country': {
                    required: true,
                    

                },
                'state': {
                    required: true,
                 },
                'city': {
                    required: true,
                    maxlength: 40

                },

                'email': {
                    required: true,
                    email: true,
                    maxlength: 40
                },
                'postal': {
                    required: true,
                    minlength: 2,
                    maxlength: 8
                },
                'address': {
                    required: true,
                    maxlength: 200

                },
                'phone_no': {
                    required: true,
                 },
                 'mobile_no': {
                    required: true,
                    minlength: 8,
                    maxlength: 15
                 },
                'gender': {
                required: true,
                },
                'password': {
                    required: true,
                    minlength: 7,
                    maxlength: 15
                },

                'confirm-password': {
                    required: true,
                    equalTo: 'input[name="password"]'
                },
                'captcha':{
                    required:true,
                },
                'validation-required': {
                    required: true
                },
                'validation-url': {
                    required: true,
                    url: true
                },
                'validation-phone': {
                    required: true,
                    phone_format: true
                },
                'user_type': {
                    required: true
                },
                'validation-bs-tagsinput': {
                    required: true
                },
                'validation-text': {
                    required: true
                },
                'validation-file': {
                    required: true
                },
                'validation-switcher': {
                    required: true
                },
                'validation-radios': {
                    required: true
                },
                'validation-radios-custom': {
                    required: true
                },
                'validation-checkbox': {
                    required: true
                },
                'validation-checkbox-custom': {
                    required: true
                },
            },

            // Errors //

            errorPlacement: function errorPlacement(error, element) {
                var $parent = $(element).parents('.form-group');

                // Do not duplicate errors
                if ($parent.find('.jquery-validation-error').length) {
                    return;
                }

                $parent.append(
                    error.addClass('jquery-validation-error small form-text invalid-feedback')
                );
            },
            highlight: function(element) {
                var $el = $(element);
                var $parent = $el.parents('.form-group');

                $el.addClass('is-invalid');

                // Select2 and Tagsinput
                if ($el.hasClass('select2-hidden-accessible') || $el.attr('data-role') === 'tagsinput') {
                    $el.parent().addClass('is-invalid');
                }
            },
            unhighlight: function(element) {
                $(element).parents('.form-group').find('.is-invalid').removeClass('is-invalid');
            }
        });
    });




    $(".col-sm-12.follow_up").click(function(){
        $("i.fa.fa-plus.fa-x").toggleClass("fa-minus");
    })
});



$(document).ready(()=>{
    $('#remark-from-guru').validate({

        rules: {
            user_type: true,
            remarks: true,
    },
        
        messages: {}, //optional function for custom messages for each rule type });
    })

    console.log("hellow world")
})