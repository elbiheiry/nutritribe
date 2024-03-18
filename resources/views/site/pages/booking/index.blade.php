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
                    <h3> Book Appointment </h3>
                    <ul class="breadcrumb">
                        <li>
                            <a href="{{route('site.index')}}">
                                <i class="fa fa-home"></i>
                                Home
                            </a>
                        </li>
                        <li class="active"> Book Appointment</li>
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
                    <form class="booking-form" method="post" action="{{route('site.booking')}}">
                        @csrf
                        <div class="alert alert-danger error-div" role="alert" style="display: none;">

                        </div>
                        <div class="alert alert-success success-div" role="alert" style="display: none;">

                        </div>
                        <div class="row">
                            <div class="col-lg-4 col-md-6">
                                <div class="form-group">
                                    <label> Category </label>
                                    <select class="select" name="category_id">
                                        <option value="All">All</option>
                                        @foreach($categories as $category)
                                            <option value="{{$category->name}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="form-group">
                                    <label> Select service </label>
                                    <select class="select" name="product_id">
                                        @foreach($categories as $category)
                                            <optgroup label="{{$category->name}}">
                                                @foreach($category->products()->where('show_in_booking' , 1)->get() as $product)
                                                    <option value="{{$product->id}}">{{$product->name}}</option>
                                                @endforeach
                                            </optgroup>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="form-group">
                                    <label> One time session :  </label>
                                    <div class="radio-wrap">
                                        <input type="radio" id="yes" name="one_time" value="yes">
                                        <label for="yes">YES</label>
                                    </div>
                                    <div class="radio-wrap">
                                        <input type="radio" id="no" name="one_time" value="no">
                                        <label for="no">NO</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="form-group">
                                    <label> Employee </label>
                                    <select class="select" name="employee">
                                        <option value="Any">Any</option>
                                        <option value="Dr Sherine El Shimi">Dr Sherine El Shimi</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="form-group">
                                    <label>I'm available on or after</label>
                                      <input id="datepicker" width="276"  name="date_time_picker">
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="form-group date">
                                    <label> Time </label>
                                   <input type="time" class="timepicker form-control" name="start">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <button class="custom-btn"><span id="save-button">book now</span></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div><!--End Container-->
    </section><!--End Section-->
@endsection

@section('js')
 <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
  <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
  
        <script src="{{asset('public/site/vendor/timepicker.min.js')}}"></script>
    <script>
        $(document).on('submit', '.booking-form', function () {
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
                    $('#save-button').html('book now');

                    setTimeout(function () {
                        $('.success-div').css('display', 'none').html('');
                        window.location.reload();
                    }, 3000);
                },
                error: function (jqXHR) {
                    var response = $.parseJSON(jqXHR.responseText);

                    $('.error-div').css('display', 'block').html(response);
                    $('#save-button').html('book now');
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

        /* Date Picker =============================*/
        // $(document).ready(function () {
        //     "use strict";
        //     $('.input-group.date').datepicker({
        //         todayBtn: "linked",
        //         daysOfWeekDisabled: "{{$settings->off_days}}",
        //         todayHighlight: true,
        //         autoclose: true
        //     });

        //     $('#timepicker1').timepicker({
        //         timeFormat: 'h:mm p',
        //         interval: 60,
        //         minTime: "{{$settings->start_time}}",
        //         maxTime: "{{$settings->end_time}}",
        //         defaultTime: '10:00am',
        //         startTime: '10:00',
        //         dynamic: false,
        //         dropdown: true,
        //         scrollbar: true
        //     });
        // });

    </script>
    <script>
        $('#datepicker').datepicker({
            uiLibrary: 'bootstrap4' ,
            disableDaysOfWeek: {{$days}}
        });
        $('.timepicker').qcTimepicker({
            'format': 'H:mm',
            'minTime': "{{$settings->start_time}}",
            'maxTime': "{{$settings->end_time}}",
            'step': 3600 ,
            'placeholder': 'select Time '
        });
    </script>
@endsection