@extends('User.Master')
@section('body')

<main class="main">

    <!-- Breadcrumb Section -->
    <section class="breadcrumb-section">
        <h1 class="fw-bold">CONFIRMATION</h1>
        <nav class="breadcrumbs">
            <a href="{{ url('/') }}" class="text-white text-decoration-none">HOME</a>
            <span class="text-white"> / </span>
            <a href="{{ url('/booking') }}" class="text-white text-decoration-none">BOOKING</a>
            <span class="text-white"> / </span>
            <a class="text-white">CONFIRMATION</a>
        </nav>
    </section>
    <!-- Confirmation Section -->
    <section class="spad pt-4 pb-5">
        <div class="container">
            <div class="row justify-content-center">
                <!-- Booking Confirmation -->
                <div class="col-lg-5">
                    <div class="category-title">
                        <span class="bar"></span>
                        <h3>Booking Confirmed!</h3>
                    </div>
                    @foreach($orderdetails as $key => $value)
                    <ul class="confirmation-box list-group list-group-flush mb-3" key="{{$key}}">
                        <li class="list-group-item d-flex justify-content-between">
                            <div class="d-flex flex-column">
                                <span class="color-green fw-bold">Service Type</span> 
                                <span>{{$value->s_title}}</span>
                            </div>
                            <div class="d-flex flex-column align-items-end">
                                <span class="color-green fw-bold">Service duration</span> 
                                <span>{{$value->cleaning_hour}} hours</span>
                            </div>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                            <div class="d-flex flex-column">
                                <span class="color-green fw-bold">Service Price</span> 
                                <span>${{number_format($value->price,2)}}</span>
                            </div>
                            <div class="d-flex flex-column align-items-end">
                                <span class="color-green fw-bold">Service Time</span> 
                                <span>{{$value->visiting_hours}}</span>
                            </div>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                            <div class="d-flex flex-column">
                                <span class="color-green fw-bold">Contact Number</span> 
                                <span>{{$value->s_contact}}</span>
                            </div>
                            <div class="d-flex flex-column align-items-end">
                                <span class="color-green fw-bold">Email</span> 
                                <span>{{$value->s_email}}</span>
                            </div>
                        </li>
                    </ul>
                    @endforeach
                </div>

                <!-- Service Provider Information -->
                <div class="col-lg-5">
                    <div class="category-title">
                        <span class="bar"></span>
                        <h3>
                            ORDER SUMMARY #{{$orderdetails[0]->s_o_id}} 
                        </h3>
                    </div>
                    <div class="confirmation-box">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item d-flex justify-content-between">
                                <span class="color-green fw-bold">Order Number</span> 
                                <strong>#{{$value->s_o_id}}</strong>
                            </li>
                            <li class="list-group-item d-flex justify-content-between">
                                <span class="color-green">Name</span> 
                                <span>{{$value->full_name ?? '-'}}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between">
                                <span class="color-green">Service Date</span> 
                                <span>{{date('M d, Y',strtotime($value->selected_date))}}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between">
                                <span class="color-green">Service Address</span> 
                                <span>{{$value->address}}, {{$value->postcode}}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between">
                                <span class="color-green">Additional Note</span> 
                                <span>{{$value->additional_notes ?? '-'}}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between">
                                <span class="color-green">Suburb</span> 
                                <span>{{$value->suburb}}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between">
                                <span class="color-green">Payment Id</span> 
                                <span>{{$value->payment_id ?? '-'}}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between">
                                <span class="color-green fw-bold">Order Status</span> 
                                <span class="badge bg-{{ $orderdetails[0]->order_status == 2 ? 'success' : ($orderdetails[0]->order_status == 1 ? 'warning' : 'primary') }}">
                                    {{ $orderdetails[0]->order_status == 0 ? 'Placed' : ($orderdetails[0]->order_status == 1 ? 'Processing' : 'Completed') }}
                                </span>
                            </li>
                        </ul>
                    </div>
                    <div class="confirmation-box mt-3">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item d-flex justify-content-between">
                                <span class="color-green">Base Service Cost:</span> 
                                <strong>${{number_format($value->total_amount+$value->discount_amount,2)}}</strong>
                            </li>
                            <li class="list-group-item d-flex justify-content-between">
                                <span class="color-green">Taxes/Fees:</span> 
                                <strong>$0.00</strong>
                            </li>
                            <li class="list-group-item d-flex justify-content-between">
                                <span class="color-green">Discount:</span> 
                                <strong id="discount">${{number_format($value->discount_amount,2)}}</strong>
                            </li>
                            <li class="list-group-item d-flex justify-content-between font-weight-bold border-0" style="font-size: 18px;">
                                <span class="color-green fw-bold">Total Amount:</span> 
                                <strong id="famount">${{number_format($value->total_amount,2)}}</strong>
                            </li>
                            <li class="list-group-item text-success fw-bold d-flex justify-content-center align-items-center" style="font-size: 18px;">
                                <img src="{{ asset('public/Assets') }}/img/checked.png" alt="..." class="rounded-circle"> <span class="ml-10">PAID</span>
                            </li>
                        </ul>
                    </div>
                    <div class="confirmation-box text-center mt-3">
                        <div class="card-body p-3">
                            <h4 class="text-success fw-bold">REMINDER</h4>
                            <p>You’ll Receive A Reminder 24 Hours Before Your Service.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</main>

@endsection