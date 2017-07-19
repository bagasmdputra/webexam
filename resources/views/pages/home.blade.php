@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                  <h1><strong>USER</strong> Dashboard</h1></div>
                  <h2>{{ Auth::user()->package }}</h2>
                <div class="panel-body">

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
