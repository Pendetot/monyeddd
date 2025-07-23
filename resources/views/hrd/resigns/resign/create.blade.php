@extends('layouts.app')

@section('title', 'Tambah Data Resign')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Tambah Data Resign</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('hrd.data-resign.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="karyawan_id">Karyawan</label>
                            <select name="karyawan_id" id="karyawan_id" class="form-control @error('karyawan_id') is-invalid @enderror">
                                <option value="">Pilih Karyawan</option>
                                {{-- @foreach ($karyawans as $karyawan)
                                    <option value="{{ $karyawan->id }}" {{ old('karyawan_id') == $karyawan->id ? 'selected' : '' }}>{{ $karyawan->nama }}</option>
                                @endforeach --}}
                            </select>
                            @error('karyawan_id')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="tanggal_resign">Tanggal Resign</label>
                            <input type="date" name="tanggal_resign" id="tanggal_resign" class="form-control @error('tanggal_resign') is-invalid @enderror" value="{{ old('tanggal_resign') }}">
                            @error('tanggal_resign')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="alasan">Alasan</label>
                            <textarea name="alasan" id="alasan" class="form-control @error('alasan') is-invalid @enderror" rows="3">{{ old('alasan') }}</textarea>
                            @error('alasan')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select name="status" id="status" class="form-control @error('status') is-invalid @enderror">
                                <option value="">Pilih Status</option>
                                {{-- @foreach (\App\Enums\StatusResignEnum::cases() as $statusResign)
                                    <option value="{{ $statusResign->value }}" {{ old('status') == $statusResign->value ? 'selected' : '' }}>{{ $statusResign->value }}</option>
                                @endforeach --}}
                            </select>
                            @error('status')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('hrd.data-resign') }}" class="btn btn-secondary">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection