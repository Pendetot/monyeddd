@extends('layouts.app')

@section('title', 'Manajemen Mutasi')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Daftar Mutasi Karyawan</h3>
                    <div class="card-tools">
                        <a href="{{ route('mutasis.create') }}" class="btn btn-primary btn-sm">Tambah Mutasi</a>
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
                                <th>Jabatan Lama</th>
                                <th>Jabatan Baru</th>
                                <th>Alasan</th>
                                <th>Tanggal Mutasi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($mutasis as $mutasi)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $mutasi->karyawan->nama }}</td>
                                    <td>{{ $mutasi->jabatan_lama }}</td>
                                    <td>{{ $mutasi->jabatan_baru }}</td>
                                    <td>{{ $mutasi->alasan }}</td>
                                    <td>{{ $mutasi->tanggal_mutasi->format('d-m-Y') }}</td>
                                    <td>
                                        <a href="{{ route('mutasis.edit', $mutasi->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                        <form action="{{ route('mutasis.destroy', $mutasi->id) }}" method="POST" style="display: inline-block;">
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