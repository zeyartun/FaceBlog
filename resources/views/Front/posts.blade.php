@extends('Front.layouts.app')

@section('title','Posts')
    
@section('content')
<section>
    <div class="container mt-5">
        <div class="row">
            
            @foreach ($AllPosts as $post)                
            <div class="col-md-4">
                <div class="card mb-4 gallery-item"  data-aos="zoom-in">
                    @if ($post->image != null)
                        <a href={{url('/post/'.$post->id.'/view')}}>
                            <img class="img-fluid" src="{{ asset('..//'.$post->image)}}" class="card-img-top" alt="...">
                        </a>
                    @endif                    
                    <div class="card-body">
                    <h5 class="card-title">{{$post->post_title}}</h5>
                    <p>Author By <b>{{$post->user->name}}</b> <br> <i>{{$post->created_at->diffForHumans()}}</i></p>
                    <p class="card-text">{{ Str::limit($post->post_content,100) }}</p>
                    <a href={{url('/post/'.$post->id.'/view')}} class="btn btn-primary">View</a>
                    </div>
                </div>
            </div>
            
            @endforeach            
        </div>
        <div>{{$AllPosts->links()}}</div>
        
    </div>
</section>
@endsection

