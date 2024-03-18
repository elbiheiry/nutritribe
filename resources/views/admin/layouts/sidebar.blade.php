<!-- Side Menu
        ==========================================-->
<aside class="side-menu">
    <a href="{{route('admin.dashboard')}}" class="logo">
        <img src="{{asset('public/admin/images/logo.png')}}">
    </a>
    <ul>
        <li class="{{request()->route()->getName() == 'admin.dashboard' ? 'active' : ''}}">
            <a href="{{route('admin.dashboard')}}">
                Dashboard
            </a>
        </li>
        <li class="{{request()->route()->getName() == 'admin.settings' ? 'active' : ''}}">
            <a href="{{route('admin.settings')}}">
                Site settings
            </a>
        </li>
        <li class="{{request()->route()->getName() == 'admin.slide' ? 'active' : ''}}">
            <a href="{{route('admin.slide')}}">
                Slideshow
            </a>
        </li>
        <li class="{{request()->route()->getName() == 'admin.about' ? 'active' : ''}}">
            <a href="{{route('admin.about')}}">
                About us
            </a>
        </li>
        <li class="{{request()->route()->getName() == 'admin.testimonials' ? 'active' : ''}}">
            <a href="{{route('admin.testimonials')}}">
                Testimonials
            </a>
        </li>
        <li class="{{request()->route()->getName() == 'admin.gallery' ? 'active' : ''}}">
            <a href="{{route('admin.gallery')}}">
                Gallery
            </a>
        </li>
        <li class="{{request()->route()->getName() == 'admin.faqs' ? 'active' : ''}}">
            <a href="{{route('admin.faqs')}}">
                Faq
            </a>
        </li>
        <li class="{{request()->route()->getName() == 'admin.categories' ? 'active' : ''}}">
            <a href="{{route('admin.categories')}}">
                categories
            </a>
        </li>
        <li class="{{request()->route()->getName() == 'admin.blog' ? 'active' : ''}}">
            <a href="{{route('admin.blog')}}">
                blog
            </a>
        </li>
        <li class="@if(request()->route()->getName() == 'admin.appointments'){{'active'}}@endif">
            <a href="{{route('admin.appointments')}}">
                Bookings
            </a>
        </li>
        <li class="@if(request()->route()->getName() == 'admin.orders'){{'active'}}@endif">
            <a href="{{route('admin.orders')}}">
                Orders
            </a>
        </li>
        <li class="{{request()->route()->getName() == 'admin.templates' ? 'active' : ''}}">
            <a href="{{route('admin.templates')}}">
                Email templates
            </a>
        </li>
    </ul><!--End Ul-->
</aside><!--End side-menu-->