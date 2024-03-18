<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProductRequest;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    public function getIndex($id)
    {
        $products = Product::where('category_id' , $id)->orderBy('id' , 'DESC')->get();

        return view('admin.pages.products.index' ,compact('products' , 'id'));
    }

    public function getInfo($id)
    {
        $product = Product::find($id);

        return view('admin.pages.products.edit'  ,compact('product'));
    }

    public function postIndex(ProductRequest $request , $id)
    {
        $request->store($id);

        return response()->json(['status' => 'success'] , 200);
    }

    public function postEdit(ProductRequest $request , $id)
    {
        $request->edit($id);

        return response()->json(['status' => 'success'],200);
    }

    public function getDelete($id)
    {
        $product = Product::find($id);

        $product->delete();

        return redirect()->back();
    }
}
