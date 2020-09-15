<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class AdminController extends Controller
{
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        // $user = User::find(1)->role;
        // dd($user);
        if(auth()->user()->roles == 'Author'){
            return view('Front.index');
        }else{
            return view('Back.index');
        }
    }
}
