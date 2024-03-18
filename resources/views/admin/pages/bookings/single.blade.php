@extends('admin.layouts.master')
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
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label> Category </label>
                    <blockquote>{{$booking->category_id}}</blockquote>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label> Select service </label>
                    <blockquote>{{$booking->product['name']}}</blockquote>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label> Employee </label>
                    <blockquote>{{$booking->employee}}</blockquote>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group date">
                    <label>I'm available on or after</label>
                    <blockquote>{{$booking->available_date}}</blockquote>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group date">
                    <label>One time session</label>
                    <blockquote>{{$booking->one_time}}</blockquote>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group date">
                    <label> Start from </label>
                    <blockquote>{{$booking->start}}</blockquote>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group date">
                    <label> Finish at </label>
                    <blockquote>{{$booking->end}}</blockquote>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label> Name </label>
                    <blockquote>{{$booking->name}}</blockquote>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label> Phone Number </label>
                    <blockquote>{{$booking->phone}}</blockquote>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label> Email Address </label>
                    <blockquote>{{$booking->email}}</blockquote>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label> Age </label>
                    <blockquote>{{$booking->age}}</blockquote>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label> Weight </label>
                    <blockquote>{{$booking->weight}}</blockquote>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label> Height </label>
                    <blockquote>{{$booking->height}}</blockquote>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label> Notes </label>
                    <blockquote>{{$booking->notes}}</blockquote>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label> Waist circumference </label>
                    <blockquote>{{$booking->waist}}</blockquote>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label> Body composition </label>
                    <blockquote>{{$booking->body}}</blockquote>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label> Reason for seeking Nutritional Therapy </label>
                    <blockquote>{{$booking->reason}}</blockquote>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label> History of eating disorders? Yes/No </label>
                    <blockquote>{{$booking->history}}</blockquote>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label> If yes, is it </label>
                    <blockquote>{{$booking->why}}</blockquote>

                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Please list below all of your current medications</label>
                    <blockquote>{{$booking->medications}}</blockquote>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Please list all the vitamins and supplements you are currently
                        using:</label>
                    <blockquote>{{$booking->vitamins}}</blockquote>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Do you exercise?</label>
                    <blockquote>{{$booking->exercise}}</blockquote>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>If yes, please specify what kind of exercise</label>
                    <blockquote>{{$booking->kind_of_exercise}}</blockquote>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>
                        Do you usually mostly eat at home (cooked meals) or do you eat out?
                    </label>
                    <blockquote>{{$booking->home}}</blockquote>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>
                        Do you enjoy cooking and following new recipes?
                    </label>
                    <blockquote>{{$booking->enjoy}}</blockquote>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>
                        Any recent surgeries in the past three months:
                    </label>
                    <blockquote>{{$booking->surgeries}}</blockquote>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>
                        If you have any food allergies, please specify
                        What is your ideal weight?
                    </label>
                    <blockquote>{{$booking->allergies}}</blockquote>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>
                        Please share your personal Intention for this program
                    </label>
                    <blockquote>{{$booking->intention}}</blockquote>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>
                        Write in details your food diary for the past three days
                    </label>
                    <blockquote>{{$booking->diary}}</blockquote>
                </div>
            </div>
        </div>
    </div>
@endsection