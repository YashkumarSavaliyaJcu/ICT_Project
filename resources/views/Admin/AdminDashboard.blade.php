@extends('Admin.Master')
@section('body')
<main role="main" class="main-content">
    <div class="container-fluid">
      <div class="row justify-content-center">
        <div class="col-12">
          <div class="row">
            <div class="col-md-6 col-xl-3 mb-4 dash">
              <a href="{{url('Admin/services')}}">
                <div class="card shadow border-0">
                  <div class="card-body dash-box-shadow">
                    <div class="row align-items-center">
                      <div class="col-3 text-center">
                        <span class="circle circle-sm bg-primary">
                          <i class="fe fe-tag fe-16 text-white mb-0"></i>
                        </span>
                      </div>
                      <div class="col pr-0">
                        <p class="small text-primary font-weight-bold mb-0">Total Services</p>
                        <span class="h3 mb-0">{{count($totalservices)}}</span>
                      </div>
                    </div>
                  </div>
                </div>
              </a>
            </div>
            <div class="col-md-6 col-xl-3 mb-4 dash">
              <a href="{{url('Admin/users')}}">
                <div class="card shadow border-0">
                  <div class="card-body dash-box-shadow">
                    <div class="row align-items-center">
                      <div class="col-3 text-center">
                        <span class="circle circle-sm bg-primary">
                          <i class="fe fe-16 fe-users text-white mb-0"></i>
                        </span>
                      </div>
                      <div class="col pr-0">
                        <p class="small text-primary font-weight-bold mb-0">Total Users</p>
                        <span class="h3 mb-0">{{count($totalusers)}}</span>
                      </div>
                    </div>
                  </div>
                </div>
              </a>
            </div>
            <div class="col-md-6 col-xl-3 mb-4 dash">
              <a href="{{url('Admin/blogs')}}">
                <div class="card shadow border-0">
                  <div class="card-body dash-box-shadow">
                    <div class="row align-items-center">
                      <div class="col-3 text-center">
                        <span class="circle circle-sm bg-primary">
                          <i class="fe fe-feather fe-16 text-white mb-0"></i>
                        </span>
                      </div>
                      <div class="col pr-0">
                        <p class="small text-primary font-weight-bold mb-0">Total Blogs</p>
                        <span class="h3 mb-0">{{count($totalblogs)}}</span>
                      </div>
                    </div>
                  </div>
                </div>
              </a>
            </div>
            <div class="col-md-6 col-xl-3 mb-4 dash">
              <a href="{{url('Admin/coupons')}}">
                <div class="card shadow border-0">
                  <div class="card-body dash-box-shadow">
                    <div class="row align-items-center">
                      <div class="col-3 text-center">
                        <span class="circle circle-sm bg-primary">
                          <i class="fe fe-percent fe-16 text-white mb-0"></i>
                        </span>
                      </div>
                      <div class="col pr-0">
                        <p class="small text-primary font-weight-bold mb-0">Total Coupons</p>
                        <span class="h3 mb-0">{{count($totalcoupons)}}</span>
                      </div>
                    </div>
                  </div>
                </div>
              </a>
            </div>
          </div>
          <!-- end section -->
        </div>
      </div> <!-- .row -->
    </div> <!-- .container-fluid -->
  </main> <!-- main -->
@endsection