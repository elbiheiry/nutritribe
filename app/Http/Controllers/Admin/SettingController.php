<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SettingRequest;
use App\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    //
    public function getIndex()
    {
        $settings = Setting::first();

        return view('admin.pages.settings.index' ,compact('settings'));
    }

    public function postEdit(SettingRequest $request)
    {
        $request->edit();

        return response()->json(['status' => 'success'] , 200);
    }
}
