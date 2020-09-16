<?php

namespace App\Http\Controllers;
use App\post;
use App\comment;
use App\Message;
use App\Http\Requests\messageRequest;

class HomeController extends Controller
{
    public function index()
    { 
        $AllPosts = post::orderBy('id','DESC')->paginate(6);   
        return view('Front.index',compact('AllPosts'));
    }

    public function posts()
    {
        $AllPosts = post::orderBy('id','DESC')->paginate(9);
        return view('Front.posts',compact('AllPosts'));
    }
    public function postView($id)
    {
        // $comm = post::with('comment.user')->get();
        
        $comm = comment::where('post_id',$id)->orderBy('id','DESC')->get();
        // dd($comm);
        $user = post::find($id)->user;
        $post = post::find($id);
        // dd($comm);
        return view('Front.postView',compact('post','comm','user'));
    }

    public function message(messageRequest $request)
    {
        $message = new Message;
        $message->name = $request->name;
        $message->email = $request->email;
        $message->subject = $request->subject;
        $message->message = $request->message;
        $message->save();
        return redirect('/')->with('success','Your message has been sent. Thank you!');
    }

}
