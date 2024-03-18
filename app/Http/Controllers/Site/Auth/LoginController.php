<?php

namespace App\Http\Controllers\Site\Auth;

use App\Http\Controllers\Controller;
use App\Mail\VerifyEmail;
use App\User;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required',
            'username' => 'required|unique:users,username',
            $this->username() => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
        ], [
            'name.required' => 'Please enter your name',
            'username.required' => 'Please enter your username',
            'username.unique' => 'This username is already used',
            $this->username() . '.required' => 'Please enter your email address',
            $this->username() . '.email' => 'Please enter a valid email address',
            $this->username() . '.unique' => 'This email is already in use',
            'password.required' => 'Please enter your password',
            'password.min' => 'Password should be at least 8 characters',
            'password.confirmed' => 'Please confirm your password'
        ]);
    }

    protected function username()
    {
        return 'email';
    }

    public function getLogin()
    {
        return view('site.auth.login');
    }

    public function getRegister()
    {
        return view('site.auth.register');
    }

    public function postLogin(Request $request)
    {

        $v = validator($request->all(), [
            $this->username() => 'required|email',
            'password' => 'required|min:8',
        ], [
            $this->username() . '.required' => 'Please enter your email address',
            $this->username() . '.email' => 'Please enter a valid email address',
            'password.required' => 'Please enter your password',
            'password.min' => 'Password should be at least 8 characters',
        ]);

        if ($v->fails()) {
            return response()->json(['status' => 'error', 'data' => $v->errors()->first()], 500);
        }

        $credentials = $request->only($this->username(), 'password');
        $authSuccess = Auth::attempt($credentials, $request->has('remember'));

        if ($authSuccess) {
            $request->session()->regenerate();
            return response(['success' => true], 200);
        }

        return response()->json([
            'data' => 'Email or password is incorrect'
        ], 500);
    }

    public function register(Request $request)
    {
        $validation = $this->validator($request->all());
        if ($validation->fails()) {
            return response()->json(['status' => 'error', 'data' => $validation->errors()->first()], 500);
        } else {
            $user = User::create([
                'name' => $request->name,
                'username' => $request->username,
                'email' => $request->email,
                'password' => bcrypt($request->password)
            ]);

            Mail::to($user->email)->send(new VerifyEmail($user->username , $user->name));

            if ($user) {
                return response(['success' => true , 'data' => 'We have emailed you with verification link'], Response::HTTP_OK);
            }

            return
                response([
                    'success' => false,
                    'data' => 'Error , please try again'
                ], Response::HTTP_FORBIDDEN);
        }
    }

    public function getVerify(Request $request ,$username)
    {
        $user = User::where('username' , $username)->first();

        $user->active = 1;

        if ($user->save())
        {
            Auth::login($user, $request->has('remember'));
            $request->session()->regenerate();

            return redirect('/');
        }
    }

    public function getLogout()
    {
        Auth::logout();
        return redirect('/login');
    }
}