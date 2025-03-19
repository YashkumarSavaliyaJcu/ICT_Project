@extends('User.Master')

@section('body')
<section class="breadcrumb-section">
    <h1>My Profile</h1>
    <nav class="breadcrumbs">
    <a href="{{url('/')}}">HOME</a>
    <span>/</span>
    <a>MY PROFILE</a>
    </nav>
</section>

<section class="py-5">
      <div class="container">
          <h2 class="mb-4 color-green fw-bold text-center heading">My Profile</h2>
          <div class="row d-flex justify-content-center">
              <div class="col-md-6">
                  <div class="left-contact">
                  <form action="{{url('updateprofile')}}" method="post">
                  @csrf
                          <div class="mb-3 text-boxs">
                              <label for="name" class="form-label poppins-medium color-green">Name</label>
                              <input type="text" name="name" value="{{$profile->name}}" class="form-control custom-textbox" id="name" placeholder="Your Name" required>
                          </div>
                          <div class="mb-3 text-boxs">
                              <label for="email" class="form-label poppins-medium color-green">Email</label>
                              <input type="email" name="email" value="{{$profile->email}}" class="form-control custom-textbox" id="email" placeholder="Your Email" required disabled>
                          </div>
                          <div class="btn-box text-center">
                              <button type="submit" class="btn-green text-uppercase">Save Changes</button>
                          </div>
                      </form>
                  </div>
              </div>
              
          </div>
      </div>
    </section>

@endsection