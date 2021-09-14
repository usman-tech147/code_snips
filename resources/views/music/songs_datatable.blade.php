@extends('layouts.app')
@section('css')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.25/datatables.min.css"/>

@endsection
@section('content')
    <div class="container-fluid">
        <div class="row m-3">
            <div class="col-10">
                <form action="" method="POST" id="search-form" role="form">
                    <div class="form-group row">
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
                            <select name="" id="band" class="form-control">
                                <option value=""> Select Band</option>
                                @foreach($bands as $band)
                                    <option value="{{$band->id}}"> {{$band->name}} </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-3">
                            <select name="" id="song_length" class="form-control">
                                <option value=""> Select Length</option>
                                <option value="1-5"> 1 -- 5</option>
                                <option value="6-10"> 6 -- 10</option>
                                <option value="11-15"> 11 -- 15</option>
                                <option value="16-20"> 16 -- 20</option>
                                <option value="21-25"> 21 -- 25</option>
                                <option value="26-30"> 26 -- 30</option>
                                <option value="31-35"> 31 -- 35</option>
                            </select>
                        </div>
                        <div class="col-3 mt-3">
                            <select name="" id="date" class="form-control">
                                <option value=""> Select Date</option>
                                @foreach($dates as $date)
                                    <option value="{{$date->Year}}"> {{$date->Year}} </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-3 mt-3">
                            <button class="btn btn-block btn-secondary" type="submit"> Search</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <table class="table" id="songs_data">
            <thead>
            <tr>
                <th> Serial Number</th>
                <th> Name</th>
                <th> Length</th>
                <th> Release Date</th>
                <th> Album</th>
                <th> Band</th>
                <th> Actions</th>
            </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
@endsection
@section('js')
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.25/datatables.min.js"></script>
    <script>
        $(document).ready(function () {
            var table = $('#songs_data').DataTable({
                sDom: "lrtip",
                // hide search box
                dom: "rtip",
                // hide show entries box

                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{route('ajax-datatable-get-songs')}}",
                    type: "post",
                    data: function (d) {
                        d.name = $('#name').val();
                        d.album = $('#album').val();
                        d.band = $('#band').val();
                        d.song_length = $('#song_length').val();
                        d.date = $('#date').val();
                        d._token = "{{csrf_token()}}";
                    },
                },
                columns: [
                    {
                        data: "serial_number",
                        orderable: false,
                        searchable: false,
                    },
                    {
                        data: "song",
                        name: "songs.name"
                    },
                    {
                        data: "length",
                        orderable: false,
                        searchable: false,
                    },
                    {
                        data: "release_date",
                        orderable: false,
                        searchable: false,
                    },
                    {
                        data: "album",
                        orderable: false,
                        searchable: false,
                    },
                    {
                        data: "band",
                        orderable: false,
                        searchable: false,
                    },
                    {
                        data: "actions",
                        name: "actions",
                        orderable: false,
                        searchable: false,
                    },
                ]
            });
            $('#search-form').on('submit', function (e) {
                table.draw();
                e.preventDefault();
            });

        })
    </script>
@endsection