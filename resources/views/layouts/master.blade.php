
<!DOCTYPE html>
<html>
<head>

	<title>
		@yield('titleTab')

	</title>


	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

	
</head>

<body>
	<!-- @dump($errors)  -->
	<?php if (isset($errors) && $errors->any()): ?>
		<div class="alert alert-danger">
			<ul>
				<?php foreach ($errors->all() as $error ): ?>
					<li>
						{{$error}}
					</li>
				<?php endforeach ?>
			</ul>
		</div>
	<?php endif ?>

<!-- If using withError for getting the error message in user view this is not needed as WithErrors will take the global variable $errors-->
	<!-- @if (session()->has('error'))
		<div class="alert alert-danger">
			{{session()->get('error')}}

		</div>
	@endif -->
	
	@yield('header_with_nav')
	<!-- @yield('carousel') -->
	@if(session()->has('success'))
		<div class="alert alert-success" role="alert">
  			<strong>{{session()->get('success')}}</strong> 
		</div>
	@endif

	@yield('content')
	@yield('footer')
</body>
</html>


