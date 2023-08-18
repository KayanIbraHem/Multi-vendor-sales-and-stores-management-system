<!doctype html>
<html lang="en" dir="{{ app()->isLocale('ar') ? 'rtl' : 'ltr' }}">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Al-Badr System Project Training.</title>
    @if (App::isLocale('ar'))
        @vite(['resources/css/app-rtl.css'])
    @else
        @vite(['resources/css/app-ltr.css'])
    @endif
</head>

<body class=" border-top-wide border-primary d-flex flex-column">
    <div class="page page-center">
        <div class="container container-tight py-4">
            <div class="text-center mb-4">
                <a href="." class="navbar-brand navbar-brand-autodark"><img src="./static/logo.svg" height="36" alt=""/></a>
            </div>

            @include('layouts.includes.dashboard.alerts')

            @yield('content')

            @if (! request()->is('register') && Route::has('register'))
                <div class="text-center text-muted mt-3">
                    Don't have account yet? <a href="{{ route('register') }}" tabindex="-1">{{ __('Sign up') }}</a>
                </div>
            @endif

            @if (! request()->is('login') && Route::has('login'))
                <div class="text-center text-muted mt-3">
                    has account ? <a href="{{ route('login') }}" tabindex="-1">{{ __('Sign in') }}</a>
                </div>
            @endif
        </div>
    </div>

    <!-- Libs JS -->
    <script type="text/javascript" src="{{ asset('assets/js/demo-theme.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/jquery-3.7.0.min.js') }}"></script>

    <!-- Tabler Core -->
    <script type="text/javascript" src="{{ asset('assets/js/tabler.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/demo.min.js') }}"></script>

    @yield('js')
    @stack('js')

    <script>
        $(function() {
            $('body').on('submit', 'form', function() {
                $(this).closest('.card').addClass('load');
            })
        });
    </script>

</body>

</html>
