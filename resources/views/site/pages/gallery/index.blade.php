@extends('site.layouts.master')
@section('content')
    <!-- Start Section
            ====================================-->
    <section class="page-head">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <h3> Gallery </h3>
                    <ul class="breadcrumb">
                        <li>
                            <a href="{{route('site.index')}}">
                                <i class="fa fa-home"></i>
                                Home
                            </a>
                        </li>
                        <li class="active"> Gallery </li>
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
                <div id="images-area" class="row">
                    @include('site.pages.gallery.templates.image')
                </div>
                <div class="w-100"></div>
                <div class="col-md-12 col-sm-12 text-center">
                    <button class="custom-btn" id="load-more-button" data-last="{{$images->lastPage()}}" data-count="{{$images->currentPage()}}">
                        <span> Load More <i class="fa fa-arrow-right"></i></span>
                    </button>
                </div>
            </div>
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
                    $('#images-area').append(response);

                }
            });
            return false;
        });

    </script>
@endsection