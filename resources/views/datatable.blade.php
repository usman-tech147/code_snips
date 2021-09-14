@extends('layouts.app')
@section('css')
    {{--<link rel="stylesheet" href="{{asset('DataTables-1.10.25/datatables.min.css')}}">--}}
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.25/datatables.min.css"/>

@endsection
@section('content')
    <div class="container mt-3">


        <div class="row">
            <div class="col-md-6 m-4">
                <select name="album"  class="form-control filter-select">
                    {{--<option value=""> Select Album </option>--}}
                    @foreach ($albums as $album)
                        <option value="{{$album->id}}"> {{$album->name}} </option>
                    @endforeach
                </select>
            </div>
        </div>
        <table id="music">
            <thead>
            <tr>
                <th> Id</th>
                <th> Product # </th>
                <th> Name</th>
                <th> Length</th>
                <th> Album</th>
            </tr>
            </thead>
        </table>

    </div>
@endsection

@section('js')
    {{--<script src="{{asset('DataTables-1.10.25/datatables.min.js')}}"></script>--}}
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.25/datatables.min.js"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).ready(function () {
            var myData = {};
            var table = $('#music').DataTable({
                processing: true,
                serverSide: true,

                "ajax": {
                    "url": "{{route('songs-record')}}",
                    "type": "POST",
                    "data": function ( d ) {
                        return  $.extend(d, myData);
                    },
                    "dataSrc": function ( json ) {
                        console.log(json);
                        return json;
                    }

                },
                columns: [
                    {
                        data: 'id',
                    },
                    {
                        data: 'Product_no',
                    },
                    {
                        data: 'name',
                    },
                    {
                        data: 'length',
                    },
                    {
                        data: 'album',
                        orderable: false,
                        searchable: false
                    },
                ],
            });
            $(".filter-select").on('change', function () {

                myData.album_id = this.value;
                table.ajax.reload();
            });

        })
    </script>
@endsection