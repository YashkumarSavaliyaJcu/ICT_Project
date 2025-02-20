@extends('User.Master')
@section('body')
<main class="main">

  <section class="breadcrumb-section">
    <h1>ABOUT US</h1>
    <nav class="breadcrumbs">
      <a href="{{url('/')}}">HOME</a>
      <span>/</span>
      <a>ABOUT US</a>
    </nav>
  </section>

  <!-- About Us Section -->
  <section id="about" class="py-5 bg-light pt-100">
    <div class="container">
      <div class="row">
        <div class="col-xl-6">
            <img src="{{ asset('public/Assets') }}/img/about.png" alt="about" />
        </div>
        <div class="col-xl-6">
            <h2 class="mb-4 color-green fw-bold heading">About Us</h2>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
        </div>
      </div>
    </div>
  </section>

</main>
@endsection