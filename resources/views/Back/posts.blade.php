@extends('Back/layouts/master')

@section('title','HOME')
    
@section('content')
  <div class="container-fluid">
    <div class="btn btn-outline-success mb-3 p-2"><a href={{url('/adminHome/post/new')}}> New Post </a></div>
  </div>
  <hr>
  <div class="container-fluid">
    <div class="row">
      @foreach($posts as $post)
      <div class="col-md-3">
        <div class="card p-3">
          <div class="card-header"><h3>{{$post->post_title}}</h3></div>
          <div class="card-body">{{ Str::limit($post->post_content,200)}}</div>
          <div class="card-footer">
            <button class="btn btn-danger">Delete</button>
            <button class="btn btn-info">Edit</button>
          </div>
        </div>
      </div>
      @endforeach  
      <div>
      {{$posts->links()}} 
      </div>
    </div>      
  </div>
@endsection