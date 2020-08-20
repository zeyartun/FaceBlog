<?php

namespace App\Http\Controllers;
use App\post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('front.index');
    }

    public function posts()
    {
        $AllPosts = post::paginate(9);        
        return view('front.posts',compact('AllPosts'));
    }
    public function postView($id)
    {
        $post = post::find($id);
        return view('Front.postView',compact('post'));
    }

}
