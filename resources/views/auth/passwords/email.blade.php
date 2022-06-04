@extends('auth.app')

@section('content')
    <div class="container auth-box">
        <section class="vh-100">
            <div class="container-fluid d-flex justify-content-center align-items-center h-100">
                <div class="row d-flex justify-content-center align-items-center w-100">
                    <div class="col-md-6 login-block">
                        @if (session('status'))
                            <div class="alert tc-blue-dark-1-bg" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form class="login-form" method="POST" action="{{ route('password.email') }}">
                            @csrf
                            <!-- Email input -->
                            <div class="form-outline mb-2">
                                <input type="email" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="E-Mail Address"
                                name="email" value="{{ old('email')}}" required autocomplete="email" autofocus/>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-outline mb-0">
                                <button type="submit" class="btn btn-primary">Send Password Reset Link</button>
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
