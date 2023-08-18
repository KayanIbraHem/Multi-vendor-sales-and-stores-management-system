@extends('layouts.auth')

@section('content')
    <div class="card card-md">
        <div class="card-body">
            <h2 class="h2 text-center mb-4">{{ __('Register') }}</h2>
            <form method="POST" action="{{ route('register') }}" autocomplete="off" novalidate>
                @csrf

                <div class="mb-3">
                    <label class="form-label required">Username</label>
                    <input type="text" class="form-control" placeholder="Type your username..." name="user[name]"
                        autocomplete="off" value="{{ old('name', env('LOGIN_NAME')) }}" required>
                    @include('layouts.includes.dashboard.validation-error', ['input' => 'name'])
                </div>

                <div class="mb-3">
                    <label class="form-label required">Company Name</label>
                    <input type="text" class="form-control" placeholder="Type your  companyname..." name="shop[name]"
                        autocomplete="off" value="{{ old('companyname') }}" required>
                    @include('layouts.includes.dashboard.validation-error', ['input' => 'name'])
                </div>

                <div class="mb-3">
                    <label class="form-label required">Email</label>
                    <input type="email" class="form-control" placeholder="Type your email..." name="user[email]"
                        autocomplete="off" value="{{ old('email', env('LOGIN_EMAIL')) }}" required>
                    @include('layouts.includes.dashboard.validation-error', ['input' => 'email'])
                </div>

                <div class="mb-3">
                    <label class="form-label required">Address</label>
                    <input type="text" class="form-control" placeholder="Type your  address..." name="shop[address]"
                        autocomplete="off" value="{{ old('address') }}" required>
                    @include('layouts.includes.dashboard.validation-error', ['input' => 'address'])
                </div>

                <div class="mb-3">
                    <label class="form-label required">Phone</label>
                    <input type="text" class="form-control" placeholder="Type your  phone..." name="shop[phone]"
                        autocomplete="off" value="{{ old('phone') }}" required>
                    @include('layouts.includes.dashboard.validation-error', ['input' => 'phone'])
                </div>

                <div class="mb-2">
                    <label class="form-label required">Password</label>
                    <div class="input-group input-group-flat">
                        <input type="password" class="form-control password" placeholder="Your password" autocomplete="off"
                            name="user[password]" autocomplete="off" value="{{ env('LOGIN_PASS') }}" required>
                        <span class="input-group-text">
                            <a href="#" class="link-secondary show-password" data-show='false' title="Show password"
                                data-bs-toggle="tooltip">
                                <i class="fas fa-eye"></i>
                            </a>
                        </span>
                    </div>
                    @include('layouts.includes.dashboard.validation-error', ['input' => 'password'])
                </div>

                <div class="mb-2">
                    <label class="form-label required"> Confirm Password </label>
                    <div class="input-group input-group-flat">
                        <input type="user[password]" class="form-control password" placeholder="Your password"
                            autocomplete="off" name="user[password_confirmation]" autocomplete="off"
                            value="{{ env('LOGIN_PASS') }}" required>
                        <span class="input-group-text">
                            <a href="#" class="link-secondary show-password" data-show='false' title="Show password"
                                data-bs-toggle="tooltip">
                                <i class="fas fa-eye"></i>
                            </a>
                        </span>
                    </div>
                    @include('layouts.includes.dashboard.validation-error', [
                        'input' => 'password_confirmation',
                    ])
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
                $(this).data('show', !$(this).data('show'));
                let type = $(this).data('show') ? 'text' : 'password';
                $(this).closest('.input-group').find('input.password').attr('type', type);
            });
        });
    </script>
@endsection
