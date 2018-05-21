@extends('layouts.with-sidebar')

<?php $title = (isset($title)) ? $title : 'Product List'; ?>

@section('title', $title)

@section('main')

		@if(Role::can('add_product'))
		<a class="btn btn-default" href="{{route('products.create')}}">Add product</a>
		@endif
		<table class="table">
		<thead>
			<tr>
				@if(Role::is_admin())
				<th>ID</th>
				<th>SKU</th>
				@endif
				<th>Name</th>
				<th>Price</th>
				@if(Role::can('delete_product'))
				<th>Action</th>
				@endif
			</tr>
		</thead>
		
		<tbody>
			@foreach($records as $key => $value)
			<tr class="model-row">
				@if(Role::is_admin())
				<td>{{$value['id']}}</td>
				<td>{{$value['sku']}}</td>
				@endif
				<td>{{$value['name']}}</td>
				<td>{{$value['price']}}</td>
				@if(Role::can('delete_product'))
				<td><a class="model-delete" href="{{route('products.destroy', $value['id'])}}">Delete</a></td>
				@endif
			</tr>
			@endforeach
		</tbody>
	</table>

	

@stop