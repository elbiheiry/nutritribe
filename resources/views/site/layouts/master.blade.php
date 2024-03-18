<html lang="en">
    <head>
        <!-- Meta Tags
        ================================-->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="keywords" content="">
        <meta name="copyright" content="">
    
        <!-- Title Name
        ================================-->
        <title>Nutritribe</title>
    
        <!-- Fave Icons
        ================================-->
        <link rel="shortcut icon" href="{{asset('public/site/images/fav-icon.png')}}">
    
        <!-- Css Base And Vendor 
        ===================================-->
        <link rel="stylesheet" href="{{asset('public/site/vendor/bootstrap/bootstrap.min.css')}}">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"
              integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
        <link rel="stylesheet" href="{{asset('public/site/vendor/select/select-min.css')}}">
        <link rel="stylesheet" href="{{asset('public/site/vendor/animation/animate.css')}}">
        <link rel="stylesheet" href="{{asset('public/site/vendor/swiper/swiper.min.css')}}">
        <link rel="stylesheet" href="{{asset('public/site/vendor/popup/magnific-popup.css')}}">
    
    
        <!-- Site Css
        ====================================-->
        <link rel="stylesheet" href="{{asset('public/site/css/style.css')}}">
    
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2">
            <div class="modal-dialog" role="document">
                <div class="modal-content">

                </div><!-- modal-content -->
            </div><!-- modal-dialog -->
        </div><!-- modal -->
        @yield('models')
        @include('site.layouts.header')
        @yield('content')
        @include('site.layouts.footer')
        <!-- Support
        ====================================-->
        <a class="shadow support" href="https://web.whatsapp.com/send?phone=+{{$settings->phone}}/" target="_blank">
            <i class="fab fa-whatsapp"></i>
            Do you have a question?
        </a>
        <a class="shadow support support-mob"  href="https://wa.me/+{{$settings->phone}}" target="_blank">
            <i class="fab fa-whatsapp"></i>
            Do you have a question?
        </a>
        
        @if(!request()->routeIs('site.zoom'))
            @if(auth()->guest() || auth()->user()->email != 'selshimi@gmail.com')
                <a href="javascript:;" class="zoom-btn">
                    <i class="fa fa-video"></i> zoom Meeting
                </a>
            @else    
                <a href="{{route('site.zoom')}}" class="zoom-btn">
                    <i class="fa fa-video"></i> zoom Meeting
                </a>
            @endif
        @endif
        
        <!-- Up Button
        ====================================-->
        <button class="icon-btn up-btn">
            <i class="fa fa-arrow-up"></i>
        </button>
        <!-- Loader
        ====================================-->
        <div class="loader">
            <div class="loader-cont">
                <img src="{{asset('public/site/images/logo.png')}}">
                <div class="spin"></div>
            </div>
        </div>
        <!-- JS Base And Vendor 
        ==========================================-->
        <script src="{{asset('public/site/vendor/jquery/jquery.js')}}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
                integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
                crossorigin="anonymous"></script>
        <script src="{{asset('public/site/vendor/bootstrap/bootstrap.min.js')}}"></script>
        <script src="{{asset('public/site/vendor/select/select2.min.js')}}"></script>
        <script src="{{asset('public/site/vendor/swiper/swiper.min.js')}}"></script>
        <script src="{{asset('public/site/vendor/popup/magnific-popup.js')}}"></script>
        <script src="{{asset('public/site/vendor/animation/wow.min.js')}}"></script>
        <script src="{{asset('public/site/js/main.js')}}"></script>
        <script>
            wow = new WOW(
                {
                    animateClass: 'animated',
                    offset: 80,
                    callback: function (box) {
                        console.log("WOW: animating <" + box.tagName.toLowerCase() + ">")
                    }
                }
            );
            wow.init();

            /***************************************************************************
             * Modal View Modal
             **************************************************************************/

            $(document).on('click', '.btn-modal-view', function () {
                var $this = $(this);
                var url = $this.data('url');
                var originalHtml = $this.html();

                $.ajax({
                    url: url,
                    method: 'GET',
                    success: function (data) {
                        $this.prop('disabled', false).html(originalHtml);
                        $('.modal-content').html(data)
                        $('#myModal2').modal('show');
                    }
                });
            });

            $(document).on('click','.add-to-cart' , function () {
                var url = $(this).data('url');
                var quantity = $('input[name="quantity"]').val();

                $.ajax({
                    url : url,
                    method : 'post',
                    data : {
                        qty : quantity,
                        _token : "{{csrf_token()}}"
                    },
                    dataType : 'json',
                    success : function (response) {
                        $('#cart-section').html(response.html);
                        $('#show-cart').html(response.html2);
                    }
                });
            });

            $(document).on('click' , '.deleteItem' , function () {
                var url = $(this).data('url');

                window.location.href = url;
            })
        </script>
        @yield('js')
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-171152139-1"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            gtag('config', 'UA-171152139-1');
        </script>

    </body>
</html>