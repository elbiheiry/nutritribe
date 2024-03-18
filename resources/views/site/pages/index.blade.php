@extends('site.layouts.master')
@section('content')
    <!-- Start Page Content
        ====================================-->
    <div class="page-content">
        <!-- Start Section
        ====================================-->
        <section class="main-section">
            <div class="container-fluid">
                <div class="row">
                    <div class="col">
                        <div class="swiper-container">
                            <div class="swiper-wrapper">
                                @foreach($slides as $slide)
                                    <div class="swiper-slide">
                                        <div class="caption">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <h3> {{$slide->name}} </h3>
                                                    <p>{{$slide->description}}</p>
                                                    <a href="{{route('site.categories')}}" class="custom-btn">
                                                        try now <i class="fa fa-arrow-right"></i>
                                                    </a>
                                                </div>
                                                <div class="col-lg-6">
                                                    <img src="{{asset('storage/app/slide/'.$slide->image)}}">
                                                </div>
                                            </div>
                                        </div>
                                    </div><!--End Slide-->
                                @endforeach
                            </div>
                            <!-- Add Pagination -->
                            <div class="swiper-pagination"></div>
                            <!-- Add Arrows -->
                            <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div>
                        </div><!--End Swiper-->
                    </div><!--End col-->
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
                            Featured package
                        </div>
                    </div>
                    <div class="w-100"></div>
                    @foreach($products as $product)
                        <div class="col-lg-3 col-md-6 wow fadeInUp">
                            <div class="package-item">
                                <div class="cover">
                                    <img src="{{asset('storage/app/products/'.$product->image)}}">
                                    <button data-url="{{route('site.package.info' ,['slug' => $product->slug])}}" type="button" class="btn-modal-view custom-btn">
                                        <span>
                                        <i class="fa fa-eye"></i> quick view
                                        </span>
                                    </button>
                                </div><!--End Cover-->
                                <div class="cont">
                                    <span> {{$product->category->name}} </span>
                                    <a href="{{route('site.package' ,['slug' => $product->slug])}}" class="title">
                                        {{$product->name}}
                                    </a>
                                    <p>
                                        {{$product->price()}}
                                    </p>
                                     <p class="dur">
                                    Duration : {{$product->duration}} weeks
                                </p>
                                    <button class="custom-btn add-to-cart" data-url="{{route('site.cart.add' , ['id' => $product->id])}}">
                                    <span>
                                        <i class="fa fa-shopping-bag"></i>
                                        add to cart
                                    </span>
                                    </button>
                                    <a href="{{route('site.package' ,['slug' => $product->slug])}}" class="custom-btn">
                                        <span>
                                        more details <i class="fa fa-angle-right"></i>
                                        </span>
                                    </a>
                                    <button data-url="{{route('site.package.info' ,['slug' => $product->slug])}}" type="button" class="btn-modal-view custom-btn quick-view-mob">
                                        <span>
                                        <i class="fa fa-eye"></i> quick view
                                        </span>
                                    </button>
                                </div><!--End Cont-->
                            </div><!--End Package Item-->
                        </div><!--End Col-->
                    @endforeach

                    <div class="w-100"></div>
                    <div class="col text-center wow fadeInUp">
                        <a href="{{route('site.categories')}}" class="custom-btn">
                            <span>
                                load more <i class="fa fa-arrow-right"></i>
                            </span>
                        </a>
                    </div><!--End Col-->
                </div><!--End row-->
            </div><!--End Container-->
        </section><!--End Section-->
        <!-- Start Section
        ====================================-->
        <section class="booking_sec">
            <div class="container-fluid">
                <div class="row text-center">
                    <div class="col">
                        <h3 class="wow fadeInUp"> book appointment </h3>
                        <p class="wow fadeInUp">It is Time to Balance Your Life & Nourish Your Soul! </p>
                        <a href="{{route('site.booking')}}" class="custom-btn wow fadeInUp">
                            <span>
                                book Now <i class="fa fa-arrow-right"></i>
                            </span>
                        </a>
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
                            Latest News
                        </div>
                    </div>
                    <div class="w-100"></div>
                    @foreach($blogs as $blog)
                        <div class="col-lg-4 col-md-6 wow fadeInUp">
                            <div class="blog-item">
                                <div class="blog-img">
                                    <div class="date">
                                        {{$blog->created_at->format('d M')}}
                                    </div>
                                    <img src="{{asset('storage/app/blog/thumbnail/'.$blog->image)}}">
                                    <ul class="tags">
                                        @foreach(explode("," , $blog->tags) as $tag)
                                        <li> #{{$tag}}</li>
                                        @endforeach
                                    </ul>
                                </div><!--End blog Img-->
                                <div class="blog-cont">
                                    <a href="{{route('site.blog.single' ,['slug' => $blog->slug])}}"
                                       class="title"> {{$blog->title}}</a>
                                    <p>{!! strip_tags(\Str::limit($blog->description ,100)) !!}</p>
                                    <ul class="info">
                                        <li><i class="fa fa-comment"></i> {{$blog->comments->count()}} comment</li>
                                        <li><i class="fa fa-share-alt"></i> {{$blog->share}} share</li>
                                    </ul>
                                </div><!--End Blog Cont-->
                            </div><!--End Blog Item-->
                        </div><!--End col-->
                    @endforeach
                    <div class="col-lg-4 col-md-6 wow fadeInUp">
                        <div class="subscribe_form">
                            <div class="form-title">
                                subscribe to get latest news and offers
                            </div>
                            <form id="subscribe-form" method="post" action="{{route('site.subscribe')}}">
                                @csrf
                                <div class="alert alert-danger error-div" role="alert" style="display: none;">

                                </div>
                                <div class="alert alert-success success-div" role="alert" style="display: none;">

                                </div>
                                <div class="form-group">
                                    <label> Full Name </label>
                                    <input type="text" class="form-control" name="name">
                                </div>
                                <div class="form-group">
                                    <label> Email Address</label>
                                    <input type="email" class="form-control" name="email">
                                </div>
                                <button class="custom-btn" type="submit">
                                    <span id="save-button">
                                        Subscribe
                                        <i class="fa fa-arrow-right"></i>
                                    </span>
                                </button>
                            </form>
                        </div>
                    </div>
                </div><!--End row-->
            </div><!--End Container-->
        </section><!--End Section-->
        <!-- Start Section
        ====================================-->
        <section class="offer">
            <div class="container-fluid">
                <div class="row">
                    <a class="wow fadeInUp" href="">
                        <img src="{{asset('public/site/images/offer.jpg')}}">
                    </a>
                </div><!--End row-->
            </div><!--End Container-->
        </section><!--End Section-->
         <section>
            <div class="container">
                <div class="row">
                    <div class="col wow fadeInUp">
                        <div class="section-title wide-width">
                            what our clients are saying
                        </div>
                    </div>
                    <div class="w-100"></div>
                    <div class="col">
                        <div class="swiper-container testimonial">
                            <div class="swiper-wrapper">
                                @foreach($testimonials as $testimonial)
                                    <div class="swiper-slide">
                                        <div class="testimonial-item">
                                            <img src="{{asset('public/site/images/logo.png')}}">
                                            <p>{{$testimonial->description}}</p>
                                            <span>{{$testimonial->name}} </span>
                                        </div>
                                    </div><!--End Slide-->
                                @endforeach
                            </div>
                            <!-- Add Pagination -->
                            <div class="swiper-pagination"></div>
                            <!-- Add Arrows -->
                            <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div>
                        </div><!--End Swiper-->
                    </div>
                </div>
            </div>
        </section>
    </div><!--End Page Content-->
@endsection
@section('js')
    <script>
        $(document).on('submit', '#subscribe-form', function () {
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
                    $('.success-div').css('display', 'block').html(response);
                    $('#save-button').html('Subscribe <i class="fa fa-arrow-right"></i>');

                    setTimeout(function () {
                        $('.success-div').css('display', 'none').html('');
                        form[0].reset();
                    }, 3000);
                },
                error: function (jqXHR) {
                    var response = $.parseJSON(jqXHR.responseText);

                    $('.error-div').css('display', 'block').html(response);
                    $('#save-button').html('Subscribe <i class="fa fa-arrow-right"></i>');

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
    </script>
@endsection