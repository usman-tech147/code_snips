$(document).ready(function () {

    $("#phone_no").each(function(){
        $(this).on("change keyup paste", function (e) {
            var output,
                $this = $(this),
                input = $this.val();

            if(e.keyCode != 8) {
                input = input.replace(/[^0-9]/g, '');
                var area = input.substr(0, 3);
                var pre = input.substr(3, 3);
                var tel = input.substr(6, 4);
                if (area.length < 3) {
                    output = "(" + area;
                } else if (area.length == 3 && pre.length < 3) {
                    output = "(" + area + ")" + " " + pre;
                } else if (area.length == 3 && pre.length == 3) {
                    output = "(" + area + ")" + " " + pre + "-" + tel;
                }
                $this.val(output);
            }
        });
    });


    jQuery.validator.addMethod("lettersonly", function(value, element) {
        return this.optional(element) || /^[a-zA-Z\s]+$/i.test(value);
    });
    $.validator.addMethod('phoneExt', function (value, element) {
        return this.optional(element) || /^\+[0-9]{1,2}$/.test(value);
    });
    jQuery.validator.addMethod("phonenumber", function(value, element) {
        return this.optional(element) || /^[0-9\-\(\)\s]+$/i.test(value);
    });

    $("#form_talent").validate({
        rules: {
            name: {
                required: true,
                lettersonly:true,
                maxlength: 255,
            },
            title: {
                required: true,
                lettersonly:true,
                maxlength: 255,
            },
            company: {
                required: true,
                lettersonly:true,
                maxlength: 255,
            },
            industry: {
                required: true,
                // lettersonly:true,
                maxlength: 255,
            },
            email: {
                required: true,
                email:true,
                maxlength: 255,
            },
            phone_ext:{
                required:true,
                phoneExt:true,
                minlength: 2,
                maxlength: 5,
            },
            phone_no:{
                required: true,
                phonenumber: true,
                minlength: 14,
                maxlength: 14,
            },
            position:{
              required:true,
              maxlength: 255,
            },
            job_desc:{
                required:true,
                maxlength:500,
            },
            sel_service:{
                required: true,
            },


        },
        messages: {
            name: {
                required: "Name is required.",
                lettersonly : "Only alphabets are allowed in name.",
                maxlength: "Name must be less than 255 characters long.",
            },
            title: {
                required: "Title is required.",
                lettersonly : "Only alphabets are allowed in title.",
                maxlength: "Title must be less than 255 characters.",
            },
            company: {
                required: "Company is required.",
                lettersonly : "Only alphabets are allowed in company.",
                maxlength: "Company must be less than 255 characters long.",
            },
            industry: {
                required: "Industry is required.",
                lettersonly : "Only Alphabets are allowed in industry.",
                maxlength: "Industry must be less than 255 characters long.",
            },
            email: {
                required: "Email is required.",
                email : "Email must be valid.",
                maxlength: "Email must be less than 255 characters long.",
            },
            phone_ext:{
                required: "Phone extension is required",
                phoneExt: "Phone extension must be valid.",
                minlength: "Phone extension must be minimum 2 digits long.",
                maxlength: "Phone extension must be less than 5 digits long.",
            },
            phone_no:{
                required: "Phone number is required.",
                phonenumber: "Phone number must be in valid format.",
                minlength: "Phone number must be equal to 14 characters.",
                maxlength: "Phone number must be equal to 14 characters.",
            },
            position:{
                required:"Position is required.",
                maxlength: "Position must be less than 255 characters long.",
            },
            job_desc:{
                required: "Job description is required.",
                maxlength: "Job description must be less than 500 characters long.",
            },
            sel_service:{
                required: "Service is required.",
            }
        },
        submitHandler: function(form) {
            form.submit();
        }

    });

});
