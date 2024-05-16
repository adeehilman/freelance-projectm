
@if (Route::current()->getName() != 'login')
<aside class="left-sidebar">
  <!-- Sidebar scroll-->
  <div>
    <div class="brand-logo d-flex align-items-center justify-content-between">
      <a href="./index.html" class="text-nowrap logo-img">
        <img src="../assets/images/logos/dark-logo.svg" width="180" alt="" />
      </a>
      <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
        <i class="ti ti-x fs-8"></i>
      </div>
    </div>
    <!-- Sidebar navigation-->
    <nav class="sidebar-nav scroll-sidebar " data-simplebar="">
        <ul id="sidebarnav">
          <li class="nav-small-cap">
            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
            <span class="hide-menu">Home</span>

          </li>
          @foreach ( $menuItems as $menuItem )
          <li class="sidebar-item">

              <a class="sidebar-link  {{ request()->routeIs($menuItem->card_url) ? 'active' : '' }}" href="{{ $menuItem->card_url }}" aria-expanded="false">
                <span>
                    <i class="{{ $menuItem->menu_icon}}"></i>
                </span>
                <span class="hide-menu">{{ $menuItem->card_name}}</span>
              </a>
            </li>
          @endforeach


      </nav>
    <!-- End Sidebar navigation -->
  </div>
  <!-- End Sidebar scroll-->
</aside>

@endif
