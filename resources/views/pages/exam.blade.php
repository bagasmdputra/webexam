@extends('layouts.exampage')

@section('question-map')
<section>
<div class="container" id="questionMap">
  <h2 class="block-title-red" style="font-size:40px; color: black; font-family:'Quicksand';">Question Map</h2>
  <br><br><br>
      <div class="col-lg-9">
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
            <div class="col-lg-14 question-{{$question_id->id}}">
                    <button onClick="openQuestion()" class="question-box question-{{$question_id->id}}" id="{{$question_id->id}} ">
                    <a class="text" href="#">{{$question_id->id}}</a></button>
            </div>
            @php
                $count_2++;
            @endphp
            @endif

        @endforeach
      </div>
                  @php
                      $count_3 += 10;
                  @endphp
              @endfor
          </div>
      </div>
      </div>
      <div class="col-lg-3">
      </div>
</div>
    </section>
@endsection

@section('script-question-map')
<script>

function openQuestion() {
var currentQuestion = 0;
  @foreach ($exam_question as $question_id)
  currentQuestion = {{ $question_id-> $id_quest}};

  document.getElementById('q'+(currentQues)).style.display = 'block';
  document.getElementById('questionMap').style.display = 'none';

  @endforeach
}
</script>
@endsection
