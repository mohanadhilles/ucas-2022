<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="shortcut icon" href="{{ asset('assetsReg/images/favicon.png') }}">

	<title>Cost.ps</title>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,400italic,700,800' rel='stylesheet'
		type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Raleway:300,200,100' rel='stylesheet' type='text/css'>


	<link rel="stylesheet" href="{{ asset('assetsReg/fonts/font-awesome.min.css') }}">

	<!-- Custom styles for this template -->
	<link href="{{ asset('assetsReg/css/style.css') }} " rel="stylesheet" />
	<link href="{{ asset('assetsReg/css/style2.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/app.css' )}}" rel="stylesheet"/>



</head>

<body class="texture" style="direction:rtl;">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

	<div id="app">
		
		<reg-header></reg-header>
		
		<router-view></router-view>
		
		<reg-login></reg-login>

	</div>
	
	
	<script src=" {{ asset('js/app.js') }} "></script>
	<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
	<script src="{{ asset('assetsReg/js/jquery.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assetsReg/js/general.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assetsReg/js/jquery-1.8.2.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assetsReg/js/jquery.ddslick.min.js') }}"></script>
	<!-- Bootstrap core JavaScript
================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
	<script src="{{ asset('assetsReg/js/voice-commands.js') }}"></script>
	<script src="{{ asset('assetsReg/js/bootstrap.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assetsReg/js/jquery.flot.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assetsReg/js/jquery.flot.pie.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assetsReg/js/jquery.flot.resize.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assetsReg/js/jquery.flot.labels.js') }}"></script>


	<!-- Insert to your webpage before the </head> -->
	<script src="{{ asset('assetsReg/js/amazingslider.js') }}"></script>
	<script src="{{ asset('assetsReg/js/initslider-1.js') }}"></script>
	<!-- End of head section HTML codes -->
	<script type="text/javascript">
		var sign_up = document.getElementById("sign_up");
		var log_in = document.getElementById("log_in");
		var forget_pass = document.getElementById("forget_pass");
		function signUp() {
			sign_up.style.visibility = "visible";
			log_in.style.visibility = "hidden";
			forget_pass.style.visibility = "hidden";
		}
		function logIn() {
			sign_up.style.visibility = "hidden";
			log_in.style.visibility = "visible";
			forget_pass.style.visibility = "hidden";
		}
		function forget() {
			sign_up.style.visibility = "hidden";
			log_in.style.visibility = "hidden";
			forget_pass.style.visibility = "visible";
		}

		$(document).ready(function () {
			$(".nav_btn").click(function () {
				$("#nav").toggle(500);
			});

			$(window).resize(function () {
				if ($(window).width() <= 850) {
					$("#nav").css("display", "none");
				}
				if ($(window).width() >= 851) {
					$("#nav").css("display", "block");
				}
			});
		});
	</script>

</body>

</html>