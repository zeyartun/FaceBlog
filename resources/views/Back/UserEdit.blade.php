@extends('Back/layouts/master')

@section('title','HOME')
    
@section('content')
    <div class="container">    
      <div class="text-center">
        <img src="{{asset($user->image)}}" alt="" width="150px" class="img-thumbnail">
        </div>   

    <form action="{{url('adminHome/member/'.$user->id.'/update')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
          <label for="exampleFormControlInput1">User Name</label>
          <input type="text" class="form-control" id="" name="name" value="{{$user->name}}">
        </div>   
        <div class="form-group">
          <label for="exampleFormControlInput1">User Email</label>
          <input type="text" class="form-control" id="" name="email" value="{{$user->email}}">
        </div>     
       
        <div class="custom-file">
          <input type="file" class="custom-file-input" id="customFile" name="file" multiple>
          <label class="custom-file-label" for="customFile">Choose Image</label>
        </div>
        <button type="submit" class="btn btn-primary mt-3 float-right px-5">Update</button>
      </form>
      
      </div>
    </div>
@endsection