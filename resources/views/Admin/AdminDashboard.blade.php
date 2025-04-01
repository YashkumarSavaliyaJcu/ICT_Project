@extends('Admin.Master')
@section('body')
<main role="main" class="main-content">
    <div class="container-fluid">
      <div class="row justify-content-center">
        <div class="col-12">
          <div class="row">
            <div class="col-md-6 col-xl-3 mb-4 dash">
              <a href="{{url('Admin/booking')}}">
                <div class="card shadow border-0">
                  <div class="card-body dash-box-shadow">
                    <div class="row align-items-center">
                      <div class="col-3 text-center">
                        <span class="circle circle-sm bg-primary">
                          <i class="fe fe-shopping-bag fe-16 text-white mb-0"></i>
                        </span>
                      </div>
                      <div class="col pr-0">
                        <p class="small text-primary font-weight-bold mb-0">Total Booking Orders</p>
                        <span class="h3 mb-0">{{count($totalorders)}}</span>
                      </div>
                    </div>
                  </div>
                </div>
              </a>
            </div>
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
            <div class="col-md-6 col-xl-3 mb-4 dash">
              <a href="{{url('Admin/teams')}}">
                <div class="card shadow border-0">
                  <div class="card-body dash-box-shadow">
                    <div class="row align-items-center">
                      <div class="col-3 text-center">
                        <span class="circle circle-sm bg-primary">
                          <i class="fe fe-users fe-16 text-white mb-0"></i>
                        </span>
                      </div>
                      <div class="col pr-0">
                        <p class="small text-primary font-weight-bold mb-0">Total Teams</p>
                        <span class="h3 mb-0">{{count($totalteams)}}</span>
                      </div>
                    </div>
                  </div>
                </div>
              </a>
            </div>
            <div class="col-md-6 col-xl-3 mb-4 dash">
              <a href="{{url('Admin/testimonial')}}">
                <div class="card shadow border-0">
                  <div class="card-body dash-box-shadow">
                    <div class="row align-items-center">
                      <div class="col-3 text-center">
                        <span class="circle circle-sm bg-primary">
                          <i class="fe fe-edit-3 fe-16 text-white mb-0"></i>
                        </span>
                      </div>
                      <div class="col pr-0">
                        <p class="small text-primary font-weight-bold mb-0">Total Testimonials</p>
                        <span class="h3 mb-0">{{count($totaltestimonials)}}</span>
                      </div>
                    </div>
                  </div>
                </div>
              </a>
            </div>
          </div>

          <div class="row">
              <div class="col-md-12">
                  <div class="card-body">
                      <h2>Booking Orders List</h2>
                      <table class="table datatables display responsive nowrap" id="dataTable-1" style="width:100%">
                          <thead>
                              <tr align="center">
                                  <th class="all">#</th>
                                  <th class="all">Order Id</th>
                                  <th class="all">Name</th>
                                  <th class="none">Email</th>
                                  <th class="all">Service Date</th>
                                  <th class="none">Address</th>
                                  <th class="all">Amount</th>
                                  <th class="all">Payment Id</th>
                                  <th class="all">Order Date</th>
                                  <th class="all">Status</th>
                                  <th class="all">Action</th>
                              </tr>
                          </thead>
                          <tbody>
                              @foreach($orders as $key => $value)
                                  <tr>
                                      <td>{{$key+1}}</td>
                                      <td>#{{$value->s_o_id}}</td>
                                      <td>{{$value->full_name}}</td>
                                      <td>{{$value->email}}</td>
                                      <td>{{date('M d, Y', strtotime($value->selected_date))}}</td>
                                      <td>{{ $value->address }}, {{$value->postcode}}</td>
                                      <td>${{ number_format($value->total_amount, 2) }}</td>
                                      <td>{{ $value->payment_id ?? '-' }}</td>
                                      <td>{{date('M d, Y', strtotime($value->date))}}</td>
                                      <td>
                                          @if($value->order_status==0)
                                              <span class="badge badge-primary">Placed</span><br/>
                                              <button class="btn btn-warning updatestatus mt-1" data="{{$value->s_o_id}}" status="1">Processing</button>
                                          @elseif($value->order_status==1)
                                              <span class="badge badge-warning">Processing</span><br/>
                                              <button class="btn btn-success updatestatus mt-1" data="{{$value->s_o_id}}" status="2">Completed</button>
                                          @elseif($value->order_status==2)
                                              <span class="badge badge-success">Completed</span>
                                          @endif
                                      </td>
                                      <td>
                                          <a href="{{url('Admin/bookingdetails')}}/{{$value->s_o_id}}"><button type="button" class="btn btn-primary"><span class="fe fe-eye"></span></button></a>
                                      </td>
                                  </tr>
                              @endforeach
                          </tbody>
                      </table>
                  </div>
              </div>
          </div>
          <!-- end section -->
        </div>
      </div> <!-- .row -->
    </div> <!-- .container-fluid -->
  </main> <!-- main -->
@endsection