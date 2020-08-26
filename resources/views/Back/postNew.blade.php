@extends('Back/layouts/master')

@section('title','HOME')
    
@section('content')
    <div class="container">       

    <form action="{{url('adminHome/post/SavePost')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
          <label for="exampleFormControlInput1">Post Title</label>
          <input type="text" class="form-control" id="" name="PostTitle">
        </div>        
        <div class="form-group">
          <label for="exampleFormControlTextarea1">Post Content</label>
          <textarea class="form-control" id="exampleFormControlTextarea1" rows="15" name="PostContent"></textarea>
        </div>
        <div class="custom-file">
          <input type="file" class="custom-file-input" id="customFile" name="file" multiple>
          <label class="custom-file-label" for="customFile">Choose Image</label>
        </div>
        <button type="submit" class="btn btn-primary mt-3 float-right px-5">Post</button>
      </form>
      </div>
    </div>
@endsection