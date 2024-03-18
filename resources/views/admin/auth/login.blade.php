<html lang="en">
    <head>
        <!-- Meta Tags
        ======================-->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="keywords" content="">
        <meta name="copyright" content="">

        <!-- Title Name
        ================================-->
        <title>Brandbourne</title>

        <!-- Fave Icons
        ================================-->
        <link rel="shortcut icon" href="{{asset('public/admin/images/fav-icon.png')}}">

        <!-- Css Base And Vendor
        ===================================-->
        <link rel="stylesheet" href="{{asset('public/admin/vendor/bootstrap/bootstrap.min.css')}}">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
        <link rel="stylesheet" href="{{asset('public/admin/vendor/datepicker/jquery.datetimepicker.min.css')}}">
        <link rel="stylesheet" href="{{asset('public/admin/vendor/select/select-min.css')}}">

        <!-- Site Css
        ====================================-->
        <link rel="stylesheet" href="{{asset('public/admin/css/style.css')}}">

        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="login-wrap">
        <form class="center-height login-form" action="{{ route('admin.login') }}" method="post">
            {!! csrf_field() !!}

            <div class="form-title">
                <i class="fa fa-lock"></i>
                Sign in To Your Account
            </div>
            <div class="form-group error-div" style="display: none; text-align: center">
                <span>
                    <i id="error-data" style="color: #d11f19; font-size: 16px;"></i>
                </span>
            </div>
            <div class="form-group">
                <label>Emaill Address </label>
                <input type="text" class="form-control" name="email" placeholder="Email Address">
            </div>
            <div class="form-group">
                <label>Password </label>
                <input type="password" class="form-control" name="password" placeholder="Password">
            </div>
            <div class="form-group text-center">
                <button type="submit" class="custom-btn">
                    <span id="save-button"> Login</span>
                </button>
            </div><!--End Form cont-->
        </form><!--End Form-->
        <div class="loader">
            <div class="spinner">
                <div class="dot1"></div>
                <div class="dot2"></div>
            </div>
        </div>
        <!-- JS Base And Vendor
        ==========================================-->
        <script src="{{asset('public/admin/vendor/jquery/jquery.js')}}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="{{asset('public/admin/vendor/bootstrap/bootstrap.min.js')}}"></script>
        <script src="{{asset('public/admin/vendor/datepicker/jquery.datetimepicker.full.min.js')}}"></script>
        <script src="{{asset('public/admin/vendor/select/select2.min.js')}}"></script>
        <script src="{{asset('public/admin/vendor/datatable/datatables.min.js')}}"></script>
        <script src="{{asset('public/admin/vendor/count-to/jquery.countTo.js')}}"></script>
        <script src="{{asset('public/admin/vendor/counterdown/countdown.js')}}"></script>
        <script src="{{asset('public/admin/js/main.js')}}"></script>

        <!-- authentication validation -->
        <script>
            $('.login-form').on('submit' , function () {
                var form = $(this),
                    url = $(this).attr('action'),
                    method = $(this).attr('method');
                $('#save-button').attr('disabled' , true).html('<i class=" fas fa-spinner fa-spin"></i> Please wait');
                $.ajax({
                    url : url,
                    method : method,
                    data : form.serialize(),
                    dataType : 'json',
                    success : function (response) {
                        window.location.reload();
                    },
                    error: function (jqXHR) {
                        var response = $.parseJSON(jqXHR.responseText);

                        $('.error-div').css('display' , 'block');
                        $('#error-data').html(response.data);
                        $('#save-button').removeAttr('disabled').html('Login');

                        setTimeout( function () {
                            $('.error-div').css('display' ,'none');
                            $('#error-data').html('');
                        }, 3000);
                    }
                });
                return false;
            });
        </script>
    </body>
</html>