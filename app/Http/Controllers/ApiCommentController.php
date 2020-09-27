<?php

namespace App\Http\Controllers;

use App\post;
use App\comment;
use Illuminate\Http\Request;

class ApiCommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $req)
    {
        if($req->post_id){
            $comments = post::find($req->post_id)->comments()->orderBy('id','DESC')->get();
        }else{

            $comments = comment::all();
        }
        // return response()->json(compact('comments'));
        return $comments;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request);
        $comment = new comment;
        $comment = comment::create($request->only('comment','post_id','user_id'));
        return $comment;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ApiModel\ApiComment  $apiComment
     * @return \Illuminate\Http\Response
     */
    public function show(comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ApiModel\ApiComment  $apiComment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ApiComment $apiComment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ApiModel\ApiComment  $apiComment
     * @return \Illuminate\Http\Response
     */
    public function destroy(ApiComment $apiComment)
    {
        //
    }
}
