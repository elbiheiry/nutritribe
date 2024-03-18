<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function getIndex()
    {
        $users = User::orderBy('id' , 'DESC')->paginate(20);

        return view('admin.pages.users.index' ,compact('users'));
    }

    public function getDelete($id)
    {
        $user = User::find($id);

        $user->delete();

        return redirect()->back();
    }
}
