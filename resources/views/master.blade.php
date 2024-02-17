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
                    @can('edit-user')
                    <li><a class="nav-link scrollto " href="{{route('home')}}">Admin Panel</a></li>
                    @endcan
                    <li><a class="nav-link scrollto active" href="{{route('admin.home')}}">Home</a></li>
                    <li><a class="nav-link scrollto " href="{{route('admin.index')}}">Cases</a></li>
                    @can('list-judges')
                    <li><a class="nav-link scrollto " href="{{route('admin.users')}}">Judges</a></li>
                    @endcan
                    @can('list-attornies')
                    <li><a class="nav-link scrollto " href="{{route('admin.users')}}">Attornies</a></li>
                    @endcan
                    @can('list-lawyers')
                    <li><a class="nav-link scrollto " href="{{route('admin.users')}}">Lawyers</a></li>
                    @endcan
                    @can('list-detectives')
                    <li><a class="nav-link scrollto " href="{{route('admin.users')}}">Detectives</a></li>
                    @endcan
                    @can('list-plaintiffs')
                    <li><a class="nav-link scrollto " href="{{route('admin.users')}}">Plaintiffs</a></li>
                    @endcan
                    @can('list-defendants')
                    <li><a class="nav-link scrollto " href="{{route('admin.users')}}">Defendants</a></li>
                    @endcan
                    @can('list-wittnesses')
                    <li><a class="nav-link scrollto " href="{{route('admin.users')}}">Wittness</a></li>
                    @endcan
                    @can('view-schedule')
                    <li><a class="nav-link scrollto " href="#">Calendar</a></li>
                    @endcan

                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->


            @guest
            <div class='float-end'>
                <a class="get-started-btn scrollto" href="{{ route('login') }}">Login</a>
                <a class="get-started-btn scrollto" href="{{ route('register') }}">Register</a>
            </div>
            @else
            <div class='float-end'>
                <li class="nav-item dropdown">
                    <a class="get-started-btn scrollto dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        {{ Auth::user()->name }}
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="get-started-btn scrollto dropdown-item bg-black" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">Logout</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                @csrf
                            </form>
                        </li>
            </div>
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