@extends('layouts.result')

@section('content')

<!doctype html>
<html lang="en" class="no-js">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">

	<link href="{{asset('css/reset.css')}}" rel="stylesheet" />
	<link href="{{asset('css/result.css')}}" rel="stylesheet" />
  <script src="{{asset('js/modernizr.js')}}"></script>

    <!-- <script src="{{asset('js/jquery.mobile.custom.min.js')}}"></script> -->
    <script src="{{ asset('js/jquery.js')}}"></script>
      <!-- <script src="{{ asset('js/jquery.mobile.custom.min.js')}}"></script> -->

      <script src="{{asset('js/main.js')}}"></script>

	<title>Result</title>
</head>
<body>
<section class="cd-faq">

	<ul class="cd-faq-categories">
    <button id="Reset">Clear Filters</button>
    <fieldset>
    <h4>General</h4>
    <div class="checkbox">
      <input type="checkbox" value=".not-answered"/>
      <label>Not Answered</label>
    </div>
    <div class="checkbox">
      <input type="checkbox" value=".correct"/>
      <label>Correct</label>
    </div>
    <div class="checkbox">
      <input type="checkbox" value=".wrong"/>
      <label>Wrong</label>
    </div>
  </fieldset>

  <fieldset>
    <h4>Domain</h4>
    <div class="checkbox">
      <input type="checkbox" value=".initiating"/>
      <label>Initiating</label>
    </div>
    <div class="checkbox">
      <input type="checkbox" value=".planning"/>
      <label>Planning</label>
    </div>
    <div class="checkbox">
      <input type="checkbox" value=".executing"/>
      <label>Executing</label>
    </div>
  </fieldset>

  <fieldset>
    <h4>Knowledge Area</h4>
    <div class="checkbox">
      <input type="checkbox" value=".integration"/>
      <label>Integration</label>
    </div>
    <div class="checkbox">
      <input type="checkbox" value=".scope"/>
      <label>Scope</label>
    </div>
    <div class="checkbox">
      <input type="checkbox" value=".time"/>
      <label>Time</label>
    </div>
  </fieldset>


	</ul> <!-- cd-faq-categories -->

	<div class="cd-faq-items container" id="Container">
		<ul id="basics" class="cd-faq-group">
			<li class="cd-faq-title"><h2>Review Your Result</h2></li>
			@foreach ($result as $question)
				@if ($question->isAnswered == false)
					<li class="not-answered">
						<a class="cd-faq-trigger unanswered " href="#0">
				@else
					@if ($question->isTrue)
						<li class="correct">
							<a class="cd-faq-trigger true " href="#0">
					@else
						<li class="wrong">
							<a class="cd-faq-trigger wrong " href="#0">
					@endif
				@endif

          <div class="no-quest">
            Q{{$question->number_indexing}}
          </div>

          <div class="time-taken-wrap">
              <div class="time-taken">
                {{$question->time_taken}} s
              </div>

              <div class="dom-know">
                <div class="domain">
                  {{$question->domain}}
                </div>

                <div class="knowledge">
                  {{$question->name}}
                </div>
              </div>
          </div>
        </a>
				<div class="cd-faq-content">
          <br>
					<div class="question"><p><span>{{$question->number_indexing}}. </span>{{$question->question}}<p></div>
            <br>
          <div class="options">

           @if ($question->answer == 1)
							<div class="answer-right">
						@else
							<div>
						@endif
							<p><span>A. </span> {{$option[$question->number_indexing -1][0]['option']}}</p></div>
							@if ($question->answer == 2)
								 <div class="answer-right">
							 @else
								 <div>
							 @endif
							<p><span>B. </span> {{$option[$question->number_indexing -1][1]['option']}}</p></div>
							@if ($question->answer == 3)
 								<div class="answer-right">
 							@else
 								<div>
 							@endif
							<p><span>C. </span> {{$option[$question->number_indexing -1][2]['option']}}</p></div>
							@if ($question->answer == 4)
								 <div class="answer-right">
							 @else
								 <div>
							 @endif
							<p><span>D. </span> {{$option[$question->number_indexing -1][3]['option']}}</p></div>
          </p>

          </div>
          <br>
          <div>
            <div class="title-explanation">Explanation: </div>

            <div class="option-explanation">
              <div><p>{{$question->explanation}}</p></div>
            </div>
          </div>
          <br>
          <div class="reference">
            <p>Reference : <span> {{$question->reference}} </span></p>
          </div>
        </div> <!-- cd-faq-content -->
			</li>
			@endforeach
      <li class="wrong">
				<a class="cd-faq-trigger wrong" href="#0">
          <div class="no-quest">
            Q2
          </div>

          <div class="time-taken-wrap">
              <div class="time-taken">
                2.25 s
              </div>

              <div class="dom-know">
                <div class="domain">
                  initiating
                </div>

                <div class="knowledge">
                  knowledge management
                </div>
              </div>
          </div>
        </a>
				<div class="cd-faq-content wrong-content">
          <br>
					<div class="question"><p><span>1. </span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quasi cupiditate et laudantium esse adipisci consequatur modi possimus accusantium vero atque excepturi nobis in doloremque repudiandae soluta non minus dolore voluptatem enim reiciendis officia voluptates, fuga ullam? Voluptas reiciendis cumque molestiae unde numquam similique quas doloremque non, perferendis doloribus necessitatibus itaque dolorem quam officia atque perspiciatis dolore laudantium dolor voluptatem eligendi? Aliquam nulla unde voluptatum molestiae, eos fugit ullam, consequuntur, saepe voluptas quaerat deleniti. Repellendus magni sint temporibus, accusantium rem commodi?<p></div>
            <br>
          <div class="options">

            <div><p><span>A. </span> Lorem ipsum</p></div>
            <div class="answer-right"><p><span>B. </span> Lorem ipsum</p></div>
            <div><p><span>C. </span> Lorem ipsum</p></div>
            <div><p><span>D. </span> Lorem ipsum</p></div>
          </p>

          </div>
          <br>
          <div>
            <div class="title-explanation">Explanation: </div>

            <div class="option-explanation">
              <div><p><span>A) </span> Lorem ipsum</p></div>
              <div class="answer-right"><p><span>B) </span> Lorem ipsum</p></div>
              <div><span><p><span>C) </span> Lorem ipsum</p></div>
              <div><span><p><span>D) </span> Lorem ipsum</p></div>
            </div>
          </div>
          <br>
          <div class="reference">
            <p>Reference : <span> Lorem Ipsum </span></p>
          </div>
        </div> <!-- cd-faq-content -->
			</li>

      <li class="correct">
        <a class="cd-faq-trigger true" href="#0">
          <div class="no-quest">
            Q3
          </div>

          <div class="time-taken-wrap">
              <div class="time-taken">
                2.25 s
              </div>

              <div class="dom-know">
                <div class="domain">
                  initiating
                </div>

                <div class="knowledge">
                  knowledge management
                </div>
              </div>
          </div>
        </a>
        <div class="cd-faq-content true-content">
          <br>
          <div class="question"><p><span>1. </span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quasi cupiditate et laudantium esse adipisci consequatur modi possimus accusantium vero atque excepturi nobis in doloremque repudiandae soluta non minus dolore voluptatem enim reiciendis officia voluptates, fuga ullam? Voluptas reiciendis cumque molestiae unde numquam similique quas doloremque non, perferendis doloribus necessitatibus itaque dolorem quam officia atque perspiciatis dolore laudantium dolor voluptatem eligendi? Aliquam nulla unde voluptatum molestiae, eos fugit ullam, consequuntur, saepe voluptas quaerat deleniti. Repellendus magni sint temporibus, accusantium rem commodi?<p></div>
            <br>
          <div class="options">

            <div><p><span>A. </span> Lorem ipsum</p></div>
            <div class="answer-right"><p><span>B. </span> Lorem ipsum</p></div>
            <div><p><span>C. </span> Lorem ipsum</p></div>
            <div><p><span>D. </span> Lorem ipsum</p></div>
          </p>

          </div>
          <br>
          <div>
            <div class="title-explanation">Explanation: </div>

            <div class="option-explanation">
              <div><p><span>A) </span> Lorem ipsum</p></div>
              <div class="answer-right"><p><span>B) </span> Lorem ipsum</p></div>
              <div><span><p><span>C) </span> Lorem ipsum</p></div>
              <div><span><p><span>D) </span> Lorem ipsum</p></div>
            </div>
          </div>
          <br>
          <div class="reference">
            <p>Reference : <span> Lorem Ipsum </span></p>
          </div>
        </div> <!-- cd-faq-content -->
      </li>

      <li class="not-answered">
        <a class="cd-faq-trigger unanswered" href="#0">
          <div class="no-quest">
            Q4
          </div>

          <div class="time-taken-wrap">
              <div class="time-taken">
                2.25 s
              </div>

              <div class="dom-know">
                <div class="domain">
                  initiating
                </div>

                <div class="knowledge">
                  knowledge management
                </div>
              </div>
          </div>
        </a>
        <div class="cd-faq-content ">
          <br>
          <div class="question"><p><span>1. </span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quasi cupiditate et laudantium esse adipisci consequatur modi possimus accusantium vero atque excepturi nobis in doloremque repudiandae soluta non minus dolore voluptatem enim reiciendis officia voluptates, fuga ullam? Voluptas reiciendis cumque molestiae unde numquam similique quas doloremque non, perferendis doloribus necessitatibus itaque dolorem quam officia atque perspiciatis dolore laudantium dolor voluptatem eligendi? Aliquam nulla unde voluptatum molestiae, eos fugit ullam, consequuntur, saepe voluptas quaerat deleniti. Repellendus magni sint temporibus, accusantium rem commodi?<p></div>
            <br>
          <div class="options">

            <div><p><span>A. </span> Lorem ipsum</p></div>
            <div class="answer-right"><p><span>B. </span> Lorem ipsum</p></div>
            <div><p><span>C. </span> Lorem ipsum</p></div>
            <div><p><span>D. </span> Lorem ipsum</p></div>
          </p>

          </div>
          <br>
          <div>
            <div class="title-explanation">Explanation: </div>

            <div class="option-explanation">
              <div><p><span>A) </span> Lorem ipsum</p></div>
              <div class="answer-right"><p><span>B) </span> Lorem ipsum</p></div>
              <div><span><p><span>C) </span> Lorem ipsum</p></div>
              <div><span><p><span>D) </span> Lorem ipsum</p></div>
            </div>
          </div>
          <br>
          <div class="reference">
            <p>Reference : <span> Lorem Ipsum </span></p>
          </div>
        </div> <!-- cd-faq-content -->
      </li>

      <li class="not-answered">
        <a class="cd-faq-trigger unanswered" href="#0">
          <div class="no-quest">
            Q5
          </div>

          <div class="time-taken-wrap">
              <div class="time-taken">
                2.25 s
              </div>

              <div class="dom-know">
                <div class="domain">
                  initiating
                </div>

                <div class="knowledge">
                  knowledge management
                </div>
              </div>
          </div>
        </a>
        <div class="cd-faq-content">
          <br>
          <div class="question"><p><span>1. </span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quasi cupiditate et laudantium esse adipisci consequatur modi possimus accusantium vero atque excepturi nobis in doloremque repudiandae soluta non minus dolore voluptatem enim reiciendis officia voluptates, fuga ullam? Voluptas reiciendis cumque molestiae unde numquam similique quas doloremque non, perferendis doloribus necessitatibus itaque dolorem quam officia atque perspiciatis dolore laudantium dolor voluptatem eligendi? Aliquam nulla unde voluptatum molestiae, eos fugit ullam, consequuntur, saepe voluptas quaerat deleniti. Repellendus magni sint temporibus, accusantium rem commodi?<p></div>
            <br>
          <div class="options">

            <div><p><span>A. </span> Lorem ipsum</p></div>
            <div class="answer-right"><p><span>B. </span> Lorem ipsum</p></div>
            <div><p><span>C. </span> Lorem ipsum</p></div>
            <div><p><span>D. </span> Lorem ipsum</p></div>
          </p>

          </div>
          <br>
          <div>
            <div class="title-explanation">Explanation: </div>

            <div class="option-explanation">
              <div><p><span>A) </span> Lorem ipsum</p></div>
              <div class="answer-right"><p><span>B) </span> Lorem ipsum</p></div>
              <div><span><p><span>C) </span> Lorem ipsum</p></div>
              <div><span><p><span>D) </span> Lorem ipsum</p></div>
            </div>
          </div>
          <br>
          <div class="reference">
            <p>Reference : <span> Lorem Ipsum </span></p>
          </div>
        </div> <!-- cd-faq-content -->
      </li>

      <li class="correct">
        <a class="cd-faq-trigger true" href="#0">
          <div class="no-quest">
            Q6
          </div>

          <div class="time-taken-wrap">
              <div class="time-taken">
                2.25 s
              </div>

              <div class="dom-know">
                <div class="domain">
                  initiating
                </div>

                <div class="knowledge">
                  knowledge management
                </div>
              </div>
          </div>
        </a>
        <div class="cd-faq-content true-content">
          <br>
          <div class="question"><p><span>1. </span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quasi cupiditate et laudantium esse adipisci consequatur modi possimus accusantium vero atque excepturi nobis in doloremque repudiandae soluta non minus dolore voluptatem enim reiciendis officia voluptates, fuga ullam? Voluptas reiciendis cumque molestiae unde numquam similique quas doloremque non, perferendis doloribus necessitatibus itaque dolorem quam officia atque perspiciatis dolore laudantium dolor voluptatem eligendi? Aliquam nulla unde voluptatum molestiae, eos fugit ullam, consequuntur, saepe voluptas quaerat deleniti. Repellendus magni sint temporibus, accusantium rem commodi?<p></div>
            <br>
          <div class="options">

            <div><p><span>A. </span> Lorem ipsum</p></div>
            <div class="answer-right"><p><span>B. </span> Lorem ipsum</p></div>
            <div><p><span>C. </span> Lorem ipsum</p></div>
            <div><p><span>D. </span> Lorem ipsum</p></div>
          </p>

          </div>
          <br>
          <div>
            <div class="title-explanation">Explanation: </div>

            <div class="option-explanation">
              <div><p><span>A) </span> Lorem ipsum</p></div>
              <div class="answer-right"><p><span>B) </span> Lorem ipsum</p></div>
              <div><span><p><span>C) </span> Lorem ipsum</p></div>
              <div><span><p><span>D) </span> Lorem ipsum</p></div>
            </div>
          </div>
          <br>
          <div class="reference">
            <p>Reference : <span> Lorem Ipsum </span></p>
          </div>
        </div> <!-- cd-faq-content -->
      </li>

      <li class="correct">
        <a class="cd-faq-trigger true" href="#0">
          <div class="no-quest">
            Q7
          </div>

          <div class="time-taken-wrap">
              <div class="time-taken">
                2.25 s
              </div>

              <div class="dom-know">
                <div class="domain">
                  initiating
                </div>

                <div class="knowledge">
                  knowledge management
                </div>
              </div>
          </div>
        </a>
        <div class="cd-faq-content true-content">
          <br>
          <div class="question"><p><span>1. </span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quasi cupiditate et laudantium esse adipisci consequatur modi possimus accusantium vero atque excepturi nobis in doloremque repudiandae soluta non minus dolore voluptatem enim reiciendis officia voluptates, fuga ullam? Voluptas reiciendis cumque molestiae unde numquam similique quas doloremque non, perferendis doloribus necessitatibus itaque dolorem quam officia atque perspiciatis dolore laudantium dolor voluptatem eligendi? Aliquam nulla unde voluptatum molestiae, eos fugit ullam, consequuntur, saepe voluptas quaerat deleniti. Repellendus magni sint temporibus, accusantium rem commodi?<p></div>
            <br>
          <div class="options">

            <div><p><span>A. </span> Lorem ipsum</p></div>
            <div class="answer-right"><p><span>B. </span> Lorem ipsum</p></div>
            <div><p><span>C. </span> Lorem ipsum</p></div>
            <div><p><span>D. </span> Lorem ipsum</p></div>
          </p>

          </div>
          <br>
          <div>
            <div class="title-explanation">Explanation: </div>

            <div class="option-explanation">
              <div><p><span>A) </span> Lorem ipsum</p></div>
              <div class="answer-right"><p><span>B) </span> Lorem ipsum</p></div>
              <div><span><p><span>C) </span> Lorem ipsum</p></div>
              <div><span><p><span>D) </span> Lorem ipsum</p></div>
            </div>
          </div>
          <br>
          <div class="reference">
            <p>Reference : <span> Lorem Ipsum </span></p>
          </div>
        </div> <!-- cd-faq-content -->
      </li>

      <li class="wrong">
        <a class="cd-faq-trigger wrong" href="#0">
          <div class="no-quest">
            Q8
          </div>

          <div class="time-taken-wrap">
              <div class="time-taken">
                2.25 s
              </div>

              <div class="dom-know">
                <div class="domain">
                  initiating
                </div>

                <div class="knowledge">
                  knowledge management
                </div>
              </div>
          </div>
        </a>
        <div class="cd-faq-content wrong-content">
          <br>
          <div class="question"><p><span>1. </span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quasi cupiditate et laudantium esse adipisci consequatur modi possimus accusantium vero atque excepturi nobis in doloremque repudiandae soluta non minus dolore voluptatem enim reiciendis officia voluptates, fuga ullam? Voluptas reiciendis cumque molestiae unde numquam similique quas doloremque non, perferendis doloribus necessitatibus itaque dolorem quam officia atque perspiciatis dolore laudantium dolor voluptatem eligendi? Aliquam nulla unde voluptatum molestiae, eos fugit ullam, consequuntur, saepe voluptas quaerat deleniti. Repellendus magni sint temporibus, accusantium rem commodi?<p></div>
            <br>
          <div class="options">

            <div><p><span>A. </span> Lorem ipsum</p></div>
            <div class="answer-right"><p><span>B. </span> Lorem ipsum</p></div>
            <div><p><span>C. </span> Lorem ipsum</p></div>
            <div><p><span>D. </span> Lorem ipsum</p></div>
          </p>

          </div>
          <br>
          <div>
            <div class="title-explanation">Explanation: </div>

            <div class="option-explanation">
              <div><p><span>A) </span> Lorem ipsum</p></div>
              <div class="answer-right"><p><span>B) </span> Lorem ipsum</p></div>
              <div><span><p><span>C) </span> Lorem ipsum</p></div>
              <div><span><p><span>D) </span> Lorem ipsum</p></div>
            </div>
          </div>
          <br>
          <div class="reference">
            <p>Reference : <span> Lorem Ipsum </span></p>
          </div>
        </div> <!-- cd-faq-content -->
      </li>
	</div> <!-- cd-faq-items -->

  <div class="cd-faq-score">
    <ul id="basics" class="cd-faq-group">
			<li class="cd-faq-title"><h2>Your Score</h2></li>
    <div class="scores">
        <p class="correctness">Correct</p>
        <p class="score">{{$score}} %</p>
        <p class="correctness">{{$true}} out {{$total}}</p>

    </div>
    <div class="calculate">

    </div>

    <p></p>
  </ul>
  </div>


	<a href="#0" class="cd-close-panel">Close</a>
</section> <!-- cd-faq -->
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/mixitup/2.1.11/jquery.mixitup.js'></script>
<script src="{{asset('js/result.js')}}"></script>


</body>
</html>



@endsection
