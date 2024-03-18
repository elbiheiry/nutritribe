@extends('admin.layouts.master')
@section('content')
    <div class="page-head">
        blogs
        <ul class="breadcrumb">
            <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-home"></i>home</a></li>
            <li class="active">blogs</li>
        </ul>
    </div>
    <!-- Page content
    ==========================================-->
    <div class="page-content">
        <form class="row ajax-form" action="{{route('admin.blog.edit',['id' => $blog->id])}}" method="post">
            {!! csrf_field() !!}
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="form-group">
                    <img src="{{asset('storage/app/blog/thumbnail/'.$blog->image)}}" width="150px" >
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
                    <span class="text-danger">Please note that image size must be : 775 * 307</span>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="form-group">
                    <label>blog title</label>
                    <input type="text" class="form-control" name="title" value="{{$blog->title}}">
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="form-group">
                    <label>blog tags</label>
                    <textarea class="form-control tags" name="tags">{{$blog->tags}}</textarea>
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="form-group">
                    <label>blog description</label>
                    <textarea class="form-control tiny-editor" name="description">{{$blog->description}}</textarea>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12 col-btn">
                <div class="form-group">
                    <button class="custom-btn" type="submit">
                        <span id="save-button"> <i class="fa fa-save"></i> save</span>
                    </button>
                </div>
            </div><!--End Col-md-6-->
        </form><!--End Form-->
    </div><!--End Row-->
@endsection