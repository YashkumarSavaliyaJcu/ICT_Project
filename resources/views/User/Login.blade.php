@include('User.HeaderFooter.UserHeader')
  <main class="main">

    <div class="login-page-container">
        <div class="overlay">
            <div class="login-container">
                <div class="login-logo">
                    <img src="{{ asset('public/Assets') }}/img/logo-white.png" alt="Cleaning Service Logo">
                </div>
                <h1>WELCOME BACK !!!</h1>
                <h2>SIGN IN</h2>
                
                <form class="login-form" action="{{url('/login')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="email">Email ID</label>
                        <input type="email" id="email" name="email" placeholder="Email Id" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" placeholder="Password" required>
                    </div>
                    
                    <div class="form-options">
                        <label></label>
                        <a href="{{url('/forgot-password')}}" class="forgot-password">Forget password?</a>
                    </div>
                    
                    <button type="submit" class="sign-in-btn">SIGN IN <i class="fa-solid fa-arrow-right-to-bracket ml-10"></i></button>
                    
                    <p class="signup-link">
                        Don't have an account? <a href="{{url('/sign-up')}}">Sign Up</a>
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