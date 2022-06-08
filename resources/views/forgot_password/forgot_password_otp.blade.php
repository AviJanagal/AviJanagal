 @extends('layouts.header')
<main class="mt-4">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                
                <div class="card-header">Enter Otp</div>

                <div class="card-body">
                

                    <form method="POST" action="{{ route('match_otp') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Otp</label>

                            <div class="col-md-6">
                                <input type= "hidden" name= "user_id" value = "{{ session('user_id') }}">
                                <input id="otp" type="number"  name="otp" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">Submit
                                </button>
                        <div class="col-lg-12 col-xl-12 col-md-12">
                            @if(session()->has('message'))
                                    <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                                    {{session('message')}}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                </button></div>
                                @endif
                            </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
 </main>
                @extends('layouts.footer')