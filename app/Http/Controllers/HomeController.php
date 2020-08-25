<?php

namespace App\Http\Controllers;
use App\post;
use App\comment;
use App\user;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {        
        return view('front.index');
    }

    public function posts()
    {
        $AllPosts = post::orderBy('id','DESC')->paginate(9);
        return view('front.posts',compact('AllPosts'));
    }
    public function postView($id)
    {
        // $comm = post::with('comment.user')->get();
        
        $comm = comment::where('post_id',$id)->orderBy('id','DESC')->get();
        $post = post::find($id);
        // dd($post);
        return view('Front.postView',compact('post','comm'));
    }

}
