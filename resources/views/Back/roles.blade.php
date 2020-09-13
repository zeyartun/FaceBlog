@extends('Back/layouts/master')

@section('title','HOME')
    
@section('content')
    <div class="container-fluid">
      
      <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">#ID</th>
            <th scope="col">Role Name</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($roles as $role)
          <tr>
            <th scope="row">{{$role->id}}</th>
            <td>{{$role->role_name}}</td>
          </tr>
          @endforeach          
        </tbody>        
      </table> 
    </div>
@endsection