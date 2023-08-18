<aside class="navbar navbar-vertical navbar-expand-lg navbar-dark">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu">
            <span class="navbar-toggler-icon"></span>
        </button>

        <h1 class="navbar-brand navbar-brand-autodark">
            <a href="{{ routeHelper('index') }}">
                <img src="{{ asset('assets/img/logo/logo-white.svg') }}" width="110" height="32" alt="Tabler"
                    class="navbar-brand-image">
            </a>
        </h1>

        <div class="collapse navbar-collapse" id="navbar-menu">
            <ul class="navbar-nav pt-lg-3">
                {{-- Home --}}
                <li class="nav-item {{ URL::current() === routeHelper('index') ? ' active' : '' }}">
                    <a class="nav-link" href="{{ routeHelper('index') }}">
                        <span class="nav-link-icon d-md-none d-lg-inline-block"> <i
                                class="fa-solid fa-house fa-fade"></i>
                        </span>
                        <span class="nav-link-title"> @lang('menu.dashboard') </span>
                    </a>
                </li>
                {{-- Categories --}}
                {{-- <li class="nav-item {{ URL::current() === routeHelper('categories.index') ? ' active' : '' }}"> --}}
                <li class="nav-item {{ checkRoute('categories.*', 'active') }}">
                    <a class="nav-link" href="{{ routeHelper('categories.index') }}">
                        <span class="nav-link-icon d-md-none d-lg-inline-block"> <i
                                class="fa-solid fa-list fa-fade"></i>
                        </span>
                        <span class="nav-link-title"> @lang('menu.categories') </span>
                    </a>
                </li>
                {{-- Inovices --}}
                <li class="nav-item {{ checkRoute('invoices.*', 'active') }}">
                    <a class="nav-link" href="{{ routeHelper('invoices.index') }}">
                        <span class="nav-link-icon d-md-none d-lg-inline-block"> <i
                                class="fa-solid fa-file-invoice-dollar fa-fade"></i>
                        </span>
                        <span class="nav-link-title"> @lang('menu.invoices') </span>
                    </a>
                </li>
                {{-- Units --}}
                <li class="nav-item {{ checkRoute('units.*', 'active') }}">
                    <a class="nav-link" href="{{ routeHelper('units.index') }}">
                        <span class="nav-link-icon d-md-none d-lg-inline-block"> <i
                                class="fa-brands fa-unity fa-fade"></i>
                        </span>
                        <span class="nav-link-title"> @lang('menu.units') </span>
                    </a>
                </li>
                {{-- Stores --}}
                <li class="nav-item {{ checkRoute('stores.*', 'active') }}">
                    <a class="nav-link" href="{{ routeHelper('stores.index') }}">
                        <span class="nav-link-icon d-md-none d-lg-inline-block"> <i
                                class="fa-solid fa-store fa-fade"></i>
                        </span>
                        <span class="nav-link-title"> @lang('menu.stores') </span>
                    </a>
                </li>
                {{-- Items --}}
                <li class="nav-item {{ checkRoute('items.*', 'active') }}">
                    <a class="nav-link" href="{{ routeHelper('items.index') }}">
                        <span class="nav-link-icon d-md-none d-lg-inline-block"> <i
                                class="fa-solid fa-box-open fa-fade"></i>
                        </span>
                        <span class="nav-link-title"> @lang('menu.items') </span>
                    </a>
                </li>
                {{-- Users --}}
                <li class="nav-item {{ checkRoute('users.*', 'active') }}">

                    <a class="nav-link" href="{{ routeHelper('users.index') }}">
                        <span class="nav-link-icon d-md-none d-lg-inline-block"> <i
                                class="fa-solid fa-users fa-fade"></i>
                        </span>
                        <span class="nav-link-title"> @lang('menu.users')</span>
                    </a>
                </li>
                {{-- Clients --}}
                <li class="nav-item {{ checkRoute('clients.*', 'active') }}">

                    <a class="nav-link" href="{{ routeHelper('clients.index') }}">
                        <span class="nav-link-icon d-md-none d-lg-inline-block"> <i
                                class="fa-solid fa-users-between-lines fa-fade"></i>
                        </span>
                        <span class="nav-link-title"> @lang('menu.clients') </span>
                    </a>
                </li>
                {{-- ShopSettings --}}
                <li class="nav-item {{ checkRoute('shop.index', 'active') }}">
                    <a class="nav-link" href="{{ routeHelper('shop.index') }}">
                        <span class="nav-link-icon d-md-none d-lg-inline-block"> <i
                                class="fa-solid fa-edit fa-fade"></i>
                        </span>
                        <span class="nav-link-title"> @lang('menu.shop') </span>
                    </a>
                </li>
                {{-- PrintSettings --}}
                <li class="nav-item {{ checkRoute('print_settings.*', 'active') }}">
                    <a class="nav-link" href="{{ routeHelper('print_settings.index') }}">
                        <span class="nav-link-icon d-md-none d-lg-inline-block"> <i
                                class="fa-solid fa-print fa-fade"></i>
                        </span>
                        <span class="nav-link-title"> @lang('menu.print_settings') </span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</aside>
