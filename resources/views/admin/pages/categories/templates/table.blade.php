@foreach($categories as $index => $category)
    <tr>
        <td>{{$index+1}}</td>
        <td>{{$category->name}}</td>
        <td>{{$category->products->count()}}</td>
        <td>
            <a href="{{route('admin.products',['id' => $category->id])}}" target="_blank"
                    class="icon-btn blue-bc" title="packages">
                <i class="fa fa-list"></i>
            </a>
            <button data-url="{{route('admin.categories.info',['id' => $category->id])}}"
                    class="icon-btn green-bc btn-modal-view " title="edit">
                <i class="fa fa-edit"></i>
            </button>
            <button data-url="{{route('admin.categories.delete',['id' => $category->id])}}" class="icon-btn red-bc deleteBTN"
                    data-toggle="modal" data-target="#delete" title="delete">
                <i class="fa fa-trash"></i>
            </button>
        </td>
    </tr>
@endforeach