@extends('layouts.auth')

@section('content')
<div class="card card-md">
    <div class="card-body">
        <h2 class="h2 text-center mb-4">{{ __('Reset Password') }}</h2>
        <form method="POST" action="{{ route('password.email') }}" autocomplete="off" novalidate>
            @csrf

            <div class="mb-3">
                <label class="form-label required">Email address</label>
                <input type="email" class="form-control" placeholder="Type your email..." name="email" autocomplete="off" value="{{ old('email', env('LOGIN_NAME')) }}">
                @include('layouts.includes.dashboard.validation-error', ['input' => 'email'])
            </div>

            <div class="form-footer">
                <button type="submit" class="btn btn-primary w-100">
                    <i class="fas fa-envelope px-2"></i>
                    {{ __('Send Password Reset Link') }}
                </button>
            </div>
        </form>

        <div class="text-muted mt-3">
            Forget it, <a href="{{ route('login') }}" tabindex="-1">send me back</a> to the sign in screen.
        </div>
    </div>
</div>
@endsection
