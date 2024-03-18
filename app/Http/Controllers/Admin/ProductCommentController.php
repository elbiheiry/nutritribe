<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Product;
use App\ProductComment;
use Illuminate\Http\Request;

class ProductCommentController extends Controller
{
    //
    public function getAll()
    {
        $products = Product::all();

        return view('admin.pages.products.all_comments' ,compact('products'));
    }

    public function getIndex($id)
    {
        $comments = ProductComment::where('product_id' , $id)->get();

        return view('admin.pages.products.comments' ,compact('comments'));
    }

    public function getDelete($id)
    {
        $comment = ProductComment::find($id);

        $comment->delete();

        return redirect()->back();
    }
}
