@extends('site.layouts.master')
@section('models')
    <div class="modal fade" id="mess" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content text-center">
                <div class="modal-body mess-text">
                    <i class="fa fa-smile"></i>
                    <div class="head-title">
                        Thank you! Your booking is complete. An email with details of your booking has been sent to you.
                    </div>
                    <a href="{{route('site.index')}}" class="custom-btn">
                        <span>Back To home</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <!-- Start Section
            ====================================-->
    <section class="page-head">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <h3> Booking Details </h3>
                    <ul class="breadcrumb">
                        <li>
                            <a href="{{route('site.index')}}">
                                <i class="fa fa-home"></i>
                                Home
                            </a>
                        </li>
                        <li class="active"> Booking Details</li>
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
                    <form class="booking-form" action="{{route('site.booking.mail' , ['id' => $id])}}" method="post">
                        @csrf
                        <div class="alert alert-danger error-div" role="alert" style="display: none;">

                        </div>
                        <div class="alert alert-success success-div" role="alert" style="display: none;">

                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <input class="form-control" type="text" placeholder="City" name="city">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <input class="form-control" type="text" placeholder="Address" name="address">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <input class="form-control" type="text" placeholder="Phone Number" name="phone">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <input class="form-control" type="text" placeholder="Postcode / ZIP" name="postal">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label> Age </label>
                                    <input type="text" class="form-control" name="age">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label> Weight </label>
                                    <input type="text" class="form-control" name="weight">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label> Height </label>
                                    <input type="text" class="form-control" name="height">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label> Notes </label>
                                    <textarea class="form-control" name="notes"></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label> Waist circumference </label>
                                    <input type="text" class="form-control" name="waist">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label> Body composition </label>
                                    <input type="text" class="form-control" name="body">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label> Reason for seeking Nutritional Therapy </label>
                                    <input type="text" class="form-control" name="reason">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label> History of eating disorders? Yes/No </label>
                                    <div class="radio-wrap">
                                        <input type="radio" id="yes" name="history">
                                        <label for="yes">YES</label>
                                    </div>
                                    <div class="radio-wrap">
                                        <input type="radio" id="no" name="history">
                                        <label for="no">NO</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label> If yes, is it </label>
                                    <div class="radio-wrap">
                                        <input type="radio" id="anorexia" name="why">
                                        <label for="anorexia"> Anorexia </label>
                                    </div>
                                    <div class="radio-wrap">
                                        <input type="radio" id="binge_eating" name="why">
                                        <label for="binge_eating"> Binge eating</label>
                                    </div>
                                    <div class="radio-wrap">
                                        <input type="radio" id="bulimia" name="why">
                                        <label for="bulimia"> Bulimia</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Please list below all of your current medications</label>
                                    <textarea class="form-control" name="medications"></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Please list all the vitamins and supplements you are currently
                                        using:</label>
                                    <textarea class="form-control" name="vitamins"></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Do you exercise?</label>
                                    <div class="radio-wrap">
                                        <input type="radio" id="yese" name="exercise">
                                        <label for="yese">YES</label>
                                    </div>
                                    <div class="radio-wrap">
                                        <input type="radio" id="none" name="exercise">
                                        <label for="none">NO</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>If yes, please specify what kind of exercise</label>
                                    <input type="text" class="form-control" name="kind_of_exercise">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>
                                        Do you usually mostly eat at home (cooked meals) or do you eat out?
                                    </label>
                                    <input type="text" class="form-control" name="home">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>
                                        Do you enjoy cooking and following new recipes?
                                    </label>
                                    <input type="text" class="form-control" name="enjoy">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>
                                        Any recent surgeries in the past three months:
                                    </label>
                                    <input type="text" class="form-control" name="surgeries">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>
                                        If you have any food allergies, please specify
                                        What is your ideal weight?
                                    </label>
                                    <input type="text" class="form-control" name="allergies">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>
                                        Please share your personal Intention for this program
                                    </label>
                                    <textarea class="form-control" name="intention"></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>
                                        Write in details your food diary for the past three days
                                    </label>
                                    <textarea class="form-control" name="diary"></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <button class="custom-btn" type="submit" id="save-button">send details</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div><!--End Container-->
    </section><!--End Section-->
@endsection
@section('js')
    <script>

        $(document).on('submit', '.booking-form', function () {
            var form = $(this);
            var url = form.attr('action');
            var formData = new FormData(form[0]);
            $('#save-button').html(' Please wait');

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
                    $('#save-button').html('send details');

                    setTimeout(function () {
                        $('.success-div').css('display', 'none').html('');
                        window.location.href = "{{route('site.index')}}";
                    }, 3000);
                },
                error: function (jqXHR) {
                    var response = $.parseJSON(jqXHR.responseText);

                    $('.error-div').css('display', 'block').html(response);
                    $('#save-button').html('send details');
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