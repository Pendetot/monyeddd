@extends('layouts.app')

@section('title', 'Manajemen Resign')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Daftar Pengajuan Resign</h3>
                    <div class="card-tools">
                        <a href="{{ route('resigns.create') }}" class="btn btn-primary btn-sm">Tambah Pengajuan Resign</a>
                    </div>
                </div>
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Karyawan</th>
                                <th>Tanggal Pengajuan</th>
                                <th>Tanggal Efektif</th>
                                <th>Alasan</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($resigns as $resign)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $resign->karyawan->nama }}</td>
                                    <td>{{ $resign->tanggal_pengajuan->format('d-m-Y') }}</td>
                                    <td>{{ $resign->tanggal_efektif->format('d-m-Y') }}</td>
                                    <td>{{ $resign->alasan }}</td>
                                    <td>
                                        @if ($resign->status->value === 'pending')
                                            <span class="badge bg-warning">{{ $resign->status->value }}</span>
                                        @elseif ($resign->status->value === 'disetujui')
                                            <span class="badge bg-success">{{ $resign->status->value }}</span>
                                        @else
                                            <span class="badge bg-danger">{{ $resign->status->value }}</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('resigns.edit', $resign->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                        <form action="{{ route('resigns.destroy', $resign->id) }}" method="POST" style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                                        </form>
                                        @if ($resign->status->value === 'pending')
                                            <form action="{{ route('resigns.approve', $resign->id) }}" method="POST" style="display: inline-block;">
                                                @csrf
                                                <button type="submit" class="btn btn-success btn-sm">Setujui</button>
                                            </form>
                                            <form action="{{ route('resigns.reject', $resign->id) }}" method="POST" style="display: inline-block;">
                                                @csrf
                                                <button type="submit" class="btn btn-danger btn-sm">Tolak</button>
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