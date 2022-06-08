@extends('layouts.header')
@extends('layouts.sidebar')
<main class="mt-4">
    <div class="main-wrapper">
        <div class="main-container">
            <div class="main-container-inner">
                <h3 class="adminname-top pleft15">Hello Admin!</h3>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12 col-lg-4">
                            <div class="left-admin-top pdc  bx-bg-shadow">  <a href="#"><h4 class="title-top-left">Total Students</h4></a>
                                <div class="img-left-admin-top">
                                    <img class="" src="{{asset('images/circle.png') }}" alt="logo">
                                    <h3 class="cont-total">{{$total_users}}</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-8">
                            <div class="left-admin-right pdc bx-bg-shadow"> 
                                <a href="javascript:void(0);"><h4 class="title-top-left">Users Report</h4></a>
                                <input type="hidden" id="male_customer" value="">
                                <input type="hidden" id="female_customer" value=""> 
                                <input type="hidden" id="other_customer" value="">
                            
                                <div class="row no-gutters">
                                    <div class="col-md-4">
                                        <div class="top-right-box-inner">
                                            <div class="img-left-admin-top">
                                                <div class="circle" id="circle-a"><strong></strong></div>
                                            </div><a href=""><h4>Total Videos</h4></a>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="top-right-box-inner">
                                            <div class="img-left-admin-top">
                                            <div class="circle" id="circle-b"><strong></strong></div>
                                            </div><a href=""><h4>Total Quotes</h4></a>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="top-right-box-inner">
                                            <div class="img-left-admin-top">
                                            <div class="circle" id="circle-c"><strong></strong></div>
                                            </div><a href=""><h4>Total Events</h4></a>
                                        </div>
                                    </div>

                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@extends('layouts.footer')
