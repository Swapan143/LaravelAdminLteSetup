<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login()
    {
        return view('admin.auth.login');
    }


    public function loginVerify(Request $request)
    {
        
        $validatedData = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ], [
            'email.required' => 'Email Field Is required',
            'email.email' => 'Please input a valid email',
            'password.required' => 'Password Field Is required',
        ]);

        // First check if user exists in User table
        $user = User::where('email', $request->email)->first();
        
        if (!$user) {
            Session::flash('message', 'User Not Found');
            Session::flash('alert-class', 'alert-danger');
            return redirect('admin');
        }

        

        // Verify password using Hash::check()
        if (!Hash::check($request->password, $user->password)) {
            Session::flash('message', 'You Entered a Wrong Password');
            Session::flash('alert-class', 'alert-danger');
            return redirect('login');
        }

        // Login successful
        $admin_details = $user->toArray();
        Session::put('admin_details', $admin_details);
        
        return redirect('admin/dashboard');
    }

    public function Logout()
    {
        echo "logout";
    }
}
