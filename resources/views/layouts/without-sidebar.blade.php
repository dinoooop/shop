<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>@yield('title') - {{ config('app.name') }}</title>
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/dist/css/bootstrap.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/styles.css') }}">
</head>
<body>
	<div class="container">
		<div class="row header">
		    
		    <div class="col-md-12">
		    	
		    	@include('templates.header')

		    </div>
	    </div>
	</div>

	<div class="container">
		<div class="row">
		    <div class="col-md-12">
				@yield('main')
		    </div>
	    </div>
	</div>

	<script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/scripts.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/dist/js/bootstrap.min.js') }}"></script>
</body>
</html>