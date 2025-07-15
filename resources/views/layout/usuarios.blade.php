<!DOCTYPE html>
<html lang="en">

<head>

    <title>GeoAlerta</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css2?family=Arizonia&display=swap" rel="stylesheet" />

    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>


    <!-- CSS locales -->
    <link rel="stylesheet" href="{{ asset('plantilla/visitante/css/animate.css') }}" />
    <link rel="stylesheet" href="{{ asset('plantilla/visitante/css/owl.carousel.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('plantilla/visitante/css/owl.theme.default.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('plantilla/visitante/css/magnific-popup.css') }}" />
    <link rel="stylesheet" href="{{ asset('plantilla/visitante/css/bootstrap-datepicker.css') }}" />
    <link rel="stylesheet" href="{{ asset('plantilla/visitante/css/jquery.timepicker.css') }}" />
    <link rel="stylesheet" href="{{ asset('plantilla/visitante/css/flaticon.css') }}" />
    <link rel="stylesheet" href="{{ asset('plantilla/visitante/css/style.css') }}" />

    <!-- Google Maps API -->
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBG_To8UqS__6eQgWi_lDrb0rOtdw1bQGo&libraries=places&callback=initMap"></script>


</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
        <div class="container">
            <a class="navbar-brand" href="{{ url('usuariosVista/usuarioRiesgo') }}">GeoAlerta<span></span></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="oi oi-menu"></span> Menu
            </button>

            <div class="collapse navbar-collapse" id="ftco-nav">
                <ul class="navbar-nav ml-auto align-items-center">
    				<li class="nav-item active"><a href="{{ url('usuariosVista/usuarioRiesgo') }}" class="nav-link">Home</a></li>
    				<li class="nav-item active"><a href="{{ url('usuariosVista/usuarioRiesgo') }}" class="nav-link">Zonas de Riesgo</a></li>

                    <li class="nav-item"><a href="{{ url('usuariosVista/usuarioZona') }}" class="nav-link">Zonas Seguras</a></li>
                    <li class="nav-item"><a href="{{ url('usuariosVista/usuarioPunto') }}" class="nav-link">Puntos de Encuentro</a></li>
                    <li class="nav-item">
                        <!-- boton de cerrar sesion -->
                        <form method="POST" action="{{ route('logout') }}" style="display:d-inline;">
                            @csrf
                            <button type="submit" class="btn btn-primary btn-sm py-1">
                                <i class="fa fa-sign-out"></i> Cerrar Sesión
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- END nav -->

    <div class="hero-wrap js-fullheight" style="background-image: url({{asset('plantilla/visitante/images/bg_5.jpg')}});">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text js-fullheight align-items-center" data-scrollax-parent="true">
                <div class="col-md-7 ftco-animate">
                    <span class="subheading">Bienvenido a GeoAlerta</span>
                    <h1 class="mb-4">Descubre la seguridad de tu comunidad con nuestro Sistema de Información Geográfica</h1>
                    <p class="caps">Visualiza zonas de riesgo, zonas seguras y puntos de encuentro seguros en mapas interactivos</p>
                </div>
                <a href="https://vimeo.com/45830194" class="icon-video popup-vimeo d-flex align-items-center justify-content-center mb-4">
                    <span class="fa fa-play"></span>
                </a>
            </div>
        </div>
    </div>

    <section class="ftco-section ftco-no-pb ftco-no-pt">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="ftco-search d-flex justify-content-center">
                        <div class="row">
                            <div class="col-md-12 nav-link-wrap">

                            </div>
                            <div class="col-md-20 tab-wrap">

                                <div class="tab-content" id="v-pills-tabContent">
                                    @yield('contenido')
                                    <br>
                                </div>
                            </div>

                            <!-- START Footer -->
                            <footer class="ftco-footer bg-bottom ftco-no-pt" style="background-image: url({{asset('plantilla/visitante/images/bg_3.jpg')}});">
                                <div class="container">
                                    <div class="row mb-5">
                                        <div class="col-md pt-5">
                                            <div class="ftco-footer-widget pt-md-5 mb-4">
                                                <h2 class="ftco-heading-2">About</h2>
                                                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                                                <ul class="ftco-footer-social list-unstyled float-md-left float-lft">
                                                    <li class="ftco-animate"><a href="#"><span class="fa fa-twitter"></span></a></li>
                                                    <li class="ftco-animate"><a href="#"><span class="fa fa-facebook"></span></a></li>
                                                    <li class="ftco-animate"><a href="#"><span class="fa fa-instagram"></span></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-md pt-5 border-left">
                                            <div class="ftco-footer-widget pt-md-5 mb-4 ml-md-5">
                                                <h2 class="ftco-heading-2">Infromation</h2>
                                                <ul class="list-unstyled">
                                                    <li><a href="#" class="py-2 d-block">Online Enquiry</a></li>
                                                    <li><a href="#" class="py-2 d-block">General Enquiries</a></li>
                                                    <li><a href="#" class="py-2 d-block">Booking Conditions</a></li>
                                                    <li><a href="#" class="py-2 d-block">Privacy and Policy</a></li>
                                                    <li><a href="#" class="py-2 d-block">Refund Policy</a></li>
                                                    <li><a href="#" class="py-2 d-block">Call Us</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-md pt-5 border-left">
                                            <div class="ftco-footer-widget pt-md-5 mb-4">
                                                <h2 class="ftco-heading-2">Experience</h2>
                                                <ul class="list-unstyled">
                                                    <li><a href="#" class="py-2 d-block">Adventure</a></li>
                                                    <li><a href="#" class="py-2 d-block">Hotel and Restaurant</a></li>
                                                    <li><a href="#" class="py-2 d-block">Beach</a></li>
                                                    <li><a href="#" class="py-2 d-block">Nature</a></li>
                                                    <li><a href="#" class="py-2 d-block">Camping</a></li>
                                                    <li><a href="#" class="py-2 d-block">Party</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-md pt-5 border-left">
                                            <div class="ftco-footer-widget pt-md-5 mb-4">
                                                <h2 class="ftco-heading-2">Have a Questions?</h2>
                                                <div class="block-23 mb-3">
                                                    <ul>
                                                        <li><span class="icon fa fa-map-marker"></span><span class="text">203 Fake St. Mountain View, San Francisco, California, USA</span></li>
                                                        <li><a href="#"><span class="icon fa fa-phone"></span><span class="text">+2 392 3929 210</span></a></li>
                                                        <li><a href="#"><span class="icon fa fa-paper-plane"></span><span class="text">info@yourdomain.com</span></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 text-center">

                                            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                                Copyright &copy;<script>
                                                    document.write(new Date().getFullYear());
                                                </script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                                                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                                        </div>
                                    </div>
                                </div>
                            </footer>
                            <!-- END Footer -->

                            <!-- loader -->
                            <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
                                    <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
                                    <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00" />
                                </svg></div>


                            <script src="{{ asset('plantilla/visitante/js/jquery.min.js') }}"></script>
                            <script src="{{ asset('plantilla/visitante/js/jquery-migrate-3.0.1.min.js') }}"></script>
                            <script src="{{ asset('plantilla/visitante/js/popper.min.js') }}"></script>
                            <script src="{{ asset('plantilla/visitante/js/bootstrap.min.js') }}"></script>
                            <script src="{{ asset('plantilla/visitante/js/jquery.easing.1.3.js') }}"></script>
                            <script src="{{ asset('plantilla/visitante/js/jquery.waypoints.min.js') }}"></script>
                            <script src="{{ asset('plantilla/visitante/js/jquery.stellar.min.js') }}"></script>
                            <script src="{{ asset('plantilla/visitante/js/owl.carousel.min.js') }}"></script>
                            <script src="{{ asset('plantilla/visitante/js/jquery.magnific-popup.min.js') }}"></script>
                            <script src="{{ asset('plantilla/visitante/js/jquery.animateNumber.min.js') }}"></script>
                            <script src="{{ asset('plantilla/visitante/js/bootstrap-datepicker.js') }}"></script>
                            <script src="{{ asset('plantilla/visitante/js/scrollax.min.js') }}"></script>
                            <script src="{{ asset('plantilla/visitante/js/google-map.js') }}"></script>
                            <script src="{{ asset('plantilla/visitante/js/main.js') }}"></script>
</body>

</html>