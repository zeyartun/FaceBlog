@extends('Back/layouts/master')

@section('title','HOME')
    
@section('content')
    <div class="container-fluid">
      <a href="{{url('adminHome/comment')}}" class="btn btn-info mb-3 float-right">comments</a>
      <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">#ID</th>
            <th scope="col">User</th>
            <th scope="col">Post Title</th>
            <th scope="col">Comment</th>
            {{-- <th scope="col">comment</th> --}}
            <th scope="col">Delete</th>
            <th scope="col">Restore</th>

          </tr>
        </thead>
        <tbody>
          @foreach ($comments as $comment)
          <tr>
            <th scope="row">{{$comment->id}}</th>
            <td>{{$comment->user->name}}</td>
            <td>{{$comment->post->post_title}}</td>
            <td>{{$comment->comment}}</td>
            <td><a href="{{url('adminHome/comment/'.$comment->id.'/delete')}}" class="text-danger">Delete</a></td>
            <td><a href="{{url('adminHome/comment/'.$comment->id.'/store')}}">Restore</a></td>

          </tr>
          @endforeach          
        </tbody>        
      </table> 
      {{$comments->links()}}
    </div>
@endsection