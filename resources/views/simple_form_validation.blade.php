@extends('layouts.app')

@section('css')
    <style>
        .error{
            color: red;
            font-style: italic;
        }
    </style>
@endsection
@section('content')
    <div class = "container">
        <div class = "col-md-6 col-md-offset-3">
            <div class = "panel panel-primary">
                <div class = "panel-heading">
                    Registration
                </div>
                <div class = "panel-body">
                    <form id = "registration">
                        @csrf
                        <input type = "text" class = "form-control" name = "username" placeholder = "Username"/>
                        <br/>
                        <input type = "text" class = "form-control" name = "email" placeholder = "Email"/>
                        <br/>
                        <input type = "password" class = "form-control" name = "password" placeholder = "Password" id = "password"/>
                        <br/>
                        <input type = "password" class = "form-control" name = "confirm" placeholder = "Confirm Password"/>
                        <br/>
                        <input type = "text" class = "form-control" name = "fname" placeholder = "First Name"/>
                        <br/>
                        <input type = "text" class = "form-control" name = "lname" placeholder = "Last Name"/>
                        <br/>
                        <div class = "gender">
                            <label class="radio-inline"><input type="radio" name="gender" class = "form-contorl"/>Male</label>
                            <label class="radio-inline"><input type="radio" name="gender" class = "form-contorl"/>Female</label>
                        </div>
                        <br/>

                        <div class = "hobbies">
                            <label class="checkbox-inline"><input type="checkbox" name = "hobbies">Cricket</label>
                            <label class="checkbox-inline"><input type="checkbox" name = "hobbies">Football</label>
                            <label class="checkbox-inline"><input type="checkbox" name = "hobbies">Hockey</label>
                            <label class="checkbox-inline"><input type="checkbox" name = "hobbies">Tennis</label>
                        </div>
                        <br/>
                        <select class = "form-control" name = "country">
                            <option value="0" selected="" disabled="">--SELECT--</option>
                            <option>India</option>
                            <option>Australia</option>
                            <option>Japan</option>
                            <option>China</option>
                            <option>South Africa</option>
                        </select>
                        <br/>
                        <textarea class = "form-control" name = "address" placeholder="Address"></textarea>
                        <br/>
                        <button type = "submit" class = "btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>
    <script>
        jQuery.validator.addMethod("noSpace", function(value, element) {
            return value == '' || value.trim().length != 0;
        }, "No space please and don't leave it empty");
        jQuery.validator.addMethod("customEmail", function(value, element) {
            return this.optional( element ) || /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/.test( value );
        }, "Please enter valid email address!");
        $.validator.addMethod( "alphanumeric", function( value, element ) {
            return this.optional( element ) || /^\w+$/i.test( value );
        }, "Letters, numbers, and underscores only please" );
        var $registrationForm = $('#registration');
        if($registrationForm.length){
            $registrationForm.validate({
                rules:{
                    username: {
                        required: true,
                        alphanumeric: true
                    },
                    email: {
                        required: true,
                        customEmail: true
                    },
                    password: {
                        required: true
                    },
                    confirm: {
                        required: true,
                        equalTo: '#password'
                    },
                    fname: {
                        required: true,
                        noSpace: true
                    },
                    lname: {
                        required: true,
                        noSpace: true
                    },
                    gender: {
                        required: true
                    },
                    hobbies: {
                        required: true
                    },
                    country: {
                        required: true
                    },
                    address: {
                        required: true
                    }
                },
                messages:{
                    username: {
                        required: 'Please enter username!'
                    },
                    email: {
                        required: 'Please enter email!',
                        email: 'Please enter valid email!'
                    },
                    password: {
                        required: 'Please enter password!'
                    },
                    confirm: {
                        required: 'Please enter confirm password!',
                        equalTo: 'Please enter same password!'
                    },
                    fname: {
                        required: 'Please enter first name!'
                    },
                    lname: {
                        required: 'Please enter last name!'
                    },
                    country: {
                        required: 'Please select country!'
                    },
                    address: {
                        required: 'Please enter address!'
                    }
                },
                errorPlacement: function(error, element)
                {
                    if (element.is(":radio"))
                    {
                        error.appendTo(element.parents('.gender'));
                    }
                    else if(element.is(":checkbox")){
                        error.appendTo(element.parents('.hobbies'));
                    }
                    else
                    {
                        error.insertAfter( element );
                    }

                },

                submitHandler: function (form) {
                    let formData = new FormData(form);
                    // for(var pair of formData.entries()) {
                    //     console.log(pair[0]+ ', '+ pair[1]);
                    // }
                    $.ajax({
                        url: "{{route('submit.form')}}",
                        type: "POST",
                        data: formData,
                        contentType: false,
                        cache: false,
                        processData: false,
                        success: function(data) {
                            console.log(data);
                        }
                    })
                }
            });
        } else{
            function notFound(e) {
                e.preventDefault();
                alert('not found');
            }
        }


    </script>
@endsection