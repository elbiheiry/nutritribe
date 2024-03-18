@extends('site.layouts.master')
@section('content')
    <!-- Start Section
            ====================================-->
    <section class="page-head">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <h3> Request reset password email </h3>
                    <ul class="breadcrumb">
                        <li>
                            <a href="{{route('site.index')}}">
                                <i class="fa fa-home"></i>
                                Home
                            </a>
                        </li>
                        <li class="active">Request reset password email</li>
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
                    <form class="login-form" method="post" action="{{ route('password.email') }}">
                        @csrf
                        @if (session('status'))
                            <div class="alert alert-success" role="alert" style="font-size: 14px;">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="form-title text-center"> FORGOT YOUR PASSWORD? </div>
                        <div class="form-group">
                            <label> Enter your email address and we'll send you a link you can use to pick a new password. </label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" autofocus>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group text-center">
                            <button class="custom-btn" type="submit" id="save-button">
                                <span> Reset </span>
                            </button>
                            <a href="{{route('site.login')}}" class="custom-btn yellow">
                                <span> login </span>
                            </a>
                        </div>
                    </form>
                </div>
            </div><!--End row-->
        </div><!--End Container-->
    </section><!--End Section-->
@endsection