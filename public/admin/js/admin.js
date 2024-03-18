

var bar = $('.bar');
var percent = $('.percent');

$('.ajax-form').ajaxForm({
    beforeSend: function() {
        
        var percentVal = '0%';
        var posterValue = $('input[name=file]').fieldValue();
        $('.progress-wrap').fadeIn();
        bar.width(percentVal);
        percent.html(percentVal);
        $('.load-spinner').fadeIn();
    },
    uploadProgress: function(event, position, total, percentComplete) {
        var percentVal = percentComplete + '%';
        bar.width(percentVal)
        percent.html(percentVal);
    },
    success: function(response) {
        $('.load-spinner').fadeOut();
        $('.progress-wrap').fadeOut();

        if (response.status === "success") {
            bar.width(0);
            percent.html('0%');

            if (response.html){
                $('.table-responsive-lg-lg tbody').html(response.html);
                $(".ajax-form")[0].reset();
            }
        } else if (response.status === "error") {
            $('#form-messages').modal('show');
            var errors = response.data;
            $('.response-messages').html('');
            $.each(errors, function( index, error ) {
                $('.response-messages').append('<p>'+error+'</p>');
            });
        }

    },
    complete: function(xhr) {
        // status.html(xhr.responseText);
    }
});

//submit edit forms forms
$(document).on('submit',".edit-form",function(e){
    var form = $(this);
    var url = form.attr('action');
    var formData = new FormData(form[0]);

    if ($(document).find('.tiny-editor').length) {
        for (var i = 0; i < tinymce.editors.length; i++) {
            formData.append('desc' + (i + 1), tinymce.editors[i].getContent());
        }
    }
    var percentVal = '0%';
    var posterValue = $('input[name=file]').fieldValue();
    $('.progress-wrap').fadeIn();
    bar.width(percentVal);
    percent.html(percentVal);

    $('.load-spinner').fadeIn();

    $.ajax({
        xhr: function () {
            var xhr = new window.XMLHttpRequest();
            xhr.upload.addEventListener("progress", function (evt) {

                if (evt.lengthComputable) {
                    var percentVal = evt.loaded / evt.total;
                    // var percentComplete = evt.loaded ;
                    // console.log(percentComplete);
                    // $('.progress').css({
                    //     width: percentComplete * 100 + '%'
                    // });
                    bar.width(percentVal*100 + '%');
                    percent.html(percentVal*100 + '%');
                    // if (percentVal === 1) {
                    //     $('.progress-wrap').addClass('hide');
                    // }
                }
            }, false);

            return xhr;
        },
        url : url,
        method : 'POST',
        dataType: 'json',
        data : formData,
        contentType:false,
        cache: false,
        processData:false,
        success : function (response) {
            $('.load-spinner').fadeOut();
            $('.progress-wrap').fadeOut();

            if (response.status === "success") {

                $('#common-modal').modal('hide');

                if (response.html){
                    $('.table-responsive-lg-lg tbody').html(response.html);
                }

            } else if (response.status === "error") {
                $('#common-modal').modal('hide');
                $('#form-messages').modal('show');
                var errors = response.data;
                $('.response-messages').html('');
                $.each(errors, function( index, error ) {
                    $('.response-messages').append('<p>' + error + '</p>');
                });
            }
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

////Delete method
$(document).on('click' ,'.deleteBTN',function () {
    var url = $(this).data('url');

    $('#delete-form').attr('action' , url);
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