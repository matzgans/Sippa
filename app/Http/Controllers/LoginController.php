<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Models\{Laporan, Pendamping, Kecamatan, Category_laporan, Layanan};


class LoginController extends Controller
{
    public function register()
    {
        return view('login.register');
    }

    public function registerproses(Request $request)
    {
        User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>bcrypt($request->password),
            'remember_token'=>Str::random(60),
        ]);
        return redirect('/login');
    }

    public function login()
    {
        return view('login.login');
    }

    public function loginproses(Request $request)
    {
        if(Auth::attempt($request->only('email', 'password'))){
            return redirect('/');
        }
            return redirect('/login');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }

    public function dashboard()
    {
        $jum_laporan = Laporan::count();
        $jum_pendamping = Pendamping::count();
        $kecamatan = Kecamatan::count();
        $kecamatan_dash = Kecamatan::get();
        $category = Category_laporan::count();
        return view('dashboard.coba', compact('jum_laporan', 'jum_pendamping', 'kecamatan', 'category', 'kecamatan_dash'));
    }

    public function store(Request $request)
    {
        Layanan::create($request->all());
        return redirect('/dashboard')->with('success', 'Laporan berhasil dilaporkan');
    }


}
