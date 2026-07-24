@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-7 col-md-9">
            <div class="card shadow-sm border-0">
                <div class="card-body p-4 p-md-5">
                    <div class="text-center mb-4">
                        <h2 class="h3 mb-2">{{ __('Create your account') }}</h2>
                        <p class="text-muted mb-0">{{ __('Join thousands of learners and start your journey today') }}</p>
                    </div>

                    <form method="POST" action="{{ route('register') }}" id="form-auth">
                        @csrf

                        <div class="form-group">
                            <label for="name" class="font-weight-bold">{{ __('Name') }}</label>
                            <input id="name" type="text" class="form-control form-control-lg @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                            @error('name')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="username" class="font-weight-bold">{{ __('Username') }}</label>
                            <input id="username" type="text" class="form-control form-control-lg @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username">

                            @error('username')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="email" class="font-weight-bold">{{ __('E-Mail Address') }}</label>
                            <input id="email" type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                            @error('email')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password" class="font-weight-bold">{{ __('Password') }}</label>
                            <input id="password" type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                            @error('password')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="font-weight-bold">{{ __('Confirm Password') }}</label>
                            <input id="password-confirm" type="password" class="form-control form-control-lg" name="password_confirmation" required autocomplete="new-password">
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

                        <button type="submit" class="btn btn-primary btn-lg btn-block">
                            {{ __('Register') }}
                        </button>
                    </form>

                    <div class="text-center mt-4">
                        <p class="mb-0 text-muted">
                            {{ __('Already have an account?') }}
                            <a href="{{ route('login') }}" class="font-weight-bold text-primary">{{ __('Sign in') }}</a>
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
