@extends('layouts.with-sidebar')

<?php $title = (isset($title)) ? $title : 'Category List'; ?>

@section('title', $title)

@section('main')

		@if(Role::can('add_category'))
		<a class="btn btn-default" href="{{route('categories.create')}}">Add category</a>
		@endif
		<table class="table">
		<thead>
			<tr>
				@if(Role::is_admin())
				<th>ID</th>
				@endif
				<th>Categories</th>
				@if(Role::can('delete_category'))
				<th>Action</th>
				@endif
			</tr>
		</thead>
		
		<tbody>
			@foreach($records as $key => $value)
			<tr class="model-row">
				@if(Role::is_admin())
				<td>{{$value['id']}}</td>
				@endif
				<td><a href="{{route('products.index', ['cat' => $value['id']])}}">{{$value['name']}}</a></td>
				@if(Role::can('delete_category'))
				<td><a class="model-delete" href="{{route('categories.destroy', $value['id'])}}">Delete</a></td>
				@endif
			</tr>
			@endforeach
		</tbody>
	</table>

	

@stop