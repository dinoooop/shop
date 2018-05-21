@extends('layouts.with-sidebar')

<?php $title = (isset($title)) ? $title : 'Create category'; ?>

@section('title', $title)

@section('main')
	
	@if (count($errors) > 0)
	    <div class="alert alert-danger">
	            @foreach ($errors->all() as $error)
	                <p>{{ $error }}</p>
	            @endforeach
	    </div>
	@endif

	{{ Form::open(array('route' => 'categories.store')) }}
		
  		<div class="form-group">
		    {{ Form::label('name', 'Name') }}
		    {{ Form::text('name', null, ['class' => 'form-control']) }}
  		</div>

  		{{ Form::submit('Save', ['class' => 'btn btn-default']) }}
	{{ Form::close() }}

@stop