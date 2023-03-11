<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Login Page in HTML with CSS Code Example</title>
  <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">


<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous"><link rel="stylesheet" href="{{ asset('css/login.css') }}">

</head>
<body>
<!-- partial:index.partial.html -->

<div class="box-form" style="margin-top: 3cm;"> 
	<div class="left">
		<div class="overlay">
		<h1>Hello World </h1>
		
		<span>
			
			<a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
			<a href="#"><i class="fa fa-twitter" aria-hidden="true"></i> Login with Twitter</a>
		</span>
		</div>
	</div>
    


@section('content')
    
<div class="card-body">
    <form method="POST" action="{{ route('login_auth') }}">
	
</div>

<!-- partial -->
  
</body>
</html>
@extends('layouts.app')


                            @csrf

                            <div class="row mb-3" style="padding-left: 1.5cm;">
                                <P>Email Address</P>

                                <div class="col-md-6">
                                    <input id="email" type="email "
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email" autofocus 
                                        style="width: 8cm;">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3" style="padding-left: 1.5cm;">
                                <p>Password</p>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="current-password"
                                        style="width: 8cm;">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
							<p style="padding-left: 1.5cm;">Don't have an account? <a href="#">Create Your Account</a> it takes less than a minute</p>

                            <div class="row mb-3">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                            {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Login') }}
                                    </button>

                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif

                                </div>
                            </div>
                            <div class="row mb-0">

                                @if (session('message'))
                                    <span class="alert alert-danger">
                                        <strong>{{ session('message') }}</strong>
                                    </span>
                                @endif
                                @if (session('successf'))
                                    <span class="alert alert-success">
                                        <strong>{{ session('successf') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </form>
                    </div>
                 </div>
@endsection 

