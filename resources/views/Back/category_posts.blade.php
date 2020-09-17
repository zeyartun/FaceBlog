@extends('Back/layouts/master')

@section('title','HOME')
    
@section('content')
  <div class="container-fluid">     
    <div class="mb-3 p-2"><a href={{url('/adminHome/post/new')}} class="btn btn-success"> New Post </a></div>
@include('Back.success')
  </div>
  <hr>
  <div class="container-fluid">
    <div class="row">
      @foreach ($categories as $category)
        <div class="col-2 mb-3">
        <a href="{{url('/adminHome/posts?category='.$category->id)}}" class="btn btn-outline-info m-2 w-100">{{$category->category_name}}</a>
        </div>
      @endforeach
    </div>
    <div class="row">
      @foreach($posts as $post)
      <div class="col-md-3">
        <div class="card p-3"> 
          <div class="card-body">
            <a href={{ url('../adminHome/post/'.$post->id.'/view') }}><img src="{{asset($post->image)}}" alt="" class="w-100"></a>
            <div class=""><h5>{{$post->post_title}}</h5></div>
            {{ Str::limit($post->post_content,50)}}
          </div>
          <p><b>Author By</b> {{$post->user->name}} <br> <i>{{$post->created_at->diffForHumans()}}</i></p>
          @foreach (auth()->user()->roles as $role)
          @if ($role->role_name == 'Admin' || $role->role_name == 'Manager' || auth()->user()->id == $post->user->id)
          <div class="card-footer">
            @if ($post->deleted_at)
            <a href={{url('/adminHome/post/'.$post->id.'/restore')}} class="btn btn-success">Restore</a>
            <a href={{url('/adminHome/post/'.$post->id.'/delete')}} class="btn btn-danger">Delete</a>
            @else
            <a href={{url('/adminHome/post/'.$post->id.'/hide')}} class="btn btn-warning">Hide</a>
            @endif            
            <a href="{{url('/adminHome/post/'.$post->id.'/edit')}}" class="btn btn-info">Edit</a>
          </div>
          @break
          @endif
          @endforeach          
        </div>
      </div>
      @endforeach
    </div>
    {{-- {{$category->links()}} --}}
  </div>
@endsection