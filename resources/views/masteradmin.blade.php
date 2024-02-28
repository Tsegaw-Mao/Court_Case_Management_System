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



    <!-- Google Fonts -->
    <link href="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3940.569271278221!2d38.718601775508105!3d9.011721089258169!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x164b8796645cf1b9%3A0x4804833e4b29b819!2zVG9yIEhheWxvY2ggUm91bmQgQWJvdXQgfCDhjKbhiK0g4YiQ4Yut4YiO4Ym9IOGKoOGLsOGJo-GJo-GLrQ!5e0!3m2!1sen!2sjp!4v1706949364095!5m2!1sen!2sjp">
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous" />
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet" />
    <link href="{{ asset('/css/admin.css') }}" rel="stylesheet" />

    <!-- =======================================================
  * Template Name: Gp
  * Updated: Jan 29 2024 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/gp-free-multipurpose-html-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <!-- Side Bar -->
    <div class="row g-0 ">
        <div class="p-3 vh-100 col-lg-3 text-white bg-dark">
            <a href="{{ route('admin.home') }}" class="text-white text-decoration-none">
                <span class="fs-4">Super Admin Panel</span>
            </a>
            <hr />
            <ul class="nav flex-column sidebar">
                <li><a href="{{ route('admin.home') }}" class="nav-link text-white">{{ __('- SuperAdmin - Home')}}</a></li>

                @can('case-list')
                <li><a href="{{ route('admin.home') }}" class="nav-link text-white">- SuperAdmin - Cases</a></li>
                @endcan

                @can('user-list')
                <li><a class="nav-link text-white" href="{{ route('users.index') }}">{{ __('Manage Users')}}</a></li>
                @endcan

                @can('role-list')
                <li><a class="nav-link text-white" href="{{ route('roles.index') }}">{{ __('Manage Role')}}</a></li>
                @endcan

                <li><a href="{{ route('admin.home') }}" class="mt-2 btn bg-primary text-white">Go back to the home page</a></li>
            </ul>
        </div>

        <!-- ======= End of Side Bar ======= -->

        <div class="col-lg-9 content-grey">
            <nav class="p-3 shadow text-end">
                <span class="profile-font">Admin</span>
                <!-- <img class="img-profile rounded-circle" src="{{ asset('/img/undraw_profile.svg') }}"> -->
            </nav>
            <div class="g-0 m-5 page_content"> @yield('body')
            </div>
        </div>
    </div>
    <!-- ======= Footer ======= -->
    <footer id="footer">
        <div class="footer-top">
            <div class="container">
                <div class="row">

                    <div class="col-lg-3 col-md-6">
                        <div class="footer-info">
                            <h3>MoD Justice Dep.<span>.</span></h3>
                            <p>
                                Tor Hayloch Round About <br>
                                Addis Ababa, Ethiopia<br><br>
                                <strong>Phone:</strong> +251 111 111 111<br>
                                <strong>Email:</strong> info@example.com<br>
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
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-3 col-md-6 footer-links">
                        <h4>Our Services</h4>
                        <ul>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Service 1</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Service 2</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Service 3</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Service 4</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Service 5</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-4 col-md-6 footer-newsletter">
                        <h4>Our Newsletter</h4>
                        <p>Follow and Subscribe to our Gasha News Letter</p>
                        <form action="" method="post">
                            <input type="email" name="email"><input type="submit" value="Subscribe">
                        </form>

                    </div>

                </div>
            </div>
        </div>

        <div class="container">
            <div class="copyright">
                &copy; Copyright <strong><span>MoD Justice Dept</span></strong>. All Rights Reserved
            </div>
            <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/gp-free-multipurpose-html-bootstrap-template/ -->
                Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
            </div>
        </div>
    </footer><!-- End Footer -->

    <div id="preloader"></div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

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

</body>

</html>
