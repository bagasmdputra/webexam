@extends('layouts.exampage')

@section('content')
<head>
  <title>Exam Question</title>
  <link href="{{asset('css/question.css')}}" rel="stylesheet" />
  <style type="text/css">
  </style>

  <script src="{{asset('js/jquery.js')}}"></script>
  <script type="text/javascript">
    function nextQuestion() {
      var pathArray = window.location.pathname.split('/');
      var currentQuest = Number(pathArray[pathArray.length - 1]);
      currentQuest += 1;
      window.location = 'http://localhost:8000/exam/real_exam_1/' + currentQuest;
    }

    function prevQuestion() {
      var pathArray = window.location.pathname.split('/');
      var currentQuest = Number(pathArray[pathArray.length - 1]);
      currentQuest -= 1;
      window.location = 'http://localhost:8000/exam/real_exam_1/' + currentQuest;
    }

    function changeValue(buttonID) {
      if (buttonID === 'mark') {
        console.log("a");
      } else if (buttonID === 'answer') {
        console.log("b");
      }
    }
  </script>

</head>
<div class="container">
  <div id="questionBlock">
    @foreach($quest_detail as $question)
    <div id="q{{ $question-> id_question }}" class="questionBlock">
      <table style="float: right; margin-right: -10%;">
        <tr><td><button class="marked tooltip" onclick="changeValue('mark')"><p class="tooltiptext">Marked</p></button></td><td><button class="back-to-grid tooltip"><p class="tooltiptext">Back to Grid</p></button></td></tr>
        <tr><td><button class="answered tooltip" onclick="changeValue('answer')"><p class="tooltiptext">Answered</p></button></td><td><button class="back-to-grid tooltip"><p class="tooltiptext">Back to Grid</p></button></td></tr>

      </table>

      <form class="question" action="/exam" method="post">
        {{ csrf_field() }}
        <table>
            <tr><h2 style="font-size:40px; color: #888888; font-family:'Quicksand'; position:relative;">Question {{ $question-> domain }}</h2></tr>
            <tr><h3 style="font-size:15px; color: #888888; font-family:'Quicksand'; margin-top: 5%;">{{ $question-> question }}</h3></tr>
            <ul style="margin-top: 5%;">
            @foreach($quest_option as $answer)
              <tr>
                <td><label><input type="radio" name="user_answer" value="{{ $answer->option_number }}">{{ $answer->option }}</label></td>
              </tr>
            @endforeach
          </ul>
          <tr>
          </tr>
        </table>

        <input type="hidden" name="exam_takens_id" value="4">
        <input type="hidden" name="question_id" value="41">
        <input type="hidden" name="isMarked" id="isMarked" value="1">
        <input type="hidden" name="isAnswered" id="isAnswered" value="1">
        <input type="hidden" name="time_taken" value="100">
        <button type="submit" class="prev-next "  style="float:right; display: inline-block; margin-left: 2%; margin-right: -10%; margin-top: 15%; " onclick="nextQuestion()">Next</button>
        <button type="button" class="prev-next"  style="float:right; display: inline-block; margin-right: 3%; margin-top: 15%; " onclick="prevQuestion()">Prev</button>
        <button type="submit" class="end-exam" style="float:left; display: inline-block;  margin-left: 2%; margin-top: 15%;" onclick="prevQuestion()">End Exam</button>
      </form>
      @endforeach
        <tr>
        </tr>
      </table>
    </div>
  </div>
</div>

@endsection
