<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function showWelcome()
    {
        return redirect()->action('HomeController@sayHello', ['Sophie']);
    }

    public function showNumbers($start, $end) 
    {
		$data = ['start' => $start, 'end' => $end];
		return view('foreach', $data);
    } 

    public function sayHello($name = "World")
    {
    	$data = ['name' => $name];

		return view('my-first-view', $data);
    }

    public function upperCase($string = "string")
    {
    	$upperString = strtoupper($string);
		$data = ['string' => $string, 'upperString' => $upperString];
		return view('uppercase', $data);
    }

    public function plusOne($int = 0) 
    {
    	$inc = $int + 1;
		$data = ['int' => $int, 'inc' => $inc];
		return view('increment', $data);
    }

}