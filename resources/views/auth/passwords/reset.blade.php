@extends('layouts.auth')

@section('content')
<div class="card card-md">
    <div class="card-body">
        <h2 class="h2 text-center mb-4">{{ __('Reset Password') }}</h2>
        <form method="POST" action="{{ route('password.update') }}" autocomplete="off" novalidate>
            @csrf

            <input type="hidden" name="token" value="{{ $token }}">

            <div class="mb-3">
                <label class="form-label required">Email address</label>
                <input type="text" class="form-control" placeholder="Type your username or email..." name="username" autocomplete="off" value="{{ $email ?? old('email') }}" required autocomplete="email">
                @include('layouts.includes.dashboard.validation-error', ['input' => 'username'])
            </div>

            <div class="mb-2">
                <label class="form-label required"> Password </label>
                <div class="input-group input-group-flat">
                    <input type="password" class="form-control password" placeholder="Your password" autocomplete="off" name="password" autocomplete="off" required autofocus autocomplete="new-password">
                    <span class="input-group-text">
                        <a href="#" class="link-secondary show-password" data-show='false' title="Show password" data-bs-toggle="tooltip">
                            <i class="fas fa-eye"></i>
                        </a>
                    </span>
                </div>
                @include('layouts.includes.dashboard.validation-error', ['input' => 'password'])
            </div>

            <div class="mb-2">
                <label class="form-label required"> Confirm Password </label>
                <div class="input-group input-group-flat">
                    <input type="password" class="form-control password" placeholder="Your Confirm Password" autocomplete="off" name="password_confirmation" autocomplete="off" required autocomplete="new-password">
                    <span class="input-group-text">
                        <a href="#" class="link-secondary show-password" data-show='false' title="Show password" data-bs-toggle="tooltip">
                            <i class="fas fa-eye"></i>
                        </a>
                    </span>
                </div>
                @include('layouts.includes.dashboard.validation-error', ['input' => 'password'])
            </div>

            <div class="form-footer">
                <button type="submit" class="btn btn-primary w-100">{{ __('Reset Password') }}</button>
            </div>
        </form>
    </div>
</div>
@endsection

@section('js')
    <script>
        $(function() {
            $('body').on('click', '.show-password', function(e) {
                e.preventDefault();
                $(this).data('show', ! $(this).data('show'));
                let type = $(this).data('show') ? 'text' : 'password';
                $(this).closest('.input-group').find('input.password').attr('type', type);
            });
        });
    </script>
@endsection
