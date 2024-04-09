<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Mail\RegisterMail;
use App\Mail\ForgotPassword;
use Hash;
use Mail;
use Str;
use Auth;

class AuthController extends Controller
{
    /*
    * Get Login
    */
    public function add_login()
    {
        return view('auth.login');
    }

    /*
    * Store Login
    */
    public function auth_login(Request $request)
    {
        $remember = !empty($request->remember) ? true : false;

        if(Auth::attempt(['email' => $request->email, 'password' => $request->password], $remember))
        {
            return redirect('panel/dashboard');
        }
        else{
            return redirect()->back()->with('error', "Please enter your correct email and Password");
        }
    }

    /** 
    * Register
    **/
    public function add_registers()
    {
        return view('auth.register');
    }
    
    /** 
    * Store Users 
    **/ 
    public function create_users(Request $request)
    {
        request()->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required'
        ]);
        $save = new User;
        $save->name = trim($request->name);
        $save->email = trim($request->email);
        $save->password = Hash::make($request->password);
        $save->remember_token = Str::random(40);
        $save->save();

        // Mail::to($save->email)->send(new RegisterMail($save));
        
        return view('auth.login')->with('success', "Your Account Created Successfully");

    }

    /** 
    * Forgate Password
    **/
    public function get_forgate_password()
    {
        return view('auth.forgate-password-form');
        
    }

   /** 
    * Store Forgate Password
    **/
    public function forgate_users_password(Request $request)
    {
        $users = User::where('email','=',$request->email)->first();
        if(!empty($user))
        {
            $user->remember_token = Str::random(40);
            $user->save();

            Mail::to($user->email)->send(new ForgotPassword($user));
            return redirect()->back()->with('Success', "Please Check your Email and reset your Password");
        }
        else{
            return redirect()->back()->with('error', "Email not found");
        }
    }

    public function logout(){
        Auth::logout();
        return redirect('login');
    }
}
