<?php

namespace App\Http\Controllers\Admin;

use App\Faq;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\FaqRequest;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    //
    public function getIndex()
    {
        $faqs = Faq::orderBy('id' , 'DESC')->get();

        return view('admin.pages.faqs.index' ,compact('faqs'));
    }

    public function getInfo($id)
    {
        $faq = Faq::find($id);

        return view('admin.pages.faqs.templates.edit'  ,compact('faq'));
    }

    public function postIndex(FaqRequest $request)
    {
        $request->store();

        return response()->json(['status' => 'success'] , 200);
    }

    public function postEdit(FaqRequest $request , $id)
    {
        $request->edit($id);

        return response()->json(['status' => 'success'],200);
    }

    public function getDelete($id)
    {
        $faq = Faq::find($id);

        $faq->delete();

        return redirect()->back();
    }
}
