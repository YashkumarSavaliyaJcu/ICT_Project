@extends('User.Master')
@section('body')
<main class="main">

    <section class="breadcrumb-section">
      <h1>BLOGS</h1>
      <nav class="breadcrumbs">
        <a href="{{url('/')}}">HOME</a>
        <span>/</span>
        <a>BLOGS</a>
      </nav>
    </section>

    <section id="blogs" class="blog-section py-5">
      <div class="container">
          <h2 class="mb-4 color-green fw-bold text-center heading">Our Blogs</h2>
          <div class="row">
            @foreach($blogs as $blog)
                <div class="col-md-4" key="{{$blog->b_id}}">
                    <div class="blog-card">
                        <img src="{{ asset('public/Assets') }}/images/blogs/{{$blog->b_image}}" alt="{{$blog->b_title}}">
                        <div class="blog-content">
                            <span class="blog-date">{{date('M d',strtotime($blog->b_date))}}</span>
                            <h3>{{$blog->b_title}}</h3>
                            <a href="{{$blog->b_url}}" target="_blank" class="read-more">READ MORE <i class="fa-solid fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            @endforeach
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

    
  </main>
@endsection