@extends('auth.app')

@section('content')
<div class="container auth-box">
    <section class="vh-100">
        <div class="container-fluid d-flex justify-content-center align-items-center h-100">
            <div class="row d-flex justify-content-center align-items-center w-100">
                <div class="col-md-6 login-block">
                    <form class="login-form" method="POST" action="{{ route('password.update') }}">
                        @csrf
                        <input type="hidden" name="token" value="{{ $token }}">
                        <!-- Email input -->
                        <div class="form-outline mb-2">
                            <input type="email" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="Enter a valid email address"
                            name="email" value="{{ $email ?? old('email')}}" required autocomplete="email" autofocus/>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <!-- Password input -->
                        <div class="form-outline mb-2">
                            <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password"
                            name="password" required autocomplete="new-password"/>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <!-- Password input -->
                        <div class="form-outline mb-2">
                            <input type="password" id="password-confirm" class="form-control @error('password') is-invalid @enderror" placeholder="Confirm Password"
                            name="password_confirmation" required autocomplete="new-password"/>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-outline mb-0">
                            <button type="submit" class="btn btn-primary">Reset Password</button>
                        </div>
                    </form>
                </div>
                <div class="col-md-6 img-block">
                    <img src="{{ asset('/assets/img/activities/workshops.svg') }}" class="auth-img" loading="lazy">
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
