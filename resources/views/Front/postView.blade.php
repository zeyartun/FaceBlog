@extends('Front.layouts.app')

@section('title','Posts')
    
@section('content')

    <div class="container">
        <div class="w-100">
            <h3 class="p-2 m-3">{{$post->post_title}}</h3>
            <img src={{ asset('assets/img/gallery/gallery-2.jpg')}} alt="" class="w-100">
            <p class="p-2 m-3">{{$post->post_content}}</p>
        </div>
        <hr>
        <div class="input-group mb-3">
            <textarea type="text" class="form-control" placeholder="Sometime Comment..."></textarea>
            <div class="input-group p-2 center">
              <button class="btn btn-outline-info " type="button" >Comment</button>
            </div>
        </div>
        <hr>
        <div class="card mb-3">
            <div class="row">
                <div class="col-2">
                    <img style="border-radius: 50%;width:80px;" class="p-2 float-right" src="{{ asset('assets/img/team/team-1.jpg')}}" alt="">
                </div>
                <div class="col-10 float-left">
                    <a href="#"><h6>Customer Name</h6></a>
                    Hello CommentHello CommentHello CommentHello CommentHello CommentHello CommentHello CommentHello CommentHello CommentHello CommentHello CommentHello CommentHello CommentHello CommentHello CommentHello CommentHello Comment
                </div>
            </div>            
        </div>
        <div class="card mb-3">
            <div class="row">
                <div class="col-2">
                    <img style="border-radius: 50%;width:80px;" class="p-2 float-right" src="{{ asset('assets/img/team/team-2.jpg')}}" alt="">
                </div>
                <div class="col-10 float-left">
                    <a href="#"><h6>Customer Name</h6></a>
                    Hello CommentHello CommentHello CommentHello CommentHello CommentHello CommentHello CommentHello CommentHello CommentHello CommentHello CommentHello CommentHello CommentHello CommentHello CommentHello CommentHello Comment
                </div>
            </div>            
        </div>            
    </div>


@endsection

