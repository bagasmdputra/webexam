@extends('layouts.app')

@section('css')
      <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">
@endsection

@section('content')
<div id="confirm-body"><br><br>
  <p class="title"><strong>Registration</strong></p>
  <p class="notes" style="font-size: 1rem;">You have successfully registered. An email is sent to you for verification.</p>

</div>

@endsection
