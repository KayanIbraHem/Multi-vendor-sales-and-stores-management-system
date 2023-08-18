@extends('layouts.auth')

@section('content')
    <div class="card card-md">
        <div class="card-body">
            <h2 class="h2 text-center mb-4">Login to your account</h2>
            <form method="POST" action="{{ route('login') }}" autocomplete="off" novalidate>
                @csrf

                <div class="mb-3">
                    <label class="form-label required">Email address</label>
                    <input type="text" class="form-control" placeholder="Type your username or email..." name="username" autocomplete="off" value="{{ old('username', env('LOGIN_NAME')) }}">
                    @include('layouts.includes.dashboard.validation-error', ['input' => 'username'])
                    @include('layouts.includes.dashboard.validation-error', ['input' => 'email'])
                </div>

                <div class="mb-2">
                    <label class="form-label required">
                        Password
                        @if (Route::has('password.request'))
                            <span class="form-label-description">
                                <a href="{{ route('password.request') }}"> {{ __('Forgot Your Password?') }}</a>
                            </span>
                        @endif
                    </label>
                    <div class="input-group input-group-flat">
                        <input type="password" class="form-control password" placeholder="Your password" autocomplete="off" name="password" autocomplete="off" value="{{ env('LOGIN_PASS') }}">
                        <span class="input-group-text">
                            <a href="#" class="link-secondary show-password" data-show='false' title="Show password" data-bs-toggle="tooltip">
                                <i class="fas fa-eye"></i>
                            </a>
                        </span>
                    </div>
                    @include('layouts.includes.dashboard.validation-error', ['input' => 'password'])
                </div>

                <div class="mb-2">
                    <label class="form-check">
                        <input type="checkbox" class="form-check-input" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} />
                        <span class="form-check-label">Remember me on this device</span>
                    </label>
                </div>

                <div class="form-footer">
                    <button type="submit" class="btn btn-primary w-100">Sign in</button>
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
