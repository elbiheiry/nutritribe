@foreach($testimonials as $index => $testimonial)
    <tr>
        <td>{{$index+1}}</td>
        <td>{{$testimonial->name}}</td>
        <td>
            <button data-url="{{route('admin.testimonials.info',['id' => $testimonial->id])}}"
                    class="icon-btn green-bc btn-modal-view ">
                <i class="fa fa-edit"></i>
            </button>
            <button data-url="{{route('admin.testimonials.delete',['id' => $testimonial->id])}}" class="icon-btn red-bc deleteBTN"
                    data-toggle="modal" data-target="#delete" title="delete">
                <i class="fa fa-trash"></i>
            </button>
        </td>
    </tr>
@endforeach