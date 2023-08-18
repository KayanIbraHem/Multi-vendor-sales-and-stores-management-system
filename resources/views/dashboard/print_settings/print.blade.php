<!doctype html>

<html lang="en" dir="{{ app()->isLocale('ar') ? 'rtl' : 'ltr' }}">

{{-- START HEAD SECTION --}}
@include('layouts.includes.dashboard.head')
{{-- END HEAD SECTION --}}

<body class=" layout-fluid">

    <div class="page">

        <div class="page-wrapper">

            @yield('content')

        </div>
    </div>

    {{-- START JAVASCRIPTS SECTION --}}
    @include('layouts.includes.dashboard.scripts')
    {{-- END JAVASCRIPTS SECTION --}}

</body>

</html>
