<section id="features" class="features">
    <div class="container">

      <div class="section-title" data-aos="fade-up">
        <h2>Categories</h2>
        <p>Check The Categories</p>
      </div>
      <div class="row">
        @foreach ($categories as $category)
        <div class="col-lg-3 col-md-4 col-6 mt-4">
          <a href="{{url('/posts?category='.$category->id)}}">
          <div class="icon-box" data-aos="zoom-in" data-aos-delay="400">
            <i class="ri-price-tag-2-line" style="color: #4233ff;"></i>
          <h3>{{$category->category_name}}</h3>
          </div>
        </a>
        </div>
        @endforeach     
        
      </div>

    </div>
  </section>