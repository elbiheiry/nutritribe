<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SliderRequest;
use App\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    //
    public function getIndex()
    {
        $slides = Slider::orderBy('id' , 'DESC')->get();

        return view('admin.pages.slide.index' ,compact('slides'));
    }

    public function getInfo($id)
    {
        $slide = Slider::find($id);

        return view('admin.pages.slide.templates.edit'  ,compact('slide'));
    }

    public function postIndex(SliderRequest $request)
    {
        $request->store();

        return response()->json(['status' => 'success'] , 200);
    }

    public function postEdit(SliderRequest $request , $id)
    {
        $request->edit($id);

        return response()->json(['status' => 'success'],200);
    }

    public function getDelete($id)
    {
        $slide = Slider::find($id);

        $slide->delete();

        return redirect()->back();
    }
}
