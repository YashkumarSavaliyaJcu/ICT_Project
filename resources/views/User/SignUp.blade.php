@include('User.HeaderFooter.UserHeader')
  <main class="main">

    <div class="login-page-container">
        <div class="overlay">
            <div class="login-container">
                <div class="login-logo">
                    <img src="{{ asset('public/Assets') }}/img/logo-white.png" alt="Cleaning Service Logo">
                </div>
                <h1>Let’s Start !!!</h1>
                <h2>SIGN UP</h2>
                
                <form class="signup-form" action="{{url('/sign-up')}}" method="post" enctype="multipart/form-data">
                 @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" id="name" name="name" placeholder="Name" required>
                        <span class="text-danger mb-1 small font-weight-normalbold">{{ $errors->first('name') }}</span>
                    </div>
                    <div class="form-group">
                        <label for="email">Email ID</label>
                        <input type="email" id="email" name="email" placeholder="Email Id" required>
                        <span class="text-danger mb-1 small font-weight-normalbold">{{ $errors->first('email') }}</span>
                    </div>
                    
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" id="password"  name="password" placeholder="Password" required>
                        <span class="text-danger mb-1 small font-weight-normalbold">{{ $errors->first('password') }}</span>
                    </div>
                    <div class="form-group">
                        <label for="confirm_password">Confirm Password</label>
                        <input type="password" id="confirm_password"  name="c_password" placeholder="Confirm Password" required>
                        <span class="text-danger mb-1 small font-weight-normalbold">{{ $errors->first('c_password') }}</span>
                    </div>
                    
                    <button type="submit" class="sign-in-btn">SIGN UP <i class="fa-solid fa-arrow-right-to-bracket ml-10"></i></button>
                    
                    <p class="signup-link">
                        You Already have an account? <a href="{{url('/login')}}">Sign In</a>
                    </p>
                </form>
            </div>
        </div>
    </div>

  </main>
  <script src="{{ asset('public/Assets') }}/js/sweetalert2.all.min.js"></script>
<script>
    const Toast = Swal.mixin({
        toast: true,
        position: 'bottom-right',
        showConfirmButton: false,
        timer: 2000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    })
    @if(session()->has('errormessage'))
    Toast.fire({
        icon: 'error',
        title: "{{session()->get('errormessage')}}"
    })
    @elseif(session()->has('successmessage'))
        Toast.fire({
            icon: 'success',
            title: "{{session()->get('successmessage')}}"
        })
    @endif
</script>