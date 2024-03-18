@extends('site.layouts.master')
@section('content')
    <!-- Start Section
            ====================================-->
    <section class="page-head">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <h3> {{$product->name}} </h3>
                    <ul class="breadcrumb">
                        <li>
                            <a href="{{route('site.index')}}">
                                <i class="fa fa-home"></i>
                                Home
                            </a>
                        </li>
                        <li class="active"> {{$product->name}} </li>
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
                <div class="col-lg-4">
                    <div class="side-img">
                        <img src="{{asset('storage/app/products/'.$product->image)}}">
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="package-details">
                        <h3> {{$product->name}} </h3>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="info"> Price : {{$product->price()}}</div>
                            </div>
                            <div class="col-md-6">
                                <div class="info"> Category : {{$product->category->name}} </div>
                            </div>
                            <div class="col-md-6">
                                <div class="info"> Duration : {{$product->duration}} weeks</div>
                            </div>
                        </div>
                        <div class="action">
                            <div class="cat-number">
                                <a href="#" class="number-down">
                                    <i class="fa fa-angle-down"></i>
                                </a>
                                <input value="1" class="form-control" type="text" name="quantity">
                                <a href="#" class="number-up">
                                    <i class="fa fa-angle-up"></i>
                                </a>
                            </div>
                            <button type="button" class="custom-btn add-to-cart" data-url="{{route('site.cart.add' , ['id' => $product->id])}}">
                                <span>
                                    <i class="fa fa-shopping-bag"></i>
                                    add to cart
                                </span>
                            </button>
                        </div>
                        <div class="share">
                            <span>Share Via :</span>
                            <script async src="https://static.addtoany.com/menu/page.js"></script>
                            <ul class="social a2a_kit a2a_kit_size_32">
                                <li class="facebook">
                                    <a class="icon-btn a2a_button_facebook"><i class="fab fa-facebook"></i></a>
                                </li>
                                <li class="twitter">
                                    <a class="icon-btn a2a_button_twitter"><i class="fab fa-twitter"></i></a>
                                </li>
                                <li class="instagram">
                                    <a class="icon-btn a2a_button_whatsapp"><i class="fab fa-whatsapp"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="package-sub-details">
                        <ul class="tabs nav nav-pills" id="pills-tab" role="tablist">
                            <li>
                                <a class="nav-link active" data-toggle="pill" href="#tab1">
                                    Description
                                </a>
                            </li>
                            <li>
                                <a class="nav-link" data-toggle="pill" href="#tab2">
                                    Comments
                                </a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="tab1" role="tabpanel">
                                @foreach(explode("\n" , $product->description) as $item)
                                    <p>
                                        {{$item}}
                                    </p>
                                @endforeach
                                @if($product->features)
                                    <h4>Features :</h4>
                                    <ul class="dot-list">
                                        @foreach(explode("\n" , $product->features) as $item)
                                            <li>
                                                {{$item}}
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif
                                @if($product->benefits)
                                    <h4> Benefits : </h4>
                                    <ul class="dot-list">
                                        @foreach(explode("\n" , $product->benefits) as $item)
                                            <li>
                                                {{$item}}
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif
                                @if($product->requirements)
                                    <h4> Requirements : </h4>
                                    <ul class="dot-list">
                                        @foreach(explode("\n" , $product->requirements) as $item)
                                            <li>
                                                {{$item}}
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif
                            </div>
                            <div class="tab-pane fade" id="tab2" role="tabpanel">
                                <div class="row">
                                    <div class="col-lg-7">
                                        <ul class="reviews">
                                            @foreach($product->comments as $comment)
                                                <li class="review-item">
                                                    <h3> {{$comment->user['name']}} </h3>
                                                    <p>{{$comment->comment}}</p>
                                                </li><!--End one-review-->
                                            @endforeach
                                        </ul><!--End reviews-->
                                    </div>
                                    <div class="col-lg-5">
                                        <form class="add-rate ajax-form" id="add-rate" method="post"
                                              action="{{route('site.package.comment' ,['id' => $product->id])}}">
                                            @csrf
                                            <div class="alert alert-danger error-div" role="alert"
                                                 style="display: none;">

                                            </div>
                                            <div class="alert alert-success success-div" role="alert"
                                                 style="display: none;">

                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 form-group">
                                                    <label>Add comment</label>
                                                </div>
                                                <div class="col-md-12 form-group">
                                                    <textarea class="form-control" placeholder="Comment"
                                                              name="comment"></textarea>
                                                </div>
                                                <div class="col-md-12">
                                                    <button class="custom-btn" type="submit">
                                                        <span>Add Comment <i class="fa fa-arrow-right"></i></span>
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--End row-->
        </div><!--End Container-->
    </section><!--End Section-->

    <!-- Start Section
    ====================================-->
    <section class="section-color">
        <div class="container">
            <div class="row text-center">
                <div class="col">
                    <div class="section-title">
                        Related Packages
                    </div>
                </div>
                <div class="w-100"></div>

                @foreach($relates as $relate)
                    <div class="col-lg-3 col-md-6 wow fadeInUp">
                        <div class="package-item">
                            
                            <div class="cover">
                                <img src="{{asset('storage/app/products/'.$relate->image)}}">
                                <button data-url="{{route('site.package.info' ,['slug' => $relate->slug])}}" type="button" class="btn-modal-view custom-btn">
                                        <span>
                                        <i class="fa fa-eye"></i> quick view
                                        </span>
                                    </button>
                            </div><!--End Cover-->
                            <div class="cont">
                                <span> {{$relate->category->name}} </span>
                                <a href="{{route('site.package' ,['slug' => $relate->slug])}}" class="title">
                                    {{$relate->name}}
                                </a>
                                <p>
                                    {{$relate->price()}}
                                </p>
                                <p class="dur">
                                    Duration : {{$relate->duration}} weeks
                                </p>
                                <button class="custom-btn add-to-cart" data-url="{{route('site.cart.add' , ['id' => $relate->id])}}">
                                    <span>
                                        <i class="fa fa-shopping-bag"></i>
                                        add to cart
                                    </span>
                                </button>
                                 <a href="{{route('site.package' ,['slug' => $relate->slug])}}" class="custom-btn">
                                        <span>
                                        more details <i class="fa fa-angle-right"></i>
                                        </span>
                                    </a>
                                    <button data-url="{{route('site.package.info' ,['slug' => $relate->slug])}}" type="button" class="btn-modal-view custom-btn quick-view-mob">
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