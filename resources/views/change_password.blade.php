<!DOCTYPE html>
<html>
    <head>
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <title>Bridge App</title>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    </head>

    <body class="open mt-4">
        <main class="mt-4 ml-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="col-lg-12 col-xl-12 col-md-12">
                                @if(Session::get('alert'))
                                <div class="alert alert-{{Session::get('alert')}} alert-dismissible" role="alert">
                                    <p>{{Session::get('message')}}</p>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                </div>
                                @endif
                            </div>
                            <div class="card-header">Change Password</div>

                            <div class="card-body">
                                <form method="POST" id="chnage_student_password_form" action="{{route('change_student_password')}}">
                                    @csrf @foreach ($errors->all() as $error)
                                    <p class="text-danger">{{ $error }}</p>
                                    @endforeach
                                    <input type="hidden" value="{{$user_id}}" name="user_id" />
                                    <div class="form-group row">
                                        <label for="password" class="col-md-4 col-form-label text-md-right">Current Password</label>

                                        <div class="col-md-6">
                                            <input id="password" type="password" class="form-control" name="current_password" autocomplete="current-password" />
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="password" class="col-md-4 col-form-label text-md-right">New Password</label>

                                        <div class="col-md-6">
                                            <input id="new_password" type="password" class="form-control" name="new_password" autocomplete="current-password" />
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="password" class="col-md-4 col-form-label text-md-right">New Confirm Password</label>

                                        <div class="col-md-6">
                                            <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" autocomplete="current-password" />
                                        </div>
                                    </div>

                                    <div class="form-group row mb-0">
                                        <div class="col-md-8 offset-md-4">
                                            <button type="submit" class="btn btn-primary">
                                                Update Password
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
        <script>
            $("#chnage_student_password_form").validate({
                rules: {
                    current_password: {
                        required: true,
                    },
                    new_password: {
                        minlength: 8,
                        required: true,
                    },
                    password_confirmation: {
                        minlength: 8,
                        equalTo: "#new_password",
                    },
                },
            });
        </script>
    </body>
</html>
