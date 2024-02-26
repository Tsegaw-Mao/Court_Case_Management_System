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

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top ">
        <div class="container d-flex align-items-center justify-content-lg-between">

            <h1 class="logo me-auto me-lg-0"><a href=""><img src="{{asset('assets/img/judge hammer.jpg')}}" class="img-fluid" alt=""><span>{{ __('JUSTICE DEP.')}}</span></a></h1>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="index.html" class="logo me-auto me-lg-0"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

            <nav id="navbar" class="navbar order-last order-lg-0">
                <ul>
                    <li><a class="nav-link scrollto active" href="#hero">{{ __('Home')}}</a></li>
                    <li><a class="nav-link scrollto" href="#about">{{ __('About')}}</a></li>
                    <li><a class="nav-link scrollto" href="#services">{{ __('Services')}}</a></li>
                    <li class="dropdown"><a href="#team"><span>{{ __('Team')}}</span> <i class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li><a href="#team">{{ __('Administrators')}}</a></li>
                            <li class="dropdown"><a href="#team"><span>{{ __('Legal Team')}}</span> <i class="bi bi-chevron-right"></i></a>
                                <ul>
                                    <li><a href="#team">{{ __('Juges')}}</a></li>
                                    <li><a href="#team">{{ __('Attorney')}}</a></li>
                                    <li><a href="#team">{{ __('Interpreters')}}</a></li>
                                    <li><a href="#team">{{ __('clerks')}}</a></li>
                                    <li><a href="#team">{{ __('Court Reporter')}}</a></li>
                                </ul>
                            </li>
                            <li><a href="#team">{{ __('IT Dept.')}}</a></li>
                        </ul>
                    </li>
                    <li><a class="nav-link scrollto" href="#contact">{{ __('Contact')}}</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

            <a href="{{ route('login')}}" class="get-started-btn scrollto">{{ __('Get Started')}}</a>

        </div>
    </header><!-- End Header -->


    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center justify-content-center">
        <div class="container" data-aos="fade-up">

            <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="150">
                <div class="col-xl-6 col-lg-8">
                    <h1>{{ __('Digitalized Legal System')}}<span>.</span></h1>
                    <h2>{{ __('We Are Making Legal System Accessable For All At All Times')}}</h2>
                </div>
            </div>

            <div class="row gy-4 mt-5 justify-content-center" data-aos="zoom-in" data-aos-delay="250">
                <div class="col-xl-2 col-md-4">
                    <div class="icon-box">
                        <i class="ri-bar-chart-box-line"></i>
                        <h3><a href="">{{ __('Track & Monitor Case')}}</a></h3>
                    </div>
                </div>
                <div class="col-xl-2 col-md-4">
                    <div class="icon-box">
                        <i class="ri-calendar-todo-line"></i>
                        <h3><a href="">{{ __('Court Calendar')}}</a></h3>
                    </div>
                </div>
                <div class="col-xl-2 col-md-4">
                    <div class="icon-box">
                        <div class="icon"><i class="bx bx-file"></i></div>
                        <h3><a href="">{{ __('Report & Analyse')}}</a></h3>
                    </div>
                </div>

            </div>

        </div>
    </section><!-- End Hero -->

    <main id="main">

        <!-- ======= About Section ======= -->
        <section id="about" class="about">
            <div class="container" data-aos="fade-up">
                      <div class="row">
                    <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-left" data-aos-delay="100">
                        <img src="{{asset('assets/img/gen.jpg')}}" class="img-fluid" alt="">
                    </div>


                    <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content" data-aos="fade-right" data-aos-delay="100">
                        <h3>{{ __('About The Military Court Case Management System::CCMS.')}}</h3>
                        <h4>{{ __('What is Court Case Managment System?')}}</h4>
                        <p class="fst-italic">

                            {{ __('A court case management system (CCMS) is a software application designed to help courts efficiently organize, track, and manage all aspects of legal proceedings.')}}
                             {{ __('Its essentially a digital tool that streamlines court operations, benefiting various stakeholders in the legal system.')}}
                           {{ __(' Here are some key features and functionalities of a CCMS:')}}


                        </p>
                        <ul>
                            <li><i class="ri-check-double-line"></i>{{ __('For court administrators:')}}<br>
                               {{ __(' ⦁ Case filing and docketing: Electronic filing of court documents, automated scheduling of hearings, and creation of court calendars.')}}<br>
                                {{ __('⦁ Case tracking and monitoring: Real-time updates on case progress, deadlines, and task assignments.')}}<br>
                               {{ __(' ⦁ Financial management: Tracking of court fees, fines, and other financial transactions.')}}<br>
                               {{ __( '⦁ Reporting and analytics: Generation of reports on caseloads, judge performance, and other court metrics.')}}<br>
                            </li>
                            <li><i class="ri-check-double-line"></i> {{ __('For legal professionals:')}}<br>
                              {{ __('  ⦁ Secure access to case information: Online access to court documents, transcripts, and other case materials.')}}  <br>
                               {{ __(' ⦁ Filing of pleadings and motions electronically: Faster and more efficient submission of legal documents.')}}   <br>
                                {{ __('⦁ Communication with the court: Secure messaging system for communication with judges and court staff.')}}    <br>
                               {{ __('⦁ Calendar management: Synchronization of court appearances and deadlines with personal calendars.')}}      <br>
                            </li>
                            <li><i class="ri-check-double-line"></i> {{ __('For the public:')}}<br>
                                {{ __('⦁ Case search: Online search of court cases by party name, case number, or other criteria.')}}<br>
                                {{ __('⦁ Case status updates: Access to current case information and upcoming events.')}}<br>
                                {{ __('⦁ Payment of court fees: Online payment of fees and fines.')}}<br>
                            </li>
                            <li><i class="ri-check-double-line"></i>
                               {{ __(' Overall, CCMS aims to:')}}<br>
                               {{ __(' ⦁ Improve efficiency and productivity: Automating tasks and centralizing information saves time and reduces errors.')}}<br>
                               {{ __(' ⦁ Enhance transparency and accessibility: Easier access to information for all parties involved.')}}<br>
                               {{ __(' ⦁ Promote better decision-making: Data-driven insights based on comprehensive case management.')}}<br>
                            </li>
                        </ul>
                        <h4>{{ __('Introduction')}}</h4>
                        <p>
                            {{ __('The Judiciary is the system of courts of justice in a country, the arm of government charged with the responsibility to administer justice. The Judiciary is independent from other government functions and provides a forum for the just resolution of disputes in order to preserve the rule of law and to protect the rights and liberties guaranteed by the Constitution of Ethiopia.The advancements of the 21st century have led to an emergence of many disciplines with great potential to solve existing problems. One such potential field is Technology, which has over the years been increasingly adopted in many processes to avert the problems of ineffective and inefficient service delivery. One of the key areas of interest is automation of the judicial processes. Many challenges have been faced in the process of attaining justice including delays due to misplacement of the case files at the registry when reference is ought to be made. As legal practice has become more technologically advanced, pressure mounts on the courts is to join the flow of technological progress in other to provide a good service delivery.')}}
                        </p>
                    </div>
                </div>

            </div>
        </section><!-- End About Section -->

        <!-- ======= Services Section ======= -->
        <section id="services" class="services">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>{{ __('Services')}}</h2>
                    <p>{{ __('Check our Services')}}</p>
                </div>

                <div class="row">
                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                        <div class="icon-box">
                            <div class="icon"><i class="bx bxl-dribbble"></i></div>
                            <h4><a href="">{{ __('Service 1')}}</a></h4>
                            <P>{{ __('Responsibilities and duties of court service managers Train users of the system on how to use it.Assign roles to the people who use the system to use the system as they should')}}</P>

                            {{-- <p>{{ __('Responsibilities and duties of court service managers
Train users of the system on how to use it.
Assign roles to the people who use the system to use the system as they should.')}}</p> --}}

                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in" data-aos-delay="200">
                        <div class="icon-box">
                            <div class="icon"><i class="bx bx-file"></i></div>
                            <h4><a href="">{{ __('Service 2')}}</a></h4>
                            <p>{{ __('If the investigator believes that the record is sufficient for the law, open a new record through the clerk of court')}}</p>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0" data-aos="zoom-in" data-aos-delay="300">
                        <div class="icon-box">
                            <div class="icon"><i class="bx bx-tachometer"></i></div>
                            <h4><a href="">{{ __('Service 3')}}</a></h4>
                            <p>{{ __('The prosecutor will study the file from the investigator and organize the files related to the case and send it to the judge in charge.')}}</p>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="100">
                        <div class="icon-box">
                            <div class="icon"><i class="bx bx-world"></i></div>
                            <h4><a href="">{{ __('Service 4')}}</a></h4>
                            <p>{{ __('The head of the judges will look at the record and forward it to himself or another judge.')}}</p>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="200">
                        <div class="icon-box">
                            <div class="icon"><i class="bx bx-slideshow"></i></div>
                            <h4><a href="">{{ __('Service 5')}}</a></h4>
                            <p>{{ __('The judge will make a decision after considering the arguments of the plaintiff and the defendant.')}}</p>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="300">
                        <div class="icon-box">
                            <div class="icon"><i class="bx bx-arch"></i></div>
                            <h4><a href="">{{ __('Service 6')}}</a></h4>
                            <p>{{ __('This system simplifies the tedious court work')}}</p>
                        </div>
                    </div>

                </div>

            </div>
        </section><!-- End Services Section -->
        <!-- ======= Team Section ======= -->
        <section id="team" class="team">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>{{ __('Team')}}</h2>
                    <p>{{ __('Check our Team')}}</p>
                </div>

                <div class="row">

                    <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                        <div class="member" data-aos="fade-up" data-aos-delay="100">
                            <div class="member-img">
                                <img src="{{asset('assets/img/team/11.png')}}" class="img-fluid" alt="">
                                <div class="social">
                                    <a href=""><i class="bi bi-twitter"></i></a>
                                    <a href=""><i class="bi bi-facebook"></i></a>
                                    <a href=""><i class="bi bi-instagram"></i></a>
                                    <a href=""><i class="bi bi-linkedin"></i></a>
                                </div>
                            </div>
                            <div class="member-info">
                                <h4>{{ __('Tsegawbeza Yohannes')}}</h4>
                                <span>{{ __('It Proffessional')}}</span>
                            </div>
                        </div>
                    </div>


                    <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                        <div class="member" data-aos="fade-up" data-aos-delay="100">
                            <div class="member-img">
                                <img src="{{asset('assets/img/team/ggl.png')}}" class="img-fluid" alt="">
                                <div class="social">
                                    <a href=""><i class="bi bi-twitter"></i></a>
                                    <a href=""><i class="bi bi-facebook"></i></a>
                                    <a href=""><i class="bi bi-instagram"></i></a>
                                    <a href=""><i class="bi bi-linkedin"></i></a>
                                </div>
                            </div>
                            <div class="member-info">
                                <h4>{{ __('Genet Worku')}}</h4>
                                <span>{{ __('It Proffessional')}}</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                        <div class="member" data-aos="fade-up" data-aos-delay="100">
                            <div class="member-img">
                                <img src="{{asset('assets/img/team/aal.png')}}" class="img-fluid" alt="">
                                <div class="social">
                                    <a href=""><i class="bi bi-twitter"></i></a>
                                    <a href=""><i class="bi bi-facebook"></i></a>
                                    <a href=""><i class="bi bi-instagram"></i></a>
                                    <a href=""><i class="bi bi-linkedin"></i></a>
                                </div>
                            </div>
                            <div class="member-info">
                                <h4>{{ __('Alex Fite')}}</h4>
                                <span>{{ __('It Proffessional')}}</span>
                            </div>
                        </div>
                    </div>

                    {{-- <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                        <div class="member" data-aos="fade-up" data-aos-delay="100">
                            <div class="member-img">
                                <img src="{{asset('assets/img/team/11.png')}}" class="img-fluid" alt="">
                                <div class="social">
                                    <a href=""><i class="bi bi-twitter"></i></a>
                                    <a href=""><i class="bi bi-facebook"></i></a>
                                    <a href=""><i class="bi bi-instagram"></i></a>
                                    <a href=""><i class="bi bi-linkedin"></i></a>
                                </div>
                            </div>
                            <div class="member-info">
                                <h4>{{ __('Tsegawbeza Yohannes')}}</h4>
                                <span>{{ __('It Proffessional')}}</span>
                            </div>
                        </div>
                    </div> --}}


                    {{-- <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                        <div class="member" data-aos="fade-up" data-aos-delay="100">
                            <div class="member-img">
                                <img src="{{asset('assets/img/team/11.png')}}" class="img-fluid" alt="">
                                <div class="social">
                                    <a href=""><i class="bi bi-twitter"></i></a>
                                    <a href=""><i class="bi bi-facebook"></i></a>
                                    <a href=""><i class="bi bi-instagram"></i></a>
                                    <a href=""><i class="bi bi-linkedin"></i></a>
                                </div>
                            </div>
                            <div class="member-info">
                                <h4>Tsegawbeza Yohannes</h4>
                                <span>It Proffessional</span>
                            </div> --}}
                        </div>
                    </div>

                </div>

            </div>
        </section><!-- End Team Section -->

        <!-- ======= Contact Section ======= -->
        <section id="contact" class="contact">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>{{ __('Contact')}}</h2>
                    <p>{{ __('Contact Us')}}</p>
                </div>

                <div>
                    <iframe style="border:0; width: 100%; height: 270px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3940.569271278221!2d38.718601775508105!3d9.011721089258169!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x164b8796645cf1b9%3A0x4804833e4b29b819!2zVG9yIEhheWxvY2ggUm91bmQgQWJvdXQgfCDhjKbhiK0g4YiQ4Yut4YiO4Ym9IOGKoOGLsOGJo-GJo-GLrQ!5e0!3m2!1sen!2sjp!4v1706949603859!5m2!1sen!2sjp" frameborder="0" allowfullscreen></iframe>
                </div>

                <div class="row mt-5">

                    <div class="col-lg-4">
                        <div class="info">
                            <div class="address">
                                <i class="bi bi-geo-alt"></i>
                                <h4>{{ __('Location')}}:</h4>
                                <p>{{ __('Tor Hayloch Round About, Addis Ababa, Ethiopia')}}</p>
                            </div>

                            <div class="email">
                                <i class="bi bi-envelope"></i>
                                <h4>{{ __('Email')}}:</h4>
                                <p>{{ __('info@example.com')}}</p>
                            </div>

                            <div class="phone">
                                <i class="bi bi-phone"></i>
                                <h4>{{ __('Call')}}:</h4>
                                <p>+251 111 111 111</p>
                            </div>

                        </div>

                    </div>

                    <div class="col-lg-8 mt-5 mt-lg-0">

                        <form action="forms/contact.php" method="post" role="form" class="php-email-form">
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <input type="text" name="name" class="form-control" id="name" placeholder="{{ __('Your Name')}}" required>
                                </div>
                                <div class="col-md-6 form-group mt-3 mt-md-0">
                                    <input type="email" class="form-control" name="email" id="email" placeholder="{{ __('Your Email')}}" required>
                                </div>
                            </div>
                            <div class="form-group mt-3">
                                <input type="text" class="form-control" name="subject" id="subject" placeholder="{{ __('Subject')}}" required>
                            </div>
                            <div class="form-group mt-3">
                                <textarea class="form-control" name="message" rows="5" placeholder="{{ __('Message')}}" required></textarea>
                            </div>
                            <div class="my-3">
                                <div class="loading">Loading</div>
                                <div class="error-message"></div>
                                <div class="sent-message">{{ __('Your message has been sent. Thank you!')}}</div>
                            </div>
                            <div class="text-center"><button type="submit">{{ __('Send Message')}}</button></div>
                        </form>

                    </div>

                </div>

            </div>
        </section><!-- End Contact Section -->

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer">
        <div class="footer-top">
            <div class="container">
                <div class="row">

                    <div class="col-lg-3 col-md-6">
                        <div class="footer-info">
                            <h3>{{ __('MoD Justice Dep.')}}<span></span></h3>
                            <p>
                                {{ __('Tor Hayloch Round About Addis Ababa, Ethiopia')}} <br>
                                <br><br>
                                <strong>{{ __('Phone:')}}</strong> +251 111 111 111<br>
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

                    {{-- <div class="col-lg-2 col-md-6 footer-links">
                        <h4>Useful Links</h4>
                        {{-- <ul>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
                        </ul> --}}
                    {{-- </div> --}}

                    {{-- <div class="col-lg-3 col-md-6 footer-links">
                        <h4>Our Services</h4>
                        <ul>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Service 1</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Service 2</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Service 3</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Service 4</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Service 5</a></li>
                        </ul>
                    </div> --}}

                    <div class="col-lg-4 col-md-6 footer-newsletter">
                        <h4>Our Newsletter</h4>
                        <p>{{ __('Follow and Subscribe to our Email')}} </p>
                        <form action="" method="post">
                            <input type="email" name="email"><input type="submit" value="Subscribe">
                        </form>

                    </div>

                </div>
            </div>
        </div>

        <div class="container">
            <div class="copyright">
                &copy; Copyright <strong><span>{{ __('MoD Justice Dept')}}</span></strong>. All Rights Reserved
            </div>
            <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/gp-free-multipurpose-html-bootstrap-template/ -->
                {{-- Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a> --}}
                @include('partials.language_switcher')
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
