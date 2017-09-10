@extends('layouts.landing')

@section('content')
<head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>PMP Simulator</title>

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
<body class="blue header">

		<!-- Top menu -->
    <div >
      <a href="{{URL::route('profile') }}">
        <img src="{{asset('img/logo putih.png')}}" class="logo-brand" alt="Certife">
      </a>

    </div>

        <!-- Top content -->
        <div class="top-content">

            <div class="inner-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-7 text">
                            <h1><strong>Online Testing for Business & Education</strong></h1>
                            <div class="description">
                            	<p>
                                    Discover an easy to use, paperless, and interactive approach to expedite your examination process.
                                </p>
                            </div>
                            <div class="top-big-link">

                            	<a class="btn btn-link-2" href="#">Try Free Trial</a>
                            </div>
                        </div>
                        <div class="col-sm-5 form-box">
                        	<div class="form-top">
                        		<div class="form-top-left">
                        			<h3>Register Now</h3>
                            		<p>Fill in the form below to get instant access</p>
                        		</div>
                        		<div class="form-top-right">
                        			<i class="fa fa-pencil"></i>
                        		</div>
                            </div>
                            <div class="form-bottom">
			                    <form action="{{ route('register') }}" method="post" class="registration-form">
                              {{ csrf_field() }}
			                    	<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
			                    		<label class="sr-only" for="form-name">Name</label>
			                        	<input type="text" name="name" placeholder="Name" class="regist-form form-control" id="name"  value="{{ old('name') }}" required autofocus>
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
			                        </div>
			                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
			                        	<label class="sr-only" for="form-email">Email</label>
			                        	<input type="email" name="email" placeholder="Email Address" class="regist-form form-control" id="email" value="{{ old('email') }}" required>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
			                        </div>
			                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
			                        	<input id="password" type="password" class="regist-form form-control" placeholder="Password" name="password" required>
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
			                        </div>
                                    <div class="form-group">
                                        <label class="sr-only" for="form-password">Confirm Password</label>
                                        <input id="password-confirm" type="password" class="regist-form form-control" name="password_confirmation" placeholder="Confirm password" required>
                                    </div>


			                             <button type="submit" class="btn btn-link-1" style="">Sign Up</button><br>
                                   <a href="{{url('/login')}}" class="login">Already have an account? Log In</a>

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

        <p class="footer" style="color: white;">

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

                        </p>

    </body>
@endsection
