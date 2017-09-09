@extends('layouts.landing')

@section('content')
<head>
   <meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
	 <link href="{{asset('css/dashboard.css')}}" rel="stylesheet" />



   <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
    <script src="{{asset('js/dashboard.js')}}"></script>
   <title>Certife - Finish Confirmation</title>
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

<div id="confirm-body">
  <p class="title">Confirmation</p>
  <p class="notes">Once you submit, you will no longer be able to change your answers for this attempt.
    <br>Are you sure to want to end the exam?</p>
  <div class="btn-confirmation">
    <div class="start-attempt">
      <a href="webexam/public/exam/real_exam_1/" class="btn-start-attempt">Submit all and finish</a>
      </div>
      <div class="cancel">
      <a href="webexam/public/dashboard/" class="btn-cancel">Cancel</a>
      </div>
</div>
</div>



<!-- kalo udah ngambil exam, tulisan diatas di ganti sama tabel history ini -->



</body>

<footer>
<p>Copyright <strong>Certife</strong> 2017 &copy;</p>

</footer>

@endsection
