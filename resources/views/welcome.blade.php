@extends('layouts.landing')

@section('content')
<head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Bootstrap Registration Form Template</title>

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
		<nav class="navbar navbar-inverse navbar-no-bg" role="navigation">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#top-navbar-1">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="index.html"></a>
				</div>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="top-navbar-1">
					<ul class="nav navbar-nav navbar-right">

						<li>
                            <form class="login blue">
                                <input type="text" name="username" class="span2" placeholder="Username">
                                <input type="password" name="password" class="span2" placeholder="Password">
                                <input type="submit" value="Sign In" class="btn"/>
                                <a class="forgot" style="color: #19b9e7;" >Forgot password?</a>
                            </form>

						</li>

					</ul>
				</div>
			</div>
		</nav>

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
			                    <form role="form" action="" method="post" class="registration-form">
			                    	<div class="form-group">
			                    		<label class="sr-only" for="form-name">Name</label>
			                        	<input type="text" name="form-name" placeholder="Name" class="regist-form form-control" id="form-name">
			                        </div>
			                        <div class="form-group">
			                        	<label class="sr-only" for="form-email">Email</label>
			                        	<input type="email" name="form-email" placeholder="Email Address" class="regist-form form-control" id="form-email">
			                        </div>
			                        <div class="form-group">
			                        	<label class="sr-only" for="form-password">Password</label>
			                        	<input type="password" name="form-password" placeholder="Password" class="regist-form form-control" id="form-password">
			                        </div>
                                    <div class="form-group">
                                        <label class="sr-only" for="form-password">Confirm Password</label>
                                        <input type="password" name="form-password" placeholder="Confirm Password" class="regist-form form-control" id="form-confirm-password">
                                    </div>


			                             <button type="submit" class="btn btn-link-1" style="">Sign Up</button>

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
        <ul class="footer">
        <li style="color: white;">

                            <span class="li-text">
                                Copyrigt
                            </span>
                            <a href="#" style="color: white;"><strong>Sertify</strong></a>
                            <span class="li-text">
                                2017
                            </span>
                            <br>
                            <span class="li-social" >
                                <a href="#" style="color: white;"><i class="fa fa-facebook"></i></a>
                                <a href="#" style="color: white;"><i class="fa fa-twitter"></i></a>
                                <a href="#" style="color: white;"><i class="fa fa-envelope"></i></a>
                                <a href="#" style="color: white;"><i class="fa fa-skype"></i></a>
                            </span>

                        </li></ul>

    </body>
@endsection
