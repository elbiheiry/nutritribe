<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Message;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    //
    public function getIndex()
    {
        return view('site.pages.contact.index');
    }

    public function postIndex(Request $request)
    {
        $validation = validator($request->all() ,[
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'subject' => 'required',
            'message' => 'required'
        ] ,[
            'name.required' => 'Please enter your name',
            'email.required' => 'Please enter your email address',
            'email.email' => 'Please enter a valid email',
            'phone.required' => 'Please enter your phone number',
            'subject.required' => 'Please enter your subject',
            'message.required' => 'Please enter your message'
        ]);

        if ($validation->fails()){
            return response()->json($validation->errors()->first() , 500);
        }

        $message = new Message();

        $message->name = $request->name;
        $message->email = $request->email;
        $message->phone = $request->phone;
        $message->subject = $request->subject;
        $message->message = $request->message;

        if ($message->save()){
            return response()->json('Thank you for contacting us , we will call you ASAP' , 200);
        }
    }
}
