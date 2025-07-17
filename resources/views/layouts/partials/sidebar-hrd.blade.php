<ul class="pc-navbar">
    <li class="pc-item pc-caption">
        <label>Navigation</label>
    </li>
    <li class="pc-item">
        <a href="{{ route('hrd.dashboard') }}" class="pc-link">
            <span class="pc-micon"><i class="ti ti-dashboard"></i></span>
            <span class="pc-mtext">Dashboard</span>
        </a>
    </li>

    <li class="pc-item pc-caption">
        <label>Manajemen HRD</label>
    </li>
    <li class="pc-item">
        <a href="{{ route('pelamars.index') }}" class="pc-link">
            <span class="pc-micon"><i class="ti ti-users"></i></span>
            <span class="pc-mtext">Manajemen Pelamar</span>
        </a>
    </li>
    <li class="pc-item">
        <a href="{{ route('karyawans.index') }}" class="pc-link">
            <span class="pc-micon"><i class="ti ti-user-check"></i></span>
            <span class="pc-mtext">Manajemen Karyawan</span>
        </a>
    </li>
    <li class="pc-item">
        <a href="{{ route('cutis.index') }}" class="pc-link">
            <span class="pc-micon"><i class="ti ti-calendar-off"></i></span>
            <span class="pc-mtext">Pengajuan Cuti</span>
        </a>
    </li>
    <li class="pc-item">
        <a href="{{ route('mutasis.index') }}" class="pc-link">
            <span class="pc-micon"><i class="ti ti-arrows-shuffle"></i></span>
            <span class="pc-mtext">Mutasi Karyawan</span>
        </a>
    </li>
    <li class="pc-item">
        <a href="{{ route('resigns.index') }}" class="pc-link">
            <span class="pc-micon"><i class="ti ti-user-off"></i></span>
            <span class="pc-mtext">Pengajuan Resign</span>
        </a>
    </li>
    <li class="pc-item">
        <a href="{{ route('surat-peringatans.index') }}" class="pc-link">
            <span class="pc-micon"><i class="ti ti-file-alert"></i></span>
            <span class="pc-mtext">Surat Peringatan</span>
        </a>
    </li>
</ul>