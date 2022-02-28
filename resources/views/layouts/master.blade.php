<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>@yield('title') || Prison Tel</title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!-- Favicon Icon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('prison/img/favicon.png') }}" />

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,600" rel="stylesheet" />

    <!-- all css here -->
    <link href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" rel="stylesheet" />

    <link rel="stylesheet" href="{{ asset('prison/css/font-awesome.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('prison/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('prison/css/animate.css') }}" />
    <link rel="stylesheet" href="{{ asset('prison/css/owl.carousel.css') }}" />
    <link rel="stylesheet" href="{{ asset('prison/css/slick.css') }}" />
    <link rel="stylesheet" href="{{ asset('prison/css/meanmenu.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('prison/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('prison/css/custom.css') }}" />
    <link rel="stylesheet" href="{{ asset('prison/css/responsive.css') }}" />
    <script src="{{
                asset('prison/js/vendor/modernizr-2.8.3.min.js')
            }}"></script>
</head>

<body>
    <!-- Header Area Start -->
    <header class="header-area fixed">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-2 col-md-4 col-6">
                    <div class="logo">
                        <!-- <a href="{{ route('prison.home') }}"><img src="{{
                                        asset('/storage/images/'.$navlogo)
                                    }}" alt="Prison Tel" /></a> -->
                        <a href="{{ route('prison.home') }}" class="d-none d-md-block">
                            <img src="https://www.prisontel.co.uk/theme/site/img/logo-dark.png" alt="Prison Tel"
                                style="width: 45px !important;" /></a>
                    </div>
                </div>
                <div class="col-lg-10 d-lg-block d-none">
                    <div class="main-menu text-center">
                        <nav>
                            <ul>
                                <li class="{{ request()->routeIs('prison.home') ? 'active' : '' }}">
                                    <a href="{{ route('prison.home') }}">Home</a>
                                </li>
                                <li class="{{ request()->routeIs('prison.about') ? 'active' : '' }}">
                                    <a href="{{ route('prison.about') }}">About</a>
                                </li>
                                <li class="{{ request()->routeIs('prison.features') ? 'active' : '' }}">
                                    <a href="{{ route('prison.features') }}">Features</a>
                                </li>
                                <li class="{{ request()->routeIs('prison.pricing') ? 'active' : '' }}">
                                    <a href="{{ route('prison.pricing') }}">Plans</a>
                                </li>
                                <li class="{{ request()->routeIs('prison.works') ? 'active' : '' }}">
                                    <a href="{{ route('prison.works') }}">How It Works</a>
                                </li>
                                <li class="{{ request()->routeIs('prison.support') ? 'active' : '' }}">
                                    <a href="{{ route('prison.support') }}">FAQ</a>
                                </li>
                                <li class="{{ request()->routeIs('prison.services') ? 'active' : '' }}">
                                    <a href="{{ route('prison.services') }}">Services</a>
                                </li>
                                <li class="{{ request()->routeIs('prison.contact') ? 'active' : '' }}">
                                    <a href="{{ route('prison.contact') }}">Contact</a>
                                </li>
                                <li class="{{ request()->routeIs('prison.cart') ? 'active' : '' }}">
                                    <a href="{{ route('prison.cart') }}">
                                        <span class="relative">
                                            <i class="fas fa-cart-plus"></i>
                                            <!-- <span class="ml-1">Cart</span> -->
                                            <span class="cart-amount">{{count($orders)}}</span>
                                        </span>

                                    </a>
                                </li>

                                @guest
                                <li
                                    class="{{ request()->routeIs('prison.login')||request()->routeIs('prison.register') ? 'active' : '' }}">
                                    <a href="{{ route('prison.login') }}">Login</a>
                                </li>
                                @endguest

                                @auth
                                <li
                                    class="{{request()->routeIs('prison.dashboard')||request()->routeIs('user.setting')||request()->routeIs('user.buymore')||request()->routeIs('user.accounts')||request()->routeIs('user.usage')||request()->routeIs('user.expiry') ? 'active' : '' }}">
                                    <a href="{{ route('prison.dashboard') }}">My Account</a>
                                </li>
                                <!-- <li class="{{ request()->routeIs('prison.cart') ? 'active' : '' }}">
                                    <a href="{{ route('prison.cart') }}">
                                        <span class="relative">
                                            <i class="fas fa-cart-plus"></i>
                                            <span class="cart-amount">
                                                {{count($orders) }}
                                            </span>
                                        </span>

                                    </a>
                                </li> -->

                                @endauth
                            </ul>
                        </nav>
                    </div>
                </div>
                <!-- <div class="col-lg-1 col-md-4 d-lg-block d-md-block d-none">
                        <button
                            class="modal-view nav-btn"
                            data-toggle="modal"
                            data-target="#productModal"
                        >
                            <i class="fa fa-bars"></i
                            ><span>Sign In / Sign Up</span>
                        </button>
                    </div> -->
                <div class="col-12">
                    <div class="mobile-menu d-block d-lg-none">
                        <nav>
                            <ul>
                                <li class="{{ request()->routeIs('prison.home') ? 'active' : '' }}">
                                    <a href="{{ route('prison.home') }}">Home</a>
                                </li>
                                <li class="{{ request()->routeIs('prison.about') ? 'active' : '' }}">
                                    <a href="{{ route('prison.about') }}">About</a>
                                </li>
                                <li class="{{ request()->routeIs('prison.features') ? 'active' : '' }}">
                                    <a href="{{ route('prison.features') }}">Features</a>
                                </li>
                                <li class="{{ request()->routeIs('prison.pricing') ? 'active' : '' }}">
                                    <a href="{{ route('prison.pricing') }}">Plans</a>
                                </li>
                                <li class="{{ request()->routeIs('prison.works') ? 'active' : '' }}">
                                    <a href="{{ route('prison.works') }}">How It Works</a>
                                </li>
                                <li class="{{ request()->routeIs('prison.support') ? 'active' : '' }}">
                                    <a href="{{ route('prison.support') }}">FAQ</a>
                                </li>
                                <li class="{{ request()->routeIs('prison.services') ? 'active' : '' }}">
                                    <a href="{{ route('prison.services') }}">Services</a>
                                </li>
                                <li class="{{ request()->routeIs('prison.contact') ? 'active' : '' }}">
                                    <a href="{{ route('prison.contact') }}">Contact</a>
                                </li>
                                @guest
                                <li
                                    class="{{ request()->routeIs('prison.login')||request()->routeIs('prison.register') ? 'active' : '' }}">
                                    <a href="{{ route('prison.login') }}">Login</a>
                                </li>
                                @endguest

                                @auth
                                <li
                                    class="{{request()->routeIs('prison.dashboard')||request()->routeIs('user.setting')||request()->routeIs('user.buymore')||request()->routeIs('user.accounts')||request()->routeIs('user.usage')||request()->routeIs('user.expiry') ? 'active' : '' }}">
                                    <a href="{{ route('prison.dashboard') }}">My Account</a>
                                </li>
                                @endauth
                                <li class="{{ request()->routeIs('prison.cart') ? 'active' : '' }}">
                                    <a href="{{ route('prison.cart') }}">
                                        <strong>{{
                                            count($orders) }}
                                        </strong>
                                        Items In Cart
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Header Area End -->

    @yield('content')

    <!-- Footer Area Start -->
    <footer class="prison-footer">
        <img src="{{ asset('prison/img/prison1.png') }}" class="mb-3" />
        <div id="footer-menu">
            <ul>
                <!-- {{ route('prison.terms') }} -->
                <li>
                    <a href="{{ route('prison.terms') }}">Term and Conditions</a>
                </li>
                |
                <li>
                    <a href="{{ route('prison.privacy') }}">
                        Privacy Policy
                    </a>
                </li>
                |
                <li>
                    <a href="{{ route('prison.cancel') }}">Canellation Policy</a>
                </li>
                |
                <li>
                    <a href="{{ route('prison.cookie') }}">
                        Cookies Policy
                    </a>
                </li>
                |
                <li>©2021 Prisontel right resrved.</li>
            </ul>
        </div>
    </footer>
    <!-- Footer Area End -->
    <!-- Login Register Start -->
    <div id="quickview-login">
        <div class="modal fade" id="productModal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i class="fa fa-close"></i></span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="header-tab-menu">
                            <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation" class="active">
                                    <a href="#login" aria-controls="login" role="tab" data-toggle="tab">login</a>
                                </li>
                                <li role="presentation">
                                    <a href="#register" aria-controls="register" role="tab" data-toggle="tab">Sign
                                        Up</a>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="login">
                                <div class="login-form-container">
                                    <span>Please login using account detail
                                        bellow.</span>
                                    <form action="#" method="post">
                                        <input type="text" name="user-name" placeholder="Username" />
                                        <input type="password" name="user-password" placeholder="Password" />
                                        <div class="button-box">
                                            <div class="login-toggle-btn">
                                                <input type="checkbox" id="remember" />
                                                <label for="remember">Remember me</label>
                                                <a href="#">Forgot Password?</a>
                                            </div>
                                            <button type="submit" class="
                                                        default-btn
                                                        floatright
                                                    ">
                                                Login
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="register">
                                <div class="register-form">
                                    <span>Please sign up using account detail
                                        bellow.</span>
                                    <form action="#" method="post">
                                        <input type="text" name="user-name" placeholder="Username" />
                                        <input type="password" name="user-password" placeholder="Password" />
                                        <input type="email" name="user-email" placeholder="Email" />
                                        <div class="button-box">
                                            <button type="submit" class="
                                                        default-btn
                                                        floatright
                                                    ">
                                                Register
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Login Register End -->

    <!-- All js here -->
    <script src="{{
                asset('prison/js/vendor/jquery-1.12.4.min.js')
            }}"></script>
    <script src="{{ asset('prison/js/popper.min.js') }}"></script>
    <script src="{{ asset('prison/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('prison/js/jquery.nav.js') }}"></script>
    <script src="{{ asset('prison/js/slick.min.js') }}"></script>
    <script src="{{ asset('prison/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('prison/js/ajax-mail.js') }}"></script>
    <script src="{{ asset('prison/js/jquery.ajaxchimp.min.js') }}"></script>
    <script src="{{ asset('prison/js/wow.min.js') }}"></script>
    <script src="{{ asset('prison/js/counterup.js') }}"></script>
    <script src="{{ asset('prison/js/jquery.meanmenu.js') }}"></script>
    <script src="{{ asset('prison/js/plugins.js') }}"></script>
    <!-- google map api -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD_qDiT4MyM7IxaGPbQyLnMjVUsJck02N0"></script>
    <script>
        var myCenter = new google.maps.LatLng(30.249796, -97.754667);
        function initialize() {
            var mapProp = {
                center: myCenter,
                scrollwheel: false,
                zoom: 15,
                mapTypeId: google.maps.MapTypeId.ROADMAP,
            };
            var map = new google.maps.Map(
                document.getElementById("hastech"),
                mapProp
            );
            var marker = new google.maps.Marker({
                position: myCenter,
                animation: google.maps.Animation.BOUNCE,
                icon: "img/map-marker.png",
                map: map,
            });
            var styles = [
                {
                    stylers: [{ hue: "#c5c5c5" }, { saturation: -100 }],
                },
            ];
            map.setOptions({ styles: styles });
            marker.setMap(map);
        }
        google.maps.event.addDomListener(window, "load", initialize);
    </script>
    <script src="{{ asset('prison/js/main.js') }}"></script>
    @stack('scripts')
</body>

</html>