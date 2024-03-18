@extends('admin.layouts.master')
@section('content')
    <div class="page-head">
        Email templates
        <ul class="breadcrumb">
            <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-home"></i>home</a></li>
            <li class="active">Email templates</li>
        </ul>
    </div>
    <!-- Page content
    ==========================================-->
    <div class="page-content ">
        <div class="row">
            <form class="col-lg-12 col-md-12 col-sm-12 row edit-form" action="{{route('admin.templates')}}" method="post">
                {!! csrf_field() !!}
                <div class="col-lg-12 col-md-12 col-sm-12 alert alert-danger error-div" role="alert" style="display: none;">

                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="form-group">
                        <label> Booking email first part : </label>
                        <textarea type="text" class="form-control" name="description1">{{$email->description1}}</textarea>
                    </div><!--End Form Group-->
                </div><!--End Col-md-6-->
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="form-group">
                        <label> Booking email second part : </label>
                        <textarea type="text" class="form-control" name="description2">{{$email->description2}}</textarea>
                    </div><!--End Form Group-->
                </div><!--End Col-md-6-->
                <div class="col-lg-12 col-md-12 col-sm-12"><hr></div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="form-group">
                        <label> New order email first part : </label>
                        <textarea type="text" class="form-control" name="description3">{{$email->description3}}</textarea>
                    </div><!--End Form Group-->
                </div><!--End Col-md-6-->
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="form-group">
                        <label> New order email second part : </label>
                        <textarea type="text" class="form-control" name="description4">{{$email->description4}}</textarea>
                    </div><!--End Form Group-->
                </div><!--End Col-md-6-->
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="form-group">
                        <label> New order email third part : </label>
                        <textarea type="text" class="form-control" name="description5">{{$email->description5}}</textarea>
                    </div><!--End Form Group-->
                </div><!--End Col-md-6-->
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