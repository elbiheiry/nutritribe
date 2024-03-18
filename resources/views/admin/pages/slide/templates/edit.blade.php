<form class="edit-form" action="{{route('admin.slide.edit',['id' => $slide->id])}}" method="post"
      enctype="multipart/form-data">
    <div class="modal-body">
        {!! csrf_field() !!}
        <div class="form-group">
            <img src="{{asset('storage/app/slide/'.$slide->image)}}" class="table-img">
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 alert alert-danger error-div" role="alert" style="display: none;">

        </div>
        <div class="form-group">
            <label>Attach slide picture</label>
            <label class="file">
                <input type="file" id="file" aria-label="File browser example" name="image"
                       class="form-control">
                <span class="file-custom"></span>
            </label>
            <span class="text-danger">Please note that image size must be : 495 * 400</span>
        </div>
        <div class="form-group">
            <label>slide name</label>
            <input type="text" class="form-control" name="name" value="{{$slide->name}}">
        </div>
        <div class="form-group">
            <label>slide description</label>
            <textarea class="form-control" name="description">{{$slide->description}}</textarea>
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
