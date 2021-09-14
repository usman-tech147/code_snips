@extends('layouts.app')
@section('content')
    <div class="container">
        <div id="piechart_3d" style="width: 900px; height: 500px;"></div>
    </div>
@endsection
@section('js')
    <script type="text/javascript">
        google.charts.load("current", {packages:["corechart"]});
        google.charts.setOnLoadCallback(drawChart);
        function drawChart() {

            $.ajax({
                url : "{{route('ajax-piechart-songs-statistics')}}",
                type: "GET",
                contentType: false,
                cache: false,
                processData: false,
                success: function (response) {

                    let arr = Object.entries(response.data);
                    let titles = ["0",{'Albums': 'Songs per album'}];
                    arr.unshift(titles);
                    console.log(arr.entries())
                    // var data = google.visualization.arrayToDataTable([
                    //     ['Albums', 'Songs Per Album'],
                    //     ['Work',     11],
                    //     ['Eat',      2],
                    //     ['Commute',  2],
                    //     ['Watch TV', 2],
                    //     ['Sleep',    7]
                    // ]);
                    //
                    // var options = {
                    //     title: 'Songs Statistics',
                    //     is3D: true,
                    // };
                    //
                    // var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
                    // chart.draw(data, options);
                }

            });

        }

    </script>
@endsection


