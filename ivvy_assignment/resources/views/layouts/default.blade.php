<!DOCTYPE html>
<html>
<head>
	@include('layouts.header')
</head>
<body>

@if(Session::has('success'))
          <div class="alert success">
          <h2>{!! Session::get('success') !!}</h2>
          </div>
@endif

@if(Session::has('error'))
          <div class="alert error">
          <h2>{!! Session::get('error') !!}</h2>
          </div>
@endif

@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

	<div class="container">

		<div class="row">
		    <div class="col-lg-12 margin-tb">					
		        <div class="pull-left">
		            <h2>IVvy Assignment</h2>
		        </div>

		@yield('content')


@include('layouts.footer')