<?php

namespace App\Http\Controllers\Site;

use App\Faq;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    //
    public function getIndex()
    {
        $questions = Faq::all();

        return view('site.pages.faqs.index' ,compact('questions'));
    }
}
