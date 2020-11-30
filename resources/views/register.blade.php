@extends('layouts.auth') @section('content')
<div class="container-fluid page-body-wrapper full-page-wrapper">
    <div class="content-wrapper d-flex align-items-stretch auth auth-img-bg">
        <div class="row flex-grow">
            <div class="col-lg-6 d-flex align-items-center justify-content-center">
                <div class="auth-form-transparent text-left p-3">
                    <div class="brand-logo">
                        <img src="../../images/logo.svg" alt="logo">
                    </div>
                    <h4>New here?</h4>
                    <h6 class="font-weight-light">Join us today! It takes only few steps</h6>
                    <form class="pt-3" method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="form-group">
                            <label>Name</label>
                            <div class="input-group">
                                <div class="input-group-prepend bg-transparent">
                                    <span class="input-group-text bg-transparent border-right-0"><i class="ti-user text-primary"></i></span>
                                </div>
                                <input type="text" class="form-control form-control-lg border-left-0" placeholder="Full Name" name="name"  value="{{ old('name') }}">
                            </div>
                            <span class="text-danger ">{{ $errors->first('name') }}</span>
                        </div>

                        <div class="form-group">
                            <label>Email</label>
                            <div class="input-group">
                                <div class="input-group-prepend bg-transparent">
                                    <span class="input-group-text bg-transparent border-right-0"><i class="ti-email text-primary"></i></span>
                                </div>
                                <input type="email" class="form-control form-control-lg border-left-0" placeholder="Email" name="email" value="{{ old('email') }}">
                            </div>
                            <span class="text-danger ">{{ $errors->first('email') }}</span>
                        </div>

                        <div class="form-group">
                            <label>Phone</label>
                            <div class="input-group">
                                <div class="input-group-prepend bg-transparent">
                                    <span class="input-group-text bg-transparent border-right-0"><i class="ti-email text-primary"></i></span>
                                </div>
                                <input type="text" class="form-control form-control-lg border-left-0" placeholder="Phone" name="phone" value="{{ old('phone') }}">
                            </div>
                            <span class="text-danger ">{{ $errors->first('phone') }}</span>
                        </div>

                        <div class="form-group">
                            <label>Password</label>
                            <div class="input-group">
                                <div class="input-group-prepend bg-transparent">
                                    <span class="input-group-text bg-transparent border-right-0"><i class="ti-lock text-primary"></i></span>
                                </div>
                                <input type="password" class="form-control form-control-lg border-left-0" id="exampleInputPassword" placeholder="Password(Min 8 Characters)" name="password">
                            </div>
                            <span class="text-danger ">{{ $errors->first('password') }}</span>
                        </div>

                        <div class="form-group">
                            <label>Confirm Password</label>
                            <div class="input-group">
                                <div class="input-group-prepend bg-transparent">
                                    <span class="input-group-text bg-transparent border-right-0"><i class="ti-lock text-primary"></i></span>
                                </div>
                                <input type="password" class="form-control form-control-lg border-left-0" id="exampleInputPassword" placeholder="Confirm Password" name="password_confirmation">
                            </div>
                            <span class="text-danger ">{{ $errors->first('password_confirmation') }}</span>
                        </div>
                        <div class="mt-3">
                            <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">SIGN UP</button>
                        </div>
                        <div class="text-center mt-4 font-weight-light">
                            Already have an account? <a href="{{ route('login') }}class="text-primary">Login</a>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-6 register-half-bg d-flex flex-row">
                <p class="text-white font-weight-medium text-center flex-grow align-self-end">Copyright &copy; 2018 All rights reserved.</p>
            </div>
        </div>
    </div>
    <!-- content-wrapper ends -->
</div>
@endsection
