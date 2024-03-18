@extends('admin.layouts.master')
@section('content')
    <div class="page-head">
        About us
        <ul class="breadcrumb">
            <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-home"></i>home</a></li>
            <li class="active">About us</li>
        </ul>
    </div>
    <!-- Page content
    ==========================================-->
    <div class="page-content ">
        <div class="row">
            <form class="col-lg-12 col-md-12 col-sm-12 row edit-form" action="{{route('admin.about')}}" method="post">
                {!! csrf_field() !!}
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="form-group">
                        <img src="{{asset('storage/app/about/'.$about->image)}}" width="150px" >
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 alert alert-danger error-div" role="alert" style="display: none;">

                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="form-group">
                        <label>Attach blog picture</label>
                        <label class="file">
                            <input type="file" id="file" aria-label="File browser example" name="image"
                                   class="form-control">
                            <span class="file-custom"></span>
                        </label>
                        <span class="text-danger">Please note that image size must be : 475 * 545</span>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="form-group">
                        <label> First description  : </label>
                        <textarea type="text" class="form-control" name="description1">{{$about->description1}}</textarea>
                    </div><!--End Form Group-->
                </div><!--End Col-md-6-->
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="form-group">
                        <label> second description  : </label>
                        <textarea type="text" class="form-control" name="description2">{{$about->description2}}</textarea>
                    </div><!--End Form Group-->
                </div><!--End Col-md-6-->
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="form-group">
                        <label> Our promise  : </label>
                        <textarea type="text" class="form-control" name="promise">{{$about->promise}}</textarea>
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