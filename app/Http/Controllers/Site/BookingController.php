<?php

namespace App\Http\Controllers\Site;

use App\Appointment;
use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\Site\BookingRequest;
use App\Http\Requests\Site\OrderDetailRequest;
use App\OrderDetail;
use App\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    //
    public function getIndex()
    {
        $categories = Category::all();
        $projects = Product::where('show_in_booking' , 1)->get();
        $off_days = \App\Setting::first()->off_days;
        
        $days = (json_encode(array_map('intval', json_decode($off_days, true))));

        return view('site.pages.booking.index' ,compact('categories' , 'projects' ,'days'));
    }

    public function getProduct($id)
    {
        $products = Product::where('category_id' , $id)->get();

        return view('site.pages.booking.templates.products' , compact('products'));
    }

    public function postIndex(BookingRequest $request)
    {
        if (auth()->guest()){
            return response()->json('You must login to book an appointment' , 500);
        }
        $day = $request->date_time_picker;
        $start = Carbon::parse($request->start)->format('H:i');
        $end = Carbon::parse($request->end)->format('H:i');

        $appointments = Appointment::where('available_date' , $day)->get();

        foreach ($appointments as $appointment) {
            if (Carbon::parse($appointment->start)->between($start , $end) || Carbon::parse($appointment->end)->between($start , $end)){
                return response()->json('This time isn\'t available , please select another time' , 500);
            }
        }
        $request->store();

        return response()->json('Thank you for booking , we will contact you ASAP' , 200);
    }

    public function getMail($id)
    {
        return view('site.pages.booking.email' , compact('id'));
    }

    public function postOrderDetail(OrderDetailRequest $request , $id)
    {
        $request->store($id);

        return response()->json('Thank you we will contact you soon' , 200);
    }
}
