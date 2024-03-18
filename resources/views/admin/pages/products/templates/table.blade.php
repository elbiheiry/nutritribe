@foreach($products as $index => $product)
    <tr>
        <td>{{$index+1}}</td>
        <td>{{$product->name}}</td>
        <td>{{$product->price()}}</td>
        <td>{{$product->comments->count()}}</td>
        <td>
            <a href="{{route('admin.products.comments',['id' => $product->id])}}"
               class="icon-btn blue-bc" title="comments">
                <i class="fa fa-comment"></i>
            </a>
            <a href="{{route('admin.products.info',['id' => $product->id])}}"
               class="icon-btn green-bc" title="edit">
                <i class="fa fa-edit"></i>
            </a>
            <button data-url="{{route('admin.products.delete',['id' => $product->id])}}" class="icon-btn red-bc deleteBTN"
                    data-toggle="modal" data-target="#delete" title="delete">
                <i class="fa fa-trash"></i>
            </button>
        </td>
    </tr>
@endforeach