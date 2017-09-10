<!doctype html>
<html lang="{{ config('exampage.locale') }}">

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
        <!--<link href="{{asset('css/question.css')}}" rel="stylesheet" />-->



        <!-- <script src="{{asset('js/jquery-migrate.min.js')}}"></script> -->
        <script src="{{asset('js/jquery.js')}}"></script>



    </head>
    <body class="home page-template-default page page-id-50 group-blog">
      <div id="page" class="site">
          

          @yield('content')


      </div>
    </body>
  </html>
