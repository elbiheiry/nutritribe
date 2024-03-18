<?php

namespace App\Http\Controllers\Admin;

use App\Gallery;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\GalleryRequest;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    //
    public function getIndex()
    {
        $images = Gallery::orderBy('id' , 'DESC')->get();

        return view('admin.pages.gallery.index' ,compact('images'));
    }

    public function getInfo($id)
    {
        $image = Gallery::find($id);

        return view('admin.pages.gallery.templates.edit'  ,compact('image'));
    }

    public function postIndex(GalleryRequest $request)
    {
        $request->store();

        return response()->json(['status' => 'success'] , 200);
    }

    public function postEdit(GalleryRequest $request , $id)
    {
        $request->edit($id);

        return response()->json(['status' => 'success'],200);
    }

    public function getDelete($id)
    {
        $image = Gallery::find($id);

        $image->delete();

        return redirect()->back();
    }
}
