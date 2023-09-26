<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">
    {{-- <body data-layout="horizontal" data-sidebar="dark"> --}}
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <a href="{{ url('/dashboard') }}" class="logo logo-dark">
            <span class="logo-sm">
                <img src="{{ URL::asset('assets/images/logo-sm.svg') }}" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{ URL::asset('assets/images/logo-sm.svg') }}" alt="" height="22"> <span class="logo-txt">@lang('translation.Symox')</span>
            </span>
        </a>

        <a href="{{ url('/') }}" class="logo logo-light">
            <span class="logo-lg">
                <img src="{{ URL::asset('assets/images/logo-sm.svg') }}" alt="" height="22"> <span class="logo-txt">@lang('translation.Symox')</span>
            </span>
            <span class="logo-sm">
                <img src="{{ URL::asset('assets/images/logo-sm.svg') }}" alt="" height="22">
            </span>
        </a>
    </div>

    <button type="button" class="btn btn-sm px-3 font-size-16 header-item vertical-menu-btn">
        <i class="fa fa-fw fa-bars"></i>
    </button>

    <div data-simplebar class="sidebar-menu-scroll">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" data-key="t-menu">Menu</li>

                <li>
                    <a href="{{ url('/dashboard') }}">
                        <i class="bx bx-tachometer icon nav-icon"></i>
                        <span class="menu-item" data-key="t-dashboards">@lang('translation.Dashboard')</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('/buy-ticket') }}">
                        <i class="bx bx-hourglass icon nav-icon"></i>
                        <span class="menu-item" data-key="t-play">Jouer</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('/tickets') }}">
                        <i class="bx bx-rocket icon nav-icon"></i>
                        <span class="menu-item" data-key="t-tickets">Tickets</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('/transactions') }}">
                        <i class="bx bx bx-yen icon nav-icon"></i>
                        <span class="menu-item" data-key="t-transactions">Transactions</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('/withdrawal') }}">
                        <i class="bx bx bx-receipt icon nav-icon"></i>
                        <span class="menu-item" data-key="t-transactions">Remboursement</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
