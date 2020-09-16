<section id="contact" class="contact">
    <div class="container">

      <div class="section-title" data-aos="fade-up">
        <h2>Contact</h2>
        <p>Contact Us</p>
      </div>

      <div class="row">

        <div class="col-lg-4" data-aos="fade-right" data-aos-delay="100">
          <div class="info">
            <div class="address">
              <i class="icofont-google-map"></i>
              <h4>Location:</h4>
              <p>A108 Adam Street, New York, NY 535022</p>
            </div>

            <div class="email">
              <i class="icofont-envelope"></i>
              <h4>Email:</h4>
              <p>info@example.com</p>
            </div>

            <div class="phone">
              <i class="icofont-phone"></i>
              <h4>Call:</h4>
              <p>+1 5589 55488 55s</p>
            </div>

          </div>

        </div>

        <div class="col-lg-8 mt-5 mt-lg-0" data-aos="fade-left" data-aos-delay="200">

          <form action="{{url('/message/send')}}" method="post" role="form" class="php-email-form">
            @csrf
            <div class="form-row">
              <div class="col-md-6 form-group">
                <input type="text" name="name" required class="form-control" id="name" placeholder="Your Name" class="@error('title') is-invalid @enderror" />
                  @error('name')
                      <div class="alert alert-danger">{{ $message }}</div>
                  @enderror

              </div>
              <div class="col-md-6 form-group">
                <input type="email" class="form-control" required name="email" id="email" placeholder="Your Email" class="@error('title') is-invalid @enderror" />
                @error('email')
                      <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
              </div>
            </div>
            <div class="form-group">
              <input type="text" class="form-control" required name="subject" id="subject" placeholder="Subject" class="@error('title') is-invalid @enderror" />
              @error('subject')
                      <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
            </div>
            <div class="form-group">
              <textarea class="form-control" name="message" required rows="5" data-rule="required" class="@error('title') is-invalid @enderror" placeholder="Message"></textarea>
              @error('message')
                      <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
            </div>
            <div class="mb-3">
              {{-- <div class="loading">Loading</div> --}}
              {{-- <div class="error-message"></div>              --}}
              <div class="">
                @if (session('success'))
                <div class="alert alert-success">{{session('success')}}</div>
                @endif
              </div>
            </div>
            <div class="text-center"><button type="submit">Send Message</button></div>
          </form>

        </div>

      </div>

    </div>
  </section>