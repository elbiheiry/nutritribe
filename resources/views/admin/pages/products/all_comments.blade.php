@extends('admin.layouts.master')
@section('models')
    <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form class="modal-content text-center" id="delete-form">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">delete comment</h5>
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
        comments
        <ul class="breadcrumb">
            <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-home"></i>home</a></li>
            <li class="active">comments</li>
        </ul>
    </div>
    <!-- Page content
    ==========================================-->
    <div class="page-content">
        <div id="accordion">
            @foreach($products as $index => $product)
                <div class="card">
                    <div class="card-header" id="heading{{$product->id}}">
                        <button class="btn btn-link {{$index != 0 ? 'collapsed' : ''}}" data-toggle="collapse"
                                data-target="#quest{{$product->id}}"
                                aria-expanded="{{$index == 0 ? 'true' : 'false'}}"
                                aria-controls="quest{{$product->id}}">
                            {{$product->name}}
                        </button>
                    </div>
                    <div id="quest{{$product->id}}" class="collapse {{$index == 0 ? 'show' : ''}}"
                         aria-labelledby="heading{{$product->id}}"
                         data-parent="#accordion">
                        <div class="card-body">
                            <div class="table-responsive-lg-lg" style="position: relative;">
                                <div class="spacer-15"></div>
                                <table class="table table-bordered" style="width:100%">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Comment</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($product->comments()->take(5)->orderBy('id' , 'desc')->get() as $index => $comment)
                                        <tr>
                                            <td>{{$index+1}}</td>
                                            <td>{{$comment->user['name']}}</td>
                                            <td>{{$comment->user['email']}}</td>
                                            <td>{{$comment->comment}}</td>
                                            <td>
                                                <button data-url="{{route('admin.products.comments.delete',['id' => $comment->id])}}"
                                                        class="icon-btn red-bc deleteBTN"
                                                        data-toggle="modal" data-target="#delete" title="delete">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div><!--End Row-->
@endsection