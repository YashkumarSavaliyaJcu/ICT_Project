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

    <!-- Contact Information Section -->
    <section class="py-5">
        <div class="container">
            <div class="row justify-content-center">
                <!-- Phone Box -->
                <div class="col-md-4">
                    <div class="border rounded p-4 shadow-sm d-flex align-items-center bg-white">
                        <div class="icon-box bg-success text-white rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 50px; height: 50px;">
                            <i class="fas fa-phone fs-5"></i>
                        </div>
                        <div>
                            <h6 class="fw-bold text-success mb-1">Phone</h6>
                            <p class="mb-0">+61 489263036</p>
                            <p>+61 489263036</p>
                        </div>
                    </div>
                </div>

                <!-- Email Box -->
                <div class="col-md-4">
                    <div class="border rounded p-4 shadow-sm d-flex align-items-center bg-white">
                        <div class="icon-box bg-success text-white rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 50px; height: 50px;">
                            <i class="fas fa-envelope fs-5"></i>
                        </div>
                        <div>
                            <h6 class="fw-bold text-success mb-1">Email</h6>
                            <p class="mb-0">ebct123@gmail.com</p>
                            <p>ebct1@gmail.com</p>
                        </div>
                    </div>
                </div>

                <!-- Location Box -->
                <div class="col-md-4">
                    <div class="border rounded p-4 shadow-sm d-flex align-items-center bg-white">
                        <div class="icon-box bg-success text-white rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 50px; height: 50px;">
                            <i class="fas fa-map-marker-alt fs-5"></i>
                        </div>
                        <div>
                            <h6 class="fw-bold text-success mb-1">Location</h6>
                            <p class="mb-0">St Street, Newyork City, NFD</p>
                            <p>James Cook, Brisbane.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <!-- Google Maps Section -->
    <section class="py-4">
        <div class="container">
            <div class="rounded shadow-sm overflow-hidden">
                <iframe 
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3151.8354345093703!2d144.955928315892!3d-37.81720974201247!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad65d5df1f1f1f7%3A0x7d53e1a4b2b5f74!2sBrisbane!5e0!3m2!1sen!2sau!4v1639640703726!5m2!1sen!2sau" 
                    width="100%" height="350" style="border:0;" allowfullscreen="" loading="lazy">
                </iframe>
            </div>
        </div>
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