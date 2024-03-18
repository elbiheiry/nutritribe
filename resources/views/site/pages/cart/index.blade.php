@extends('site.layouts.master')
@section('content')
    <!-- Start Section
            ====================================-->
    <section class="page-head">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <h3> Cart </h3>
                    <ul class="breadcrumb">
                        <li>
                            <a href="{{route('site.index')}}">
                                <i class="fa fa-home"></i>
                                Home
                            </a>
                        </li>
                        <li class="active"> cart</li>
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
                    <div class="cart-content" id="show-cart">
                        @include('site.pages.cart.templates.cart')
                    </div>

                </div>
            </div><!--End row-->
        </div><!--End Container-->
    </section><!--End Section-->
@endsection
@section('js')
    <script>
        $('.delete-cart-button').on('click' , function () {
            var url = $(this).data('url');

            window.location.href = url;
        });

        $(document).on('click','.number-down' , function () {
            var url = ($(this).closest('.cat-number').find('input[type="text"]').data('url'));
            var quantity = -1;

            $.ajax({
                url : url,
                method : 'post',
                data : {
                    qty : quantity,
                    _token : "{{csrf_token()}}"
                },
                dataType : 'json',
                success : function (response) {
                    $('#show-cart').html(response.html2);
                }
            });
        });

        $(document).on('click','.number-up' , function () {
            var url = ($(this).closest('.cat-number').find('input[type="text"]').data('url'));
            var quantity = 1;

            $.ajax({
                url : url,
                method : 'post',
                data : {
                    qty : quantity,
                    _token : "{{csrf_token()}}"
                },
                dataType : 'json',
                success : function (response) {
                    $('#show-cart').html(response.html2);
                }
            });
        });
    </script>
@endsection