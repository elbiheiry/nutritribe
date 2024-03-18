<?php

namespace App\Http\Controllers\Site;

use App\About;
use App\Http\Controllers\Controller;
use App\Testimonial;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    //
    public function getIndex()
    {
        $about = About::first();
        $testimonials = Testimonial::all();

        return view('site.pages.about.index' ,compact('about' , 'testimonials'));
    }
}
