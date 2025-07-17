@extends('layouts.app')

@section('title', 'Manajemen Hutang Karyawan')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Daftar Hutang Karyawan</h3>
                    <div class="card-tools">
                        <a href="{{ route('hutang-karyawans.create') }}" class="btn btn-primary btn-sm">Tambah Hutang Karyawan</a>
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
                                <th>Jumlah</th>
                                <th>Alasan</th>
                                <th>Asal Hutang</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($hutangKaryawans as $hutang)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $hutang->karyawan->nama }}</td>
                                    <td>{{ number_format($hutang->jumlah, 2, ',', '.') }}</td>
                                    <td>{{ $hutang->alasan }}</td>
                                    <td>{{ $hutang->asal_hutang->value }}</td>
                                    <td>
                                        @if ($hutang->status->value === 'belum_lunas')
                                            <span class="badge bg-warning">{{ $hutang->status->value }}</span>
                                        @else
                                            <span class="badge bg-success">{{ $hutang->status->value }}</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('hutang-karyawans.edit', $hutang->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                        <form action="{{ route('hutang-karyawans.destroy', $hutang->id) }}" method="POST" style="display: inline-block;">
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