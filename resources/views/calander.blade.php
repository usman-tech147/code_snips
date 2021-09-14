@extends('layouts.app')
@section('content')
    <div class="container mt-3">

        <div class="row">
            <div class="col-md-10">
                <form id="data" class="m-3">
                    @csrf
                    <div class="row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <select class="form-control" name="year" id="year">
                                    <option value="default"> Select Year</option>
                                    <option value="2011"> 2011</option>
                                    <option value="2012"> 2012</option>
                                    <option value="2013"> 2013</option>
                                    <option value="2014"> 2014</option>
                                    <option value="2015"> 2015</option>
                                    <option value="2016"> 2016</option>
                                    <option value="2017"> 2017</option>
                                    <option value="2018"> 2018</option>
                                    <option value="2019"> 2019</option>
                                    <option value="2020"> 2020</option>
                                    <option value="2021" selected> 2021</option>
                                    <option value="2022"> 2022</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <select class="form-control" name="month" id="month">
                                    <option value="default"> Select Month</option>
                                    <option value="01"> january</option>
                                    <option value="02"> february</option>
                                    <option value="03"> march</option>
                                    <option value="04"> april</option>
                                    <option value="05"> may</option>
                                    <option value="06" selected> june</option>
                                    <option value="07"> july</option>
                                    <option value="08"> august</option>
                                    <option value="09"> september</option>
                                    <option value="10"> october</option>
                                    <option value="11"> november</option>
                                    <option value="12"> december</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </form>

                <div class="row">
                    <div class="col-md-10">
                        <table class="table table-bordered">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col">1</th>
                                <th scope="col">2</th>
                                <th scope="col">3</th>
                                <th scope="col">4</th>
                                <th scope="col">5</th>
                                <th scope="col">6</th>
                                <th scope="col">7</th>
                            </tr>
                            </thead>
                            <tbody id="cal">
                            @foreach($dates->chunk(7) as $dateChunk)
                                <tr>
                                    @foreach($dateChunk as $date)
                                        <th scope="col"
                                        @if(Carbon\Carbon::parse($date)->isSaturday() ||
                                        Carbon\Carbon::parse($date)->isSunday()) style="background-color: lightgreen" @endif>
                                            {{$date}}
                                        </th>
                                    @endforeach
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="m-3">
                    <button type="submit" id="format_1" class="btn btn-lg btn-primary">Format 1</button>
                </div>
                <div class="m-3">
                    <button type="submit" id="format_2" class="btn btn-lg btn-primary">Format 2</button>
                </div>
                <div class="m-3">
                    <button type="submit" id="format_3" class="btn btn-lg btn-primary">Format 3</button>
                </div>
            </div>
        </div>


    </div>
@endsection

@section('js')
    <script>

        $('#format_1').click(function (e) {
            e.preventDefault();
            let formData = new FormData(document.getElementById('data'));
            formData.append('format','1');

            $.ajax({
                url: "{{route('get.monthly.dates')}}",
                type: "POST",
                data: formData,
                contentType: false,
                cache: false,
                processData: false,
                success: function (data) {
                    // console.log(data.data)
                    $('#cal').html(data)
                }
            })
        })

        $('#format_2').click(function (e) {
            e.preventDefault();
            let formData = new FormData(document.getElementById('data'));
            formData.append('format','2');
            $.ajax({
                url: "{{route('get.monthly.dates')}}",
                type: "POST",
                data: formData,
                contentType: false,
                cache: false,
                processData: false,
                success: function (data) {
                    // console.log(data.data)
                    $('#cal').html(data)
                }
            })
        })
    </script>
@endsection