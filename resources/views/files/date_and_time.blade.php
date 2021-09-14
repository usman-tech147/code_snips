@extends('layouts.app')

@section('css')
@endsection
@section('content')
    <div class="container mt-3">
        <form action="{{route('submit.date-and-time')}}" method="post">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>joining date</label>
                        <input type="date" name="join_date" class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>probation end date</label>
                        <input type="date" name="end_date" class="form-control">
                    </div>
                </div>
            </div>
            <br>
            <br>
            <br>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>signin time</label>
                        <input type="time" name="signin_time" class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>signoff time</label>
                        <input type="time" name="signoff_time" class="form-control">
                    </div>
                </div>
            </div>
            <br>
            <br>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>
    <script>

    </script>
@endsection