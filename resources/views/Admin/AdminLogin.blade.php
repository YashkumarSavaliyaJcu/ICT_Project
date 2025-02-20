<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="{{ asset('public/Assets') }}/img/favicon.png" rel="icon">
    <title>Home Cleaning - Admin Login</title>
    <!-- Fonts CSS -->
    <link href="https://fonts.googleapis.com/css2?family=Overpass:ital,wght@0,100;0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <!-- Icons CSS -->
    <link rel="stylesheet" href="{{ asset('public/Assets/Admin') }}/css/feather.css">
    <link rel="stylesheet" href="{{ asset('public/Assets/Admin') }}/css/app-light.css" id="lightTheme">
  </head>
  <body class="dark ">
    <div class="wrapper vh-100 overflow-hidden">
      <div class="row align-items-center h-100">
        
        <form action="{{url('Admin')}}" method="post" class="col-lg-3 col-md-4 col-10 mx-auto text-center">
            @csrf
            
          <a class="navbar-brand mx-auto mt-2 flex-fill text-center" >
            <img src="{{ asset('public/Assets') }}/img/logo.png"/>
          </a>
          <p class="mt-5 text-muted font-weight-normal h3">Admin Login</p>
          {!!  session()->get('message') !!}
          <div class="form-group">
            <label for="inputEmail" class="sr-only">Email address</label>
            <input type="email" id="inputEmail" name="name" class="form-control form-control-lg" placeholder="Email address" required="" autofocus="">
          </div>
          <div class="form-group">
            <label for="inputPassword" class="sr-only">Password</label>
            <input type="password" id="inputPassword" name="password" class="form-control form-control-lg" placeholder="Password" required="">
          </div>
          <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
        </form>
      </div>
    </div>
  </body>
</html>
</body>
</html>