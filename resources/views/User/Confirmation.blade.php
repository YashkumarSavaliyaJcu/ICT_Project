@extends('User.Master')
@section('body')

<main class="main">

    <!-- Breadcrumb Section -->
    <section class="breadcrumb-section">
        <h1 class="fw-bold">CONFIRMATION</h1>
        <nav class="breadcrumbs">
            <a href="{{ url('/') }}" class="text-white text-decoration-none">HOME</a>
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
                    <h4 class="mb-3 text-success fw-bold">Booking Confirmed!</h4>
                    <div class="card border-0 shadow-sm">
                        <div class="card-body">
                            <p class="fw-bold text-muted">Reference Number: <span class="text-dark">#32323</span></p>
                            <div class="d-flex justify-content-between">
                                <p class="fw-bold text-muted">Service Type:</p>
                                <p class="text-dark">Window Cleaning</p>
                            </div>
                            <div class="d-flex justify-content-between">
                                <p class="fw-bold text-muted">Service Duration:</p>
                                <p class="text-dark">3 Hours</p>
                            </div>
                            <div class="d-flex justify-content-between">
                                <p class="fw-bold text-muted">Service Date:</p>
                                <p class="text-dark">Nov 30, 2024</p>
                            </div>
                            <div class="d-flex justify-content-between">
                                <p class="fw-bold text-muted">Service Time:</p>
                                <p class="text-dark">2:00 AM - 5:00 PM</p>
                            </div>
                            <p class="fw-bold text-muted">Address:</p>
                            <p class="text-dark">123, George Street, Doolandella, 4077.</p>
                            <hr>
                            <div class="d-flex justify-content-between">
                                <p class="fw-bold text-success">Total Amount:</p>
                                <p class="fw-bold text-dark">$150.00</p>
                            </div>
                            <p class="text-success fw-bold">✔ PAID</p>
                        </div>
                    </div>
                </div>

                <!-- Service Provider Information -->
                <div class="col-lg-5">
                    <h4 class="mb-3 text-success fw-bold">Service Provider</h4>
                    <div class="card border-0 shadow-sm">
                        <div class="card-body text-center">
                            <img src="{{ asset('images/provider.jpg') }}" class="img-fluid rounded-circle mb-2" width="80" alt="Service Provider">
                            <h5 class="fw-bold">Daniel Rose</h5>
                            <p class="small text-muted">Cleaner</p>
                            <p class="text-warning">⭐⭐⭐⭐⭐</p>
                            <div class="d-flex justify-content-center gap-3">
                                <a href="#" class="text-success"><i class="fab fa-twitter fa-lg"></i></a>
                                <a href="#" class="text-success"><i class="fab fa-linkedin fa-lg"></i></a>
                                <a href="#" class="text-success"><i class="fab fa-facebook fa-lg"></i></a>
                                <a href="#" class="text-success"><i class="fab fa-youtube fa-lg"></i></a>
                            </div>
                            <hr>
                            <p class="fw-bold text-muted">Contact Number:</p>
                            <p class="text-dark">+61 987876345</p>
                            <p class="fw-bold text-muted">Email ID:</p>
                            <p class="text-dark">Dainelrose12@Gmail.Com</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Reminder Box -->
            <div class="row justify-content-center mt-4">
                <div class="col-lg-10">
                    <div class="card border-0 shadow-sm text-center p-3">
                        <div class="card-body">
                            <h4 class="text-success fw-bold">REMINDER</h4>
                            <p class="text-muted">You’ll Receive A Reminder 24 Hours Before Your Service.</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

</main>

@endsection