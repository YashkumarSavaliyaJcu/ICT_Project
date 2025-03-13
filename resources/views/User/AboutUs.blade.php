@extends('User.Master')
@section('body')
<main class="main">

  <section class="breadcrumb-section">
    <h1>ABOUT US</h1>
    <nav class="breadcrumbs">
      <a href="{{url('/')}}">HOME</a>
      <span>/</span>
      <a>ABOUT US</a>
    </nav>
  </section>

  <!-- About Us Section -->
  <section id="about" class="py-5 bg-light pt-100">
    <div class="container">
      <div class="row">
        <div class="col-xl-6">
            <img src="{{ asset('public/Assets') }}/img/about.png" alt="about" />
        </div>
        <div class="col-xl-6">
            <h2 class="mb-4 color-green fw-bold heading">About Us</h2>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
        </div>
      </div>
    </div>
  </section>

   <!-- Our Team Section -->
   <section class="spad pt-4 pb-5">
        <div class="container">
            <h2 class="text-center fw-bold text-success mb-4">OUR TEAM</h2>
            <div class="row justify-content-center">
                
                <!-- Team Member 1 -->
                <div class="col-md-4 text-center">
                    <div class="team-card">
                        <img src="{{ asset('public/Assets') }}/img/about.png" class="team-img img-fluid" alt="Team Member">
                        <div class="team-overlay">
                            <h5 class="fw-bold text-white">Mayank Sheladitya</h5>
                            <p class="small text-white">Founder / Cleaner</p>
                            <div>
                                <a href="#" class="text-white me-2"><i class="fab fa-facebook"></i></a>
                                <a href="#" class="text-white me-2"><i class="fab fa-twitter"></i></a>
                                <a href="#" class="text-white me-2"><i class="fab fa-linkedin"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Team Member 2 -->
                <div class="col-md-4 text-center">
                    <div class="team-card">
                        <img src="{{ asset('public/Assets') }}/img/about.png" class="team-img img-fluid" alt="Team Member">
                        <div class="team-overlay">
                            <h5 class="fw-bold text-white">Mayank Sheladitya</h5>
                            <p class="small text-white">Founder / Cleaner</p>
                            <div>
                                <a href="#" class="text-white me-2"><i class="fab fa-facebook"></i></a>
                                <a href="#" class="text-white me-2"><i class="fab fa-twitter"></i></a>
                                <a href="#" class="text-white me-2"><i class="fab fa-linkedin"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Team Member 3 -->
                <div class="col-md-4 text-center">
                    <div class="team-card">
                        <img src="{{ asset('public/Assets') }}/img/about.png" class="team-img img-fluid" alt="Team Member">
                        <div class="team-overlay">
                            <h5 class="fw-bold text-white">Mayank Sheladitya</h5>
                            <p class="small text-white">Founder / Cleaner</p>
                            <div>
                                <a href="#" class="text-white me-2"><i class="fab fa-facebook"></i></a>
                                <a href="#" class="text-white me-2"><i class="fab fa-twitter"></i></a>
                                <a href="#" class="text-white me-2"><i class="fab fa-linkedin"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </section>

    <!-- Our Testimonial Section -->
    <section class="spad pt-4 pb-5 bg-light">
        <div class="container">
            <h2 class="text-center fw-bold text-success mb-4">OUR TESTIMONIAL</h2>
            <div class="row justify-content-center">
                
                <!-- Testimonial 1 -->
                <div class="col-md-5">
                    <div class="card border-0 shadow-sm p-3">
                        <div class="d-flex align-items-center">
                            <img src="{{ asset('public/Assets') }}/img/about.png" class="testimonial-img me-3" alt="Client">
                            <div>
                                <h6 class="fw-bold">Mayank Sheladitya</h6>
                                <p class="small text-muted">At Google</p>
                            </div>
                        </div>
                        <p class="mt-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed diam nonummy nibh euismod tincidunt ut.</p>
                    </div>
                </div>

                <!-- Testimonial 2 -->
                <div class="col-md-5">
                    <div class="card border-0 shadow-sm p-3">
                        <div class="d-flex align-items-center">
                            <img src="{{ asset('public/Assets') }}/img/about.png" class="testimonial-img me-3" alt="Client">
                            <div>
                                <h6 class="fw-bold">Mayank Sheladitya</h6>
                                <p class="small text-muted">At Google</p>
                            </div>
                        </div>
                        <p class="mt-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed diam nonummy nibh euismod tincidunt ut.</p>
                    </div>
                </div>

            </div>
        </div>
    </section>

</main>
@endsection