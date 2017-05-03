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

// Route::get('/from/{start}/to/{end}', 'HomeController@showNumbers');

// Route::get('/rolldice/{guess?}', function($guess = 0) {
// 	$number = mt_rand(1, 6);
// 	$message = '';

// 	if ($guess > 6) {
// 		return "Please enter a number between 1-6";
// 	}

// 	if ($guess == $number) {
// 		$message = "Good guess!";
// 	}
// 	$data = ['number' => $number, 'guess' => $guess, 
// 	'message' => $message];
// 	return view('roll-dice', $data);
// });

// Route::get('/uppercase/{string?}', 'HomeController@upperCase');

// Route::get('/increment/{int?}', 'HomeController@plusOne');

// Route::get('/add/{num1?}/{num2?}', function($num1 = 0, $num2 = 1) {
// 	$sum = $num1 + $num2;
// 	return $sum;
// });
Route::get('/', 'HomeController@showWelcome');
Route::get('/sayhello/{name?}', 'HomeController@sayHello');


Route::resource('posts', 'PostsController');
Route::resource('students', 'StudentsController');


Route::get('/orm-test', function () 
{
	
	$user = new \App\User();
	$user->name = 'Beans';
	$user->email = 'beanskurihara@gmail.com';
	$user->password = 'password';
	$user->save();

	$post = new \App\Models\Post();
	$post->title = 'My first post';
	$post->content = 'Random content';
	$post->url = 'http://codeup.com';
	$post->created_by = $user->id;
	$post->save();

	// $post = \App\Models\Post::find(1); //call find first if needing to update

	// $post->content = 'New content';
	// $post-save(); //update
});

Route::get('/posts', 'PostsController@index');
Route::get('/posts/create', 'PostsController@create');
Route::post('/posts', 'PostsController@store');
Route::get('/posts/{posts}', 'PostsController@show');
Route::get('/posts/{posts}/edit', 'PostsController@edit'); 
Route::put('/posts/{posts}', 'PostsController@update');
Route::delete('/posts/{posts}', 'PostsController@destroy');
Route::post('/posts/{posts}/vote', 'PostsController@vote');

// Authentication routes
Route::get('/login', 'Auth\AuthController@getLogin');
Route::post('/login', 'Auth\AuthController@postLogin');
Route::get('/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('/register', 'Auth\AuthController@getRegister');
Route::post('/register', 'Auth\AuthController@postRegister');

