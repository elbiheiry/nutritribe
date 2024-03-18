@foreach($blogs as $index => $blog)
    <tr>
        <td>{{$index+1}}</td>
        <td>{{$blog->title}}</td>
        <td>{{$blog->comments->count()}}</td>
        <td>
            <a href="{{route('admin.blog.comments',['id' => $blog->id])}}"
               class="icon-btn blue-bc" title="comments">
                <i class="fa fa-comment"></i>
            </a>
            <a href="{{route('admin.blog.info',['id' => $blog->id])}}"
               class="icon-btn green-bc" title="edit">
                <i class="fa fa-edit"></i>
            </a>
            <button data-url="{{route('admin.blog.delete',['id' => $blog->id])}}" class="icon-btn red-bc deleteBTN"
                    data-toggle="modal" data-target="#delete" title="delete">
                <i class="fa fa-trash"></i>
            </button>
        </td>
    </tr>
@endforeach