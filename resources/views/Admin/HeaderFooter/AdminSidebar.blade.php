<aside class="sidebar-left border-right bg-white shadow" id="leftSidebar" data-simplebar>
        <a href="#" class="btn collapseSidebar toggle-btn d-lg-none text-muted ml-2 mt-3" data-toggle="toggle">
          <i class="fe fe-x"><span class="sr-only"></span></i>
        </a>
        <nav class="vertnav navbar navbar-light">
          <!-- nav bar -->
          <div class="w-100 d-flex">
            <a class="navbar-brand mx-auto flex-fill text-center" href="{{url('/Admin/dashboard')}}">
              <img src="{{ asset('public/Assets') }}/img/logo.png" class="logo" width="auto" />
            </a>
          </div>
          <ul class="navbar-nav flex-fill w-100 mb-2 mt-2">
            <li class="nav-item w-100">
              <a class="nav-link" href="{{url('/Admin/dashboard')}}">
                <i class="fe fe-home fe-16"></i>
                <span class="ml-3 item-text">Dashboard</span>
              </a>
            </li>
            <li class="nav-item w-100">
              <a class="nav-link" href="{{url('/Admin/services')}}">
                <i class="fe fe-tag fe-16"></i>
                <span class="ml-3 item-text">Services</span>
              </a>
            </li>
            <li class="nav-item w-100">
              <a class="nav-link" href="{{url('/Admin/blogs')}}">
                <i class="fe fe-feather fe-16"></i>
                <span class="ml-3 item-text">Blogs</span>
              </a>
            </li>
            <li class="nav-item w-100">
              <a class="nav-link" href="{{url('/Admin/users')}}">
                <i class="fe fe-user fe-16"></i>
                <span class="ml-3 item-text">Users</span>
              </a>
            </li>
            <li class="nav-item w-100">
              <a class="nav-link" href="{{url('/Admin/coupons')}}">
                <i class="fe fe-percent fe-16"></i>
                <span class="ml-3 item-text">Coupons</span>
              </a>
            </li>
            <li class="nav-item w-100">
              <a class="nav-link" href="{{url('/Admin/teams')}}">
                <i class="fe fe-users fe-16"></i>
                <span class="ml-3 item-text">Teams</span>
              </a>
            </li>
            <li class="nav-item w-100">
              <a class="nav-link" href="{{url('/Admin/testimonial')}}">
                <i class="fe fe-edit-3 fe-16"></i>
                <span class="ml-3 item-text">Testimonial</span>
              </a>
            </li>
          </ul>
        </nav>
      </aside>