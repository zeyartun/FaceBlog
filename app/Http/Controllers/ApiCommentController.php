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
    public function index($post_id)
    {
        $comments = post::find($post_id)->comments()->orderBy('id','DESC')->get();
        return response()->json(compact('comments'));
        // return $comments;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
