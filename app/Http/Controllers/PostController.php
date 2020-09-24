<?php

namespace App\Http\Controllers;

use App\post;
use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Category;

class PostController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index(Request $req)
    {
        if($req->category){

            $posts = Category::findOrFail($req->category)->posts()->withTrashed()->orderBy('id','DESC')->paginate(12);
            // dd($category);
            // $posts = $category->posts;
            $categories = Category::all();
            return view('Back.posts',compact('posts','categories'));

        }else{

            $categories = Category::all();
            $posts = post::withTrashed()->orderBy('id','DESC')->paginate(12);
            return view('Back.posts',compact('posts','categories'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('Back.postNew',compact('categories'));
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
        $categories = $req->category_names;
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
        $post->categories()->sync($categories);
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
        $user = post::find($id)->user;
        return view('back.postView',compact('post','user'));
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
        $categories = Category::all();
        return view('Back/postEdit',compact('post','categories'));

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
        $categories = $request->category_names;
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
            // 'user_id'=>$userID,
            'post_title'=>$postTitle,
            'post_content'=>$postCont,
            'image'=>$image_data
            ]);

        $post->categories()->sync($categories);
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
