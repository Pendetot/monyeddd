@extends('layouts.app')

@section('title', 'Manajemen KPI')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Daftar Penilaian KPI</h3>
                    <div class="card-tools">
                        <a href="{{ route('kpis.create') }}" class="btn btn-primary btn-sm">Tambah Penilaian KPI</a>
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
                                <th>Periode</th>
                                <th>Nilai KPI</th>
                                <th>Evaluasi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kpis as $kpi)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $kpi->karyawan->nama }}</td>
                                    <td>{{ $kpi->periode }}</td>
                                    <td>{{ $kpi->nilai_kpi }}</td>
                                    <td>{{ $kpi->evaluasi }}</td>
                                    <td>
                                        <a href="{{ route('kpis.edit', $kpi->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                        <form action="{{ route('kpis.destroy', $kpi->id) }}" method="POST" style="display: inline-block;">
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