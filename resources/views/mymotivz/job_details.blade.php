@extends('layouts.app')

@section('title' , 'Job Post')

@section('content')
    <!-- <div class="mm-subheader"><h1>Personal Details</h1></div> -->

    <div class="motivz-main-content">

        <!--// Main Section \\-->
        <div class="motivz-main-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="mm-motivz-jobdetail-content details-tabswrapper">
                            <div class="motivz-details-tabs">
                                <ul>
                                    <li class="active active-page"><span class="fa fa-briefcase"></span><br>
                                        <small>Job Details</small>
                                    </li>
                                    <li><span class="fa fa-bar-chart"></span><br>
                                        <small>Qualifications</small>
                                    </li>
                                    <li><span class="fa fa-money"></span><br>
                                        <small>Job Pay & Benefits</small>
                                    </li>
                                </ul>
                            </div>

                            <!-- <h2 class="form-title">Personal Details</h2> -->
                            <form action="{{route('store.job.details')}}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-title-wrap">
                                            <h2>THE JOB</h2>
                                            <h3>Tell us about this position</h3>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Job Title"
                                                   name="job_title"
                                                   value="@if(session()->has('job_title')) {{session()->get('job_title')}} @endif">
                                            @error('full_name')
                                            <label class="error">{{$message}}</label>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <select class="form-control" name="job_type">
                                                <option value="" selected="" disabled="">Job Type</option>
                                                <option value="Full-Time"
                                                        @if(session()->has('service'))
                                                            @if(session()->get('service') == "Full-Time") selected @endif
                                                        @endif>
                                                    Full-Time
                                                </option>
                                                <option value="Part-Time"
                                                        @if(session()->has('service'))
                                                            @if(session()->get('service') == "Part-Time") selected @endif
                                                        @endif>
                                                    Part-Time
                                                </option>
                                                <option value="Contract"
                                                        @if(session()->has('service'))
                                                            @if(session()->get('service') == "Contract") selected @endif
                                                        @endif>
                                                    Contract
                                                </option>
                                                <option value="Contract to Hire"
                                                        @if(session()->has('service'))
                                                            @if(session()->get('service') == "Contract to Hire") selected @endif
                                                        @endif>
                                                    Contract to Hire
                                                </option>
                                                <option value="Seasonal"
                                                        @if(session()->has('service'))
                                                            @if(session()->get('service') == "Part-Time") selected @endif
                                                        @endif>
                                                    Seasonal
                                                </option>
                                                <option value="Internship"
                                                        @if(session()->has('service'))
                                                            @if(session()->get('service') == "Internship") selected @endif
                                                        @endif>
                                                    Internship
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="text" name="location" id="location" data-role="tagsinput"
                                                   class="tags_1 tags form-control"
                                                   placeholder="Job Location"
                                                   value="@if(session()->has('location')) {{session()->get('location')}} @endif">
                                            <label id="location-error" class="error" for="location"
                                                   style="display: none"></label>
                                            @error('location')
                                            <label class="error">{{$message}}</label>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <textarea placeholder="Job Description"
                                                      class="form-control"
                                                      name="job_description">
                                                @if(session()->has('job_description'))
                                                    {{session()->get('job_description')}}
                                                @endif
                                            </textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Number of hires</label>
                                            <select name="num_hires" id="" class="form-control">
                                                <option value="" style="display: none"></option>
                                                <option value="1"
                                                        @if(session()->has('job_opening'))
                                                            @if(session()->get('job_opening') == "1") selected @endif
                                                        @endif>1
                                                </option>
                                                <option value="2"
                                                        @if(session()->has('job_opening'))
                                                            @if(session()->get('job_opening') == "2") selected @endif
                                                        @endif>2
                                                </option>
                                                <option value="3"
                                                        @if(session()->has('job_opening'))
                                                            @if(session()->get('job_opening') == "3") selected @endif
                                                        @endif>3
                                                </option>
                                                <option value="4"
                                                        @if(session()->has('job_opening'))
                                                            @if(session()->get('job_opening') == "4") selected @endif
                                                        @endif>4
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Apply Before</label>
                                            <input type="date" placeholder=""
                                                   name="applied_before"
                                                   value="@if(session()->has('applied_before'))
                                                   {{session()->get('applied_before')}} @endif"
                                                   class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-12"><br>
                                        <button type="submit" class="pull-right form-submit">
                                            Next
                                        </button>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--// Main Section \\-->

    </div>

@stop

@section('script')
    <script>

    </script>

@endsection
