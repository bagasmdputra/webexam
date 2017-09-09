@extends('layouts.landing')

@section('content')
<head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>PMP Simulator - Reset Password</title>

        <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('font-awesome/css/font-awesome.min.css')}}">
		<link rel="stylesheet" href="{{asset('css/form-elements.css')}}">
        <link rel="stylesheet" href="{{asset('css/welcome.css')}}">



        <!-- Favicon and touch icons -->
        <link rel="shortcut icon" href="assets/ico/favicon.png">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">

    </head>
<body class="blue header-reset">

		<!-- Top menu -->


        <!-- Top content -->
        <div class="top-content header-reset">

            <div class="inner-bg">
              <div class="container">
                  <div class="row">
                      <div class="col-md-8 col-md-offset-2">
                          <div class="panel panel-default">
                              <div class="panel-heading">Reset Password</div>
                              <div class="panel-body">
                                  @if (session('status'))
                                      <div class="alert alert-success">
                                          {{ session('status') }}
                                      </div>
                                  @endif

                                  <form class="form-horizontal" method="POST" action="{{ route('password.email') }}">
                                      {{ csrf_field() }}

                                      <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                          <label for="email" class="  control-label">E-Mail Address</label>

                                          <div>
                                              <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                              @if ($errors->has('email'))
                                                  <span class="help-block">
                                                      <strong>{{ $errors->first('email') }}</strong>
                                                  </span>
                                              @endif
                                          </div>
                                      </div>

                                      <div class="form-group">
                                          <div>
                                              <button  type="submit" class="btn btn-reset">
                                                  Send Password Reset Link
                                              </button>
                                          </div>
                                      </div>
                                  </form>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>


        </div>


        <!-- Javascript -->
        <script src="{{asset('js/jquery.js')}}"></script>
        <script src="{{asset('js/jquery-1.11.1.min.js')}}"></script>
        <script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('js/jquery.backstretch.min.js')}}"></script>
        <script src="{{asset('js/retina-1.1.0.min.js')}}"></script>
        <script src="{{asset('js/scripts.js')}}"></script>

        <!--[if lt IE 10]>
            <script src="assets/js/placeholder.js"></script>
        <![endif]-->



    </body>
    <footer class="footer" style="color: white;">

                        <span class="li-text">
                            Copyrigt
                        </span>
                        <a href="#" style="color: white;"><strong>Certife</strong></a>
                        <span class="li-text">
                            2017 &copy;
                        </span>
                        <br>
                        <span class="li-social" >
                            <a href="#" style="color: white;"><i class="fa fa-facebook"></i></a>
                            <a href="#" style="color: white;"><i class="fa fa-twitter"></i></a>
                            <a href="#" style="color: white;"><i class="fa fa-envelope"></i></a>
                            <a href="#" style="color: white;"><i class="fa fa-skype"></i></a>
                        </span>

                    </footer>
@endsection
