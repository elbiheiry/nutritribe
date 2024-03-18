@extends('site.layouts.master')
@section('content')
    <!-- Start Section
            ====================================-->
    <section class="page-head">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <h3> common concerns </h3>
                    <ul class="breadcrumb">
                        <li>
                            <a href="{{route('site.index')}}">
                                <i class="fa fa-home"></i>
                                Home
                            </a>
                        </li>
                        <li class="active"> common concerns </li>
                    </ul>
                </div>
            </div><!--End row-->
        </div><!--End Container-->
    </section><!--End Section-->
    <!-- Start Section
    ====================================-->
    <section>
        <div class="container">
            <div class="row">
                <div class="col">
                    <div id="accordion">
                        @foreach($questions as $index => $question)
                            <div class="card">
                                <div class="card-header" id="heading{{$question->id}}">
                                    <button class="btn btn-link {{$index != 0 ? 'collapsed' : ''}}" data-toggle="collapse"
                                            data-target="#quest{{$question->id}}"
                                            aria-expanded="{{$index == 0 ? 'true' : 'false'}}" aria-controls="quest{{$question->id}}">
                                        {{$question->question}}
                                    </button>
                                </div>
                                <div id="quest{{$question->id}}" class="collapse {{$index == 0 ? 'show' : ''}}"
                                     aria-labelledby="heading{{$question->id}}"
                                     data-parent="#accordion">
                                    <div class="card-body">
                                        {{$question->answer}}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div><!--End Container-->
    </section><!--End Section-->
@endsection