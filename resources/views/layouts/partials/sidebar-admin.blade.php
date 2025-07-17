<li class="pc-item pc-caption">
  <label data-i18n="Navigasi">Navigasi</label>
  <i class="ph-duotone ph-gauge"></i>
</li>
<li class="pc-item">
  <a href="/dashboard" class="pc-link">
    <span class="pc-micon">
      <i class="ph-duotone ph-gauge"></i>
    </span>
    <span class="pc-mtext" data-i18n="Dashboard">Dashboard</span>
  </a>
</li>
<li class="pc-item pc-caption">
  <label data-i18n="Manajemen Admin">Manajemen Admin</label>
</li>
<li class="pc-item pc-hasmenu">
  <a href="#!" class="pc-link">
    <span class="pc-micon">
      <i class="ph-duotone ph-user-circle"></i>
    </span>
    <span class="pc-mtext" data-i18n="Manajemen Pengguna">Manajemen Pengguna</span><span class="pc-arrow"><i data-feather="chevron-right"></i></span></a>
  <ul class="pc-submenu">
    <li class="pc-item"><a class="pc-link" href="{{ route('admin.users.index', ['role' => 'admin']) }}" data-i18n="Daftar Admin">Daftar Admin</a></li>
    <li class="pc-item"><a class="pc-link" href="{{ route('admin.users.index', ['role' => 'hrd']) }}" data-i18n="Daftar HRD">Daftar HRD</a></li>
    <li class="pc-item"><a class="pc-link" href="{{ route('admin.users.index', ['role' => 'finance']) }}" data-i18n="Daftar Finance">Daftar Finance</a></li>
    <li class="pc-item"><a class="pc-link" href="{{ route('admin.users.index', ['role' => 'guard']) }}" data-i18n="Daftar Satpam">Daftar Satpam</a></li>
  </ul>
</li>
<li class="pc-item pc-hasmenu">
  <a href="#!" class="pc-link">
    <span class="pc-micon">
      <i class="ph-duotone ph-gear"></i>
    </span>
    <span class="pc-mtext" data-i18n="Setting">Setting</span><span class="pc-arrow"><i data-feather="chevron-right"></i></span></a>
  <ul class="pc-submenu">
    <li class="pc-item"><a class="pc-link" href="{{ route('setting.website') }}" data-i18n="Setting Website">Setting Website</a></li>
  </ul>
</li>
