@extends('layouts.auth-app')

@section('title', 'Find Dev Partner | Confirm Password')

@section('content')
    <!--begin::Login-->
    <div class="login login-2 login-signin-on d-flex flex-row-fluid" id="kt_login">
        <div class="d-flex flex-center flex-row-fluid bgi-size-cover bgi-position-top bgi-no-repeat" style="background-color: #FFF;">
            <div class="login-form text-center p-7 position-relative overflow-hidden w-50">
                <!--begin::Login Header-->
                <div class="d-flex flex-center mb-15">

                </div>
                <!--end::Login Header-->
                <!--begin::Login Sign in form-->
                <div class="login-forgot">
                    <div class="mb-4 text-sm text-gray-600">
                        {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
                    </div>

                    <!-- Validation Errors -->
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />

                    <form method="POST" action="{{ route('password.confirm') }}">
                        @csrf
                        <!-- Password -->
                        <div class="form-group mb-10">
                            <input class="form-control form-control-solid h-auto py-4 px-8" type="password" placeholder="Password" name="password" id="password" required autocomplete="current-password" />
                        </div>
                        <div class="form-group d-flex flex-wrap flex-center mt-10">
                            <button id="kt_login_forgot_submit" class="btn btn-primary font-weight-bold px-9 py-4 my-3 mx-2">Confirm</button>
                            <button id="kt_login_forgot_cancel" class="btn btn-light-primary font-weight-bold px-9 py-4 my-3 mx-2">Cancel</button>
                        </div>
                    </form>
                </div>
                <!--end::Login forgot password form-->
            </div>
        </div>
    </div>
    <!--end::Login-->
@endsection

