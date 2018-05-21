@extends('layouts.without-sidebar')

<?php $title = (isset($title)) ? $title : 'Posts'; ?>

@section('title', $title)

@section('main')

	@if (count($errors) > 0)
		    <div class="alert alert-danger">
		            @foreach ($errors->all() as $error)
		                <p>{{ $error }}</p>
		            @endforeach
		    </div>
	@endif

	<div class="col-md-offset-4 col-md-4 login">
		{{ Form::open(array('url' => 'register')) }}
		
  		<div class="form-group">
		    {{ Form::label('email', 'Email address') }}
		    {{ Form::email('email', null, ['class' => 'form-control']) }}
  		</div>

  		<div class="form-group">
		    {{ Form::label('password', 'Password') }}
		    {{ Form::password('password', ['class' => 'form-control']) }}
  		</div>

  		<div class="form-group">
		    {{ Form::label('password_confirmation', 'Confirm Password') }}
		    {{ Form::password('password_confirmation', ['class' => 'form-control']) }}
  		</div>

  		{{ Form::submit('Register', ['class' => 'btn btn-default']) }}
	{{ Form::close() }}
	</div>

@stop