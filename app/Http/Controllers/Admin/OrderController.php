<?php

namespace App\Http\Controllers\Admin;

use App\Order;
use App\Http\Controllers\Controller;
use App\OrderDetail;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    //
    public function getIndex()
    {
        $orders = Order::orderby('id' , 'desc')->paginate(50);

        return view('admin.pages.orders.index' ,compact('orders'));
    }

    public function getOrder($id)
    {
        $order = Order::find($id);
        $items = json_decode($order->items);
        $details = OrderDetail::where('order_id' , $id)->first();

        return view('admin.pages.orders.single' ,compact('order' , 'items' , 'details'));
    }

    public function getdelete($id)
    {
        $order = Order::find($id);

        $order->delete();

        return redirect()->back();
    }

}
