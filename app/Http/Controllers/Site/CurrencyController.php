<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CurrencyController extends Controller
{
    //
    public function getIndex(Request $request ,$currency) {
        if (!empty($currency)) {
            session()->put('currency',$currency);
            session()->put('backUrl' , url()->previous());
            $url = session()->get('backUrl');
        }

        return redirect($url)->cookie('currency', $currency);
    }
}
