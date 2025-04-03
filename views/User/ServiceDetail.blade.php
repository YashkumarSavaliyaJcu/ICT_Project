@extends('User.Master')
@section('body')
<main class="main">
  <section class="breadcrumb-section">
      <h1>SERVICE DETAIL</h1>
      <nav class="breadcrumbs">
        <a href="{{url('/')}}">HOME</a>
        <span>/</span>
        <a href="{{url('/services')}}">OUR SERVICE</a>
        <span>/</span>
        <a>SERVICE DETAIL</a>
      </nav>
  </section>
  
  <div class="service-detail-container">
    <main>
        <div class="main-image">
            <img src="{{ asset('public/Assets') }}/images/services/{{$service->s_image}}" alt="Window Cleaning Service">
        </div>
        
        <h1 class="service-title">
            {{$service->s_title}}
        </h1>
        {!!$service->s_description!!}

        <div class="features">
            <div class="feature-box">
                <div class="feature">
                    <i class="fa-solid fa-check-circle"></i>
                    <h3>Quality We Ensure</h3>
                </div>
                <p>Ahen An Unknown Printer Took A Galley Of Type And Scraed It To Make.</p>
            </div>
            <div class="feature-box">
                <div class="feature">
                    <i class="fa-solid fa-check-circle"></i>
                    <h3>Experienced Workers</h3>
                </div>
                <p>Ahen An Unknown Printer Took A Galley Of Type And Scraed It To Make.</p>
            </div>
        </div>

        {!!$service->s_detail_description!!}

        <div class="service-info">
            <div class="category-title">
                <span class="bar"></span>
                <h3>Service Information</h3>
            </div>
            <div class="info-grid">
                <div class="info-item">
                    <p>Price</p>
                    <span>${{$service->s_price}}</span>
                </div>
                <div class="info-item">
                    <p>Cleaning Hours</p>
                    <span>{{$service->cleaning_hour}}</span>
                </div>
                <div class="info-item">
                    <p>Num. Of Cleaners</p>
                    <span>{{$service->no_of_cleaner}}</span>
                </div>
                <div class="info-item">
                    <p>Visiting Hours</p>
                    <span>{{$service->visiting_hours}}</span>
                </div>
                <div class="info-item">
                    <p>Contact</p>
                    <span>{{$service->s_contact}}</span>
                </div>
                <div class="info-item">
                    <p>E-Mail</p>
                    <span>{{$service->s_email}}</span>
                </div>
            </div>
            <a class="booking-btn addtocart" data="{{$service->s_id}}">BOOKING CONFIRMATION <i class="fa-solid fa-arrow-right ml-10"></i></a>
        </div>
        <div class="row mt-5">
          <div class="col-md-6">
            <img
              src="{{ asset('public/Assets') }}/img/about.png"
              class="rounded me-3"
              alt="Experienced People"
            />
          </div>
          <div class="col-md-6">
            <div>
              <h5 class="fw-bold text-success mb-2">
                Experienced People Can Help You More.
              </h5>
              <p class="text-muted">
                We have a skilled team to provide the best cleaning service.
              </p>
              <ul class="list-unstyled">
                <li class="d-flex align-items-center py-1">
                  <i class="fas fa-check-circle text-success me-2"></i> Quality
                  Cleaning
                </li>
                <li class="d-flex align-items-center py-1">
                  <i class="fas fa-check-circle text-success me-2"></i>
                  Professional Team
                </li>
                <li class="d-flex align-items-center py-1">
                  <i class="fas fa-check-circle text-success me-2"></i>
                  Affordable Pricing
                </li>
                <li class="d-flex align-items-center py-1">
                  <i class="fas fa-check-circle text-success me-2"></i> Customer
                  Satisfaction
                </li>
              </ul>
            </div>
          </div>
        </div>
    </main>

    <aside>
        <div class="contact-form">
            <div class="category-title">
                <span class="bar"></span>
                <h3>Contact Us</h3>
            </div>
            <form action="{{url('contactmessage')}}" method="post">
                @csrf
                <input type="text" name="hdata" class="d-none">
                <input type="text" placeholder="Name" class="form-input" name="name" required>
                <input type="email" placeholder="Email" class="form-input" name="email" required>
                <input type="number" placeholder="Phone No" class="form-input" name="phone" required>
                <textarea placeholder="Message" class="form-input" name="message" rows="4"></textarea>
                <button type="submit" class="submit-btn text-uppercase">Send Message<i class="fa-solid fa-chevron-right ml-10"></i></button>
            </form>
        </div>

    </aside>
    </div>
</main>
@endsection