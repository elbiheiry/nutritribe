@extends('site.layouts.master')
@section('content')
    <!-- Start Section
            ====================================-->
    <section class="page-head">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <h3> blog </h3>
                    <ul class="breadcrumb">
                        <li>
                            <a href="{{route('site.index')}}">
                                <i class="fa fa-home"></i>
                                Home
                            </a>
                        </li>
                        <li class="active"> blog </li>
                    </ul>
                </div>
            </div><!--End row-->
        </div><!--End Container-->
    </section><!--End Section-->
    <!-- Start Section
    ====================================-->
    <section>
        <div class="container">
            <div class="row text-center">
                <div id="blog-area" class="row">
                    @include('site.pages.blog.templates.blog')
                </div>
                <div class="w-100"></div>
                <button class="custom-btn" id="load-more-button" data-last="{{$blogs->lastPage()}}" data-count="{{$blogs->currentPage()}}">
                    <span> Load More <i class="fa fa-arrow-right"></i></span>
                </button>
            </div><!--End row-->
        </div><!--End Container-->
    </section><!--End Section-->
@endsection
@section('js')
    <script>
        $(document).on('click' ,'#load-more-button',function () {

            var button = $(this);
            var url = "{{url()->current()}}";
            var last_page = parseInt($(this).attr('data-last'));
            var counter = parseInt($(this).attr('data-count')) + 1;

            $.ajax({
                url : url,
                method: 'GET',
                data: {page : counter,_token : $('input[name="_token"]').val()},
                success : function (response) {
                    button.attr('data-count' , counter);
                    if (counter+1 > last_page){
                        button.css('display' , 'none');
                    }
                    $('#blog-area').append(response);

                }
            });
            return false;
        });

    </script>
@endsection