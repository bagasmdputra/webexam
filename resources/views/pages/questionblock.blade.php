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
      var pathArray = window.location.pathname.split( '/' );
      var newId = Number(pathArray[pathArray.length - 1])
      document.getElementById('next_id').value = Number(newId + 1);
    }

    function prevQuestion() {
      var pathArray = window.location.pathname.split( '/' );
      var newId = Number(pathArray[pathArray.length - 1])
      document.getElementById('next_id').value = Number(newId - 1);
    }

    function changeValue(buttonID) {
      if (buttonID === 'isMarked') {
        if (document.getElementById("isMarked").value == 1) {
          document.getElementById("isMarked").value = 0;
        } else {
          document.getElementById("isMarked").value = 1;
        }
      } else if (buttonID === 'isAnswered') {
        if (document.getElementById("isAnswered").value == 1) {
          document.getElementById("isAnswered").value = 0;
        } else {
          document.getElementById("isAnswered").value = 1;
        }
      }
    }

    function getTimeRemaining(endtime, isMaju) {
      var t;
      if (isMaju) {
        t = Date.parse(endtime) - Date.parse(new Date());
      } else {
        var time_taken = document.getElementById('time_taken').value;
        t = time_taken * 1000;
        document.getElementById('time_taken').value = (Number(time_taken) + 1);
      }
      var seconds = Math.floor((t / 1000) % 60);
      var minutes = Math.floor((t / 1000 / 60) % 60);
      var hours = Math.floor((t / (1000 * 60 * 60)) % 24);
      var days = Math.floor(t / (1000 * 60 * 60 * 24));
      return {
        'total': t,
        'days': days,
        'hours': hours,
        'minutes': minutes,
        'seconds': seconds
      };
    }

    window.onload = function () {
      var taken_at = document.getElementById('taken_at').value;
      var deadline = new Date(Date.parse(new Date(taken_at)) + 1 * 3 * 60 * 60 * 1000);
      initializeClock('clockdiv', deadline, true);
      initializeClock('clockdiv2', 0, false);

      var temp = document.getElementById('user_answer_id').value;
      if (temp != "") {
        $('input:radio[name=user_answer]:nth(' + (temp - 1) + ')').attr('checked',true);
      }
    }

    function initializeClock(id, endtime, isMaju) {
      var clock = document.getElementById(id);
      var hoursSpan = clock.querySelector('.hours');
      var minutesSpan = clock.querySelector('.minutes');
      var secondsSpan = clock.querySelector('.seconds');

      function updateClock() {
        var t = getTimeRemaining(endtime, isMaju);

        hoursSpan.innerHTML = ('0' + t.hours).slice(-2);
        minutesSpan.innerHTML = ('0' + t.minutes).slice(-2);
        secondsSpan.innerHTML = ('0' + t.seconds).slice(-2);

        if (t.total <= 0) {
          clearInterval(timeinterval);
        }
      }

      updateClock();
      var timeinterval = setInterval(updateClock, 1000);
    }
    // -->
  </script>

</head>
<body>
  <h1>Countdown Clock</h1>
    <div id="clockdiv">
      <div>
        <span class="hours"></span>
        <div class="smalltext">Hours</div>
      </div>
      <div>
        <span class="minutes"></span>
        <div class="smalltext">Minutes</div>
      </div>
      <div>
        <span class="seconds"></span>
        <div class="smalltext">Seconds</div>
      </div>
    </div>
    <div id="clockdiv2">
      <div>
        <span class="hours"></span>
        <div class="smalltext">Hours</div>
      </div>
      <div>
        <span class="minutes"></span>
        <div class="smalltext">Minutes</div>
      </div>
      <div>
        <span class="seconds"></span>
        <div class="smalltext">Seconds</div>
      </div>
    </div>
  <div class="container">
    <div id="questionBlock">
      @foreach($quest_detail as $question)
      <div id="q{{ $question-> id_question }}" class="questionBlock">
        <table style="float: right; margin-right: -10%;">
          <tr><td><button class="marked tooltip" onclick="changeValue('isMarked')"><p class="tooltiptext">Marked</p></button></td><td><button class="back-to-grid tooltip"><p class="tooltiptext">Back to Grid</p></button></td></tr>
          <tr><td><button class="answered tooltip" onclick="changeValue('isAnswered')"><p class="tooltiptext">Answered</p></button></td><td><button class="back-to-grid tooltip"><p class="tooltiptext">Back to Grid</p></button></td></tr>

        </table>

        <form class="question" action="/exam" method="post">
          {{ csrf_field() }}
          <table>
              <tr><h2 style="font-size:40px; color: #888888; font-family:'Quicksand'; position:relative;">Question {{ $question-> id_question }}</h2></tr>
              <tr><h3 style="font-size:15px; color: #888888; font-family:'Quicksand'; margin-top: 5%;">{{ $question-> question }}</h3></tr>
              <ul style="margin-top: 5%;">
              @foreach($quest_option as $answer)
                <tr>
                  <td><label><input type="radio" name="user_answer" value="{{ $answer->option_number }}" >{{ $answer->option }}</label></td>
                </tr>
              @endforeach
            </ul>
            <tr>
            </tr>
          </table>

          <input type="hidden" name="question_id" value="{{ $question->id_question }}">
          <input type="hidden" name="exam_takens_id" value="{{ $question->exam_takens_id }}">
          <input type="hidden" name="isMarked" id="isMarked" value="1">
          <input type="hidden" name="isAnswered" id="isAnswered" value="1">
          <input type="hidden" name="taken_at" id="taken_at" value="{{ $question->taken_at }}">
          <input type="hidden" name="time_taken" id="time_taken" value="{{ $question->time_taken }}">
          <input type="hidden" name="url_name" value="{{ $question->url_name }}">
          <input type="hidden" name="next_id" id="next_id" value="">
          <input type="hidden" name="user_answer_id" id="user_answer_id" value="{{ $question->user_answer }}">
          <button type="submit" class="prev-next "  style="float:right; display: inline-block; margin-left: 2%; margin-right: -10%; margin-top: 15%; " onclick="nextQuestion()">Next</button>
          <button type="submit" class="prev-next"  style="float:right; display: inline-block; margin-right: 3%; margin-top: 15%; " onclick="prevQuestion()" >Prev</button>
          <button type="submit" class="end-exam" style="float:left; display: inline-block;  margin-left: 2%; margin-top: 15%;" onclick="prevQuestion()" >End Exam</button>
        </form>
        @endforeach
          <tr>
          </tr>
        </table>
      </div>
    </div>
  </div>
</body>

@endsection
