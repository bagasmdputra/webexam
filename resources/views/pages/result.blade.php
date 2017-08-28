@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">


        <div class="panel-body">
          @foreach ($result as $question)
              <li><a href=''> <span class="pull-right">({{$question->question}})</span>{{$question->answer}}</a></li>
              <br>
              <p>{{$question->explanation}}</p>
          @endforeach
        </div>

        <section class="fonts">

        </section>

      </div>
    </div>
  </div>
</div>
@endsection
