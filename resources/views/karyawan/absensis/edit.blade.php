<!-- resources/views/karyawan/absensis/edit.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Edit Absensi</title>
</head>
<body>
    <h2>Edit Absensi</h2>
    <form method="POST" action="{{ route('karyawan.absensis.update', $absensi->id) }}">
        @csrf
        @method('PUT')
        <div>
            <label for="karyawan_id">Karyawan ID</label>
            <input type="text" id="karyawan_id" name="karyawan_id" value="{{ $absensi->karyawan_id }}" required>
        </div>
        <div>
            <label for="tanggal">Tanggal</label>
            <input type="date" id="tanggal" name="tanggal" value="{{ $absensi->tanggal }}" required>
        </div>
        <div>
            <label for="status_absensi">Status Absensi</label>
            <select id="status_absensi" name="status_absensi" required>
                <option value="hadir" {{ $absensi->status_absensi == 'hadir' ? 'selected' : '' }}>Hadir</option>
                <option value="izin" {{ $absensi->status_absensi == 'izin' ? 'selected' : '' }}>Izin</option>
                <option value="sakit" {{ $absensi->status_absensi == 'sakit' ? 'selected' : '' }}>Sakit</option>
                <option value="alpha" {{ $absensi->status_absensi == 'alpha' ? 'selected' : '' }}>Alpha</option>
            </select>
        </div>
        <div>
            <label for="keterangan">Keterangan</label>
            <textarea id="keterangan" name="keterangan">{{ $absensi->keterangan }}</textarea>
        </div>
        <button type="submit">Update</button>
    </form>
</body>
</html>
