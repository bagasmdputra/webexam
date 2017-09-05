@extends('layouts.landing')

@section('content')
<head>
   <meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
	 <link href="{{asset('css/dashboard.css')}}" rel="stylesheet" />



   <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
    <script src="{{asset('js/dashboard.js')}}"></script>
   <title>Certife - History</title>
</head>

<script type="text/javascript">
	function test(url_name) {
		window.open('/exam/'+url_name+'/1','winname','directories=no,titlebar=no,toolbar=no,location=no,status=no,menubar=no,scrollbars=no,height='+screen.height+', width='+screen.width+')');
	}
</script>

<body>

<div id='cssmenu'>
<ul>
   <li><a href='#'><span>About</span></a></li>
   <li class='active has-sub'><a href='#'><span>Features</span></a>
      <ul>
         <li><a href='#'><span>History</span></a>
         </li>
         <li><a href='#'><span>Review</span></a>
         </li>
      </ul>
   </li>
   <li><a href='#'><span>Contact</span></a></li>
   <li class='last'>
		 <a href="{{ route('logout') }}"
				 onclick="event.preventDefault();
									document.getElementById('logout-form').submit();"><i class="fa fa-btn fa-sign-out"></i>
				 ({{ Auth::user()->name }}) logout
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

<div class="top">
   <h2 id="title">Welcome, {{ Auth::user()->name }}</h2>
   <h3 id="expired">Your expiration date is on <strong>{{ Auth::user()->expired_at }}</strong></h3>


</div>


 <div class="not-taken">

<!-- ini kalo belom ambil exam, tampilin ini doang -->
   <p>You have not taken any exam yet.</p>


</div>

<div class="start">
<a href="webexam/public/exam/real_exam_1/" class="btn-start">Start Exam</a>

</div>
<!-- kalo udah ngambil exam, tulisan diatas di ganti sama tabel history ini -->

<div class="history">
<table class="history">
  <tr>
    <th>Name</th>
    <th>Correct</th>
    <th>Wrong</th>
    <th>Time Taken</th>
  </tr>
  <tr>
    <td>Package 1</td>
    <td>20</td>
    <td>30</td>
    <td>75 s</td>
  </tr>
  <tr>
   <td>Package 2</td>
    <td>20</td>
    <td>30</td>
    <td>75 s</td>
  </tr>
  <tr>
    <td>Package 3</td>
    <td>20</td>
    <td>30</td>
    <td>75 s</td>
  </tr>

</table>

</div>

</body>

<footer>
<p>Copyright <strong>Certife</strong> 2017 &copy;</p>

</footer>

@endsection
