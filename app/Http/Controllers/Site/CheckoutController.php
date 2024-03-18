<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Mail\OrderDetailMail;
use App\Order;
use Illuminate\Http\Request;
use Cart;
use Illuminate\Support\Facades\Mail;

class CheckoutController extends Controller
{
    //
    public function getIndex()
    {
        $items = Cart::getContent();

        return view('site.pages.checkout.index' ,compact('items'));
    }

    public function postIndex( Request $request)
    {

        $order = new Order();

        $order->name = $request->name;
        $order->email = $request->email;
        $order->items = json_encode(Cart::getContent());

        if ($order->save()){
            Mail::to($order->email)->send(new OrderDetailMail($order->id , $order->name , $order->items));

            Cart::clear();

            return response()->json('Thank you for purchasing our package,please chek your email' , 200);
        }

        return response()->json('Error! please check your data and try again later' , 500);
    }
}
