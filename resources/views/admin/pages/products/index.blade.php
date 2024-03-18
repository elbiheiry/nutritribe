@extends('admin.layouts.master')
@section('models')
    <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form class="modal-content text-center" id="delete-form">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">delete product</h5>
                </div>
                <div class="modal-footer text-center">
                    <button type="submit" class="custom-btn red-bc">
                        <i class="fa fa-trash"></i> delete
                    </button>
                    <button type="button" class="custom-btn" data-dismiss="modal">
                        <i class="fa fa-times"></i>close
                    </button>
                </div>
            </form>
        </div>
    </div>
    <div id="common-modal" class="modal fade" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content text-center">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit product</h5>
                </div>
                <div class="modal-data">

                </div>
            </div>
        </div>
    </div>
@endsection
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
        <form class="row ajax-form" action="{{route('admin.products',['id' => $id])}}" method="post">
            {!! csrf_field() !!}
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
                    <input type="text" class="form-control" name="name">
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="form-group">
                    <label>Price in egyptian pound</label>
                    <input type="text" class="form-control" name="egp_price">
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="form-group">
                    <label>Price in united states dollar</label>
                    <input type="text" class="form-control" name="usd_price">
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="form-group">
                    <label>Price in euro</label>
                    <input type="text" class="form-control" name="eur_price">
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="form-group">
                    <label>Price in united arab emirates dirham</label>
                    <input type="text" class="form-control" name="uae_price">
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="form-group">
                    <label>product duration (in weeks)</label>
                    <input type="number" class="form-control" name="duration">
                </div>
            </div>

            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="form-group">
                    <label>product description</label>
                    <textarea class="form-control" name="description"></textarea>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="form-group">
                    <label>product features</label>
                    <textarea class="form-control" name="features"></textarea>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="form-group">
                    <label>product benefits</label>
                    <textarea class="form-control" name="benefits"></textarea>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="form-group">
                    <label>product requirements</label>
                    <textarea class="form-control" name="requirements"></textarea>
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
        <div class="col-md-12 col-lg-12 col-sm-12">
            <hr>
        </div>
        <div class="table-responsive-lg-lg" style="position: relative;">
            <div class="load-spinner" style="display: none;">
                <i class="fa fa-spinner fa-spin"></i>
            </div>
            <div class="spacer-15"></div>
            <table class="table table-bordered" id="datatable" style="width:100%">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>No. of comments</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                    @include('admin.pages.products.templates.table')
                </tbody>
            </table>
        </div>
    </div><!--End Row-->
@endsection