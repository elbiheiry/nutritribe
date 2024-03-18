@extends('site.layouts.master')
@section('content')
    <!-- Start Section
            ====================================-->
    <section class="page-head">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <h3> Checkout </h3>
                    <ul class="breadcrumb">
                        <li>
                            <a href="{{route('site.index')}}">
                                <i class="fa fa-home"></i>
                                Home
                            </a>
                        </li>
                        <li class="active"> Checkout</li>
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
                    <div class="alert alert-danger error-div" role="alert" style="display: none;">
                    </div>
                    <div class="alert alert-success success-div" role="alert" style="display: none;">
                    </div>
                    @csrf
                </div><!--End Col-md-7 col-sm-12-->
                <div class="w-100"></div>
                <div class="col-lg-7 col-md-6">
                    <div class="order">
                        <div class="form-title">
                            YOUR ORDER
                        </div>
                        <ul class="bill-content">
                            @foreach($items as $item)
                                <li>
                                    {{$item->name}} ({{$item->quantity}})
                                    <span> {{$item->associatedModel->price()}} </span>
                                </li>
                            @endforeach
                        </ul>
                        <ul class="bill-count">
                            @php
                                $sum = 0;
                                $currency = session()->get('currency');
                                if ($currency == 'usd'){
                                    foreach ($items as $item) {
                                        $sum += $item->associatedModel->usd_price * $item->quantity;
                                    }

                                    $sum = $sum .' Usd';
                                }elseif ($currency == 'eur'){
                                    foreach ($items as $item) {
                                        $sum += $item->associatedModel->eur_price * $item->quantity;
                                    }

                                    $sum = $sum .' Eur';
                                }elseif ($currency == 'aed'){
                                    foreach ($items as $item) {
                                        $sum += $item->associatedModel->uae_price * $item->quantity;
                                    }

                                    $sum = $sum .' Aed';
                                }else{
                                    foreach ($items as $item) {
                                        $sum += $item->associatedModel->egp_price * $item->quantity;
                                    }

                                    $sum = $sum .' Egp';
                                }
                            @endphp
                            <li>
                                ORDER TOTAL :
                                <span> {{$sum}} </span>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-5 col-md-6">
                    <div id="paypal-button-container"></div>
                </div>
            </div><!--End row-->
        </div><!--End Container-->
    </section><!--End Section-->
@endsection
@section('js')
    <script src="https://www.paypal.com/sdk/js?client-id=AdkAas-0Dd4U-MXkDFaJMi3ifDRK1SZqfMsNQR2-P-nDCDW_AYX5uKKagd7_T3nHFu9DeQcrnMdPYvb3&currency=USD&components=buttons&debug=true"></script>
    <script>
        paypal.Buttons({
            createOrder: function (data, actions) {
                // This function sets up the details of the transaction, including the amount and line item details.
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: "{{\Cart::getTotal()}}"
                        }
                    }]
                });
            },
            onApprove: function (data, actions) {
                // This function captures the funds from the transaction.
                return actions.order.capture().then(function (details) {
                    $(document).on('submit', '.checkout_form', function () {
                        var form = $(this);
                        var url = form.attr('action');
            
                        $.ajax({
                            url: url,
                            method: 'POST',
                            dataType: 'json',
                            data: {_token : $('input[name="_token"]').val() , name : details.payer.name.given_name , email : details.payer.email_address},
                            success: function (response) {
                                $('.error-div').css('display', 'none');
                                $('.success-div').html('Transaction completed by ' + details.payer.name.given_name + ' ,please check your email to fill all your data').css('display', 'block');
            
                                setTimeout(function () {
                                    $('.success-div').css('display', 'none').html('');
                                    window.location.href = "{{route('site.index')}}";
                                }, 3000);
                                
                            },
                            error: function (jqXHR) {
                                var response = $.parseJSON(jqXHR.responseText);
            
                                $('.error-div').css('display', 'block').html(response);
                                $('#save-button').html('<span>Submit</span>');
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
                });
            },
            onError: function (err) {
                $('.error-div').html(err).css('display', 'block');
            }
        }).render('#paypal-button-container');
        // This function displays Smart Payment Buttons on your web page.
    </script>
@endsection