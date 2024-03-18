<?php

namespace App\Http\Controllers\Admin;

use App\EmailTemplate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\EmailTemplateRequest;
use Illuminate\Http\Request;

class EmailTemplateController extends Controller
{
    //
    public function getIndex()
    {
        $email = EmailTemplate::first();

        return view('admin.pages.templates.index' ,compact('email'));
    }

    public function postEdit(EmailTemplateRequest $request)
    {
        $request->edit();

        return response()->json(['status' => 'success'] , 200);
    }
}
