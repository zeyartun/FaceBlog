@extends('Front.layouts.app')

@section('title','Posts')
    
@section('content')

    <div class="container">
        <div class="row">
            
            @foreach ($AllPosts as $post)                
            <div class="col-4">
                <div class="card mb-4 gallery-item"  data-aos="zoom-in">
                    <a href={{ asset('assets/img/gallery/gallery-1.jpg')}} class="venobox" data-gall="gallery-item">
                        <img class="img-fluid" src={{ asset('assets/img/gallery/gallery-1.jpg')}} class="card-img-top" alt="...">
                    </a>
                    <div class="card-body">
                    <h5 class="card-title">{{$post->post_title}}</h5>
                    <p class="card-text">{{ Str::limit($post->post_content,100) }}</p>
                    <a href={{url('/post/'.$post->id.'/view')}} class="btn btn-primary">View</a>
                    </div>
                </div>
            </div>
            
            @endforeach            
        </div>
        <div>{{$AllPosts->links()}}</div>
        
    </div>

@endsection

