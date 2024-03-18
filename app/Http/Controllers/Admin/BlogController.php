<?php

namespace App\Http\Controllers\Admin;

use App\Blog;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\BlogRequest;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    //
    public function getIndex()
    {
        $blogs = Blog::orderBy('id' , 'DESC')->get();

        return view('admin.pages.blog.index' ,compact('blogs'));
    }

    public function getInfo($id)
    {
        $blog = Blog::find($id);

        return view('admin.pages.blog.edit'  ,compact('blog'));
    }

    public function postIndex(BlogRequest $request)
    {
        $request->store();

        return response()->json(['status' => 'success'] , 200);
    }

    public function postEdit(BlogRequest $request , $id)
    {
        $request->edit($id);

        return response()->json(['status' => 'success'],200);
    }

    public function getDelete($id)
    {
        $blog = Blog::find($id);

        $blog->delete();

        return redirect()->back();
    }
}
