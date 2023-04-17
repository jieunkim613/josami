<nav class="nav__content">
  <div class="nav__toggle" id="nav-toggle">
    <i class="ri-arrow-right-s-line"></i>
  </div>
  <a href="/" class="nav__logo">
    <img src="/img/logo/logo.png" />
    <span class="nav__logo-name">KEDAI JOSAMI</span>
  </a>
  <div class="nav__list">
    <a href="/" class="nav__link {{ Request::is('/*') ? 'active-link' : '' }}">
      <i class="ri-apps-2-line"></i>
      <span class="nav__name">Dashboard</span>
    </a>
    @can('kasir')
    <a href="/orders" class="nav__link {{ Request::is('orders') ? 'active-link' : '' }}">
      <i class="ri-menu-add-line"></i>
      <span class="nav__name">Buat Pesanan</span>
    </a>
    @endcan
    <a href="/queues" class="nav__link {{ Request::is('queues*') || Request::is('orders*edit') ? 'active-link' : '' }}">
      <i class="ri-file-copy-2-line"></i>
      <span class="nav__name">Antrian</span>
    </a>
    <a href="/histories" class="nav__link {{ Request::is('histories*') ? 'active-link' : '' }}">
      <i class="ri-history-line"></i>
      <span class="nav__name">Riwayat Pesanan</span>
    </a>
    @can('admin')
    <a href="/menus" class="nav__link {{ Request::is('menus*') ? 'active-link' : '' }}">
      <i class="ri-draft-line"></i>
      <span class="nav__name">Menu</span>
    </a>
    <a href="/employees" class="nav__link {{ Request::is('employees*') ? 'active-link' : '' }}">
      <i class="ri-user-settings-line"></i>
      <span class="nav__name">Karyawan</span>
    </a>
    @endcan
    <a href="/profile" class="nav__link {{ Request::is('profile*') ? 'active-link' : '' }}">
      <i class="ri-shield-user-line"></i>
      <span class="nav__name">Profil</span>
    </a>
  </div>
</nav>