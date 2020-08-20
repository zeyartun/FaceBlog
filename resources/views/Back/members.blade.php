@extends('Back/layouts/master')

@section('title','HOME')
    
@section('content')
    <div class="container-fluid">
      <div class="row">
        @for ($i = 0; $i < 12; $i++)
        <div class="col-md-3">
          <div class="card p-3">
            <div class="card-header">Hello</div>
            <div class="card-body">Sometime</div>
          </div>
        </div>
        @endfor        
      </div>      
    </div>
@endsection