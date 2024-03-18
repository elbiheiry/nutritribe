@foreach($slides as $index => $slide)
    <tr>
        <td>{{$index+1}}</td>
        <td>{{$slide->name}}</td>
        <td>
            <button data-url="{{route('admin.slide.info',['id' => $slide->id])}}"
                    class="icon-btn green-bc btn-modal-view ">
                <i class="fa fa-edit"></i>
            </button>
            <button data-url="{{route('admin.slide.delete',['id' => $slide->id])}}" class="icon-btn red-bc deleteBTN"
                    data-toggle="modal" data-target="#delete" title="delete">
                <i class="fa fa-trash"></i>
            </button>
        </td>
    </tr>
@endforeach