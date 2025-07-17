@extends('layouts.app')

@section('title', 'Manajemen Pelamar')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Daftar Pelamar</h3>
                    <div class="card-tools">
                        <a href="{{ route('pelamars.create') }}" class="btn btn-primary btn-sm">Tambah Pelamar</a>
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
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Telepon</th>
                                <th>Alamat</th>
                                <th>Status Aplikasi</th>
                                <th>Tanggal Interview</th>
                                <th>Catatan HRD</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pelamars as $pelamar)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $pelamar->nama }}</td>
                                    <td>{{ $pelamar->email }}</td>
                                    <td>{{ $pelamar->telepon }}</td>
                                    <td>{{ $pelamar->alamat }}</td>
                                    <td>
                                        @if ($pelamar->status_aplikasi === 'pending')
                                            <span class="badge bg-warning">{{ $pelamar->status_aplikasi }}</span>
                                        @elseif ($pelamar->status_aplikasi === 'diterima')
                                            <span class="badge bg-success">{{ $pelamar->status_aplikasi }}</span>
                                        @else
                                            <span class="badge bg-danger">{{ $pelamar->status_aplikasi }}</span>
                                        @endif
                                    </td>
                                    <td>{{ $pelamar->tanggal_interview ? $pelamar->tanggal_interview->format('d-m-Y') : '-' }}</td>
                                    <td>{{ $pelamar->catatan_hrd ?? '-' }}</td>
                                    <td>
                                        <a href="{{ route('pelamars.edit', $pelamar->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                        <form action="{{ route('pelamars.destroy', $pelamar->id) }}" method="POST" style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                                        </form>
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