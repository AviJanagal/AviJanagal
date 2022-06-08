@extends('front.layouts.header')
<body>
	<header>
		<div class="headertop">
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="logoleftbox"> <img src="{{asset('images/mainpic1.png')}}"> <img src="{{asset('images/mainpic2.png')}}" /> <img src="{{asset('images/mainpic5.png')}}"> </div>
					</div>
					<div class="col-sm-6">
						<div class="buttonrightbox"> <a href="{{route('login')}}">Sign Up</a> </div>
					</div>
				</div>
			</div>
		</div>
	</header>
	<main>
		<div class="mainsectionbox">
			<div class="container-fluid">
				<div class="row">
					<div class="col-sm-6">
						<div class="signupformboxleft">
							<h2>Sign Up with Bridge</h2>
							<form role="form" data-toggle="validator" id="myform" action="{{route('student_registration')}}" method="post" enctype="multipart/form-data">
								@csrf

								<div class="row">
									<div class="col-lg-12 col-xl-12 col-md-12">
										@if(Session::get('alert'))
										<div class="alert alert-{{Session::get('alert')}} alert-dismissible" role="alert">
											<p>{{Session::get('message')}}</p>
											<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
													aria-hidden="true">&times;</span></button>
										</div>
										@endif
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<label class="inputlabel">Email </label>
											<input type="email" class="form-control custom-control" id="email" name="email" placeholder="Enter Your Email" autocomplete="off">
                                        </div>
                                        @if ($errors->has('email_confirmation'))
									<span class="text-danger">{{ $errors->first('email_confirmation') }}</span>
									@endif
									@if ($errors->has('email'))
									<span class="text-danger">{{ $errors->first('email') }}</span>
									@endif
									</div>
									

									<div class="col-sm-6">
										<div class="form-group">
											<label class="inputlabel">Confirm Email </label>
											<input type="email" class="form-control custom-control" name="email_confirmation" placeholder="Confirm Your E-mail" autocomplete="off">
                                        </div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<label class="inputlabel">Password </label>
											<input type="password" class="form-control custom-control" name="password" id="password" placeholder="Enter Your Password"
											autocomplete="off">
                                        </div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<label class="inputlabel">Confirm Password</label>
											<input type="password" class="form-control custom-control" name="password_confirmation" placeholder="Confirm Your Password">
                                        </div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<label class="inputlabel">First Name </label>
											<input type="text" class="form-control custom-control" value="" name="first_name" placeholder="First name">
                                        </div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<label class="inputlabel">Last Name </label>
											<input type="text" class="form-control custom-control" value="" name="last_name" placeholder="Last Name">
                                        </div>
									</div>
									<div class="col-sm-12">
										<div class="form-group">
											<label class="inputlabel">Address </label>
											<textarea class="form-control custom-control" rows="3" name="address" id="address" placeholder="Enter Your Address ..."
												spellcheck="false"></textarea>
                                        </div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<label class="inputlabel">City </label>
											<input type="text" class="form-control custom-control" id="city" value="" name="city" placeholder="Enter your City" required>
                                        </div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<label class="inputlabel">Apartment, suite, etc </label>
											<input type="text" value="" class="form-control custom-control" name="apartment" placeholder="Enter Your Apartment, suite, etc ">
                                        </div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<label class="inputlabel">States</label>
											<select class="form-control custom-control" id="myselect" class="event" name="state">
												<option disabled selected hidden value='0'>Select</option>
												@foreach ($states as $data)
												<option value="{{$data->state_title}}">{{$data->state_title}}</option>
												@endforeach
											</select>
										</div>
									</div>

									<div class="col-sm-6">
										<div class="form-group">
											<label class="inputlabel">Person Type</label>
											<select class="form-control custom-control" id="mselect" class="event" name="person_type">
												<option disabled selected hidden value='0'>Select</option>
												@foreach ($person_type as $data)
												<option value="{{$data->id}}">{{$data->person_type}}</option>
												@endforeach
											</select>
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<label class="inputlabel">ZIP Code </label>
											<input type="number" value="" class="form-control custom-control" name="zip_code" placeholder="Enter Zip Code">
                                        </div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<label class="inputlabel">Phone Number </label>
											<input type="number" value="" class="form-control custom-control" name="phone_number" placeholder="Enter Your phone number">
											@if ($errors->has('phone_number'))
											<span class="text-danger">{{ $errors->first('phone_number') }}</span>
											@endif									
										</div>
									</div>
								</div>
							
                                <div class="formbuttonbottom">
                                    <button type="submit">Sign Up</button>
                                </div>
                            </form>
							<div class="bottomtext">
								<h6>Already have an account?<a href="{{route('login')}}" class="sign">Sign In</a></h6> </div>
						</div>
					</div>
					<div class="col-sm-6 pr-0">
						<div class="headingboxright"> <img src="images/mainheadingpic.jpg" />
							<div class="maintext">
								<h1>Welcome to <br>
                Bridge</h1> </div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</main>
@extends('front.layouts.footer')
	