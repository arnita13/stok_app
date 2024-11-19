<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index(){
        return view(
            'Auth.login'
        );
    }
    public function login_proses(Request $request){
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required:8'
        ],[
            'email.required' => 'Email wajub diisi!!!',
            'email.email' => 'format email tidak valid',
            'email.exists' => 'Email tidal sesui',

            'password.requiret' => 'Password wajib diisi',
            'password.min' => 'passwor monimal 8 karakter',
        ]);

        $user = User::where('email', $request->email)->first();

        $infoLogin = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::attempt($infoLogin)) {
            return redirect('/dashboard');
        } else {
            return redirect()->back()->withErrors([
                'email' => 'Email tidak sesuai',
                'password' => 'password salah'
            ]);
        }
    }
/**
 * cara logout
 */
    public function logout(){
        Auth::logout();
        return redirect('/');
    }
}
