@extends('Front.layouts.app')

@section('title','Posts')
    
@section('content')

    <div class="container">
        
        <div class="row">
            @for ($i = 1; $i < 9; $i++)
            <div class="col-4">
                <div class="card mb-3">
                <img src={{ asset('assets/img/gallery/gallery-'.$i.'.jpg')}} class="card-img-top w-100 p-1" alt="...">
                    <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
            @endfor
        </div>
    </div>

@endsection

