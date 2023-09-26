<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">

        <title>{{ config('app.name') }}</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta content="" name="description">
        <meta content="" name="keywords">

        <!-- Favicons -->
        <link href="https://paydunya.com/refont/images/favicon/favicon-96x96.png" rel="icon">
        <link href="https://paydunya.com/refont/images/favicon/favicon-96x96.png" rel="apple-touch-icon">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

        <!-- Vendor CSS Files -->
        <link href="{{ asset('front/assets/vendor/aos/aos.css') }}" rel="stylesheet">
        <link href="{{ asset('front/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('front/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
        <link href="{{ asset('front/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
        <link href="{{ asset('front/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
        <link href="{{ asset('front/assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
        <link href="{{ asset('front/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
        <link href="{{ asset('front/assets/css/style.css') }}" rel="stylesheet">
    </head>
    <body>
        <!-- ======= Header ======= -->
        <header id="header" class="fixed-top ">
            <div class="container d-flex align-items-center">
            {{-- <h1 class="logo me-auto"><a href="{{ url('/') }}">PayDunya</a></h1> --}}
            <!-- Uncomment below if you prefer to use an image logo -->
            <a href="{{ url('/') }}" class="logo me-auto">
                <img src="https://paydunya.com/refont/images/logo/blue_logo.png" alt="" class="img-fluid" style="background: white">
            </a>

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a
                        class="nav-link {{ url()->current() == url()->route('home') ? 'active' : '' }}"
                        href="{{ url('/') }}"
                        >Accueil</a>
                    </li>
                    <li><a
                        class="nav-link {{ url()->current() == url()->route('results') ? 'active' : '' }}"
                        href="{{ url('results') }}">Résultats</a></li>
                    <li><a class="nav-link" href="{{ url('winners') }}">Gagnants</a></li>
                    <li><a class="nav-link" href="{{ url('support') }}">Support</a></li>
                    @guest

                        <li>
                            <a class="getstarted" href="{{ url('/register') }}">
                                <i class="bi bi-people" style="font-size:16px;margin-right:4px"></i>
                                <span>Créer un compte</span>
                            </a>
                        </li>
                        <li>
                            <a class="getstartedend" href="{{ url('/login') }}">
                                <i class="bi bi-box-arrow-in-right" style="font-size:16px;margin-right:4px"></i>
                                <span>Se connecter</span>
                            </a>
                        </li>
                    @else
                        <li>
                            <a class="getstartedend" href="{{ url('/dashboard') }}">
                                <i class="bx bx-building-house" style="font-size:16px;margin-right:4px"></i>
                                <span>Mon Espace</span>
                            </a>
                        </li>
                    @endguest
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

            </div>
        </header><!-- End Header -->

        @yield('content')


        <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
        <!-- Vendor JS Files -->
        <script src="{{ asset('front/assets/vendor/aos/aos.js') }}"></script>
        <script src="{{ asset('front/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('front/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
        <script src="{{ asset('front/assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
        <script src="{{  asset('front/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
        <script src="{{ asset('front/assets/vendor/waypoints/noframework.waypoints.js') }}"></script>
        <script src="{{ asset('front/assets/vendor/php-email-form/validate.js') }}"></script>
        <!-- Template Main JS File -->
        <script src="{{ asset('front/assets/js/main.js') }}"></script>
    </body>
</html>
