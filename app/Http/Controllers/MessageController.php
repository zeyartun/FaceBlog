<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $messages = Message::orderBy('id','DESC')->paginate(12);
        return view('Back.message',compact('messages'));

    }

    public function trash()
    {
        $messages = Message::onlyTrashed()->orderBy('id','DESC')->paginate(12);
        return view('Back.messageTrash',compact('messages'));
    }

    public function store($id)
    {
        $message = Message::onlyTrashed()->where('id',$id);
        $message->restore();
        return redirect(url('/adminHome/messages/trash'))->with('success','Message Restore!');
    }

    public function hide($id)
    {
        $message = Message::findOrFail($id);
        $message->delete();
        return redirect(url('/adminHome/messages'))->with('success','Message Hide!');
    }

    public function delete($id)
    {
        $message = Message::onlyTrashed()->where('id',$id);
        $message->forceDelete();
        return redirect(url('/adminHome/messages/trash'))->with('success','Message Deleted!');
    }
}
