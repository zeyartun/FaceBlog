@extends('Back/layouts/master')

@section('title','HOME')
    
@section('content')
  <div class="container-fluid">
    <div class="mb-3 p-2"><a href={{url('/adminHome/post/new')}} class="btn btn-success"> New Post </a></div>
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          {{ session('success') }}
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
          </div>            
        @endif
  </div>
  <hr>
  <div class="container-fluid">
    <div class="row">
      @foreach($posts as $post)
      <div class="col-md-3">
        <div class="card p-3">
          <div class="card-header"><h3>{{$post->post_title}}</h3></div>          
          <div class="card-body">
            <img src={{asset($post->image)}} alt="" class="w-100">
            {{ Str::limit($post->post_content,200)}}
          </div>
          <div class="card-footer">
            <a href={{url('/adminHome/post/'.$post->id.'/delete')}} class="btn btn-danger">Delete</a>
            <a href="{{url('/adminHome/post/'.$post->id.'/edit')}}" class="btn btn-info">Edit</a>
          </div>
        </div>
      </div>
      @endforeach
    </div>
    {{$posts->links()}}
  </div>
@endsection