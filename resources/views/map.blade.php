@extends('layouts.app')
@section('css')
    <style>
        /* Always set the map height explicitly to define the size of the div
    * element that contains the map. */
        #map {
            height: 700px;
            width: 80%;
        }

    </style>

@endsection
@section('content')
    <div class="container">
        <div id="map"></div>
    </div>
@endsection
@section('js')
    {{--<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBSxWTq7rTNMdbepsVRL5_XoWit_etcBvY&callback=initMap"></script>--}}
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAy7R79_lJw8oy1YuY28NV0OpJ7-rX5WAY&callback=initMap"></script>
    <script type="text/javascript">

        let map;


        function initMap() {

            var options = {
                center: { lat: -34.397, lng: 150.644 },
                zoom: 8,
            };

            map = new google.maps.Map(document.getElementById('map'),options)
        }



    </script>
@endsection


