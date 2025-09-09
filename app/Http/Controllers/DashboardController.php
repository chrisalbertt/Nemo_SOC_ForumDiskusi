<?php

namespace App\Http\Controllers;

class DashboardController extends Controller
{
    public function user()
    {
        if (!session()->has('user_id')) {
            return redirect()->route('login')->with('err','Silakan login dulu');
        }
        return view('user.dashboard');
    }

    public function admin()
    {
        if (!session()->has('user_id') || session('role') !== 'ADMIN') {
            return redirect()->route('login')->with('err','Akses khusus admin');
        }
        return view('admin.dashboard');
    }
}
