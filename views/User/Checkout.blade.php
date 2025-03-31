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
    <?php
        $cartTotal=0;
        $discount=0;
        $code='';
    ?>
    @foreach ($cart as $c)
        <?php
            $cartTotal += $c->s_price;
        ?>
    @endforeach
    @if (session()->has('couponcode'))
        @php
            $discount = session()->get('couponcode.dis');
            $code = session()->get('couponcode.code');
        @endphp
    @endif
    <!-- Checkout Section -->
    <section class="spad pt-5">
        <div class="container">
            <div class="row">
                <!-- Customer Details Form -->
                <div class="col-lg-7">
                    <form id="checkoutForm">
                        @csrf
                        <input type="hidden" id="amount" name="amount" value="{{$cartTotal-$discount}}" />
                        <input type="hidden" id="discount" name="discount" value="{{$discount}}" />
                        <div class="row">
                            <div class="col-md-6 mb-2">
                                <label for="name" class="form-label">Full Name<span class="required">*</span></label>
                                <input type="text" name="name" class="form-control" placeholder="Full Name" required>
                                @error('name') <span class="text-danger mb-1 small font-weight-normalbold">{{ $message }}</span> @enderror
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="email" class="form-label">Email ID<span class="required">*</span></label>
                                <input type="email" name="email" class="form-control" placeholder="Email ID" required>
                                @error('email') <span class="text-danger mb-1 small font-weight-normalbold">{{ $message }}</span> @enderror
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="phone" class="form-label">Phone Number<span class="required">*</span></label>
                                <input type="text" name="phone" class="form-control" placeholder="Phone Number" required>
                                @error('phone') <span class="text-danger mb-1 small font-weight-normalbold">{{ $message }}</span> @enderror
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="date" class="form-label">Select Your Date<span class="required">*</span></label>
                                <input type="date" name="date" value="{{date('Y-m-d')}}" class="form-control" required>
                                @error('date') <span class="text-danger mb-1 small font-weight-normalbold">{{ $message }}</span> @enderror
                            </div>
                            <div class="col-md-12 mt-3">
                                <label for="address" class="form-label">Address<span class="required">*</span></label>
                                <textarea name="address" class="form-control" rows="3" placeholder="Address" required></textarea>
                                @error('address') <span class="text-danger mb-1 small font-weight-normalbold">{{ $message }}</span> @enderror
                            </div>
                            <div class="col-md-12 mt-3">
                                <label for="notes" class="form-label">Additional Notes</label>
                                <textarea name="notes" class="form-control" rows="3" placeholder="Additional Notes"></textarea>
                            </div>
                            
                            <div class="col-md-6 mt-3">
                                <label for="suburb" class="form-label">Suburb</label>
                                <select id="suburb" name="suburb" class="form-control">
                                    <option value="">Select...</option>
                                    <option value="Bulwer">Bulwer</option>
                                    <option value="Cowan Cowan">Cowan Cowan</option>
                                    <option value="Green Island">Green Island</option>
                                </select>
                                @error('suburb') <span class="text-danger mb-1 small font-weight-normalbold">{{ $message }}</span> @enderror
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="postcode" class="form-label">Postcode<span class="required">*</span></label>
                                <input type="text" name="postcode" class="form-control" placeholder="Postcode" required>
                                @error('postcode') <span class="text-danger mb-1 small font-weight-normalbold">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="form-check mt-4">
                            <input class="form-check-input" type="checkbox" id="terms" name="terms" required>
                            <label class="form-check-label text-success" for="terms">
                                I agree to the <a href="{{url('/terms-and-condition')}}" class="text-success">Terms and Conditions</a> and <a href="{{url('/agreement')}}" class="text-success">Cancellation Policy</a>.
                            </label>
                            @error('terms') <span class="text-danger mb-1 small font-weight-normalbold">{{ $message }}</span> @enderror
                        </div>
                        <button type="submit" class="btn btn-success btn-block mt-4" id="payNow">PAY NOW →</button>
                        <div id="paypal-button-container" class="mt-3"></div>
                    </form>
                </div>

                <!-- Selected Services & Order Summary -->
                <div class="col-lg-5">
                    <div class="category-title mb-2">
                        <span class="bar"></span>
                        <h3>SELECTED SERVICES</h3>
                    </div>
                    @foreach ($cart as $c)
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
                                    <input type="text" class="form-control custom-textbox w-50 code" placeholder="Coupon Code" value="{{$code}}"/>
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
                </div>
            </div>
        </div>
    </section>

</main>

@endsection

@section('script')
<script>
    $(document).ready(function() {
        $("#checkoutForm").submit(function(e) {
            e.preventDefault();
            let formData = {
                name: $("input[name='name']").val(),
                email: $("input[name='email']").val(),
                phone: $("input[name='phone']").val(),
                date: $("input[name='date']").val(),
                address: $("textarea[name='address']").val(),
                notes: $("textarea[name='notes']").val(),
                suburb: $("#suburb").val(),
                postcode: $("input[name='postcode']").val(),
                terms: $("#terms").is(":checked"),
                amount: $("#amount").val(),
                discount: $("#discount").val(),
            };

            if (!validateForm(formData)) {
                return;
            }

            window.formData = formData;
            
            $("#paypal-button-container").empty();
            renderPaypalButton();
            
        });
    });

    function renderPaypalButton() {
        paypal.Buttons({
            style: { label: "pay" },
            createOrder: function(data, actions) {
                return actions.order.create({
                    purchase_units: [{
                        amount: { currency_code: "AUD", value: $("#amount").val() }
                    }]
                });
            },
            onApprove: function(data, actions) {
                return actions.order.capture().then(function(details) {
                    let paymentData = {
                        payment_id: details.id,
                        amount: details.purchase_units[0].amount.value,
                        ...(window.formData),
                    };

                    fetch('/home-cleaning/paypal-success', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify(paymentData)
                    }).then(response => response.json()).then(data => {
                        if (data.status == 'success') {
                            Toast.fire({
                                icon: data.status,
                                title: data.message
                            });
                            window.location.href = "/home-cleaning/confirmation/"+data.order_id;
                        }
                    });
                });
            },
            onCancel: function(data) {
                window.location.href = "{{ route('paypal.cancel') }}";
            }
        }).render('#paypal-button-container');
        $("#payNow").hide();
    }

    function validateForm(formData) {
        let isValid = true;

        if (formData.name === "") {
            showToast("The name field is required.");
            isValid = false;
        } else if (formData.email === "") {
            showToast("The email field is required.");
            isValid = false;
        } else if (!/\S+@\S+\.\S+/.test(formData.email)) {
            showToast("Please enter a valid email address.");
            isValid = false;
        } else if (formData.phone === "") {
            showToast("The phone number field is required.");
            isValid = false;
        } else if (formData.date === "") {
            showToast("The date field is required.");
            isValid = false;
        } else if (formData.address === "") {
            showToast("The address field is required.");
            isValid = false;
        } else if (formData.suburb === "") {
            showToast("The suburb field is required.");
            isValid = false;
        } else if (formData.postcode === "") {
            showToast("The postcode field is required.");
            isValid = false;
        } else if (!formData.terms) {
            showToast("You must agree to the terms and conditions to proceed.");
            isValid = false;
        }

        return isValid;
    }

    function showToast(message) {
        Toast.fire({ icon: "error", title: message });
    }

    
</script>
@endsection