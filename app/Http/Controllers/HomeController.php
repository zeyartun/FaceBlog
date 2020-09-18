<?php

namespace App\Http\Controllers;
use App\post;
use App\comment;
use App\Message;
use App\Category;
use App\Http\Requests\messageRequest;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    { 
        $session = $request->session()->all();
        $categories = Category::all();
        $AllPosts = post::orderBy('id','DESC')->paginate(6);   
        return view('Front.index',compact('AllPosts','categories','session'));
    }

    public function posts(Request $req)
    {
        // dd($req->category);
        if($req->category){
            $category = Category::findOrFail($req->category);
            $AllPosts = $category->posts;
            $categories = Category::all();
            return view('Front.categoryPosts',compact('AllPosts','categories'));

        }else{

            $categories = Category::all();
            $AllPosts = post::orderBy('id','DESC')->paginate(9);
            return view('Front.posts',compact('AllPosts','categories'));
        }
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
