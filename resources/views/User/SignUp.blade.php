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
                
                <form class="login-form">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="name" id="name" placeholder="Name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email ID</label>
                        <input type="email" id="email" placeholder="Email Id" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" id="password" placeholder="Password" required>
                    </div>
                    <div class="form-group">
                        <label for="confirm_password">Confirm Password</label>
                        <input type="confirm_password" id="confirm_password" placeholder="Confirm Password" required>
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