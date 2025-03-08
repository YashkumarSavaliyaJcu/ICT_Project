    <footer>
        <div class="footer-content">
            <div class="footer-info">
                <img src="{{ asset('public/Assets') }}/img/logo.png" alt="logo" class="footer-logo">
                <p>Lorem ipsum is Simply Dummy Text Of The Printing And Typesetting Industry.</p>
                <div class="social-icons">
                    <!-- Add social media icons here -->
                </div>
            </div>
            <div class="useful-links">
                <h3>USEFULL LINKS</h3>
                <ul>
                    <li><a href="{{url('/')}}">Home</a></li>
                    <li><a href="{{url('/about-us')}}">About us</a></li>
                    <li><a href="{{url('/services')}}">Service</a></li>
                    <li><a href="{{url('/blogs')}}">Blogs</a></li>
                    <li><a href="{{url('/terms-and-condition')}}">Terms & Conditions</a></li>
                    <li><a href="{{url('/agreement')}}">Agreement</a></li>
                    <li><a href="{{url('/contact-us')}}">Contact Us</a></li>
                </ul>
            </div>
            <div class="newsletter">
                <h3>NEWSLETTER</h3>
                <div class="form">
                    <input type="email" placeholder="Email">
                    <button>SUBMIT</button>
                </div>
            </div>
        </div>
    </footer>

    <script src="{{ asset('public/Assets') }}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('public/Assets') }}/js/jquery-3.3.1.min.js"></script>
    <script src="{{ asset('public/Assets') }}/js/sweetalert2.all.min.js"></script>
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
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

        $('body').on('click', '.addtocart', function() {
            var s_id = $(this).attr('data');
            addtocart(s_id);
        });
        function addtocart(s_id) {
            $.ajax({
                url: "{{ url('addtocart') }}",
                method: "POST",
                dataType: 'json',
                data: {
                    _token: "{{ csrf_token() }}",
                    s_id: s_id,
                },
                success: function(result) {
                    Swal.fire({
                        icon: result.status,
                        title: result.message,
                        showConfirmButton: true,
                        timer: 1500
                    })
                }
            });
        }
    </script>
</body>
</html>
