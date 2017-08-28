@extends('layouts.exampage')

@section('content')
<head>
  <title>Exam Question</title>
  <link href="{{asset('css/question.css')}}" rel="stylesheet" />
  <style type="text/css">
  .questionBlock { display:none; }
  </style>

  <script src="{{asset('js/jquery.js')}}"></script>
  <script type="text/javascript">

  var answers = [];

  @foreach ($exam_question as $answerr)
  answers.push( "{{ $answerr-> answer }}" );
  @endforeach

  var currentQues = 1;      //Current question to display
  var numQues = answers.length; //Number of Questions
  var numChoi = 3;            //How many possible answers

  function clearQuestions() {
    var sel = document.getElementById('questionBlock').getElementsByTagName('div');
    for (var i=0; i<sel.length; i++) {
      document.getElementById(sel[i].id).style.display = 'none';
    }
  }
  function nextQuestion(id) {
    document.getElementById('questionMap').style.display = 'none';
    clearQuestions();
    document.getElementById('q'+(currentQues+1)).style.display = 'block';
    currentQues++;  if (currentQues > numQues) { currentQues--; }
  }

  function prevQuestion() {
    clearQuestions();
    document.getElementById('q'+(currentQues-1)).style.display = 'block';
    currentQues--;  if (currentQues > numQues) { currentQues++; }
  }

  function showQuestion(id) {
    document.getElementById('questionMap').style.display = 'none';
    clearQuestions();
    document.getElementById(id).style.display = 'block';
  }

  </script>

</head>
<body>
  <section>

    <div class="container">
      <div id="questionBlock">
        @foreach ($exam_question as $question)
        <div id="q{{ $question-> id_question }}" class="questionBlock">
          <table style="float: right; margin-right: -10%;">
            <tr><td><button class="marked tooltip"><p class="tooltiptext">Marked</p></button></td><td><button class="back-to-grid tooltip"><p class="tooltiptext">Back to Grid</p></button></td></tr>
            <tr><td><button class="answered tooltip"><p class="tooltiptext">Answered</p></button></td><td><button class="back-to-grid tooltip"><p class="tooltiptext">Back to Grid</p></button></td></tr>
          </table>

          <form class="question" action="/exam" method="post">
            {{ csrf_field() }}
            <table>
              <tr><h2 style="font-size:40px; color: #888888; font-family:'Quicksand'; position:relative;">Question {{ $question-> id_question }}</h2></tr>
              <tr><h3 style="font-size:15px; color: #888888; font-family:'Quicksand'; margin-top: 5%;">{{ $question-> question }}</h3></tr>
              <ul style="margin-top: 5%;">
                <tr>
                  <td><label><input type="radio" name="user_answer" value="{{ $question-> answer }}">{{ $question-> answer }}</label></td>
                </tr>
                <tr>
                  <td><label><input type="radio" name="user_answer" value="{{ $question-> answer }}">{{ $question-> answer }}</label></td>
                </tr>
                <tr>
                  <td><label><input type="radio" name="user_answer" value="{{ $question-> answer }}">{{ $question-> answer }}</label></td>
                </tr>
                <tr>
                  <td><label><input type="radio" name="user_answer" value="{{ $question-> answer }}">{{ $question-> answer }}</label></td>
                </tr>
                <tr>
                  <td><label><input type="radio" name="user_answer" value="{{ $question-> answer }}">{{ $question-> answer }}</label></td>
                </tr>
              </ul>
              <tr>
              </tr>
            </table>

            <input type="hidden" name="exam_takens_id" value="1">
            <input type="hidden" name="question_id" value="{{ $question -> id_question }}">
            <button type="submit" class="prev-next "  style="float:right; display: inline-block; margin-left: 2%; margin-right: -10%; margin-top: 15%; " onclick="nextQuestion()">Next</button>
            <button type="submit" class="prev-next"  style="float:right; display: inline-block; margin-right: 3%; margin-top: 15%; " onclick="prevQuestion()">Prev</button>
            <button type="submit" class="end-exam" style="float:left; display: inline-block;  margin-left: 2%; margin-top: 15%;" onclick="prevQuestion()">End Exam</button>
          </form>

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

          <button class="prev-next "  style="float:right; display: inline-block; margin-left: 2%; margin-right: -10%; margin-top: 15%; " onclick="nextQuestion()">Next</button>
          <button class="prev-next"  style="float:right; display: inline-block; margin-right: 3%; margin-top: 15%; " onclick="prevQuestion()">Prev</button>
          <button class="end-exam" style="float:left; display: inline-block;  margin-left: 2%; margin-top: 15%;" onclick="prevQuestion()">End Exam</button>

        </div>
        @endforeach
      </div>
    </div>

    <div class="container">
      <div id="questionMap">
        <h2 class="block-title-red" style="font-size:40px; color: black; font-family:'Quicksand';">Question Map</h2>
        <br><br><br>
        <div class="row">

          <div class="col-10" style="">
            @php
            $count = $exam_question->count();
            $count_3 = 0;
            @endphp

            @for ($i = 0; $i < $count/10; $i++)
            @php
            $count_2 = 0;
            @endphp
            <div class="row">
              @foreach($exam_question as $question_id)
              @php
              if($count_2 === $count_3 + 10){
                $count_2 = 0;
                break;
              }
              @endphp
              @if($count_2 < $count_3)
              @php
              $count_2++;
              @endphp
              @else
              <div class="col-lg-14 question-{{$question_id->id_question}}">
                <button onClick="showQuestion('q{{$question_id->id_question}}')" class="question-box question-{{$question_id->id_question}}" id="{{$question_id->id_question}}">
                  <div class="text">{{$question_id->id_question}}</div>
                </button>
              </div>
              @php
              $count_2++;
              @endphp
              @endif
              @endforeach
            </div> <!-- end div row -->
            @php
            $count_3 += 10;
            @endphp
            @endfor
          </div><!--end div col-10 -->
          <div class="col-2">
            <div class="row" >
              <div class="col-6">
                <div class="row"><button class="marked tooltip" style="float: right;"><p class="tooltiptext">Marked</p></button></div><br>
                <div class="row"><button class="back-to-grid tooltip" style="float: right;"><p class="tooltiptext">Not answered</p></button></div><br>
                <div class="row"><button class="answered tooltip" style="float: right;"><p class="tooltiptext">Answered</p></button></div><br>

              </div>
            </div>
            <div class="row"><button class="end-exam" style="float:right; display: inline-block; margin-left: 2%; margin-top: 150%;" onclick="prevQuestion()">End Exam</button>
            </div>
          </div>
        </div> <!-- end of row -->
      </div> <!-- end of Question Map -->
    </div> <!-- end of container Question Map -->
  </section>
</body>


@endsection
