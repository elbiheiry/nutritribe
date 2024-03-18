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
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"
              integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
        <link rel="stylesheet" href="{{asset('public/admin/vendor/datepicker/jquery.datetimepicker.min.css')}}">
        <link rel="stylesheet" href="{{asset('public/admin/vendor/select/select-min.css')}}">
        <link rel="stylesheet" href="{{asset('public/admin/vendor/datatable/datatables.min.css')}}">
        <link rel="stylesheet" href="{{asset('public/admin/vendor/tagsinput/css/tagsinput.css')}}">

        <!-- Site Css
        ====================================-->
        <link rel="stylesheet" href="{{asset('public/admin/css/style.css')}}">
        @yield('css')

        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>

        @yield('models')
        @include('admin.layouts.sidebar')
        <!-- Main
                ==========================================-->
        <div class="main">
            @include('admin.layouts.header')

            @yield('content')
        </div><!--End Main-->
        <div class="loader">
            <div class="spinner">
                <div class="dot1"></div>
                <div class="dot2"></div>
            </div>
        </div>
        <!-- JS Base And Vendor
        ==========================================-->
        <script src="{{asset('public/admin/vendor/jquery/jquery.js')}}"></script>
        <script src="{{asset('public/admin/js/jquery.form.js')}}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
                integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
                crossorigin="anonymous"></script>
        <script src="{{asset('public/admin/vendor/bootstrap/bootstrap.min.js')}}"></script>
        <script src="{{asset('public/admin/vendor/datepicker/jquery.datetimepicker.full.min.js')}}"></script>
        <script src="{{asset('public/admin/vendor/select/select2.min.js')}}"></script>
        <script src="{{asset('public/admin/vendor/datatable/datatables.min.js')}}"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>
        <script src="{{asset('public/admin/vendor/count-to/jquery.countTo.js')}}"></script>
        <script src="{{asset('public/admin/vendor/counterdown/countdown.js')}}"></script>
        <script src="{{asset('public/admin/js/main.js')}}"></script>
        <script src="{{asset('public/admin/vendor/tinymce/js/tinymce/tinymce.min.js')}}"></script>
        <script src="{{asset('public/admin/vendor/tagsinput/js/tagsinput.js')}}"></script>
        <script>
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
                        $('.modal-data').html(data)
                        $('#common-modal').modal('show');
                    }
                });
            });
            $(document).on('submit', '.ajax-form', function () {
                var form = $(this);
                var url = form.attr('action');
                var formData = new FormData(form[0]);
                $('#save-button').attr('disabled' , true).html('<i class=" fas fa-spinner fa-spin"></i> Please wait');

                $.ajax({
                    url: url,
                    method: 'POST',
                    dataType: 'json',
                    data: formData,
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function (response) {
                        window.location.reload();
                    },
                    error: function (jqXHR) {
                        var response = $.parseJSON(jqXHR.responseText);

                        $('.error-div').css('display', 'block').html(response.data);
                        $('#save-button').html('<i class="fa fa-save"></i> save');

                        setTimeout(function () {
                            $('.error-div').css('display', 'none').html('');
                        }, 3000);
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
            $(document).on('submit', '.edit-form', function () {
                var form = $(this);
                var url = form.attr('action');
                var formData = new FormData(form[0]);
                $('#edit-button').attr('disabled' , true).html('<i class=" fas fa-spinner fa-spin"></i> Please wait');

                $.ajax({
                    url: url,
                    method: 'POST',
                    dataType: 'json',
                    data: formData,
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function (response) {
                        window.location.reload();
                    },
                    error: function (jqXHR) {
                        var response = $.parseJSON(jqXHR.responseText);

                        $('.error-div').css('display', 'block').html(response.data);
                        $('#edit-button').html('<i class="fa fa-save"></i> save');

                        setTimeout(function () {
                            $('.error-div').css('display', 'none').html('');
                        }, 3000);
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
            $('.deleteBTN').on('click', function () {
                var url = $(this).data('url');

                $('#delete-form').attr('action', url);
            });
            /***************************************************************************
             * identify Tinymce
             **************************************************************************/
            if (typeof tinymce !== "undefined") {
                /*Text area Editors
                 =========================*/

                tinymce.init({
                    selector: '.tiny-editor',
                    height: 350,
                    theme: 'modern',
                    menubar: 'tools',
                    plugins: [
                        'advlist autolink lists link image charmap print preview anchor',
                        'searchreplace visualblocks code fullscreen',
                        'insertdatetime media table contextmenu paste code',
                        'code'
                    ],
                    fontsize_formats: "8pt 10pt 12pt 14pt 18pt 24pt 36pt",
                    toolbar: 'undo redo | code | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image |sizeselect | bold italic | fontselect |  fontsizeselect',
                    // enable title field in the Image dialog
                    image_title: true,
                    // enable automatic uploads of images represented by blob or data URIs
                    automatic_uploads: true,
                    // here we add custom filepicker only to Image dialog
                    file_picker_types: 'image',
                    file_picker_callback: function(cb, value, meta) {
                        var input = document.createElement('input');
                        input.setAttribute('type', 'file');
                        input.setAttribute('accept', 'image/*');

                        // Note: In modern browsers input[type="file"] is functional without
                        // even adding it to the DOM, but that might not be the case in some older
                        // or quirky browsers like IE, so you might want to add it to the DOM
                        // just in case, and visually hide it. And do not forget do remove it
                        // once you do not need it anymore.

                        input.onchange = function() {
                            var file = this.files[0];

                            var reader = new FileReader();
                            reader.onload = function () {
                                // Note: Now we need to register the blob in TinyMCEs image blob
                                // registry. In the next release this part hopefully won't be
                                // necessary, as we are looking to handle it internally.
                                var id = 'blobid' + (new Date()).getTime();
                                var blobCache =  tinymce.activeEditor.editorUpload.blobCache;
                                var base64 = reader.result.split(',')[1];
                                var blobInfo = blobCache.create(id, file, base64);
                                blobCache.add(blobInfo);

                                // call the callback and populate the Title field with the file name
                                cb(blobInfo.blobUri(), { title: file.name });
                            };
                            reader.readAsDataURL(file);
                        };

                        input.click();
                    },
                    content_css: '//www.tinymce.com/css/codepen.min.css'
                });


            }
            $(document).ready(function () {
                "use strict";
                $('.tags').tagsInput({
                    defaultText: ' ',
                    width: 'auto',
                    height: 'auto'
                });
            });
        </script>
        @yield('js')
    </body>
</html>