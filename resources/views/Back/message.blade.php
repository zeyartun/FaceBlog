@extends('Back/layouts/master')

@section('title','HOME')
    
@section('content')
    <div class="container-fluid">
      <a href="messages/trash" class="btn btn-outline-danger mb-3 float-right">Trash Messages</a>
      <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">#ID</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Subject</th>
            <th scope="col">Message</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($messages as $message)
          <tr>
            <th scope="row">{{$message->id}}</th>
            <td>{{$message->name}}</td>
            <td>{{$message->email}}</td>
            <td>{{$message->subject}}</td>
            <td>{{$message->message}}</td>
            <td><a href="{{url('adminHome/messages/'.$message->id.'/hide')}}" class="text-danger">Hide</a></td>

          </tr>
          @endforeach          
        </tbody>        
      </table> 
      {{$messages->links()}}
    </div>
@endsection