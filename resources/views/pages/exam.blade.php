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
    function showQuestion(id) {
      var pathArray = window.location.pathname.split( '/' );
      var url = pathArray[pathArray.length - 1];
      window.location = '/exam/' + url + '/' + id;
    }
    function endExam() {
        document.getElementById('is_closed').value = 1;
    }
  </script>

</head>
<body>
  <section>
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
              <div class="col-lg-14 question-{{$question_id->questions}}">
                <button onClick="showQuestion({{$count_2 + 1}})" class="question-box question-{{$question_id->questions}}" id="{{$question_id->questions}}">
                  <div class="text">{{ $count_2 + 1 }}</div>
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
            <div class="row">
              <form action="/closeexam" method="post">
              {{ csrf_field() }}
              <input type="hidden" name="is_closed" id="is_closed" value="{{ $question_id->is_closed }}">
              <input type="hidden" name="exam_takens_id" id="exam_takens_id" value="{{ $question_id->exam_takens_id }}">
              <button type="submit" class="end-exam"  style="float:left; margin-left: -15%; margin-top: 15%; " onclick="endExam()" >End Exam</button>
              </form>
            </div>
          </div>
        </div> <!-- end of row -->
      </div> <!-- end of Question Map -->
    </div> <!-- end of container Question Map -->
  </section>
</body>


@endsection
