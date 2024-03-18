<?php

namespace App\Http\Controllers\Admin;

use App\About;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AboutRequest;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    //
    public function getIndex()
    {
        $about = About::first();

        return view('admin.pages.about.index' ,compact('about'));
    }

    public function postEdit(AboutRequest $request)
    {
        $request->edit();

        return response()->json(['status' => 'success'] , 200);
    }
}
