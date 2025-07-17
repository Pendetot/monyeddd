<ul class="pc-navbar">
    <li class="pc-item pc-caption">
        <label>Navigation</label>
    </li>
    <li class="pc-item">
        <a href="{{ route('superadmin.dashboard') }}" class="pc-link">
            <span class="pc-micon"><i class="ti ti-dashboard"></i></span>
            <span class="pc-mtext">Dashboard</span>
        </a>
    </li>

    <li class="pc-item pc-caption">
        <label>Manajemen Pengguna</label>
    </li>
    <li class="pc-item">
        <a href="{{ route('super-admins.index') }}" class="pc-link">
            <span class="pc-micon"><i class="ti ti-user-shield"></i></span>
            <span class="pc-mtext">Super Admin</span>
        </a>
    </li>
    <li class="pc-item">
        <a href="{{ route('hrds.index') }}" class="pc-link">
            <span class="pc-micon"><i class="ti ti-user-plus"></i></span>
            <span class="pc-mtext">HRD</span>
        </a>
    </li>
    <li class="pc-item">
        <a href="{{ route('keuangans.index') }}" class="pc-link">
            <span class="pc-micon"><i class="ti ti-currency-dollar"></i></span>
            <span class="pc-mtext">Keuangan</span>
        </a>
    </li>
    <li class="pc-item">
        <a href="{{ route('operasionals.index') }}" class="pc-link">
            <span class="pc-micon"><i class="ti ti-settings"></i></span>
            <span class="pc-mtext">Operasional</span>
        </a>
    </li>
    <li class="pc-item">
        <a href="{{ route('guards.index') }}" class="pc-link">
            <span class="pc-micon"><i class="ti ti-shield"></i></span>
            <span class="pc-mtext">Guard</span>
        </a>
    </li>
</ul>