<!DOCTYPE html>
<html lang="en">    
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>James Home Cleaning Platform</title>
    <!-- Favicons -->
    <link href="{{ asset('public/Assets') }}/img/favicon.png" rel="icon">
    <link href="{{ asset('public/Assets') }}/img/apple-touch-icon.png" rel="apple-touch-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <link rel="stylesheet" href="{{ asset('public/Assets') }}/css/style.css">
    <link rel="stylesheet" href="{{ asset('public/Assets') }}/css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="{{asset('public/Assets')}}/css/sweetalert2.min.css" type="text/css">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light p-0 sticky-top">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}"><img src="{{ asset('public/Assets') }}/img/logo.png" alt="logo"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse cust-nav" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="{{ url('/') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('about-us') ? 'active' : '' }}" href="{{ url('/about-us') }}">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('services') ? 'active' : '' }}" href="{{ url('/services') }}">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('blogs') ? 'active' : '' }}" href="{{ url('/blogs') }}">Blogs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('contact-us') ? 'active' : '' }}" href="{{ url('/contact-us') }}">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('coupons') ? 'active' : '' }}" href="{{ url('/coupons') }}">Coupons</a>
                    </li>
                    @if((Session()->has('userlogin'))) 
                    <?php 
                        $cart=\DB::table('add_to_cart')
                            ->where('u_id', session()->get('userlogin')->u_id)
                            ->get();
                    ?>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('cart') ? 'active' : '' }}" href="{{ url('/cart') }}">
                            <div class="cart-container">
                                <button class="cart-btn">
                                    <i class="fa-solid fa-cart-shopping"></i>
                                    <span class="cart-count totalcart">{{count($cart)}}</span>
                                </button>
                            </div>
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle {{ request()->is('profile') ? 'active' : '' }}" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            My Account
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="{{ url('/profile') }}">Profile</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <a class="dropdown-item" href="{{ url('/logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    Logout
                                </a>
                                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </li>
                    @else
                    <li class="nav-item">
                        <a href="{{ url('/login') }}"><button type="button" class="btn-green text-uppercase">Sign In<i class="fa-solid fa-arrow-right-to-bracket ml-10"></i></button></a>
                    </li>
                    @endif
                    
                </ul>
            </div>
        </div>
    </nav>