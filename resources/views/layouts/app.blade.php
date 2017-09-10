<!doctype html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
        <link rel="profile" href="http://gmpg.org/xfn/11">
        <title>@yield('title')</title>
        <link rel='stylesheet' id='opensans-css' href='https://fonts.googleapis.com/css?family=Open+Sans%3A300%2C300i%2C400%2C400i%2C600%2C600i%2C700%2C700i%2C800%2C800i&#038;ver=4.8' type='text/css' media='all' />
        <link rel='stylesheet' id='robotoslab-css' href='https://fonts.googleapis.com/css?family=Roboto+Slab%3A100%2C300%2C400%2C700&#038;ver=4.8' type='text/css' media='all' />
        <!-- <script src="https://use.fontawesome.com/db8e2cc276.js"></script> -->

        <!-- This site is optimized with the Yoast SEO plugin v4.9 - https://yoast.com/wordpress/plugins/seo/ -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link rel='dns-prefetch' href='//fonts.googleapis.com' />
        @yield('css')
        <!-- <link rel='dns-prefetch' href='//s.w.org' />
        <link rel="alternate" type="application/rss+xml" title="Riyo &raquo; Feed" href="http://www.riyo.io/feed/" />
        <link rel="alternate" type="application/rss+xml" title="Riyo &raquo; Comments Feed" href="http://www.riyo.io/comments/feed/" /> -->
        <link href="{{asset('css/styles.css')}}" rel="stylesheet" />
        <link href="{{asset('css/membership.css')}}" rel="stylesheet" />
        <link href="{{asset('css/contact.css')}}" rel="stylesheet" />
        <link href="{{asset('css/grid.css')}}" rel="stylesheet" />
        <link href="{{asset('css/slick-themes.css')}}" rel="stylesheet" />

        <!-- <script src="{{asset('js/jquery-migrate.min.js')}}"></script> -->
        <script src="{{asset('js/jquery.js')}}"></script>
        <script type="text/javascript"
            src="https://app.sandbox.midtrans.com/snap/snap.js"
            data-client-key="VT-client-Gy9bkeD5NcpWvT22"></script>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
  </head>
        <!-- Scripts -->
        <script>
            window.Laravel = {!! json_encode([
                'csrfToken' => csrf_token(),
            ]) !!};
        </script>


    </head>
    <body class="home page-template-default page page-id-50 group-blog">
      @yield('svg')
        <div id="page" class="site">
            <a class="skip-link screen-reader-text" href="#content">Skip to content</a>
            <header id="masthead" class="site-header" role="banner">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-2 col-md-3 col-lg-3">
                            <div class="site-branding">
                                <a id="logo" href="{{URL::route('profile') }}">
                                  <img src="{{asset('img/logo hitam.png')}}" width="85px" height="10px" alt="Certife">
                                </a>
                            </div>
                            <!-- .site-branding -->
                        </div>
                        <div class="col-xs-12 col-sm-7 col-md-6 col-lg-6">
                            <nav id="site-navigation" class="main-navigation" role="navigation">
                                <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
                                <span id="nav-icon3">
                                <span></span>
                                <span></span>
                                <span></span>
                                <span></span>
                                </span>
                                </button>
                                <div class="menu-top-main-menu-container" style="text-align: center;">
                                    <ul id="primary-menu" class="menu">
                                      <li id="menu-item-18" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-18"><a href="about"></a>
                                      </li>
                                      <li id="menu-item-18" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-18"><a href="about"></a>
                                      </li>
                                        <li id="menu-item-17" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-17"><a href="{{URL::route('profile') }}">@if (Auth::guest())
                                          Home
                                        @else
                                          Dashboard
                                        @endif</a>
                                        </li>
                                        <li id="menu-item-18" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-18"><a href="about">About Us</a>
                                        </li>
                                        <li id="menu-item-16" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-16"><a href="contact">Contact</a>
                                        </li>
                                        </ul>
                                </div>
                            </nav>
                            <!-- #site-navigation -->
                        </div>
                        <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                            <div class="top-login">
                                @if (Auth::guest())
                                  <a href="{{url('/login')}}">Log In</a>
                                  <div id="riyo-login-form" class="hidden" style="display: none;">
                                      <!-- HTML for login form -->
                                      <div class="popup-box">
                                          <a href="#" class="close-btn js-modal-close"></a>
                                          <h2 class="block-title-red">Login</h2>
                                          <span class="text-gray">We just need few details</span>
                                          <form class="popup-form login" autocomplete="off" action="{{ route('login') }}">
                                            {{ csrf_field() }}
                                              <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                              <label class="full">
                                              <span>Email</span>
                                              <input type="text" id="email" name="email" placeholder="Email" value="{{ old('email') }}">
                                              @if ($errors->has('email'))
                                                  <span class="help-block">
                                                      <strong>{{ $errors->first('email') }}</strong>
                                                  </span>
                                              @endif
                                              </label>
                                            </div>
                                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                              <label class="full">
                                              <span>Password</span>
                                              <input type="password" id="password" name="password" placeholder="Password">
                                              @if ($errors->has('password'))
                                                  <span class="help-block">
                                                      <strong>{{ $errors->first('password') }}</strong>
                                                  </span>
                                              @endif
                                              </label>
                                            </div>
                                            <div class="form-group">
                                              <input type="submit" value="Login" >
                                            </div>

                                              <div>
                                                  <a href="" class="forgot">Forgot Password?</a>
                                              </div>
                                          </form>
                                      </div>
                                  </div>

                                @endif

                        @if (Auth::guest())
                              <a class="btn" href="{{url('/')}}">Sign Up</a>

                            <div id="riyo-active-form" class="hidden" style="display: none;">
                                <!-- HTML for signup form -->
                                <div class="popup-box">
                                    <h2 class="block-title-red">Activate Your Account</h2>
                                    <span class="text-gray">We've sent verification code to your email.</span>
                                </div>
                            </div>
                            <div id="riyo-signup-form" class="hidden" style="display: none;">
                                <!-- HTML for signup form -->
                                <div class="popup-box">
                                    <a href="#" class="close-btn js-modal-close"></a>
                                    <h2 class="block-title-red">Get Started.</h2>
                                    <span class="text-gray">We just need a few details.</span>

                                    <form class="popup-form signup" action="">
                                        <label class="full"><span>Name</span>
                                        <input type="text" id="fullname" name="fullname" placeholder="Your Name">
                                        </label>
                                        <label class="full"><span>Email</span>
                                        <input type="email" id="email" name="email" placeholder="Your Email Address">
                                        </label>
                                        <input type="submit" value="Sign Up" class="signup-submit " data-modal-id="#riyo-active-form" href="#">
                                        <input type="hidden" id="riyo-signup-field" name="riyo-signup-field" value="50f194e9ae" />
                                        <input type="hidden" name="_wp_http_referer" value="/" />
                                    </form>
                                </div>
                            </div>
                        @else
                            <div class="dropdown">
                                <a class="btn" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    <img class="profile-image img-circle" src="/storage/{{ Auth::user()->avatar }}" style="width:32px; height:32px; top:10px; left:10px; right:10px; margin-right:10px; border-radius:50%">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                      <a href="{{ route('logout') }}"
                                          onclick="event.preventDefault();
                                                   document.getElementById('logout-form').submit();"><i class="fa fa-btn fa-sign-out"></i>
                                          logout
                                      </a>


                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                        <form id="profile-form" action="{{ route('profile') }}" method="GET" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        @endif



                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- #masthead -->

            @yield('content')
            <footer id="colophon" class="site-footer" role="contentinfo">

                <div class="site-info">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <p class="copyright">Copyright <a href="http://www.riyo.io">Web Exam</a> 2017</p>
                                <div class="menu-footer-menu-container">
                                    <ul id="footer-menu" class="menu">
                                        <li id="menu-item-68" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-68"><a href="http://www.riyo.io/website-terms-of-use/">Terms of Service</a>
                                        </li>
                                        <li id="menu-item-67" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-67"><a href="http://www.riyo.io/privacy/">Privacy Policy</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- .row -->
                    </div>
                    <!-- .container -->
                </div>
                <!-- .site-info -->
            </footer>
        </div>
        <!-- <script type='text/javascript'>
            /* <![CDATA[ */
            var wpcf7 = {
                "apiSettings": {
                    "root": "http:\/\/www.riyo.io\/wp-json\/",
                    "namespace": "contact-form-7\/v1"
                },
                "recaptcha": {
                    "messages": {
                        "empty": "Please verify that you are not a robot."
                    }
                },
                "cached": "1"
            };
            /* ]]> */
        </script> -->


        <!-- <script type='text/javascript'>
            /* <![CDATA[ */
            var riyo = {
                "ajax": "http:\/\/www.riyo.io\/wp-admin\/admin-ajax.php",
                "url": "http:\/\/www.riyo.io\/"
            };
            /* ]]> */
        </script> -->
        <!-- <script type='text/javascript' src='http://www.riyo.io/wp-content/themes/riyo/js/custom.js?ver=4.8'></script> -->
        <!-- <script type='text/javascript' src='http://www.riyo.io/wp-includes/js/wp-embed.min.js?ver=4.8'></script>
        <div id="riyo-popup" class="modal-box">
            <div class="popup-container"></div>
        </div>
        <script type="text/javascript">
            (function(i, s, o, g, r, a, m) {
                i['GoogleAnalyticsObject'] = r;
                i[r] = i[r] || function() {
                    (i[r].q = i[r].q || []).push(arguments)
                }, i[r].l = 1 * new Date();
                a = s.createElement(o),
                    m = s.getElementsByTagName(o)[0];
                a.async = 1;
                a.src = g;
                m.parentNode.insertBefore(a, m)
            })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');

            ga('create', 'UA-75070078-1', 'auto');
            ga('send', 'pageview');
        </script> -->
        <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/pricing.js') }}"></script>


    </body>
</html>
