<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="{{ asset('public/Assets') }}/img/favicon.png" rel="icon">
    <title>Home Cleaning - Admin</title>
    <!-- Simple bar CSS -->
    <link rel="stylesheet" href="{{ asset('public/Assets/Admin') }}/css/simplebar.css">
    <!-- Fonts CSS -->
    <link href="https://fonts.googleapis.com/css2?family=Overpass:ital,wght@0,100;0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <!-- Icons CSS -->
    <link rel="stylesheet" href="{{ asset('public/Assets/Admin') }}/css/feather.css">
    <link rel="stylesheet" href="{{ asset('public/Assets/Admin') }}/css/select2.css">
    <link rel="stylesheet" href="{{ asset('public/Assets/Admin') }}/css/uppy.min.css">
    <link rel="stylesheet" href="{{ asset('public/Assets/Admin') }}/css/jquery.steps.css">
    <link rel="stylesheet" href="{{ asset('public/Assets/Admin') }}/css/jquery.timepicker.css">
    <link rel="stylesheet" href="{{ asset('public/Assets/Admin') }}/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="{{ asset('public/Assets/Admin') }}/css/responsive.dataTables.min.css">
    <!-- <link rel="stylesheet" href="{{ asset('public/Assets/Admin') }}/css/dataTables.bootstrap4.css"> -->
    
    <link rel="stylesheet" href="{{ asset('public/Assets/Admin') }}/css/summernote.min.css">
    <!-- Date Range Picker CSS -->
    <link rel="stylesheet" href="{{ asset('public/Assets/Admin') }}/css/daterangepicker.css">
    <!-- App CSS -->
    <link rel="stylesheet" href="{{ asset('public/Assets/Admin') }}/css/app-light.css" id="lightTheme">
  </head>
  @php
    $userdata=\DB::table('users')->where('u_id',session()->get('adminlogin')->u_id)->first();
  @endphp
  <body class="vertical light">
    <div class="wrapper">
      <nav class="topnav navbar navbar-light">
        <button type="button" class="navbar-toggler text-muted mt-2 p-0 mr-3 collapseSidebar">
          <i class="fe fe-menu navbar-toggler-icon"></i>
        </button>
        <a href="{{url('/')}}" target="_blank" class="mr-auto"><span class="fe fe-external-link"></span> Home</a>
        <ul class="nav">
          
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-muted pr-0" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <span class="avatar avatar-sm mt-2">
                <img src="{{ asset('public/Assets/Admin') }}/image/profile.png" alt="..." class="avatar-img rounded-circle">
              </span>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="{{url('Admin/profile')}}"><i class="fe fe-user"></i> Profile</a>
              <a class="dropdown-item" href="{{url('Admin/logout')}}"><i class="fe fe-log-out"></i> Logout</a>
            </div>
          </li>
        </ul>
      </nav>
      