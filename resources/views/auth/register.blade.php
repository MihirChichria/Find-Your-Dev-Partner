@extends('layouts.auth-app')

@section('title', 'Find Dev Partner | Register')

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
                <div class="login-signup">
                    <div class="mb-20">
                        <h3>Sign Up</h3>
                        <div class="text-muted font-weight-bold">Enter your details to create your account</div>
                    </div>
                    <form class="form" id="kt_login_signup_form" method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="form-group mb-5">
                            <input class="form-control h-auto form-control-solid py-4 px-8" type="text" placeholder="User Name" name="name" />
                        </div>
                        <div class="form-group mb-5">
                            <input class="form-control h-auto form-control-solid py-4 px-8" type="text" placeholder="Email" name="email" autocomplete="off" />
                        </div>
                        <div class="form-group mb-5">
                            <input class="form-control h-auto form-control-solid py-4 px-8" type="password" placeholder="Password" name="password" />
                        </div>
                        <div class="form-group mb-5">
                            <input class="form-control h-auto form-control-solid py-4 px-8" type="password" placeholder="Confirm Password" name="password_confirmation" />
                        </div>
                        <div class="form-group d-flex flex-wrap flex-center mt-10">
                            <button id="kt_login_signup_submit" class="btn btn-primary font-weight-bold px-9 py-4 my-3 mx-2">Sign Up</button>
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
