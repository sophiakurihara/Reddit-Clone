<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset = "utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Reddit</title>
	<!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <style>
		footer {
			text-align: center;
		}
    </style>
</head>
<body>
	<nav>
		<ul>
			<li>
				<a href="{{ action('HomeController@showNumbers', [10, 25]) }}">10 to 25</a>
			</li>
			<li>
				<a href="{{ action('HomeController@showWelcome') }}">Home</a>
			</li>
			<li>
				<a href="{{ action('HomeController@upperCase') }}">UpperCase</a>
			</li>
			<li>
				<a href="{{ action('HomeController@plusOne') }}">Plus One</a>
			</li>
		</ul>
	</nav>
	<main class="container">
    
    	@yield('content')
		
	</main>

    <footer>Copyright 2017</footer>
	
	<!-- Bootstrap JS  -->
    <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <!-- jQuery JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"
  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous"></script>
</body>
</html>