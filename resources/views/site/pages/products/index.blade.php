@extends('site.layouts.master')
@section('content')
    <!-- Start Section
            ====================================-->
    <section class="page-head">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <h3> our packages </h3>
                    <ul class="breadcrumb">
                        <li>
                            <a href="{{route('site.index')}}">
                                <i class="fa fa-home"></i>
                                Home
                            </a>
                        </li>
                        <li class="active"> our packages </li>
                    </ul>
                </div>
            </div><!--End row-->
        </div><!--End Container-->
    </section><!--End Section-->
       <!-- Start Section
        ====================================-->
        <section class="banners">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="swiper-container banners-slid">
                            <div class="swiper-wrapper">
                               <div class="swiper-slide">
                                    <img src="{{asset('public/site/images/banner1.jpg')}}">
                                </div>
                                <div class="swiper-slide">
                                    <img src="{{asset('public/site/images/banner2.jpg')}}">
                                </div>
                                <div class="swiper-slide">
                                    <img src="{{asset('public/site/images/banner3.jpg')}}">
                                </div>
                            </div>
                            <!-- Add Pagination -->
                            <div class="swiper-pagination"></div>
                        </div><!--End Swiper-->
                    </div>
                </div><!--End row-->
            </div><!--End Container-->
        </section><!--End Section-->
    <!-- Start Section
    ====================================-->
    <section>
        <div class="container">
            <div class="row text-center">
                <div class="col">
                    <div class="section-title custom">
                        our packages
                        <div class="categ_filt">
                            <button type="button" class="custom-btn dropdown-toggle" data-toggle="dropdown" data-display="static" aria-haspopup="true" aria-expanded="false">
                                <span> sorted by </span>
                            </button>
                            <div class="dropdown-menu shadow">
                                @foreach(\App\Category::all() as $category)
                                    <a href="{{route('site.categories' , ['slug' => $category->slug])}}"> {{$category->name}} </a>
                                @endforeach
                                <a href="{{route('site.categories' , ['slug' => 'price'])}}"> price </a>
                                <a href="{{route('site.categories' , ['slug' => 'duration'])}}"> duration </a>
                            </div>
                        </div>
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
            </div><!--End row-->
        </div><!--End Container-->
    </section><!--End Section-->
 
@endsection