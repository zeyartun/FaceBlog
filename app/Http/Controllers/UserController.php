<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show()
    {
        $users = User::paginate(9);
        return view('Back.members',compact('users'));
    }
}
