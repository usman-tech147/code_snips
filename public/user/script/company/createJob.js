$( document ).ready(function() {

    $("#user-create-job-form").validate({
        ignore: [],
        rules: {
            jobtitle: {
                required: true,
                alpha_space: true,
                minlength: 2,
                maxlength:255
            } ,
            education:{
                required: true,
            } ,
            /*city:{
                required: true,
                alpha_space: true,
                minlength: 2,
                maxlength:255
            } ,
            state:{
                required: true,
                alpha_space: true,
                minlength: 2,
                maxlength:255
            } ,*/
            location:{
                required: true,
                locationvalidation: true,
                // minlength: 2,
                maxlength:255
            } ,
            web_url: {
                required: true,
                url: true
            },
            package:{
                required: true,
                currencyvalidation: true,
                minlength: 1,
                maxlength: 20
                // positivedigit:true,
            } ,
            package_to:{
                currencyvalidation: true,
                greaterThan:true,
                maxlength: 20
                // positivedigit:true,
            } ,
            salary_duration:{
                required: true,
            },
            industry:{

                required: true,
            } ,
            service:{
                required: true,

            },
            job_discription:{
                required: true,
                maxlength:500
            } ,
            document:{
                extension : 'docx|pdf',
            }

        },
        messages: {

            jobtitle: {
                required: "Job title is required.",
                minlength: "Job title  must be at least 2 characters long.",
                maxlength: "Job title  must be less than 255 characters long."
            } ,
            education:{
                required: "Education is required.",
            } ,
            location:{
                required: "Job location is required.",
                locationvalidation: "Job location must be in valid format.",
                minlength: "Job location must be at least 2 characters long.",
                maxlength: "Job location must be less than 255 characters long."
            } ,
            /*city:{
                required: "City is required.",
                minlength: "City must be at least 2 characters long.",
                maxlength: "City must be less than 255 characters long."
            } ,
            state:{
                required: "State is required.",
                minlength: "State must be at least 2 characters long.",
                maxlength: "State must be less than 255 characters long."
            } ,*/
            web_url: {
                required: "Website url is required.",
                url: "Please enter valid url."
            },
            package:{
                required: "Salary is required.",
                currencyvalidation: "Salary should be in valid format.",
                minlength: "Salary must be at least 1 characters long.",
                maxlength: "Salary must be less than 20 characters long."
                // positivedigit:"Salary must be positive.",
            } ,
            package_to:{
                currencyvalidation: "Salary should be in valid format.",
                greaterThan: "Maximum salary range must be greater than minimum salary.",
                maxlength: "Salary must be less than 20 characters long."
                // positivedigit:"Salary must be positive.",
            } ,
            salary_duration:{
                required: "Salary duration is required",
            },
            industry:{
                required: "Type of industry is required.",
            } ,
            service:{
                required: "Please select service from dropdown."
            },
            job_discription:{
                required: "Job description is required.",
                maxlength: "Job description must be less than 255 characters long."
            } ,
            document: {
                extension: "Only docx and pdf files are allowed for document.",
            }
        },
        submitHandler: function(form) {
            form.submit();
        }
    });
    jQuery.validator.addMethod("currencyvalidation", function(value, element) {
        return this.optional(element) || /^[,.?0-9]+$/i.test(value);
    });
    jQuery.validator.addMethod("locationvalidation", function(value, element) {
        return this.optional(element) || /^[a-zA-Z, ]+$/i.test(value);
    });
    jQuery.validator.addMethod("greaterThan", function (value, element) {
        var salary_to = value;
        var salary_from = $("#package").val();

        if (value.indexOf(',') > -1){
            salary_to = value.replace(',','');
        }
        if(salary_from.indexOf(',') > -1)
        {
            salary_from = salary_from.replace(',','');
        }
        salary_from = parseInt(salary_from);
        salary_to = parseInt(salary_to);
        if(salary_from >= salary_to)
        {
            return false;
        }
        else
        {
            return true;
        }
    });

});
