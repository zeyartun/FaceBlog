@extends('Back/layouts/master')

@section('title','HOME')
    
@section('content')
    <div class="container">       

    <form action="{{url('adminHome/post/'.$post->id.'/update')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
          <label for="exampleFormControlInput1">Post Title</label>
          <input type="text" class="form-control" id="" name="PostTitle" value="{{$post->post_title}}">
        </div>        
        <div class="form-group">
          <label for="exampleFormControlTextarea1">Post Content</label>
          <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="PostContent">{{$post->post_content}}</textarea>
        </div>
        <div class="custom-file">
          <input type="file" class="custom-file-input" id="customFile" name="file" multiple>
          <label class="custom-file-label" for="customFile">Choose Image</label>
        </div>
        <button type="submit" class="btn btn-primary mt-3 float-right px-5">Update</button>
      </form>
      <div class="container">
      <img src="{{asset($post->image)}}" alt="" width="200px" class="mt-2">
      </div>
      </div>
    </div>
@endsection