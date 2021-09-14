@extends('layouts.app')

@section('css')
@endsection
@section('content')
    <div class="container mt-3">
        <p class="countdown"> timer </p>
        <p class="timesTriggered"></p>
    </div>
@endsection

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>
    <script>

        var oneSecond = 1000;
        var counter = 0;

        var eventInterval = 5 * oneSecond;
        var timesTriggered = 0;

        setInterval(function () {

            counter = (counter + oneSecond) % eventInterval;
            $('.countdown').text((eventInterval - counter) / oneSecond);

            if(counter == 0){
                timesTriggered++;
                $('.timesTriggered').text(timesTriggered);
            }

        }, oneSecond);

    </script>
@endsection