@extends('Back/layouts/master')

@section('title','HOME')
    
@section('content')
    <div class="container-fluid">
      <a href="{{url('adminHome/comment/trash')}}" class="btn btn-outline-danger mb-3 float-right">Trash Comments</a>
      <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">#ID</th>
            <th scope="col">User</th>
            <th scope="col">Post Title</th>
            <th scope="col">Comment</th>
            <th scope="col">Hide</th>

          </tr>
        </thead>
        <tbody>
          @foreach ($comments as $comment)
          <tr>
            <th scope="row">{{$comment->id}}</th>
            <td>{{$comment->user->name}}</td>
            <td>{{$comment->post->post_title}}</td>
            <td>{{$comment->comment}}</td>
            <td><a href="{{url('adminHome/comment/'.$comment->id.'/hide')}}" class="text-danger">Hide</a></td>
          </tr>
          @endforeach          
        </tbody>        
      </table> 
      {{$comments->links()}}
    </div>
@endsection