<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Admin || Prison Tel</title>
        <!-- HTML5 Shim and Respond.js IE10 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 10]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
        <!-- Meta -->
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui"
        />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- Favicon icon -->
        <link
            rel="icon"
            href="{{ asset('admin/assets/images/favicon.ico') }}"
            type="image/x-icon"
        />
        <!-- Google font-->
        <link
            href="https://fonts.googleapis.com/css?family=Roboto:400,500"
            rel="stylesheet"
        />
        <!-- Required Fremwork -->
        <link
            rel="stylesheet"
            type="text/css"
            href="{{
                asset('admin/assets/css/bootstrap/css/bootstrap.min.css')
            }}"
        />
        <!-- waves.css -->
        <link
            rel="stylesheet"
            href="{{ asset('admin/assets/pages/waves/css/waves.min.css') }}"
            type="text/css"
            media="all"
        />
        <!-- themify icon -->
        <link
            rel="stylesheet"
            type="text/css"
            href="{{
                asset('admin/assets/icon/themify-icons/themify-icons.css')
            }}"
        />
        <!-- Font Awesome -->
        <link
            href="https://use.fontawesome.com/releases/v5.15.1/css/all.css"
            rel="stylesheet"
        />
        <!-- scrollbar.css -->
        <link
            rel="stylesheet"
            type="text/css"
            href="{{ asset('admin/assets/css/jquery.mCustomScrollbar.css') }}"
        />
        <!-- am chart export.css -->
        <link
            rel="stylesheet"
            href="https://www.amcharts.com/lib/3/plugins/export/export.css"
            type="text/css"
            media="all"
        />
        <!-- Style.css -->
        <link
            rel="stylesheet"
            type="text/css"
            href="{{ asset('admin/assets/css/style.css') }}"
        />
        <!-- Custom CSS -->
        <link
            rel="stylesheet"
            type="text/css"
            href="{{ asset('admin/assets/css/custom.css') }}"
        />
    </head>

    <body>
        <!-- Pre-loader start -->
        <div class="theme-loader">
            <div class="loader-track">
                <div class="preloader-wrapper">
                    <div class="spinner-layer spinner-blue">
                        <div class="circle-clipper left">
                            <div class="circle"></div>
                        </div>
                        <div class="gap-patch">
                            <div class="circle"></div>
                        </div>
                        <div class="circle-clipper right">
                            <div class="circle"></div>
                        </div>
                    </div>
                    <div class="spinner-layer spinner-red">
                        <div class="circle-clipper left">
                            <div class="circle"></div>
                        </div>
                        <div class="gap-patch">
                            <div class="circle"></div>
                        </div>
                        <div class="circle-clipper right">
                            <div class="circle"></div>
                        </div>
                    </div>

                    <div class="spinner-layer spinner-yellow">
                        <div class="circle-clipper left">
                            <div class="circle"></div>
                        </div>
                        <div class="gap-patch">
                            <div class="circle"></div>
                        </div>
                        <div class="circle-clipper right">
                            <div class="circle"></div>
                        </div>
                    </div>

                    <div class="spinner-layer spinner-green">
                        <div class="circle-clipper left">
                            <div class="circle"></div>
                        </div>
                        <div class="gap-patch">
                            <div class="circle"></div>
                        </div>
                        <div class="circle-clipper right">
                            <div class="circle"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Pre-loader end -->
        <div id="pcoded" class="pcoded">
            <div class="pcoded-overlay-box"></div>
            <div class="pcoded-container navbar-wrapper">
                <nav class="navbar header-navbar pcoded-header">
                    <div class="navbar-wrapper">
                        <div class="navbar-logo">
                            <a
                                class="mobile-menu waves-effect waves-light"
                                id="mobile-collapse"
                                href="#!"
                            >
                                <i class="ti-menu"></i>
                            </a>
                            <div class="mobile-search waves-effect waves-light">
                                <div class="header-search">
                                    <div class="main-search morphsearch-search">
                                        <div class="input-group">
                                            <span
                                                class="
                                                    input-group-addon
                                                    search-close
                                                "
                                                ><i class="ti-close"></i
                                            ></span>
                                            <input
                                                type="text"
                                                class="form-control"
                                                placeholder="Enter Keyword"
                                            />
                                            <span
                                                class="
                                                    input-group-addon
                                                    search-btn
                                                "
                                                ><i class="ti-search"></i
                                            ></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a href="index.html">
                                <img
                                    class="img-fluid"
                                    src="{{
                                        asset('admin/assets/images/logo.png')
                                    }}"
                                    alt="Theme-Logo"
                                />
                            </a>
                            <a class="mobile-options waves-effect waves-light">
                                <i class="ti-more"></i>
                            </a>
                        </div>

                        <div class="navbar-container container-fluid">
                            <ul class="nav-left">
                                <li>
                                    <div class="sidebar_toggle">
                                        <a href="javascript:void(0)"
                                            ><i class="ti-menu"></i
                                        ></a>
                                    </div>
                                </li>
                                <li class="header-search">
                                    <div class="main-search morphsearch-search">
                                        <div class="input-group">
                                            <span
                                                class="
                                                    input-group-addon
                                                    search-close
                                                "
                                                ><i class="ti-close"></i
                                            ></span>
                                            <input
                                                type="text"
                                                class="form-control"
                                            />
                                            <span
                                                class="
                                                    input-group-addon
                                                    search-btn
                                                "
                                                ><i class="ti-search"></i
                                            ></span>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <a
                                        href="#!"
                                        onclick="javascript:toggleFullScreen()"
                                        class="waves-effect waves-light"
                                    >
                                        <i class="ti-fullscreen"></i>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav-right">
                                <li class="header-notification">
                                    <a
                                        href="#!"
                                        class="waves-effect waves-light"
                                    >
                                        <i class="ti-bell"></i>
                                        <span class="badge bg-c-red"></span>
                                    </a>
                                    <ul class="show-notification">
                                        <li>
                                            <h6>Notifications</h6>
                                            <label class="label label-danger"
                                                >New</label
                                            >
                                        </li>
                                        <li class="waves-effect waves-light">
                                            <div class="media">
                                                <img
                                                    class="
                                                        d-flex
                                                        align-self-center
                                                        img-radius
                                                    "
                                                    src="{{
                                                        asset(
                                                            'admin/assets/images/avatar-2.jpg'
                                                        )
                                                    }}"
                                                    alt="Generic placeholder image"
                                                />
                                                <div class="media-body">
                                                    <h5
                                                        class="
                                                            notification-user
                                                        "
                                                    >
                                                        John Doe
                                                    </h5>
                                                    <p class="notification-msg">
                                                        Lorem ipsum dolor sit
                                                        amet, consectetuer elit.
                                                    </p>
                                                    <span
                                                        class="
                                                            notification-time
                                                        "
                                                        >30 minutes ago</span
                                                    >
                                                </div>
                                            </div>
                                        </li>
                                        <li class="waves-effect waves-light">
                                            <div class="media">
                                                <img
                                                    class="
                                                        d-flex
                                                        align-self-center
                                                        img-radius
                                                    "
                                                    src="{{
                                                        asset(
                                                            'admin/assets/images/avatar-4.jpg'
                                                        )
                                                    }}"
                                                    alt="Generic placeholder image"
                                                />
                                                <div class="media-body">
                                                    <h5
                                                        class="
                                                            notification-user
                                                        "
                                                    >
                                                        Joseph William
                                                    </h5>
                                                    <p class="notification-msg">
                                                        Lorem ipsum dolor sit
                                                        amet, consectetuer elit.
                                                    </p>
                                                    <span
                                                        class="
                                                            notification-time
                                                        "
                                                        >30 minutes ago</span
                                                    >
                                                </div>
                                            </div>
                                        </li>
                                        <li class="waves-effect waves-light">
                                            <div class="media">
                                                <img
                                                    class="
                                                        d-flex
                                                        align-self-center
                                                        img-radius
                                                    "
                                                    src="{{
                                                        asset(
                                                            'admin/assets/images/avatar-3.jpg'
                                                        )
                                                    }}"
                                                    alt="Generic placeholder image"
                                                />
                                                <div class="media-body">
                                                    <h5
                                                        class="
                                                            notification-user
                                                        "
                                                    >
                                                        Sara Soudein
                                                    </h5>
                                                    <p class="notification-msg">
                                                        Lorem ipsum dolor sit
                                                        amet, consectetuer elit.
                                                    </p>
                                                    <span
                                                        class="
                                                            notification-time
                                                        "
                                                        >30 minutes ago</span
                                                    >
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                                <li class="user-profile header-notification">
                                    <a
                                        href="javascript: void(0)"
                                        class="waves-effect waves-light"
                                    >
                                        <img
                                            src="{{
                                                asset(
                                                    'admin/assets/images/avatar-4.jpg'
                                                )
                                            }}"
                                            class="img-radius"
                                            alt="User-Profile-Image"
                                        />
                                        <span
                                            >{{auth()->guard('admin')->user()->name}}</span
                                        >
                                        <i class="ti-angle-down"></i>
                                    </a>
                                    <ul
                                        class="
                                            show-notification
                                            profile-notification
                                        "
                                    >
                                        <li class="waves-effect waves-light">
                                            <a href="#!">
                                                <i class="ti-settings"></i>
                                                Settings
                                            </a>
                                        </li>
                                        <li class="waves-effect waves-light">
                                            <a href="user-profile.html">
                                                <i class="ti-user"></i> Profile
                                            </a>
                                        </li>
                                        <li class="waves-effect waves-light">
                                            <a href="email-inbox.html">
                                                <i class="ti-email"></i> My
                                                Messages
                                            </a>
                                        </li>
                                        <li class="waves-effect waves-light">
                                            <a href="auth-lock-screen.html">
                                                <i class="ti-lock"></i> Lock
                                                Screen
                                            </a>
                                        </li>
                                        <li class="waves-effect waves-light">
                                            <a
                                                href="{{
                                                    route('admin.logout')
                                                }}"
                                            >
                                                <i
                                                    class="
                                                        ti-layout-sidebar-left
                                                    "
                                                ></i>
                                                Logout
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>

                <div class="pcoded-main-container">
                    <div class="pcoded-wrapper">
                        <nav class="pcoded-navbar">
                            <div class="sidebar_toggle">
                                <a href="#"><i class="icon-close icons"></i></a>
                            </div>
                            <div class="pcoded-inner-navbar main-menu">
                                <ul class="pcoded-item pcoded-left-item">
                                    <li
                                        class="pt-3 {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}"
                                    >
                                        <a
                                            href="{{
                                                route('admin.dashboard')
                                            }}"
                                            class="waves-effect waves-dark"
                                        >
                                            <span class="pcoded-micon"
                                                ><i class="ti-home"></i
                                                ><b>D</b></span
                                            >
                                            <span
                                                class="pcoded-mtext"
                                                data-i18n="nav.dash.main"
                                                >Dashboard</span
                                            >
                                            <span class="pcoded-mcaret"></span>
                                        </a>
                                    </li>
                                    <li
                                        class="pcoded-hasmenu {{ request()->routeIs('content.home')||request()->routeIs('content.about')||request()->routeIs('content.feature')||request()->routeIs('content.service')||request()->routeIs('content.plans')||request()->routeIs('content.work')||request()->routeIs('content.faq') ? 'active pcoded-trigger' : '' }}"
                                    >
                                        <a
                                            href="javascript:void(0)"
                                            class="waves-effect waves-dark"
                                        >
                                            <span class="pcoded-micon"
                                                ><i
                                                    class="ti-layout-grid2-alt"
                                                ></i
                                            ></span>
                                            <span
                                                class="pcoded-mtext"
                                                data-i18n="nav.basic-components.main"
                                                >Content</span
                                            >
                                            <span class="pcoded-mcaret"></span>
                                        </a>
                                        <ul class="pcoded-submenu">
                                            <li
                                                class="{{ request()->routeIs('content.home') ? 'active' : '' }}"
                                            >
                                                <a
                                                    href="{{
                                                        route('content.home')
                                                    }}"
                                                    class="
                                                        waves-effect waves-dark
                                                    "
                                                >
                                                    <span class="pcoded-micon"
                                                        ><i
                                                            class="
                                                                ti-angle-right
                                                            "
                                                        ></i
                                                    ></span>
                                                    <span
                                                        class="pcoded-mtext"
                                                        data-i18n="nav.basic-components.alert"
                                                        >Home</span
                                                    >
                                                    <span
                                                        class="pcoded-mcaret"
                                                    ></span>
                                                </a>
                                            </li>
                                            <li
                                                class="{{ request()->routeIs('content.about') ? 'active' : '' }}"
                                            >
                                                <a
                                                    href="{{
                                                        route('content.about')
                                                    }}"
                                                    class="
                                                        waves-effect waves-dark
                                                    "
                                                >
                                                    <span class="pcoded-micon"
                                                        ><i
                                                            class="
                                                                ti-angle-right
                                                            "
                                                        ></i
                                                    ></span>
                                                    <span
                                                        class="pcoded-mtext"
                                                        data-i18n="nav.basic-components.breadcrumbs"
                                                        >About</span
                                                    >
                                                    <span
                                                        class="pcoded-mcaret"
                                                    ></span>
                                                </a>
                                            </li>
                                            <li
                                                class="{{ request()->routeIs('content.feature') ? 'active' : '' }}"
                                            >
                                                <a
                                                    href="{{
                                                        route('content.feature')
                                                    }}"
                                                    class="
                                                        waves-effect waves-dark
                                                    "
                                                >
                                                    <span class="pcoded-micon"
                                                        ><i
                                                            class="
                                                                ti-angle-right
                                                            "
                                                        ></i
                                                    ></span>
                                                    <span
                                                        class="pcoded-mtext"
                                                        data-i18n="nav.basic-components.alert"
                                                        >Features</span
                                                    >
                                                    <span
                                                        class="pcoded-mcaret"
                                                    ></span>
                                                </a>
                                            </li>
                                            <li
                                                class="{{ request()->routeIs('content.service') ? 'active' : '' }}"
                                            >
                                                <a
                                                    href="{{
                                                        route('content.service')
                                                    }}"
                                                    class="
                                                        waves-effect waves-dark
                                                    "
                                                >
                                                    <span class="pcoded-micon"
                                                        ><i
                                                            class="
                                                                ti-angle-right
                                                            "
                                                        ></i
                                                    ></span>
                                                    <span
                                                        class="pcoded-mtext"
                                                        data-i18n="nav.basic-components.breadcrumbs"
                                                        >Services</span
                                                    >
                                                    <span
                                                        class="pcoded-mcaret"
                                                    ></span>
                                                </a>
                                            </li>
                                            <li
                                                class="{{ request()->routeIs('content.plans') ? 'active' : '' }}"
                                            >
                                                <a
                                                    href="{{
                                                        route('content.plans')
                                                    }}"
                                                    class="
                                                        waves-effect waves-dark
                                                    "
                                                >
                                                    <span class="pcoded-micon"
                                                        ><i
                                                            class="
                                                                ti-angle-right
                                                            "
                                                        ></i
                                                    ></span>
                                                    <span
                                                        class="pcoded-mtext"
                                                        data-i18n="nav.basic-components.breadcrumbs"
                                                        >Plans</span
                                                    >
                                                    <span
                                                        class="pcoded-mcaret"
                                                    ></span>
                                                </a>
                                            </li>
                                            <li
                                                class="{{ request()->routeIs('content.work') ? 'active' : '' }}"
                                            >
                                                <a
                                                    href="{{
                                                        route('content.work')
                                                    }}"
                                                    class="
                                                        waves-effect waves-dark
                                                    "
                                                >
                                                    <span class="pcoded-micon"
                                                        ><i
                                                            class="
                                                                ti-angle-right
                                                            "
                                                        ></i
                                                    ></span>
                                                    <span
                                                        class="pcoded-mtext"
                                                        data-i18n="nav.basic-components.alert"
                                                        >How It Works</span
                                                    >
                                                    <span
                                                        class="pcoded-mcaret"
                                                    ></span>
                                                </a>
                                            </li>
                                            <li
                                                class="{{ request()->routeIs('content.faq') ? 'active' : '' }}"
                                            >
                                                <a
                                                    href="{{
                                                        route('content.faq')
                                                    }}"
                                                    class="
                                                        waves-effect waves-dark
                                                    "
                                                >
                                                    <span class="pcoded-micon"
                                                        ><i
                                                            class="
                                                                ti-angle-right
                                                            "
                                                        ></i
                                                    ></span>
                                                    <span
                                                        class="pcoded-mtext"
                                                        data-i18n="nav.basic-components.breadcrumbs"
                                                        >FAQ</span
                                                    >
                                                    <span
                                                        class="pcoded-mcaret"
                                                    ></span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li
                                        class="{{ request()->routeIs('admin.orders') ? 'active' : '' }}"
                                    >
                                        <a
                                            href="{{ route('admin.orders') }}"
                                            class="waves-effect waves-dark"
                                        >
                                            <span class="pcoded-micon"
                                                ><i class="ti-layers"></i
                                                ><b>FC</b></span
                                            >
                                            <span
                                                class="pcoded-mtext"
                                                data-i18n="nav.form-components.main"
                                                >Orders</span
                                            >
                                            <span class="pcoded-mcaret"></span>
                                        </a>
                                    </li>
                                    <li
                                        class="{{ request()->routeIs('admin.users') ? 'active' : '' }}"
                                    >
                                        <a
                                            href="{{ route('admin.users') }}"
                                            class="waves-effect waves-dark"
                                        >
                                            <span class="pcoded-micon"
                                                ><i class="ti-user"></i
                                                ><b>FC</b></span
                                            >
                                            <span
                                                class="pcoded-mtext"
                                                data-i18n="nav.form-components.main"
                                                >Users</span
                                            >
                                            <span class="pcoded-mcaret"></span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </nav>
                        <div class="pcoded-content">
                            <div class="pcoded-inner-content">
                                <!-- Main-body start -->
                                <div class="main-body">
                                    <div class="page-wrapper">
                                        <!-- Page-body start -->
                                        <div class="page-body">
                                            @yield('content')
                                        </div>
                                        <!-- Page-body end -->
                                    </div>
                                </div>
                                <!-- Main-body end -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Warning Section Starts -->
        <!-- Older IE warning message -->
        <!--[if lt IE 10]>
            <div class="ie-warning">
                <h1>Warning!!</h1>
                <p>
                    You are using an outdated version of Internet Explorer,
                    please upgrade
                    <br />to any of the following web browsers to access this
                    website.
                </p>
                <div class="iew-container">
                    <ul class="iew-download">
                        <li>
                            <a href="http://www.google.com/chrome/">
                                <img
                                    src="assets/images/browser/chrome.png"
                                    alt="Chrome"
                                />
                                <div>Chrome</div>
                            </a>
                        </li>
                        <li>
                            <a
                                href="https://www.mozilla.org/en-US/firefox/new/"
                            >
                                <img
                                    src="assets/images/browser/firefox.png"
                                    alt="Firefox"
                                />
                                <div>Firefox</div>
                            </a>
                        </li>
                        <li>
                            <a href="http://www.opera.com">
                                <img
                                    src="assets/images/browser/opera.png"
                                    alt="Opera"
                                />
                                <div>Opera</div>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.apple.com/safari/">
                                <img
                                    src="assets/images/browser/safari.png"
                                    alt="Safari"
                                />
                                <div>Safari</div>
                            </a>
                        </li>
                        <li>
                            <a
                                href="http://windows.microsoft.com/en-us/internet-explorer/download-ie"
                            >
                                <img
                                    src="assets/images/browser/ie.png"
                                    alt=""
                                />
                                <div>IE (9 & above)</div>
                            </a>
                        </li>
                    </ul>
                </div>
                <p>Sorry for the inconvenience!</p>
            </div>
        <![endif]-->
        <!-- Warning Section Ends -->

        <!-- Required Jquery -->
        <script
            type="text/javascript"
            src="{{ asset('admin/assets/js/jquery/jquery.min.js') }}"
        ></script>
        <script
            type="text/javascript"
            src="{{ asset('admin/assets/js/jquery-ui/jquery-ui.min.js') }}"
        ></script>
        <script
            type="text/javascript"
            src="{{ asset('admin/assets/js/popper.js/popper.min.js') }}"
        ></script>
        <script
            type="text/javascript"
            src="{{ asset('admin/assets/js/bootstrap/js/bootstrap.min.js ') }}"
        ></script>
        <script
            type="text/javascript"
            src="{{ asset('admin/assets/pages/widget/excanvas.js ') }}"
        ></script>
        <!-- waves js -->
        <script src="{{
                asset('admin/assets/pages/waves/js/waves.min.js')
            }}"></script>
        <!-- jquery slimscroll js -->
        <script
            type="text/javascript"
            src="{{
                asset('admin/assets/js/jquery-slimscroll/jquery.slimscroll.js ')
            }}"
        ></script>
        <!-- modernizr js -->
        <script
            type="text/javascript"
            src="{{ asset('admin/assets/js/modernizr/modernizr.js ') }}"
        ></script>
        <!-- slimscroll js -->
        <script
            type="text/javascript"
            src="{{ asset('admin/assets/js/SmoothScroll.js') }}"
        ></script>
        <script src="{{
                asset('admin/assets/js/jquery.mCustomScrollbar.concat.min.js ')
            }}"></script>
        <!-- Chart js -->
        <script
            type="text/javascript"
            src="{{ asset('admin/assets/js/chart.js/Chart.js') }}"
        ></script>
        <!-- amchart js -->
        <script src="https://www.amcharts.com/lib/3/amcharts.js"></script>
        <script src="{{
                asset('admin/assets/pages/widget/amchart/gauge.js')
            }}"></script>
        <script src="{{
                asset('admin/assets/pages/widget/amchart/serial.js')
            }}"></script>
        <script src="{{
                asset('admin/assets/pages/widget/amchart/light.js')
            }}"></script>
        <script src="{{
                asset('admin/assets/pages/widget/amchart/pie.min.js')
            }}"></script>
        <script src="https://www.amcharts.com/lib/3/plugins/export/export.min.js"></script>
        <!-- menu js -->
        <script src="{{ asset('admin/assets/js/pcoded.min.js') }}"></script>
        <script src="{{
                asset('admin/assets/js/vertical-layout.min.js ')
            }}"></script>
        <!-- custom js -->
        <script
            type="text/javascript"
            src="{{
                asset('admin/assets/pages/dashboard/custom-dashboard.js')
            }}"
        ></script>
        <script
            type="text/javascript"
            src="{{ asset('admin/assets/js/script.js') }}"
        ></script>
        @stack('scripts')
    </body>
</html>