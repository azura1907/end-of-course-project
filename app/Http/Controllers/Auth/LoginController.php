<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function viewLogin() {

        if(Auth::check()) {
            return redirect()->route('dashboard.project');
        }
        return view('auth.login');
    }

    public function postLogin(LoginRequest $request){
        $data = $request->only('email','password');
        // dd($data);
        if (Auth::attempt($data)){
            return redirect()->route('dashboard.project');
        }else {
            return redirect()->route('auth.viewLogin');
        }
    }

    public function logout(Request $request) {
        Auth::logout();
 
        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('auth.viewLogin');
    }
}
