/* Contact Form Script */
(function ($) {
    "use strict";
    /* Login form
     ================*/
    var headLoginForm = {
        initialized: false,
        initialize: function () {
            if (this.initialized)
                return;
            this.initialized = true;
            this.build();
            this.events();
        },
        build: function () {
            this.validations();
        },
        events: function () {
        },
        validations: function () {
            var headLoginForm = $(".login-form"),
                    url = headLoginForm.attr("action");
            headLoginForm.validate({
                submitHandler: function (form) {
                    // Loading State
                    var submitButton = $(this.submitButton);

                    // submitButton.button("جاري");

                    // Ajax Submit
                    $.ajax({
                        method: "POST",
                        url: url,
                        data: $(form).serialize(),
                        dataType: "json",
                        success: function (data) {
                            if (data.response === "success") {
                                $('#headLogActionSuccess').removeClass('d-none').addClass('show');
                                setTimeout(function () {
                                    $('#headLogActionSuccess').fadeOut().addClass('d-none');
                                }, 3000);
                            } else if (data.response === "error") {
                                $('#headLogActionError').removeClass('d-none').addClass('show');
                                setTimeout(function () {
                                    $('#headLogActionError').fadeOut().addClass('d-none');
                                }, 3000);
                            }
                            if (data.response === "success") {
                                location.reload();
                            }
                        },
                        complete: function () {
                            submitButton.button("reset");
                        }
                    });
                },
                rules: {
                    email: {
                        required: true
                    },
                    password: {
                        required: true
                    }
                },
                messages: {
                    email: {
                        required: 'Please enter your email'
                    },
                    password: {
                        required: 'Please enter your password'
                    }
                },
                highlight: function (element) {
                    $(element)
                            .parent()
                            .removeClass("has-success")
                            .addClass("has-error");
                    if (typeof $.fn.isotope !== 'undefined') {
                        $('.filter-elements').isotope('layout');
                    }
                },
                success: function (element) {
                    $(element)
                            .parent()
                            .removeClass("has-error")
                            .addClass("has-success")
                            .find("label.error")
                            .remove();
                }
            });
            $.ajaxSetup(
                    {
                        headers:
                                {
                                    'X-CSRF-Token': $('input[name="_token"]').val()
                                }
                    });
        }
    };
    headLoginForm.initialize();
})(jQuery);
