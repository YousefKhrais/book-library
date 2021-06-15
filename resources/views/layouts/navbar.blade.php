<nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo mr-5" href="{{route('admin.dashboard') }}"><img
                src="{{ asset('assets/images/logo.svg') }}"
                class="mr-2" alt="logo"/></a>
        <a class="navbar-brand brand-logo-mini" href="{{route('admin.dashboard') }}"><img
                src="{{ asset('assets/images/logo-mini.svg') }}" alt="logo"/></a>
    </div>

    <div class="navbar-menu-wrapper d-flex align-items-center">
        <button class="navbar-toggler" type="button" data-toggle="minimize">
            <span class="icon-menu"></span>
        </button>
    </div>
</nav>
