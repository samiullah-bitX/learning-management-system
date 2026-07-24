@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8">
            <div class="card shadow-sm border-0">
                <div class="card-body p-4 p-md-5">
                    <div class="text-center mb-4">
                        <h2 class="h3 mb-2">{{ __('Welcome back') }}</h2>
                        <p class="text-muted mb-0">{{ __('Sign in to continue learning') }}</p>
                    </div>

                    <form method="POST" action="{{ route('login') }}" id="form-auth">
                        @csrf

                        <div class="form-group">
                            <label for="email" class="font-weight-bold">{{ __('E-Mail or Username') }}</label>
                            <input id="email" type="text" class="form-control form-control-lg @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password" class="font-weight-bold">{{ __('Password') }}</label>
                            <input id="password" type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                            @error('password')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        @if(config('captcha.enable', false))
                            <div class="form-group">
                                @error('g-recaptcha-response')
                                    <span class="alert alert-danger small alert-dismissible fade show d-block mb-3">
                                        <strong>{{ $message }}</strong>
                                        <button type="button" class="close small" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </span>
                                @enderror
                                {!! NoCaptcha::display() !!}
                            </div>
                        @endif

                        <div class="form-group d-flex justify-content-between align-items-center">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>

                            @if (Route::has('password.request'))
                                <a class="text-primary" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif
                        </div>

                        <button type="submit" class="btn btn-primary btn-lg btn-block">
                            {{ __('Login') }}
                        </button>
                    </form>

                    <div class="text-center mt-4">
                        <p class="mb-0 text-muted">
                            {{ __('Don’t have an account?') }}
                            <a href="{{ route('register') }}" class="font-weight-bold text-primary">{{ __('Create one now') }}</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@if(config('captcha.enable', false))
    {!! NoCaptcha::renderJs() !!}
@endif
@endsection
