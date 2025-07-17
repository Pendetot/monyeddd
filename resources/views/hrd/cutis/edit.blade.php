@extends('layouts.app')

@section('title', 'Edit Pengajuan Cuti')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Edit Pengajuan Cuti</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('cutis.update', $cuti->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="karyawan_id">Karyawan</label>
                            <select name="karyawan_id" id="karyawan_id" class="form-control @error('karyawan_id') is-invalid @enderror">
                                <option value="">Pilih Karyawan</option>
                                @foreach ($karyawans as $karyawan)
                                    <option value="{{ $karyawan->id }}" {{ old('karyawan_id', $cuti->karyawan_id) == $karyawan->id ? 'selected' : '' }}>{{ $karyawan->nama }}</option>
                                @endforeach
                            </select>
                            @error('karyawan_id')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="tanggal_mulai">Tanggal Mulai</label>
                            <input type="date" name="tanggal_mulai" id="tanggal_mulai" class="form-control @error('tanggal_mulai') is-invalid @enderror" value="{{ old('tanggal_mulai', $cuti->tanggal_mulai->format('Y-m-d')) }}">
                            @error('tanggal_mulai')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="tanggal_selesai">Tanggal Selesai</label>
                            <input type="date" name="tanggal_selesai" id="tanggal_selesai" class="form-control @error('tanggal_selesai') is-invalid @enderror" value="{{ old('tanggal_selesai', $cuti->tanggal_selesai->format('Y-m-d')) }}">
                            @error('tanggal_selesai')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="jenis_cuti">Jenis Cuti</label>
                            <select name="jenis_cuti" id="jenis_cuti" class="form-control @error('jenis_cuti') is-invalid @enderror">
                                <option value="">Pilih Jenis Cuti</option>
                                @foreach (\App\Enums\JenisCutiEnum::cases() as $jenisCuti)
                                    <option value="{{ $jenisCuti->value }}" {{ old('jenis_cuti', $cuti->jenis_cuti->value) == $jenisCuti->value ? 'selected' : '' }}>{{ $jenisCuti->value }}</option>
                                @endforeach
                            </select>
                            @error('jenis_cuti')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="alasan">Alasan</label>
                            <textarea name="alasan" id="alasan" class="form-control @error('alasan') is-invalid @enderror" rows="3">{{ old('alasan', $cuti->alasan) }}</textarea>
                            @error('alasan')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select name="status" id="status" class="form-control @error('status') is-invalid @enderror">
                                <option value="">Pilih Status</option>
                                @foreach (\App\Enums\StatusCutiEnum::cases() as $statusCuti)
                                    <option value="{{ $statusCuti->value }}" {{ old('status', $cuti->status->value) == $statusCuti->value ? 'selected' : '' }}>{{ $statusCuti->value }}</option>
                                @endforeach
                            </select>
                            @error('status')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="{{ route('cutis.index') }}" class="btn btn-secondary">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection