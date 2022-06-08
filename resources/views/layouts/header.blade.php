<!DOCTYPE html>
<html>
    <head>
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <title>Bridge App</title>
        <link rel="icon" href="{{asset('images/moblogo.png')}}" type="image/png" sizes="16x16" />
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet" />
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />

        <link href="{{ asset('css/app.css') }}" rel="stylesheet" />
        <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" />
        <link href="{{asset('css/style.css')}}" rel="stylesheet" />
        <link href="{{asset('css/front/style.css')}}" rel="stylesheet" />
        <link href="{{asset('css/responsive.css')}}" rel="stylesheet" />
        <link rel="stylesheet" type="text/css" href="{{asset('css/dataTables.min.css')}}" />
        <link rel="stylesheet" type="text/css" href="{{asset('css/timepicker.min.css')}}" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css"></script>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet"/>
        
        
      

      
    <!-- Delete modal jQuery-->
        <script>
            function deleteData(url) {
                $("#deleteForm").attr("action", url);
                $('#myModal').modal('show');
            }
        </script>
<!-- Delete modal jQuery end -->
<script>
    $('input:radio[name="optradio"]').change(
    function(){
        if ($(this).is(':checked') && $(this).val() == 'link') {
           $('#sv').addClass('d-none');
           $('#session_video').val('');
           $('#sl').removeClass('d-none');
        }
        else{
           $('#sv').removeClass('d-none');
           $('#session_link').val('');
           $('#sl').addClass('d-none');
        }
    });

</script>

<script>
  $(document).ready(function () {
    var i = $("input[type=radio][name=optradio]:checked").val();
    if(i == 'link'){
        $('#sv').addClass('d-none');
        $('#sl').removeClass('d-none');
    }
    else{
        $('#sv').removeClass('d-none');
        $('#sl').addClass('d-none');
    }
});
    </script>
        



<script>
$( "#sessionForm" ).validate({
    rules: {
        module_id: {
		   required: true,
		},
        language: {
		   required: true,
		},
        level: {
		   required: true,
		},
        optradio: {
		   required: true,
		},
 
    }
});
</script>

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
		city: {
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


<script>
$('select[name="select_module"]').change(function() {
    alert("kfdsdfds");

});

</script>

    </head>
    <body class="open">
        <header>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 ryt-dropdown">
                        <div class="float-right">
                            <nav class="navbar navbar-expand-lg navbar-light">
                                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                    <ul class="navbar-nav mr-auto">
                                        <li class="nav-item dropdown dropdown-right notification-li">
                                            <a class="nav-link dropdown-toggle user-rightimg user-rightimg" href="javascript:void(0)" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <img src="{{asset('images/favicon.png')}}" /><span class="">Admin</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </header>

      
    
