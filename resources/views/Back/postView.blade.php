@extends('Back/layouts/master')

@section('title','HOME')
    
@section('content')
<div class="container">
  <div class="w-100">
      <h3 class="p-2 m-3">{{$post->post_title}}</h3>
      @if ($post->image != null)
          <img src="{{ url($post->image) }}" alt="" class="w-100">
      @endif
      <p><b>Author By</b> {{$user->name}} <br> <i>{{date('d-m-Y',strtotime($post->created_at))}}</i></p> 
      <p class="p-2 m-3">{{$post->post_content}}</p>
  </div>
  <hr>
@endsection