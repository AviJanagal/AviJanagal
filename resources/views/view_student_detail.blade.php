@include('layouts.header')

<main>
    <div class="main-wrapper">
        <div class="main-container">
            <div class="main-container-inner bx-bg-shadow p-3">
                <div class="container-fluid">
                    
                    <div class="row ml-4">
                        <div class="col-md-12">
                            <div class="complaindetail">
                                <div class="row no-gutters">
                                    <div class="col-md-5">
                                        <div class="detailinner">
                                            <h3>First Name</h3>
                                            <p>{{$students->first_name}}</p>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="detailinner">
                                            <h3>Last Name</h3>
                                            <p>{{$students->last_name}}</p>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="detailinner">
                                            <h3>Email</h3>
                                            <p>{{$students->email }}</p>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="detailinner">
                                            <h3>Address:</h3>
                                            <p>{{$students->address}}</p>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="detailinner">
                                            <h3>City</h3>
                                            <p>{{$students->city}}</p>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="detailinner">
                                            <h3>State</h3>
                                            <p>{{$students->state}}</p>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="detailinner">
                                            <h3>Zip Code</h3>
                                            <p>{{$students->zip_code}}</p>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="detailinner">
                                            <h3>Phone Number</h3>
                                            <p>{{$students->phone_number}}</p>
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

@include('layouts.footer')
