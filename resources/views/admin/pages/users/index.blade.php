@extends('admin.layouts.master')
@section('content')
    <div class="page-head">
        <i class="fa fa-envelope"></i> users
        <ul class="breadcrumb">
            <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-home"></i>home</a></li>
            <li class="active">users</li>
        </ul>
    </div>
    <!-- Page content
    ==========================================-->
    <div class="page-content ">
        <h4 class="alert-text">You have {{\App\User::count()}} user</h4>
        @foreach($users as $user)
            <div class="item-list gray">
                <div class="item-content">
                    {{$user->email}}
                    <span>
                        <i class="fa fa-user"></i> Name : {{$user->name}}
                    </span>
                    <span>
                        <i class="fa fa-clock"></i> {{$user->created_at->diffForHumans()}}
                    </span>
                </div>
                @if($user->email != 'selshimi@gmail.com')
                <button class="icon-btn red-bc delete-btn" data-url="{{route('admin.users.delete',['id' => $user->id])}}">
                    <i class="fa fa-trash"></i>
                </button>
                @endif
            </div><!--End Item List-->
        @endforeach
        {!! $users->links() !!}
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