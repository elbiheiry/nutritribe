<form class="edit-form" action="{{route('admin.gallery.edit',['id' => $image->id])}}" method="post"
      enctype="multipart/form-data">
    <div class="modal-body">
        {!! csrf_field() !!}
        <div class="form-group">
            <img src="{{asset('storage/app/gallery/'.$image->image)}}" class="table-img">
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 alert alert-danger error-div" role="alert" style="display: none;">

        </div>
        <div class="form-group">
            <label>Attach gallery image</label>
            <label class="file">
                <input type="file" id="file" aria-label="File browser example" name="image"
                       class="form-control">
                <span class="file-custom"></span>
            </label>
            <span class="text-danger">Please note that image size must be : 800 * 530</span>
        </div>
        <div class="modal-footer text-center">
            <button type="submit" class="custom-btn green-bc">
                <i class="fa fa-edit"></i> Edit
            </button>
            <button type="button" class="custom-btn" data-dismiss="modal">
                <i class="fa fa-times"></i>close
            </button>
        </div>
    </div>
</form>
