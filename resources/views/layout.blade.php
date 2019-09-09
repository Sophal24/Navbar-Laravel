<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>@yield('title','Home')</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

	<script src="https://kit.fontawesome.com/90b90a49ee.js"></script>


	<style>
		body {
		    font-family: Arial;
		    font-size: 0.95em;
		    /*color: #929292;*/
		}

		.report-container {
		    border: #E0E0E0 1px solid;
		    padding: 20px 40px 40px 40px;
		    border-radius: 2px;
		    width: 550px;
		    margin: 0 auto;
		}

		.weather-icon {
		    vertical-align: middle;
		    margin-right: 20px;
		}

		.weather-forecast {
		    color: #212121;
		    font-size: 1.2em;
		    font-weight: bold;
		    margin: 20px 0px;
		}

		span.min-temperature {
		    margin-left: 15px;
		    color: #929292;
		}

		.time {
		    line-height: 25px;
		}

	</style>

</head>
<body>
	<div class="container">
		@include('menu')
		@yield('mycontent')

	</div>

</body>
</html>