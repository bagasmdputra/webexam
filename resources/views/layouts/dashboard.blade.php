<!doctype html>
<html lang="{{ config('dashboard.locale') }}">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
        <link rel="profile" href="http://gmpg.org/xfn/11">
        <title>@yield('title')</title>
        <link rel='stylesheet' id='opensans-css' href='https://fonts.googleapis.com/css?family=Open+Sans%3A300%2C300i%2C400%2C400i%2C600%2C600i%2C700%2C700i%2C800%2C800i&#038;ver=4.8' type='text/css' media='all' />
        <link rel='stylesheet' id='robotoslab-css' href='https://fonts.googleapis.com/css?family=Roboto+Slab%3A100%2C300%2C400%2C700&#038;ver=4.8' type='text/css' media='all' />


        <link rel='dns-prefetch' href='//fonts.googleapis.com' />
        <!-- <link rel='dns-prefetch' href='//s.w.org' /> -->
        <!-- <link rel="alternate" type="application/rss+xml" title="Riyo &raquo; Feed" href="http://www.riyo.io/feed/" />
        <link rel="alternate" type="application/rss+xml" title="Riyo &raquo; Comments Feed" href="http://www.riyo.io/comments/feed/" /> -->
        <link href="{{asset('css/styles.css')}}" rel="stylesheet" />
        <link href="{{asset('css/dashboard.css')}}" rel="stylesheet" />



        <!-- <script src="{{asset('js/jquery-migrate.min.js')}}"></script> -->
        <script src="{{asset('js/jquery.js')}}"></script>



    </head>
    <body class="home page-template-default page page-id-50 group-blog">
      <div id="page" class="site">
          <header id="masthead" class="site-header" role="banner">
              <div class="container">
                  <div class="row">
                      <div class="col-xs-12 col-sm-2 col-md-3 col-lg-3">
                          <div class="site-branding">
                              <a id="logo" href="index.html">
                              <img src="{{asset('img/logo.png')}}" width="132" height="24" >
                              </a>
                          </div>
                          <!-- .site-branding -->
                      </div>
                  </div>
              </div>
          </header>
          <!-- #masthead -->

          @yield('content')


      </div>
    </body>
  </html>
