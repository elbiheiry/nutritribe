@extends('admin.layouts.master')
@section('content')
    <div class="page-head">
        <i class="fa fa-envelope"></i> Subscribers
        <ul class="breadcrumb">
            <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-home"></i>home</a></li>
            <li class="active">Subscribers</li>
        </ul>
    </div>
    <!-- Page content
    ==========================================-->
    <div class="page-content ">
        <h4 class="alert-text">You have {{\App\Subscriber::count()}} Subscriber</h4>
        @foreach($subscribers as $subscriber)
            <div class="item-list gray">
                <div class="item-content">
                    {{$subscriber->email}}
                    <span>
                        <i class="fa fa-user"></i> {{$subscriber->name}}
                    </span>
                    <span>
                        <i class="fa fa-clock"></i> {{$subscriber->created_at->diffForHumans()}}
                    </span>
                </div>
                <button class="icon-btn red-bc delete-btn" data-url="{{route('admin.subscribers.delete',['id' => $subscriber->id])}}">
                    <i class="fa fa-trash"></i>
                </button>
            </div><!--End Item List-->
        @endforeach
        {!! $subscribers->links() !!}
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