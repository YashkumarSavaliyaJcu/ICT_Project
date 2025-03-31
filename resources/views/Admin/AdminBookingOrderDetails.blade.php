@extends('Admin.Master')
@section('body')
<main role="main" class="main-content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2 class="page-title">
                    Booking Details #{{$booking_detail[0]->s_o_id}}
                    <a href="{{url('Admin/booking')}}"><button type="button" class="btn btn-primary float-right"><span class="fe fe-arrow-left fe-16"></span> Back</button></a>
                </h2>
                {!! session()->get('message') !!}
                <div class="card-body">
                    <table class="table">
                        <tbody>
                            <tr>
                                <th>Order ID:</th>
                                <td>#{{ $booking_detail[0]->s_o_id }}</td>
                                <th>Full Name:</th>
                                <td>{{ $booking_detail[0]->full_name ?? 'Guest' }}</td>
                                <th>Email:</th>
                                <td>{{ $booking_detail[0]->email ?? 'N/A' }}</td>
                            </tr>
                            <tr>
                                <th>Service Date:</th>
                                <td>{{date('M d, Y',strtotime($booking_detail[0]->selected_date))}}</td>
                                <th>Address:</th>
                                <td>{{$booking_detail[0]->address }}, {{$booking_detail[0]->postcode}}</td>
                                <th>Suburb:</th>
                                <td>{{$booking_detail[0]->suburb }}</td>
                            </tr>
                            <tr>
                                <th>Additional Notes:</th>
                                <td>{{$booking_detail[0]->additional_notes ?? '-'}}</td>
                                <th>Payment ID:</th>
                                <td>{{ $booking_detail[0]->payment_id ?? '-' }}</td>
                                <th>Order Status:</th>
                                <td>
                                    @if($booking_detail[0]->order_status==0)
                                    <span class="badge badge-primary">Placed</span><br/>
                                    @elseif($booking_detail[0]->order_status==1)
                                    <span class="badge badge-warning">Processing</span><br/>
                                    @elseif($booking_detail[0]->order_status==2)
                                    <span class="badge badge-success">Completed</span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Amount:</th>
                                <td>${{ number_format($booking_detail[0]->total_amount+$booking_detail[0]->discount_amount, 2) }}</td>
                                <th>Discount Amount:</th>
                                <td>${{ number_format($booking_detail[0]->discount_amount, 2) }}</td>
                                <th>Total Amount:</th>
                                <td>${{ number_format($booking_detail[0]->total_amount, 2) }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card-body">
                            <table class="table" style="width:100%">
                                <thead>
                                    <tr align="center">
                                        <th class="all">#</th>
                                        <th class="all">Image</th>
                                        <th class="all">Service Type</th>
                                        <th class="all">Service Duration</th>
                                        <th class="all">Service Time</th>
                                        <th class="all">No. of Cleaners</th>
                                        <th class="all">Price</th>
                                        <th class="all">Contact Number</th>
                                        <th class="all">Email</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($booking_detail as $key => $value)
                                        <tr align="center">
                                            <td>{{$key+1}}</td>
                                            <td>
                                                <img src="{{asset('public/Assets/images/services')}}/{{$value->s_image?$value->s_image:'dummy.png'}}" title="{{$value->s_image}}" width="80px" height="80px"/>
                                            </td>
                                            <td>{{$value->s_title}}</td>
                                            <td>{{$value->cleaning_hour}} Hours</td>
                                            <td class="text-uppercase">{{$value->visiting_hours}}</td>
                                            <td>{{$value->no_of_cleaner}}</td>
                                            <td>${{number_format($value->price,2)}}</td>
                                            <td>{{$value->s_contact}}</td>
                                            <td>{{$value->s_email}}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
    </div>
</main>
@endsection