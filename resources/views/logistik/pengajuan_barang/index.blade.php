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
                            <h2 class="mb-0">Manajemen Pengajuan Barang</h2>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('logistik.dashboard') }}">
                                    <i class="ph-duotone ph-house"></i>
                                </a>
                            </li>
                            <li class="breadcrumb-item" aria-current="page">Pengajuan Barang</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <!-- Pending Requests Tab -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <ul class="nav nav-tabs card-header-tabs" id="pengajuanTabs" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="pending-tab" data-bs-toggle="tab" data-bs-target="#pending" type="button" role="tab">
                                    <i class="ph-duotone ph-clock me-2"></i>
                                    Menunggu Persetujuan ({{ count($pendingRequests) }})
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="approved-tab" data-bs-toggle="tab" data-bs-target="#approved" type="button" role="tab">
                                    <i class="ph-duotone ph-check-circle me-2"></i>
                                    Disetujui Superadmin ({{ count($approvedBySuperadmin) }})
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="items-tab" data-bs-toggle="tab" data-bs-target="#items" type="button" role="tab">
                                    <i class="ph-duotone ph-package me-2"></i>
                                    Status Barang ({{ count($itemStatusUpdates) }})
                                </button>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content" id="pengajuanTabsContent">
                            <!-- Pending Requests -->
                            <div class="tab-pane fade show active" id="pending" role="tabpanel">
                                @if(count($pendingRequests) > 0)
                                    <div class="table-responsive">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Nama Barang</th>
                                                    <th>Jumlah</th>
                                                    <th>Pemohon (HRD)</th>
                                                    <th>Tanggal Pengajuan</th>
                                                    <th>Catatan HRD</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($pendingRequests as $request)
                                                <tr>
                                                    <td>
                                                        <strong>{{ $request->item_name }}</strong>
                                                    </td>
                                                    <td>
                                                        <span class="badge bg-primary">{{ $request->quantity }}</span>
                                                    </td>
                                                    <td>{{ $request->hrd->name ?? 'N/A' }}</td>
                                                    <td>{{ $request->created_at->format('d/m/Y H:i') }}</td>
                                                    <td>
                                                        <small class="text-muted">{{ $request->notes ?: 'Tidak ada catatan' }}</small>
                                                    </td>
                                                    <td>
                                                        <div class="btn-group" role="group">
                                                            <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#approveModal{{ $request->id }}">
                                                                <i class="ph-duotone ph-check"></i> Setujui
                                                            </button>
                                                            <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#rejectModal{{ $request->id }}">
                                                                <i class="ph-duotone ph-x"></i> Tolak
                                                            </button>
                                                        </div>
                                                        
                                                        <!-- Approve Modal -->
                                                        <div class="modal fade" id="approveModal{{ $request->id }}">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <form action="{{ route('logistik.pengajuan-barang.approve', $request) }}" method="POST">
                                                                        @csrf
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title">Setujui Pengajuan</h5>
                                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <p>Anda akan menyetujui pengajuan: <strong>{{ $request->item_name }}</strong></p>
                                                                            <div class="mb-3">
                                                                                <label class="form-label">Catatan Logistik (Opsional)</label>
                                                                                <textarea class="form-control" name="logistic_notes" rows="3" placeholder="Tambahkan catatan jika diperlukan..."></textarea>
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                                            <button type="submit" class="btn btn-success">Setujui</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- Reject Modal -->
                                                        <div class="modal fade" id="rejectModal{{ $request->id }}">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <form action="{{ route('logistik.pengajuan-barang.reject', $request) }}" method="POST">
                                                                        @csrf
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title">Tolak Pengajuan</h5>
                                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <p>Anda akan menolak pengajuan: <strong>{{ $request->item_name }}</strong></p>
                                                                            <div class="mb-3">
                                                                                <label class="form-label">Alasan Penolakan <span class="text-danger">*</span></label>
                                                                                <textarea class="form-control" name="logistic_notes" rows="3" required placeholder="Berikan alasan penolakan..."></textarea>
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                                            <button type="submit" class="btn btn-danger">Tolak</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                @else
                                    <div class="text-center py-4">
                                        <i class="ph-duotone ph-check-circle" style="font-size: 3rem; color: #28a745;"></i>
                                        <h5 class="mt-3">Tidak Ada Pengajuan Pending</h5>
                                        <p class="text-muted">Semua pengajuan telah diproses</p>
                                    </div>
                                @endif
                            </div>

                            <!-- Approved by Superadmin -->
                            <div class="tab-pane fade" id="approved" role="tabpanel">
                                @if(count($approvedBySuperadmin) > 0)
                                    <div class="table-responsive">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Nama Barang</th>
                                                    <th>Jumlah</th>
                                                    <th>Status</th>
                                                    <th>Disetujui</th>
                                                    <th>Catatan Superadmin</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($approvedBySuperadmin as $approved)
                                                <tr>
                                                    <td><strong>{{ $approved->item_name }}</strong></td>
                                                    <td><span class="badge bg-primary">{{ $approved->quantity }}</span></td>
                                                    <td>
                                                        <span class="badge bg-success">Disetujui</span>
                                                    </td>
                                                    <td>{{ $approved->superadmin_approved_at->format('d/m/Y H:i') }}</td>
                                                    <td>
                                                        <small class="text-muted">{{ $approved->superadmin_notes ?: 'Tidak ada catatan' }}</small>
                                                    </td>
                                                    <td>
                                                        <div class="btn-group" role="group">
                                                            <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#readyModal{{ $approved->id }}">
                                                                <i class="ph-duotone ph-check"></i> Barang Siap
                                                            </button>
                                                            <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#notReadyModal{{ $approved->id }}">
                                                                <i class="ph-duotone ph-clock"></i> Belum Siap
                                                            </button>
                                                        </div>

                                                        <!-- Ready Modal -->
                                                        <div class="modal fade" id="readyModal{{ $approved->id }}">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <form action="{{ route('logistik.pengajuan-barang.set-item-status', $approved) }}" method="POST">
                                                                        @csrf
                                                                        <input type="hidden" name="status_barang" value="item_ready">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title">Barang Siap</h5>
                                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <p>Konfirmasi bahwa barang <strong>{{ $approved->item_name }}</strong> sudah siap</p>
                                                                            <div class="mb-3">
                                                                                <label class="form-label">Catatan (Opsional)</label>
                                                                                <textarea class="form-control" name="logistic_notes" rows="3" placeholder="Tambahkan catatan..."></textarea>
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                                            <button type="submit" class="btn btn-success">Konfirmasi Siap</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- Not Ready Modal -->
                                                        <div class="modal fade" id="notReadyModal{{ $approved->id }}">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <form action="{{ route('logistik.pengajuan-barang.set-item-status', $approved) }}" method="POST">
                                                                        @csrf
                                                                        <input type="hidden" name="status_barang" value="item_not_ready">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title">Barang Belum Siap</h5>
                                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <p>Konfirmasi bahwa barang <strong>{{ $approved->item_name }}</strong> belum siap</p>
                                                                            <div class="mb-3">
                                                                                <label class="form-label">Alasan/Catatan</label>
                                                                                <textarea class="form-control" name="logistic_notes" rows="3" placeholder="Jelaskan alasan atau estimasi waktu..."></textarea>
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                                            <button type="submit" class="btn btn-warning">Konfirmasi Belum Siap</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                @else
                                    <div class="text-center py-4">
                                        <i class="ph-duotone ph-info" style="font-size: 3rem; color: #17a2b8;"></i>
                                        <h5 class="mt-3">Tidak Ada Pengajuan Disetujui</h5>
                                        <p class="text-muted">Belum ada pengajuan yang disetujui superadmin</p>
                                    </div>
                                @endif
                            </div>

                            <!-- Item Status Updates -->
                            <div class="tab-pane fade" id="items" role="tabpanel">
                                @if(count($itemStatusUpdates) > 0)
                                    <div class="table-responsive">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Nama Barang</th>
                                                    <th>Jumlah</th>
                                                    <th>Status</th>
                                                    <th>Tanggal Update</th>
                                                    <th>Catatan Terakhir</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($itemStatusUpdates as $item)
                                                <tr>
                                                    <td><strong>{{ $item->item_name }}</strong></td>
                                                    <td><span class="badge bg-primary">{{ $item->quantity }}</span></td>
                                                    <td>
                                                        @if($item->status == 'item_ready')
                                                            <span class="badge bg-success">Barang Siap</span>
                                                        @else
                                                            <span class="badge bg-warning">Belum Siap</span>
                                                        @endif
                                                    </td>
                                                    <td>{{ $item->updated_at->format('d/m/Y H:i') }}</td>
                                                    <td>
                                                        <small class="text-muted">{{ $item->logistic_notes ?: 'Tidak ada catatan' }}</small>
                                                    </td>
                                                    <td>
                                                        @if($item->status == 'item_not_ready')
                                                            <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#updateReadyModal{{ $item->id }}">
                                                                <i class="ph-duotone ph-check"></i> Update Siap
                                                            </button>
                                                        @else
                                                            <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#updateNotReadyModal{{ $item->id }}">
                                                                <i class="ph-duotone ph-clock"></i> Update Belum Siap
                                                            </button>
                                                        @endif

                                                        <!-- Update Modals (similar to above) -->
                                                        <div class="modal fade" id="updateReadyModal{{ $item->id }}">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <form action="{{ route('logistik.pengajuan-barang.set-item-status', $item) }}" method="POST">
                                                                        @csrf
                                                                        <input type="hidden" name="status_barang" value="item_ready">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title">Update Status: Barang Siap</h5>
                                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <p>Update status <strong>{{ $item->item_name }}</strong> menjadi siap</p>
                                                                            <div class="mb-3">
                                                                                <label class="form-label">Catatan Update</label>
                                                                                <textarea class="form-control" name="logistic_notes" rows="3" placeholder="Tambahkan catatan update..."></textarea>
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                                            <button type="submit" class="btn btn-success">Update Siap</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="modal fade" id="updateNotReadyModal{{ $item->id }}">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <form action="{{ route('logistik.pengajuan-barang.set-item-status', $item) }}" method="POST">
                                                                        @csrf
                                                                        <input type="hidden" name="status_barang" value="item_not_ready">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title">Update Status: Belum Siap</h5>
                                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <p>Update status <strong>{{ $item->item_name }}</strong> menjadi belum siap</p>
                                                                            <div class="mb-3">
                                                                                <label class="form-label">Alasan/Catatan</label>
                                                                                <textarea class="form-control" name="logistic_notes" rows="3" placeholder="Jelaskan alasan atau estimasi waktu..."></textarea>
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                                            <button type="submit" class="btn btn-warning">Update Belum Siap</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                @else
                                    <div class="text-center py-4">
                                        <i class="ph-duotone ph-package" style="font-size: 3rem; color: #6c757d;"></i>
                                        <h5 class="mt-3">Tidak Ada Status Barang</h5>
                                        <p class="text-muted">Belum ada barang yang perlu di-update statusnya</p>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // Auto-refresh page every 5 minutes to get latest data
    setTimeout(function() {
        location.reload();
    }, 300000);
</script>
@endpush