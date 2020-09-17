@extends('Back/layouts/master')

@section('title','HOME')
    
@section('content')
    <div class="container">
      @include('Back.success')
      @include('Back.error')
      <div class="row">
        <div class="col-4">
          <form action="{{url('/adminHome/category/new')}}">
            @csrf
            <label class="m-0">Add New Category</label>
            <div class="row">
              <div class="col-8">
                <input type="text" required name="newCategory" placeholder="New Category" class="form-control my-3 p-1">
              </div>
              <div class="col-4">
                <button type="submit" class="btn btn-success my-3">Add</button>
              </div>
            </div>
          </form>
        </div>
        <div class="col-8">
          <form action="{{url('/adminHome/category/edit')}}">
            @csrf
            <label class="m-0">Edit Category</label>
            <div class="row">
              <div class="col-4">
                <div class="form-group">
                  <select class="form-control my-3 p-1" name="oldCategory">
                    <option disabled selected>Please Select Category</option>
                    @foreach ($categories as $category)
                      <option value="{{$category->id}}">{{$category->category_name}}</option>                        
                    @endforeach                   
                  </select>
                </div>
              </div>
              <div class="col-4">                
                <input type="text" required name="editCategory" placeholder="Update Category" class="form-control my-3 p-1">
              </div>
              <div class="col-2">
                <button type="submit" class="btn btn-info my-3">Update</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    <div class="container-fluid">
      
      <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">#ID</th>
            <th scope="col">Category Name</th>
            <th scope="col">Delete</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($categories as $category)
          <tr>
            <th scope="row">{{$category->id}}</th>
            <td>{{$category->category_name}}</td>
            <td><a href="category/{{$category->id}}/delete" class="text-danger">Delete</a></td>
          </tr>
          @endforeach          
        </tbody>        
      </table> 
    </div>
@endsection