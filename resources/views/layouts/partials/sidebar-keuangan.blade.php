<ul class="pc-navbar">
    <li class="pc-item pc-caption">
        <label>Navigation</label>
    </li>
    <li class="pc-item">
        <a href="{{ route('keuangan.dashboard') }}" class="pc-link">
            <span class="pc-micon"><i class="ti ti-dashboard"></i></span>
            <span class="pc-mtext">Dashboard</span>
        </a>
    </li>

    <li class="pc-item pc-caption">
        <label>Manajemen Keuangan</label>
    </li>
    <li class="pc-item">
        <a href="{{ route('hutang-karyawans.index') }}" class="pc-link">
            <span class="pc-micon"><i class="ti ti-wallet"></i></span>
            <span class="pc-mtext">Hutang Karyawan</span>
        </a>
    </li>
</ul>