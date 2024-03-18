@extends('site.layouts.master')
@section('content')
    <!-- Start Section
            ====================================-->
    <section class="page-head">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <h3> about us </h3>
                    <ul class="breadcrumb">
                        <li>
                            <a href="{{route('site.index')}}">
                                <i class="fa fa-home"></i>
                                Home
                            </a>
                        </li>
                        <li class="active"> About us </li>
                    </ul>
                </div>
            </div><!--End row-->
        </div><!--End Container-->
    </section><!--End Section-->
    <!-- Start Section
    ====================================-->
    <section class="about">
        <div class="container">
            <div class="row">
                <div class="col wow fadeInUp">
                    <div class="section-title">
                        about our founder
                    </div>
                </div>
                <div class="w-100"></div>
                <div class="col-lg-5 about-img wow fadeInLeft">
                    <img src="{{asset('storage/app/about/'.$about->image)}}">
                </div>
                <div class="col-lg-7 about-content wow fadeInRight">
                    @foreach(explode("\n" , $about->description1) as $item)
                        <p>{{$item}}</p>
                    @endforeach
                </div>
            </div><!--End row-->
            <div class="h-15"></div>
            <div class="row">
                <div class="col-lg-12 about-content no-pad wow fadeInUp">
                    <h3>About Nutritribe</h3>
                    @foreach(explode("\n" , $about->description2) as $item)
                        <p>{{$item}}</p>
                    @endforeach
                    <h3>OUR promise</h3>
                    <p>{{$about->promise}}</p>
                </div>
            </div>
        </div><!--End Container-->
    </section>
    <section class="testimonial-sec">
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
@endsection