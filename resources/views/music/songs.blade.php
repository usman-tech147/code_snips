@extends('layouts.app')
@section('css')
    <style>
        #pagination_nav_bar {
            float: right;
        }
    </style>
@endsection
@section('content')
    <div class="container">
        <div class="row m-3">
            <div class="col-10">
                <div class="row">
                    <div class="col-3">
                        <input type="text" name="name" id="name" class="form-control" placeholder="Search By Name">
                    </div>
                    <div class="col-3">
                        <select name="" id="album" class="form-control">
                            <option value=""> Select Album</option>
                            @foreach($albums as $album)
                                <option value="{{$album->id}}"> {{$album->name}} </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-3">
                        <select name="" id="length" class="form-control">
                            <option value=""> Select Length</option>
                            <option value="1-5"> 1 -- 5 </option>
                            <option value="6-10"> 6 -- 10 </option>
                            <option value="11-15"> 11 -- 15 </option>
                            <option value="16-20"> 16 -- 20 </option>
                            <option value="21-25"> 21 -- 25 </option>
                            <option value="26-30"> 26 -- 30 </option>
                            <option value="31-35"> 31 -- 35 </option>
                        </select>
                    </div>
                    <div class="col-3">
                        <select name="" id="date" class="form-control">
                            <option value=""> Select Date</option>
                            @foreach($dates as $date)
                                <option value="{{$date->Year}}"> {{$date->Year}} </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-2">
                <button class="btn btn-block btn-secondary" id="search"> Search</button>
            </div>
        </div>
        <div id="songs_data">
            @include('music.partials.songs_ajax_template')
        </div>
        <input type="hidden" name="page_no" id="page_no" value="1">
    </div>
@endsection

@section('js')
    <script>
        $(document).ready(function () {
            function fetch_data(name, album, length, date) {
                $.ajax({
                    url: "{{route('songs-filters')}}?name=" + name + "&album=" + album + "&length=" + length + "&date=" + date,
                }).done(function (data) {
                    $('#songs_data').html(data);
                });
            }

            function fetch_data_with_link(page, name, album, length, date) {
                $.ajax({
                    url: "{{route('songs-filters')}}?page=" + page + "&name=" + name + "&album=" + album + "&length=" + length + "&date=" + date,
                }).done(function (data) {
                    $('#songs_data').html(data);
                });
            }

            $(document).on('click', '.pagination a', function (event) {
                event.preventDefault();
                var page = $(this).attr('href').split('page=')[1];
                // console.log(page);
                // $('#page_no').val(page);
                var name = $('#name').val();
                var album = $('#album').val();
                var length = $('#length').val();
                var date = $('#date').val();
                $('li').removeClass('active');
                $(this).parent().addClass('active');
                fetch_data_with_link(page, name, album, length, date);
            });

            $(document).on('click', '#search', function () {
                var name = $('#name').val();
                var album = $('#album').val();
                var length = $('#length').val();
                var date = $('#date').val();
                fetch_data(name, album, length, date);
            });
        });

    </script>
@endsection
