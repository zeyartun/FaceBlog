@extends('Front.layouts.app')

@section('title','Posts')
    
@section('content')

    <div class="container">
        <div class="w-100">
            <h3 class="p-2 m-3">{{$post->post_title}}</h3>
            @if ($post->image != null)
                <img src={{ url( $post->image ) }} alt="" class="w-100">
            @endif            
               
            <p class="p-2 m-3">{{$post->post_content}}</p>
        </div>
        <hr>
        @auth
        <form action="{{url($post->id.'/comment')}}" method="post">
            @csrf
        <div class="input-group mb-3">
            <input name="comment" type="text" class="form-control" placeholder="Sometime Comment..."></input>
            <div class="input-group p-2 center">
              <button class="btn btn-outline-info " type="submit" >Comment</button>
            </div>
        </div>
        </form>
        @else
        <p>Do you want to Comment. Please <a href="{{route('login')}}">Login</a> or <a href="{{route('register')}}">Register</a></p>
        @endauth 

        <hr>
        <div class="card mb-3">
            <div class="row">                
                @foreach ($comm as $com)
                <div class="col-2">
                    <img style="border-radius: 50%;width:80px;" class="p-2 float-right" src="{{ asset('assets/img/team/team-1.jpg')}}" alt="">
                </div>                
                <div class="col-10 float-left p-3">
                    <a><h6>{{$com->user_id}}</h6></a>
                    <p>{{$com->comment}}</p>
                </div>
                @endforeach                
            </div>            
        </div>            
    </div>


@endsection

