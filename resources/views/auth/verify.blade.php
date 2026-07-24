@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-7 col-md-9">
            <div class="card shadow-sm border-0">
                <div class="card-body p-4 p-md-5 text-center">
                    <div class="mb-4">
                        <h2 class="h3 mb-2">{{ __('Verify your email') }}</h2>
                        <p class="text-muted mb-0">{{ __('One more step to unlock your learning experience') }}</p>
                    </div>

                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    <p class="mb-3">
                        {{ __('Before proceeding, please check your email for a verification link.') }}
                    </p>
                    <p class="mb-0">
                        {{ __('If you did not receive the email') }},
                        <a href="{{ route('verification.resend') }}" class="font-weight-bold text-primary">
                            {{ __('click here to request another') }}
                        </a>.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
