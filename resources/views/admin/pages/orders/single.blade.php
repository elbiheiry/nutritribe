@extends('admin.layouts.master')
@section('content')
    <div class="page-head">
        orders
        <ul class="breadcrumb">
            <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-home"></i>home</a></li>
            <li class="active">orders</li>
        </ul>
    </div>
    <!-- Page content
    ==========================================-->
    <div class="page-content">
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label> Name </label>
                    <blockquote>{{$order->name}}</blockquote>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label> Email </label>
                    <blockquote>{{$order->email}}</blockquote>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label> City </label>
                    <blockquote>{{$order->city}}</blockquote>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label> Address </label>
                    <blockquote>{{$order->address}}</blockquote>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label> Phone </label>
                    <blockquote>{{$order->phone}}</blockquote>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label> Postal code </label>
                    <blockquote>{{$order->postal}}</blockquote>
                </div>
            </div>
        </div>
        @isset($order->details)
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label> Weight </label>
                        <blockquote>{{$details->weight}}</blockquote>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label> Height </label>
                        <blockquote>{{$details->height}}</blockquote>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label> Notes </label>
                        <blockquote>{{$details->notes}}</blockquote>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label> Waist circumference </label>
                        <blockquote>{{$details->waist}}</blockquote>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label> Body composition </label>
                        <blockquote>{{$details->body}}</blockquote>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label> Reason for seeking Nutritional Therapy </label>
                        <blockquote>{{$details->reason}}</blockquote>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label> History of eating disorders? Yes/No </label>
                        <blockquote>{{$details->history}}</blockquote>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label> If yes, is it </label>
                        <blockquote>{{$details->why}}</blockquote>

                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Please list below all of your current medications</label>
                        <blockquote>{{$details->medications}}</blockquote>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Please list all the vitamins and supplements you are currently
                            using:</label>
                        <blockquote>{{$details->vitamins}}</blockquote>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Do you exercise?</label>
                        <blockquote>{{$details->exercise}}</blockquote>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>If yes, please specify what kind of exercise</label>
                        <blockquote>{{$details->kind_of_exercise}}</blockquote>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>
                            Do you usually mostly eat at home (cooked meals) or do you eat out?
                        </label>
                        <blockquote>{{$details->home}}</blockquote>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>
                            Do you enjoy cooking and following new recipes?
                        </label>
                        <blockquote>{{$details->enjoy}}</blockquote>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>
                            Any recent surgeries in the past three months:
                        </label>
                        <blockquote>{{$details->surgeries}}</blockquote>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>
                            If you have any food allergies, please specify
                            What is your ideal weight?
                        </label>
                        <blockquote>{{$details->allergies}}</blockquote>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>
                            Please share your personal Intention for this program
                        </label>
                        <blockquote>{{$details->intention}}</blockquote>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>
                            Write in details your food diary for the past three days
                        </label>
                        <blockquote>{{$details->diary}}</blockquote>
                    </div>
                </div>
            </div>
        @endisset
        <div class="spacer-15"></div>
        <table class="table table-bordered" id="datatable" style="width:100%">
            <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Price</th>
                <th>Quantity</th>
            </tr>
            </thead>
            <tbody>
            @foreach($items as $index => $item)
                <tr>
                    <td>{{$index+1}}</td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->price}}</td>
                    <td>{{$item->quantity}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection