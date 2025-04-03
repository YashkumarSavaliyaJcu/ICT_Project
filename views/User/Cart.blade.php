@extends('User.Master')
@section('body')

<main class="main">

    <!-- Breadcrumb Section -->
    <section class="breadcrumb-section">
        <h1>SHOPPING CART</h1>
        <nav class="breadcrumbs">
            <a href="{{ url('/') }}" class="text-white">HOME</a>
            <span class="text-white"> / </span>
            <a class="text-white">CART</a>
        </nav>
    </section>

    <!-- Cart Section -->
    <section class="spad py-5">
        <div class="container">
            <div class="category-title">
                <span class="bar"></span>
                <h3>SELECTED SERVICES</h3>
            </div>
            <div class="row">
                <div class="col-lg-8">
                    <?php
                        $cartTotal=0;
                        $discount=0;
                    ?>
                    @if (session()->has('couponcode'))
                        @php
                            $discount = session()->get('couponcode.dis');
                        @endphp
                    @endif
                    @foreach ($cart as $c)
                    <?php
                        $cartTotal+=$c->s_price;
                    ?>
                    <div class="card border-0 shadow-sm mb-3">
                        <div class="card-body">
                            <div class="d-flex align-items-start">
                                <img src="{{ asset('public/Assets') }}/images/services/{{$c->s_image}}" class="img-fluid rounded me-3" width="200" alt="Service Image">
                                <div>
                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                        <a class="text-decoration-none" href="{{url('/'.$c->s_url)}}"><h5 class="mb-0 fw-bold color-green">{{$c->s_title}}</h5></a>
                                        <button class="btn btn-success btn-sm rounded-circle removecart" data={{$c->id}}><i class="fa-solid fa-trash"></i></button>
                                    </div>
                                    <?php
                                        $cleanText = strip_tags($c->s_description);
                                        $wrappedText = wordwrap($cleanText, 80, "\n"); // Wrap text at 100 characters
                                        $lines = explode("\n", $wrappedText, 2);
                                        echo "<p>" . $lines[0] . (isset($lines[1]) ? '...':'') . "</p>";
                                    ?>
                                    <hr class="m-1" style="color:#bfbfbf"/>
                                    <p class="mb-1 d-flex justify-content-between"><strong class="color-green">Price:</strong> ${{$c->s_price}}</p>
                                    <p class="mb-1 d-flex justify-content-between"><strong class="color-green">Cleaning Hours:</strong> {{$c->cleaning_hour}} Hour</p>
                                    <p class="mb-1 d-flex justify-content-between"><strong class="color-green">Num. of Cleaners:</strong> {{$c->no_of_cleaner}}</p>
                                    <p class="mb-1 d-flex justify-content-between"><strong class="color-green">Visiting Time:</strong> {{$c->visiting_hours}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                <!-- Order Summary -->
                <div class="col-lg-4">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body">
                            <div class="category-title">
                                <span class="bar"></span>
                                <h3>CART TOTAL</h3>
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item d-flex justify-content-between">
                                    <span>Subtotal:</span> 
                                    <strong>${{number_format($cartTotal,2)}}</strong>
                                </li>
                                <li class="list-group-item d-flex justify-content-between">
                                    <span>Taxes/Fees:</span> 
                                    <strong>$0.00</strong>
                                </li>
                                <li class="list-group-item d-flex justify-content-between">
                                    <span>Discount:</span> 
                                    <strong>${{number_format($discount,2)}}</strong>
                                </li>
                                <li class="list-group-item d-flex justify-content-between font-weight-bold">
                                    <span>Total Amount:</span> 
                                    <strong>${{number_format($cartTotal-$discount,2)}}</strong>
                                </li>
                            </ul>
                            <a href="{{url('/checkout')}}"><button class="btn btn-success btn-block mt-3">PROCEED TO CHECKOUT <i class="fa-solid fa-arrow-right-to-bracket ml-10"></i></button></a>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </section>

</main>

@endsection
