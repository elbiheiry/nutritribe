@foreach($faqs as $index => $faq)
    <tr>
        <td>{{$index+1}}</td>
        <td>{{$faq->question}}</td>
        <td>
            <button data-url="{{route('admin.faqs.info',['id' => $faq->id])}}"
                    class="icon-btn green-bc btn-modal-view ">
                <i class="fa fa-edit"></i>
            </button>
            <button data-url="{{route('admin.faqs.delete',['id' => $faq->id])}}" class="icon-btn red-bc deleteBTN"
                    data-toggle="modal" data-target="#delete" title="delete">
                <i class="fa fa-trash"></i>
            </button>
        </td>
    </tr>
@endforeach