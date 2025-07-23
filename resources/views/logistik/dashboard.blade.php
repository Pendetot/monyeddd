@extends('layouts.app')

@section('content')
<div class="pc-container">
    <div class="pc-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h2 class="mb-0">Dashboard Logistik</h2>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('logistik.dashboard') }}">
                                    <i class="ph-duotone ph-house"></i>
                                </a>
                            </li>
                            <li class="breadcrumb-item" aria-current="page">Dashboard</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->

        <!-- [ Main Content ] start -->
        <div class="row">
            <!-- Welcome Card -->
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h4 class="mb-2">Selamat Datang, {{ Auth::user()->name }}!</h4>
                                <p class="text-muted mb-0">
                                    Dashboard Logistik - Kelola pengajuan barang dan inventori perusahaan
                                </p>
                            </div>
                            <div class="col-4 text-end">
                                <i class="ph-duotone ph-package" style="font-size: 3rem; color: #4680ff;"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Statistics Cards -->
            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-6">
                                <h3 class="text-primary mb-0" id="pending-requests">{{ $pendingRequests ?? 0 }}</h3>
                                <p class="text-muted mb-0">Pengajuan Pending</p>
                            </div>
                            <div class="col-6 text-end">
                                <div class="avtar avtar-s bg-light-primary">
                                    <i class="ph-duotone ph-clock text-primary"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-6">
                                <h3 class="text-success mb-0" id="approved-requests">{{ $approvedRequests ?? 0 }}</h3>
                                <p class="text-muted mb-0">Disetujui</p>
                            </div>
                            <div class="col-6 text-end">
                                <div class="avtar avtar-s bg-light-success">
                                    <i class="ph-duotone ph-check-circle text-success"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-6">
                                <h3 class="text-warning mb-0" id="item-ready">{{ $itemReady ?? 0 }}</h3>
                                <p class="text-muted mb-0">Barang Siap</p>
                            </div>
                            <div class="col-6 text-end">
                                <div class="avtar avtar-s bg-light-warning">
                                    <i class="ph-duotone ph-package text-warning"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-6">
                                <h3 class="text-danger mb-0" id="rejected-requests">{{ $rejectedRequests ?? 0 }}</h3>
                                <p class="text-muted mb-0">Ditolak</p>
                            </div>
                            <div class="col-6 text-end">
                                <div class="avtar avtar-s bg-light-danger">
                                    <i class="ph-duotone ph-x-circle text-danger"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">Aksi Cepat</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">
                                <a href="{{ route('logistik.pengajuan-barang.index') }}" class="btn btn-primary d-grid">
                                    <i class="ph-duotone ph-package me-2"></i>
                                    Kelola Pengajuan Barang
                                </a>
                            </div>
                            <div class="col-md-3">
                                <a href="#" class="btn btn-outline-secondary d-grid">
                                    <i class="ph-duotone ph-clock me-2"></i>
                                    Absensi
                                </a>
                            </div>
                            <div class="col-md-3">
                                <a href="#" class="btn btn-outline-secondary d-grid">
                                    <i class="ph-duotone ph-file-text me-2"></i>
                                    Laporan Dokumen
                                </a>
                            </div>
                            <div class="col-md-3">
                                <a href="#" class="btn btn-outline-secondary d-grid">
                                    <i class="ph-duotone ph-users me-2"></i>
                                    Pembinaan
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Activities -->
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">Aktivitas Terbaru</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12">
                                @if(isset($recentActivities) && count($recentActivities) > 0)
                                    @foreach($recentActivities as $activity)
                                        <div class="d-flex align-items-center mb-3">
                                            <div class="flex-shrink-0">
                                                <div class="avtar avtar-s 
                                                    @if($activity->status == 'approved') bg-light-success
                                                    @elseif($activity->status == 'rejected') bg-light-danger
                                                    @else bg-light-warning
                                                    @endif">
                                                    <i class="ph-duotone ph-package"></i>
                                                </div>
                                            </div>
                                            <div class="flex-grow-1 ms-3">
                                                <h6 class="mb-1">{{ $activity->item_name }}</h6>
                                                <p class="text-muted mb-0">
                                                    Status: {{ ucfirst($activity->status) }} 
                                                    - {{ $activity->updated_at->diffForHumans() }}
                                                </p>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <p class="text-muted text-center py-4">Belum ada aktivitas terbaru</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Quick Stats -->
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">Ringkasan Bulanan</h5>
                    </div>
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-6">
                                <p class="text-muted mb-1">Total Pengajuan</p>
                                <h4 class="mb-0">{{ $monthlyTotal ?? 0 }}</h4>
                            </div>
                            <div class="col-6 text-end">
                                <div class="avtar avtar-s bg-light-primary">
                                    <i class="ph-duotone ph-chart-bar text-primary"></i>
                                </div>
                            </div>
                        </div>
                        <div class="progress mb-3" style="height: 8px;">
                            <div class="progress-bar bg-primary" style="width: {{ $monthlyProgress ?? 0 }}%"></div>
                        </div>
                        <p class="text-muted mb-0">Target bulan ini: {{ $monthlyTarget ?? 100 }}</p>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">Status Inventori</h5>
                    </div>
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-2">
                            <div class="flex-grow-1">
                                <p class="mb-0">Stok Tersedia</p>
                            </div>
                            <div class="flex-shrink-0">
                                <span class="badge bg-success">85%</span>
                            </div>
                        </div>
                        <div class="progress mb-3" style="height: 6px;">
                            <div class="progress-bar bg-success" style="width: 85%"></div>
                        </div>
                        <div class="d-flex align-items-center mb-2">
                            <div class="flex-grow-1">
                                <p class="mb-0">Stok Menipis</p>
                            </div>
                            <div class="flex-shrink-0">
                                <span class="badge bg-warning">12%</span>
                            </div>
                        </div>
                        <div class="progress mb-3" style="height: 6px;">
                            <div class="progress-bar bg-warning" style="width: 12%"></div>
                        </div>
                        <div class="d-flex align-items-center">
                            <div class="flex-grow-1">
                                <p class="mb-0">Habis</p>
                            </div>
                            <div class="flex-shrink-0">
                                <span class="badge bg-danger">3%</span>
                            </div>
                        </div>
                        <div class="progress" style="height: 6px;">
                            <div class="progress-bar bg-danger" style="width: 3%"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ Main Content ] end -->
    </div>
</div>
@endsection

@push('scripts')
<script>
    // Auto refresh dashboard stats every 30 seconds
    setInterval(function() {
        // Here you can add AJAX calls to update statistics
        console.log('Dashboard refreshed');
    }, 30000);
</script>
@endpush