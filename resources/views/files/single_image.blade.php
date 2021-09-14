@extends('layouts.app')

@section('css')
@endsection
@section('content')
    <div class="container mt-3">
        <form id="save-image" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div style="overflow: auto; overflow-x: hidden; height: 600px; width: 800px;">
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label for="image">Choose Image File</label>
                            <input type="file" class="form-control-file" onchange="previewImage(this)" name="image"
                                   id="image">
                        </div>
                        <div class="col-md-6 mb-3">
                            <img id="imagePreview" src="{{asset('images/nophoto.png')}}" alt="Product Image"
                                 height="150px" width="120px">
                        </div>
                    </div>
                    <div>
                        <button class="btn btn-success" type="submit">Save Image</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>
    <script>
        $('#save-image').validate({
            rules: {
                image:{
                    required: true,
                    extension: 'png|jpeg|jpg',
                }
            },
            messages:{
                image:{
                    required: "please choose image",
                    extension: "image should be only png or jpeg or jpg type"
                }
            }
        });

        function previewImage(input) {
            let file = $("input[type=file]").get(0).files[0];
            if (file) {
                let reader = new FileReader();
                reader.onload = function () {
                    $('#imagePreview').attr('src', reader.result)
                };
                reader.readAsDataURL(file);
            }
        }
    </script>
@endsection