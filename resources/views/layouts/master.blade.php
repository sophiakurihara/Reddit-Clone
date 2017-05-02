<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset = "utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Ribbit</title>
	<!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/head.css">
    <link href="https://fonts.googleapis.com/css?family=Love+Ya+Like+A+Sister" rel="stylesheet">
    @yield('more_css')

</head>
<body>
	<div id="custom-bootstrap-menu" class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header"><a class="navbar-brand" href="{{ action('HomeController@showWelcome') }}">Ribbit</a>
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-menubuilder"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
            </button>
        </div>
  	<div class="collapse navbar-collapse navbar-menubuilder">
		<ul class="navbar-nav navbar-right">
			<li>
				<a href="{{ action('HomeController@showWelcome') }}">Home</a>
			</li>
			<li>
				<a href="{{ action('PostsController@index') }}">Posts</a>
			</li>
			<li>
				<a href="{{ action('StudentsController@index') }}">Students</a>
			</li>
			@if (Auth::check())
				<li><a href="{{ action('Auth\AuthController@getLogout') }}">Logout</a></li>
			@else
				<li><a href="{{ action('Auth\AuthController@getLogin') }}">Login</a></li>
			@endif
		</ul>
		<form class="navbar-form" role="search" action="{{ action('PostsController@index') }}">
        <div class="input-group">
            <input type="text" class="form-control" placeholder="Search" name="search">
            <div class="input-group-btn">
                <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
            </div>
        </div>
        </form>
	</div>
</div>
</div>

	<main class="container">
		@if (Session::has('successMessage'))
            <div class="alert alert-success">{{ session('successMessage') }}</div>
        @endif

        @if (Session::has('errorMessage'))
            <div class="alert alert-danger">{{ session('errorMessage') }}</div>
        @endif
    
    	@yield('content')
		
	</main>
	<footer class="footer">
		<div class="container">
			<p class="text-muted">Ribbit &copy; 2017 | muppetsarereal.com</p>
		</div>
	</footer>
	
	<!-- Bootstrap JS  -->
    <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <!-- jQuery JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"
  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous"></script>
</body>
</html>