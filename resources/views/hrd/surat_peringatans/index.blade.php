@extends('layouts.app')

@section('title', 'Manajemen Surat Peringatan')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Daftar Surat Peringatan</h3>
                    <div class="card-tools">
                        <a href="{{ route('surat-peringatans.create') }}" class="btn btn-primary btn-sm">Tambah Surat Peringatan</a>
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
                                <th>Jenis SP</th>
                                <th>Tanggal SP</th>
                                <th>Keterangan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($suratPeringatans as $sp)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $sp->karyawan->nama }}</td>
                                    <td>{{ $sp->jenis_sp->value }}</td>
                                    <td>{{ $sp->tanggal_sp->format('d-m-Y') }}</td>
                                    <td>{{ $sp->keterangan }}</td>
                                    <td>
                                        <a href="{{ route('surat-peringatans.edit', $sp->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                        <form action="{{ route('surat-peringatans.destroy', $sp->id) }}" method="POST" style="display: inline-block;">
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