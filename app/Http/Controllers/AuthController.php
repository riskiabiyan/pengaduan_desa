<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Admin;

class AuthController extends Controller
{
    public function login(){
        return view('login');
    }

    public function register(){
        return view('register');
    }

    public function login_admin(){
        return view('admin/login_admin');
    }

    public function tambah_admin(){
        return view('admin/tambah_admin');
    }

    public function simpanuser(Request $request){
        try{
            $validate = $request->validate([
                'username' => 'required|string|unique:user|max:255',
                'foto_profil' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'email' => 'required|email|max:255',
                'password' => 'required|string|min:6',
            ]);

        }catch (\Illuminate\Validation\ValidationException $e){
            return back()->withErrors($e->errors())->withInput();
        }

        $hashpass = Hash::make($validate['password']);

        $user = new User();
        $user->username = $validate['username'];
        $user->foto_profil = $validate['foto_profil'];
        $user->email = $validate['email'];
        $user->password = $hashpass;
        $user->save();
        session()->flash('akun_dibuat');
        return redirect('/login');
    }

    public function cek_pengguna(Request $request){
        $credentials = $request->only('email','password');

        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect('/dashboard');
        }else{
            return back()->withErrors(['email' => 'Email atau password salah']);
        }
    }

    public function logout(Request $request){
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/login');
    }

    public function simpan_admin(Request $request){
        try{
            $validate = $request->validate([
                'username' => 'required|string|unique:user|max:255',
                'foto_profil' => 'required',
                'email' => 'required|email|max:255',
                'password' => 'required|string|min:6',
            ]);
        }catch
            (\Illuminate\Validation\ValidationException $e){
                return back()->withErrors($e->errors())->withInput();
            }
            $hashpass = Hash::make($validate['password']);

            $admin = new Admin();
            $admin->foto_profil = $validate['foto_profil'];
            $admin->username = $validate['username'];
            $admin->email = $validate['email'];
            $admin->password = $hashpass;
            $admin->save();
            session()->flash('akun_dibuat');
            return redirect('/login_admin');
    
        }
    
    public function cek_login_admin(Request $request){
        $credentials = $request->only('email', 'password');

        if(Auth::guard('admin')->attempt($credentials)){
            $request->session()->regenerate();
            return redirect('/dashboard_admin');
        }else{
            return back()->withErrors(['email' => 'Email atau password tidak cocok']);
        }
    }
    
}
