@extends('admin.layouts.master')
@section('models')
    <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form class="modal-content text-center" id="delete-form">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">delete appointment</h5>
                </div>
                <div class="modal-footer text-center">
                    <button type="submit" class="custom-btn red-bc">
                        <i class="fa fa-trash"></i> delete
                    </button>
                    <button type="button" class="custom-btn" data-dismiss="modal">
                        <i class="fa fa-times"></i>close
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('content')
    <div class="page-head">
        Bookings
        <ul class="breadcrumb">
            <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-home"></i>home</a></li>
            <li class="active">Bookings</li>
        </ul>
    </div>
    <!-- Page content
    ==========================================-->
    <div class="page-content">
        <div class="table-responsive-lg-lg" style="position: relative;">
            <div class="load-spinner" style="display: none;">
                <i class="fa fa-spinner fa-spin"></i>
            </div>
            <div class="spacer-15"></div>
            <table class="table table-bordered" id="datatable" style="width:100%">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Category</th>
                    <th>Service</th>
                    <th>Employee</th>
                    <th>Available date</th>
                    <th>Start</th>
                    <th>End</th>
                </tr>
                </thead>
                <tbody>
                @foreach($bookings as $index => $booking)
                    <tr>
                        <td>{{$index+1}}</td>
                        <td>{{$booking->user->name}}</td>
                        <td>{{$booking->user->email}}</td>
                        <td>{{$booking->category_id}}</td>
                        <td>{{$booking->product['name']}}</td>
                        <td>{{$booking->employee}}</td>
                        <td>{{$booking->available_date}}</td>
                        <td>{{$booking->start}}</td>
                        <td>{{$booking->end}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {!! $bookings->links() !!}
        </div>
    </div><!--End Row-->
@endsection