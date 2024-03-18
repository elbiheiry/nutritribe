<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryRequest;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    public function getIndex()
    {
        $categories = Category::orderBy('id' , 'DESC')->get();

        return view('admin.pages.categories.index' ,compact('categories'));
    }

    public function getInfo($id)
    {
        $category = Category::find($id);

        return view('admin.pages.categories.templates.edit'  ,compact('category'));
    }

    public function postIndex(CategoryRequest $request)
    {
        $request->store();

        return response()->json(['status' => 'success'] , 200);
    }

    public function postEdit(CategoryRequest $request , $id)
    {
        $request->edit($id);

        return response()->json(['status' => 'success'],200);
    }

    public function getDelete($id)
    {
        $category = Category::find($id);

        $category->delete();

        return redirect()->back();
    }
}
