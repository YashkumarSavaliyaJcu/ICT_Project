@extends('User.Master')

@section('body')
<section class="breadcrumb-section">
    <h1>Change Password</h1>
    <nav class="breadcrumbs">
    <a href="{{url('/')}}">HOME</a>
    <span>/</span>
    <a>CHANGE PASSWORD</a>
    </nav>
</section>

<section class="py-5">
      <div class="container">
          <h2 class="mb-4 color-green fw-bold text-center heading">Change Password</h2>
          <div class="row d-flex justify-content-center">
              <div class="col-md-6">
                  <div class="left-contact">
                    <form action="{{url('change-password')}}" method="post">
                        @csrf
                        <div class="mb-3 text-boxs">
                            <label for="oldpassword" class="form-label poppins-medium color-green">Old Password</label>
                            <input type="password" name="oldpassword" class="form-control custom-textbox" id="oldpassword" placeholder="Old Password" required>
                            <span class="text-danger mb-1 small font-weight-normalbold">{{ $errors->first('oldpassword') }}</span>
                        </div>
                        <div class="mb-3 text-boxs">
                            <label for="new_password" class="form-label poppins-medium color-green">New Password</label>
                            <input type="password" name="new_password" class="form-control custom-textbox" id="new_password" placeholder="New Password" required>
                            <span class="text-danger mb-1 small font-weight-normalbold">{{ $errors->first('password') }}</span>
                        </div>
                        <div class="mb-3 text-boxs">
                            <label for="c_password" class="form-label poppins-medium color-green">Confirm New Password</label>
                            <input type="password" name="c_password" class="form-control custom-textbox" id="c_password" placeholder="Confirm New Password" required>
                            <span class="text-danger mb-1 small font-weight-normalbold">{{ $errors->first('c_password') }}</span>
                        </div>
                        <div class="btn-box text-center">
                            <button type="submit" class="btn-green text-uppercase">Change Password</button>
                        </div>
                    </form>
                  </div>
              </div>
              
          </div>
      </div>
    </section>

@endsection