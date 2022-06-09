<footer>
		<div class="mainfootersection">
			<div class="container">
				<div class="row">
					<div class="col-sm-12">
						<div class="footertextinner">
							<h4>TRAINING MODULES FOR FRONTLINE STAFF ( ANM, ASHA & AWW ) </h4>
							<h5>Copyright © 2022 All rights reserved</h5> </div>
					</div>
				</div>
			</div>
		</div>
	</footer>
	<script src="{{asset('js/jquery.min.js')}}"></script>
	<script src="{{asset('js/bootstrap.min.js')}}"></script>
	<script src="{{asset('js/owl.carousel.js')}}"></script>
	<script src="{{asset('js/owl.carousel.min.js')}}"></script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
        
        <script>
            $( "#myform" ).validate({
                rules: {
                    first_name: {
                    required: true,
                    },
                    last_name: {
                    required: true,
                    },
                    address: {
                    required: true,
                    },
                    state: {
                    required: true,
                    },
                    person_type: {
                    required: true,
                    },
                    apartment: {
                    required: true,
                    },
                    zip_code: {
                    required: true,
                    maxlength: 6,
                    minlength : 6
                    },
                    password : {
                        minlength : 8
                    },
                    password_confirmation : {
                        minlength : 8,
                        equalTo : "#password"
                    },
                    email : {
                        email: true,
                        minlength : 8
                    },
                    email_confirmation : {
                        minlength : 8,
                        equalTo : "#email"
                    },
                    phone_number: {
                        required: true,
                        number: true,
                        minlength: 10,
                        maxlength: 10
                    }
                }
                });
        </script>


    </body>
</html>