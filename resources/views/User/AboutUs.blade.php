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

    <!-- Our Testimonial Section -->
    @if(isset($testimonial) && count($testimonial) > 0)
    <section class="spad pt-4 pb-5 bg-light">
        <div class="container">
            <div class="service-heading">
                <h2 class="mb-4 color-green fw-bold text-center heading">OUR TESTIMONIAL</h2>
                <div class="text-center">
                    <button class="btn btn-outline-success prev-btn"><i class="fas fa-chevron-left"></i></button>
                    <button class="btn btn-outline-success next-btn"><i class="fas fa-chevron-right"></i></button>
                </div>
            </div>
            <div class="owl-carousel testimonial-carousel">
                @foreach($testimonial as $t)
                <div class="card px-5 pt-4 pb-2 testimonial-box">
                    <div class="d-flex align-items-center mb-3">
                        <img src="{{ asset('public/Assets/images/testimonial/'.$t->image) }}" 
                            class="testimonial-img rounded-circle me-4" 
                            alt="Client">
                        <div class="testimonial text-start">
                            <h6 class="text-success">{{ $t->name }}</h6>
                            <p class="small m-0">At {{ $t->company_name }}</p>
                        </div>
                    </div>
                    {!! $t->message !!}
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

</main>
@endsection