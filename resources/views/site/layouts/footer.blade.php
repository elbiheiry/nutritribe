<!-- Footer
        ====================================-->
<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-5">
                <img src="{{asset('public/site/images/logo.png')}}">
                <p>{{$settings->description}}</p>
            </div><!--End Col-->
            <div class="col-lg-4">
                <span> quick links </span>
                <ul>
                    <div class="row">
                        <div class="col-sm-6">
                            <li><a href="{{route('site.index')}}"> - Home</a></li>
                        </div>
                          <div class="col-sm-6">
                            <li><a href="{{route('site.about')}}"> - about</a></li>
                        </div>
                        <div class="col-sm-6">
                            <li><a href="{{route('site.categories')}}"> - packages </a></li>
                        </div>
                        <div class="col-sm-6">
                            <li><a href="{{route('site.blog')}}"> - Blog</a></li>
                        </div>
                      
                        <div class="col-sm-6">
                            <li><a href="{{route('site.contact')}}"> - contact </a></li>
                        </div>
                        <div class="col-sm-6">
                            <li><a href="{{route('site.faqs')}}"> - common concerns </a></li>
                        </div>
                        <div class="col-sm-6">
                            <li><a href="{{route('site.gallery')}}" hidden> - Gallery </a></li>
                        </div>
                        <div class="col-sm-12">
                            <li><a href="{{route('site.booking')}}"> - book appointment </a></li>
                        </div>
                    </div>
                </ul>
            </div><!--End Col-->
            <div class="col-lg-3">
                <span> Get In Touch </span>
                <ul class="contact">
                    <li>
                        <a href="tel:{{$settings->phone}}">
                            <i class="fa fa-phone"></i>
                            call us
                        </a>
                    </li>
                    <li>
                        <a href="mailto:{{$settings->email}}">
                            <i class="fa fa-envelope"></i>
                            {{$settings->email}}
                        </a>
                    </li>
                </ul>
                <ul class="social">
                    <li>
                        <a class="icon-btn" href="{{$settings->facebook}}" target="_blank">
                            <i class="fab fa-facebook"></i>
                        </a>
                    </li>
                    <li>
                        <a class="icon-btn" href="{{$settings->instagram}}" target="_blank">
                            <i class="fab fa-instagram"></i>
                        </a>
                    </li>
                </ul>
            </div><!--End Col-->
            <div class="w-100">
                <hr>
            </div>
            <div class="col-lg-6">
                <p class="copyrights">
                    Copyright © 2020, NutriTribe, All Rights Reserved.
                </p>
            </div>
            <div class="col-lg-6">
                <img src="{{asset('public/site/images/payment-icon.png')}}" class="payment-img">
            </div>
        </div>
    </div><!--End container-->
</footer>