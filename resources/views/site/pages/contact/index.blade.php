@extends('site.layouts.master')
@section('content')
    <!-- Start Section
            ====================================-->
    <section class="page-head">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <h3> Contact us </h3>
                    <ul class="breadcrumb">
                        <li>
                            <a href="{{route('site.index')}}">
                                <i class="fa fa-home"></i>
                                Home
                            </a>
                        </li>
                        <li class="active"> Contact us </li>
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
                <div class="col-lg-7">
                    <form class="contact-form" action="{{route('site.contact')}}" method="post">
                        @csrf
                        <div class="alert alert-danger error-div" role="alert" style="display: none;">

                        </div>
                        <div class="alert alert-success success-div" role="alert" style="display: none;">

                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-title"> Get in touch</div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Name </label>
                                    <input type="text" class="form-control" name="name">
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
                                    <label> Phone number</label>
                                    <input type="text" class="form-control" name="phone">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label> Subject </label>
                                    <input type="text" class="form-control" name="subject">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Message</label>
                                    <textarea class="form-control" name="message"></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <button class="custom-btn" type="submit">
                                    <span> Send message </span>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-5">
                    <div class="contact-info">
                        <div class="form-title"> contact info </div>
                        <ul class="contact">
                            <li>
                                <a  href="tel:{{$settings->phone}}">
                                    <i class="fa fa-phone"></i>
                                    call us
                                </a>
                            </li>
                            <li>
                                <a href="mailto:{{$settings->email}}">
                                    <i class="fa fa-envelope"></i>
                                    {{$settings->email}}
                                </a>
                            </li>
                        </ul>
                        <div class="form-title"> working hour </div>
                        <div class="time">
                            Saturday - Thursday <span> 9:00 AM  -  5:00 PM</span>
                        </div>
                        <div class="time">
                            Friday <span> Off </span>
                        </div>
                    </div>
                </div>
            </div><!--End row-->
        </div><!--End Container-->
    </section><!--End Section-->
@endsection
@section('js')
    <script>
        $(document).on('submit', '.contact-form', function () {
            var form = $(this);
            var url = form.attr('action');
            var formData = new FormData(form[0]);
            $('#save-button').html('<i class=" fas fa-spinner fa-spin"></i> Please wait');

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
                    $('.success-div').css('display', 'block').html(response);
                    $('#save-button').html('Send message <i class="fa fa-arrow-right"></i>');

                    setTimeout(function () {
                        $('.success-div').css('display', 'none').html('');
                        form[0].reset();
                    }, 3000);
                },
                error: function (jqXHR) {
                    var response = $.parseJSON(jqXHR.responseText);

                    $('.error-div').css('display', 'block').html(response);
                    $('#save-button').html('Send message <i class="fa fa-arrow-right"></i>');
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