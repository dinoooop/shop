@extends('layouts.without-sidebar')

<?php $title = (isset($title)) ? $title : 'Login'; ?>

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
		{{ Form::open(array('url' => 'login')) }}
		<div class="form-group">
		    {{ Form::label('email', 'Email') }}
		    {{ Form::email('email', null, ['class' => 'form-control']) }}
  		</div>

  		<div class="form-group">
		    {{ Form::label('Password', 'Password') }}
		    {{ Form::password('password', ['class' => 'form-control']) }}
  		</div>

  		{{ Form::submit('Login', ['class' => 'btn btn-default']) }}
	{{ Form::close() }}
	</div>

@stop