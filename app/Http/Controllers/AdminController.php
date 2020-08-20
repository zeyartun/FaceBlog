<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\post;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('back.index');
    }
    public function posts(){
        $posts = post::paginate(12);
        return view('Back.posts',compact('posts'));
    }

    public function newPost()
    {
        return view('Back.postNew');
    }
}
