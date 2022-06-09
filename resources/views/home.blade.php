
@include('layouts.header')

<!-- main start-->
<main>
    <div class="main-wrapper ">
        <div class="main-container">
            <div class="main-container-inner bx-bg-shadow">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="homebg">
                                <img class="homeimage" src="images/homeimage.png">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="homeinnerbox bgcolor1">	
                                <h5>Total Users</h5>
                                <h2>{{$total_users}}</h2>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="homeinnerbox bgcolor2">	
                                <h5>Total Sessions</h5>
                                <h2>{{$total_sessions}}</h2>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="homeinnerbox bgcolor3">	
                                <h5>Total Modules</h5>
                                <h2>{{$total_modules}}</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<!-- main end -->

   @include('layouts.footer')
