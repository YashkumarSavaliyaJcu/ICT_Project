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
    <!-- <section id="services" class="py-5">
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
                                <a href="{{$s->s_url}}"><button type="button" class="btn-green text-uppercase">Explore Services<i class="fa-solid fa-chevron-right ml-10"></i></button></a>
                            </div>
                        </div>
                        
                    </div>
                </div>
                @endforeach
                @endif
            </div>
        </div>
    </section> -->


    <section id="services" class="py-5">
        <div class="container">
            <h2 class="mb-4 color-green fw-bold text-center heading">Our Services</h2>

            <!-- Search Input -->
            <div class="mb-4 text-center">
                <input type="text" id="searchService" class="form-control w-50 mx-auto" 
                    placeholder="Search Services..." autocomplete="off">
            </div>

            <!-- Services List -->
            <div class="row" id="serviceList">
                @if(isset($services) && count($services) > 0)
                    @foreach($services as $s)
                    <div class="col-md-4 service-item">
                        <div class="card service-box">
                            <img src="{{ asset('public/Assets') }}/images/services/{{$s->s_image}}" class="card-img-top" alt="Service">
                            <div class="card-body service-box">
                                <h5 class="card-title color-green fw-bold">{{$s->s_title}}</h5>
                                <p class="card-text">
                                    <?php
                                        $cleanText = strip_tags($s->s_description);
                                        $wrappedText = wordwrap($cleanText, 120, "\n");
                                        $lines = explode("\n", $wrappedText, 2);
                                        echo "<p>" . $lines[0] . (isset($lines[1]) ? '...' : '') . "</p>";
                                    ?>
                                </p>
                                <div class="right-box">
                                    <img src="{{ asset('public/Assets') }}/images/services/{{$s->s_logo}}" alt="ss1" class="service-logo">
                                </div>
                                <div class="btn-box">
                                    <a href="{{ $s->s_url }}"><button type="button" class="btn-green text-uppercase">
                                        Explore Services <i class="fa-solid fa-chevron-right ml-10"></i>
                                    </button></a>
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

    <section class="about-services py-5">
        <div class="container">
            <h2 class="text-center fw-bold text-success mb-4">ABOUT SERVICES</h2>
            <div class="row align-items-center">
                <div class="col-lg-5 col-md-6">
                    <img src="{{ asset('public/Assets') }}/img/about.png" class="img-fluid rounded shadow about-service-img" alt="About Services">
                </div>
                <div class="col-lg-7 col-md-6">
                    <p>At James Cleaning service we take pride in delivering top-notch home cleaning services tailored to your needs. Our experienced and professional team ensures your home is spotless, fresh, and welcoming. Whether it’s a one-time deep clean or regular maintenance, we provide efficient and eco-friendly solutions to keep your space shining</p>
                    <p>With a commitment to quality and customer satisfaction, we use high-standard cleaning products and techniques to guarantee the best results. Trust us to handle the mess while you enjoy a cleaner, healthier home!</p>
                    <ul class="list-unstyled">
                        <li><i class="fas fa-check-circle text-success"></i> Quality Cleaning</li>
                        <li><i class="fas fa-check-circle text-success"></i> Professional Team</li>
                        <li><i class="fas fa-check-circle text-success"></i> Affordable Pricing</li>
                        <li><i class="fas fa-check-circle text-success"></i> Customer Satisfaction</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection

@section('script')
<script>
    $(document).ready(function() {
        $('#searchService').on('keyup', function() {
            let query = $(this).val();
            
            $.ajax({
                url: "{{ route('services.search') }}",
                type: "GET",
                data: { query: query },
                success: function(response) {
                    let servicesHtml = "";

                    if(response.length > 0) {
                        response.forEach(service => {
                            servicesHtml += `
                                <div class="col-md-4 service-item">
                                    <div class="card service-box">
                                        <img src="{{ asset('public/Assets/images/services') }}/${service.s_image}" class="card-img-top" alt="Service">
                                        <div class="card-body service-box">
                                            <h5 class="card-title color-green fw-bold">${service.s_title}</h5>
                                            <p class="card-text">${service.s_description.substring(0, 100)}</p>
                                            <div class="right-box">
                                                <img src="{{ asset('public/Assets/images/services') }}/${service.s_logo}" alt="ss1" class="service-logo">
                                            </div>
                                            <div class="btn-box">
                                                <a href="${service.s_url}"><button type="button" class="btn-green text-uppercase">
                                                    Explore Services <i class="fa-solid fa-chevron-right ml-10"></i>
                                                </button></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            `;
                        });
                    } else {
                        servicesHtml = `
                            <div class="text-center">
                                <img src="{{ asset('public/Assets') }}/img/no-data-found.png" 
                                    alt="No Service">
                            </div>`;
                    }

                    $("#serviceList").html(servicesHtml);
                }
            });
        });
    });
</script>
@endsection