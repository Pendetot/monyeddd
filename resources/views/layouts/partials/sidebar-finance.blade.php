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
