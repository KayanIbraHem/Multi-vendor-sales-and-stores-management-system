<!doctype html>
<!--
* Tabler - Premium and Open Source dashboard template with responsive and high quality UI.
* @version 1.0.0-beta12
* @link https://tabler.io
* Copyright 2018-2022 The Tabler Authors
* Copyright 2018-2022 codecalm.net Paweł Kuna
* Licensed under MIT (https://github.com/tabler/tabler/blob/master/LICENSE)
-->
<html lang="en" dir="{{ app()->isLocale('ar') ? 'rtl' : 'ltr' }}">

{{-- START HEAD SECTION --}}
@include('layouts.includes.dashboard.head')
{{-- END HEAD SECTION --}}

<body class=" layout-fluid">

    <div class="page">
        {{-- START SIDEBAR SECTION --}}
        @include('layouts.includes.dashboard.sidebar')
        {{-- END SIDEBAR SECTION --}}

        <div class="page-wrapper">
            {{-- START HEADER SECTION --}}
            @include('layouts.includes.dashboard.header')
            {{-- END HEADER SECTION --}}

            <!-- Page body -->
            <div class="page-body">
                <div class="container-xl">
                    <div class="row row-deck row-cards">
                        @yield('content')
                    </div>
                </div>
            </div>

            {{-- START FOOTER SECTION --}}
            @include('layouts.includes.dashboard.footer')
            {{-- END FOOTER SECTION --}}
        </div>
    </div>

    {{-- START JAVASCRIPTS SECTION --}}
    @include('layouts.includes.dashboard.scripts')
    {{-- END JAVASCRIPTS SECTION --}}


    <div class="modal modal-blur fade" id="modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body"> </div>
            </div>
        </div>
    </div>
</body>

</html>
