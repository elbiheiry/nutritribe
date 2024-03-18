<?php

namespace App\Http\Controllers\Site;

use App\Gallery;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    //
    public function getIndex()
    {
        $images = Gallery::orderBy('id' , 'DESC')->paginate(6);

        //load more function
        if (request()->ajax()) {
            $images = Gallery::orderBy('id', 'DESC')->paginate(6, ['*'], 'page', \request()->page);

            return view('site.pages.gallery.templates.image', compact('images'));
        }

        return view('site.pages.gallery.index', compact('images'));
    }
}
