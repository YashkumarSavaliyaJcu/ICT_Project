@extends('User.Master')
@section('body')

<main class="main">

    <!-- Breadcrumb Section -->
    <section class="breadcrumb-section">
        <h1>CHECKOUT</h1>
        <nav class="breadcrumbs">
            <a href="{{ url('/') }}" class="text-white">HOME</a>
            <span class="text-white"> / </span>
            <a href="{{ url('/cart') }}" class="text-white">CART</a>
            <span class="text-white"> / </span>
            <a class="text-white">CHECKOUT</a>
        </nav>
    </section>

    <!-- Checkout Section -->
    <section class="spad pt-5">
        <div class="container">
            <div class="row">
                <!-- Customer Details Form -->
                <div class="col-lg-7">
                    <form action="#" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-2">
                                <label for="name" class="form-label">Full Name</label>
                                <input type="text" name="name" class="form-control" placeholder="Full Name" required>
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="email" class="form-label">Email ID</label>
                                <input type="email" name="email" class="form-control" placeholder="Email ID" required>
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="phone" class="form-label">Phone Number</label>
                                <input type="text" name="phone" class="form-control" placeholder="Phone Number" required>
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="date" class="form-label">Select Your Date</label>
                                <input type="date" name="date" class="form-control">
                            </div>
                            <div class="col-md-12 mt-3">
                                <label for="address" class="form-label">Address</label>
                                <textarea name="address" class="form-control" rows="3" placeholder="Address"></textarea>
                            </div>
                            <div class="col-md-12 mt-3">
                                <label for="notes" class="form-label">Additional Notes</label>
                                <textarea name="notes" class="form-control" rows="3" placeholder="Additional Notes"></textarea>
                            </div>
                            
                            <div class="col-md-6 mt-3">
                                <label for="suburb" class="form-label">Suburb</label>
                                <select name="suburb" class="form-control">
                                    <option value="">Select...</option>
                                    <option value="suburb1">Suburb 1</option>
                                    <option value="suburb2">Suburb 2</option>
                                </select>
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="postcode" class="form-label">Postcode</label>
                                <input type="text" name="postcode" class="form-control" placeholder="Postcode">
                            </div>
                        </div>

                        <div class="form-check mt-4">
                            <input class="form-check-input" type="checkbox" value="" id="terms" required>
                            <label class="form-check-label text-success" for="terms">
                                I agree to the <a href="#" class="text-success">Terms and Conditions</a> and <a href="#" class="text-success">Cancellation Policy</a>.
                            </label>
                        </div>
                    </form>
                </div>
                <?php
                    $cartTotal=0;
                    $discount=0;
                    $code='';
                ?>
                @if (session()->has('couponcode'))
                    @php
                        $discount = session()->get('couponcode.dis');
                        $code = session()->get('couponcode.code');
                    @endphp
                @endif
                <!-- Selected Services & Order Summary -->
                <div class="col-lg-5">
                    <div class="category-title mb-2">
                        <span class="bar"></span>
                        <h3>SELECTED SERVICES</h3>
                    </div>
                    @foreach ($cart as $c)
                    <?php
                        $cartTotal += $c->s_price;
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
                                    <p class="mb-1 d-flex justify-content-between"><strong class="color-green">Time:</strong> {{$c->visiting_hours}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                    <!-- Price Summary -->
                    <div class="card border-0 shadow-sm mt-3">
                        <div class="card-body">
                            <div class="category-title">
                                <span class="bar"></span>
                                <h3>ORDER SUMMARY</h3>
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item d-flex justify-content-between">
                                    <span class="color-green">Base Service Cost:</span> 
                                    <strong>${{number_format($cartTotal,2)}}</strong>
                                </li>
                                <li class="list-group-item d-flex justify-content-between">
                                    <span class="color-green">Taxes/Fees:</span> 
                                    <strong>$0.00</strong>
                                </li>
                                <li class="list-group-item d-flex justify-content-between">
                                    <span class="color-green">Discount:</span> 
                                    <strong id="discount">${{number_format($discount,2)}}</strong>
                                </li>
                                <li class="list-group-item d-flex justify-content-between coupon-container">
                                    <input type="text" class="form-control custom-textbox w-50 code" placeholder="Promo Code" value="{{$code}}"/>
                                    <div class="d-flex align-items-center gap-1">
                                        <button class="applycoupon coupon-button">Apply</button>
                                        @if(session()->has('couponcode'))
                                            <button class="btn btn-danger btn-sm" onclick="removeCoupon()">Remove</button>
                                        @endif
                                    </div>
                                </li>
                                <li class="list-group-item d-flex justify-content-between font-weight-bold" style="font-size: 18px;">
                                    <span class="color-green fw-bold">Total Amount:</span> 
                                    <strong id="famount">${{number_format($cartTotal-$discount,2)}}</strong>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!-- Payment Section -->
                    <div class="card border-0 shadow-sm mt-3">
                        <div class="card-body">
                            <h4 class="card-title text-success">Payment Details</h4>
                            <form action="#" method="POST">
                                @csrf
                                <label for="cardNumber" class="form-label">Card Number</label>
                                <input type="text" name="cardNumber" class="form-control" placeholder="1234 1234 1234 1234" required>

                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <label for="expiryMonth" class="form-label">Expiry Month</label>
                                        <select name="expiryMonth" class="form-control">
                                            <option>Jan</option>
                                            <option>Feb</option>
                                            <option>Mar</option>
                                            <option>Apr</option>
                                            <option>May</option>
                                            <option>Jun</option>
                                            <option>Jul</option>
                                            <option>Aug</option>
                                            <option>Sep</option>
                                            <option>Oct</option>
                                            <option>Nov</option>
                                            <option>Dec</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="expiryYear" class="form-label">Expiry Year</label>
                                        <select name="expiryYear" class="form-control">
                                            @for ($i = date('Y'); $i <= date('Y') + 10; $i++)
                                                <option>{{ $i }}</option>
                                            @endfor
                                        </select>
                                    </div>
                                </div>

                                <label for="cvv" class="form-label mt-3">CVV</label>
                                <input type="text" name="cvv" class="form-control" placeholder="000" required>

                                <button type="submit" class="btn btn-success btn-block mt-4">PAY NOW →</button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

</main>

@endsection
