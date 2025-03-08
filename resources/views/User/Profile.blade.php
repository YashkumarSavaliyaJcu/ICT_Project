@extends('User.Master')

@section('body')

<section id="contact" class="py-5">
      <div class="container">
          <h2 class="mb-4 color-green fw-bold text-center heading">My Profile</h2>
          <div class="row">
              <div class="col-md-12">
                  <div class="left-contact">
                  <form action="{{url('updateprofile')}}" method="post">
                  @csrf
                          <div class="mb-3 text-boxs">
                              <label for="name" class="form-label poppins-medium color-green">Name</label>
                              <input type="text" name="name" value="{{$profile->name}}" class="form-control custom-textbox" id="name" placeholder="Your Name" required>
                          </div>
                          <div class="mb-3 text-boxs">
                              <label for="email" class="form-label poppins-medium color-green">Email</label>
                              <input type="email" name="email" value="{{$profile->email}}" class="form-control custom-textbox" id="email" placeholder="Your Email" required>
                          </div>
                          <div class="btn-box">
                              <button type="submit" class="btn-green text-uppercase">Save Changes<i class="fa-solid fa-chevron-right ml-10"></i></button>
                          </div>
                      </form>
                  </div>
              </div>
              
          </div>
      </div>
    </section>

@endsection