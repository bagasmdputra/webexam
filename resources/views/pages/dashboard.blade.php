@extends('layouts.app')

@section('content')
<!doctype html>
<html lang="en" class="no-js">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="css/reset.css"> <!-- CSS reset -->
	<link rel="stylesheet" href="css/style.css"> <!-- Resource style -->
	<script src="js/modernizr.js"></script> <!-- Modernizr -->

</head>
<body>

<section class="cd-faq">

	<h2 class="block-title-red" style="font-size:60px;">Welcome,   {{ Auth::user()->name }}</h2>
	<h4>Your expiration date is on <span style="font-weight: bold;">  {{ Auth::user()->expired_at }}</span></h4>
	<div class="cd-faq-items">
		<ul id="basics" class="cd-faq-group">


			<li>
				<a class="cd-faq-trigger" href="#0">Learning Exam</a>
				<div class="cd-faq-content">
					<div>
						<a class="cd-faq-title" href="#0">Learning 1 <span style="padding-left: 75%; display: inline-block; ">last result : 22.8%</span></a>
					</div>
					<div>
						<a class="cd-faq-title" href="#0">Learning 2 <span style="padding-left: 75%; display: inline-block; ">last result : 22.8%</span></a>
					</div>
					<div>
						<a class="cd-faq-title" href="#0">Learning 3 <span style="padding-left: 75%; display: inline-block; ">last result : 22.8%</span></a>
					</div>
					<div>
						<a class="cd-faq-title" href="#0">Learning 4 <span style="padding-left: 75%; display: inline-block; ">last result : 22.8%</span></a>
					</div>
					<div>
						<a class="cd-faq-title" href="#0">Learning 5 <span style="padding-left: 75%; display: inline-block; ">last result : 22.8%</span></a>
					</div>
				</div> <!-- cd-faq-content -->
			</li>


		</ul> <!-- cd-faq-group -->

		<ul id="mobile" class="cd-faq-group">
			<li>
				<a class="cd-faq-trigger" href="#0">Real Exam</a>
				<div class="cd-faq-content">
					<div>
						<a class="cd-faq-title" href="#0">Real Exam 1 <span style="padding-left: 75%; display: inline-block; ">last result : 22.8%</span></a>
					</div>
					<div>
						<a class="cd-faq-title" href="#0">Real Exam 2 <span style="padding-left: 75%; display: inline-block; ">last result : 22.8%</span></a>
					</div>
					<div>
						<a class="cd-faq-title" href="#0">Real Exam 3 <span style="padding-left: 75%; display: inline-block; ">last result : 22.8%</span></a>
					</div>
					<div>
						<a class="cd-faq-title" href="#0">Real Exam 4 <span style="padding-left: 75%; display: inline-block; ">last result : 22.8%</span></a>
					</div>
					<div>
						<a class="cd-faq-title" href="#0">Real Exam 5 <span style="padding-left: 75%; display: inline-block; ">last result : 22.8%</span></a>
					</div>
				</div> <!-- cd-faq-content -->
			</li>
		</ul> <!-- cd-faq-group -->


	</div> <!-- cd-faq-items -->
	<a href="#0" class="cd-close-panel">Close</a>
</section> <!-- cd-faq -->
<script src="js/jquery-2.1.1.js"></script>
<script src="js/jquery.mobile.custom.min.js"></script>
<script src="js/main.js"></script> <!-- Resource jQuery -->
</body>
</html>
@endsection
