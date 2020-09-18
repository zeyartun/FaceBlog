@extends('Front.layouts.app')

@section('title','MMITS | Home')

@section('content')
<main id="main">
  
  
  @include('Front.layouts.hero')
  <div class="p-2 m-2 text-success text-center">
    {{ __('lang.message') }} 
    {{ __('lang.greeting') }}
    {{-- {{dd($session)}} --}}
  </div>

    <!-- ======= About Section ======= -->
    @include('Front.modual.about')
    <!-- End About Section -->

    
    <!-- ======= Features Section ======= -->
    @include('Front.modual.features')
    <!-- End Features Section -->

    <!-- ======= posts Section ======= -->
    @include('Front.modual.posts')
    <!-- End posts Section -->

    <!-- ======= Details Section ======= -->
    @include('Front.modual.Detail')
    <!-- End Details Section -->

    <!-- ======= Gallery Section ======= -->
    @include('Front.modual.gallery')
    <!-- End Gallery Section -->

    <!-- ======= Testimonials Section ======= -->
    @include('Front.modual.testimonials')
    <!-- End Testimonials Section -->

    <!-- ======= Team Section ======= -->
    @include('Front.modual.team')
    <!-- End Team Section -->

    <!-- ======= Pricing Section ======= -->
    @include('Front.modual.pricing')
    <!-- End Pricing Section -->

    <!-- ======= F.A.Q Section ======= -->
    @include('Front.modual.faq')
    <!-- End F.A.Q Section -->

    <!-- ======= Contact Section ======= -->
    @include('Front.modual.contact')
    <!-- End Contact Section -->

  </main><!-- End #main -->
@endsection