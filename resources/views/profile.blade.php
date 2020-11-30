@extends('layouts.master')

@section('styles')
@endsection
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-6 offset-3">
                <div class="card user-card-full p-3">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="text-center align-middle">
                                <div class="m-b-25">
                                    <img src="https://img.icons8.com/bubbles/100/000000/user.png" class="img-radius" alt="User-Profile-Image">
                                </div>
                                <h6 class="f-w-600">{{ auth()->user()->name }}</h6>
                            </div>
                            <form action="{{ route('profile.update') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend bg-transparent">
                                            <span class="input-group-text bg-transparent border-right-0">
                                                <i class="ti-user text-primary"></i>
                                            </span>
                                        </div>
                                        <input type="text" name="name" class="form-control form-control-lg border-left-0"
                                        id="name" value="{{ auth()->user()->name }}">
                                    </div>
                                    <span class="text-danger ">{{ $errors->first('name') }}</span>
                                </div>

                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend bg-transparent">
                                            <span class="input-group-text bg-transparent border-right-0">
                                                <i class="ti-email text-primary"></i>
                                            </span>
                                        </div>
                                        <input type="email" readonly class="form-control form-control-lg border-left-0"
                                        id="email" value="{{ auth()->user()->email }}">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="phone">Phone</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend bg-transparent">
                                            <span class="input-group-text bg-transparent border-right-0">
                                                <i class="ti-mobile text-primary"></i>
                                            </span>
                                        </div>
                                        <input type="text" name="phone" class="form-control form-control-lg border-left-0"
                                        id="phone" value="{{ auth()->user()->phone }}">
                                    </div>
                                    <span class="text-danger ">{{ $errors->first('phone') }}</span>
                                </div>

                                <div class="form-group">
                                    <label for="password">Change Password</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend bg-transparent">
                                            <span class="input-group-text bg-transparent border-right-0">
                                                <i class="ti-lock text-primary"></i>
                                            </span>
                                        </div>
                                        <input type="password" name="password"
                                            class="form-control form-control-lg placeholder=" New Password" border-left-0"
                                            id="password">
                                    </div>
                                    <span class="text-danger ">{{ $errors->first('password') }}</span>
                                </div>

                                <div class="form-group">
                                    <label for="password_confirmation">Confirm Password</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend bg-transparent">
                                            <span class="input-group-text bg-transparent border-right-0">
                                                <i class="ti-lock text-primary"></i>
                                            </span>
                                        </div>
                                        <input type="password" name="password_confirmation"
                                        class="form-control form-control-lg placeholder=" New Password" border-left-0"
                                        id="password_confirmation">
                                    </div>
                                    <span class="text-danger ">{{ $errors->first('password_confirmation') }}</span>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary float-right">Update Profile</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection

    @section('scripts')
    @include('partials.message')
    @parent

    @endsection
