@extends('User.Master')
@section('body')
<main class="main">
    <!-- Hero Section -->
    <div class="main-slider-box">
      <div class="container">
          <div class="row">
          <div class="col-xl-6">
              <div class="hero">
                  <div class="Main-slider text-left">
                      <h1 class="text-uppercase mb-4">professional cleaning service at your home</h1>
                      <p class="mb-4 text-uppercase">Experienced, hand-picked Professionals to serve you at your doorstep</p>
                      <div class="btn-box slider-btn">
                          <a href="{{url('/services')}}"><button type="button" class="btn-green text-uppercase">Our Service</button></a>
                          <a href="{{url('/about-us')}}"><button type="button" class="btn-white text-uppercase">About Us</button></a>
                      </div>
                  </div>
              </div>
          </div>
          </div>
      </div>
    </div>

    <!-- About Us Section -->
    <section id="about" class="py-5 bg-light pt-100">
      <div class="container">
        <div class="row">
          <div class="col-xl-6">
              <img src="{{ asset('public/Assets') }}/img/about.png" alt="about" />
          </div>
          <div class="col-xl-6">
              <h2 class="mb-4 color-green fw-bold heading">About Us</h2>
              <p>At James Cleaning service we take pride in delivering top-notch home cleaning services tailored to your needs. Our experienced and professional team ensures your home is spotless, fresh, and welcoming. Whether it’s a one-time deep clean or regular maintenance, we provide efficient and eco-friendly solutions to keep your space shining</p>
              <p>With a commitment to quality and customer satisfaction, we use high-standard cleaning products and techniques to guarantee the best results. Trust us to handle the mess while you enjoy a cleaner, healthier home!</p>

              <div class="btn-box">
                  <a href="{{url('/about-us')}}"><button type="button" class="btn-green text-uppercase">About us</button></a>
              </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Services Section -->
    @if(isset($services) && count($services) > 0)
    <section id="services" class="py-5">
      <div class="container">
          <div class="service-heading">
            <h2 class="mb-4 color-green fw-bold text-center heading">Our Services</h2>
            <a href="{{url('/services')}}"><button type="button" class="btn-green text-uppercase">View All<i class="fa-solid fa-chevron-right ml-10"></i></button></a>
          </div>
          <div class="row">
          @foreach($services as $s)
              <div class="col-md-4" key="{{$s->s_id}}">
                  <div class="card service-box">
                      <img src="{{ asset('public/Assets') }}/images/services/{{$s->s_image}}" class="card-img-top" alt="Service 1">
                      <div class="card-body service-box">
                          <h5 class="card-title color-green fw-bold">{{$s->s_title}}</h5>
                          <p class="card-text"><?php
                            $cleanText = strip_tags($s->s_description);
                            $wrappedText = wordwrap($cleanText, 120, "\n"); // Wrap text at 100 characters
                            $lines = explode("\n", $wrappedText, 2);
                            echo "<p>" . $lines[0] . (isset($lines[1]) ? '...':'') . "</p>";
                          ?></p>
                          <div class="right-box">
                              <img src="{{ asset('public/Assets') }}/images/services/{{$s->s_logo}}" alt="ss1" class="service-logo">
                          </div>
                          <div class="btn-box">
                              <a href={{$s->s_url}}><button type="button" class="btn-green text-uppercase">Explore Services<i class="fa-solid fa-chevron-right ml-10"></i></button></a>
                          </div>
                      </div>
                      
                  </div>
              </div>
            @endforeach
          </div>
      </div>
    </section>
    @endif

    <!-- Blogs Section -->
    @if(isset($blogs) && count($blogs) > 0)
    <section class="blogs py-5 bg-light pt-100">
        <div class="container">
            <div class="service-heading">
                <h2 class="mb-4 color-green fw-bold text-center heading">Our Blogs</h2>
                <a href="{{url('/blogs')}}"><button type="button" class="btn-green text-uppercase">View All<i class="fa-solid fa-chevron-right ml-10"></i></button></a>
            </div>
            <div class="row">
                @foreach($blogs as $blog)
                <div class="col-md-4" key="{{$blog->b_id}}">
                    <div class=" blog-box">
                        <img src="{{ asset('public/Assets') }}/images/blogs/{{$blog->b_image}}" class="blog-image" alt="{{$blog->b_title}}">
                        <div class="card-body blog-box">
                            <a href="{{$blog->b_url}}" target="_blank">
                                <p class="card-text">{{$blog->b_title}}</p>
                            </a>
                            <hr></hr>
                            <div class="date-box text-center">
                                <span class="text-uppercase">{{date('M',strtotime($blog->b_date))}}<br/> {{date('d',strtotime($blog->b_date))}}</span>
                            </div>
                            <div class="Link-box text-center">
                                <a href="{{$blog->b_url}}" target="_blank" class="read-more">Read More<i class="fa-solid fa-arrow-right ml-10"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    <!-- Contact Section -->
    <section id="contact" class="py-5">
      <div class="container">
          <h2 class="mb-4 color-green fw-bold text-center heading">Contact Us</h2>
          <div class="row">
              <div class="col-md-7">
                  <div class="left-contact">
                        <form action="{{url('contactmessage')}}" method="post">
                            @csrf
                            <input type="text" name="hdata" class="d-none">
                            <div class="mb-3 text-boxs">
                                <label for="name" class="form-label poppins-medium color-green">Name</label>
                                <input type="text" name="name" class="form-control custom-textbox" id="name" placeholder="Your Name" required>
                            </div>
                            <div class="mb-3 text-boxs">
                                <label for="phone" class="form-label poppins-medium color-green">Phone no</label>
                                <input type="number" name="phone" class="form-control custom-textbox" id="phone" placeholder="Your Phone No" required>
                            </div>
                            <div class="mb-3 text-boxs">
                                <label for="email" class="form-label poppins-medium color-green">Email</label>
                                <input type="email" name="email" class="form-control custom-textbox" id="email" placeholder="Your Email" required>
                            </div>
                            <div class="mb-3 text-boxs">
                                <label for="message" class="form-label poppins-medium color-green">Message</label>
                                <textarea class="form-control custom-textbox" id="message" name="message" rows="4" placeholder="Your Message"></textarea>
                            </div>
                            <div class="btn-box">
                                <button type="submit" class="btn-green text-uppercase">Send Message<i class="fa-solid fa-chevron-right ml-10"></i></button>
                            </div>
                        </form>
                  </div>
              </div>
              <div class="col-md-5">
                  <div class="contact-img">
                      <img src="{{ asset('public/Assets') }}/img/contact.png" alt="" >
                  </div>
              </div>
          </div>
      </div>
    </section>
</main>
@endsection