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
    <style>
        /* footer {
            position: sticky;
            bottom: 0;
        } */

        footer.page-footer .footer-copyright {
            overflow: hidden;
            color: rgba(255, 255, 255, 0.6);
            background-color: rgba(0, 0, 0, 0.2);

        }
    </style>
</head>

<body>
    <!-- Header Area Start -->
    <header class="">
        <div class="container-fluid px-0 px-md-5 pl-3 pl-md-0">
            <nav class="top-navbar-header d-flex py-2 px-0 px-md-5">
                <a href="{{ route('prison.home') }}" class="d-none d-md-block">
                    <img src="https://www.prisontel.co.uk/theme/site/img/logo-dark.png" alt="Prison Tel"
                        style="width: 45px !important;" /></a>
                <ul class="ml-auto pt-2">
                    <button class="btn btn-sm btn-primary mx-2">Balance:
                        {{number_format((float)session('balance'), 4,
                        '.',
                        '')}}</button>
                    <button class="btn btn-sm btn-primary mx-2">Welcome {{session('username')}}</button>
                    <button class="btn btn-sm btn-primary mx-2 mt-2 mt-md-0"
                        onclick="window.location='/user/myaccount'">My
                        Account</button>
                    <button class="btn btn-sm btn-primary mx-2 mt-2 mt-md-0"
                        onclick="window.location='/logout'">Logout</button>

                </ul>
            </nav>
        </div>
        <div class="w-100 px-0 px-md-5" style="background: rgba(0, 145, 234, 0.95);">
            <div class="container-fluid px-0 px-md-4">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item">
                                <a class="nav-link text-light" href="{{route('prison.dashboard')}}">Home</a>
                            </li>

                            <li class="nav-item dropdown">
                                <a class="nav-link text-light dropdown-toggle" href="#" id="navbarDropdown"
                                    role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Configuration
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="#">Dial Pattern</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="{{route('prison.extensions.index')}}"> Extension</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="">Ring Group</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="{{route('prison.did.index')}}">DID</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="{{route('prison.config.daynight')}}">Day Night</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="{{route('prison.config.ivr')}}">IVR</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="{{route('prison.config.voicemail')}}">VoiceMail</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">Announcement</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">Music On Hold</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">Sound file</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">Paging</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="">Conference</a>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link text-light dropdown-toggle" href="#" id="navbarDropdown"
                                    role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Miscellaneous
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="#">Feature Code </a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#"> Pickup Group</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#"> Departments</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#"> Holidays</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">Central Phonebook</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">API Users</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#"> LDAP Synchronization</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#"> Global CLI Config </a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">Tenant Users</a>

                                </div>

                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link text-light dropdown-toggle" href="#" id="navbarDropdown"
                                    role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Billing</a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="#">Invoice</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#"> Balance List</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">Payment History</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">My Rates</a>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link text-light dropdown-toggle" href="#" id="navbarDropdown"
                                    role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Live Report</a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{route('prison.reports.calls')}}">Live Calls</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="{{route('prison.reports.onlinesipuser')}}"> Live
                                        Online SIP Users</a>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link text-light dropdown-toggle" href="#" id="navbarDropdown"
                                    role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Call History</a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{route('prison.callhistory')}}">Tenant Call
                                        History</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#"> Top Destinations</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">Fail Logs</a>

                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link text-light dropdown-toggle" href="#" id="navbarDropdown"
                                    role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Contact Center</a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="#">Queues</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#"> Agents</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">Contact Center Call Monitoring</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">Agent Statistics</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">Agent Log Statistics</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">Missed Call Report</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#"> Answered Call Statistics</a>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link text-light dropdown-toggle" href="#" id="navbarDropdown"
                                    role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Account</a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('user.account') }}">Profile</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="{{ route('user.setting') }}"> Edit Profile</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="{{ route('user.buymore') }}">Buy More Minutes</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="{{ route('prison.plan.index') }}">Plan History</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="{{ route('user.orders') }}">Order History</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="{{ route('user.usage') }}">Account Usage</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="{{ route('user.expiry') }}">Account Expiry</a>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('prison.cart') }}" class="nav-link text-light"><strong>{{
                                        count($orders) }}
                                    </strong>
                                    Items In Cart</a>
                            </li>
                            <!-- <li class="nav-item dropdown">
                                <a class="nav-link text-light dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Fax</a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="#">Send Fax List</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#"> Fax Mail Group</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">Receive Fax Configuration</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">Received Fax List</a>
                                </div>
                            </li> -->
                        </ul>
                    </div>
                </nav>
            </div>
        </div>

    </header>
    <!-- Header Area End -->

    <main class="mt-5" style="min-height: 62vh;">
        @yield('content')
    </main>

    <!-- Footer Area -->
    <footer class="page-footer text-center font-small primary-color-dark darken-2 mt-4 wow fadeIn"
        style="background-color: #0d47a1">
        <div class="footer-copyright py-3">
            © 2019 Copyright:
            <a href="https://www.xorexs.com/" target="_blank" style="color: #fff;"> Xorexs </a>
        </div>
    </footer>
    <!-- Footer Area End-->

    <!-- All js here -->
    <script src="{{asset('prison/js/vendor/jquery-1.12.4.min.js')}}"></script>
    <script src="{{ asset('prison/js/jquery.nav.js') }}"></script>
    <script src="{{ asset('prison/js/jquery.ajaxchimp.min.js') }}"></script>
    <script src="{{ asset('prison/js/jquery.meanmenu.js') }}"></script>
    <script src="{{ asset('prison/js/popper.min.js') }}"></script>
    <script src="{{ asset('prison/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('prison/js/slick.min.js') }}"></script>
    <script src="{{ asset('prison/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('prison/js/ajax-mail.js') }}"></script>
    <script src="{{ asset('prison/js/wow.min.js') }}"></script>
    <script src="{{ asset('prison/js/counterup.js') }}"></script>
    <script src="{{ asset('prison/js/plugins.js') }}"></script>

    <!-- google map api -->

    <script src="{{ asset('prison/js/main.js') }}"></script>
    @stack('scripts')
</body>

</html>