$(document).ready(function() {

    $("#user-company-profile").validate({
        rules: {
            email:{
                required: true,
                email: true
            } ,
            company_name:{
                required: true,
                alpha_space: true,
                minlength: 1,
                maxlength:255
            } ,
            name:{
                required: true,
                alpha_space: true,
                minlength: 1,
                maxlength:255
            } ,
            job_title:{
                required: true,
                alpha_space: true,
                minlength: 1,
                maxlength:255
            } ,
            phone:{
                required: true,
                phonenumber: true,
                minlength: 14,
                maxlength: 14,
            } ,
            address:{
                required: true,
                addressvalidation: true,
                minlength: 2,
                maxlength:255
            } ,
            country:{
                required: true,
            } ,
            city:{
                required: true,
                cityvalidation: true,
                minlength: 2,
                maxlength:255
            } ,
            state:{
                required: true,
            } ,
            zip_code:{
                required: true,
                digits: true,
                minlength: 2,
                maxlength:255
            } ,
            web_url: {
                required: true,
                url: true
            },
            industry:{
                required: true,
            } ,
            job_discription:{
                required: true,
                maxlength:500,
            } ,


        },
        messages: {

            email:{
                required: "Email is required.",
                email: "Please Enter Valid Email."
            } ,

            company_name:{
                required: "Company Name is required.",
                minlength: "Company Name is required",
                maxlength : "Company Name must be less than 255 characters long.",
            },

            name:{
                required: "Full name is required.",
                minlength: "Name is required",
                maxlength : "Name must be less than 255 characters long.",
            },

            job_title:{
                required: "Job title is required.",
                minlength: "Job title is required",
                maxlength : "Job title must be less than 255 characters long.",
            },

            phone:{
                required: "Phone number is required.",
                phonenumber:"Please enter a valid Phone number.",
                minlength: "Phone number must be equal to 14 characters.",
                maxlength: "Phone number must be equal to 14 characters.",
            },

            address:{
                required: "Address is required.",
                addressvalidation: "Address must be in valid format.",
                minlength: "Address must be at least 2 characters long.",
                maxlength: "Address must be less than 255 characters long."
            } ,
            country:{
                required: "Country is required.",
            } ,
            city:{
                required: "City is required.",
                cityvalidation: "City must be in valid format.",
                minlength: "City must be at least 2 characters long.",
                maxlength:"City must be less than 255 characters long."
            } ,
            state:{
                required: "State is required.",
            } ,
            zip_code:{
                required: "Zip Code is required.",
                digits: "Zip code must be in valid format.",
                minlength: "Zip Code must be at least 2 characters long.",
                maxlength:"Zip Code must be less than 255 characters long."
            } ,
            web_url:{
                required: "Web Address is required.",
                url: "Web Address url is invalid."
            },

            industry:{
                required: "Industry is required.",
            },

            job_discription:{
                required: "Description is required.",
                maxlength: "Description must be less than 500 characters long.",
            }


        }
    });
    jQuery.validator.addMethod("phonenumber", function(value, element) {
        /*return this.optional(element) || /^[+?0-9\-\(\)\s]+$/i.test(value);*/
        return this.optional(element) || /^[0-9\-\(\)\s]+$/i.test(value);
    });
    jQuery.validator.addMethod("addressvalidation", function(value, element) {
        return this.optional(element) || /^[a-zA-Z0-9,. ]+$/i.test(value);
    });
    jQuery.validator.addMethod("cityvalidation", function(value, element) {
        return this.optional(element) || /^[a-zA-Z,. ]+$/i.test(value);
    });

    $('#logo-company').change(function () {

        $('#company-logo-form').submit() ;
    }) ;

});
