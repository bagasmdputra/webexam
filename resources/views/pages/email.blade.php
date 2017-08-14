@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
              <h1>Click the Link To Verify Your Email</h1>
Click the following link to verify your email      {{url(‘/verifyemail/’.$email_token)}}
            </div>
        </div>
    </div>
</div>
@endsection
