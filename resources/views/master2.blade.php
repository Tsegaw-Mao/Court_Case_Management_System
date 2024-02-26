<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>
        @yield('title','MoD Justice Department - Index')
    </title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    @notifyCss

    <!-- Google Fonts -->
    <link
        href="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3940.569271278221!2d38.718601775508105!3d9.011721089258169!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x164b8796645cf1b9%3A0x4804833e4b29b819!2zVG9yIEhheWxvY2ggUm91bmQgQWJvdXQgfCDhjKbhiK0g4YiQ4Yut4YiO4Ym9IOGKoOGLsOGJo-GJo-GLrQ!5e0!3m2!1sen!2sjp!4v1706949364095!5m2!1sen!2sjp">
    <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3940.569271278221!2d38.718601775508105!3d9.011721089258169!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x164b8796645cf1b9%3A0x4804833e4b29b819!2zVG9yIEhheWxvY2ggUm91bmQgQWJvdXQgfCDhjKbhiK0g4YiQ4Yut4YiO4Ym9IOGKoOGLsOGJo-GJo-GLrQ!5e0!3m2!1sen!2sjp!4v1706949364095!5m2!1sen!2sjp" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe> -->

    <!-- Vendor CSS Files -->
    <link href="{{asset('assets/vendor/aos/aos.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">

    <!-- =======================================================
  * Template Name: Gp
  * Updated: Jan 29 2024 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/gp-free-multipurpose-html-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top ">
        <div class="container d-flex align-items-center justify-content-lg-between">

            <h1 class="logo me-auto me-lg-0"><a href=""><img src="{{asset('assets/img/judge hammer.jpg')}}"
                        class="img-fluid" alt=""><span> Justice Dep.</span></a></h1>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="index.html" class="logo me-auto me-lg-0"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

            <nav id="navbar" class="navbar order-last order-lg-0">
                <ul>
                    <li><a class="nav-link scrollto active" href="{{route('admin.home')}}">{{ __('Home')}}</a></li>
                    <li><a class="nav-link scrollto " href="{{route('attorney.index',['id'=>'id'])}}">{{ __('Cases')}}</a></li>
                    <li><a class="nav-link scrollto " href="{{route('attorney.assign')}}">{{ __('Assign Cases to Attornies')}}</a></li>
                    <li><a class="nav-link scrollto " href="{{route('admin.users')}}">{{ __('Users')}}</a></li>
                    <li><a class="nav-link scrollto " href="#">{{ __('Calendar')}}</a></li>
                    <li><a class="nav-link scrollto " href="#">{{ __('Courts')}}</a></li>

                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

            <a href="#about" class="get-started-btn scrollto">{{ __('Account')}}</a>
            @guest
            <a class= "get-started-btn scrollto" href="{{ route('login') }}">{{ __('Login')}}</a>
            <a class="get-started-btn scrollto" href="{{ route('register') }}">{{ __('Register')}}</a>
            @else
            <form id="logout" action="{{ route('logout') }}" method="post">
                <a role="button" class="get-started-btn scrollto" onclick="document.getElementById('logout').submit();">{{ __('Logout')}}</a>
                @csrf
            </form>
            @endguest
        </div>
    </header><!-- End Header -->

    <section id="hero" class="d-flex align-items-center justify-content-center">
        <div class="container" data-aos="fade-up">

            <div class="col-lg-15 content-grey">
                <div class="g-0 m-5 page_content"> @yield('body')
                </div>
            </div>

        </div>
    </section><!-- End About Section -->

    </main><!-- End #main -->
    <!-- ======= Footer ======= -->
    <footer id="footer">
        <div class="footer-top">
            <div class="container">
                <div class="row">

                    <div class="col-lg-3 col-md-6">
                        <div class="footer-info">
                            <h3>{{ __('MoD Justice Dep.')}}<span>.</span></h3>
                            <p>
                                {{ __('Tor Hayloch Round About')}} <br>
                               {{ __(' Addis Ababa, Ethiopia')}}<br><br>
                                <strong>{{ __('Phone:')}}</strong> +251 111 111 111<br>
                                <strong>{{ __('Email:')}}</strong> info@example.com<br>
                            </p>
                            <div class="social-links mt-3">
                                <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                                <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                                <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                                <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                                <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-2 col-md-6 footer-links">
                        <h4>Useful Links</h4>
                        <ul>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">{{ __('Home')}}</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">{{ __('About us')}}</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">{{ __('Services')}}</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">{{ __('Terms of service')}}</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">{{ __('Privacy policy')}}</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-3 col-md-6 footer-links">
                        <h4>Our Services</h4>
                        <ul>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">{{ __('Service 1')}}</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">{{ __('Service 2')}}</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">{{ __('Service 3')}}</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">{{ __('Service 4')}}</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">{{ __('Service 5')}}</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-4 col-md-6 footer-newsletter">
                        <h4>{{ __('Our Newsletter')}}</h4>
                        <p>{{ __('Follow and Subscribe to our Gasha News Letter')}}</p>
                        <form action="" method="post">
                            <input type="email" name="email"><input type="submit" value="Subscribe">
                        </form>

                    </div>

                </div>
            </div>
        </div>

        <div class="container">
            <div class="copyright">
                &copy; Copyright <strong><span>{{ __('MoD Justice Dept')}}</span></strong>. {{ __('All Rights Reserved')}}
            </div>
            <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/gp-free-multipurpose-html-bootstrap-template/ -->
                {{-- Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a> --}}
            </div>
        </div>
    </footer><!-- End Footer -->

    <div id="preloader"></div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{asset('assets/vendor/purecounter/purecounter_vanilla.js')}}"></script>
    <script src="{{asset('assets/vendor/aos/aos.js')}}"></script>
    <script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
    <script src="{{asset('assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
    <script src="{{asset('assets/vendor/swiper/swiper-bundle.min.js')}}"></script>
    <script src="{{asset('assets/vendor/php-email-form/validate.js')}}"></script>

    <!-- Template Main JS File -->
    <script src="{{asset('assets/js/main.js')}}"></script>

    @notifyJs
    @include('notify::components.notify')
</body>

</html>
