@extends('Front.layouts.app')

@section('title','Posts')
    
@section('content')
<section>
    <div class="container mt-5">
        <div class="w-100">
            <h3 class="p-2 m-3">{{$post->post_title}}</h3>
            
            @if ($post->image != null)
                <img src={{ url( $post->image ) }} alt="" class="w-100">
            @endif            
               
            <p class="p-2 m-3">{{$post->post_content}}</p>
            <p><b>Author By</b> {{$user->name}} <br> <i>{{date('d-m-Y',strtotime($post->created_at))}}</i></p>
        </div>
        <hr>
        @auth
        <form action="{{url($post->id.'/comment')}}" method="post">
            @csrf
        <div class="input-group mb-3">
            <input name="comment" type="text" class="form-control" placeholder="Sometime Comment..." required></input>
            <div class="input-group p-2 center">
              <button class="btn btn-outline-info " type="submit" >Comment</button>
            </div>
        </div>
        </form>
        @else
        <p>Do you want to Comment? Please <a href="{{route('login')}}">Login</a> or <a href="{{route('register')}}">Register</a></p>
        @endauth 

        <hr>
        <div class="card mb-3">
                            
                @foreach ($comm as $com)
                <div class="row">
                    <div class="col-2">
                        <img style="border-radius: 50%;width:80px;" class="p-2 float-right" src="{{asset($com->user->image)}}" alt="">
                    </div>                
                    <div class="col-10 float-left p-3">
                        <a><h6>{{$com->user->name}} <i class="badge badge-info">{{$com->created_at->diffForHumans()}}</i></h6></a>
                        <p>{{$com->comment}}</p>
                    </div> 
                </div>           
                @endforeach     
            </div> 
    </div>

</section>
@endsection

