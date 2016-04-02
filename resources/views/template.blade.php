<!DOCTYPE html>
	<head>
		<html lang="en">
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<link rel="icon" type="image/ico" href="{{URL::asset('favicon.ico')}}"> 
		<title>Soft Dev HW</title>
		<meta name="author" content="Pozterz">
		<meta name="description" content="Software Development & Methodologies Homework | Created By : Tharathep Numuan | ID :5635512083">
		@include('stylecss')
	</head>
	<body>
		<div class="container">
			<div class="content">
				<div class="col-md-6">
					@yield('content')
				<div class="clearfix"></div>
				
			</div>
		</div>
		@include('footer')
	</body>
</html>