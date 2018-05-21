@extends('layouts.with-sidebar')

<?php $title = (isset($title)) ? $title : 'Create product'; ?>

@section('title', $title)

@section('main')
	
	@if (count($errors) > 0)
	    <div class="alert alert-danger">
	            @foreach ($errors->all() as $error)
	                <p>{{ $error }}</p>
	            @endforeach
	    </div>
	@endif

	{{ Form::open(array('route' => 'products.store')) }}
		<div class="form-group">
		    {{ Form::label('sku', 'SKU') }}
		    {{ Form::text('sku', null, ['class' => 'form-control']) }}
  		</div>

  		<div class="form-group">
		    {{ Form::label('name', 'Name') }}
		    {{ Form::text('name', null, ['class' => 'form-control']) }}
  		</div>

  		<div class="form-group">
		    {{ Form::label('price', 'Price') }}
		    {{ Form::number('price', null, ['class' => 'form-control', 'step' => '0.01']) }}
  		</div>

		<div class="form-group">
		    {{ Form::label('category', 'Category') }}
		    {{ Form::select('category[]', $categories, null, ['multiple'=>'multiple', 'class' => 'form-control']) }}
  		</div>

  		<div class="form-group">
		    {{ Form::label('description', 'Description') }}
		    {{ Form::textarea('description', null, ['class' => 'form-control']) }}
  		</div>

  		

  		{{ Form::submit('Save', ['class' => 'btn btn-default']) }}
	{{ Form::close() }}

@stop