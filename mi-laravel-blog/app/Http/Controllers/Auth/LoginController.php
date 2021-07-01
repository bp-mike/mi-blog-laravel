<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    function __construct(){
        $this->middleware(['guest']);
    }

    public function index(){
        
        return view('auth/login');
    }

    public function store(Request $request){

        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

            // _____ sign/login in user + remember me token
            if(!auth()->attempt($request->only('email', 'password'), $request->remember)){
                return back()->with('status', 'invalid login details');
            }

            // _____ redirect user to dahsboard
            return redirect()->route('dashboard');
    }
}
