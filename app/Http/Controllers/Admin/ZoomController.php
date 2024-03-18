<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ZoomController extends Controller
{
    //
    public function getIndex()
    {
        return view('admin.pages.zoom.index');
    }

    public function getMeeting()
    {
        return view('admin.pages.zoom.meeting');
    }
}
