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

    <section id="blogs" class="py-5">
      <div class="container">
          <h2 class="mb-4 color-green fw-bold text-center heading">Our Blogs</h2>
          <div class="row">
            @if(isset($blogs) && count($blogs) > 0)
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
            @else
                <div class="text-center">
                    <img src="{{ asset('public/Assets') }}/img/no-data-found.png" 
                        alt="No Service">
                </div>
            @endif
        </div>
      </div>
    </section>


    <!-- Our Team Section -->
    @if(isset($teams) && count($teams) > 0)
    <section class="spad pt-4 pb-5">
        <div class="container">
            <div class="service-heading">
            <h2 class="mb-4 color-green fw-bold text-center heading">OUR TEAM</h2>
                <div class="text-center">
                    <button class="btn btn-outline-success team-prev-btn"><i class="fas fa-chevron-left"></i></button>
                    <button class="btn btn-outline-success team-next-btn"><i class="fas fa-chevron-right"></i></button>
                </div>
            </div>
            <div class="owl-carousel team-carousel">
                @foreach($teams as $t)
                <div class="team-card text-center">
                    <img src="{{ asset('public/Assets/images/teams/'.$t->t_image) }}" class="team-img img-fluid" alt="Team Member">
                    <div class="team-overlay">
                        <h5 class="fw-bold text-white mb-1">{{ $t->name }}</h5>
                        <p class="small text-white mb-1">{{ $t->position }}</p>
                        <div>
                            <a href="{{ $t->facebook ?: '#' }}" class="text-white me-2"><i class="fab fa-facebook"></i></a>
                            <a href="{{ $t->twitter ?: '#' }}" class="text-white me-2"><i class="fab fa-twitter"></i></a>
                            <a href="{{ $t->youtube ?: '#' }}" class="text-white me-2"><i class="fab fa-youtube"></i></a>
                            <a href="{{ $t->instagram ?: '#' }}" class="text-white me-2"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

  </main>
@endsection