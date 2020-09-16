@extends('Back/layouts/master')

@section('title','HOME')
    
@section('content')
    <div class="container-fluid">
      <a href="category/new" class="btn btn-success m-3">New</a>
      <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">#ID</th>
            <th scope="col">Category Name</th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($categories as $category)
          <tr>
            <th scope="row">{{$category->id}}</th>
            <td>{{$category->category_name}}</td>
            <td><a href="category/{{$category->id}}/edit">Edit</a></td>
            <td><a href="category/{{$category->id}}/Delete" class="text-danger">Delete</a></td>
          </tr>
          @endforeach          
        </tbody>        
      </table> 
    </div>
@endsection