@extends('layouts.app')
@section('content')

@section('css')
      <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">
@endsection

@section('content')
<div id="confirm-body"><br><br>
  <p class="title"><strong>Registration Confirmed</strong></p>
  <p class="notes" style="font-size: 1rem;">
    Your Email is successfully verified. Click here to <a href="{{url('/login')}}">login</a>
  </p>

</div>
@endsection
