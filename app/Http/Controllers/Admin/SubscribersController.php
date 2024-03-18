<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Subscriber;
use Illuminate\Http\Request;
use Newsletter;

class SubscribersController extends Controller
{
    //
    public function getIndex()
    {
        $subscribers = Subscriber::orderBy('id' , 'DESC')->paginate(20);
        return view('admin.pages.subscribers.index' ,compact('subscribers'));
    }

    public function getDelete($id)
    {
        $subscriber = Subscriber::find($id);
        Newsletter::delete($subscriber->email);
        $subscriber->delete();

        return redirect()->back();
    }
}
