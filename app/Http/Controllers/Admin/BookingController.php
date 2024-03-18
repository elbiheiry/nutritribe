<?php

namespace App\Http\Controllers\Admin;

use App\Appointment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    //
    public function getIndex()
    {
        $bookings = Appointment::orderby('id' , 'desc')->paginate(50);

        return view('admin.pages.bookings.index' ,compact('bookings'));
    }

    public function getBooking($id)
    {
        $booking = Appointment::find($id);

        return view('admin.pages.bookings.single' ,compact('booking'));
    }

    public function getdelete($id)
    {
        $booking = Appointment::find($id);

        $booking->delete();

        return redirect()->back();
    }

}
