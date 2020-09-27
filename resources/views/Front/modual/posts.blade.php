<section id="counts" class="counts">
    <div class="container">
    <div class="section-title" data-aos="fade-up">
        <h2>All Posts</h2>
        <p>Read Our Posts</p>

    </div>
      <div class="row">          
          @foreach ($AllPosts as $post)                
          <div class="col-md-4 col-6">
              <div class="card mb-4 gallery-item"  data-aos="zoom-in">
                  @if ($post->image != null)
                      <a href={{url('/post/'.$post->id.'/view')}}>
                          <img class="img-fluid" src="{{ asset($post->image)}}" class="card-img-top" alt="...">
                      </a>
                  @endif                    
                  <div class="card-body">
                  <h5 class="card-title">{{$post->post_title}}</h5>
                  <p>Author By <b>{{$post->user->name}}</b> <br> <i>{{date('d-m-Y',strtotime($post->created_at))}}</i></p>
                  <div class="visible-lg visible-md">
                      <p class="card-text">{{ Str::limit($post->post_content,50) }}</p>
                  </div>
                  <a href={{url('/post/'.$post->id.'/view')}} class="btn btn-primary">View</a>
                  </div>
              </div>
          </div>          
          @endforeach            
      </div>
      <div>{{$AllPosts->links()}}</div>
  </div>
  </section>