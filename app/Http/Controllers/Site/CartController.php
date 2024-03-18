<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Cart;

class CartController extends Controller
{
    //
    public function getCart()
    {
        $products = Cart::getContent();

        $items = $products->sortBy('id');

        return view('site.pages.cart.index' ,compact('items'));
    }
    public function postIndex(Request $request , $id)
    {
        $product = Product::find($id);
        $quantity = $request->qty;
        $item = \Cart::get($id);

        if ($item != null ){
            Cart::update($item->id , [
                'quantity' => $quantity ? $quantity : $item->quantity++,
            ]);

            $products = Cart::getContent();

            $items = $products->sortBy('id');

            return response()->json([
                'html' => view('site.layouts.cart')->render() ,
                'html2' => view('site.pages.cart.templates.cart' , compact('items'))->render()] ,200);
        }

        $cart = Cart::add([
            'id' => $id,
            'name' => $product->name,
            'quantity' => $quantity ? $quantity : 1,
            'price' => $product->usd_price,
            'associatedModel' => $product
        ]);

        if ($cart){
            return response()->json(['html' => view('site.layouts.cart')->render()] ,200);
        }
    }

    public function getDeleteItem($id)
    {
        \Cart::remove($id);

        return redirect()->back();
    }
}
