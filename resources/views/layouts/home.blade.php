<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>CV Agusta Mandiri</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('storage/logo/logo-bg.png') }}" rel="icon">
    <link href="{{ asset('storage/logo/logo-bg.png') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('customer/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('customer/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('customer/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('customer/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('customer/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('customer/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('customer/css/style.css') }}" rel="stylesheet">

    <link href="{{ asset('customer/css/styles.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- =======================================================
  * Template Name: Techie
  * Updated: Jul 27 2023 with Bootstrap v5.3.1
  * Template URL: https://bootstrapmade.com/techie-free-skin-bootstrap-3/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>
    <!-- ======= Header ======= -->
    @if (Route::is('customer.home'))
    <header id="header" class="fixed-top ">
        @else
        <header id="header" class="fixed-top header-inner-pages">
            @endif
            <div class="container d-flex align-items-center justify-content-between">
                <h1 class="logo"><a href="{{ route('customer.home') }}">AGUSTA</a></h1>
                <!-- Uncomment below if you prefer to use an image logo -->
                <!-- <a href="index.html" class="logo"><img src="{{ asset('customer/img/logo.png') }}" alt="" class="img-fluid"></a> -->

                <nav id="navbar" class="navbar">
                    <ul>
                        @if (Route::is('customer.home'))
                        <li><a class="nav-link scrollto" href="#hero">Beranda</a></li>
                        <li><a class="nav-link scrollto" href="#about">Tentang</a></li>
                        <li><a class="nav-link scrollto" href="#services">Layanan</a></li>
                        <li><a class="nav-link scrollto " href="#portfolio">Portofolio</a></li>
                        <li><a class="nav-link scrollto" href="#pricing">Mitra</a></li>
                        <li><a class="nav-link scrollto" href="#contact">Kontak</a></li>
                        @endif
                        @auth
                        @if (auth()->user()->role === 'Customer')
                        <li id="cart" class="dropdown clear"><i class="navicon bx bx-cart-alt" aria-hidden="true"></i>
                            <ul>
                                <li><a href="{{ route('customer.cart.advertising.show', auth()->user()->id) }}">Advertising <i class='bx bx-store'></i></a></li>
                                <li><a href="{{ route('customer.cart.car.show', auth()->user()->id) }}">Mobil <i class='bx bx-car'></i></a></li>
                                <li><a href="{{ route('customer.cart.property.show', auth()->user()->id) }}">Properti <i class='bx bx-building'></i></a></li>
                            </ul>
                        </li>
                        <li class="dropdown hello clear"><span style="font-weight: normal;">Halo,&nbsp</span><span>{{ auth()->user()->name }}</span>
                            <i class="bi bi-chevron-down"></i>
                            <ul>
                                <li><a href="{{ route('customer.appointment.index', auth()->user()->id) }}">Janji Temu <i class='bx bx-calendar'></i></a></li>
                                <li><a href="{{ route('customer.profile.edit', auth()->user()->id) }}">Profil <i class='bx bx-user fs-4'></i></a></li>
                                <li><a href="{{ route('logout') }}" style="color: red;">Keluar <i class='bx bx-log-out fs-4'></i></a></li>
                            </ul>
                        </li>
                        @endif
                        @else
                        <li><a class="getstarted scrollto" href="{{ route('login') }}">Login</a></li>
                        @endauth

                    </ul>
                    <i class="bi bi-list mobile-nav-toggle"></i>
                </nav><!-- .navbar -->

            </div>
        </header><!-- End Header -->

        @yield('content')

        <!-- ======= Footer ======= -->
        <footer id="footer">

            <div class="footer-top">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-3 col-md-6 footer-contact">
                            <h3>CV AGUSTA MANDIRI</h3>
                            <p>
                                Jl. Tambak sari No. 27 <br>
                                Kapal - Mengwi <br>
                                Badung - Bali <br><br>
                                <strong>Phone:</strong> 081318733001<br>
                                <strong>Email:</strong> agustabali@gmail.com<br>
                            </p>
                        </div>

                        <div class="col-lg-2 col-md-6 footer-links">
                            <h4>Tautan</h4>
                            <ul>
                                <li><i class="bx bx-chevron-right"></i> <a href="#hero">Beranda</a></li>
                                <li><i class="bx bx-chevron-right"></i> <a href="#about">Tentang</a></li>
                                <li><i class="bx bx-chevron-right"></i> <a href="#portfolio">Portofolio</a></li>
                                <li><i class="bx bx-chevron-right"></i> <a href="#pricing">Mitra</a></li>
                                <li><i class="bx bx-chevron-right"></i> <a href="#contact">Kontak</a></li>
                            </ul>
                        </div>

                        <div class="col-lg-3 col-md-6 footer-links">
                            <h4>Layanan Kami</h4>
                            <ul>
                                <li><i class="bx bx-chevron-right"></i> <a href="{{ route('customer.advertising') }}">Agusta Advertising</a></li>
                                <li><i class="bx bx-chevron-right"></i> <a href="{{ route('customer.car') }}">Agusta Motor</a></li>
                                <li><i class="bx bx-chevron-right"></i> <a href="{{ route('customer.property') }}">Agusta Properti</a></li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>

            <div class="container">
                <div class="copyright-wrap d-md-flex py-4">
                    <div class="me-md-auto text-center text-md-start">
                        <div class="copyright">
                            &copy; 2023 <strong><span>CV Agusta Mandiri</span></strong>. All Rights Reserved
                        </div>
                        <div class="credits">
                            <!-- All the links in the footer should remain intact. -->
                            <!-- You can delete the links only if you purchased the pro version. -->
                            <!-- Licensing information: https://bootstrapmade.com/license/ -->
                            <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/techie-free-skin-bootstrap-3/ -->
                            Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
                        </div>
                    </div>
                    <div class="social-links text-center text-md-right pt-3 pt-md-0">
                        <a href="https://wa.me/6281318733001" target="_blank" class="whatsapp"><i class="bx bxl-whatsapp"></i></a>
                        <a href="https://wa.me/6281916511427" target="_blank" class="whatsapp"><i class="bx bxl-whatsapp"></i></a>
                        <a href="https://www.facebook.com/agusta.advertising" target="_blank" class="facebook"><i class="bx bxl-facebook"></i></a>
                        <a href="https://www.instagram.com/agusta.advertising" target="_blank" class="instagram"><i class="bx bxl-instagram"></i></a>
                    </div>
                </div>

            </div>
        </footer><!-- End Footer -->

        <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
        <div id="preloader"></div>

        <!-- Vendor JS Files -->
        <script src="{{ asset('admin/libs/jquery/dist/jquery.min.js') }}"></script>

        <script src="{{ asset('customer/vendor/purecounter/purecounter_vanilla.js') }}"></script>
        <script src="{{ asset('customer/vendor/aos/aos.js') }}"></script>
        <script src="{{ asset('customer/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('customer/vendor/glightbox/js/glightbox.min.js') }}"></script>
        <script src="{{ asset('customer/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
        <script src="{{ asset('customer/vendor/swiper/swiper-bundle.min.js') }}"></script>
        <script src="{{ asset('customer/vendor/php-email-form/validate.js') }}"></script>

        <!-- Template Main JS File -->
        <script src="{{ asset('customer/js/main.js') }}"></script>

        <!-- numeral.js -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/numeral.js/2.0.6/numeral.min.js"></script>
        <script>
            function rupiah(rp) {
                return 'Rp ' + numeral(rp).format(0,0);
            }

            function kilometre(km) {
                return numeral(km).format(0,0) + ' km';
            }

            $(document).ready(function() {
                $('.rupiah').each(function() {
                    var num = $(this).text();
                    $(this).text(rupiah(num));
                });

                $('.kilometre').each(function() {
                    var num = $(this).text();
                    $(this).text(kilometre(num));
                });
            });
        </script>

        @yield('jquery')

</body>

</html>