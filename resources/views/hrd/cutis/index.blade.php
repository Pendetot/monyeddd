@extends('layouts.app')

@section('title', 'Manajemen Cuti')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Daftar Pengajuan Cuti</h5>
                <div class="card-header-right">
                    <a href="{{ route('hrd.cutis.create') }}" class="btn btn-primary btn-sm">
                        <i class="feather icon-plus"></i> Tambah Pengajuan Cuti
                    </a>
                </div>
            </div>
            <div class="card-body">
                @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Karyawan</th>
                                <th>Tanggal Mulai</th>
                                <th>Tanggal Selesai</th>
                                <th>Jenis Cuti</th>
                                <th>Alasan</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cutis as $cuti)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $cuti->karyawan->nama }}</td>
                                    <td>{{ $cuti->tanggal_mulai->format('d-m-Y') }}</td>
                                    <td>{{ $cuti->tanggal_selesai->format('d-m-Y') }}</td>
                                    <td>{{ $cuti->jenis_cuti->value }}</td>
                                    <td>{{ $cuti->alasan }}</td>
                                    <td>
                                        @if ($cuti->status->value === 'pending')
                                            <span class="badge bg-warning">{{ $cuti->status->value }}</span>
                                        @elseif ($cuti->status->value === 'disetujui')
                                            <span class="badge bg-success">{{ $cuti->status->value }}</span>
                                        @else
                                            <span class="badge bg-danger">{{ $cuti->status->value }}</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('hrd.cutis.edit', $cuti->id) }}" class="btn btn-icon btn-warning">
                                            <i class="feather icon-edit"></i>
                                        </a>
                                        <form action="{{ route('hrd.cutis.destroy', $cuti->id) }}" method="POST" style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-icon btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                                <i class="feather icon-trash-2"></i>
                                            </button>
                                        </form>
                                        @if ($cuti->status->value === 'pending')
                                            <form action="{{ route('hrd.cutis.approve', $cuti->id) }}" method="POST" style="display: inline-block;">
                                                @csrf
                                                <button type="submit" class="btn btn-icon btn-success">
                                                    <i class="feather icon-check"></i>
                                                </button>
                                            </form>
                                            <form action="{{ route('hrd.cutis.reject', $cuti->id) }}" method="POST" style="display: inline-block;">
                                                @csrf
                                                <button type="submit" class="btn btn-icon btn-danger">
                                                    <i class="feather icon-x"></i>
                                                </button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection