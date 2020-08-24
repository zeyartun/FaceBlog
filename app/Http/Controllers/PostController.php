<?php

namespace App\Http\Controllers;

use App\post;
use Illuminate\Http\Request;
use Auth;

class PostController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index()
    {
        $posts = post::withTrashed()->orderBy('id','DESC')->paginate(12);
        return view('Back.posts',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Back.postNew');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        $userID = Auth::User()->id;
        $title = $req->PostTitle;
        $content = $req->PostContent;

        $image = $req->file('file');
        $imageName = time() .'_'. $image->getClientOriginalName();
        $imagePath = public_path('/img');
        $image->move($imagePath,$imageName);

        // dd($imagePath);

        $post = new post();
        $post->user_id = $userID;
        $post->post_title = $title;
        $post->post_content = $content;
        $post->image = '/img'.'/'.$imageName;
        $post->save();
        return redirect('adminHome/posts')->with('success','Success post!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = post::withTrashed()->find($id);
        return view('back.postView',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($postID)
    {
        $post = post::withTrashed()->find($postID);

        return view('Back/postEdit',compact('post'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request , $postID)
    {
        $userID = Auth::user()->id;
        $post = post::withTrashed()->find($postID);

        $postTitle = $request->PostTitle;
        $postCont = $request->PostContent;

        $image = $request->file('file');

        // dd($image);
        
        if($image == null){
            $image_data = $post->image;

        }else{

            if($post->image != null){
                $old_image = public_path().$post->image;
                unlink($old_image);
            }

            $image_name = time() .'_'. $image->getClientOriginalName();
            $image_path = public_path('/img');
            $image->move($image_path,$image_name);

            $image_data = '/img'.'/'.$image_name;
        }

        $post->update([
            'user_id'=>$userID,
            'post_title'=>$postTitle,
            'post_content'=>$postCont,
            'image'=>$image_data
            ]);
        return redirect('adminHome/posts')->with('success','Success Update Post');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($postID)
    {
        $post = post::withTrashed()->find($postID);
        if($post->image != null){
            $imgPath = public_path().$post->image;
            unlink($imgPath);
        }
        $post->forceDelete();
        return redirect('adminHome/posts')->with('success','Success Delete post!');
    }

    public function hide($id)
    {
        post::find($id)->Delete();
        return redirect('adminHome/posts')->with('success','Success hide post!');
    }
    public function restore($id)
    {
        post::withTrashed()->find($id)->restore();
        return redirect('adminHome/posts')->with('success','Success Restore post!');
    }
}
