@extends('site.layouts.master')
@section('content')
    <!-- Start Section
            ====================================-->
    <section class="page-head">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <h3> Register </h3>
                    <ul class="breadcrumb">
                        <li>
                            <a href="{{route('site.index')}}">
                                <i class="fa fa-home"></i>
                                Home
                            </a>
                        </li>
                        <li class="active"> Register</li>
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
                    <form class="login-form wide" method="post" action="{{route('site.register')}}">
                        @csrf
                        <div class="alert alert-danger error-div" role="alert" style="display: none;">

                        </div>
                        <div class="alert alert-success success-div" role="alert" style="display: none;">

                        </div>
                        <div class="form-title text-center"> Create Account</div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label> Name </label>
                                    <input type="text" class="form-control" name="name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label> Username </label>
                                    <input type="text" class="form-control" name="username">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label> Email Address </label>
                                    <input type="email" class="form-control" name="email">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label> Password </label>
                                    <input type="password" class="form-control" name="password">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label> confirm Password </label>
                                    <input type="password" class="form-control" name="password_confirmation">
                                </div>
                            </div>
                        </div>
                        <div class="form-group text-center">
                            <button class="custom-btn" type="submit" id="save-button">
                                <span> register </span>
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
@section('js')
    <script>
        $(document).on('submit', '.login-form', function () {
            var form = $(this);
            var url = form.attr('action');
            var formData = new FormData(form[0]);
            $('#save-button').html('<span>Please wait</span>');

            $.ajax({
                url: url,
                method: 'POST',
                dataType: 'json',
                data: formData,
                contentType: false,
                cache: false,
                processData: false,
                success: function (response) {
                    $('.error-div').css('display', 'none');
                    $('.success-div').css('display', 'block').html(response.data);
                    $('#save-button').html('<span> register </span>');

                    setTimeout(function () {
                        $('.success-div').css('display', 'none').html('');
                        window.location.href = "{{route('site.index')}}";
                    }, 3000);
                },
                error: function (jqXHR) {
                    var response = $.parseJSON(jqXHR.responseText);

                    $('.error-div').css('display', 'block').html(response.data);
                    $('#save-button').html('<span> register </span>');
                }
            });

            $.ajaxSetup({
                headers:
                    {
                        'X-CSRF-Token': $('input[name="_token"]').val()
                    }
            });
            return false;
        });
    </script>
@endsection