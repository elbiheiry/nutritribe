@foreach($images as $index => $image)
    <tr>
        <td>{{$index+1}}</td>
        <td><img src="{{asset('storage/app/gallery/'.$image->image)}}" class="table-img"></td>
        <td>
            <button data-url="{{route('admin.gallery.info',['id' => $image->id])}}"
                    class="icon-btn green-bc btn-modal-view ">
                <i class="fa fa-edit"></i>
            </button>
            <button data-url="{{route('admin.gallery.delete',['id' => $image->id])}}" class="icon-btn red-bc deleteBTN"
                    data-toggle="modal" data-target="#delete" title="delete">
                <i class="fa fa-trash"></i>
            </button>
        </td>
    </tr>
@endforeach