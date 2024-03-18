@extends('admin.layouts.master')
@section('content')
    <div class="page-head">
        Site settings
        <ul class="breadcrumb">
            <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-home"></i>home</a></li>
            <li class="active">Site settings</li>
        </ul>
    </div>
    <!-- Page content
    ==========================================-->
    <div class="page-content ">
        <div class="row">
            <form class="col-lg-12 col-md-12 col-sm-12 row edit-form" action="{{route('admin.settings')}}" method="post">
                {!! csrf_field() !!}
                <div class="col-lg-12 col-md-12 col-sm-12 alert alert-danger error-div" role="alert" style="display: none;">

                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="form-group">
                        <label> Email address : </label>
                        <input type="email" class="form-control" name="email" value="{{$settings->email}}">
                    </div><!--End Form Group-->
                </div><!--End Col-md-6-->
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="form-group">
                        <label> Phone number : </label>
                        <input type="text" class="form-control" name="phone" value="{{$settings->phone}}">
                    </div><!--End Form Group-->
                </div><!--End Col-md-6-->
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="form-group">
                        <label> Description (about the company) : </label>
                        <textarea type="text" class="form-control" name="description">{{$settings->description}}</textarea>
                    </div><!--End Form Group-->
                </div><!--End Col-md-6-->
                <div class="col-lg-12 col-md-12 col-sm-12"><hr></div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="form-group">
                        <label> Facebook : </label>
                        <input type="text" class="form-control" name="facebook" value="{{$settings->facebook}}">
                    </div><!--End Form Group-->
                </div><!--End Col-md-6-->
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="form-group">
                        <label> Instagram : </label>
                        <input type="text" class="form-control" name="instagram" value="{{$settings->instagram}}">
                    </div><!--End Form Group-->
                </div><!--End Col-md-6-->
                <div class="col-md-12 col-sm-12 col-lg-12"><hr></div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="form-group">
                        <label> Working start time : </label>
                        <input type="time" class="form-control" name="start_time" value="{{$settings->start_time}}">
                    </div><!--End Form Group-->
                </div><!--End Col-md-6-->
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="form-group">
                        <label> Working end time : </label>
                        <input type="time" class="form-control" name="end_time" value="{{$settings->end_time}}">
                    </div><!--End Form Group-->
                </div><!--End Col-md-6-->
                <div class="col-md-12">
                    <div class="form-group">
                        <div class="radio-wrap">
                            <input type="checkbox" id="sat" name="off_days[]" value="6" {{in_array(6 , json_decode($settings->off_days)) ? 'checked' : ''}}>
                            <label for="sat"> Saturday</label>
                        </div>
                        <div class="radio-wrap">
                            <input type="checkbox" id="sun" name="off_days[]" value="0" {{in_array(0 , json_decode($settings->off_days)) ? 'checked' : ''}}>
                            <label for="sun"> Sunday</label>
                        </div>
                        <div class="radio-wrap">
                            <input type="checkbox" id="mon" name="off_days[]" value="1" {{in_array(1 , json_decode($settings->off_days)) ? 'checked' : ''}}>
                            <label for="mon"> Monday</label>
                        </div>
                        <div class="radio-wrap">
                            <input type="checkbox" id="tue" name="off_days[]" value="2" {{in_array(2 , json_decode($settings->off_days)) ? 'checked' : ''}}>
                            <label for="tue"> Tuesday </label>
                        </div>
                        <div class="radio-wrap">
                            <input type="checkbox" id="wed" name="off_days[]" value="3" {{in_array(3 , json_decode($settings->off_days)) ? 'checked' : ''}}>
                            <label for="wed"> Wednesday</label>
                        </div>
                        <div class="radio-wrap">
                            <input type="checkbox" id="thu" name="off_days[]" value="4" {{in_array(4 , json_decode($settings->off_days)) ? 'checked' : ''}}>
                            <label for="thu"> Thursday </label>
                        </div>
                        <div class="radio-wrap">
                            <input type="checkbox" id="fri" name="off_days[]" value="5" {{in_array(5 , json_decode($settings->off_days)) ? 'checked' : ''}}>
                            <label for="fri"> Friday </label>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-sm-12">
                    <div class="form-group">
                        <button class="custom-btn">
                            <span id="edit-button"> <i class="fa fa-save"></i> save</span>
                        </button>
                    </div><!--End Form Group-->
                </div><!--End Col-md-6-->
            </form><!--End Form-->
        </div><!--End Row-->
    </div><!--End Page content-->
@endsection