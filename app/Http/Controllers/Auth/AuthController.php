<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        // $data = [
        //     'categories' => $categories
        // ];
        return view('admin.authmain');
    }

    public function postLogin(Request $request)
    { {
            $credentials = $request->validate([
                'email' => ['required', 'email'],
                'password' => ['required'],
            ]);

            if (Auth::attempt($credentials, $request->remember)) {
                $request->session()->regenerate();

                return redirect()->intended('admin.index');
            }

            return back()->withErrors([
                'email' => 'ไม่พบผู้ใช้งานนี้ ชื่อหรือรหัส ไม่ถูกต้อง.',
            ])->onlyInput('email');
        }
    }

    public function register(Request $request)
    {
        $user = new User();
        $user->name = 'admin';
        $user->role = 'admin';
        $user->email = 'admin@gmail.com';
        // $user->password = Hash::make('1234');
        $user->password = bcrypt('1234');
        $user->save();
        return "success";
    }

    public function logout()
    {
        auth()->logout();

        return redirect()->route('login');
    }
}
