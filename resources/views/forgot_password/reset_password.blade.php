@extends('layouts.header')
<main class="mt-4">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('change_password') }}">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ session('user_id') }}">
                    <div class="col-lg-8">
                        <div class="form-group f-g-o">
                            <label for="usr">New Password</label>
                            <input type="password" class="form-control" name="password" placeholder="xxxxxxxx" autocomplete="off">
                        </div>
                            @if ($errors->has('password'))
                                    <span class="text-danger">{{ $errors->first('password') }}</span>
                            @endif
                        </div>

                    <div class="col-lg-8">
                        <div class="form-group f-g-o">
                            <label for="usr">Confirm New Password </label>
                            <input type="password" class="form-control" name="password_confirmation" placeholder="xxxxxxxx">
                        </div>
                    </div>

                        <div class="col-lg-8">
                        <div class="form-group f-g-o">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Reset Password') }}
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
@extends('layouts.footer')