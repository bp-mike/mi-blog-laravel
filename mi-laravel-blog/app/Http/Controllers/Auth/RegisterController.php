<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\support\Facades\Hash;

class RegisterController extends Controller
{
    function __construct(){
        $this->middleware(['guest']);
    }
    public function index(){
        return view('auth/register');
    }
    public function store(Request $request){
        // ___ dd is die dump(kill page and output user info(google))
        // dd('people are awesome');
        // ___ validate user
        $this->validate($request, [
            'name' => 'required|max:255|min:3',
            'username' => 'required|max:255|min:3',
            'email' => 'required|email|max:255',
            'password' => 'required|confirmed',
        ]);

        // ____ store user
        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        // _____ sign in user
        auth()->attempt($request->only('email', 'password'));

        // _____ redirect user to dahsboard
        return redirect()->route('dashboard');
    }
}
