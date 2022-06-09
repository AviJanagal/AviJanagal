<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>Home</title>
        <!-- Bootstrap -->
        <link rel="icon" href="{{asset('images/moblogo.png')}}" type="image/png" sizes="16x16" />
        <link href="https://fonts.googleapis.com/css2?family=Muli:wght@200;300;400;500;600;700;800;900&display=swap" rel="stylesheet" />
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
        <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" />
        <link href="{{asset('css/responsive.css')}}" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300;0,500;0,600;0,700;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css"></script>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet"/>
        <link href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" rel="stylesheet"/>
        <link href="{{asset('css/style.css')}}" rel="stylesheet" />
    </head>

    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#"><img class="" src="{{asset('images/logomain.png')}}" alt="logo" /></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ (request()->is('home')) ? 'active' : '' }}" href="{{route('home')}}">Dashboard</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ (request()->is('module')) ? 'active' : '' }}" href="{{route('module.index')}}">Module</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ (request()->is('session')) ? 'active' : '' }}" href="{{route('session.index')}}">Session</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{in_array(Route::currentRouteName(),['all_students','view_student_detail']) ? 'active' : '' }}" href="{{route('all_students')}}">All Students</a>
                    </li>

                    <li class="nav-item">
                        <a class=" nav-link {{ (request()->is('logout')) ? 'active' : '' }}" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                            <img class="logouticon" src="{{asset('images/loguot.png')}}" />
                            <span class="menuname">
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
                                Log out
                            </span>
                        </a>
                        <!-- <a class="nav-link {{ (request()->is('logout')) ? 'active' : '' }}" href="{{ route('logout') }}"><img class="logouticon" src="{{asset('images/loguot.png')}}" alt="logo" onclick="event.preventDefault();document.getElementById('logout-form').submit();"> Logout</a> -->
                    </li>
                </ul>
            </div>
        </nav>
    </body>
</html>
