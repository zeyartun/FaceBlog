@extends('Back/layouts/master')

@section('title','HOME')
    
@section('content')
<section>
    <div class="container p-5">       

    <form action="{{url('adminHome/post/SavePost')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
          <label for="">Post Title</label>
          <input type="text" class="form-control" id="" name="PostTitle">
        </div>
        <div class="form-group">
          <label for="" class="mb-2">Select Category</label>
          @foreach ($categories as $category)
          <div>
            <input type="checkbox" name="category_names[]" id="{{$category->category_name}}" value="{{$category->id}}"> 
            <label for="{{$category->category_name}}">{{$category->category_name}}</label>
          </div>
          @endforeach
        </div>
        <div class="form-group">
          <label for="">Post Content</label>
          <textarea class="form-control" id="" rows="10" name="PostContent"></textarea>
        </div>
        <div class="custom-file">
          <input type="file" class="custom-file-input" id="customFile" name="file" multiple>
          <label class="custom-file-label" for="customFile">Choose Image</label>
        </div>
        <button type="submit" class="btn btn-primary mt-3 float-right px-5">Post</button>
      </form>
      </div>
    </div>
</section>
@endsection