<?php

namespace App\Http\Controllers\Site;

use App\About;
use App\Blog;
use App\Http\Controllers\Controller;
use App\Http\Requests\Site\SubscribeRequest;
use App\Product;
use App\Slider;
use Illuminate\Http\Request;
use App\Testimonial;

class HomeController extends Controller
{
    //
    public function getIndex()
    {
        $slides = Slider::all();
        $products = Product::take(4)->inRandomOrder()->get();
        $blogs = Blog::take(2)->orderBy('id' , 'DESC')->get();
        $about = About::first();
        $testimonials = Testimonial::all();

        return view('site.pages.index' ,compact('slides' ,'products','blogs','about','testimonials'));
    }

    public function postSubscribe(SubscribeRequest $request)
    {
        $request->store();

        return response()->json('Thank you for subscribing in our newsletter' , 200);
    }
    
    public function getZoom()
    {
        return view('site.pages.zoom.index');
    }

    public function getMeeting()
    {
        return view('site.pages.zoom.meeting');
    }
}
