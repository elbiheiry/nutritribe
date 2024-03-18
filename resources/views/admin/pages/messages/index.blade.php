@extends('admin.layouts.master')
@section('content')
    <div class="page-head">
        <i class="fa fa-envelope"></i> Messages
        <ul class="breadcrumb">
            <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-home"></i>home</a></li>
            <li class="active">Messages</li>
        </ul>
    </div>
    <!-- Page content
    ==========================================-->
    <div class="page-content ">
        <h4 class="alert-text">You have {{\App\Message::count()}} Message</h4>
        @foreach($messages as $message)
            <div class="item-list gray">
                <a href="{{route('admin.messages.single' ,['id' => $message->id])}}">
                    <img src="{{$message->getAvatar()}}">
                    <div class="item-content">
                        {{$message->email}}
                        <span>
                            <i class="fa fa-clock"></i> {{$message->created_at->diffForHumans()}}
                        </span>
                    </div>
                </a>
                <button class="icon-btn red-bc delete-btn" data-url="{{route('admin.messages.delete',['id' => $message->id])}}">
                    <i class="fa fa-trash"></i>
                </button>
            </div><!--End Item List-->
        @endforeach
        {!! $messages->links() !!}
    </div><!--End Page content-->
@endsection
@section('js')
    <script>
        $('.delete-btn').on('click' ,function () {
            var  url = $(this).data('url');

            window.location.href = url;
        });
    </script>
@endsection