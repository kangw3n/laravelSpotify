<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="/img/favicon.png" type="image/x-ico">

	<link rel="apple-touch-icon" href="/img/favicon.png">
	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>laravelSpotify</title>
	<link rel="stylesheet" href="https://bootswatch.com/cyborg/bootstrap.css">
	<link rel="stylesheet" href="/css/style.css">

	<!-- Scripts -->
	<script>
		window.Laravel = <?php echo json_encode([
				'csrfToken' => csrf_token(),
		]); ?>
	</script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js"
	        integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb"
	        crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js"
	        integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS"
	        crossorigin="anonymous"></script>

</head>
<body>

@include('layouts.nav')

<div class="main">
	<div class="container">
		@yield('content')
	</div>
</div>
</body>
</html>
