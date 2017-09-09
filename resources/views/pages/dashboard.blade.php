@extends('layouts.landing')

@section('content')
<head>
   <meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
	 <link href="{{asset('css/dashboard.css')}}" rel="stylesheet" />



   <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
    <script src="{{asset('js/dashboard.js')}}"></script>
   <title>Certife - Dashboard</title>
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
   <!-- <li class='active has-sub'><a href='#'><span>Features</span></a>
      <ul>
         <li><a href='#'><span>History</span></a>
         </li>
         <li><a href='#'><span>Review</span></a>
         </li>
      </ul>
   </li> -->
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

<div id="content-dashboard">

<div class="top">
   <h2 id="title">Welcome, {{ Auth::user()->name }}</h2>
   <h3 id="expired">Your expiration date is on <strong>{{ Auth::user()->expired_at }}</strong></h3>


</div>


 <div class="not-taken">

<!-- ini kalo belom ambil exam, tampilin ini doang -->
@if (!Session::has('history'))
   <p>You have not taken any exam yet.</p>
@endif

</div>

<div class="start">
<a href="{{url('/start')}}" class="btn-start">Start Exam</a>

</div>
<!-- kalo udah ngambil exam, tulisan diatas di ganti sama tabel history ini -->
@if(Session::has('history'))
<div class="history">
<table class="history">
  <tr>
    <th>State</th>
    <th>Marks/200</th>
    <th>Grade/10.00</th>
    <th>Review</th>
  </tr>
<<<<<<< HEAD
  <tr>
    <td>Finished<br>Submitted Tuesday, 5 September 2017, 10.00 PM</td>
    <td>198/200</td>
    <td>9.80/10.00</td>
    <td><a href="/result" class="btn-review">Review</a></td>
  </tr>
  <tr>
    <td>Finished<br>Submitted Tuesday, 5 September 2017, 10.00 PM</td>
    <td>100/200</td>
    <td>5.00/10.00</td>
    <td><a href="/result" class="btn-review">Review</a></td>
  </tr>
=======
    @foreach (Session::get('history') as $his)
      <tr>
        <td>Finished<br>{{$his->closed_at}}</td>
        <td>$his->total_true</td>
        <td>$his->score</td>
        <td><a href="/result" class="btn-review">Review</a></td>
      </tr>
>>>>>>> 60d13bf777345fe16b2f4f8a87c4e199217cea39


<<<<<<< HEAD
</div>
</div>
=======
    @endforeach
  </table>

  </div>
@endif
>>>>>>> 60d13bf777345fe16b2f4f8a87c4e199217cea39

</body>

<footer>
<p>Copyright <strong>Certife</strong> 2017 &copy;</p>

</footer>

@endsection
