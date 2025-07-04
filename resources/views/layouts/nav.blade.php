<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-radius-lg fixed-start ms-2  bg-white my-2"
    id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-dark opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand px-4 py-3 m-0" href="{{ route('home') }}"
            >
            <img src="{{ asset('assets/img/logo-ct-dark.png') }}" class="navbar-brand-img" width="26" height="26"
                alt="main_logo">
            <span class="ms-1 text-sm text-dark">HummaTrip</span>
        </a>
    </div>
    <hr class="horizontal dark mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link {{ Request::is('home') ? 'active bg-gradient-dark text-white' : 'text-dark' }}" 
                    href="{{ route('home') }}">
                    <i class="material-symbols-rounded opacity-5">dashboard</i>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('trips*') ? 'active bg-gradient-dark text-white' : 'text-dark' }}" 
                    href="{{ route('unit.index') }}">
                    <i class="material-symbols-rounded opacity-5">table_view</i>
                    <span class="nav-link-text ms-1">Unit</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('destinations*') ? 'active bg-gradient-dark text-white' : 'text-dark' }}" 
                    href="{{ route('medicines.index') }}">
                    <i class="material-symbols-rounded opacity-5">table_view</i>
                    <span class="nav-link-text ms-1">Medicine</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('activities*') ? 'active bg-gradient-dark text-white' : 'text-dark' }}" 
                    href="{{ route('customers.index') }}">
                    <i class="material-symbols-rounded opacity-5">table_view</i>
                    <span class="nav-link-text ms-1">Customer</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('sales*') ? 'active bg-gradient-dark text-white' : 'text-dark' }}" 
                    href="{{ route('sales.index') }}">
                    <i class="material-symbols-rounded opacity-5">table_view</i>
                    <span class="nav-link-text ms-1">Penjualan</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('companions*') ? 'active bg-gradient-dark text-white' : 'text-dark' }}" 
                    href="{{ route('sale_items.index') }}">
                    <i class="material-symbols-rounded opacity-5">table_view</i>
                    <span class="nav-link-text ms-1">Barang Penjualan</span>
                </a>
            </li>
            
        </ul>
    </div>
    <div class="sidenav-footer position-absolute w-100 bottom-0 ">
        {{-- <div class="mx-3">
            <a class="btn btn-outline-dark mt-4 w-100"
                href="https://www.creative-tim.com/learning-lab/bootstrap/overview/material-dashboard?ref=sidebarfree"
                type="button">Documentation</a>
            <a class="btn bg-gradient-dark w-100"
                href="https://www.creative-tim.com/product/material-dashboard-pro?ref=sidebarfree"
                type="button">Upgrade to pro</a>
        </div> --}}
    </div>
</aside>
