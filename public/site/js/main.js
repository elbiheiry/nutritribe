/* Search 
=============================*/
$(document).ready(function () {
    "use strict";
    $(".menu-btn").click(function (){
       $(this).toggleClass("change-icon"); 
    });
});

/*  Slider
=============================*/
$(document).ready(function () {
    "use strict";
    var swiper = new Swiper('.swiper-container', {
        speed: 900 ,
        pagination: {
            el: '.swiper-pagination'
        },
        loop: true,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev'
        }
    });

    var swiper = new Swiper('.testimonial', {
        speed: 900 ,
        pagination: {
            el: '.swiper-pagination'
        },
        loop: true
    });
    var swiper = new Swiper('.banners-slid', {
        speed: 900 ,
        pagination: {
             el: '.swiper-pagination',
            clickable: true
            
        },
        loop: true
    });
});

/* Top
=============================*/
$(document).ready(function () {
    "use strict";
    var scrollbutton = $(".up-btn");
    $(window).scroll(function () {
        $(this).scrollTop() >= 500 ? scrollbutton.show() : scrollbutton.hide();
    });
    scrollbutton.click(function () {
        $("html,body").animate({
            scrollTop: 0
        }, 600);
    });
});


/* Select
============================*/
$(document).ready(function () {
    "use strict";
    $(".select").select2();
});

/*Number Slider
==========================*/
$(document).ready(function () {
    'use strict';
    $(document).on('click','.number-up', function () {
        var $value = ($(this).closest('.cat-number').find('input[type="text"]').val());
        $(this).closest('.cat-number').find('input[type="text"]').val(parseFloat($value) + 1).attr('value', parseFloat($value) + 1);
        return false;
    });
    $(document).on('click' ,'.number-down', function () {
        var $value = ($(this).closest('.cat-number').find('input[type="text"]').val());
        if ($value > 1) {
            $(this).closest('.cat-number').find('input[type="text"]').val(parseFloat($value) - 1).attr('value', parseFloat($value) - 1);
        }
        return false;
    });
    $('.cat-number').find('input[type="text"]').on('keyup', function () {
        $(this).attr('value', $(this).val());
    });
});
/* Gallery
=================================*/
$(document).ready(function () {
    "use strict";
    $('.popup-gallery').magnificPopup({
        type: 'image',
        removalDelay: 300,
        gallery: {
            enabled: true,
            preload: [0, 2],
            navigateByImgClick: true,
            arrowMarkup: '<button title="%title%" type="button" class="mfp-arrow mfp-arrow-%dir%"></button>',
            tPrev: 'Previous (Left arrow key)',
            tNext: 'Next (Right arrow key)',
            tCounter: '<span class="mfp-counter">%curr% of %total%</span>'
        }
    });
});
/*Loading
==========================*/
$(window).on("load", function () {
    "use strict";
    $(".loader").fadeOut(function () {
        $(this).fadeOut();
        $("body").css({"overflow-y" : "visible"});
    });
});
