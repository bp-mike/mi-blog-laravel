<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\PostLiked;
use Illuminate\Support\Facades\Mail;

class DashboardController extends Controller
{
    function __construct(){
        $this->middleware(['auth']);
    }

    public function index(){
        return view('dashboard');
    }
}
