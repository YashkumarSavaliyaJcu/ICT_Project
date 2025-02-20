@extends('User.Master')
@section('body')
<main class="main">
  <section class="breadcrumb-section">
      <h1>OUR SERVICE</h1>
      <nav class="breadcrumbs">
        <a href="{{url('/')}}">HOME</a>
        <span>/</span>
        <a>OUR SERVICE</a>
      </nav>
  </section>
  
  <!-- Services Section -->
  <section id="services" class="py-5">
      <div class="container">
          <h2 class="mb-4 color-green fw-bold text-center heading">Our Services</h2>
          <div class="row">
            @if(isset($services) && count($services)>0)
            @foreach($services as $s)
              <div class="col-md-4">
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
              @endif
          </div>
      </div>
  </section>
</main>
@endsection