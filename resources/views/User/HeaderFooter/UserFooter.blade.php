    <footer>
        <div class="footer-content">
            <div class="footer-info">
                <img src="{{ asset('public/Assets') }}/img/logo.png" alt="logo" class="footer-logo">
                <p>James Home Cleaning is committed to providing top-notch cleaning services to meet your unique needs.</p>
                <div class="social-icons">
                    <!-- Add social media icons here -->
                </div>
            </div>
            <div class="useful-links">
                <h3>USEFULL LINKS</h3>
                <ul>
                    <li><a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="{{url('/')}}">Home</a></li>
                    <li><a class="nav-link {{ request()->is('about-us') ? 'active' : '' }}" href="{{url('/about-us')}}">About us</a></li>
                    <li><a class="nav-link {{ request()->is('services') ? 'active' : '' }}" href="{{url('/services')}}">Services</a></li>
                    <li><a class="nav-link {{ request()->is('blogs') ? 'active' : '' }}" href="{{url('/blogs')}}">Blogs</a></li>
                    <li><a class="nav-link {{ request()->is('terms-and-condition') ? 'active' : '' }}" href="{{url('/terms-and-condition')}}">Terms & Conditions</a></li>
                    <li><a class="nav-link {{ request()->is('agreement') ? 'active' : '' }}" href="{{url('/agreement')}}">Agreement</a></li>
                    <li><a class="nav-link {{ request()->is('contact-us') ? 'active' : '' }}" href="{{url('/contact-us')}}">Contact Us</a></li>
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
    <script src="{{ asset('public/Assets') }}/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('public/Assets') }}/js/dataTables.responsive.min.js"></script>
    <script src="{{ asset('public/Assets') }}/js/owl.carousel.min.js"></script>
    <script src="https://www.paypal.com/sdk/js?client-id={{ env('PAYPAL_CLIENT_ID') }}&currency=AUD&disable-funding=card"></script>
    <script>

        $('#dataTable-1').DataTable({
            autoWidth: true,
            "lengthMenu": [
                [10, 25, 50, -1],
                [10, 25, 50, "All"]
            ],
            "order": [[0, "desc"]]
        });

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
                    if (result.status == 'success') {
                        $('.totalcart').html(result.totalproduct);
                    }
                    Swal.fire({
                        icon: result.status,
                        title: result.message,
                        showConfirmButton: true,
                        timer: 1500
                    })
                }
            });
        }

        $('body').on('click', '.removecart', function() {
            var s_id = $(this).attr('data');
            removecart(s_id);
        });
        function removecart(c_id) {
            $.ajax({
                url: "{{ url('removecart') }}",
                method: "POST",
                dataType: 'json',
                data: {
                    _token: "{{ csrf_token() }}",
                    c_id: c_id,
                },
                success: function(result) {
                    Swal.fire({
                        icon: result.status,
                        title: result.message,
                        showConfirmButton: true,
                        timer: 1500
                    }).then(function() {
                        window.location.reload();
                    });
                }
            });
        }

        $('body').on('click', '.applycoupon', function() {
            var code = $('.code').val();
            applycoupon(code);
        });

        function applycoupon(code) {
            $.ajax({
                url: "{{ url('applycoupon') }}",
                method: 'POST',
                dataType: 'json',
                data: {
                    _token: "{{ csrf_token() }}",
                    code: code,
                },
                success: function(result) {
                    if (result.status == 'success') {
                        $('#discount').html('$ ' + result.discount);
                    } else {
                        $('#discount').html('$0.00');
                    }
                    $('#famount').html('$' + result.finalamount.toFixed(2));
                    Toast.fire({
                        icon: result.status,
                        title: result.message
                    }).then(function() {
                        window.location.reload();
                    });
                }
            });
        }

        function removeCoupon() {
            $.ajax({
                url: "{{ url('removecoupon') }}",
                method: 'POST',
                dataType: 'json',
                data: {
                    _token: "{{ csrf_token() }}",
                },
                success: function(result) {
                    window.location.reload();
                }
            });
        }
    </script>
    <script>
    $(document).ready(function(){
       var teamowl = $(".team-carousel").owlCarousel({
            loop: true,
            margin: 20,
            nav: true,
            dots: true,
            autoplay: true,
            autoplayTimeout: 3000,
            responsive:{
                0:{ items: 1 },
                600:{ items: 2 },
                1000:{ items: 3 }
            }
        });

        // Custom Navigation
        $(".team-prev-btn").click(function() { teamowl.trigger('prev.owl.carousel'); });
        $(".team-next-btn").click(function() { teamowl.trigger('next.owl.carousel'); });
    });
    $(document).ready(function(){
        var owl = $(".testimonial-carousel").owlCarousel({
            loop: true,
            margin: 20,
            nav: false,
            dots: true,
            autoplay: true,
            autoplayTimeout: 4000,
            smartSpeed: 800,
            responsive:{
                0:{ items: 1 },
                600:{ items: 2 },
                1000:{ items: 2 }
            }
        });
        // Custom Navigation
        $(".prev-btn").click(function() { owl.trigger('prev.owl.carousel'); });
        $(".next-btn").click(function() { owl.trigger('next.owl.carousel'); });
    });
</script>
</body>
</html>
