<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Http\Request;
use Illuminate\Support\Str; 
use App\Models\Admin;

class AdminController extends Controller
{
    // Tampilkan halaman login
    public function showLogin()
    {
        return view('admin_login');
    }

    // Proses login
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $admin = Admin::where('username', $request->username)->first();

        if ($admin && Hash::check($request->password, $admin->password)) {
            // 1. BUAT SESSION STANDAR
            Session::put('admin_id', $admin->id);

            // 2. CEK REMEMBER ME
            if ($request->has('remember_me')) {
                $remember_token = Str::random(60); 

                // Simpan token di database
                $admin->update(['remember_token' => $remember_token]);
                
                $cookie = cookie('remember_admin', $remember_token, 43200); 

                // Redirect dengan melampirkan Cookie
                return redirect('/')->withCookie($cookie);
            }

            // Jika tidak ada 'Remember Me'
            return redirect('/');
            
        } else {
            return redirect()->back()->with('error', 'Username atau password salah');
        }
    }

    // Tampilkan halaman register
    public function showRegister()
    {
        return view('admin_register');
    }

    // Proses register
    public function register(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:admin,username',
            'password' => 'required|min:4',
        ]);

        Admin::create([
            'username' => $request->username,
            'password' => Hash::make($request->password),
        ]);

        return redirect('/admin/login');
    }

    // Proses logout
    public function logout()
    {
        Session::forget('admin_id');
        Cookie::queue(Cookie::forget('remember_admin')); 
        return redirect('/admin/login');
    }
}