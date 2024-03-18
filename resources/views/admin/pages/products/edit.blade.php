@extends('admin.layouts.master')
@section('content')
    <div class="page-head">
        Products
        <ul class="breadcrumb">
            <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-home"></i>home</a></li>
            <li class="active">Products</li>
        </ul>
    </div>
    <!-- Page content
    ==========================================-->
    <div class="page-content">
        <form class="row ajax-form" action="{{route('admin.products.edit',['id' => $product->id])}}" method="post">
            {!! csrf_field() !!}
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="form-group">
                    <img src="{{asset('storage/app/products/'.$product->image)}}" width="150px" >
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 alert alert-danger error-div" role="alert" style="display: none;">

            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="form-group">
                    <label>Attach product picture</label>
                    <label class="file">
                        <input type="file" id="file" aria-label="File browser example" name="image"
                               class="form-control">
                        <span class="file-custom"></span>
                    </label>
                    <span class="text-danger">Please note that image size must be : 270 * 180</span>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="form-group">
                    <label>product name</label>
                    <input type="text" class="form-control" name="name" value="{{$product->name}}">
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="form-group">
                    <label>Price in egyptian pound</label>
                    <input type="text" class="form-control" name="egp_price" value="{{$product->egp_price}}">
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="form-group">
                    <label>Price in united states dollar</label>
                    <input type="text" class="form-control" name="usd_price" value="{{$product->usd_price}}">
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="form-group">
                    <label>Price in euro</label>
                    <input type="text" class="form-control" name="eur_price" value="{{$product->eur_price}}">
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="form-group">
                    <label>Price in united arab emirates dirham</label>
                    <input type="text" class="form-control" name="uae_price" value="{{$product->uae_price}}">
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="form-group">
                    <label>product duration (in weeks)</label>
                    <input type="number" class="form-control" name="duration" value="{{$product->duration}}">
                </div>
            </div>


            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="form-group">
                    <label>product description</label>
                    <textarea class="form-control" name="description">{{$product->description}}</textarea>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="form-group">
                    <label>product features</label>
                    <textarea class="form-control" name="features">{{$product->features}}</textarea>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="form-group">
                    <label>product benefits</label>
                    <textarea class="form-control" name="benefits">{{$product->benefits}}</textarea>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="form-group">
                    <label>product requirements</label>
                    <textarea class="form-control" name="requirements">{{$product->requirements}}</textarea>
                </div>
                <span class="text-danger">Note that you can leave this input as null</span>
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