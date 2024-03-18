<?php

namespace App\Http\Controllers\Site;

use App\Category;
use App\Http\Controllers\Controller;
use App\Product;
use App\ProductComment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PackageController extends Controller
{
    //
    public function getIndex($slug = null)
    {
        $categories = Category::all();
        if ($slug){
            if($slug != 'price' && $slug != 'duration'){
                $category = Category::where('slug' , $slug)->first();
                $products = Product::where('category_id' , $category->id)->get();
            }else if($slug == 'price'){
                $price = Session::get('currency');
                if($price == 'usd'){
                    $products = Product::orderBy('usd_price' , 'ASC')->get();
                }elseif($price == 'eur') {
                    $products = Product::orderBy('eur_price' , 'ASC')->get();
                }elseif($price == 'aed') {
                    $products = Product::orderBy('uae_price' , 'ASC')->get();
                }else{
                    $products = Product::orderBy('egp_price' , 'ASC')->get();   
                }  
            }else{
                $products = Product::orderBy('duration' , 'ASC')->get();
            }
        }else{
            $products = Product::orderBy('id' , 'DESC')->get();
        }

        return view('site.pages.products.index' ,compact('categories' , 'products'));
    }


    public function getInfo($slug)
    {
        $product = Product::where('slug' , $slug)->first();
        return view('site.pages.products.templates.product' ,compact('product' ));
    }

    public function getProduct($slug)
    {
        $product = Product::with('comments')->where('slug' , $slug)->first();
        $relates = Product::where('id' , '!=' , $product->id)->where('category_id' , $product->category_id)->take(3)->orderBy('id' , 'desc')->get();

        return view('site.pages.products.single' , compact('product' ,'relates'));
    }

    public function postComment(Request $request , $id)
    {
        $validation = validator($request->all() , [
            'comment' => 'required'
        ], [
            'comment.required' => 'Please enter your comment'
        ]);

        if ($validation->fails()){
            return response()->json($validation->errors()->first() , 500);
        }

        if (auth()->guest()){
            return response()->json('you must login first' , 500);
        }

        $comment = new ProductComment();

        $comment->user_id = auth()->id();
        $comment->product_id = $id;
        $comment->comment = $request->comment;

        if ($comment->save())
        {
            $product = Product::find($id);

            return response()->json(view('site.pages.products.templates.comments' , compact('product'))->render() , 200);
        }
    }
}
