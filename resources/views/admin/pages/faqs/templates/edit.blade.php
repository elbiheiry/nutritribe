<form class="edit-form" action="{{route('admin.faqs.edit',['id' => $faq->id])}}" method="post"
      enctype="multipart/form-data">
    <div class="modal-body">
        {!! csrf_field() !!}
        <div class="col-lg-12 col-md-12 col-sm-12 alert alert-danger error-div" role="alert" style="display: none;">

        </div>
        <div class="form-group">
            <label>question</label>
            <input type="text" class="form-control" name="question" value="{{$faq->question}}">
        </div>
        <div class="form-group">
            <label>answer</label>
            <textarea class="form-control" name="answer">{{$faq->answer}}</textarea>
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
