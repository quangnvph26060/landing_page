<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    function login()
    {
        // User::create([
        //     'name' => 'admin',
        //     'email' => 'admin@gmail.com',
        //     'password' => Hash::make('123456'),
        //     'email_verified_at' => Carbon::now(),
        // ]);

        return view('backend.auth.login');
    }

    function authenticate(Request $request)
    {

        $validated = $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required',
        ]);

        $remember = $request->has('remember') ? true : false;

        if (Auth::attempt($validated, $remember)) {
            return redirect()->route('admin.dashboard');
        } else {
            session()->flash('error', 'Tài khoản hoặc mật khẩu không chính xác');
            return redirect()->back()->withInput($request->only('email'));
        }
    }

    function logout()
    {
        Auth::logout();
        return redirect()->route('admin.login');
    }
}
