<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\post;

class ApiPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = post::all();
        return $posts;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'post_title'=>'required',
            'post_content'=>'required',
            'image'=>'required'
        ]);
        $post = post::create($request->only('user_id','post_title','post_content','image'));
        return $post;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ApiModel\ApiPost  $apiPost
     * @return \Illuminate\Http\Response
     */
    public function show($apiPost)
    {
        $post = post::find($apiPost);
        return $post;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ApiModel\ApiPost  $apiPost
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'post_title'=>'required',
            'post_content'=>'required',
            'image'=>'required'
        ]);
        
        $post = post::find($id);
        $post = $post->update($request->only('user_id','post_title','post_content','image'));
        return $post;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ApiModel\ApiPost  $apiPost
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = post::find($id);
        $post->delete();
        return $post;
    }
}
