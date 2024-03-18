@extends('site.layouts.master')
@section('content')
    <!-- Start Section
            ====================================-->
    <section class="page-head">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <h3> {{$blog->title}} </h3>
                    <ul class="breadcrumb">
                        <li>
                            <a href="{{route('site.index')}}">
                                <i class="fa fa-home"></i>
                                Home
                            </a>
                        </li>
                        <li class="active"> {{$blog->title}} </li>
                    </ul>
                </div>
            </div><!--End row-->
        </div><!--End Container-->
    </section><!--End Section-->
    <!-- Start Section
    ====================================-->
    <section class="section-color blog-sec">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="blog">
                        <div class="title">
                            {{$blog->title}}
                        </div>
                        <ul class="blog-info">
                            <li>
                                <i class="fa fa-calendar"></i> {{$blog->created_at->format('d M Y')}}
                            </li>
                            <li>
                                <i class="fa fa-comment"></i> {{$blog->comments()->count()}} comment
                            </li>
                            <li>
                                <i class="fa fa-share-alt"></i> <span id="share-counter">{{$blog->share}}</span> share
                            </li>
                        </ul>
                        <img src="{{asset('storage/app/blog/'.$blog->image)}}">
                        {!! $blog->description !!}
                        <div class="w-100">
                            <hr>
                        </div>
                        <h3> Comments </h3>
                        <ul class="reviews">
                            @foreach($blog->comments as $comment)
                                <li class="review-item">
                                    <h3>{{$comment->user->name}} </h3>
                                    <p>{{$comment->comment}}</p>
                                </li><!--End one-review-->
                            @endforeach
                        </ul><!--End reviews-->
                        <form class="add-rate ajax-form" id="add-rate" method="post"
                              action="{{route('site.blog.comment' ,['id' => $blog->id])}}">
                            @csrf
                            <div class="alert alert-danger error-div" role="alert" style="display: none;">

                            </div>
                            <div class="alert alert-success success-div" role="alert" style="display: none;">

                            </div>
                            <div class="row">
                                <div class="col-md-12 form-group">
                                    <label>Add comment</label>
                                </div>
                                <div class="col-md-12 form-group">
                                    <textarea class="form-control" placeholder="Comment" name="comment"></textarea>
                                </div>
                                <div class="col-md-12">
                                    <button class="custom-btn" type="submit">
                                        <span>Add Comment <i class="fa fa-arrow-right"></i></span>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div><!--End Blog-->
                <div class="col-lg-3">
                    <div class="side-blog">
                        <h3> Tags </h3>
                        <ul class="tags">
                            @foreach(explode("," , $blog->tags) as $tag)
                                <li> #{{$tag}}</li>
                            @endforeach
                        </ul>
                        <div class="share">
                            {{--<script async src="https://static.addtoany.com/menu/page.js"></script>--}}
                            <script type='text/javascript' src='https://platform-api.sharethis.com/js/sharethis.js#property=5eef71a10e78e50012568182&product=inline-share-buttons&cms=website' async='async'></script>
                            <!-- AddToAny END -->
                            <span>Share Via :</span>
                            <ul class="social  ">
                                <div class="sharethis-inline-share-buttons"></div>
                                {{--<li class="facebook">--}}
                                    {{--<a class="icon-btn a2a_button_facebook"><i class="fab fa-facebook"></i></a>--}}
                                {{--</li>--}}
                                {{--<li class="twitter">--}}
                                    {{--<a class="icon-btn a2a_button_twitter"><i class="fab fa-twitter"></i></a>--}}
                                {{--</li>--}}
                                {{--<li class="instagram">--}}
                                    {{--<a class="icon-btn a2a_button_pinterest"><i class="fab fa-pinterest"></i></a>--}}
                                {{--</li>--}}
                            </ul>
                        </div>
                    </div>
                </div>
            </div><!--End row-->
        </div><!--End Container-->
    </section><!--End Section-->
    <!-- Start Section
    ====================================-->
    <section>
        <div class="container">
            <div class="row text-center">
                <div class="col wow fadeInUp">
                    <div class="section-title">
                        Related blog
                    </div>
                </div>
                <div class="w-100"></div>
                @foreach($relates as $relate)
                    <div class="col-lg-4 col-md-6 wow fadeInUp">
                        <div class="blog-item">
                            <div class="blog-img">
                                <div class="date">
                                    {{$relate->created_at->format('d M')}}
                                </div>
                                <img src="{{asset('storage/app/blog/thumbnail/'.$relate->image)}}">
                                <ul class="tags">
                                    @foreach(explode("," , $relate->tags) as $tag)
                                        <li> #{{$tag}}</li>
                                    @endforeach
                                </ul>
                            </div><!--End blog Img-->
                            <div class="blog-cont">
                                <a href="{{route('site.blog.single' ,['slug' => $relate->slug])}}"
                                   class="title"> {{$relate->title}}</a>
                                <p>{!! strip_tags($relate->description ,75) !!}</p>
                                <ul class="info">
                                    <li><i class="fa fa-comment"></i> {{$relate->comments->count()}} comment</li>
                                    <li><i class="fa fa-share-alt"></i> {{$relate->share}} share</li>
                                </ul>
                            </div><!--End Blog Cont-->
                        </div><!--End Blog Item-->
                    </div><!--End col-->
                @endforeach
            </div><!--End row-->
        </div><!--End Container-->
    </section><!--End Section-->
@endsection
@section('js')
    <script>
        $(document).on('submit', '.ajax-form', function () {
            var form = $(this);
            var url = form.attr('action');
            var formData = new FormData(form[0]);
            $('#save-button').html('<i class=" fas fa-spinner fa-spin"></i> Please wait');

            $.ajax({
                url: url,
                method: 'POST',
                dataType: 'json',
                data: formData,
                contentType: false,
                cache: false,
                processData: false,
                success: function (response) {
                    $('.error-div').css('display', 'none');
                    $('.success-div').css('display', 'block').html(response);
                    $('#save-button').html('Send message <i class="fa fa-arrow-right"></i>');

                    setTimeout(function () {
                        $('.success-div').css('display', 'none').html('');
                        window.location.reload()
                    }, 3000);
                },
                error: function (jqXHR) {
                    var response = $.parseJSON(jqXHR.responseText);

                    $('.error-div').css('display', 'block').html(response);
                    $('#save-button').html('Send message <i class="fa fa-arrow-right"></i>');
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

        $(document).on('click','.st-remove-label', function () {
            var url = "{{route('site.blog.share' , ['id' => $blog->id])}}";

            $.ajax({
                url : url,
                method : 'POST',
                datatType : 'json',
                data: {_token : $('input[name="_token"]').val()},
                success : function (response) {
                    $('#share-counter').html(response);
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
    </script>
@endsection