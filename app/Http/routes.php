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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/uppercase/{string?}', function($string = "string") {
	$str = strtoupper($string);
	return "$str";
});

Route::get('/increment/{int?}', function($int = 0) {
	$inc = ++$int;
	return $inc;
});

Route::get('/add/{num1?}/{num2?}', function($num1 = 0, $num2 = 1) {
	$sum = $num1 + $num2;
	return $sum;
});