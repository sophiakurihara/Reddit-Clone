<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/from/{start}/to/{end}', 'HomeController@showNumbers');

Route::get('/', 'HomeController@showWelcome');

Route::get('/sayhello/{name?}', 'HomeController@sayHello');

Route::get('/rolldice/{guess?}', function($guess = 0) {
	$number = mt_rand(1, 6);
	$message = '';

	if ($guess > 6) {
		return "Please enter a number between 1-6";
	}

	if ($guess == $number) {
		$message = "Good guess!";
	}
	$data = ['number' => $number, 'guess' => $guess, 
	'message' => $message];
	return view('roll-dice', $data);
});

Route::get('/uppercase/{string?}', 'HomeController@upperCase');

Route::get('/increment/{int?}', 'HomeController@plusOne');

Route::get('/add/{num1?}/{num2?}', function($num1 = 0, $num2 = 1) {
	$sum = $num1 + $num2;
	return $sum;
});

Route::resource('posts', 'PostsController');
Route::resource('students', 'StudentsController');