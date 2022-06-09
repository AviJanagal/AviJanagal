<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>E-Bridge</title>
	<link rel="icon" href="{{asset('images/mainicon.png')}}" type="image/png" sizes="16x16">
	<link rel="stylesheet" href="{{asset('css/front/bootstrap.min.css')}}" />
	<link rel="stylesheet" href="{{asset('css/front/style.css')}}" />
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
	<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">
	<link rel="icon" type="image/png" href="/icon.png" />
	<link rel="apple-touch-icon" type="image/png" href="/icon.png" />
	<link href="{{asset('js/owl.carousel.min.js')}}" rel="stylesheet">
	<link href="{{asset('js/owl.carousel.js')}}{{asset('js/owl.carousel.js')}}" rel="stylesheet"> </head>

<body>
	<header>
		<div class="headertop">
			<div class="container">
				<div class="row">
					<div class="col-sm-8">
						<div class="logoleftbox"> <img src="{{asset('images/mainpic1.png')}}"> <img src="{{asset('images/mainpic2.png')}}" /> <img src="images/mainpic5.png"> </div>
					</div>
					<div class="col-sm-4">
						<div class="buttonrightbox"> <a href="{{ route('student_register') }}">Sign Up</a> </div>
					</div>
				</div>
			</div>
		</div>
	</header>
	<main>
		<div class="mainloginbox">
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="mainlogintextleftbox"> <img src="{{asset('images/mainlogo.png')}}" />
							<h1>Log In with Bridge</h1>
							<form method="POST" action="{{ route('login') }}">
                                @csrf
								<div class="col-sm-12">
									<div class="form-group">
										<label class="inputlabel">Email </label>
                                        <input id="email" type="email" class="form-control custom-control" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Enter Your Email" >                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
								<div class="col-sm-12">
									<div class="form-group">
										<label class="inputlabel">Password </label>
                                        <input id="password" type="password" class="form-control custom-control" name="password" placeholder="Enter Password" required autocomplete="current-password">	
                                    </div>
								</div>
								<div class="row">
									<div class="col-sm-6">
										<div class="form-group">
											<input type="checkbox" class="form-check-input custom-box">
											<label class="form-check-label custom-setting">Remember my password</label>
										</div>
									</div>
									<div class="col-sm-6">
										<div class="Forgotlinkright"> <a href="{{ route('forgot_password') }}" class="forgottext">Forgot Password?</a> </div>
									</div>
								</div>
							</from>
							<div class="formbuttonbottom">
								<button type="submit">Sign Up</button>
							</div>
							<h6 class="account">Don't have an account?<a href="{{ route('student_register') }}" class="sign-link">Sign up</a></h6> </div>
					</div>
					<div class="col-sm-6">
						<div class="mainloginimgboxright"> <img src="images/mainimage.png" /> </div>
					</div>
				</div>
			</div>
		</div>
	</main>
	@extends('front.layouts.footer')