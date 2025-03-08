@extends('User.Master')
@section('body')
  <main class="main">

    <section class="breadcrumb-section">
      <h1>CONTACT US</h1>
      <nav class="breadcrumbs">
        <a href="{{url('/')}}">HOME</a>
        <span>/</span>
        <a>CONTACT US</a>
      </nav>
    </section>

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