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
                                    <li><span class="fa fa-briefcase"></span><br>
                                        <small>Job Details</small>
                                    </li>
                                    <li class="active active-page">
                                        <span class="fa fa-bar-chart"></span><br>
                                        <small>Qualifications</small>
                                    </li>
                                    <li><span class="fa fa-money"></span><br>
                                        <small>Job Pay & Benefits</small>
                                    </li>
                                </ul>
                            </div>

                            <!-- <h2 class="form-title">Personal Details</h2> -->
                            <form action="{{route('store.job.qualification')}}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-title-wrap">
                                            <h2>THE IDEAL CANDIDATE</h2>
                                            <h3>Identify the qualifications needed</h3>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <select name="industry" class="form-control">
                                                <option value="0">Industry</option>
                                                @foreach($industries as $industry)
                                                    <option value="{{$industry->id}}"> {{$industry->name}} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <select name="required_experience" id="" class="form-control">
                                                <option value="0">Experience Level</option>
                                                <option value="Intern">Intern</option>
                                                <option value="Entry Level">Entry Level</option>
                                                <option value="Intermediate">Intermediate</option>
                                                <option value="Experienced">Experienced</option>
                                                <option value="Managerial">Managerial</option>
                                                <option value="Directorship">Directorship</option>
                                                <option value="Executive">Executive</option>
                                                <option value="Senior Executive">Senior Executive</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <select name="education" class="form-control">
                                                <option value="0">Select Education</option>
                                                @foreach($educations as $education)
                                                    <option value="{{$education->id}}"> {{$education->name}} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Required Skills (Optional)</label>
                                            <input name="required_skills" id="required_skills" type="text"
                                                   class="tags_1 tags form-control"
                                                   placeholder="Use comma or enter to separate skills"
                                                   value="{{old('required_skills')}}">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group"><label>Licensure/Certification (Optional)</label>
                                            <input type="text" name="required_certification" id="required_certification"
                                                   class="tags_1 tags form-control"
                                                   placeholder="Use comma or enter to separate certification"
                                                   value="{{old('required_certification')}}">
                                        </div>
                                    </div>
                                    <div class="col-md-12"><br>
                                        <button type="submit" class="pull-right form-submit">
                                            Next
                                        </button>
                                        <a href="{{route('job.details')}}" class="form-submit">
                                            Back
                                        </a>
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
        $(function () {
            $('#required_skills').tagsInput({
                width: '100%',
                defaultText: 'Use comma or enter to separate'
            });
            $('#required_certification').tagsInput({
                width: '100%',
                defaultText: 'Use comma or enter to separate'
            });
        });
    </script>

@endsection
