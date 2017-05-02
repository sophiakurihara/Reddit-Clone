@extends('layouts.master')

@section('more_css')
    <link rel="stylesheet" href="/css/forms.css">
@stop

@section('content')
<div class="row">

<div class="col-md-6">
<h1>Login</h1>
<form class="form-horizontal" method="POST" action="{{ action('Auth\AuthController@postLogin') }}">
    {!! csrf_field() !!}

<div class="form-group">
        <label for="email" class="col-md-2">Email</label>
    <div class="col-md-8">
        <input type="email" name="email" value="{{ old('email') }}" class="form-control">
    </div>
</div>
    
<div class="form-group">
        <label for="password" class="col-md-2">Password</label>
    <div class="col-md-8">
        <input type="password" name="password" id="password" class="form-control">
    </div>
</div>

<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
        <div class="checkbox">
        <input type="checkbox" name="remember"> Remember Me
        </div>
    </div>
</div>

<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-primary">Login</button>
    </div>
</div>
</form>
</div>

<div class="col-md-6">
    <h1>Sign Up</h1>
<form class="form-horizontal" method="POST" action="{{ action('Auth\AuthController@postRegister')}}">
    {!! csrf_field() !!}

<div class="form-group">
        <label for="name" class="col-md-2">Name</label>
    <div class="col-md-8">
        <input type="text" name="name" value="{{ old('name') }}" class="form-control">
    </div>
</div>

    <div class="form-group">
        <label for="email" class="col-md-2">Email</label>
        <div class="col-md-8">
        <input type="email" name="email" value="{{ old('email') }}" class="form-control">
        </div>
    </div>

    <div class="form-group">
        <label for="password" class="col-md-2">Password</label>
        <div class="col-md-8">
        <input type="password" name="password" class="form-control">
        </div>
    </div>

    <div class="form-group">
        <label for="password_confirmation" class="col-md-2">Confirm Password</label>
        <div class="col-md-8">
        <input type="password" name="password_confirmation" class="form-control">
        </div>
    </div>

    <div>
        <button type="submit" class="btn btn-primary">Register</button>
    </div>
</form>
</div>
</div>

@stop