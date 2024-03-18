@extends('site.layouts.master')
@section('content')
    <!-- Start Section
            ====================================-->
    <section class="page-head">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <h3> Login </h3>
                    <ul class="breadcrumb">
                        <li>
                            <a href="{{route('site.index')}}">
                                <i class="fa fa-home"></i>
                                Home
                            </a>
                        </li>
                        <li class="active"> Login </li>
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
                    <form class="login-form" method="post" action="{{route('site.login')}}">
                        @csrf
                        <div class="alert alert-danger error-div" role="alert" style="display: none;">

                        </div>
                        <div class="alert alert-success success-div" role="alert" style="display: none;">

                        </div>
                        <div class="form-title text-center"> login To your account </div>
                        <div class="form-group">
                            <label> Email Address </label>
                            <input type="email" class="form-control" name="email">
                        </div>
                        <div class="form-group">
                            <label> Password </label>
                            <input type="password" class="form-control" name="password">
                        </div>
                        <div class="form-group text-center">
                            <button class="custom-btn" type="submit" id="save-button">
                                <span> login </span>
                            </button>
                            <a href="{{route('site.register')}}" class="custom-btn yellow">
                                <span> Register </span>
                            </a>
                        </div>
                        <a href="{{route('password.request')}}" class="forget"> forget password ? </a>
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
                    // $('.success-div').css('display', 'block').html(response.data);
                    $('#save-button').html('<span> login </span>');

                    setTimeout(function () {
                        // $('.success-div').css('display', 'none').html('');
                        window.location.reload( )
                    }, 1000);
                },
                error: function (jqXHR) {
                    var response = $.parseJSON(jqXHR.responseText);

                    $('.error-div').css('display', 'block').html(response.data);
                    $('#save-button').html('<span> login </span>');
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