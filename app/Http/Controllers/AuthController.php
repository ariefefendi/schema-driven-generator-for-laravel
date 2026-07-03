<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use Illuminate\Support\Facades\Hash;
// use App\Services\AuthRedirectService;
use App\Services\RoleViewService;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLogin()
    {
        // Kalau belum login, redirect 
        if (!auth()->check()) { 
            return view('auth.login');
        } else {
            return RoleViewService::roleView(
                auth()->user()->role->name, 'Dashboard'
            );
        }
    }

    public function login(Request $request)
    {
        // 1. Validasi input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // 2. Cek username/email ada?
        $user = Users::with('role')
                        ->where('email', $request->email)
                        ->first();

        if (!$user) {
            return back()->with('error', 'User tidak ditemukan');
        }

        // 3. Cek password match?
        if (!Hash::check($request->password, $user->password)) {
            return back()->with('error', 'Password salah');
        }
        
        Auth::login($user);
        
        // dd($user->role->name);die();
        // 4. Simpan session
        session([
            'user_id' => $user->id,
            'role' => $user->role->name,
            'name' => $user->name
        ]);

        // 5. Redirect dashboard
        // return RoleViewService::roleView(
        //     auth()->user()->role->name, 'Dashboard'
        // );
        $role = auth()->user()->role->name;
        
        return redirect()->to($role . '/dashboard');
    }

    public function logout()
    {
        session()->flush();
        return redirect('/login');
    }

}
