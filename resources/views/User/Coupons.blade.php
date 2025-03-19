@extends('User.Master')
@section('body')
<main class="main">

    <section class="breadcrumb-section">
      <h1>COUPONS</h1>
      <nav class="breadcrumbs">
        <a href="{{url('/')}}">HOME</a>
        <span>/</span>
        <a>COUPONS</a>
      </nav>
    </section>

    <!-- Coupon Section -->
    <section class="py-5">
        <div class="container">
            <div class="row justify-content-center">
                @foreach($coupons as $coupon)
                <div class="col-lg-4 col-md-6 col-12 mb-4">
                    <div class="card coupon-card h-100">
                        <img src="{{ asset('public/Assets/images/coupons/' . $coupon->c_image) }}" 
                            class="coupon-img img-fluid" alt="Coupon Image">
                        <div class="card-body text-center">
                            <h5 class="card-title color-green fw-bold mb-3">{{ $coupon->title }}</h5>
                            <p><strong>Min. Order Amount: </strong> ${{ number_format($coupon->min_amount, 2) }}</p>
                            <p><strong>Discount Amount: </strong> ${{ number_format($coupon->c_amount, 2) }}</p>
                            <div class="d-flex justify-content-center align-items-center mt-3">
                                <input type="text" class="form-control w-50 text-center" 
                                    id="code-{{ $coupon->coupon_id }}" 
                                    value="{{ $coupon->code }}" readonly>
                                <button class="copy-btn ms-2" onclick="copyCode('{{ $coupon->coupon_id }}')">
                                    <i class="fa-solid fa-copy"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

</main>
@endsection

@section('script')
<script>
        function copyCode(couponId) {
            let copyText = document.getElementById("code-" + couponId);
            copyText.select();
            copyText.setSelectionRange(0, 99999);
            navigator.clipboard.writeText(copyText.value);
            Toast.fire({
                icon: 'success',
                title: "Coupon Code Copied: " + copyText.value
            })
        }
</script>
@endsection