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
        <link href="{{asset('css/responsive.css')}}" rel="stylesheet" />
        <link rel="stylesheet" type="text/css" href="{{asset('css/dataTables.min.css')}}" />
        <link rel="stylesheet" type="text/css" href="{{asset('css/timepicker.min.css')}}" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css"></script>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet"/>
       

        
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
                                                <span class=""><a class="{{ (request()->is('logout')) ? 'active' : '' }}" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                                <img class="" src="{{asset('images/sidebar-icon-4.png')}}" />
                                                <span class="menuname">
                                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
                                                    Log out
                                                    
                                                </span>
                                            </a></span>
                                            </a>
                                        </li>
                
                                    </ul>
                                        
                                </div>
                                <li>
                                    <a class="nav-link dropdown-toggle user-rightimg user-rightimg ml-4 mt-4" href="{{route('change_password_blade')}}"><img class="" src="{{asset('images/sidebar-icon-1.png')}}" /><span class="menuname">Change Password</span></a>
                                </li>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            
        </header>


 


<main class="mt-4">
<h2 style="margin-top:100px;">Welcome Student</h2>
<form id="filterform" >
    @csrf
    <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" id="subject" name="subject">
        <option selected value="null">Select Subject</option>
        <option value="english">English </option>
        <option value="punjabi">Punjabi</option>
        <option value="hindi">Hindi</option>
    </select>
    <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" id="module" name="module">
        <option selected  value="null">Select Module</option>
        <option value="1">One</option>
        <option value="2">Two</option>
        <option value="3">Three</option>
    </select>
    <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" id="session" name="session">
        <option selected  value="null">Select Session</option>
        <option value="1">One</option>
        <option value="2">Two</option>
        <option value="3">Three</option>
    </select>
    <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" id="published_by" name="published_by">
        <option selected  value="null">Published By</option>
        <option value="ravi kumar">Ravi kumar</option>
        <option value="surjit singh">Surjit Singh</option>
        <option value="gurbeer">Gurbeer </option>
    </select>

    <div id="append"></div>
    </main>
</form>
@extends('layouts.footer')