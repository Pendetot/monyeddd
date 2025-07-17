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

@hasanyrole('superadmin|admin')
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
@endhasanyrole

@hasanyrole('superadmin|hrd')
<li class="pc-item pc-caption">
  <label data-i18n="Manajemen HRD">Manajemen HRD</label>
</li>
<li class="pc-item pc-hasmenu">
  <a href="#!" class="pc-link">
    <span class="pc-micon">
      <i class="ph-duotone ph-calendar-blank"></i>
    </span>
    <span class="pc-mtext" data-i18n="Cuti & Resign">Cuti & Resign</span><span class="pc-arrow"><i data-feather="chevron-right"></i></span></a>
  <ul class="pc-submenu">
    <li class="pc-item"><a class="pc-link" href="{{ route('hr.leave-requests.index') }}" data-i18n="Permohonan Cuti">Permohonan Cuti</a></li>
    <li class="pc-item"><a class="pc-link" href="{{ route('hr.resignations.index') }}" data-i18n="Pengunduran Diri">Pengunduran Diri</a></li>
  </ul>
</li>
<li class="pc-item pc-hasmenu">
  <a href="#!" class="pc-link">
    <span class="pc-micon">
      <i class="ph-duotone ph-warning"></i>
    </span>
    <span class="pc-mtext" data-i18n="Disipliner & Transfer">Disipliner & Transfer</span><span class="pc-arrow"><i data-feather="chevron-right"></i></span></a>
  <ul class="pc-submenu">
    <li class="pc-item"><a class="pc-link" href="{{ route('hr.disciplinaries.index') }}" data-i18n="Tindakan Disipliner">Tindakan Disipliner</a></li>
    <li class="pc-item"><a class="pc-link" href="{{ route('hr.transfer-requests.index') }}" data-i18n="Permohonan Transfer">Permohonan Transfer</a></li>
    <li class="pc-item"><a class="pc-link" href="{{ route('hrd.mutasi-karyawan.index') }}" data-i18n="Mutasi Karyawan">Mutasi Karyawan</a></li>
  </ul>
</li>
@endhasanyrole

@hasanyrole('superadmin|finance')
<li class="pc-item pc-caption">
  <label data-i18n="Manajemen Keuangan">Manajemen Keuangan</label>
</li>
<li class="pc-item pc-hasmenu">
  <a href="#!" class="pc-link">
    <span class="pc-micon">
      <i class="ph-duotone ph-currency-dollar"></i>
    </span>
    <span class="pc-mtext" data-i18n="Data Keuangan">Data Keuangan</span><span class="pc-arrow"><i data-feather="chevron-right"></i></span></a>
  <ul class="pc-submenu">
    <li class="pc-item"><a class="pc-link" href="{{ route('finance.accounts.index') }}" data-i18n="Data Rekening">Data Rekening</a></li>
    <li class="pc-item"><a class="pc-link" href="{{ route('finance.salaries.index') }}" data-i18n="Gaji">Gaji</a></li>
    <li class="pc-item"><a class="pc-link" href="{{ route('finance.debts.index') }}" data-i18n="Hutang">Hutang</a></li>
    <li class="pc-item"><a class="pc-link" href="{{ route('finance.payment-histories.index') }}" data-i18n="Histori Pembayaran">Histori Pembayaran</a></li>
  </ul>
</li>
@endhasanyrole

@hasanyrole('superadmin|guard')
<li class="pc-item pc-caption">
  <label data-i18n="Manajemen Operasional">Manajemen Operasional</label>
</li>
<li class="pc-item pc-hasmenu">
  <a href="#!" class="pc-link">
    <span class="pc-micon">
      <i class="ph-duotone ph-clock"></i>
    </span>
    <span class="pc-mtext" data-i18n="Absensi & Laporan">Absensi & Laporan</span><span class="pc-arrow"><i data-feather="chevron-right"></i></span></a>
  <ul class="pc-submenu">
    <li class="pc-item"><a class="pc-link" href="{{ route('operations.attendances.index') }}" data-i18n="Absensi">Absensi</a></li>
    <li class="pc-item"><a class="pc-link" href="{{ route('operations.work-reports.index') }}" data-i18n="Laporan Kerja">Laporan Kerja</a></li>
  </ul>
</li>
<li class="pc-item pc-hasmenu">
  <a href="#!" class="pc-link">
    <span class="pc-micon">
      <i class="ph-duotone ph-chart-line"></i>
    </span>
    <span class="pc-mtext" data-i18n="Kinerja">Kinerja</span><span class="pc-arrow"><i data-feather="chevron-right"></i></span></a>
  <ul class="pc-submenu">
    <li class="pc-item"><a class="pc-link" href="{{ route('operations.kpis.index') }}" data-i18n="KPI">KPI</a></li>
  </ul>
</li>
@endhasanyrole
