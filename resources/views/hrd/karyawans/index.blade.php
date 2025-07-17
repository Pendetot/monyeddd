@extends('layouts.app')

@section('title', 'Manajemen Karyawan')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Daftar Karyawan</h3>
                    <div class="card-tools">
                        <a href="{{ route('karyawans.create') }}" class="btn btn-primary btn-sm">Tambah Karyawan</a>
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
                                <th>NIK</th>
                                <th>Alamat</th>
                                <th>Telepon</th>
                                <th>Jabatan</th>
                                <th>Penempatan</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($karyawans as $karyawan)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $karyawan->nama }}</td>
                                    <td>{{ $karyawan->nik }}</td>
                                    <td>{{ $karyawan->alamat }}</td>
                                    <td>{{ $karyawan->telepon }}</td>
                                    <td>{{ $karyawan->jabatan }}</td>
                                    <td>{{ $karyawan->penempatan }}</td>
                                    <td>
                                        @if ($karyawan->status->value === 'aktif')
                                            <span class="badge bg-success">{{ $karyawan->status->value }}</span>
                                        @else
                                            <span class="badge bg-danger">{{ $karyawan->status->value }}</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('karyawans.edit', $karyawan->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                        <form action="{{ route('karyawans.destroy', $karyawan->id) }}" method="POST" style="display: inline-block;">
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