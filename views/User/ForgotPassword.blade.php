@include('User.HeaderFooter.UserHeader')
  <main class="main">

    <div class="login-page-container">
        <div class="overlay">
            <div class="login-container">
                <div class="login-logo">
                    <img src="{{ asset('public/Assets') }}/img/logo-white.png" alt="Cleaning Service Logo">
                </div>
                <h1>SOMETHING WRONG!!</h1>
                <h2>FORGET PASSWORD</h2>
                
                <form class="login-form">
                    <div class="form-group">
                        <label for="email">Email ID</label>
                        <input type="email" id="email" placeholder="Email Id" required>
                    </div>
                    
                    <button type="submit" class="sign-in-btn">SUBMIT</button>
                    
                    <p class="signup-link">
                        You Already have an account? <a href="{{url('/login')}}">Sign In</a>
                    </p>
                </form>
            </div>
        </div>
    </div>

  </main>