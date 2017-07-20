@extends('layouts.exampage')

@section('content')





    <section>
<div class="container">
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
                    <button class="question-box question-{{$question_id->id}}" id="{{$question_id->id}}">
                    <div class="text">{{$question_id->id}}</div></button>
                    <!-- <p class="p{{$question_id->id}}">{{$question_id->question}}</p> -->
                    <!-- <form class="options">
                        <input class="option" type="radio" name="question-{{$question_id->id}}" value=4>You walk right up to her, strike up a conversation, and ask for her number<br>
                        <input class="option" type="radio" name="question-{{$question_id->id}}" value=3>You wait a few days until you get the courage to go and talk to her<br>
                        <input class="option" type="radio" name="question-{{$question_id->id}}" value=2>You tell one of your mutual friends that you like her<br>
                        <input class="option" type="radio" name="question-{{$question_id->id}}" value=1>You wait for her to come to you</br>
                    </form> -->
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
    <!-- @foreach($exam_question as $question_id)
      <div class="question">
              <p class="p{{$question_id->id}}">{{$question_id->question}}</p>
              <form class="options">
                  <input class="option" type="radio" name="question-{{$question_id->id}}" value=4>You walk right up to her, strike up a conversation, and ask for her number<br>
                  <input class="option" type="radio" name="question-{{$question_id->id}}" value=3>You wait a few days until you get the courage to go and talk to her<br>
                  <input class="option" type="radio" name="question-{{$question_id->id}}" value=2>You tell one of your mutual friends that you like her<br>
                  <input class="option" type="radio" name="question-{{$question_id->id}}" value=1>You wait for her to come to you</br>
              </form>
      </div>
      @endforeach -->







@endsection
