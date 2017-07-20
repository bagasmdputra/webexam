@extends('layouts.exampage')

@section('content')
<head>
<title>Exam Question</title>
<link href="{{asset('css/question.css')}}" rel="stylesheet" />
<style type="text/css">
.questionBlock { display:none; }
</style>

<script type="text/javascript">

var answers = [];

@foreach ($exam_question as $answerr)
answers.push( "{{ $answerr-> answer }}" );
@endforeach



var currentQues = 0;			//Current question to display
var numQues = answers.length;	//Number of Questions
var numChoi = 3;	        	//How many possible answers



function clearQuestions() {
  var sel = document.getElementById('questionBlock').getElementsByTagName('div');
  for (var i=0; i<sel.length; i++) {
	document.getElementById(sel[i].id).style.display = 'none';
  }
}
function nextQuestion() {
  clearQuestions();
  document.getElementById('q'+(currentQues+1)).style.display = 'block';
  currentQues++;  if (currentQues > numQues) { currentQues--; }
}

function prevQuestion() {
  clearQuestions();
  document.getElementById('q'+(currentQues-1)).style.display = 'block';
  currentQues--;  if (currentQues > numQues) { currentQues++; }
}
 </script>

</head>
<body>
<section class="col-12">
  <section>
    <table style="float: right; margin-right: 10%;">
<tr><td><button class="marked tooltip"><p class="tooltiptext">Marked</p></button></td><td><button class="back-to-grid tooltip"><p class="tooltiptext">Back to Grid</p></button></td></tr>
<tr><td><button class="answered tooltip"><p class="tooltiptext">Answered</p></button></td><td><button class="back-to-grid tooltip"><p class="tooltiptext">Back to Grid</p></button></td></tr>
</table>
  </section>


<div class="container">
<div id="questionBlock">
  @foreach ($exam_question as $question)

<div id="q{{ $question-> id_question }}" class="questionBlock">
  <table>
    <tr><h2 style="font-size:40px; color: #888888; font-family:'Quicksand'; position:relative;">Question {{ $question-> id_question }}</h2></tr>
    <tr><h3 style="font-size:15px; color: #888888; font-family:'Quicksand'; margin-top: 5%;">{{ $question-> question }}</h3></tr>
      <ul style="margin-top: 5%;">
        <tr>
          <td><label><input type="radio" name="q{{ $question-> id_question }}" value="{{ $question-> answer }}">{{ $question-> answer }}</label></td>
        </tr>
        <tr>
          <td><label><input type="radio" name="q{{ $question-> id_question }}" value="{{ $question-> answer }}">{{ $question-> answer }}</label></td>
        </tr>
        <tr>
          <td><label><input type="radio" name="q{{ $question-> id_question }}" value="{{ $question-> answer }}">{{ $question-> answer }}</label></td>
        </tr>
        <tr>
          <td><label><input type="radio" name="q{{ $question-> id_question }}" value="{{ $question-> answer }}">{{ $question-> answer }}</label></td>
        </tr>
        <tr>
          <td><label><input type="radio" name="q{{ $question-> id_question }}" value="{{ $question-> answer }}">{{ $question-> answer }}</label></td>
        </tr>
      </ul>
    <tr>
    </tr>
  </table>

</div>


@endforeach




</div>
</div>

</section>
<section class="col-11">
<button class="end-exam" style="float:left; display: inline-block; margin-left: 2%" onclick="prevQuestion()">End Exam</button>
<button class="prev-next" style="float:right; display: inline-block; margin-left: 2%;" onclick="nextQuestion()">Next</button>
<button class="prev-next" style="float:right; display: inline-block; margin-right: 3%;" onclick="prevQuestion()">Prev</button>
</section>
</body>


  @endsection
