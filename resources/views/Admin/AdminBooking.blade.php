@extends('Admin.Master')
@section('body')
<main role="main" class="main-content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2 class="page-title">Booking Orders
                </h2>
                {!! session()->get('message') !!}
                <div class="row">
                    <div class="col-md-12">
                        <div class="card-body">
                            <table class="table datatables display responsive nowrap" id="dataTable-1" style="width:100%">
                                <thead>
                                    <tr align="center">
                                        <th class="all">#</th>
                                        <th class="all">Order Id</th>
                                        <th class="all">Name</th>
                                        <th class="all">Email</th>
                                        <th class="all">Selected Date</th>
                                        <th class="all">Address</th>
                                        <th class="all">Amount</th>
                                        <th class="all">Payment Id</th>
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
            </div>
        </div> 
    </div>
</main>
@endsection