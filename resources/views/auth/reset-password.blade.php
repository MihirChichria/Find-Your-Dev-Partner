@extends('layouts.auth-app')

@section('title', 'Find Dev Partner | Reset Password')

@section('content')
    <!--begin::Login-->
    <!--begin::Login-->
    <div class="login login-2 login-signin-on d-flex flex-row-fluid" id="kt_login">
        <div class="d-flex flex-center flex-row-fluid bgi-size-cover bgi-position-top bgi-no-repeat" style="background-color: #FFF;">
            <div class="login-form text-center p-7 position-relative overflow-hidden w-50">
                <!--begin::Login Header-->
                <div class="d-flex flex-center mb-15">

                </div>
                <!--end::Login Header-->
                <!--begin::Login Sign in form-->
                <div class="login-signup">
                    <div class="mb-20">
                        <h3>Reset Password</h3>
                    </div>

                    <!-- Validation Errors -->
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />

                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <!-- Password Reset Token -->
                        <input type="hidden" name="token" value="{{ $request->route('token') }}">
                        <div class="form-group mb-5">
                            <input class="form-control h-auto form-control-solid py-4 px-8" type="email" :value="old('email', $request->email)" required autofocus placeholder="Email" name="email" autocomplete="off" />
                        </div>
                        <div class="form-group mb-5">
                            <input class="form-control h-auto form-control-solid py-4 px-8" type="password" placeholder="Password" name="password" required />
                        </div>
                        <div class="form-group mb-5">
                            <input class="form-control h-auto form-control-solid py-4 px-8" type="password" placeholder="Confirm Password" name="password_confirmation" required />
                        </div>
                        <div class="form-group d-flex flex-wrap flex-center mt-10">
                            <button id="kt_login_signup_submit" class="btn btn-primary font-weight-bold px-9 py-4 my-3 mx-2">Reset Password</button>
                            <button id="kt_login_signup_cancel" class="btn btn-light-primary font-weight-bold px-9 py-4 my-3 mx-2">Cancel</button>
                        </div>
                    </form>
                </div>
                <!--end::Login Sign up form-->
            </div>
        </div>
    </div>
    <!--end::Login-->
@endsection
