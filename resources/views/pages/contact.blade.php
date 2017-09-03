@extends('layouts.app')

@section('content')

<div class="top-gap"></div>

                            <div id="content" class="site-content">












                                <section class="block about-content quote-wrap gray">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                <div class="match-height1">


                                                    <div class="row">
                                                      <div class="col-sm-6">
                                                        <h2 class="block-title-red" style="font-size:60px;">Send Us Your Feedback</h2>
                                                        <p>We want you and your business to feel empowered to offer your customers exactly what they need, whenever they want it. We want you to run scheduled bookings right alongside on-demand, adapting to changes and trends in the market. Perhaps most of all, we want you to maximise your income by making the most of available resources and reap the benefits a truly effective BDP system can offer your business. </p>
                                                      </div>


                                                      <div class="col-sm-6">
                                                        {!! Form::open(['route'=>'contactus.store']) !!}

                                                        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                                                        {!! Form::label('Name:') !!}
                                                        {!! Form::text('name', old('name'), ['class'=>'form-control', 'placeholder'=>'Enter Name']) !!}
                                                        <span class="text-danger">{{ $errors->first('name') }}</span>
                                                        </div>

                                                        <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                                                        {!! Form::label('Email:') !!}
                                                        {!! Form::text('email', old('email'), ['class'=>'form-control', 'placeholder'=>'Enter Email']) !!}
                                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                                        </div>

                                                        <div class="form-group {{ $errors->has('message') ? 'has-error' : '' }}">
                                                        {!! Form::label('Message:') !!}
                                                        {!! Form::textarea('message', old('message'), ['class'=>'form-control', 'placeholder'=>'Enter Message']) !!}
                                                        <span class="text-danger">{{ $errors->first('message') }}</span>
                                                        </div>

                                                        <div class="form-group">
                                                        <button class="btn btn-success">Contact US!</button>
                                                        </div>

                                                        {!! Form::close() !!}
                                                      </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>








                    </div>
@endsection
