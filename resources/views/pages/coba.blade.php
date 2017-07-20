@extends('layouts.examkosong')

@section('content')

<html>
<HEAD>
<title>JS Quiz</title>
<style type="text/css">
.questionBlock { display:none; }
</style>

<script type="text/javascript">
// From: http://www.webdeveloper.com/forum/showthread.php?t=232698
// Modified for: http://www.webdeveloper.com/forum/showthread.php?t=253981

var answers = new Array(10);        // Number of questions displayed in the answer area
answers[0] = "Brazil"; //Answers to Questions
answers[1] = "Uruguay";
answers[2] = "Jules Rimet Trophy";
answers[3] = "1966";
answers[4] = "Angola";
answers[5] = "Cafu";
answers[6] = "7";
answers[7] = "Jabulani";
answers[8] = "Zidane";
answers[9] = "Waddle";
answers[10] = "Brazil"; //Answers to Questions
answers[11] = "Uruguay";
answers[12] = "Jules Rimet Trophy";
answers[13] = "1966";
answers[14] = "Angola";
answers[15] = "Cafu";
answers[16] = "7";
answers[17] = "Jabulani";
answers[18] = "Zidane";
answers[19] = "Waddle";

var currentQues = 0;			//Current question to display
var numQues = answers.length;	//Number of Questions
var numChoi = 3;	        	//How many possible answers

function getScore(form) {
 var score = 0;													// initialize score
 var currElt;													// initialize variables
 var currSelection;
 for (i=0; i<numQues; i++) {									// check all questions
  currElt = i*numChoi;											// form element to check
  for (j=0; j<numChoi; j++) {									// check each choice of question
   currSelection = form.elements[currElt + j];					// form element to test if checked
   if (currSelection.checked) {									// true if checked
    if (currSelection.value == answers[i]) { 					// then compare checked value to answer
	  score++;													// if match, then increment score value
      break; }	  	      										// ttop check as match has been found
   }
  }
 }

/* following is un-necessary unless you want to see answer
  var correctAnswers = '';
  for (var i=1; i<=numQues; i++) {
    correctAnswers += i + ". " + answers[i-1] + "\r\n";
  }
  alert(correctAnswers);
*/

 score = Math.round(score/numQues*100); 						// Works out percentage
 form.percentage.value = score + "";							// display score value
 return false;										// make form NOT reset the page
}

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
 </script>

</HEAD>
<BODY>
<h3>World Cup Quiz</h3>

<form name="quiz" onsubmit="return getScore(this)">
<div id="questionBlock">
  @foreach ($exam_question as $question)

<div id="q{{ $question-> id_question }}" class="questionBlock">
<p>{{ $question-> id_question }} .  {{ $question-> question }}</p>
 <ul style="margin-top: 1pt">
  <li><label><input type="radio" name="q{{ $question-> id_question }}" value="Brazil">Brazil</label></li>
  <li><label><input type="radio" name="q{{ $question-> id_question }}" value="Argentina">Argentina</label></li>
  <li><label><input type="radio" name="q{{ $question-> id_question }}" value="Italy">Italy</label></li>
 </ul>
</div>




<div id="q{{ $question-> id_question }}" class="questionBlock">
<input type="submit" value="Submit">
Score = <strong><input type="text" size="5" name="percentage" disabled></strong>
</div>
@endforeach
<button onclick="nextQuestion()">Next Question</button>
</div>
</form>
</body>
</html>

  @endsection
