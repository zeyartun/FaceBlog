<?php

namespace App\Http\Controllers;

use App\post;
use Illuminate\Http\Request;
use Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = post::paginate(12);
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
    public function show(post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($postID)
    {
        $post = post::find($postID);

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
        $post = post::find($postID);

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

        $post->update(['user_id'=>$userID,'post_title'=>$postTitle,'post_content'=>$postCont,'image'=>$image_data]);
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
        $post = post::find($postID);
        $imgPath = public_path().$post->image;
        if(isset($post->image)){
            unlink($imgPath);
        }
        $post->delete();
        return redirect('adminHome/posts')->with('success','Success Delete post!');
    }
}
