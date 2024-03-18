<!-- Header
        ==========================================-->
<header>
    <div class="container">
        <nav class="navbar navbar-expand-lg">
            <a href="{{route('site.index')}}" class="navbar-brand">
                <img src="{{asset('public/site/images/logo.png')}}">
            </a>
            <div class="header-widget">
                @if(auth()->guest())
                    <a href="{{route('site.login')}}" class="icon-btn">
                        <i class="far fa-user"></i>
                    </a>
                @endif
                <div id="cart-section">
                    @include('site.layouts.cart')
                </div>
                <div class="dropdown">
                    <button class="dropbtn"><i class="fa fa-dollar-sign"></i></button>
                    <div class="dropdown-content">
                        <a href="{{route('site.currency' , ['currency' => 'egp'])}}"> EGP </a>
                        <a href="{{route('site.currency' , ['currency' => 'aed'])}}"> AED </a>
                        <a href="{{route('site.currency' , ['currency' => 'usd'])}}"> USD </a>
                        <a href="{{route('site.currency' , ['currency' => 'eur'])}}"> EUR </a>
                    </div>
                </div>
                <button class="icon-btn menu-btn" type="button" data-toggle="collapse" data-target="#main-nav">
                    <i class="fa fa-bars"></i>
                </button>
            </div>
            <div class="collapse navbar-collapse text-center" id="main-nav">
                <ul class="navbar-nav">
                    <li><a href="{{route('site.index')}}">Home</a></li>
                    
                    <li><a href="{{route('site.about')}}"> about</a></li>
                    <li><a href="{{route('site.categories')}}"> packages </a></li>
                    <li><a href="{{route('site.booking')}}"> book appointment </a></li>
                    <li><a href="{{route('site.blog')}}"> Blogs </a></li>
                    <li><a href="{{route('site.gallery')}}" hidden> Gallery</a></li>
                    <li><a href="{{route('site.faqs')}}">  common concerns </a></li>
                    <li><a href="{{route('site.contact')}}"> contact</a></li>
                </ul>
            </div>
        </nav><!--End Nav-->
    </div><!--End Container fluid-->
</header><!--End header-->