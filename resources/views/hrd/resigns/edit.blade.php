@extends('layouts.app')

@section('title', 'Edit Pengajuan Resign')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Edit Pengajuan Resign</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('resigns.update', $resign->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="karyawan_id">Karyawan</label>
                            <select name="karyawan_id" id="karyawan_id" class="form-control @error('karyawan_id') is-invalid @enderror">
                                <option value="">Pilih Karyawan</option>
                                @foreach ($karyawans as $karyawan)
                                    <option value="{{ $karyawan->id }}" {{ old('karyawan_id', $resign->karyawan_id) == $karyawan->id ? 'selected' : '' }}>{{ $karyawan->nama }}</option>
                                @endforeach
                            </select>
                            @error('karyawan_id')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="tanggal_pengajuan">Tanggal Pengajuan</label>
                            <input type="date" name="tanggal_pengajuan" id="tanggal_pengajuan" class="form-control @error('tanggal_pengajuan') is-invalid @enderror" value="{{ old('tanggal_pengajuan', $resign->tanggal_pengajuan->format('Y-m-d')) }}">
                            @error('tanggal_pengajuan')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="tanggal_efektif">Tanggal Efektif</label>
                            <input type="date" name="tanggal_efektif" id="tanggal_efektif" class="form-control @error('tanggal_efektif') is-invalid @enderror" value="{{ old('tanggal_efektif', $resign->tanggal_efektif->format('Y-m-d')) }}">
                            @error('tanggal_efektif')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="alasan">Alasan</label>
                            <textarea name="alasan" id="alasan" class="form-control @error('alasan') is-invalid @enderror" rows="3">{{ old('alasan', $resign->alasan) }}</textarea>
                            @error('alasan')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select name="status" id="status" class="form-control @error('status') is-invalid @enderror">
                                <option value="">Pilih Status</option>
                                @foreach (\App\Enums\StatusResignEnum::cases() as $statusResign)
                                    <option value="{{ $statusResign->value }}" {{ old('status', $resign->status->value) == $statusResign->value ? 'selected' : '' }}>{{ $statusResign->value }}</option>
                                @endforeach
                            </select>
                            @error('status')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="{{ route('resigns.index') }}" class="btn btn-secondary">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection