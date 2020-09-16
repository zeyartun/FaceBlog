<?php

namespace App\Http\Controllers;

use App\comment;
use App\post;
use Illuminate\Http\Request;

class CommentController extends Controller
{

    public function create(Request $request, $postID)
    {
        $comm = new comment;
        $userID = Auth()->user()->id;

        $comm->post_id = $postID;
        $comm->user_id = $userID;
        $comm->comment = $request->comment;
        $comm->save();
        return redirect(url('/post/'.$postID.'/view'));
    }

    public function index()
    {
        $comments = comment::orderBy('id','DESC')->paginate(12);
        return view('Back.comment',compact('comments'));

    }

    public function trash()
    {
        $comments = comment::onlyTrashed()->orderBy('id','DESC')->paginate(12);
        return view('Back.commentTrash',compact('comments'));
    }

    public function store($id)
    {
        $comment = comment::onlyTrashed()->where('id',$id);
        $comment->restore();
        return redirect(url('/adminHome/comment/trash'))->with('success','comment Restore!');
    }

    public function hide($id)
    {
        $comment = comment::findOrFail($id);
        $comment->delete();
        return redirect(url('/adminHome/comment'))->with('success','comment Hide!');
    }

    public function delete($id)
    {
        $comment = comment::onlyTrashed()->where('id',$id);
        $comment->forceDelete();
        return redirect(url('/adminHome/comment/trash'))->with('success','comment Deleted!');
    }
}
