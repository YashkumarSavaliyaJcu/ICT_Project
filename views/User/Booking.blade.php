@extends('User.Master')

@section('body')
<section class="breadcrumb-section">
    <h1>MY BOOKING</h1>
    <nav class="breadcrumbs">
    <a href="{{url('/')}}">HOME</a>
    <span>/</span>
    <a>MY BOOKING</a>
    </nav>
</section>

<section class="py-5">
    <div class="container">
        <h2 class="mb-4 color-green fw-bold text-center heading">My Booking List</h2>
        <table class="table table-bordered datatables display responsive nowrap" id="dataTable-1">
            <thead>
                <tr>
                    <th class="all">Order Id</th>
                    <th class="all">Name</th>
                    <th class="all">Service Date</th>
                    <th class="all">Address</th>
                    <th class="all">Amount ($)</th>
                    <th class="all">Payment ID</th>
                    <th class="all">Status</th>
                    <th class="all">Order Date</th>
                    <th class="all">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $index => $order)
                <tr>
                    <td>#{{ $order->s_o_id }}</td>
                    <td>{{ $order->full_name }}</td>
                    <td>{{date('M d, Y', strtotime($order->selected_date))}}</td>
                    <td>{{ $order->address }}, {{$order->postcode}}</td>
                    <td>${{ number_format($order->total_amount, 2) }}</td>
                    <td>{{ $order->payment_id ?? '-' }}</td>
                    <td>
                        <span class="badge bg-{{ $order->order_status == 2 ? 'success' : ($order->order_status == 1 ? 'warning' : 'primary') }}">
                            {{ $order->order_status == 0 ? 'Placed' : ($order->order_status == 1 ? 'Processing' : 'Completed') }}
                        </span>
                    </td>
                    <td>{{date('M d, Y', strtotime($order->date))}}</td>
                    <td class='text-center'>
                        <a href="{{ url('/confirmation') }}/{{$order->s_o_id}}"><button class="btn btn-success btn-sm rounded"><i class="fa-solid fa-eye"></i></button></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</section>

@endsection